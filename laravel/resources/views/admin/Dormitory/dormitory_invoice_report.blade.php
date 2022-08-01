@extends('admin.index')
@section('Title','Invoice')
@section('breadcrumbs','Invocie')
@section('breadcrumbs_link','/invoice')
@section('breadcrumbs_title','Invoice')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


<div class="container">
<h2><i class="fa fa-money" aria-hidden="true"></i> &nbsp; Dormitory Invoice Report</h2>
<!-- Tab Heading  -->
<p title="Transport Details">{{Session::get('school.system_name')}} Dormitory Invoice's Report</p>
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
                            <h4 class="modal-title">Payment Receipt</h4>
                          </div>
                          <div class="modal-body">
                            <div class="control-group">
                                {{Form::label('current_amount','Amount',['class'=>'control-label','title'=>'amount'])}}
                            <div class="controls">
                                {{Form::text('current_amount','',['id'=>'requried','placeholder'=>'Amount','title'=>'current_amount','class'=>'current_amount'])}}
                                {{Form::hidden('invoice_id','',['class'=>'invoice_id'])}}
                               
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                               {{Form::button('Save',['class'=>'btn btn-success save_data','target'=>'_blank','style'=>'float: left;','data-dismiss'=>'modal'])}}
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
        <h5>Dormitory Invoice Data Table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          
          <thead>
            <tr>
              <th>Invoice ID</th>
              <th>Medium</th>
              <th>Class</th>
              <th>Student Roll</th>
              <th>On Net Total</th>
              <th>Waber</th>
              <th>Waber Purpose</th>
              <th>Form Name</th>
              <th>Creator</th>
              <th>From Date</th>
              <th>To Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

          @foreach($invoice_data as $invoice_data_list)
            <tr class="gradeX">
              <td>{{$invoice_data_list->invoice_id}}</td>
              <td>{{$invoice_data_list->medium}}</td>
              <td>{{$invoice_data_list->class_name}}</td>
              <td>{{$invoice_data_list->student_roll}}</td>
              <td>{{$invoice_data_list->on_net_total}}</td>
              <td>{{$invoice_data_list->waber}}</td>
              <td>{{$invoice_data_list->waber_purpose}}</td>
              <td>{{$invoice_data_list->form_name}}</td>
              <td>{{$invoice_data_list->invoice_creator}}</td>
              <td>{{$invoice_data_list->from_date}}</td>
              <td>{{$invoice_data_list->to_date}}</td>
              <td id="my_align" class="display_status">

        {{Form::open(['url'=>"/invoice_print/$invoice_data_list->invoice_id",'method'=>'GET'])}}
            {{ Form::submit('print',['class'=>'btn btn-primary'])}}
        {{Form::close()}}



        {{Form::open(['url'=>"invoice/$invoice_data_list->invoice_id",'method'=>'DELETE'])}}
            {{Form::submit('Delete',['class'=>'btn btn-danger applicant_student_delete','target'=>'_blank'])}}
        {{Form::close()}}


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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
 
    $(".get_payment").unbind().click(function(){
        var invoice_id=$(this).attr('get_value');
        $(".invoice_id").val(invoice_id);
       
    });

    $(".save_data").unbind().click(function(){
        var invoice_id=$(".invoice_id").val();
        var current_amount=$(".current_amount").val();
        
        if(current_amount.length!=0)
        {
           $.ajax({
             url:'/get_payment',
             type:'POST',
             data:{'invoice_id':invoice_id,'current_amount':current_amount,'_token': $('input[name=_token]').val()},
             success:function(data){
               $(".current_amount").val("");
               alert('Payment Added Successfully');
             }
         });
        }
        else
        {
          alert('Amount Can\'t Be Null');
        }


       
    });


});

 </script>
@stop