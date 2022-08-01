<?php

namespace App\Http\Controllers;

use App\manage_mark_component_details_model;
use App\manage_mark_general_details_model;
use App\ov_setup_model;
use Illuminate\Http\Request;
use App\exam_list_model;
use App\manage_class_model;
use App\manage_mark;
use App\manage_mark_child;
use App\general_settings_model;
use App\exam_grade_model;

use Redirect;

class check_marks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['exam_data'] = exam_list_model::where('publish', 'Yes')->get();
        $data['class_data'] = manage_class_model::all();
        $sessions = ov_setup_model::where('type', 'Session')->get();
        foreach ($sessions as $session){
            $data['sessions'][$session->type_name] = $session->type_name;
        }
        return view('admin.exam.check_marks_report', $data);
    }
    
    public function update_mark(Request $request)
    {
        $student_wise_mark_data = manage_mark_child::where('roll', $request->roll)->update(['mark' => $request->mark]);
        $exam_grade_value = exam_grade_model::all();
        $find_grade = "0.0";
        $find_grade_name = "Fail";
        foreach ($exam_grade_value as $value) {
            
            if ($request->mark >= $value->mark_from and $request->mark <= $value->mark_upto) {
                $find_grade = $value->grade_point;
                $find_grade_name = $value->grade_name;
                manage_mark_child::where('roll', $request->roll)->update(['cgpa' => $value->grade_point]);
                manage_mark_child::where('roll', $request->roll)->update(['grade_name' => $value->grade_name]);
            }
        }
        $grade_name_grade_pont = [$find_grade, $find_grade_name];
        return $grade_name_grade_pont;
        
        
    }
    
    public function check_marks_delete($id)
    {
        return manage_mark_child::where('roll', $id)->delete();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function show_tabulize_data(Request $request)
    {
        $data = manage_mark_general_details_model::leftJoin('mark_student_details', 'mark_general_details.general_details_id','=','mark_student_details.general_details_id')
            ->where('mark_general_details.exam_name', $request->exam_name)
            ->where('mark_general_details.class_name', $request->class_name)
            ->where('mark_general_details.section', $request->section)
            ->where('mark_general_details.subject', $request->subject)
            ->where('mark_general_details.Department', $request->Department_info)
            ->get();
        
        $all_data = [];
        
        foreach ($data as $key => $value){
            $all_data[$key] = $value;
            $all_data[$key]['mark'] = manage_mark_component_details_model::where('general_details_id', $value->general_details_id)->where('roll', $value->roll)->sum('component_mark');;
        }
        
    
        return $data;
        
    }
    
    
    public function student_marks(Request $request)
    {
        
        $result_entry_student = DB::table('manage_mark')
            ->join('manage_mark_child', 'manage_mark.exam_name', '=', 'manage_mark_child.parents')
            ->Where('manage_mark.subject', $request->subject);
        
        
        print_r($result_entry_student);
        
        //      $table.="<tbody>";
        
        //        foreach ($result_entry_student as $value) {
        
        //                 $table.="<tr>";
        //                  // $table.="<td>$i</td>";
        //                  $table.="<td>$value->roll</td>";
        //                  // $table.="<td>$value->student_name</td>";
        
        //                  // $table.="<td id='result_mark_ovi'><input  type=\"text\" class=\"marks\"></td>";
        //                  // // $table.="<th>Garde</th>";
        //                  // //   $table.="<th>CGP</th>";
        //                  // $table.="<td><input class='comment' type=\"text\"></td>";
        
        //                // $table.="</tr>";
        //                // $i++;
        //         }
        //      $table.="</tbody>";
        //  // $table.="</table>";
        // $table.="<table class='table table-bordered data-table'>"
        
        //                  $table.="<thead>"
        //                    $table.="<tr>"
        //                      $table.="<th>Teacher Name</th>"
        //                      $table.="<th>Mobile</th>"
        //                      $table.="<th>Email</th>"
        //                      $table.="<th>Job Type</th>"
        //                      $table.="<th>Department</th>"
        //                      $table.="<th>Actions</th>"
        //                    $table.="</tr>"
        //                  $table.="</thead>"
        
        
        //                  $table.="<tbody>"
        
        //            $table.="<td>"
        
        //                        $table.="<div class="display_status">"
        //                            // {{Form::open(['url'=>'' ,'method'=>'GET'])}}
        //                            //     {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
        //                            // {{Form::close()}}
        
        //                            // {{Form::open(['url'=>'' ,'method'=>'DELETE'])}}
        //                            //     {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        //                            // {{Form::close()}}
        //                       $table.="</div>"
        //                      $table.="</td>"
        //                    $table.="</tr>"
        
        //                  $table.="</tbody>"
        //                $table.="</table>"
        
        
        // return $max_min=[$result_entry_student];
        
        
    }
}
