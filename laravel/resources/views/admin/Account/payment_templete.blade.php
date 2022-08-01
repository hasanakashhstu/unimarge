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


  @if (Session::has('Error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('Error') }}
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


 <div class="alert alert-info">
      <strong>Warning!</strong> <br>Now you can add that component add-on and can not be deleted because these components will be published with your add-on and you can not delete this template anymore. 
</div>


<div class="container">
    <h2><i class="fa fa-list" aria-hidden="true"></i> Payment Templete</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}} Payment Templete Details</p> <!-- Transport Details -->









  <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create Invoice</a></li>
            <li><a href='/invoice_component'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Invoice Component</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Chart Of Accounts</a></li>
            
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



      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>  List</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Templete</a></li>
      </ul>












  <div class="tab-content" style="width:1090px;"> <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Data table</h5>
                </div>

            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">

                  <thead>
                    <tr>
                      <th>ID </th>
                      <th>Medium</th>
                      <th>class</th>
                      <th>status</th>
                      <th>Option</th>
                    </tr>
                  </thead>


                  <tbody>
                 
                     @foreach($invoice_data as $invoice_data_list)
			                <tr class="gradeX">
                        <td>{{$invoice_data_list->id}}</td>
                        <td>
                        {{$invoice_data_list->medium}}
                        </td>
                        <td>{{$invoice_data_list->class}}</td>
			            <td>
                         @if($invoice_data_list->default_status =="Default")
                           <i style="color: green" class="fa fa-circle" aria-hidden="true"></i>Default   
                        @else
                         <i style="color: #f39c12" class="fa fa-circle" aria-hidden="true"></i> Pending
                        @endif
                        </td>
			                  <td class="center">
			                  	<div class="display_status">
                                   @if($invoice_data_list->default_status =="Not")
                                       {{Form::open(['url'=>"/create_template/$invoice_data_list->id",'method'=>'GET'])}}
                                         {{Form::submit('Default',['class'=>'btn btn-success'])}} 
                                      {{Form::close()}}
                                  @else
                                     {{Form::open(['url'=>"/create_template/$invoice_data_list->id",'method'=>'GET'])}}
                                        {{Form::submit('Pending',['class'=>'btn btn-warning'])}} 
                                    {{Form::close()}}
                                 @endif

                                 {{Form::open(['url'=>"/create_template/$invoice_data_list->id/edit",'method'=>'get'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                    {{Form::close()}}
                                    
                                    {{Form::open(['url'=>"/create_template/$invoice_data_list->id",'method'=>'DELETE'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {{Form::close()}}
								</div>
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
            <h5>New Account</h5>
          </div>
          <div class="widget-content nopadding">
             {{Form::open(['url'=>'/create_template','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}} 
             
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
                {{Form::label('class_name','Class Name:',['class'=>'control-label','title'=>'Account Name'])}}
                <div class="controls">
                  @php $class_name_array['']="" @endphp
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
                  {{Form::text('title')}}
                </div>
              </div>
              
              

              <div class="control-group">
                {{Form::label('account','Account',['class'=>'control-label','title'=>'Account Name'])}}
                <div class="controls">
                  @php $Account_name['']="" @endphp
                  @foreach($Account as $Account_value)
                    @php
                    $Account_name[$Account_value->account_name]=$Account_value->account_name
                    @endphp
                  @endforeach
                      {{Form::select('account_name',$Account_name)}}
                </div>
              </div>


              @foreach($component as $component_value)
              <div class="control-group">
                {{Form::label('account',$component_value->component_name,['class'=>'control-label','title'=>'Account Name'])}}
                <div class="controls">
                 {{Form::text('component_value[]',null,['id'=>'component_value','class'=>'totalprice'])}}

                 {{Form::hidden('component_name[]',$component_value->component_name,['id'=>'component_name'])}}
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
                   {{Form::text('from_date',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'from_date'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
            </div>


             <div class="control-group">
            {{Form::label('to_data','TO Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="12-02-2012" class="input-append date datepicker">
                   {{Form::text('to_date',null,['data-date-format'=>'mm-dd-yyyy','style'=>'width:85%','class'=>'to_date'])}}

                   <span class="add-on" class="to_data"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
            </div>


             <div class="control-group">
               {{Form::label('total_month','Total Month',['class'=>'control-label total','title'=>'Total'])}}
                <div class="controls">
                 {{Form::text('total_month',null,['class'=>'total_month'])}}
                
                </div>
              </div>



              <div class="control-group">
                
              </div>
              

              

          <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
            {{Form::close()}}
          </div>
        </div>
      </div>





      </div>

  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript">
$(document).ready(function(){
  $('.totalprice').unbind().keyup(function(){
     
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
    </script>

@stop


<!-- 
  var total = 0;
      $('input.totalprice').each(function() {
          var num = parseInt(this.value, 10);
          if (!isNaN(num)) {
             $('.totalprice').val(sum);
          }
      }); -->

<!-- 
       var total = 0;
      $('input.totalprice').each(function() {
          var num = parseInt(this.value, 10);
          if (!isNaN(num)) {
             $('.totalprice').val(sum);
          }
      });
           -->