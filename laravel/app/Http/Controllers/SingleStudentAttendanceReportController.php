<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\daily_attendance_model;
use App\manage_subject_model;
use App\students;
class SingleStudentAttendanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.Report.single_student_attendance_report',['all_search_data'=>'']);
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
     
        
         $table="";
       

           $student_info=students::where('roll',$request->student_roll)->first();
           $month_string=date("F", mktime(0, 0, 0,$request->month, 1));
           $subject_data=manage_subject_model::where('class',$student_info->class)->get();
            $table.="<h3 style='margin-left: 213px;color:#215663;'>Subject Wise Student Attendance Information: $month_string'$request->year </h3>";
          $table.="<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
            $table.="<tr >";
         
             $table.="<td><b>Student Name:</b> <span>$student_info->student_name</span></td>";
            // $table.="<span>ok</span>";
           $table.="</tr>";
             $table.="<tr >";
         
             $table.="<td><b>Prarent Name:</b> <span>$student_info->parent_name</span></td>";
          
           $table.="</tr>";
             $table.="<tr >";
         
             $table.="<td><b>Class Name:</b> <span>$student_info->class</span></td>";
           
           
           $table.="</tr>";
           $table.="<tr>";
             $table.="<td><b>Department Name:</b> <span>$student_info->department</span></td>";
           
          
           $table.="</tr>";
           $table.="<tr>";
              $table.="<td><b>Roll No:</b> <span>$student_info->roll</span></td>";
           $table.="</tr>";
         $table.="</table>";
            $table.="<h3 style='margin-left: 492px;'><span style='color: #1985a9;'>Attendance</h3><hr style='border: 1px solid #e6a915;width: 586px;margin-top: -15px;margin-left:251px'>";
        $table.="<table border='1' style='width: 1113px;margin-top: 30px;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Total Class</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Total Present</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Total Absence</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Percentage Present Rate</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Average Percentage Present Rate</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
            $table.="</tr>";
            $table.="</thead>";
            $table.="<tbody>";
            $sum=0;
            $average=0;
            $count_search_data=count($subject_data);
            $check_condition=$count_search_data-1;

     
            foreach ($subject_data as $key => $value_fetch)
              {
                 $id=$key+1;
                 $total_class=daily_attendance_model::where('subject',$value_fetch->subject_name)
                    ->whereMonth('created_at','=',$request->month)
                    ->whereYear('created_at','=',$request->year)
                    ->groupBy('date')
                    ->get()
                    ->count();

                $student_wise_present=daily_attendance_model::where('subject',$value_fetch->subject_name)
                   ->where('student_id',$request->student_roll)
                   ->whereYear('created_at',$request->year)
                   ->whereMonth('created_at',$request->month)
                   ->groupBy('date')
                   ->get()
                   ->count();
                  
                  $absence_data=$total_class-$student_wise_present;
                  if($total_class !=0)
                  {
                      $percentage_data=($student_wise_present*100)/$total_class;
                      $percentage=round($percentage_data,2);
                  }
                  else
                  {
                     $percentage=0;
                  }
                  $sum=$sum+$percentage;
                  $average=$sum/$count_search_data;
                  $average_data=round($average,2);
                   if($key==0)
                 {
                  $table.="<tr>";
                  $table.="<td style=\"height: 29px;text-align:center\">$id</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$value_fetch->subject_name</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$total_class</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$student_wise_present</td>";
                  $table.="<td style=\"height: 29px;text-align:center\"> $absence_data</td>";
                  $table.="<td style=\"height: 29px;text-align:center\" >$percentage %</td>";

                   $table.="<td rowspan=$count_search_data    style=\"text-align:center\"> <span id='average_data_show'></span>% </td>";

                   $table.="<td rowspan=$count_search_data style=\"text-align:center\"> <span id='average_data_show'></span>% </td>";
                  $table.="<td style=\"height: 29px;\"> </td>";
                  
                 

                 $table.="</tr>";
                  }
                  
                  else
                  {
                  $table.="<tr>";
                       $table.="<td style=\"text-align:center\">$id</td>";
                       $table.="<td style=\"height: 29px;text-align:center\">$value_fetch->subject_name</td>";
                       $table.="<td style=\"height: 29px;text-align:center\">$total_class</td>";
                       $table.="<td style=\"height: 29px;text-align:center\"> $student_wise_present</td>";
                       $table.="<td style=\"height: 29px;text-align:center\"> $absence_data</td>";
                        $table.="<td style=\"height: 29px;text-align:center\" > $percentage %</td>";
                           $table.="<td style=\"height: 29px;\"> </td>";

                    $table.="</tr>";
                   }
              }
             $table.="</tbody>";
             $table.="</table>";
      
      
        $table.="<input type='hidden' value='$average_data'  id='average_data'>";
        return view('admin.Report.single_student_attendance_report',['all_search_data'=>$table]);
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
