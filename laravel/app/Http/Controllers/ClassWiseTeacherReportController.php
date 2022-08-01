<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_department_model;
use App\manage_class_model;
use App\manage_subject_model;
use App\class_routine_model;
class ClassWiseTeacherReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.Teacher_Staff.classwise_teacher_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'all_search_data'=>'']);
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
       try {
    $serach_data=manage_subject_model::where(function($serach_data) use ($request) {
                     if($request->class_name)
                     {
                        $serach_data->where('class',$request->class_name);
                     }
                     if($request->all)
                     {
                        $serach_data->where('class', 'LIKE', '%' . $request->all. '%');
                     }
        })->groupBy('department')->get();
      $table.="<h3 style=\"margin-left: 324px;\">
               Class $request->class_name Department Wise Instructor List
              </h3>";
    
     foreach ($serach_data as $key => $value_fetch) {
       
      
 $table.="<table style=\"margin-top: 8px;border: 0px solid gray;width: 100%;\">";
          $table.="<td rowspan=\"2\">";
           
             $table.="<h3 style=\"color: #7aa3ad;\">
              Department:  $value_fetch->department
              </h3>";
             $table.="<br>";
             $table.="<h4 style=\"margin-left: 490px;margin-top: -30px;\"></h4>";
           $table.="</td>";
         $table.="</table>";
       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Type</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Subject Code</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Instructor</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Comment</th>";
            $table.="</tr>";
        $table.="</thead>";
        $table.="<tbody>";
        
        
          $department_wise=manage_subject_model::where('department',$value_fetch->department)->where('class',$value_fetch->class)->get();
          
        foreach ($department_wise as $key =>$department_wise_data) {
            $id=$key+1;
          
            $table.="<tr>";
               
                $table.="<td style=\"height: 29px;\">$id</td>";
                $table.="<td style=\"height: 29px;\">$department_wise_data->subject_name</td>";
                $table.="<td style=\"height: 29px;\">$department_wise_data->type</td>";
                $table.="<td style=\"height: 29px;\">$department_wise_data->subject_code</td>";
                $table.="<td style=\"height: 29px;\">$department_wise_data->teacher</td>";
                $table.="<td style=\"height: 29px;\"> </td>";

            $table.="</tr>";
              }
         $table.="</tbody>";
         $table.="</table>";
      
          }
         }
        catch (\Exception $e) {
           
        }

        return view('admin.Teacher_Staff.classwise_teacher_report',['class_data'=>manage_class_model::groupby('class_name')->get(),'depertment_data'=>manage_department_model::groupby('department_name')->get(),'all_search_data'=>$table]);
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
