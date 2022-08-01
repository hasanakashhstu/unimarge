<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_list_model;
use App\manage_class_model;
use App\general_settings_model;
use App\manage_mark_general_details_model;
use App\manage_subject_model;
use App\students;
use App\manage_mark_student_details_model;
use Session;
use App\ov_setup_model;
class SubjectWisePublishMarks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session=ov_setup_model::where('type','Session')->get();
        return view('admin.exam.subject_wise_publish_marks',['exam_data'=>exam_list_model::where('publish','Yes')->get(),'class_data'=>manage_class_model::all(),'general_settings'=>general_settings_model::first(),'session'=>$session]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish_marks_get(Request $request)
    {


    $all_subjcet=manage_subject_model::where('class',$request->class_name)
                                     ->where('section',$request->section)
                                     ->where('department',$request->Department_info)
                                     ->get();

      $total_student=students::where('class',$request->class_name)
                             ->where('section',$request->section)
                             ->where('department',$request->Department_info)
                             ->where('session',$request->default_session)
                             ->get()
                             ->count();

    $table="<div  class=\"col-xs-12\" >";
       $table.="<table style=\"width: 25%; border: 1px solid;\" class=\"table\">";
           $table.="<tr>";
               $table.="<td><b>Exam Name</b></td>";
               $table.="<td class=\"exam_name_in_view\">$request->exam_name</td>";
              
           $table.="</tr>";

          $table.=" <tr>";
              $table.="<td><b>Class Name</b></td>";
               $table.="<td class=\"class_name_in_view\">$request->class_name</td>";
              
           $table.="</tr>";

           $table.="<tr>";
               $table.="<td><b>Section Name</b></td>";
              $table.="<td class=\"section_name_in_view\">$request->section</td>";
              
          $table.="</tr>";

          $table.="<tr>";
               $table.="<td><b>Department Name</b></td>";
               $table.="<td class=\"department_name_in_view\">$request->Department_info</td>";
               $table.="</tr>";
                  $table.="<tr>";
               $table.="<td><b>Default Session</b></td>";
               $table.="<td class=\"department_name_in_view\">$request->default_session</td>";
               $table.="</tr>";
              
          $table.="</tr>";
             $table.="<tr>";
               $table.="<td><b>Total Student</b></td>";
               $table.="<td class=\"total_student_in_view\">$total_student</td>";
              
          $table.="</tr>";
      $table.="</table>";
   $table.="</div>";
             
     

  
       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
           $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Teacher Name</th>";

            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Mark Entry Completed</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Completed  Parcentage</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Incompleted Parcentage</th>";
             
            $table.="</tr>";
        $table.="</thead>";

        $table.="<tbody>";
        $incompleted_parcent_in_array=[];
        $publish_status_in_array=[];
        $total_subject=count($all_subjcet);
         foreach ($all_subjcet as $key => $value_fetch) {
                      
                 $id=$key+1; 

          $marks_general_get=manage_mark_general_details_model::where('exam_name',$request->exam_name)
                                                              ->where('class_name',$request->class_name)
                                                              ->where('section',$request->section)
                                                              ->where('Department',$request->Department_info)
                                                              ->where('default_session',$request->default_session)
                                                              ->where('subject',$value_fetch->id)
                                                              ->first();
            
                  if( $marks_general_get)
                  {
                  $subject_wise_total_student=manage_mark_student_details_model::where('general_details_id',$marks_general_get->general_details_id)->get()->count();
                  $completed_parcent=round($subject_wise_total_student*100/$total_student,2);
                  $incompleted_parcent=round(100-$completed_parcent,2);
                  
                  $publish_status_in_array=array_add( $publish_status_in_array,$marks_general_get->subject,$marks_general_get->publishing_status);
                 }
                 else
                 {
                   $subject_wise_total_student=0;
                   $completed_parcent=0;
                   $incompleted_parcent=0;
                
                 }
            
             $table.="<tr>";
                $table.="<td style=\"height: 29px;\">$id</td>";
                 $table.="<td style=\"height: 29px;\">";
                   $table.="$value_fetch->subject_name ";
                if( $marks_general_get)
                   {
                    $table.="<input type=\"hidden\" value=\"$marks_general_get->general_details_id\" name=\"exam_name_id[]\">";
                   }
                 else
                   {
                      $table.="<input type=\"hidden\" value=\"\" name=\"exam_name_id[]\">";
                    }
                 $table.="</td>";
                $table.="<td style=\"height: 29px;\">$value_fetch->teacher</td>";
                $table.="<td style=\"height: 29px; text-align:center;\">$subject_wise_total_student</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$completed_parcent %</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$incompleted_parcent %</td>";

               $incompleted_parcent_in_array=array_add($incompleted_parcent_in_array,$id,$subject_wise_total_student);
             
            $table.="</tr>";
              }
             $table.="<tr>";
             $sum=0;
             foreach ($incompleted_parcent_in_array as $key => $fetch_array_data) 
             {
               $sum=$sum+$fetch_array_data;
             }
              $total_student_all_subject=$total_student*$total_subject;
              $total_subject_publish=count($publish_status_in_array);
                   
             $table.="<td colspan=\"6\" style=\" height:40px;text-align:center;\">";
             
             //dd($sum, $total_student_all_subject, $total_subject, $total_subject_publish);
             if($sum==$total_student_all_subject and  $total_subject==$total_subject_publish)
             {
               
                $table.="<button type=\"submit\" class=\"btn btn-success\" id=\"submit_button\" ><i class=\"fa fa-thumbs-up\" aria-hidden=\"true\"></i>Publish</button>";
             }
             else
             {
              $table.="<button type=\"submit\" class=\"btn btn-success\" id=\"submit_button\" disabled><i class=\"fa fa-thumbs-up\" aria-hidden=\"true\"></i>Publish</button>";
             }
   

           $table.="</td>";
            $table.="</tr>";
        $table.="</tbody>";
         $table.="</table>";
          
      return $table;


    }
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
        $exam_id_in_array=$request->exam_name_id;
        

        foreach ($exam_id_in_array as $key => $value) 
        {
               if($value!='')
               {
                $get_general_data=manage_mark_general_details_model::where('general_details_id',$value)->first();
                if($get_general_data->publishing_status == '0')
                {
                    manage_mark_general_details_model::where('general_details_id',$value)->update([
                    'publishing_status'=>'1'

                     ]);
                }

               }
               
        }

          Session::flash('success',"Publish Succesfully Completed");
          return back(); 
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
