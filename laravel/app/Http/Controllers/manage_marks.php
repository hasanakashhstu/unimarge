<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exam_list_model;
use App\manage_class_model;
use App\students;
use App\exam_grade_model;
use App\general_settings_model;
use App\manage_subject_model;
use Auth;
use App\manage_mark;
use App\manage_mark_child;
use App\component_model;
use Redirect;
use App\subject_component;
use App\manage_mark_component_mark_model;
use App\manage_mark_general_details_model;
use App\manage_mark_student_details_model;
use App\manage_mark_component_details_model;
use App\ov_setup_model;

class manage_marks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:MANAGE_MARKS');
    }
    
    public function index()
    {
        $exam_list = exam_list_model::where('publish', 'Yes')->get();
        $class_list = manage_class_model::all();
        $general_settings = general_settings_model::first();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.exam.manage_marks', ['exam_list' => $exam_list, 'class_list' => $class_list, 'general_settings' => $general_settings, 'session' => $session]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exam_list = exam_list_model::where('publish', 'Yes')->get();
        $class_list = manage_class_model::all();
        $general_settings = general_settings_model::first();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.exam.Edit.manage_marks_edit', ['exam_list' => $exam_list, 'class_list' => $class_list, 'general_settings' => $general_settings, 'session' => $session]);
    }
    
    public function manage_marks_for_student_find_component(Request $request)
    {
        
        return subject_component::join('component', 'subject_component.component_id', '=', 'component.component_id')
            ->where('subject_component.subject_id', $request->subject_name)->get();
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
//        dd($request->all());
        $check_exist = manage_mark_general_details_model::where('exam_name', $request->exam_name)
            ->where('class_name', $request->class_name)
            ->where('section', $request->section)
            ->where('Department', $request->Department)
            ->where('subject', $request->subject)->first();
        if ($check_exist) {
            session()->flash('wrong', 'Already Submitted Your Record For This Info Purpose');
            return Redirect::back();
            
        } else {
            
            $Data = $request->all();
            $general_details_id = time();
            $Data = array_add($Data, 'entry_here', Auth::user()->name);
            $Data = array_add($Data, 'general_details_id', $general_details_id);
            $mark_general_obj = new manage_mark_general_details_model;
            $mark_general_obj->fill($Data)->save();
            
            
            for ($i = 0; $i < count($request->roll); $i++) {
                if ($request->roll[$i]) {
                    $mark_student_obj = new manage_mark_student_details_model;
                    $mark_student_obj->general_details_id = $general_details_id;
                    $mark_student_obj->roll = $request->roll[$i];
                    $mark_student_obj->cgpa = $request->cgpa[$i];
                    $mark_student_obj->grade_name = $request->grade_name[$i];
                    $mark_student_obj->comment = $request->comment[$i];
                    $mark_student_obj->save();
                }
                
            }
            
            for ($j = 0; $j < count($request->grade_name); $j++) {
                if ($request->grade_name[$j] != '') {
                    $all_component = manage_mark_component_mark_model::where('student_roll', $request->roll[$j])
                        ->where('subject_name', $request->subject)
                        ->where('exam_name', $request->exam_name)
                        ->get();
                    foreach ($all_component as $key => $value) {
                        $mark_component_obj = new manage_mark_component_details_model;
                        $mark_component_obj->roll = $request->roll[$j];
                        $mark_component_obj->general_details_id = $general_details_id;
                        // echo "name".$value->component_name."mark".$value->component_mark."<br>";
                        $mark_component_obj->component_id = $value->component_id;
                        $mark_component_obj->component_name = $value->component_name;
                        $mark_component_obj->component_mark = $value->component_mark;
                        $mark_component_obj->save();
                    }
                }
            }
            
            
            $delete_component_data = manage_mark_component_mark_model::where('exam_name', $request->exam_name)->delete();
            
            session()->flash('success', 'successfully Submited Your Record');
            return Redirect::back();
            
        }
        
        
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
    
    public function edit_marks_for_student_find_component(Request $request)
    {
        // if(manage_mark_general_details_model::where('exam_name',$request->exam_name)
        //     ->where('class_name',$request->class_name)
        //     ->where('section',$request->section_name)
        //     ->where('Department',$request->Department)
        //     ->where('subject',$request->subject_name)
        //     ->where('default_session',$request->default_session)
        //     ->first())
        //    {
        //        return "data not inserted";
        
        //    }
        $component_data = subject_component::join('component', 'subject_component.component_id', '=', 'component.component_id')
            ->where('subject_component.subject_id', $request->subject_name)
            ->get();
        
        $count_component = count($component_data);
        
        $general_details = manage_mark_general_details_model::where('exam_name', $request->exam_name)
            ->where('class_name', $request->class_name)
            ->where('section', $request->section_name)
            ->where('Department', $request->Department)
            ->where('subject', $request->subject_name)
            ->where('default_session', $request->default_session)
            ->first();
        $students_informations = manage_mark_student_details_model::join('students', 'mark_student_details.roll', '=', 'students.roll')
            ->where('general_details_id', $general_details->general_details_id)
            ->where('students.class', $request->class_name)
            ->where('students.section', $request->section_name)
            ->where('students.department', $request->Department)
            ->orderBy('students.roll')
            ->get();
        
        $fail_students_informations = manage_mark_student_details_model::join('students', 'mark_student_details.roll', '=', 'students.roll')
            ->where('general_details_id', $general_details->general_details_id)
            ->where('grade_name', 'F')
            ->get()
            ->count();
        
        $total_student = students::where('class', $request->class_name)
            ->Where('section', $request->section_name)
            ->Where('department', $request->Department)
            ->Where('session', $request->default_session)
            ->get()
            ->count();
        $examinar_students = count($students_informations);
        $min_value = exam_grade_model::min('mark_from');
        $max_value = exam_grade_model::min('mark_upto');
        
        
        $total_fail_students = ($total_student - $examinar_students) + $fail_students_informations;
        $total_pass_students = $total_student - $total_fail_students;
        $subject_name = manage_subject_model::where('id', $general_details->subject)->first();
        $table = "<div id=\"manage_entry_section\">";
        
        $table .= "<table>";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th  class=\"tag manage_mark_table_desgin\"> Entry Marks For</th>";
        $table .= "<th id=\"subject_name\">$subject_name->subject_name</th>";
        $table .= "</tr>";
        $table .= " </thead>";
        
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th class=\"tag manage_mark_table_desgin\">Minmum - Maximum Mark</th>";
        $table .= "<th id=\"max_min_mark\">$min_value - $max_value</th>";
        $table .= "</tr>";
        $table .= "</thead> ";
        
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th class=\"tag manage_mark_table_desgin\">Total Student</th>";
        $table .= "<th id=\"total_student\">$total_student</th>";
        $table .= "</tr>";
        $table .= "</thead>";
        
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th class=\"tag manage_mark_table_desgin\">Total Pass Student</th>";
        $table .= "<th id=\"total_student\">$total_pass_students</th>";
        $table .= "</tr>";
        $table .= "</thead>";
        
        
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th class=\"tag manage_mark_table_desgin\">Total Fail Student</th>";
        $table .= "<th id=\"total_student\">$total_fail_students</th>";
        $table .= "</tr>";
        $table .= "</thead>";
        
        
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= " <th></th>";
        $table .= "<th><span class=\"tag manage_mark_table_desgin\">Class</span>";
        $table .= "<span class=\"tag manage_mark_table_desgin\">Section</span>";
        $table .= "<span class=\"tag manage_mark_table_desgin\">Department</span>";
        $table .= " <span class=\"tag manage_mark_table_desgin\">Exam</span></th>";
        $table .= "</tr>";
        $table .= "</thead> ";
        $table .= "</table>";
        
        $table .= "</div>";
        
        $table .= "<table class=\"table table-condensed table-responsive\">";
        
        $table .= "<thead >";
        $table .= "<tr>";
        $table .= "<td rowspan=\"2\">SL NO</td>";
        $table .= "<td rowspan=\"2\">Student Name</td>";
        $table .= "<td rowspan=\"2\">Roll</td>";
        $table .= "<td class=\"colspan_value_on_component\" colspan=\"$count_component\">Component</td>";
        $table .= "<td rowspan=\"2\">CGPA</td>";
        $table .= "<td rowspan=\"2\">GRADE</td>";
        $table .= "<td rowspan=\"2\">Comment</td>";
        $table .= "</tr>";
        $table .= "<tr class=\"student_data_show_on_thead\">";
        foreach ($component_data as $key => $component_data_fetch) {
            # code...
            
            $table .= "<td>$component_data_fetch->component_name</td>";
        }
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody class=\"student_data_show\">";
        foreach ($students_informations as $key => $students_data_fetch) {
            # code...
            $serial_no = $key + 1;
            $table .= "<tr>";
            $table .= "<td>$serial_no</td>";
            $table .= "<td>$students_data_fetch->student_name</td>";
            $table .= "<td><input  style='width:100px' readonly='readonly'  value=\"$students_data_fetch->roll\" type='text'><input style='width:100px'  value=\"$students_data_fetch->roll\" class='student_roll' name='student_roll' type='hidden'><input style='width:100px' ' value=\"$students_data_fetch->roll\" name='roll[]' type='hidden'></td>";
            
            foreach ($component_data as $key => $component_data_fetch) {
                
                $student_wise_component_value = manage_mark_component_details_model::where('general_details_id', $general_details->general_details_id)
                    ->where('roll', $students_data_fetch->roll)
                    ->where('component_id', $component_data_fetch->component_id)
                    ->first();
                if ($student_wise_component_value) {
                    $component_id = $student_wise_component_value->component_id;
                    $component_name = $student_wise_component_value->component_name;
                    $component_mark = $student_wise_component_value->component_mark;
                } else {
                    $component_id = $component_data_fetch->component_id;
                    $component_name = $component_data_fetch->component_name;
                    $component_mark = '';
                }
                
                $table .= "<td>
                        <input style=\"width:50px\"  class=\"component_id\"  id=\"$component_id\"  name='component_id[]'  value=\"$component_id\"  type=\"hidden\">
                        <input style=\"width:50px\" class=\"component_name\" name=\"component_name[]\" value=\"$component_name\" type=\"hidden\">
                        <input style=\"width:50px\" class=\"all_component_id\" id=\"$component_id\" name=\"all_component_id\" value=\"$component_id\" type=\"hidden\">
                        <input style=\"width:50px\" class=\"all_component_name\" name=\"all_component_name\" value=\"$component_name\" type=\"hidden\"><input style=\"width:50px\" value=\"$component_mark\" id=\"$component_name\" class=\"mark_j\" name=\"mark[]\" type=\"text\"> </td>";
            }
            
            
            $table .= "<td><input style='width:100px' class='cgpa' name='cgpa[]' value=\"$students_data_fetch->cgpa\"  readonly='readonly' type='text'></td>";
            $table .= "<td><input style='width:100px' class='grade_name' name='grade_name[]' value=\"$students_data_fetch->grade_name\" readonly='readonly' type='text'></td>";
            $table .= "<td><input style='width:100px' type='text' class='comment' value=\"$students_data_fetch->comment\" name='comment[]'></td>";
            
            $table .= "</tr>";
        }
        $table .= "</tbody>";
        $table .= "</table>";
        
        return $table;
        
        
    }
    
    public function manage_marks_edit(Request $request)
    {
        
        
        $general_edit_data = manage_mark_general_details_model::where('exam_name', $request->exam_name)
            ->where('class_name', $request->class_name)
            ->where('class_name', $request->class_name)
            ->where('section', $request->section)
            ->where('Department', $request->Department)
            ->where('subject', $request->subject)
            ->where('default_session', $request->default_session)
            ->first();
        $general_edit_data->update([$request->all()]);
        
        for ($i = 0; $i < count($request->roll); $i++) {
            
            if ($request->grade_name[$i]) {
                
                $students_edit_data = manage_mark_student_details_model::where('general_details_id', $general_edit_data->general_details_id)->where('roll', $request->roll[$i])->first();
                
                $students_edit_data->update([
                    'cgpa' => $request->cgpa[$i],
                    'grade_name' => $request->grade_name[$i],
                    'comment' => $request->comment[$i]
                
                ]);
                
            }
            
        }
        for ($j = 0; $j < count($request->grade_name); $j++) {
            if ($request->grade_name[$j] != '') {
                
                $component_all_data = manage_mark_component_mark_model::where('student_roll', $request->roll[$j])
                    ->where('subject_name', $request->subject)
                    ->where('exam_name', $request->exam_name)
                    ->get();
                foreach ($component_all_data as $key => $value) {
                    $component_edit_data = manage_mark_component_details_model::where('roll', $value->student_roll)
                        ->where('component_id', $value->component_id)
                        ->where('general_details_id', $general_edit_data->general_details_id)
                        ->first();
                    $component_edit_data->update([
                        'roll' => $value->student_roll,
                        'component_name' => $value->component_name,
                        'component_mark' => $value->component_mark
                    
                    ]);
                }
                
            }
            
        }
        
        $delete = manage_mark_component_mark_model::where('subject_name', $request->subject)
            ->where('exam_name', $request->exam_name)
            ->delete();
        session()->flash('success', 'successfully Updated Your Record');
        return Redirect::back();
    }
    
    
    public function mange_mark_student(Request $request)
    {
        $student_information = students::where('class', $request->class_name)
            ->Where('section', $request->section_name)
            ->Where('department', $request->Department)
            ->Where('session', $request->default_session)
            ->orderBy('roll')
            ->get();
        
        
        $table = "<table class=\"table table-bordered\">";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th>#</th>";
        $table .= "<th>Roll</th>";
        $table .= "<th>Name</th>";
        
        $table .= "<th>Marks Obtained</th>";
        // $table.="<th>Garde</th>";
        // $table.="<th>CGP</th>";
        $table .= "<th>Comment</th>";
        $table .= "</tr>";
        $table .= "</thead>";
        
        $table .= "<tbody>";
        $i = 1;
        foreach ($student_information as $key => $value) {
            
            $table .= "<tr>";
            $table .= "<td>$key++</td>";
            $table .= "<td>$value->roll</td>";
            $table .= "<td>$value->student_name</td>";
            
            $table .= "<td id='result_mark_ovi'><input  type=\"text\" class=\"marks\"></td>";
            // $table.="<th>Garde</th>";
            //   $table.="<th>CGP</th>";
            $table .= "<td><input class='comment' value='n/a' type=\"text\"></td>";
            
            $table .= "</tr>";
            $i++;
        }
        $table .= "</tbody>";
        $table .= "</table>";
        
        
        $min_value = exam_grade_model::min('mark_from');
        $max_value = exam_grade_model::min('mark_upto');
        $total_student = count($student_information);
        return $max_min = [$min_value, $max_value, $student_information, $total_student];
        
        
    }
    
    public function grade_and_cgp_find(Request $request)
    {
        //print_r($request->all());
        $component_id = $request->component_id;
        $student_roll = $request->student_roll;
        $subject_info = $request->subject_info;
        
        $component_data = subject_component::where('component_id', $component_id)
            ->where('subject_id', $request->subject_info)
            ->first();
        
        $exam_grade_value = exam_grade_model::all();
        $find_grade = '';
        $find_grade_name = '';
        
        if ($request->pass_mark > $component_data->total_mark) {
            $msg = "enter wrong";
            return $msg;
        } else {
            $sum = 0;
            $add_component_data = manage_mark_component_mark_model::where('student_roll', $student_roll)
                ->where('subject_name', $subject_info)
                ->where('component_id', $component_id)
                ->where('exam_name', $request->exam_name)
                ->first();
            
            $find_pass_mark = ($component_data->total_mark * $component_data->pass_mark) / 100;
            if ($add_component_data) {
                if ($find_pass_mark > $request->pass_mark) {
                    $add_component_data->update([
                        'component_name' => $request->component_name,
                        'component_mark' => $request->pass_mark,
                        'component_grade' => 'Fail'
                    ]);
                } else {
                    $add_component_data->update([
                        'component_name' => $request->component_name,
                        'component_mark' => $request->pass_mark,
                        'component_grade' => 'Pass'
                    ]);
                }
            } else {
                if ($find_pass_mark > $request->pass_mark) {
                    $model_obj = new manage_mark_component_mark_model;
                    $model_obj->student_roll = $student_roll;
                    $model_obj->subject_name = $subject_info;
                    $model_obj->component_id = $component_id;
                    $model_obj->component_name = $request->component_name;
                    $model_obj->component_mark = $request->pass_mark;
                    $model_obj->exam_name = $request->exam_name;
                    $model_obj->component_grade = 'Fail';
                    $model_obj->save();
                } else {
                    $model_obj = new manage_mark_component_mark_model;
                    $model_obj->student_roll = $student_roll;
                    $model_obj->subject_name = $subject_info;
                    $model_obj->component_id = $component_id;
                    $model_obj->component_name = $request->component_name;
                    $model_obj->component_mark = $request->pass_mark;
                    $model_obj->exam_name = $request->exam_name;
                    $model_obj->component_grade = 'Pass';
                    $model_obj->save();
                }
            }
            
            
            if ($find_pass_mark > $request->pass_mark) {
                $find_grade = '0.0';
                $find_grade_name = 'F';
            } else {
                
                $student_all_mark = manage_mark_component_mark_model::where('student_roll', $student_roll)
                    ->where('subject_name', $subject_info)
                    ->where('exam_name', $request->exam_name)
                    ->get();
                
                for ($i = 0; $i < count($student_all_mark); $i++) {
                    
                    if ($student_all_mark[$i]['component_mark'] == '' or $student_all_mark[$i]['component_mark'] == '0' or $student_all_mark[$i]['component_grade'] == 'Fail') {
                        $sum = 0;
                        break;
                    } else {
                        $sum = $sum + $student_all_mark[$i]['component_mark'];
                    }
                }
                
                $subject_data = manage_subject_model::where('id', $subject_info)->first();
                $find_exam_grade = exam_grade_model::where('grade_for', $subject_data->subject_mark)->get();
                
                foreach ($find_exam_grade as $key => $grade_value) {
                    if (($sum >= $grade_value->mark_from) and ($sum <= $grade_value->mark_upto)) {
                        
                        $find_grade = $grade_value->grade_point;
                        $find_grade_name = $grade_value->grade_name;
                    }
                }
                
            }
            
            
        }
        $grade_name_grade_pont = [$find_grade, $find_grade_name];
        return $grade_name_grade_pont;
        //print_r($component_data);
        //     $find_grade='';
        //     $find_grade_name='';
        
        //     $component_data=subject_component::where('component_id',$component_id)
        //                                       ->where('subject_id',$request->subject_info)
        //                                       ->first();
        //                                       // echo $component_data;
        
        //     $exam_grade_value=exam_grade_model::all();
        //     if($request->pass_mark>$component_data->total_mark)
        //     {
        
        //               $msg="enter wrong";
        //               return $msg;
        
        //     }
        //     else
        //     {
        //        $sum=0;
        //        $add_component_data=manage_mark_component_mark_model::where('student_roll',$student_roll)
        //                                             ->where('subject_name',$subject_info)
        //                                             ->where('component_id',$component_id)
        //                                             ->where('exam_name',$request->exam_name)
        //                                             ->first();
        //          $find_pass_mark=($component_data->total_mark*$component_data->pass_mark)/100;
        //          if($add_component_data)
        //             {
        //                if($find_pass_mark>$request->pass_mark)
        //                {
        //                 $add_component_data->update([
        //                                        'component_name'=>$request->component_name,
        //                                        'component_mark'=>$request->pass_mark,
        //                                        'component_grade'=>'Fail'
        //                                             ]);
        
        //               }
        //               else
        //               {
        //                 $add_component_data->update([
        //                                        'component_name'=>$request->component_name,
        //                                        'component_mark'=>$request->pass_mark,
        //                                        'component_grade'=>'Pass'
        //                                             ]);
        //               }
        //             }
        //             else
        //             {
        
        //                if($find_pass_mark>$request->pass_mark)
        //                {
        
        //                   $model_obj=new manage_mark_component_mark_model;
        //                   $model_obj->student_roll=$student_roll;
        //                   $model_obj->subject_name=$subject_info;
        //                   $model_obj->component_id=$component_id;
        //                   $model_obj->component_name=$request->component_name;
        //                   $model_obj->component_mark=$request->pass_mark;
        //                   $model_obj->exam_name=$request->exam_name;
        //                   $model_obj->component_grade='Fail';
        //                   $model_obj->save();
        //               }
        //               else
        //               {
        //                 $model_obj=new manage_mark_component_mark_model;
        //                   $model_obj->student_roll=$student_roll;
        //                   $model_obj->subject_name=$subject_info;
        //                   $model_obj->component_id=$component_id;
        //                   $model_obj->component_name=$request->component_name;
        //                   $model_obj->component_mark=$request->pass_mark;
        //                   $model_obj->exam_name=$request->exam_name;
        //                   $model_obj->component_grade='Pass';
        //                   $model_obj->save();
        //               }
        //             }
        
        //            if($find_pass_mark>$request->pass_mark)
        //            {
        //                $find_grade='0.0';
        //                $find_grade_name='F';
        //            }
        //            else
        //            {
        //              $student_all_mark=manage_mark_component_mark_model::where('student_roll',$student_roll)
        //                                             ->where('subject_name',$subject_info)
        //                                             ->where('exam_name',$request->exam_name)
        //                                             ->get();
        
        //                       for($i=0;$i<count($student_all_mark);$i++){
        //                         if($student_all_mark[$i]['component_mark'] =='' or $student_all_mark[$i]['component_mark'] =='0' or  $student_all_mark[$i]['component_grade'] =='Fail')
        //                         {
        
        //                             $sum=0;
        
        //                             break;
        
        //                         }
        //                        else
        //                         {
        //                              $sum=$sum+$student_all_mark[$i]['component_mark'];
        
        
        //                         }
        
        
        //                     }
        
        
        //                     $subject_data=manage_subject_model::where('id',$subject_info)->first();
        //                     $find_subject_mark=($sum*100)/$subject_data->subject_mark;
        //                     $final_subject_mark=round($find_subject_mark);
        
        //                     foreach ($exam_grade_value as $key=>$grade_value) {
        
        //                         if($final_subject_mark>=$grade_value->mark_from and $final_subject_mark<=$grade_value->mark_upto)
        //                         {
        
        //                            $find_grade=$grade_value->grade_point;
        //                            $find_grade_name=$grade_value->grade_name;
        //                         }
        //                     }
        
        //            }
        //              $grade_name_grade_pont=[$find_grade,$find_grade_name];
        //               return $grade_name_grade_pont;
        
        //     }
        
        
    }
}



