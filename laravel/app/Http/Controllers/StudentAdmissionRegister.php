<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\aplicant_student_model;
use App\applicant_student_child_model;
use App\manage_class_model;
use App\manage_department_model;
use App\ov_setup_model;
use Illuminate\Support\Facades\Input;

class StudentAdmissionRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session=ov_setup_model::where('type','Session')->get();             
        $batch=ov_setup_model::where('type','Batch')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $dept_data=manage_department_model::all();
        $search=manage_class_model::all();
        $student_data=aplicant_student_model::all();
        return view('admin.Report.student_admission_register_report',['student_data'=>$student_data,'search'=>$search,'dept_data'=>$dept_data,'batch'=>$batch,'shift'=>$shift,'session'=>$session,'table'=>'']);
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
         @$student=aplicant_student_model::join('applicant_student_child','applicant_student_child.parent','=','applicant_student.applicant_id')->where(function($student){
                    
                     if(Input::get('applicant_id'))
                     {
                        $student->where('applicant_id',Input::get('applicant_id'));
                     }
                     if(Input::get('student_name'))
                     {
                        $student->where('student_name',Input::get('student_name'));
                     }
                     if(Input::get('session'))
                     {
                        $student->where('session',Input::get('session'));
                     }
                     if(Input::get('class'))
                     {
                        $student->where('class',Input::get('class'));
                     }
                     if(Input::get('department'))
                     {
                        $student->where('department',Input::get('department'));
                     }
                     if(Input::get('batch'))
                     {
                        $student->where('batch',Input::get('batch'));
                     }
                      if(Input::get('shift'))
                     {
                        $student->where('shift',Input::get('shift'));
                     }
                      if(Input::get('gender'))
                     {
                        $student->where('gender',Input::get('gender'));
                     }
                     if(Input::get('all'))
                     {
                        $student->where('applicant_id', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('student_name', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('session', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('class', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('department', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('batch', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('shift', 'LIKE', '%' . Input::get('all'). '%');
                        $student->orwhere('gender', 'LIKE', '%' . Input::get('all'). '%');
                     }
        })->get();

        $table="<table  border=\"1\" cellspacing=\"0\" style=\"width: 1215px;margin-top: 48px;height: 76px;\">";
        $table.="<thead>";
        $table.="<tr>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Applicant Id</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Student Name</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Parents Name</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Session</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Department</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Batch</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Shift</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Class</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Phone</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\"> Address</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Gender</div></th>";
            $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'><div align=\"center\">Application Date</div></th>";
        $table.="</thead>";
        $table.="<tbody>";
        
       

        foreach ($student as  $value) {
            $table.="<tr>";
                $table.="<td><div align=\"center\">$value->applicant_id</div></td>";
                $table.="<td><div align=\"center\">$value->student_name</div></td>";
                $table.="<td><div align=\"center\">$value->parent_name</div></td>";
                $table.="<td><div align=\"center\">$value->session</div></td>";
                $table.="<td><div align=\"center\">$value->department</div></td>";
                $table.="<td><div align=\"center\">$value->batch</div></td>";
                $table.="<td><div align=\"center\">$value->shift</div></td>";
                $table.="<td><div align=\"center\">$value->class</div></td>";
                $table.="<td><div align=\"center\">$value->phone</div></td>";
                $table.="<td><div align=\"center\">$value->village_name,$value->post_office,$value->home_district,$value->division</div></td>";
                $table.="<td><div align=\"center\">$value->gender</div></td>";
                $table.="<td><div align=\"center\">$value->created_at</div></td>";
            $table.="</tr>";
        }
         $table.="</tbody>";
         $table.="</table>";

        $session=ov_setup_model::where('type','Session')->get();             
        $batch=ov_setup_model::where('type','Batch')->get();
        $shift=ov_setup_model::where('type','Shift')->get();
        $dept_data=manage_department_model::all();
        $search=manage_class_model::all();
        $student_data=aplicant_student_model::all();
         return view('admin.Report.student_admission_register_report',['student_data'=>$student_data,'search'=>$search,'dept_data'=>$dept_data,'batch'=>$batch,'shift'=>$shift,'session'=>$session,'table'=>$table]);
        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
