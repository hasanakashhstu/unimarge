<?php

namespace App\Http\Controllers;

use App\manage_class_model;
use App\manage_faculty_model;
use App\ov_setup_model;
use App\teacher_model;
use Illuminate\Http\Request;
use Session;
use Validator;

class Manage_facultyController extends Controller
{
    public function index()
    {
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $chairperson = teacher_model::where('status', 'teacher')->orderBy('sort_index', 'ASC')->get();

        $faculty = manage_faculty_model::latest('faculty_id')->get();

        return view('admin.class.manage_faculty', ['class_list' => manage_class_model::all(), 'faculty' => $faculty, 'medium' => $medium, 'chairperson' => $chairperson]);
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

        $manage_faculty = new manage_faculty_model;

        $check_data_validatin = $manage_faculty->where('faculty_name', $request->faculty_name)->orwhere('faculty_code', $request->faculty_code)->first();
        //dd($request->all(),$check_data_validatin);
        //$check_dep=$manage_faculty->where('class_name',$request->class_name)->pluck('department_code')->toArray();
        if ($check_data_validatin) {
            Session::flash('error', "This Department on This Semester Already here :) ");
            return back()->withInput();
        } else {
            $validation = Validator::make($request->all(), $manage_faculty->validation_rule());
            if ($validation->fails()) {
                return back()->withInput()->withErrors($validation);
            } else {
                $manage_faculty->fill($request->all())->save();
                Session::flash('success', "New Faculty Information Are Succesfully Inserted");
                return back()->withInput();
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
        $medium = ov_setup_model::where('type', 'Medium')->get();

        $faculty_info = manage_faculty_model::findOrFail($id);

        $chairperson = teacher_model::where('status', 'teacher')->orderBy('sort_index', 'ASC')->get();

        return view('admin.class.Edit.manage_faculty_edit', ['faculty_info' => $faculty_info, 'class_list' => manage_class_model::all(), 'medium' => $medium, 'chairperson' => $chairperson]);
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
        $manage_faculty = new manage_faculty_model;

        $validation = Validator::make($request->all(), $manage_faculty->validation_rule());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $manage_faculty::where('faculty_id', $id)->first()->fill($request->all())->save();
            Session::flash('success', "$request->Faculty name Information Are Succesfully Updated");
            return back()->with('success', "$request->department_name Information Are Succesfully Updated");
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
        manage_faculty_model::where('faculty_id', $id)->delete();
        Session::flash('success', "Delete Operation Succesfully Completed");
        return back()->with('success', "Delete Operation Succesfully Completed");
    }
}
