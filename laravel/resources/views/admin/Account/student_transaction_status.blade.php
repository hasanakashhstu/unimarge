@extends('admin.index')
@section('Title','student_transaction_status')
@section('breadcrumbs','student_transaction_status')
@section('breadcrumbs_link','/student_transaction_status')
@section('breadcrumbs_title','student_transaction_status')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


<div class="container">
<h2><i class="fa fa-money" aria-hidden="true"></i> &nbsp;Student Transaction Status</h2>
<!-- Tab Heading  -->
<p title="Transport Details">{{Session::get('school.system_name')}} Student Transaction Status Report</p>
<!-- Transport Details -->



<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
             
           <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Create New Payment</a></li>
       
         </ul>
      </div>
    </div>
</div>

{{Form::open(['url'=>'/student_transaction_status','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
{{Form::close()}}
<div class="tab-content" >
<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/invoice_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

 <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Transaction</h4>
                          </div>
                          <div class="modal-body">
                            <div class="component">
                              
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                  </div>

  <!-- Transport List Report  -->
  <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Student Transaction Status Data Table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Medium</th>
              <th>Class</th>
              <th>Department</th>
              <th>Student Roll</th>
              <th>Total Amount</th>
              <th>Get Transaction</th>
              <th>Due</th>
              <th>Paid</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($student_transaction as $student_transaction_value)
            @php
              $student_data=DB::table('students')->where('roll',$student_transaction_value->student_roll)->first();
      
              $get_transaction=DB::table('payment_receipt')->where('student_roll',$student_transaction_value->student_roll)->sum('receipt_amount');
            @endphp
              <tr class="gradeX">
                <td>{{isset($student_data->student_name) ? $student_data->student_name : ''}}</td>
                <td>{{isset($student_data->medium) ? $student_data->medium : ''}}</td>
                <td>{{isset($student_data->class) ? $student_data->class : ''}}</td>
                <td>{{isset($student_data->department) ? $student_data->department : ''}}</td>
                <td>{{$student_transaction_value->student_roll}}</td>
                <td>{{$student_transaction_value->total_amount}}</td>
                <td>{{$get_transaction}}</td>
                <td>
                  @php
                    $due=$student_transaction_value->total_amount-$get_transaction;
                  @endphp
                  {{$due}}
                </td>
                <td>{{$get_transaction}}</td>
                <td>
                  <button type="button" class="view btn btn-info" data-toggle="modal" data-target="#myModal" get_id='{{$student_transaction_value->student_roll}}'>View Transaction</button>
                </td>
              </tr>
           @endforeach 



          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(".view").unbind().click(function(){
      var student_roll=$(this).attr("get_id");
      $.ajax({
        url:'/view_transaction',
        type:'post',
        data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
        success:function(data){
          console.log(data);
          $(".component").html(data);
        }
      });
  });
</script>

@stop