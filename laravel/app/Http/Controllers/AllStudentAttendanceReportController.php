<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\students;
use App\manage_subject_model;
use App\daily_attendance_model;
class AllStudentAttendanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Report.all_student_attendance_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'all_search_data'=>'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
          $student_info=students::where('class',$request->class_name)->get();
         $month_string=date("F", mktime(0, 0, 0,$request->month, 1));
         $subject_data=manage_subject_model::where('class',$request->class_name)->get();
         $count_student_data=count($student_info);
         $subject_total_data=count($subject_data);
  
            $table.="<h3 style='margin-left: 492px;'><span style='color: #1985a9;'>Attendance</h3><hr style='border: 1px solid #e6a915;width: 586px;margin-top: -15px;margin-left:251px'>";
        $table.="<table border='1' style='width: 1113px;margin-top: 30px;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Roll</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Percentage Present Rate</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Average Percentage Present Rate</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
            $table.="</tr>";
            $table.="</thead>";
            $table.="<tbody>";
           
          
           $average_data=0;
             $sum=0;
           
            foreach ($student_info as $key=>$student_info_list) {
                $id=$key+1;
                $sum_show=0;
                foreach ($subject_data as $key1=>$value_fetch)
                  {
                 
                 $total_class=daily_attendance_model::where('subject',$value_fetch->subject_name)
                    ->whereMonth('created_at','=',$request->month)
                    ->whereYear('created_at','=',$request->year)
                    ->groupBy('date')
                    ->get()
                    ->count();

                $student_wise_present=daily_attendance_model::where('subject',$value_fetch->subject_name)
                   ->where('student_id',$student_info_list->roll)
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
                 
                 $sum_show=$sum_show+$percentage;
                 $show_avg=$sum_show/$subject_total_data;
                  $avg_student_wise_data=round($show_avg,2);
                  $sum=$sum+$percentage;
                 $sum_class_wise=$sum/$subject_total_data;
                  $avg_class_wise=$sum_class_wise/$count_student_data;
                   $average_data=round($avg_class_wise,2); 
     
                 
               
                 
                 }

                 if($key==0)
                 {


                   $table.="<tr>";
                  $table.="<td style=\"height: 29px;text-align:center\">$id</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$student_info_list->student_name</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$student_info_list->roll</td>";
                  $table.="<td style=\"height: 29px;text-align:center\"> $avg_student_wise_data %</td>";
                   $table.="<td rowspan=$count_student_data  style=\"height: 29px;text-align:center\"><span id='average_data_fetch'></span>%</td>";
                    $table.="<td rowspan=$count_student_data  style=\"height: 29px;text-align:center\"> </td>";

                  $table.="</tr>";
                  }
                  else
                  {
                  $table.="<tr>";
                  $table.="<td style=\"height: 29px;text-align:center\">$id</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$student_info_list->student_name</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$student_info_list->roll</td>";
                  $table.="<td style=\"height: 29px;text-align:center\">$avg_student_wise_data %</td>";
                  
                  $table.="</tr>";
                  }
                }
             $table.="</tbody>";
             $table.="</table>";
      
               
            $table.="<input type='hidden' value='$average_data'  id='average_data_show'>";
        return view('admin.Report.all_student_attendance_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'all_search_data'=>$table]);
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
