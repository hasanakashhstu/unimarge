<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Session;
use Validator;
use  App\component_model ;
use Redirect;
class component extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subject.component',['component_data'=>component_model::all()]);
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
     $component_info=new component_model;
     $validation=Validator::make($request->all(),$component_info->roles_rule());
        if($validation->fails())
        {
             return back()->withInput()->withErrors($validation);
        }else
        {
            $component_data=$request->all();
            $component_data=array_add($component_data,'component_id',time());
            $component_info->fill($component_data)->save();
            
        }
        Session::flash('success'," $request->component_name Information Are Successfully Created");
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
       return view('admin.subject.Edit.component_edit',['component_data'=>component_model::where('component_id',$id)->first()]);
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
      $component_model=new component_model;
        $component_model->where('component_id',$id)->first()->fill($request->all())->save();
         Session::flash('success'," $request->component_name Information Are Successfully Updated");
        return back()->with('success'," $request->component_name Information Are Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        component_model::where('component_id',$id)->delete();
         
        Session::flash('success','Delete Opertaion successfully Completed');
        return Redirect::back();
    }
}
