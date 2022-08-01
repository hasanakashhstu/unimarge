<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Session;
use Validator;
use Redirect;
class Create_role extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:CREATE_ROLE'); 
     }
    public function index()
    {
       
       
        return view('admin.RBAC.create_role',['role_info'=>Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
if(Role::where('display_name',$request->display_name)->first())
{
    Session::flash('error',"$request->display_name Role Are Already Exist");
    return Redirect::back();
}
else
{
        $validation_rule=new Role;
        $validation=Validator::make($request->all(),$validation_rule->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {

            $store_data=$request->all();
            $name=str_slug($request->display_name,'_');
            $store_data=array_add($store_data,'name',$name);
           
            $create_role=new Role;
            $create_role->fill($store_data)->save();
            Session::flash('success',"A new Role is created named ($request->display_name)");
            return Redirect::back();

        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('admin.RBAC.create_role_edit',['role_info'=>Role::where('name',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
         $validation_rule=new Role;
        $validation=Validator::make($request->all(),$validation_rule->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }
        else
        {
            $data=array_except($request->all(),['_method','_token']);
            $slug_name=str_slug($request->display_name,'_');
            $data=array_add($data,'name',$slug_name);

            Role::where('id',$id)->update($data);
            Session::flash('success', "$request->display_name Information Are Succesfully Edited");
            return Redirect::back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Role::where('name',$id)->delete();

        session()->flash('success', "Delete Information Are Succesfully Completed");
        return back()->with('success','Delete Information Are Succesfully Completed');

    }
}
