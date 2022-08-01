<?php

namespace App\Http\Controllers;

use App\general_settings_model;
use App\invoice_child_model;
use App\invoice_model;
use App\manage_class_model;
use App\payment_receipt_child_model;
use App\payment_receipt_model;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentFinancialLedgerReportController extends Controller
{
  public function index(Request $request)
  {
    $session = Session::get('student_details');
    $invoice_data = invoice_model::leftJoin('students', 'students.roll', '=', 'invoice.student_roll')
        ->where(function ($invoice_data) use ($session) {
          if (isset($session->roll)) {
            $invoice_data->where('invoice.student_roll', $session->roll);
          }
        })->get();
    
    $all_invoice_data = [];
    foreach ($invoice_data as $key => $data) {
      $all_invoice_data[$key] = $data;
      $all_invoice_data[$key]['invoice_details'] = invoice_child_model::where('invoice_id', $data->invoice_id)->leftJoin('invoice_component', 'invoice_child.component_id', '=', 'invoice_component.invoice_component_id')->get();
      $payment_receipts =  payment_receipt_model::where('student_roll', $data->roll)->where('class', $data->class_name)->get();
      $all_invoice_data[$key]['balance'] = $data->on_net_total - $payment_receipts->sum('receipt_amount');
      
      $all_receipt_data = [];
      foreach ($payment_receipts as $re_key => $rec_data) {
        $all_receipt_data[$re_key] = $rec_data;
        $all_receipt_data[$re_key]['payment_details'] = payment_receipt_child_model::where('payment_receipt_id', $rec_data->payment_receipt_id)
            ->leftJoin('invoice_component', 'payment_receipt_child.component_id', '=', 'invoice_component.invoice_component_id')->get();
      }
      
      $all_invoice_data[$key]['payment_details'] = $all_receipt_data;
    }
    
    
    $data['all_data'] = $all_invoice_data;
    $data['student_info']=$session;
    $data['general_setting']=general_settings_model::first();
    
    
    return view('student.financial_ledger_report', $data);
  }
}
