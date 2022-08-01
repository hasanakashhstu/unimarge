<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\create_admin_model;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Hash;
use Crypt;
use Validator;


class Create_admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
     {
       $this->middleware('permission:CREATE_ADMIN'); 
     }
    public function index()
    { 
        
        $this->middleware('can:insert');
        return view('admin.RBAC.create_admin',["create_admin_data"=>create_admin_model::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->middleware('can:add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $this->middleware('can:add');
$email_authnetication_check=create_admin_model::where('email',$request->email)->first();

if(!$email_authnetication_check)
{
        $validate_rule_use=new create_admin_model;
        $validator = Validator::make($request->all(),$validate_rule_use->store_rules());

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            $Data=array_add($request->all(),'status','Active');
            $Data=array_set($Data,'password',bcrypt($request->password));
            $create_admin=new create_admin_model;
            $create_admin->fill($Data)->save();
            return back()->with('success','New Admin Create');
        }
}
else
{
    Session::flash('error',"Duplicate Email ( $request->email ) Entry Are Not Allowed");
    return Redirect::back();
}
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(create_admin_model::find($id)->status =="Active"):
            create_admin_model::find($id)->update(['status'=>'Deactive']);
        else:
            create_admin_model::find($id)->update(['status'=>'Active']);
        endif;
        Session::flash('success','Status Changed Successfully');
        return redirect::back();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.RBAC.create_admin_edit',["edit_information"=>create_admin_model::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    // Update Function Are Start
    public function update(Request $request, $id)
    {

    $validate_rule_use=new create_admin_model;
    $validator = Validator::make($request->all(),$validate_rule_use->store_rules());
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        else
        {
            $update_array=$request->all();
            $update_array=array_except($update_array,'password');
            $update_array=array_add($update_array,'password',bcrypt($request->password));
            create_admin_model::where('id',$id)->first()->fill($update_array)->save();
            return back()->with('success',"This User ( $request->email ) Information Are Updated Successfully");
        }

    }
// Update Function Are End


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         create_admin_model::where('id',$id)->delete();
        
       return back()->with('success',"This User ( $id ) Information Are Succesfully Deleted");
    }
}
