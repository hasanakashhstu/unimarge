<?php

namespace App\Http\Controllers;

use App\invoice_child_model;
use App\invoice_model;
use App\manage_class_model;
use App\payment_receipt_child_model;
use App\payment_receipt_model;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FinancialLedgerReport extends Controller
{
  public function financial_ledger_report()
  {
    $data['class_data'] = manage_class_model::all();
    $data['fees_data'] = [];
    return view('admin.Report.financial_ledger_report.financial_ledger_report', $data);
  }
  
  public function financial_ledger_report_data(Request $request)
  {
    $class_data = manage_class_model::all();
    
    $invoice_data = invoice_model::leftJoin('students', 'students.roll', '=', 'invoice.student_roll')
        ->where(function ($invoice_data) use ($request) {
          if ($request->input('student_roll')) {
            $invoice_data->where('invoice.student_roll', $request->input('student_roll'));
          }
          if ($request->input('class')) {
            $invoice_data->where('invoice.class_name', $request->input('class'));
          }
          if ($request->input('from_date')) {
            $invoice_data->where('invoice.from_date', $request->input('from_date'));
          }
          if ($request->input('to_date')) {
            $invoice_data->where('invoice.to_date', $request->input('to_date'));
          }
          if ($request->input('from_date') && $request->input('to_date')) {
            $invoice_data->whereBetween('invoice.from_date', array($request->input('from_date'), $request->input('to_date')));
          }
          if ($request->input('from_date') && $request->input('to_date')) {
            $invoice_data->whereBetween('invoice.to_date', array($request->input('from_date'), $request->input('to_date')));
          }
          if ($request->input('all')) {
            $invoice_data->where('student_roll', 'LIKE', '%' . $request->input('all') . '%');
            $invoice_data->orwhere('class_name', 'LIKE', '%' . $request->input('all') . '%');
            $invoice_data->orwhere('from_date', 'LIKE', '%' . $request->input('all') . '%');
            $invoice_data->orwhere('to_date', 'LIKE', '%' . $request->input('all') . '%');
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
    
    
    
    
    $data['student_info'] = students::where('roll', $request->input('student_roll'))->first();
    $data['all_data'] = $all_invoice_data;
    $data['class_data'] = $class_data;
    $data['fees_data'] = [];
    
    
    return view('admin.Report.financial_ledger_report.financial_ledger_report', $data);
  }
}
