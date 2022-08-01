<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\manage_section_model;
use Session;
use Validator;
use App\teacher_model;
use Redirect;
class manage_section extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.class.manage_section',['class_list'=>manage_class_model::orderBy('numeric_name', 'asc')->get(),'section_list'=>manage_section_model::all(),'groupby_class'=>manage_section_model::groupby('class')->get(),'teacher_info'=>teacher_model::where('status','Teacher')->get()]);
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
//        dd($request->all());
        $manage_section=new manage_section_model;
        $manage_section->fill($request->all())->save();
        print_r($request->all());
        Session::flash('success'," $request->section_name Information Are Successfully Inserted");
        return Redirect::back();

        $check_section_find=$manage_section->where('section_name',$request->section_name)->where('class',$request->class)->first();
        if($check_section_find)
        {
            Session::flash('error',"This Class have This Section Already");
            return Redirect::back();
        }
        else
        {
            $validation=validator::make($request->all(),$manage_section->validation());
            if($validation->fails())
            {   
                return back()->withInput()->withErrors($validation);
            }
            else
            {
                $manage_section->fill($request->all())->save();
                print_r($request->all());
                Session::flash('success'," $request->section_name Information Are Successfully Inserted");
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
        return view('admin.class.Edit.manage_section_edit',['class_list_data'=>manage_class_model::all(),'section_list'=>manage_section_model::where('id',$id)->first(),'teacher_info'=>teacher_model::where('status','Teacher')->get()]);
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
        $manage_section=new manage_section_model;
        $validation=validator::make($request->all(),$manage_section->validation());
        if($validation->fails())
        {   
            return back()->withInput()->withErrors($validation);
        }
        else
        {
            $check_section_find=$manage_section->where('section_name',$request->section_name)->where('class',$request->class)->get();
            if($check_section_find)
            {
                Session::flash('error',"This Class have This Section Already");
                return Redirect::back();
            }
            else
            {
         

                manage_section_model::where('id',$id)->first()->fill($request->all())->save();
               Session::flash('success',"Section $request->section_name Information Are Successfully Update");
                return Redirect::back();
            }
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
        manage_section_model::where('id',$id)->delete();
         session()->flash('success', "Delete Operation Successfully Completed");
        return back()->with('success',"Delete Operation Successfully Completed");
    }
}

