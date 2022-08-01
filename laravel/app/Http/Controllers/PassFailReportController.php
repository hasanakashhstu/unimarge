<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\exam_list_model;
use App\students;
use App\manage_mark_general_details_model;
use App\manage_subject_model;
use App\manage_section_model;
use App\manage_department_model;
use App\manage_mark_student_details_model;
Use App\parents_info_model;
use App\exam_grade_model;
use App\general_settings_model;
use App\ov_setup_model;
use Session;

class PassFailReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_list = exam_list_model::where('publish', 'Yes')->get();
        $class_list = manage_class_model::all();
        $general_settings = general_settings_model::first();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.exam.pass_fail_report', ['all_data' => '', 'publish_status' => '', 'exam_list' => $exam_list, 'class_list' => $class_list, 'general_settings' => $general_settings, 'session' => $session]);
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
        if ($request->class_name == '' or $request->section == '' or $request->Department == '' or $request->default_session == '') {
            Session::flash('error', 'Please Select All Filters');
            return back();
        }
        $class_wise_subject = manage_subject_model::where('class', $request->class_name)
            ->where('section', $request->section)
            ->where('department', $request->Department)
            ->get();
        
        
        $marks_general_get = manage_mark_general_details_model::where('exam_name', $request->exam_name)
            ->where('class_name', $request->class_name)
            ->where('section', $request->section)
            ->where('Department', $request->Department)
            ->where('default_session', $request->default_session)
            ->where('publishing_status', '1')
            ->get();
        
        $total_subject = count($class_wise_subject);
        $general_total = count($marks_general_get);
        $publish_status = '';
        $table = "";
        if ($total_subject == $general_total) {
            
            $total_student = students::where('class', $request->class_name)
                ->where('section', $request->section)
                ->where('department', $request->Department)
                ->where('session', $request->default_session)
                ->get()
                ->count();
            
            
            $subject_wise_general_details = manage_subject_model::join('mark_general_details', 'mark_general_details.subject', '=', 'manage_subject.id')
                ->join('mark_student_details', 'mark_student_details.general_details_id', '=', 'mark_general_details.general_details_id')
                ->where('manage_subject.class', $request->class_name)
                ->where('manage_subject.section', $request->section)
                ->where('manage_subject.department', $request->Department)
                ->where('mark_general_details.publishing_status', '1')
                ->get();
            
            
            $pass_student_in_array = [];
            $fail_student_in_array = [];
            $total_grade = 0;
            $arr = [];
            foreach ($subject_wise_general_details as $key => $value) {
                $sum_mark = 0;
                $mark_data = manage_mark_student_details_model::where('roll', $value->roll)->get();
                foreach ($mark_data as $key => $mark_data_fetch) {
                    if ($mark_data_fetch->grade_name == 'F') {
                        $fail_grade = 0.0;
                        $fail_student_in_array = array_add($fail_student_in_array, $value->roll, $fail_grade);
                        break;
                    } else {
                     //   $arr[] = $mark_data_fetch->cgpa;
                        $sum_mark = $sum_mark + $mark_data_fetch->cgpa;
                        $total_grade = round($sum_mark / $total_subject, 2);
                    }
                    
                }
                $pass_student_in_array = array_add($pass_student_in_array, $value->roll, $total_grade);
                
            }
            $total_fail_count = count($fail_student_in_array);
            $pass_array = [];
            foreach ($pass_student_in_array as $key => $value) {
                if (array_key_exists($key, $fail_student_in_array)) {
                
                } else {
                    $pass_array = array_add($pass_array, $key, $value);
                }
            }
            $total_pass_count = count($pass_array);
            
            $table .= "<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
            $table .= "<td>";
            $table .= "<h4 style=\"color:#215663;font-size:25px; margin-bottom:-6px;margin-left: 338px;\">
            Pass Fail All Student's List Report</h4>";
            $table .= "<hr>";
            $table .= "</td>";
            $table .= "</table>";
            $table .= "<table  style=\"width: 1125px;margin-top: -7px;\">";
            $table .= "<thead>";
            $table .= "<tr>";
            $table .= "<th style=\"font-size: 20px;text-align: center;\">Total Student: $total_student</th>";
            $table .= " <th style=\"font-size: 20px;text-align: center;\">Total Pass Student: $total_pass_count</th>";
            $table .= " <th style=\"font-size: 20px;text-align: center;\">Total Fail Student: $total_fail_count</th>";
            $table .= "</tr>";
            
            $table .= "</thead>";
            $table .= "</table>";
            
            $table .= "<table border='1' style='width: 100%;margin-top: 10px;'>";
            $table .= "<thead>";
            $table .= "<tr>";
            $table .= "<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
            $table .= "<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Student Roll</th>";
            $table .= "<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Point</th>";
            $table .= "</tr>";
            $table .= "</thead>";
            $table .= "<tbody>";
            $id = 0;
            $sl_no = 0;
            $table .= "<tr>";
            $table .= "<td colspan=\"3\" style=\"text-align:center;background: #93ec93;
    color: black;\">Pass Student</td>";
            $table .= "</tr>";
            foreach ($pass_array as $key => $pass_student) {
                $id = $id + 1;
                $table .= "<tr>";
                $table .= "<td style=\"height: 29px;\">$id</td>";
                $table .= "<td style=\"height: 29px;\">$key</td>";
                $table .= "<td style=\"height: 29px;\">$pass_student</td>";
                $table .= "</tr>";
            }
            $table .= "<tr>";
            $table .= "<td colspan=\"3\" style=\"text-align:center;background: #e2614c;
    color: black;\">Fail Student</td>";
            $table .= "</tr>";
            foreach ($fail_student_in_array as $key => $fail_student) {
                $sl_no = $sl_no + 1;
                $table .= "<tr>";
                $table .= "<td style=\"height: 29px;\">$sl_no</td>";
                $table .= "<td style=\"height: 29px;\">$key</td>";
                $table .= "<td style=\"height: 29px;\">$fail_student</td>";
                $table .= "</tr>";
            }
            $table .= "</tbody>";
            $table .= "</table>";
        } else {
            $publish_status = "Result Not Yet Publish";
        }
        $exam_list = exam_list_model::where('publish', 'Yes')->get();
        $class_list = manage_class_model::all();
        $general_settings = general_settings_model::first();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.exam.pass_fail_report', ['all_data' => $table, 'publish_status' => $publish_status, 'exam_list' => $exam_list, 'class_list' => $class_list, 'general_settings' => $general_settings, 'session' => $session]);
        
        
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
}
