<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dormitory_model;
use App\assign_dormitory_model;
class DormitoryStudentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Report.dormitory_student_report',['all_search_data'=>'','dormitory_name'=>dormitory_model::groupBy('dormitory_name')->get()]);
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
        $serach_data=assign_dormitory_model::where(function($serach_data) use ($request) {
                     if($request->dormitory_name !='all')
                     {
                        $serach_data->where('dormitory_name',$request->dormitory_name);
                     }
                     if ($request->dormitory_name=='all') {
                        $serach_data->where('dormitory_name','!=',"fcis");
                     }
                  
                     if($request->all)
                     {
                        $serach_data->where('dormitory_name', 'LIKE', '%' . $request->all. '%');
                      
                     }
        })->groupBy('dormitory_name')->get();

         
        
       //$tech_data=teacher_model::where('type','Tech')->groupBy('job_type')->get();
// $teach_id=0;
    
         
        
          $table.="<table style=\"margin-top: 20px;border: 0px solid gray;width: 100%;\">";
          $table.="<td >";
          
             $table.="<h4 style=\"color:#215663;font-size:25px; margin-bottom:-6px;    margin-left: 338px;\">
             Dormitory All Student's Admit Fess Report
              </h4>";
              $table.="<hr>";
             
            
           $table.="</td>";
         $table.="</table>";

  
       $table.="<table border='1' style='width: 100%;'>";
         $table.="<thead>";
          $table.="<tr>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Serial No</th>";
           $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Student Name</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Student Roll</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Department</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Mobile No</th>";
            $table.="<th style=\"height: 25px;background-color: #cecece;color:black;color:black;\">Admit Date</th>";
            $table.="</tr>";
        $table.="</thead>";

        $table.="<tbody>";
           
           foreach ($serach_data as $key=>$search_data_fetch) {

           
           
            $student_data=assign_dormitory_model::join('students','students.roll','=','assign_dormitory.student_roll')->where('dormitory_name',$search_data_fetch->dormitory_name)->get();
             $table.="<tr>";
         $table.="<td colspan='9'><h4 style=\"color:#e6a60b;font-size:25px;margin-left: 3px;\">
           $search_data_fetch->dormitory_name&nbsp;$search_data_fetch->dormitory_no
              </h4></td>";
              foreach ($student_data as $key1=>$value_fetch) {
                 $id=$key1+1;
               
            
               $table.="</tr>";
             $table.="<tr>";
                $table.="<td style=\"height: 29px;\">$id</td>";
                $table.="<td style=\"height: 29px;\">$value_fetch->student_name</td>";
                $table.="<td style=\"height: 29px;\">$value_fetch->student_roll</td>";
                $table.="<td style=\"height: 29px;\">$value_fetch->department</td>";
                $table.="<td style=\"height: 29px;text-align:center;\">$value_fetch->mobile</td>";
                $date=$value_fetch->created_at->format('d/m/Y');
                $table.="<td style=\"height: 29px;\">$date</td>";

            $table.="</tr>";
              }
      }
        $table.="</tbody>";
         $table.="</table>";
        
                  
       
    
      
          
        }


       
        catch (\Exception $e) {
           
        }

       return view('admin.Report.dormitory_student_report',['all_search_data'=>$table,'dormitory_name'=>dormitory_model::groupBy('dormitory_name')->get()]);
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
