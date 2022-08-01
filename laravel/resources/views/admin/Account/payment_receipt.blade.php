@extends('admin.index')
@section('Title','Payment Receipt')
@section('breadcrumbs','Student Payment Receipt')
@section('breadcrumbs_link','/payment_receipt')
@section('breadcrumbs_title','payment_receipt')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



	<div class="container">
      <h2><i class="fa fa-bus" aria-hidden="true" ></i>Payment Receipt</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}} Payment Receipt</p> <!-- Transport Details -->


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
<br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/expense_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/expense_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/expense_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Payment Receipt List</a></li>
          <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i>Payment Receipt </a></li>
        </ul>

      

    <div class="tab-content"> <!-- Transport List Report  -->
          
          <div id="home" class="tab-pane fade in active">
              <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                  </div>

              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Journal Type</th>
                        <th>Asset Account</th>
                        <th>Expense Account</th>
                        <th>Amount Method</th>
                        <th>Bank Name</th>
                        <th>cheque No</th>
                        <th>Transaction Date</th>
                        <th>Amount</th>
                        <th>Allocate</th>
                        <th>Party Name</th>
                        <th>remark</th>
                       <th>Action</th>
                    </tr>
          </thead>
            <tbody>
          
                     
                    </tbody>
                  </table>
                </div>
            </div>
        </div>







        <div id="menu1" class="tab-pane fade">
          <div>
          <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Payment Receipt</h5>
          </div>
          <div class="widget-content nopadding">

          {{Form::open(['url'=>'/payment_receipt','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}	
                
                <div class="control-group">
                {{Form::label('invoice_id','Invoice Id',['class'=>'control-label','title'=>'invoice_id'])}}
                	<div class="controls">
                      {{Form::text('invoice_id','',['id'=>'required','placeholder'=>'Invoice Id','title'=>'invoice_id','class'=>'invoice_id'])}}
                	</div>
              	</div>


              	<div class="control-group">
                 {{Form::label('student_roll','Student Roll',['class'=>'control-label','title'=>'student_roll'])}}
                	<div class="controls">
                   {{Form::text('student_roll','',['id'=>'required','placeholder'=>'Student Roll','title'=>'student_roll','class'=>'student_roll'])}}
                	</div>
              	</div>


              	<div class="control-group" id="asset_account_list">
                  {{Form::label('on_net_total','On Net Total',['class'=>'control-label','title'=>'on_net_total'])}}
                	<div class="controls">
                    <p class="on_net_total" style="font-size: 15px;margin-top: 5px;"></p>
                  	 {{Form::hidden('on_net_total','',['id'=>'required','placeholder'=>'Student Roll','title'=>'student_roll','class'=>'on_net_total_value'])}}
                	</div>
              	</div>


              	<div class="control-group">
                 {{Form::label('waber','Waber',['class'=>'control-label','title'=>'waber'])}}
                	<div class="controls">
                    <p class="waber" style="font-size: 15px;margin-top: 5px;"></p>
                   
                	</div>
              	</div>





                <div class="control-group" id="bank_name">
                {{Form::label('waber_purpose','Waber Purpose',['class'=>'control-label','title'=>'waber_purpose'])}}
                  <div class="controls">
                    <p class="waber_purpose" style="font-size: 15px;margin-top: 5px;"></p> 
                  </div>
                </div>

               <div class="control-group" id="bank_name">
                    {{Form::label('payment_receipt_history','Payment Receipt History',['class'=>'control-label','title'=>'payment_receipt_history','style'=>'    margin-left: 58px;'])}}
                  </div>
   
                <div style="display: flex;justify-content: center;" class="control-group">
                  
                    
                   
                    <div class="get_payment_receipt"></div>



                 
                </div>


                <div class="control-group current_amount_div" style="display: none;">
                  {{Form::label('current_amount','Amount',['class'=>'control-label','title'=>'amount'])}}
                  <div class="controls">
                  {{Form::text('current_amount','',['id'=>'requried','placeholder'=>'Amount','title'=>'current_amount','class'=>'current_amount'])}}
                  </div>
                </div>
           {{Form::hidden('total','',['id'=>'requried','placeholder'=>'Amount','title'=>'current_amount','class'=>'total_value'])}}
              	
 

              

          <div class="form-actions submit" style="display: none;">
         {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success'])}}
        </div>
        {{Form::close()}}
   
          </div> 
        </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
      $(".invoice_id").keyup(function(){
          var invoice_id=$(this).val();


           $.ajax({
              url:'/get_payment_receipt_second',
              type:'POST',
              data:{'invoice_id':invoice_id,'_token': $('input[name=_token]').val()},
              success:function(r){
                 //console.log(r);
                 $(".student_roll").val(r.student_roll);
                 $(".on_net_total").html(r.on_net_total);
                 $(".on_net_total_value").val(r.on_net_total);
                 $(".waber").html(r.waber);
                 $(".waber_purpose").html(r.waber_purpose);
               
              }
          });

          $.ajax({
              url:'/get_payment_receipt',
              type:'POST',
              data:{'invoice_id':invoice_id,'_token': $('input[name=_token]').val()},
              success:function(data){
                 //console.log(data)
                 $(".get_payment_receipt").html(data);

                 var total=$(".total").html();
                 $(".total_value").val(total);
                 var on_net_total=$(".on_net_total").html();
                 var due=parseInt(on_net_total)-parseInt(total);
                 if(due>0)
                 {
                    $(".current_amount_div").show();
                    $(".current_amount").val(due);
                    $(".submit").show();
                 }
              }
          });

         
      });
    
      $(".current_amount").keyup(function(){
            var current_amount=$(this).val();
            var total=$(".total").html();
            var on_net_total=$(".on_net_total").html();
            var due=parseInt(on_net_total)-parseInt(total);
            if(current_amount>due)
            {
               alert('Amount Is Greater Than Due');
               $(".current_amount").val("");
            }
      });


    });

 </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/expense_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
@stop

