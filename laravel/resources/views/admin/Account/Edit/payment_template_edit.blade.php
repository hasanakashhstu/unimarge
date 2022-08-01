@extends('admin.index')

@section('Title','Payment Template')
@section('breadcrumbs','Payment Templete')
@section('breadcrumbs_link','/create_template')
@section('breadcrumbs_title','invoice_component')
@section('content')



  @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
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
    <h2><i class="fa fa-list" aria-hidden="true"></i> Payment Templete</h2> <!-- Tab Heading  -->
  	<p title="Transport Details">{{Session::get('school.system_name')}} Payment Details</p> <!-- Transport Details -->


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create Invoice</a></li>
            <li><a href='/invoice_component'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Invoice Component</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Chart Of Accounts</a></li>
            <li><a href='/create_template'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

              <button  class="btn btn-default" title='Print' type="button"><a href="#" id='print'><i class="fa fa-print" aria-hidden="true"></i></a></button>
            </div>
    </div>
</div>


	<div>
        <div class="widget-box">
          
          	<div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
            	<h5>Update Template</h5>
          	</div>
          
          	<div class="widget-content nopadding">
             {{Form::open(['url'=>"/create_template/$invoice_data->id",'files'=>true,'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}} 
             

        <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$invoice_data->medium=>$invoice_data->medium]
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
	                {{Form::label('class_name','Class Name:',['class'=>'control-label','title'=>'Account Name'])}}
	                <div class="controls">



	                @php $class_name_array[$invoice_data->class]=$invoice_data->class @endphp
	                  @foreach($class_name as $class_name_value)
	                  @php
	                    $class_name_array[$class_name_value->class_name]=$class_name_value->class_name
	                  @endphp
	                @endforeach()
	                  {{Form::select('class_name',$class_name_array)}}
	                </div>
	              </div>
              
	              <div class="control-group">
	                {{Form::label('titel','Titel',['class'=>'control-label','title'=>'Title'])}}
	                <div class="controls">
	                
	                {{Form::text('title',$templete_json->title,['id'=>'component_value'])}}
	                </div>
	              </div>
              
              

	              <div class="control-group">
	                {{Form::label('account','Account',['class'=>'control-label','title'=>'Account Name'])}}
	                <div class="controls">

                    @php $Account_name[$templete_json->account_name]=$templete_json->account_name @endphp
	                  @foreach($Account as $Account_value)
	                    @php
	                    $Account_name[$Account_value->account_name]=$Account_value->account_name
	                    @endphp
	                  @endforeach
	                      {{Form::select('account_name',$Account_name)}}
	                </div>
	              </div>


 @foreach($templete_json->all_value as $component_value_key => $component_key_value)
	              <div class="control-group">
	                {{Form::label('account',$component_value_key,['class'=>'control-label','title'=>'Account Name'])}}
	                <div class="controls">
	                {{Form::hidden('component_name[]',$component_value_key,['id'=>'component_name'])}}


	                 {{Form::text('component_value[]',$component_key_value,['id'=>'component_value','class'=>'totalprice'])}}

	                 
	                </div>
	              </div>
 @endforeach



	              <div class="control-group">
	               {{Form::label('total','Total',['class'=>'control-label total','title'=>'Total'])}}
	                <div class="controls">
	                 {{Form::text('total',null,['class'=>'disabled_amount','disabled'=>'disabled'])}}{{Form::hidden('total',null,['class'=>'total_amount'])}}<br>
	                 <span class='message'></span>
	                
	                </div>
	              </div>




               <div class="control-group">
            {{Form::label('from_date','From Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::text('from_date',$invoice_data->from_date,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'from_date'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
            </div>


             <div class="control-group">
            {{Form::label('to_data','TO Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::text('to_date',$invoice_data->to_date,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'to_date'])}}

                   <span class="add-on" class="to_data"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
            </div>


             <div class="control-group">
               {{Form::label('total_month','Total Month',['class'=>'control-label total','title'=>'Total'])}}
                <div class="controls">
                 {{Form::text('total_month',$invoice_data->total_month,['class'=>'total_month','disabled'=>'disabled'])}}
                {{Form::hidden('total_month',$invoice_data->total_month,['class'=>'total_month'])}}
                </div>
              </div>




              

              

          		<div class="form-actions">
                	<input type="submit" value="Submit" class="btn btn-success">
              	</div>

            {{Form::close()}}
          </div>
        </div>
      </div>





     

</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
$(document).ready(function(){
  $('.totalprice').unbind().keyup(function(){
     
     a();
     

  });

   $('.to_date').on('keyup keypress click', function(event) {
    
      var from_date=$('.from_date').val();
      var to_date=$('.to_date').val();

    

      var date1 = new Date(from_date);
      var date2 = new Date(to_date);
      var timeDiff = Math.abs(date2.getTime() - date1.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
      var count_month=diffDays/30;
      var round_value=Math.round(count_month);
      $('.total_month').val(round_value);
      
  });


});   
a();
function a()
{
	 var sum = 0;
      $('.totalprice').each(function(){

          amount=$(this).val();
          sum += parseFloat(amount);  // Or this.innerHTML, this.innerText
          
      });
      if (isNaN(sum))
      {
             $('.message').html("<p style='color:red;font-size: 12px;'>Please Set All component Value</p>");
      }
      else
      {     
              $('.disabled_amount').val(sum);
              $('.total_amount').val(sum);
      }
} 



    </script>

@stop


