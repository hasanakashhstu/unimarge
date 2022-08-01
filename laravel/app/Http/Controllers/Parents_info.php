<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\parents_info_model ;
use App\parents_info_child_model ;
use Redirect;
use File;
use Hash;
class parents_info extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
     {
       $this->middleware('permission:PARENT'); 
     }
    public function index()
    {
        return view('admin.Parents.parents_info');
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
        $parents_info=new parents_info_model ;
        $validation=Validator::make($request->all(),$parents_info->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            $email=$parents_info->where('email',$request->email)->first();
            if($email)
            {
                Session::flash('wrong',"Duplicate Email Are Not Allowed");
                return back()->withInput();
            }
            else
            {
                 $data=$request->all();
                $data=array_add($data,'parent_id',time());
                $data=array_set($data,'password',Hash::make($request->newPassword));
                $parents_info->fill($data)->save();
                 $show=$request->all();
                 $show=array_add($show,'parent',time());
                     if(!empty($request->post_office) or !empty($request->home_district) or !empty($request->division) or !empty($request->village_name))
                    {
                         $parents_info_child=new parents_info_child_model ;
                         $parents_info_child->fill($show)->save();
                    }
                if($request->file('parents_image')):
                    $filepath='img/backend/parents/';
                    $filename=time().".jpg";
                    $request->file('parents_image')->move($filepath,$filename);
                endif;
            }
           
        }
        Session::flash('success',"$request->name Infomation Are successfully Added");
        return Redirect::back();

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
     return view('admin.Parents.Edit.parents_info_edit',['parent_info_data'=>parents_info_model::where('parent_id',$id)->first(),'parent_info_address'=>parents_info_child_model::where('parent',$id)->first()]);
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


        if($request->file('parents_image')):
            $filepath='img/backend/parents/';
            $filename=$id.".jpg";
            $request->file('parents_image')->move($filepath,$filename);
        endif;
        $data=$request->all();
        $data=array_set($data,'password',Hash::make($request->password));
        parents_info_model::where('parent_id',$id)->first()->fill($data)->save();

        if(!empty($request->post_office) or !empty($request->home_district) or !empty($request->division) or !empty($request->village_name))
        {
            $check_data=parents_info_child_model::where('parent',$id)->first();
            if($check_data)
            {
                $check_data->fill($request->all())->save();
                
            }
            else
            {
                $save_child_table_data=$request->all();
                $save_child_table_data=array_set($save_child_table_data,'parent',$id);

                $save_child_table_data_obj=new parents_info_child_model;
                $save_child_table_data_obj->fill($save_child_table_data)->save();
            }
        }
        

        Session::flash('success','Updated');
        return back()->with('success',"$request->name Infomation Are successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        if(File::exists("img/backend/parents/$id.jpg")) {
            File::delete("img/backend/parents/$id.jpg");
            echo "img/backend/parents/$id.jpg";
        }
        

        parents_info_model::where('parent_id',$id)->delete();
        parents_info_child_model::where('parent',$id)->delete();
        Session::flash('success',' Delete Operation Successfully Completed');
        return Redirect::back();
    }
}
