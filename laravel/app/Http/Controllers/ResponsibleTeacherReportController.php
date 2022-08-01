<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
Use App\students;
use App\general_settings_model;
class ResponsibleTeacherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Teacher_Staff.responsible_teacher_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'search_all_data'=>'']);
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
        $student_all_data=students::all()->toArray();
        $student_data_sort=array_column($student_all_data,'reponsible_teacher');
        $table="";
       try {
    $serach_data=students::where(function($serach_data) use ($request) {                     
                     if($request->class_name)
                     {
                        $serach_data->where('class',$request->class_name);
                     }
                     
                     if($request->all)
                     {
                      
                        $serach_data->orwhere('class', 'LIKE', '%' . $request->all. '%');
                      
                     }
        })->groupBy('department')->get();

    // print_r($serach_data);
    // exit();
     $session_data=general_settings_model::where('general_settings_id','1')->first();
         $table.="<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
          $table.="<td >";
          
             $table.="<h3 style=\"font-size:25px; margin-bottom:-6px;\">
                <span style=\"color:#215663;\">Class $request->class_name </span><span style=\"color:#e6a915;\">($session_data->default_session session)</span>
              </h3>";
             
            
          
     
             $table.="<h3 style=\"color:#1985a9;font-size:20px; margin-bottom:-6px;\">
                  Department Wise Student's Responsible Teacher's List
              </h3>";
             
            
           $table.="</td>";
         $table.="</table>";
    
        $table.="<table border='1' style='width: 100%;'>";
            $table.="<thead>";
                $table.="<tr>";
                    $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
                    $table.="<th  style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Department</th>";
                    $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Student Name </th>";
                    $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Teacher</th>";
                    $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
                $table.="</tr>";
            $table.="</thead>";




            $table.="<tbody>";
            $id=0;
             foreach ($serach_data as  $key=>$fetch_value) {
                
                 $department_wise_data=students::where('class',$fetch_value->class)->where('department',$fetch_value->department)->groupBy('reponsible_teacher')->get();
                 
             
                  foreach ($department_wise_data as $value) {
                     $students_data=students::where('class',$fetch_value->class)->where('department',$fetch_value->department)->where('reponsible_teacher', $value->reponsible_teacher)->get();
                          $total_student_count=count($students_data);
                      foreach ($students_data as $key=>$value_fetch) {
                  
                     $id=$id+1;
                 
                        if($key==0)
                        {
                            $table.="<tr>";
                                $table.="<td style=\"text-align:center\">".$id."</td>";
                                $table.="<td style=\"text-align:center\" rowspan=$total_student_count>$fetch_value->department</td>";
                                $table.="<td style=\"text-align:center\">$value_fetch->student_name ($value_fetch->roll)</td>";
                                $table.="<td style=\"text-align:center\" rowspan=$total_student_count>$value->reponsible_teacher</td>";
                                $table.="<td></td>";
                            $table.="</tr>";
                        }
                        else
                        {
                            $table.="<tr>";
                                $table.="<td style=\"text-align:center\">".$id."</td>";
                                $table.="<td style=\"text-align:center\">$value_fetch->student_name ($value_fetch->roll)</td>";
                                $table.="<td></td>";
                            $table.="</tr>";  
                        }
                }
            }
                




                 
               }

                
            $table.="</tbody>";
        $table.="</table>";




         }
        catch (\Exception $e) {
           
        }

        return view('admin.Teacher_Staff.responsible_teacher_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'search_all_data'=>$table]);
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
