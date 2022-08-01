<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\unions_model;
use App\ov_setup_model;
use App\upazilas_model;
use App\districts_model;
use App\divisions_model;
use App\manage_faculty_model;
use App\manage_subject_model;
use App\teacher_address_child;
use App\manage_department_model;
use App\teacher_qualification_child;
use Illuminate\Support\Facades\Auth;

class Staff_info extends Controller
{
    public function index()
    {
        abort_unless(Auth::user()->can('create staff'), 403);

        $divisions_data = divisions_model::get();
        $districts_data = districts_model::get();
        $upazilas_data = upazilas_model::get();
        $unions_data = unions_model::get();

        return view('admin.Teacher_Staff.staff_info', ['job_type_data' => ov_setup_model::where('type', 'Job Type')->get(), 'work_department_data' => ov_setup_model::where('type', 'Work Department')->get(), 'medium' => ov_setup_model::where('type', 'Medium')->get(), 'faculty' => manage_faculty_model::get(), 'department' => manage_department_model::groupby('department_name')->get(), 'subject' => manage_subject_model::groupby('subject_name')->get(), 'divisions_data' => $divisions_data, 'districts_data' => $districts_data, 'upazilas_data' => $upazilas_data, 'unions_data' => $unions_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_unless(Auth::user()->can('edit staff'), 403);

        return view('admin.Teacher_Staff.staff_info_edit', ['teacher' => Teacher::where('teacher_id', $id)->first(), 'teacher_address_child' => teacher_address_child::where('parent', $id)->first(), 'teacher_qualification_child' => teacher_qualification_child::where('parent', $id)->first(), 'job_type_data' => ov_setup_model::where('type', 'Job Type')->get(), 'work_department_data' => ov_setup_model::where('type', 'Work Department')->get(), 'medium' => ov_setup_model::where('type', 'Medium')->get(), 'department' => manage_department_model::groupby('department_name')->get(), 'subject' => manage_subject_model::groupby('subject_name')->get(), 'faculty' => manage_faculty_model::get()]);
    }
}
