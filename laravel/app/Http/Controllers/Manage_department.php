<?php

namespace App\Http\Controllers;

use Session;
use Validator;
use App\ov_setup_model;
use App\manage_class_model;
use Illuminate\Http\Request;
use App\manage_faculty_model;
use App\manage_department_model;
use App\Services\StorageService;
use Illuminate\Support\Facades\Storage;

class Manage_department extends Controller
{
    use StorageService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:MANAGE_DEPARTMENT');
    }
    public function index()
    {
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $faculty = manage_faculty_model::get();
        $department = manage_department_model::all();

        return view('admin.class.manage_department', ['class_list' => manage_class_model::all(), 'department' => $department, 'medium' => $medium, 'faculty' => $faculty]);
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

        $manage_department = new manage_department_model;
        $check_data_validatin = $manage_department->where('department_name', $request->department_name)->where('class_name', $request->class_name)->first();
        $check_dep = $manage_department->where('class_name', $request->class_name)->pluck('department_code')->toArray();
        if ($check_data_validatin) {
            Session::flash('error', "This Department on This Semester Already here :) ");
            return back()->withInput();
        }
        if (in_array($request->department_code, $check_dep)) {
            Session::flash('error', "Department Code Already Exists For This Semester");
            return back()->withInput();
        } else {
            $validation = Validator::make($request->all(), $manage_department->validation_rule());
            if ($validation->fails()) {
                return back()->withInput()->withErrors($validation);
            } else {
                $requested_data = $request->all();

                if ($request->hasfile('image')) {
                    $requested_data['image'] = $this->uploadFile($request->file('image'), 'department');
                }

                $manage_department->fill($requested_data)->save();
                Session::flash('success', "New Department Information Are Succesfully Inserted");
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
    public function edit(manage_department_model $manage_department)
    {
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $faculty = manage_faculty_model::get();
        $class_list = manage_class_model::all();

        return view('admin.class.Edit.manage_department_edit', [
            'manage_department' => $manage_department, 
            'class_list' => $class_list, 
            'medium' => $medium, 
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, manage_department_model $manage_department)
    {
        $validation = Validator::make($request->all(), $manage_department->validation_edit_rule());
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        } else {
            $requested_data = $request->all();
            if ($request->hasfile('image')) {
                $requested_data['image'] = $this->uploadFile($request->file('image'), 'department', $manage_department->image);
            }

            $manage_department->fill($requested_data)->save();
            
            Session::flash('success', "$request->department_name Information Are Succesfully Updated");
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
        manage_department_model::where('id', $id)->delete();
        Session::flash('success', "Delete Operation Succesfully Completed");
        return back()->with('success', "Delete Operation Succesfully Completed");
    }
}
