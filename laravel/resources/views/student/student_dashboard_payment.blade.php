@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Exam')
@section('breadcrumbs','Student Dhasboard Exam')
@section('student_dasboard_content')
   <table class="table table-responsive " style="background: #fff;">
     <tbody>
      <tr style="background:#147F7F">
      <td class="text-center" colspan="2">
       <span style="font-size:19px; color:#FFFFFF;"><b>Payment Information</b></span>
        </td>
      </tr>
      </tbody>
    </table>
  <table class="table table-bordered">
      <thead  class="thead-inverse"> 
        <tr>
          <th>Sl.No</th>
          <th>Payment Date</th>
          <th>Title</th>
          <th>Account Name</th>
          <th>On Net Total</th>
          <th>Payment</th>
          <th>Due</th>
          <th>Invoice Creator</th>
          <th>Payment Status</th>
        </tr>
      </thead>
      <tbody>
       @foreach($invoice_data as $key=>$invoice_data_value)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{date('d-M-Y', strtotime($invoice_data_value->created_at))}}</td>
          <td>{{$invoice_data_value->title}}</td>
          <td>{{$invoice_data_value->account_name}}</td>
          <td>{{$invoice_data_value->on_net_total}}</td>
          <td>{{$invoice_data_value->Payment}}</td>
          <td>
            {{$invoice_data_value->on_net_total-$invoice_data_value->Payment}}

          </td>
          <td>{{$invoice_data_value->invoice_creator}}</td>
          <td>
           @if($invoice_data_value->cash_status=='Paid')
            <span style="color: green;">{{$invoice_data_value->cash_status}}</span>
           @else
           <span style="color: red;">{{$invoice_data_value->cash_status}}</span>
           @endif
          

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>



    
<?php
 // if($invoice_data)
 //  {
 //    $total=$invoice_data->total;
 //    $payment=$invoice_data->Payment;
 //    if($total== $payment)
 //    {
 //      echo "Ur Payment Status Paid";
 //    }
 //    else
 //    {
 //    	$unpaid_payment=$total-$payment;
 //    	echo "Unpaid".$unpaid_payment;
 //    }
 //  }
 // else
 //  {
 //   echo "no Data Found";
 //  }
  ?>
@stop