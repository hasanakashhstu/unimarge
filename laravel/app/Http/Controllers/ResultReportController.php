<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_list_model;
use App\manage_class_model;
use App\students;
use App\manage_mark_general_details_model;
use App\manage_subject_model;
use App\manage_section_model;
use App\manage_department_model;
use App\manage_mark_student_details_model;
Use App\parents_info_model;
use App\exam_grade_model;
use App\general_settings_model;
class ResultReportController extends Controller
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
      
      return view('admin.exam.result_report',['exam_list'=>$exam_list,'class_list'=>$class_list]);
    }
    public function result_show_with_marksheet()
    {
        $exam_list=exam_list_model::where('publish','Yes')->get();
        $class_list=manage_class_model::all();
        return view('admin.exam.result_with_marksheet',['exam_list'=>$exam_list,'class_list'=>$class_list]);
    }

    public function class_w_section_search(Request $request)
    {

        echo "<option value=''>Chose Section Name</option>";
        $section_data=manage_section_model::groupby('section_name')->where('class',$request->class_name)->get();


        foreach($section_data as $section_data_table)
        {
            echo "<option>$section_data_table->section_name</option>";
        }
    }

    public function class_w_department_search(Request $request)
    {

        $department_data=manage_department_model::groupby('department_name')->where('class_name',$request->class_name)->get();
        echo "<option value=''>Chose Department Name</option>";
        foreach($department_data as $department_data_table)
        {
            echo "<option>$department_data_table->department_name</option>";
        }

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
    public function marksheet_report_publish(Request $request)
    {
        $student_info=students::where('roll',$request->student_roll)->first();
        if($student_info)
        {
       $all_subject_get=manage_subject_model::where('class',$request->class_name)
                                            ->where('section',$request->section_name)
                                            ->where('department',$request->Department)
                                            ->get();
       $total_subject=count($all_subject_get);
       $manage_all_data=manage_mark_general_details_model::where('exam_name',$request->exam_name)
                                                         ->where('class_name',$request->class_name)
                                                         ->where('section',$request->section_name)
                                                         ->where('Department',$request->Department)
                                                         ->where('publishing_status','1')
                                                         ->get()
                                                         ->count();
      $school_general_config=general_settings_model::first();
      // return $manage_all_data;
      if($total_subject==$manage_all_data)
      {
          $table="<div  style=\"border: 5px solid gray;margin-top: 30px;\">";

$table.="<div>";
    // $table.="<h1 style=\"text-align: center;margin-top:5%;\" class=\"tec\">Bangladesh Technical Education Borad,Dhaka</h1>";
    $table.="<h3 style=\"text-align: center;margin-top: 2%;\">ACADEMIC TRANSCRIPT</h3>";
$table.="</div>";
$table.="<div>";
    $table.="<h1 style=\"text-align: center;\">$school_general_config->system_name</h1>";
    $table.="<h4 style=\"text-align: center;\">Institute Code :$school_general_config->school_eiin</h4>";
$table.="</div>";

$table.="<div>";
    $table.="<h3 style=\"text-align: center;\">Diploma In Engineering Examination,$student_info->session</h3>";
    $table.="<h4 style=\"text-align: center;\">$request->class_name</h4>";
 
$table.="</div>";
$table.="<div>";
    $table.="<div class=\"col-sm-6\">";
    $table.="<table style=\"width: 100%;margin-top: 10%;\">";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Technology</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->department</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Name</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->student_name</td>";
        $table.="</tr>";
        $table.="<tr>";
        
        $parents_details=parents_info_model::where('parent_id',$student_info->parent_name)->first();
            $parent_name = $parents_details ? $parents_details->name : '';
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Parent's Name</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$parent_name</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Roll.No</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->roll</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Registration No</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->reg_number</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Session</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->session</td>";
        $table.="</tr>";
    $table.="</table>";
    $table.="</div>";
    $table.="<div class=\"col-sm-4\">";
        $table.="<table style=\"float: right;margin-top: -19%%;margin-right: 180px;\">";
            // $table.="<tr>";
            //    $table.="<th>Range of Marks(Percentage)</th>";
            // $table.="</tr>";
            $grade_mark_list=exam_grade_model::groupBy('grade_name')->orderBy('mark_from','DESC')->get();
            // foreach ($grade_mark_list as $key => $grade_mark_list_fetch) {
            //        $table.="<tr>";
            //     $table.="<td>$grade_mark_list_fetch->mark_from and $grade_mark_list_fetch->mark_upto</td>";
            // $table.="</tr>";
            // }
       
          
        $table.="</table>";
    $table.="</div>";
    $table.="<div>";
        $table.="<table style=\"float: right;margin-top: -22%;margin-right: 60px;\">";
            $table.="<tr>";
                $table.="<th>Grade</th>";
                $table.="<th>Point</th>";
            $table.="</tr>";
            foreach ($grade_mark_list as $key => $cgpa_list_fetch) {
                $table.="<tr>";
                $table.="<td>$cgpa_list_fetch->grade_name</td>";
                $table.="<td>$cgpa_list_fetch->grade_point</td>";
                $table.="</tr>";
            }
         $table.="</table>";
     $table.="</div>";
     $table.="<div>";
         $table.="<table class=\"table table-bordered\" style=\"width: 1125px;margin-top: 100px;\">";
            $table.="<tr>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Code</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Subject</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Grade Letter</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Grade Point</th>";
             $table.="</tr>";
             $mark_cgpa_in_array=[];
             foreach ($all_subject_get as $key => $subject_value_fetch) {
                

            $single_general_details=manage_mark_general_details_model::where('exam_name',$request->exam_name)
                                             ->where('class_name',$subject_value_fetch->class)
                                             ->where('section',$subject_value_fetch->section)
                                             ->where('Department',$subject_value_fetch->department)
                                             ->where('subject',$subject_value_fetch->id)
                                             ->first();
            $single_marksheet_grade=manage_mark_student_details_model::where('general_details_id',$single_general_details->general_details_id)->where('roll',$student_info->roll)
                                   ->first();
            
              $mark_cgpa_in_array=array_add($mark_cgpa_in_array,$subject_value_fetch->id,$single_marksheet_grade->cgpa);
             $table.="<tr>";
                 $table.="<td style=\"font-size: 14px;text-align: center;\">$subject_value_fetch->subject_code</td>";
                 $table.="<td style=\"font-size: 14px;text-align: center;\">$subject_value_fetch->subject_name </td>";
                 $table.="<td style=\"font-size: 14px;text-align: center;\">$single_marksheet_grade->grade_name</td>";
                 $table.="<td style=\"font-size: 14px;text-align: center;\">$single_marksheet_grade->cgpa</td>";
             $table.="</tr>";
             }
         $table.="</table>";
     $table.="</div>";


     $table.="<div>";
         $table.="<table style=\"float: right;margin-right: 170px;\">";
         $final_rsult_cgpa=0;
         $sum_cgpa_for_check=0;
         $credit_sum=0;
         foreach ($mark_cgpa_in_array as $key => $mark_cgpa_fetch) {
            if($mark_cgpa_fetch=='0.0')
            {
             $final_rsult_cgpa=0;
             $final_result_status='Fail';
             break;
            }
            else
            {   
                 $find_credit=manage_subject_model::where('id',$key)->first();
                 $credit_sum=$credit_sum+(int)$find_credit->subject_credit;
                 $subject_wise_point_with_credit=(int)$find_credit->subject_credit * $mark_cgpa_fetch ;
                 $sum_cgpa_for_check=$sum_cgpa_for_check+$subject_wise_point_with_credit;
                 $final_rsult_cgpa=round($sum_cgpa_for_check/$credit_sum,2);
                 $final_result_status='Pass';
            }
         }
         
         $table.="<tr>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\"><b>$request->exam_name</b></td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">$final_rsult_cgpa</td>";
         $table.="</tr>";
         $table.="<tr>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">Result</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;background: silver;width: 149px;\"><b>$final_result_status</b></td>";
         $table.="</tr>";
            
         $table.="</table>";
     $table.="</div>";
         $table.="<div style='margin-bottom: 5%;'>";
         $table.="<table style=\"margin-top: 174px;\">";
             $table.="<thead>";
         $table.="<tr>";
             $table.="<th style=\"padding-left: 98px;\"><hr  style=\"border: 1px solid\">Prepeard By</th>";
             $table.="<th style=\"padding-left: 168px;\"><hr style=\"border: 1px solid\">Checked By</th>";
             $table.="<th style=\"padding-left: 180px;\"><hr style=\"border: 1px solid\">Controller of Examination</th>";
             $table.="<th style=\"padding-left: 215px;\"><hr style=\"border: 1px solid\">Principal</th>";
         $table.="</tr>";
         $table.="</thead>";
            
         $table.="</table>";
     $table.="</div>";
    
 $table.="</div>";
 $table.="</div>";
 
       return $table;
       } 
      else
      {
         
            return "Not PUblish Yet";
      }
     }
      else
      {
        return "no reuslt";
      }

    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result_with_marksheet(Request $request)
    {
       $student_info=students::where('roll',$request->student_roll)->first();
        if($student_info)
        {
       $all_subject_get=manage_subject_model::where('class',$request->class_name)
                                            ->where('section',$request->section_name)
                                            ->where('department',$request->Department)
                                            ->get();
       $total_subject=count($all_subject_get);
       $manage_all_data=manage_mark_general_details_model::where('exam_name',$request->exam_name)
                                                         ->where('class_name',$request->class_name)
                                                         ->where('section',$request->section_name)
                                                         ->where('Department',$request->Department)
                                                         ->where('publishing_status','1')
                                                         ->get()
                                                         ->count();
      $school_general_config=general_settings_model::first();
      // return $manage_all_data;
      if($total_subject==$manage_all_data)
      {
          $table="<div style=\"border: 5px solid gray;margin-top: 30px;\">";

$table.="<div>";
    $table.="<h1 style=\"text-align: center;margin-top:5%;\" class=\"tec\">Bangladesh Technical Education Borad,Dhaka</h1>";
    $table.="<h3 style=\"text-align: center;margin-top: 2%;\">ACADEMIC TRANSCRIPT</h3>";
$table.="</div>";
$table.="<div>";
    $table.="<h1 style=\"text-align: center;\">$school_general_config->system_name</h1>";
    $table.="<h4 style=\"text-align: center;\">Institute Code :$school_general_config->school_eiin</h4>";
$table.="</div>";

$table.="<div>";
    $table.="<h3 style=\"text-align: center;\">Diploma In Engineering Examination,$student_info->session</h3>";
    $table.="<h4 style=\"text-align: center;\">$request->class_name</h4>";
 
$table.="</div>";
$table.="<div>";
    $table.="<div class=\"col-sm-6\">";
    $table.="<table style=\"width: 100%;margin-top: 5%;\">";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Technology</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Computer Science & Technology</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Name</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->student_name</td>";
        $table.="</tr>";
        $table.="<tr>";
        
        $parents_details=parents_info_model::where('parent_id',$student_info->parent_name)->first();
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Parent's Name</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$parents_details->name</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Roll.No</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->roll</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Registration No</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->reg_number</td>";
        $table.="</tr>";
        $table.="<tr>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">Session</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
            $table.="<td style=\"font-size: 20px;padding: 10px;\">$student_info->session</td>";
        $table.="</tr>";
    $table.="</table>";
    $table.="</div>";
    $table.="<div class=\"col-sm-4\">";
        $table.="<table style=\"float: right;\">";
            $table.="<tr>";
               $table.="<th>Range of Marks(Percentage)</th>";
            $table.="</tr>";
            $grade_mark_list=exam_grade_model::orderBy('mark_from','DESC')->get();
            foreach ($grade_mark_list as $key => $grade_mark_list_fetch) {
                   $table.="<tr>";
                $table.="<td>$grade_mark_list_fetch->mark_from and $grade_mark_list_fetch->mark_upto</td>";
            $table.="</tr>";
            }
       
          
        $table.="</table>";
    $table.="</div>";
    $table.="<div>";
        $table.="<table style=\"float: right;margin-right: 92px;\">";
            $table.="<tr>";
                $table.="<th>Grade</th>";
                $table.="<th>Point</th>";
            $table.="</tr>";
            foreach ($grade_mark_list as $key => $cgpa_list_fetch) {
                $table.="<tr>";
                $table.="<td>$cgpa_list_fetch->grade_name</td>";
                $table.="<td>$cgpa_list_fetch->grade_point</td>";
                $table.="</tr>";
            }
         
         
         $table.="</table>";
     $table.="</div>";
     $table.="<div>";
         $table.="<table class=\"table table-bordered\" style=\"width: 1125px;margin-top: 35px;\">";
            $table.="<tr>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Code</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Subject</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Grade Letter</th>";
                 $table.="<th style=\"font-size: 20px;text-align: center;\">Grade Point</th>";
             $table.="</tr>";
             $mark_cgpa_in_array=[];
             foreach ($all_subject_get as $key => $subject_value_fetch) {
         
               
            $single_general_details=manage_mark_general_details_model::where('exam_name',$request->exam_name)
                                             ->where('class_name',$subject_value_fetch->class)
                                             ->where('section',$subject_value_fetch->section)
                                             ->where('Department',$subject_value_fetch->department)
                                             ->where('subject',$subject_value_fetch->id)
                                             ->first();
            $single_marksheet_grade=manage_mark_student_details_model::where('general_details_id',$single_general_details->general_details_id)->where('roll',$student_info->roll)
                                   ->first();
              $mark_cgpa_in_array=array_add($mark_cgpa_in_array,$subject_value_fetch->subject_name,$single_marksheet_grade->cgpa);
             $table.="<tr>";
                 $table.="<td style=\"font-size: 20px;text-align: center;\">$subject_value_fetch->subject_code</td>";
                 $table.="<td style=\"font-size: 20px;text-align: center;\">$subject_value_fetch->subject_name </td>";
                 $table.="<td style=\"font-size: 20px;text-align: center;\">$single_marksheet_grade->grade_name</td>";
                 $table.="<td style=\"font-size: 20px;text-align: center;\">$single_marksheet_grade->cgpa</td>";
             $table.="</tr>";
             }
         $table.="</table>";
     $table.="</div>";


     $table.="<div>";
         $table.="<table style=\"float: right;margin-right: 170px;\">";
         $final_rsult_cgpa=0;
         $sum_cgpa_for_check=0;
         foreach ($mark_cgpa_in_array as $key => $mark_cgpa_fetch) {
            if($mark_cgpa_fetch=='0.0')
            {
             $final_rsult_cgpa=0;
             $final_result_status='Fail';
             break;
            }
            else
            {
                 $sum_cgpa_for_check=$sum_cgpa_for_check+$mark_cgpa_fetch;
                 $final_rsult_cgpa=round($sum_cgpa_for_check/$total_subject,2);
                 $final_result_status='Pass';
            }
         }
         $table.="<tr>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\"><b>$request->exam_name</b></td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">$final_rsult_cgpa</td>";
         $table.="</tr>";
         $table.="<tr>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">Result</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;\">:</td>";
             $table.="<td style=\"font-size: 20px;padding: 10px;background: silver;width: 149px;\"><b>$final_result_status</b></td>";
         $table.="</tr>";
            
         $table.="</table>";
     $table.="</div>";
         $table.="<div>";
         $table.="<table style=\"margin-top: 174px;\">";
             $table.="<thead>";
         $table.="<tr>";
             $table.="<th style=\"padding-left: 98px;\"><hr  style=\"border: 1px solid\">Prepeard By</th>";
             $table.="<th style=\"padding-left: 168px;\"><hr style=\"border: 1px solid\">Checked By</th>";
             $table.="<th style=\"padding-left: 180px;\"><hr style=\"border: 1px solid\">Controller of Examination</th>";
             $table.="<th style=\"padding-left: 215px;\"><hr style=\"border: 1px solid\">Principal</th>";
         $table.="</tr>";
         $table.="</thead>";
            
         $table.="</table>";
     $table.="</div>";
    
 $table.="</div>";
 $table.="</div>";
 
       return view('admin.exam.marksheet_view',['with_marksheet'=>$table,'not_published'=>'','no_result'=>'']);
       } 
      else
      {
         return view('admin.exam.marksheet_view',['not_published'=>"Not PUblish Yet",'no_result'=>'','with_marksheet'=>'']);
      }
     }
      else
      {
        return view('admin.exam.marksheet_view',['no_result'=>"no reuslt",'not_published'=>'','with_marksheet'=>'']);
        
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
