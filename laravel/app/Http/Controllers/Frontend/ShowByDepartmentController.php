<?php

namespace App\Http\Controllers\Frontend;

use App\Activity;
use App\DepartmentContact;
use App\DepartmentContent;
use App\Http\Controllers\Controller;
use App\manage_department_model;
use App\Officer;
use App\Schollership;
use App\teacher_model;
use Illuminate\Http\Request;

class ShowByDepartmentController extends Controller
{
    public function contact(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['departmentContact'] = DepartmentContact::where('department_id', $department->id)->first();

        return view('website.show_by_department.contact', $data);
    }

    public function publications(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['teachers'] = teacher_model::where('department_id', $department->id)->latest()->paginate(10);

        return view('website.show_by_department.publications', $data);
    }

    public function officer(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['officer'] = Officer::where('department_id', $department->id)->first();

        return view('website.show_by_department.officer', $data);
    }

    public function activities(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['activities'] = Activity::where('department_id', $department->id)->latest()->get();

        return view('website.show_by_department.activities', $data);
    }

    public function schollerships(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['schollerships'] = Schollership::where('department_id', $department->id)->latest()->get();

        return view('website.show_by_department.schollerships', $data);
    }

    public function contents(Request $request, manage_department_model $department)
    {
        $data['type'] = $request->query('type');
        $data['typeName'] = str_replace('_', ' ', $data['type']);
        $data['department'] = $department;
        $data['departmentContents'] = DepartmentContent::where('department_id', $department->id)->where('type', $data['type'])->latest()->get();

        return view('website.show_by_department.contents', $data);
    }

    public function awardHonours(manage_department_model $department)
    {
        $data['department'] = $department;
        $data['teachers'] = teacher_model::where('department_id', $department->id)->latest()->paginate(10);

        return view('website.show_by_department.award_honours', $data);
    }
}
