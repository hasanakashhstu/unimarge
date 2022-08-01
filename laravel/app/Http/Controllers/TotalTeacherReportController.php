<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_department_model;
use App\manage_subject_model;
use App\ov_setup_model;
use App\teacher_model;
use DB;
class TotalTeacherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Teacher_Staff.total_teacher_report',['job_type_data'=>ov_setup_model::where('type','Job Type')->get(),'designation_data'=>ov_setup_model::where('type','Job Type')->get(),'tech_subject'=>manage_subject_model::where('type','Tech')->groupBy('subject_name')->get(),'subject'=>manage_subject_model::where('type','Non-Tech')->groupBy('subject_name')->get(),'all_search_data'=>'']);
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
//dd($request->all());
        $table="";
       try {
        $serach_data=teacher_model::where(function($serach_data) use ($request) {
                     if($request->techer_name)
                     {
                        $serach_data->where('teacher_name',$request->techer_name);
                     }
                     if($request->type !='all')
                     {
                        $serach_data->where('type',$request->type);
                     }
                      if($request->department)
                     {
                        $serach_data->where('job_type',$request->department);
                     }
                     if($request->subject)
                     {
                        $serach_data->where('job_type',$request->subject);
                     }
                     if($request->work_department)
                     {
                        $serach_data->where('work_department',$request->work_department);
                     }
                     if ($request->type=='all') {
                        $serach_data->where('type','!=',"fcis");
                     }
                     if($request->all)
                     {
                        $serach_data->where('teacher_name', 'LIKE', '%' . $request->all. '%');
                        $serach_data->orwhere('type', 'LIKE', '%' .'Tech'. '%');
                        $serach_data->orwhere('job_type', 'LIKE', '%' . $request->all. '%');
                        $serach_data->orwhere('work_department', 'LIKE', '%' . $request->all. '%');
                     }
        })->where('status','Teacher')->groupBy('type')->get();

         
        
       //$tech_data=teacher_model::where('type','Tech')->groupBy('job_type')->get();
// $teach_id=0;
       foreach ($serach_data as $key=>$value_fetch) {
         
        
          $table.="<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
          $table.="<td >";
          
             $table.="<h3 style=\"color:#215663;font-size:25px; margin-bottom:-6px;\">
             $value_fetch->type Teacher List
              </h3>";
             
            
           $table.="</td>";
         $table.="</table>";

        
         if($value_fetch->type != 'Tech')
         {

       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
           $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Teacher Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Designation</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Mobile No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
            $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
          $teacher_data=teacher_model::where('type',$value_fetch->type)->get();
           foreach ($teacher_data as $key1=>$teacher_value) {
             $teach_id=$key1+1;
             $table.="<tr>";

                $table.="<td style=\"height: 29px;\">$teach_id</td>";
                $table.="<td style=\"height: 29px;\">$teacher_value->teacher_name</td>";
                $table.="<td style=\"height: 29px;\">$teacher_value->designation</td>";
                $table.="<td style=\"height: 29px;\">$teacher_value->job_type</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$teacher_value->mobile_no</td>";
                $table.="<td style=\"height: 29px;\"> </td>";

            $table.="</tr>";
          }
        $table.="</tbody>";
         $table.="</table>";
          }
        
          else
          {
            $dep_teacher=teacher_model::where('type',$value_fetch->type)
                                     ->groupBy('job_type')
                                     ->get();
            foreach ($dep_teacher as $dep_value) {
                  $table.="<h3 >
                     <span style=\"color: #1985a9;font-size: 20px;\">Technology:
                        </span>
                        <span style=\"color:#e6a915;font-size: 20px;\"> $dep_value->job_type
                        </span>
                      </h3>";
                       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
           $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Teacher Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Designation</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Mobile No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
            $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
               $job_type_wise=teacher_model::where('type',$dep_value->type)->where('job_type',$dep_value->job_type)->get();

                  // $dep_teacher_data=teacher_model::where('job_type',$dep_value->job_type)->get();
                   // echo "<pre>";
                   // print_r($job_type_wise);
                   // exit();
                  foreach ($job_type_wise as $key2=>$dep_teacher_value) {
                    $techer_data_id=$key2+1;
                     $table.="<tr>";
                       
                        $table.="<td style=\"height: 29px;\">$techer_data_id</td>";
                         $table.="<td style=\"height: 29px;\">$dep_teacher_value->teacher_name</td>";
                        $table.="<td style=\"height: 29px;\">$dep_teacher_value->designation</td>";
                        $table.="<td style=\"height: 29px;text-align:center;\">$dep_teacher_value->mobile_no</td>";
                        $table.="<td style=\"height: 29px;\"> </td>";

                    $table.="</tr>";
                }
                 $table.="</tbody>";
         $table.="</table>";
            }
          }
       
        }
          
        }


       
        catch (\Exception $e) {
           
        }

        return view('admin.Teacher_Staff.total_teacher_report',['job_type_data'=>ov_setup_model::where('type','Job Type')->get(),'designation_data'=>ov_setup_model::where('type','Job Type')->get(),'tech_subject'=>manage_subject_model::where('type','Tech')->groupBy('subject_name')->get(),'subject'=>manage_subject_model::where('type','Non-Tech')->groupBy('subject_name')->get(),'all_search_data'=>$table]);
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
