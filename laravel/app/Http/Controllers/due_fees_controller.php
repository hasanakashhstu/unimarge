<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manage_class_model;
use App\invoice_model;
use App\students;
use Illuminate\Support\Facades\Input;
use App\ov_setup_model;
use App\payment_receipt_model;
class due_fees_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $class_data=manage_class_model::all();
       $medium=ov_setup_model::where('type','Medium')->get();
        return view('admin.Report.due_fees_report',['class_data'=>$class_data,'data'=>'','medium'=>$medium]);
    }



    public function due_fees_report_data(Request $request)
    {
         // echo $request->class_data;
        // echo $request->medium;
      
        $students=students::where('class',$request->class_data)
                            ->where('medium',$request->medium)
                            ->get();

        
       $from=date('d-m-Y',strtotime($request->from_date));
       $to=date('d-m-Y',strtotime($request->to_date));
       $table="<span>From : $from</span><br>";                    
       $table.="<span>To : $to</span>";                    
       $table.="<table border='1' style='width: 1113px;margin-top: 20px;    margin-bottom: 20px;'>";
                     $table.="<thead>";
                     $table.="<tr>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Sl No</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Name</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Roll</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Student Reg</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Class</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Medium</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Total Receiveable</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Total Payment</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Due</th>";
                         $table.="<th style='height: 25px;background-color: #cecece;color:black;color:black;'>Advance</th>";
                    $table.="</tr>";
                    $table.="</thead>";
                    $table.="<tbody>";
                    
                    foreach ($students as $key => $students_data)
                    {
                        $key++;

                     $student_total_invoice=invoice_model::where('class_name',$request->class_data)
                                                        ->where('student_roll',$students_data->roll)
                                                        ->whereBetween('from_date',[$request->from_date,$request->to_date])
                                                        ->whereBetween('to_date',[$request->from_date,$request->to_date])
                                                        ->sum('on_net_total');
                                                        //->get();

                    $student_total_payment=payment_receipt_model::whereBetween('receipt_date',[$request->from_date,$request->to_date]) 
                                               ->where('student_roll',$students_data->roll)
                                               ->where('class',$request->class_data)
                                               ->sum('receipt_amount');
                       
                        $sumury=$student_total_invoice-$student_total_payment;
                        $advance=0;
                        if($sumury<0)
                        {
                            $advance=-$sumury;
                            $due=0;
                        }
                        else
                        {
                            $due=$student_total_invoice-$student_total_payment; 
                        }

                        $table.="<tr>";
                            $table.="<td>$key</td>";
                            $table.="<td>$students_data->student_name</td>";
                            $table.="<td>$students_data->roll</td>";
                            $table.="<td>$students_data->reg_number</td>";
                            $table.="<td>$students_data->class</td>";
                            $table.="<td>$students_data->medium</td>";
                            $table.="<td>$student_total_invoice</td>";
                            $table.="<td>$student_total_payment</td>";
                            $table.="<td>$due</td>";
                            $table.="<td>$advance</td>";

                        $table.="</tr>";
                    }
                       



                    $table.="</tbody>";        

       echo $table;
       //print_r($students);
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
