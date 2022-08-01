@extends('admin.index')
@section('Title','Transport Invoice Generator')
@section('breadcrumbs','Transport Invoice Generator')
@section('breadcrumbs_link','/transport_bill_generator')
@section('breadcrumbs_title','Transport Invoice Generator')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('error') }}
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
  		<h2><i class="fa fa-money" aria-hidden="true"></i>Transport Invoice Generator</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}  Payment Details</p> <!-- Transport Details -->

			 

		  

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/chart_of_account'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
            <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Payment Templete</a></li>
            
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student Invoice</a></li>
            
         </ul>
      </div>
    </div>



  <div style="margin-left: 2%" class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/invoice_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>






		<div class="tab-content"> <!-- Transport List Report  -->
		    	
  {{Form::open(['url'=>'/transport_bill_generator','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
		    <div id="home" class="tab-pane fade in active">
		      	

		    	 <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Entry</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">

             	<p class='text-center'>Invoice information</p>


             

              <div class="control-group">
              <label class="control-label">Invoice Type</label>
              <div class="controls">
                <label>
                  <input type="radio" value="Single Invoice" id="invoice_type" class="invoice_type" name="invoice_type"/>
                  Single Invoice</label> 


                <label>
                  <input type="radio" value="Mass Invoice" id="s" class="invoice_type" name="invoice_type"/>
                  Mass Invoice</label> 

                
                
              </div>
            </div>
            <input type="hidden" name="form_name" value="transport">
      <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[''=>'--select--']
            @endphp
            @foreach($medium as $medium_data)
              @php
                $medium_array[$medium_data->type_name]=$medium_data->type_name
              @endphp
            @endforeach
            {{Form::select('medium',$medium_array,null,['class'=>'medium','id'=>'medium'])}}
          </div>
        </div>


              
              <div class="control-group">
                <label class="control-label">Class</label>
                <div class="controls">
                  @php
                    $class_name_array['']='--select--';
                  @endphp

                @foreach($class_name as $class_name_value)
                  @php
                    $class_name_array[$class_name_value->class_name]=$class_name_value->class_name
                  @endphp
                @endforeach
                  {{Form::select('class_name',$class_name_array,null,['class'=>'class_data','id'=>'class_data'])}}
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Department</label>
                <div class="controls">
                  
                  {{Form::select('department',[''=>'--select class--'],null,['id'=>'department','class'=>'department'])}}
                </div>
              </div>
              
              <div class="control-group student_div">
                <label class="control-label">Student</label>
                <div class="controls">
                  
                  {{Form::select('student_name',[''=>'Set Roll or Student Name'],null,['id'=>'student_name','class'=>'student_name'])}}
                </div>
              </div>


              <div class="control-group roll_div">
                <label class="control-label">Roll</label>
                <div class="controls">
                  
                  {{Form::text('student_roll',null,['id'=>'student_roll','class'=>'student_roll'])}}
                </div>
              </div>
              
              

              <div class="control-group title_div">
                <label class="control-label">Title</label>
                <div class="controls">
                  {{Form::text('title','',['id'=>'required','class'=>'title'])}}
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  {{Form::date('name', \Carbon\Carbon::now(),['disabled'=>'disabled'])}}
                </div>
              </div>



              <div class="control-group">
                <label class="control-label">Month</label>
                <div class="controls">
                  {{Form::select('month',['1'=>'January','2'=>'February','3'=>'March','4'=>'April','5'=>'May','6'=>'June','7'=>'July','8'=>'August','9'=>'September','10'=>'October','11'=>'November','12'=>'December'],null,['id'=>'class_select','class'=>'month'])}}
                </div>
              </div>
               @php
                    $current_year=date('Y');
                    $year_array=[$current_year=>$current_year]
                @endphp
                <?php
                for ($current_year=2015; $current_year<=2030 ; $current_year++) { 
                     $year_array[$current_year]=$current_year;
                }

                ?>
               <div class="control-group">
                <label class="control-label">Year</label>
                <div class="controls">
                 {{Form::select('year',$year_array,null,['id'=>'class_select','class'=>'year'])}}
                </div>
              </div>


              
<!-- 
               <div class="control-group">
            {{Form::label('from_date','From Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::date('from_date',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'from_date'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
              
                  </div>
                </div>
            </div> -->


            <!--  <div class="control-group">
            {{Form::label('to_date','To Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::date('to_date',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'to_date'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
  
                  </div>
                </div>

            </div> -->


            <div class="control-group title_div">
                <label class="control-label">Total Month</label>
                <div class="controls">
                  {{Form::text('total_month','',['id'=>'required','class'=>'total_month'])}}
                </div>
            </div>



              




              <p class='text-center'>Payment information</p><hr>


               
               <div>
                 @foreach($invoice_component as $invoice_component_value)
                  <div class="control-group">
                      <label class="control-label">{{$invoice_component_value->component_name}}</label>
                      <div class="controls">
                        <input type='hidden' value="{{$invoice_component_value->invoice_component_id}}" name="component_id[]" class=''>
                        <input type='text'  value="0" name="amount[]" class='amount'>
                      </div>
                    </div>
                 @endforeach
               </div>
                

              


              	<div class="control-group">
                	<label class="control-label" >Actual Total</label>
                	<div class="controls">
                  		{{Form::text('total','0',['class'=>'actual_total'])}}
                	</div>
              	</div>
                
                 <div class="control-group">
                  <label class="control-label">Waver</label>
                  <div class="controls">
                      {{Form::text('waber',null,['class'=>'waber_info'])}}
                      
                  </div>
                </div>

                 <div id="waber" hidden="hidden" class="control-group">
                  <label class="control-label">Waver Purpose</label>
                  <div class="controls">
                      {{Form::text('waber_purpose',null,['class'=>'waber_purpose'])}}
                      
                  </div>
                </div>
                


                <div class="control-group">
                  <label class="control-label" >On Net Total</label>
                  <div class="controls">
                      {{Form::text('on_net_total',null,['class'=>'on_net_total'])}}
                  </div>
                </div>


           

                 <div class="control-group" style="display: none;">
                  <label class="control-label">Payment</label>
                  <div class="controls">
                      {{Form::text('Payment','0',['class'=>'payment_info'])}}
                      
                  </div>
                </div>

                

                <div class="control-group">
                  <label class="control-label"></label>
                  <div class="controls">
                      <span id="due_information"></span>
                  </div>
                </div>



              

          <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>


		    </div>
		    

{{Form::close()}}




		</div>
	</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){

        $(document).on("keyup",".amount",function() {
            var total=0;
             $(".amount").each(function() {
                var value=parseInt($(this).val());
                total=parseInt(total+value);
                 $(".actual_total").val(total);
                 $(".on_net_total").val(total);
               
        });
     });

        $(".class_data").unbind().change(function(){
         
               var class_data=$(this).val();
               $.ajax({
                   url:'/class_wise_department_invoice',
                   type:'post',
                   data:{'class_data':class_data,'_token': $('input[name=_token]').val()}, 
                   success:function(r){
                      $(".department").html(r);
                   }
               });
        });


          
          $('.department').unbind().change(function(){
              var department=$(this).val();
              
              $.ajax({
                url: '/transport_payment_entry_for_student_data',
                type: "post",
                data: {'department':department,'_token': $('input[name=_token]').val()},
                success: function(data){
                  //console.log(data);
                  for(var i=0;i<=data.length;i++)
                  {
                  	 $(".student_name").append("<option value="+data[i].roll+">"+data[i].student_name+"</option>");
                  }
                 
                  //$('#student_name').html(data);
                  $('.student_roll').val();
                }
              });

              $("#templete_wise_component").html("");
              //templete_desgin(class_name)
          });

          $('#student_name').unbind().change(function(){
              var student_roll=$(this).val();
              
                $.ajax({
                  url: '/notice_board_student_data_get',
                  type: "post",
                  data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
                  success: function(data){
                    console.log(data);
                    $(".student_roll").val(data.roll);
                    $(".title").val(data.student_name+'/'+data.roll+'-'+data.class+'-Transport Invoice');
                    // $(".student_wise_email").val(data.email);
                    // $(".student_wise_class").val(data.class);
                    // $(".student_wise_section").val(data.section);

                    //$('#student_section').html(data);
                  }
                });
          });

          $('.student_roll').unbind().keyup(function(){
              var student_roll=$(this).val();
              
              $.ajax({
                  url: '/notice_board_student_data_get',
                  type: "post",
                  data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
                  success: function(data){
                  	console.log(data);
                    if(data!="")
                    {
                      $(".class_data").html("<option>"+data.class+"</option>");
                      $(".department").html("<option>"+data.department+"</option>");
                      $(".medium").html("<option>"+data.medium+"</option>");
                      $(".student_name").html("<option>"+data.student_name+"</option>");
                      $(".title").val(data.student_name+'/'+data.roll+'-'+data.class+'-Transport Invoice');
                    }
                    // $(".student_wise_class").val(data.class);
                    // $(".student_wise_section").val(data.section);

                    //$('#student_section').html(data);
                    $("#templete_wise_component").html("");
                    //templete_desgin(data.class);
                  }
                });
              
              
          });

          $('#invoice_type,#s').unbind().click(function(){
            
              var invoice_type=$(this).val();
              
              if(invoice_type=="Mass Invoice")
              {
                  $(".student_div").attr('hidden',true);
                  $(".roll_div").attr('hidden',true);
                  
                  $(".student_div").attr('disabled',true);
                  $(".roll_div").attr('disabled',true);
                  
              }
              else
              {
                  $(".student_div").attr('hidden',false);
                  $(".roll_div").attr('hidden',false);
                  

                  $(".student_div").attr('disabled',false);
                  $(".roll_div").attr('disabled',false);
                  
              }
          });

          $('.payment_info').unbind().keyup(function(){
              var total_p_student=$('.on_net_total').val();
              var waber=$('.waber_info').val();
              var payment_value=$(this).val();

              var different_value=(parseInt(total_p_student)-parseInt((waber)?waber:0))-parseInt(payment_value);
              
              if(different_value!=0)
              {
                  
                  $('#due_information').html("<p style='color:red'>Have This Invoice Due "+(isNaN(different_value)?0:different_value)+"</p>")

                  $('.payment_status').html("<option>Unpaid</option>");
                  $('.payment_status').attr('disabled','disabled');
                  $('.pay_2_status').val('Unpaid');
              }
              else
              {
                $('#due_information').html("<p style='font-color:red'></p>");
                 $('.payment_status').html("<option>Paid</option>");
                 $('.payment_status').attr('disabled','');
                 $('.pay_2_status').val('Paid');
              }
          });

          $('.waber_info').unbind().keyup(function(){

               var waber_info=parseInt($(this).val());
              // alert("working");
               var actual_total=parseInt($(".actual_total").val());

               var on_net_total=actual_total-waber_info;
               $(".on_net_total").val(on_net_total);

              if ($(this).val()!=0) {
                $('#waber').show();
              }
              else
              {
                  $('#waber').hide();
              }
          });

           $(".to_date").unbind().change(function(){
              var issue_date=$(".from_date").val();
              var return_date=$(this).val();
              var startDate = Date.parse(issue_date);
              var endDate = Date.parse(return_date);
              var timeDiff = endDate - startDate;
              var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));

              var month=daysDiff/30;
                  //alert(daysDiff);
                  $(".total_month").val(month);
              // Round down.
              //alert( Math.floor(days));
            });



      });

      </script>
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
});

 </script>

@stop
