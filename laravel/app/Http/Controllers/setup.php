<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ov_setup_model;
use Session;
use Validator;
use Redirect;
class setup extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Settings.setup',['session_data'=>ov_setup_model::where('type','Session')->get(),'job_type_data'=>ov_setup_model::where('type','Job Type')->get(),'work_department_data'=>ov_setup_model::where('type','Work Department')->get(),'shift_data'=>ov_setup_model::where('type','Shift')->get(),'batch_data'=>ov_setup_model::where('type','Batch')->get(),'medium_data'=>ov_setup_model::where('type','Medium')->get(),'semester_data'=>ov_setup_model::where('type','Semester')->get()]);
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
       $ov_setup_model=new ov_setup_model;
       $ov_setup_model->fill($request->all())->save();
       
     Session::flash('success',"New $request->session_name  added successfully");
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
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     
         return view('admin.Settings.Edit.ovr_setup_edit',['ovr_all_data'=>ov_setup_model::where('id',$id)->first()]);
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
         
            ov_setup_model::where('id',$id)->first()->fill($request->all())->save();
       
            Session::flash('success',"$request->session_name Information Are Update");
            return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ov_setup_model::where('id',$id)->delete(); 
       
        Session::flash('success','New Session Are Delete');
        return back()->with('success','New Session Are Delete');
    }
}
