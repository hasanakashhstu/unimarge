<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoice_model;
use App\manage_class_model;
use Illuminate\Support\Facades\Input;
class FeesCollectionReportController extends Controller
{
    public function index()
    {
        // $invoice_data=invoice_model::all();
        $class_data=manage_class_model::all();
        
       return view('admin.Report.fees_collection_report',['class_data'=>$class_data,'fees_data'=>'']);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {


       
         $class_data=manage_class_model::all();
         

      $invoice_data=invoice_model::join('students','students.roll','=','invoice.student_roll')
          ->where(function($invoice_data){
                     if(Input::get('student_roll'))
                     {
                        $invoice_data->where('student_roll',Input::get('student_roll'));
                     }
                     if(Input::get('class'))
                     {
                        $invoice_data->where('class_name',Input::get('class'));
                     }
                     if(Input::get('from_date'))
                     {
                        $invoice_data->where('from_date',Input::get('from_date'));
                     }
                      if(Input::get('to_date'))
                     {
                        $invoice_data->where('to_date',Input::get('to_date'));
                     }
                      if(Input::get('from_date') && Input::get('to_date'))
                     {
                        $invoice_data->whereBetween('from_date',array(Input::get('from_date'),Input::get('to_date')));
                     }
                      if(Input::get('from_date') && Input::get('to_date'))
                     {
                        $invoice_data->whereBetween('to_date',array(Input::get('from_date'),Input::get('to_date')));
                     }
                     
                     
                     if(Input::get('all'))
                     {
                        $invoice_data->where('student_roll', 'LIKE', '%' . Input::get('all'). '%');
                        $invoice_data->orwhere('class_name', 'LIKE', '%' . Input::get('all'). '%');
                        $invoice_data->orwhere('from_date', 'LIKE', '%' . Input::get('all'). '%');
                        $invoice_data->orwhere('to_date', 'LIKE', '%' . Input::get('all'). '%');
                    }
                    })->get();

                    $table="<table border='1' style='width: 1113px;'>";

                          $table.="<thead>";
                            $table.="<tr>";
                              $table.="<th>SL NO</th>";
                              $table.="<th>INVOICE  ID</th>";
                              $table.="<th>INVOICE TITLE</th>";
                              $table.="<th>STUDENT ROLL</th>";
                              $table.="<th>CLASS NAME</th>";
                              $table.="<th>DEPARTMENT</th>";
                              $table.="<th>SECTION</th> ";
                               $table.="<th>ON NET TOTAL</th>";
                               $table.="<th>DUE </th>";
                               $table.="<th>PAYMENT</th>";
                               $table.="<th>ACCOUNT NAME</th>";
                               $table.="<th>FROM DATE</th>";
                               $table.="<th>TO DATE</th>";
                               $table.="<th>INVOICE CREATOR</th>";
                               $table.="<th>Status</th>";
                            $table.="</tr>";
                          $table.="</thead>";
                        $table.="<span id=\"data_fetch\">";
                          $table.="<tbody >";
                          
                          foreach($invoice_data as $key=>$fees_data_fetch)
                          {
                            $id=$key+1;
                            $due=$fees_data_fetch->Payment-$fees_data_fetch->on_net_total;
                            $table.="<tr>";
                              $table.="<td>$id</td>";
                              $table.="<td>$fees_data_fetch->invoice_id</td>";
                              $table.="<td>$fees_data_fetch->title</td>";
                              $table.="<td>$fees_data_fetch->student_roll</td>";
                              $table.="<td>$fees_data_fetch->class_name</td>";
                              $table.="<td>$fees_data_fetch->department</td>";
                              $table.="<td>$fees_data_fetch->section</td>";
                              $table.="<td>$fees_data_fetch->on_net_total</td>";
                              $table.="<td>$due</td>";
                               $table.="<td>$fees_data_fetch->Payment</td>";
                               $table.="<td>$fees_data_fetch->account_name</td>";
                               $table.="<td>$fees_data_fetch->from_date</td>";
                               $table.="<td>$fees_data_fetch->to_date</td>";
                               $table.="<td>$fees_data_fetch->invoice_creator</td>";
                               $table.="<td>$fees_data_fetch->cash_status</td>";
                             $table.="</tr>";
                              }
                          

                            $table.="</tbody>";
                          $table.="</span>";
                          $table.="</table>";
                          $table.="</div>";
                  $table.="</div>";
            
             
      return view('admin.Report.fees_collection_report',['class_data'=>$class_data,'fees_data'=>$table]);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
