<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\dormitory_model;
use App\teacher_model;
use Session;
use Validator;

class dormitory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('permission:MANAGE_DORMITORY'); 
     }
    public function index()
    {
         return view('admin.Dormitory.dormitory',["dormitory_data"=>dormitory_model::all(),'teacher_info'=>teacher_model::all()]);
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
       $dormitory_data=new dormitory_model;
       $validation=Validator::make($request->all(),$dormitory_data->roles_rule());
       if($validation->fails())
       {
        return back()->withInput()->withErrors($validation);
       }
       else
       {
                  $data=$request->all();
                  $data=array_add($data,'manage_dormitory_id',time());
                  $dormitory_data->fill($data)->save();


       }
        Session::flash('success','$request->dormitory_name Dormitory  Added Successfully');
        return back()->with('success',"$request->dormitory_name Dormitory Info Added Successfully");
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
       return view('admin.Dormitory.Edit.manage_dormitory_edit',['dormitory_data'=>dormitory_model::where('manage_dormitory_id',$id)->first(),'teacher_info'=>teacher_model::all()]);
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
       dormitory_model::where('manage_dormitory_id',$id)->first()->fill($request->all())->save();
        Session::flash('success',"$request->dormitory_name's Dormitory Info Updated Successfully");
        return back()->with('success',"$request->dormitory_name Dormitory Info Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       dormitory_model::where('manage_dormitory_id',$id)->delete();
     Session::flash('success',' Delete Operation Successfully Completed');
     return back()->with('success','Dormitory  Deleted Successfully');
    }
}
