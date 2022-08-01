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
      <h2><i class="fa fa-money" aria-hidden="true" ></i>Payment Receipt</h2> <!-- Tab Heading  -->
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
                        <th>Sl No</th>
                        <th>Student Roll</th>
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Amount</th>
                        <th>Receipt Date</th>
                        <th>Receipt By</th>
                        <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach($payment_receipt as $key=>$payment_receipt_data)
                     <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$payment_receipt_data->student_roll}}</td>
                        <td>{{$payment_receipt_data->student_name}}</td>
                        <td>{{$payment_receipt_data->class}}</td>
                        <td>{{$payment_receipt_data->receipt_amount}}</td>
                        <td>{{$payment_receipt_data->receipt_date}}</td>
                        <td>{{$payment_receipt_data->receipt_by}}</td>
                        <td style="display:inline-flex;">
                           {{Form::open(['url'=>"student_payment/$payment_receipt_data->payment_receipt_id",'method'=>'DELETE'])}}
                          {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                      {{Form::close()}}

        {{Form::open(['url'=>"student_payment/$payment_receipt_data->payment_receipt_id",'method'=>'GET','target'=>'_blank'])}}
            {{ Form::submit('Money Receipt',['class'=>'btn btn-primary'])}}
        {{Form::close()}}

                        </td>
                     </tr>
                    @endforeach
                     
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
{{Form::open(['url'=>'/student_payment','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">

              <p class='text-center'>Invoice information</p>

              <div class="control-group roll_div">
                <label class="control-label">Roll</label>
                <div class="controls">
                  
                  {{Form::text('student_roll',null,['id'=>'student_roll','class'=>'student_roll'])}}
                </div>
              </div>



              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  {{Form::date('date', \Carbon\Carbon::now(),['id'=>'date'])}}
                </div>
              </div>

                <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                  <input type="button" class="btn btn-success" id="student_data" value="Submit">
                </div>
              </div>

<div style="display: none;" class="report_div">
             


               <div class="control-group roll_div">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <span class="name" style="font-size:15px;"></span>
                </div>
              </div>

               <div class="control-group roll_div">
                <label class="control-label">Medium :</label>
                <div class="controls">
                  <span class="medium" style="font-size:15px;"></span>
                </div>
              </div>

               <div class="control-group roll_div">
                <label class="control-label">Class :</label>
                <div class="controls">
                  <input type="hidden" class="class_text" name="class">
                  <span class="class" style="font-size:15px;"></span>
                </div>
              </div>

              <div class="control-group roll_div">
                <label class="control-label">Department :</label>
                <div class="controls">
                  <span class="deparment" style="font-size:15px;"></span>
                </div>
              </div>

              <div class="control-group roll_div">
                <label class="control-label">Section :</label>
                <div class="controls">
                  <span class="section" style="font-size:15px;"></span>
                </div>
              </div>

              <div class="control-group roll_div">
                <label class="control-label">Mobile :</label>
                <div class="controls">
                  <span class="mobile" style="font-size:15px;"></span>
                </div>
              </div>

              <div class="control-group roll_div">
                <label class="control-label">Email :</label>
                <div class="controls">
                  <span class="email" style="font-size:15px;"></span>
                </div>
              </div>

              
              <p class='text-center'>Payment information</p><hr>


               
               <div>
                 <table style="width: 100%;" class="table table-bordered">
                    <tr>
                      <th>Sl No</th>
                      <th>Component</th>
                      <th>Year</th>
                      <th>Class</th>
                      <th>Amount</th>
                    </tr>
                   @foreach($invoice_component as $key=>$invoice_component_value)
                    <tr>
                       <td style="text-align: center;">{{$key+1}}</td>
                       <td style="text-align: center;" >
                        <input type="hidden" value="{{$invoice_component_value->invoice_component_id}}" name="component_id[]">{{$invoice_component_value->component_name}}</td>
                       <td style="text-align: center;" class="year"></td>
                       <td style="text-align: center;" class="class"></td>
                       <td style="text-align: center;">
                         <input type="text" name="amount[]" value="0" class="amount">
                       </td>
                    </tr>
                  @endforeach 
                  <tr>
                    <td colspan="4" style="text-align: center;font-size: 20px;">Total</td>
                    <td colspan="2" style="text-align: center;">
                      <input type="text" id="sum" readonly="readonly" name="total_amount" style="margin-left: 2px;">
                    </td>
                  </tr> 
                 </table>
               </div>
                
          <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>


        </div>
        
</div>
{{Form::close()}}

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

       $("#student_data").click(function(){
          var d = new Date($("#date").val());
          var n = d.getFullYear();


           var student_roll=$(".student_roll").val();
           $.ajax({
                   url:'/student_data_for_invoice',
                   type:'post',
                   data:{'student_roll':student_roll,'_token': $('input[name=_token]').val()}, 
                   success:function(data){

                     $(".report_div").show();
                     $(".name").html(data.student_name);
                     $(".medium").html(data.medium);
                     $(".class").html(data.class);
                     $(".class_text").val(data.class);
                     $(".deparment").html(data.department);
                     $(".section").html(data.section);
                     $(".mobile").html(data.mobile);
                     $(".email").html(data.email);
                     $(".year").html(n);
                   }
           });
       });



    $(".amount").on("keydown keyup", function() {
        calculateSum();
    });


function calculateSum() {
    var sum = 0;
    $(".amount").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });

    $("input#sum").val(sum.toFixed(0));
}
  });
</script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/invoice_pdf');

          w.onload = function()
          {
              w.print();
          };
      
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

