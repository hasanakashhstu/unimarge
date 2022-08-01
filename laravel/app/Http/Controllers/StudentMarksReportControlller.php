<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_list_model;
use App\manage_class_model;
use App\ov_setup_model;
use App\students;
use App\manage_mark_general_details_model;
use App\manage_mark_student_details_model;
use App\manage_subject_model;
use App\manage_mark_component_details_model;
use Helper;
use Session;
class StudentMarksReportControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_list=exam_list_model::where('publish','Yes')->get();
        $class_list=manage_class_model::all();
        $session=ov_setup_model::where('type','Session')->get();
        return view('admin.Report.students_marks_report',['exam_list'=>$exam_list,'class_list'=>$class_list,'session'=>$session]);
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
        // echo "<pre>";
        // print_r($request->all());

        $mark_general_details=manage_mark_general_details_model::where('exam_name',$request->exam_name)
        ->where('class_name',$request->class_name)
        ->where('section',$request->section)
        ->where('Department',$request->department_name)
        ->where('default_session',$request->session)
        ->get()->toArray();
        $mark_general_id=collect($mark_general_details)->pluck('general_details_id')->toArray();
        $general_id_wise_student_get=manage_mark_student_details_model::whereIn('general_details_id',$mark_general_id)->get()->toArray();
        $mark_wise_student=collect($general_id_wise_student_get)->pluck('roll')->unique()->toArray();

        $students_info=students::where('class',$request->class_name)
        ->where('section',$request->section)
        ->where('department',$request->department_name)
        ->where('session',$request->session)
        ->whereIn('roll',$mark_wise_student)
        ->get();

        $get_subjects=manage_subject_model::where('class',$request->class_name)
        ->where('department',$request->department_name)
        ->where('section',$request->section)
        ->get();

        $mark_components_value=manage_mark_component_details_model::whereIn('general_details_id',$mark_general_id)
        ->whereIn('roll',$mark_wise_student)
        ->get()
        ->toArray();



        $table='';
        $table.="<table style=\"margin-top: 60px;border: 0px solid gray;width: 95%;\">";

        $table.="<tbody>";
        $table.="<tr>";
            $table.="<td rowspan=\"2\">";
                $table.="<h2 style=\"margin-left: 20%;\">&nbsp;".Session::get('school.system_name')."</h2>";
                $table.="<br>";
                $table.="<h4 style=\"margin-left: 42%;margin-top: -20px;\">School EIIN: ".Session::get('school.school_eiin')."</h4>";
                $table.="<br>";
                $table.="<h4 style=\"margin-left: 35%;margin-top: -30px;\"> ".Session::get('school.address')."</h4>";
                $table.="</td>";
        $table.="</tr>";
        $table.="</tbody>";
        $table.="</table>";
        $table.="<h5>Semester :".$request->class_name."</h5>";
        $table.="<h5>Technology Name :".$request->department_name."</h5>";
        $table.="<h5>Institute Code :".Session::get('school.school_eiin')."</h5>";
        $table.="<h5>Institute :".Session::get('school.system_name')."</h5>";
        $table.="<h5>Session :".$request->session."</h5>";
        $table.="<table class='main_table' border=\"1\" style=\"width: 1113px;margin-top: 30px;\">";
        $table.="<thead>";
            $table.="<tr>";
              $table.="<th rowspan=\"7\">SL. No.</th>";
              $table.="<th rowspan=\"7\" >Roll No</th>";
              $table.="<th rowspan=\"2\">Subjects</th>";
              foreach ($get_subjects as $key => $get_subjects_number)
              {
                        $key=$key+1;
                        $table.="<th colspan=\"4\">$key</th>";
              }
   
              $table.="<th rowspan=\"7\" >GPA</th>";
              $table.="<th rowspan=\"7\" >Grade</th>";
            $table.="</tr>";

            
            $table.="<tr>";
            foreach ($get_subjects as $key => $get_subjects_value)
            {
                $table.="<th colspan=\"4\">$get_subjects_value->subject_name</th>";
            }
              
            $table.="</tr>";
            $table.="<tr>";
               $table.="<th rowspan=\"5\" >Name of The Students</th>";
                foreach ($get_subjects as $key => $get_subjects_value)
                {
                       $table.="<th>Subject Code</th>";
                       $table.="<th>T</th>";
                       $table.="<th>P</th>";
                       $table.="<th>C</th>";
                }
            $table.="</tr>";
            $table.="<tr>";
            foreach ($get_subjects as $key => $get_subjects_value)
            {
                  $table.="<th >$get_subjects_value->subject_code</th>";
                  $table.="<th >3</th>";
                  $table.="<th >3</th>";
                  $table.="<th >$get_subjects_value->subject_credit</th>";
            }

            $table.="</tr>";
            $table.="<tr>";
            foreach ($get_subjects as $key => $get_subjects_value)
            {
                  $components=
                  $table.="<th rowspan=\"2\">TC</th>";
                  $table.="<th colspan=\"2\" rowspan=\"2\">TF</th>";
                  $table.="<th>Total</th>";
            }

            $table.="</tr>";
            $table.="<tr>";
            foreach ($get_subjects as $key => $get_subjects_value)
            {
                   $table.="<th>LG</th>";
            }
              
            $table.="</tr>";
            
            $table.="<tr>";
            foreach ($get_subjects as $key => $get_subjects_value)
            {
                  $table.="<th>PC</th>";
                  $table.="<th colspan=\"2\">PF</th>";
                  $table.="<th>GP</th>";
            }

            $table.="</tr>";



        $table.="</thead>";
        $table.="<tbody>";



        //Data Start Here
        $student_gpa=0;
        foreach ($students_info as $key => $students_info_value) {


          

                  $sum_gpa=0;
                  $key++;
                   $table.="<tr>";
                    $table.="<td rowspan='3'>$key</td>";
                    $table.="<td rowspan='3'>$students_info_value->roll</td>";
                    $table.="<td rowspan='3'>$students_info_value->student_name</td>";
                    foreach ($get_subjects as $key => $get_subjects_value)
                    {

                        $general_details_wise_subject=collect($mark_general_details)
                            ->where('subject',$get_subjects_value->id)
                            ->first();
                            $total_value=collect($mark_components_value)
                            ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                            ->where('roll',$students_info_value->roll)
                            ->sum('component_mark');

                            $tc_mark_value=collect($mark_components_value)
                            ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                            ->where('component_name','TC')
                            ->where('roll',$students_info_value->roll)
                            ->first();
                            $tf_mark_value=collect($mark_components_value)
                            ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                            ->where('component_name','TF')
                            ->where('roll',$students_info_value->roll)
                            ->first();
                            $table.="<td rowspan='2'>".$tc_mark_value['component_mark']."</td>";
                            $table.="<td colspan='2' rowspan='2'>".$tf_mark_value['component_mark']."</td>";
                            $table.="<td>$total_value</td>";

                            $point=collect($general_id_wise_student_get)
                           ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                           ->where('roll',$students_info_value->roll)
                           ->first();
                           $sum_gpa=$sum_gpa+($point['cgpa']*$get_subjects_value->subject_credit);

                    }
                    $total_credit=collect($get_subjects)->sum('subject_credit');
                    $actual_gpa=round($sum_gpa/$total_credit,2);
                    $table.="<td rowspan='3'>".$actual_gpa."</td>";
                    $table.="<td rowspan='3'>".Helper::FindGrade($actual_gpa)."</td>";
                $table.="</tr>";
                 $table.="<tr>";
                 foreach ($get_subjects as $key => $get_subjects_value)
                 {
                     $general_details_wise_subject=collect($mark_general_details)
                        ->where('subject',$get_subjects_value->id)
                        ->first();

                      $letter_grade=collect($general_id_wise_student_get)
                       ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                       ->where('roll',$students_info_value->roll)
                       ->first();
                      $table.="<td>".$letter_grade['grade_name']."</td>";
                 }
                $table.="</tr>";
                 $table.="<tr>";
                 foreach ($get_subjects as $key => $get_subjects_value)
                 {

                    $general_details_wise_subject=collect($mark_general_details)
                    ->where('subject',$get_subjects_value->id)
                    ->first();
                    $pc_mark_value=collect($mark_components_value)
                    ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                    ->where('component_name','PC')
                    ->where('roll',$students_info_value->roll)
                    ->first();
                    $pf_mark_value=collect($mark_components_value)
                    ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                    ->where('component_name','PF')
                    ->where('roll',$students_info_value->roll)
                    ->first();

                     $point=collect($general_id_wise_student_get)
                       ->where('general_details_id',$general_details_wise_subject['general_details_id'])
                       ->where('roll',$students_info_value->roll)
                       ->first();

                    $table.="<td>".$pc_mark_value['component_mark']."</td>";
                    $table.="<td colspan='2'>".$pf_mark_value['component_mark']."</td>";
                    $table.="<td>".$point['cgpa']."</td>";

                 }


                    
                $table.="</tr>";
        }



        $table.="</tbody>";
    $table.="</table>";
    $table.="<table style=\"margin-top: 5%;\">
        <thead>
            <tr>
                <th style=\"padding-left: 98px;\">
                <hr style=\"border: 1px solid\">Signature & Date Of Tabulator
                </th>
                <th style=\"padding-left: 168px;\">
                <hr style=\"border: 1px solid\">Signature & Date Of Controller Of Examinations
                </th>
                <th style=\"padding-left: 215px;\">
                <hr style=\"border: 1px solid\">Signature & Date Of Principal
                </th>
            </tr>
        </thead>
        </table>";

    echo $table;

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
