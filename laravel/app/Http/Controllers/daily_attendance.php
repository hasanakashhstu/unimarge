<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\daily_attendance_model;
use App\general_settings_model;
use App\students;
use App\ov_setup_model;
use App\manage_subject_model;
use Session;
use Validator;
use Redirect;

class daily_attendance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:DAILY_ATTENDENCE');
    }
    
    public function index()
    {
        $medium = ov_setup_model::where('type', 'Medium')->get();
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.Attendance.daily_attendance', ['class_data' => manage_class_model::all(), 'general' => general_settings_model::first(), 'medium' => $medium, 'session_get' => $session]);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session = ov_setup_model::where('type', 'Session')->get();
        return view('admin.Attendance.report_of_attendance', ['class_data' => manage_class_model::all(), 'general' => general_settings_model::first(), 'session_get' => $session]);
        // echo "ok";
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = time();
        $date = date("d-m-Y", strtotime($request->date));
        if (is_array($request->status) && count($request->status) > 0) {
            foreach ($request->status as $value) {
                
                $daily_attendance = new daily_attendance_model;
                $daily_attendance->student_id = $value;
                $daily_attendance->device_id = 'system_does_not_track';
                $daily_attendance->date = $date;
                $daily_attendance->time = $time;
                $daily_attendance->status = "Present";
                $daily_attendance->subject = $request->subject;
                $daily_attendance->department = $request->Department;
                $daily_attendance->class = $request->class_name;
                $daily_attendance->save();
            }
            
        }
        session()->flash('success', 'successfully Submited Your Record');
        return Redirect::back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
    
    
    public function department_wise_subject(Request $request)
    {
        //echo $request->class;
        
        return manage_subject_model::where('class', $request->class_name)
            ->where('department', $request->Department_info)
            ->where('section', $request->section)
            ->get();
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
    
    public function show_student_data(Request $request)
    {
        
        return students::where('class', $request->class_name)
            ->Where('section', $request->section)
            ->Where('department', $request->Department_info)
            ->Where('session', $request->default_session)
            ->Where('medium', $request->medium)
            ->get();
        
    }
    
    public function show_attendance_data(Request $request)
    {
        //dd($request->all());
        
        $student_info = students::where('class', $request->class_name)
            ->Where('section', $request->section)
            ->Where('department', $request->Department_info)
            ->Where('session', $request->default_session)
            ->Where('medium', $request->medium)
            ->get();
        // echo $request->from_date_info;
        $date1 = date_create((string)$request->from_date_info);
        $date2 = date_create((string)$request->to_date_info);
        $found_date_diff = date_diff($date1, $date2);
        $date_diff = $found_date_diff->format('%d');
        $from_date = $request->from_date_info;
        
        $from_date = date('d-m-Y', strtotime($from_date));
        
        $table = "<table class=\"table table-bordered data-table\">";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th>Student Name</th>";
        $table .= "<th>Roll</th>";
        $table .= "<th class=\"date\">$from_date</th>";
        
        for ($i = 0; $i < $date_diff; $i++) {
            $calculate_date = strtotime($from_date . ' +1 day');
            $from_date = date('d-m-Y', $calculate_date);
            
            $table .= "<th class=\"date\">$from_date</th>";
        }
        
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody>";
        
        
        foreach ($student_info as $value) {
            $table .= "<tr>";
            $table .= "<td>$value->student_name</td>";
            $table .= "<td>$value->roll</td>";
            
            $count_array = [];
            $request_date = $request->from_date_info;
            $date = date('d-m-Y', strtotime($request_date));
            $matches = daily_attendance_model::where('student_id', $value->roll)
                ->where('date', $date)
                ->where('status', 'Present')
                ->where('subject', $request->subject)
                ->first();
            
            
            if ($matches) {
                $table .= "<td><input type=\"checkbox\" checked disabled='disabled'/></td>";
            } else {
                $table .= "<td><input type=\"checkbox\"/></td>";
            }
            for ($i = 0; $i < $date_diff; $i++) {
                $a = strtotime($request_date . ' +1 day');
                $request_date = date('d-m-Y', $a);
                $match_values = daily_attendance_model::where('student_id', $value->roll)
                    ->where('date', $request_date)
                    ->where('status', 'Present')
                    ->where('subject', $request->subject)
                    ->first();
                if ($match_values) {
                    $table .= "<td><input type=\"checkbox\" checked disabled='disabled'/></td>";
                } else {
                    $table .= "<td><input type=\"checkbox\"/></td>";
                }
            }
            
            
        }
        
        $table .= "</tbody>";
        $table .= "</table>";
        echo $table;
        
    }
    
    public function report_of_attendance(Request $request)
    {
        //dd($request->all());
        
        $student_info = students::where('class', $request->class_name)
            ->Where('section', $request->section)
            ->Where('department', $request->Department_info)
            ->Where('session', $request->default_session)
            ->Where('medium', $request->medium)
            ->get();
        // echo $request->from_date_info;
        $date1 = date_create((string)$request->from_date_info);
        $date2 = date_create((string)$request->to_date_info);
        $found_date_diff = date_diff($date1, $date2);
        $date_diff = $found_date_diff->format('%d');
        $from_date = $request->from_date_info;
        
        $from_date = date('d-m-Y', strtotime($from_date));
        $start_date = date('d-m-Y', strtotime($request->from_date_info));
        $to_date = date('d-m-Y', strtotime($request->to_date_info));
        $table = "<table class=\"table table-bordered data-table\">";
        $table .= "<thead>";
        $table .= "<tr>";
        $table .= "<th>Student Name</th>";
        $table .= "<th>Roll</th>";
        $table .= "<th class=\"date\">$from_date</th>";
        
        for ($i = 0; $i < $date_diff; $i++) {
            $calculate_date = strtotime($from_date . ' +1 day');
            $from_date = date('d-m-Y', $calculate_date);
            
            $table .= "<th class=\"date\">$from_date</th>";
        }
        
        $table .= "<th class=\"date\">Total Days</th>";
        $table .= "<th class=\"date\">Total Attendance</th>";
        $table .= "<th class=\"date\">Total Absance</th>";
        
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody>";
        
        
        foreach ($student_info as $value) {
            $table .= "<tr>";
            $table .= "<td>$value->student_name</td>";
            $table .= "<td>$value->roll</td>";
            
            $count_array = [];
            $request_date = $request->from_date_info;
            $date = date('d-m-Y', strtotime($request_date));
            $matches = daily_attendance_model::where('student_id', $value->roll)->where('date', $date)->where('status', 'Present')->first();
            
            $count_array = array_add($count_array, 'first', $matches);
            $present_count = daily_attendance_model::where('student_id', $value->roll)
                ->where('status', 'Present')
                ->whereBetween('date', [$start_date, $to_date])
                ->get();
            $present_count_data = $present_count->count();
            
            if ($matches) {
                $table .= "<td><input type=\"checkbox\" checked disabled='disabled'/></td>";
            } else {
                $table .= "<td><input type=\"checkbox\"/></td>";
            }
            
            for ($i = 0; $i < $date_diff; $i++) {
                $a = strtotime($request_date . ' +1 day');
                $request_date = date('d-m-Y', $a);
                
                
                $match_values = daily_attendance_model::where('student_id', $value->roll)->where('date', $request_date)->where('status', 'Present')->first();
                
                $count_array = array_add($count_array, $i, $match_values);
                if ($match_values) {
                    $table .= "<td> <input type=\"checkbox\" checked disabled='disabled'/></td>";
                } else {
                    $table .= "<td><input type=\"checkbox\"/></td>";
                }
            }
            //$ma_count=count($count_array);
            //print_r($present_count)."<br>";
            $total_day = $date_diff + 1;
            $absance = $total_day - $present_count_data;
            $table .= "<td>$total_day</td>";
            $table .= "<td>$present_count_data</td>";
            
            $table .= "<td>$absance</td>";
            
        }
        
        $table .= "</tbody>";
        $table .= "</table>";
        echo $table;
        
    }
    
    
}
