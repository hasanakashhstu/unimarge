@extends('admin.index')
@section('Title','Student Apprisal')
@section('breadcrumbs','Student Apprisal')
@section('breadcrumbs_link','/student_apprisal')
@section('breadcrumbs_title','Student Apprisal')

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
  <h2>
    <i class="fa fa-user-plus" aria-hidden="true">
    </i> Apprisal 
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}  Apprisal Details
  </p>







 <div class='row'>
         
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
             
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
            <li><a href='/student_apprisal'><i class="fa fa-address-card-o" aria-hidden="true"></i> Apprisal</a></li>
            <li><a href='/student_apprisal_component'><i class="fa fa-street-view" aria-hidden="true"></i>Apprisal Template</a></li>
            <li><a href='/student_apprisal_report'><i class="fa fa-list-alt" aria-hidden="true"></i>Apprisal Report </a></li>
            <li><a href='/student_apprisal_report'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
             </ul>
          </div>
        </div>

    </div>


 <div class="alert alert-info">
      <strong>Feature!</strong> <br> When You Have Many Student's You Can Use Apprisal To (Filter As ID)
      Search This Student Roll System Automatic Get This Student Information
    </div>



  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>New Apprisal
      </h5>
    </div>




    <div class="widget-content nopadding">
      {{Form::open(['url'=>"/student_apprisal/$apprisal_info->apprisal_id",'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}         

      
          <div class="controls">
            {{Form::hidden('apprisal_id',$apprisal_info->apprisal_id,['id'=>'required'])}}
          </div>

     <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$apprisal_info->medium=>$apprisal_info->medium]
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
          {{Form::label('apprisal_type','Apprisal Type',['class'=>'control-label'])}}
          <div class="controls">
          
            {{Form::select('apprisal_type',[$apprisal_info->apprisal_type => $apprisal_info->apprisal_type,'Student'=>'Student','Teacher'=>'Teacher','Staff'=>'Staff'],null,['class'=>'apprisal_type','id'=>'apprisal_type'])}}
          </div>
        </div>



        <div class="control-group">
          {{Form::label('apprisal_to','Apprisal To (Filter As ID)',['class'=>'control-label'])}}
          <div class="controls">
            {{Form::text('none',$apprisal_info->apprisal_name,['class'=>'apprisal_filter_id','id'=>'apprisal_filter_id'])}}
          </div>
        </div>



        


        <div class="control-group">
          {{Form::label('apprisal_name','Apprisal For',['class'=>'control-label'])}}
          <div class="controls">

          @php
          if($apprisal_info->apprisal_name)
          {
            	if($apprisal_info->apprisal_type=="Student")
            	{
            		$name = DB::table('students')->where('roll',$apprisal_info->apprisal_name)->first();
            	
            @endphp
            	{{Form::select('apprisal_name',[isset($name->student_name)?$name->student_name : ''],null,["id"=>"apprisal_by","class"=>"apprisal_by"])}}
            @php
            	}
            	else
            	{
            		$name = DB::table('teacher')->where('teacher_id',$apprisal_info->apprisal_name)->first();
            	@endphp

            		{{Form::select('apprisal_name',[$name->teacher_name],null,["id"=>"apprisal_by","class"=>"apprisal_by"])}}
            @php
            	}
          }
          else
          {
          @endphp
            {{Form::select('apprisal_name',[''],null,["id"=>"apprisal_by","class"=>"apprisal_by"])}}
          @php
          }
          @endphp

            
          </div>
        </div>




        <div class="control-group">
          {{Form::label('apprisal_template','Apprisal Template',['class'=>'control-label'])}}
          <div class="controls">
 @php $template_data_array=[$apprisal_info->apprisal_template=>$apprisal_info->apprisal_template] @endphp
        @foreach($apprisal_template as $apprisal_template_data)
              @php  $template_data_array[$apprisal_template_data->template_id]=$apprisal_template_data->title @endphp
         @endforeach
            {{Form::select('apprisal_template',$template_data_array,null,['class'=>'apprisal_template','id'=>'apprisal_template','disabled'=>'disabled'])}}
          </div>
        </div>        



        <div class="control-group">
            {{Form::label('start_date','Start Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="02-12-2012" class="input-append date datepicker">
                   {{Form::text('start_date',$apprisal_info->start_date,['data-date-format'=>'dd-mm-yyyy','style'=>'width:85%'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
        </div>



        <div class="control-group">
            {{Form::label('end_date','End Date(mm/dd)',['class'=>'control-label','title'=>'birth_date'])}}
                <div class="controls">
                <div  data-date="02-12-2012" class="input-append date datepicker">
                   {{Form::text('end_date',$apprisal_info->end_date,['data-date-format'=>'dd-mm-yyyy','style'=>'width:85%'])}}

                   <span class="add-on"><i class="icon-th"></i></span>
                  <!-- <input type="date">  -->
                  </div>
                </div>
        </div>






        <div class="control-group">
          <label class="control-label">Goals</label>
          <div class="controls">
           
           	<table class='table address input_fields_wrap'>
           		<thead>
           			<th>Goal</th>
           			<th>Weightage(%)</th>
           			<th>Score</th>
           		</thead>

           		<tbody>
           			@php

           			$i=1;
           			@endphp
           			@foreach($apprisal_component as $apprisal_component_list)
           			
           			<tr>
           				<td>
	           				{{Form::hidden('id[]',$apprisal_component_list->id)}}
	           				{{Form::text('goal',$apprisal_component_list->goals,['disabled'=>'disabled'])}}
           				</td>

			          <td>
			          	{{Form::text('weightage',$apprisal_component_list->weightage,['disabled'=>'disabled'])}}
			          </td>
           				
	           			<td>
	           			{{Form::text('score[]',$apprisal_component_list->score,['class'=>'score hundered_validation_check' , 'id'=>"score_$i"])}}

	           			</td>
           			</tr>

           			@php

           			$i=$i+1;
           			@endphp
           			@endforeach
           		</tbody>
           	</table>
             
          </div>
        </div>



        <div class="control-group">
          <label class="control-label">Converted 
          </label>
          <div  class="controls">
            {{Form::text('convert',$apprisal_info->convert,['id'=>'converted'])}} %
          </div>
        </div>


         <div class="control-group">
          <label class="control-label">Total Score
          </label>
          <div class="controls">
     
            {{Form::text('total_score',$apprisal_info->total_score,['id'=>'total_score'])}}
            <span id="total_score_message"></span>
            <span id="over_100_message"></span>
          </div>
        </div>



        <div class="control-group">
          <label class="control-label">CGPA
          </label>
          <div class="controls">
            <span id="convert_value_find">{{$apprisal_info->apprisals}}</span> Out of <span id="out_of">{{$apprisal_info->convert}}</span>
            <span id="over_100_message"></span>
            <input type="hidden" name="apprisals" value="{{$apprisal_info->apprisals}}"  id="convert_value_find_text">
          </div>
        </div>





         <div class="control-group">
          <label class="control-label">Remark
          </label>
          <div class="controls">
           {{Form::text('remarks',$apprisal_info->remarks,['id'=>''])}}
          </div>
        </div>       
        <div class="form-actions">
        {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        
        </div>
      
    </div>
    {{Form::close()}}
  </div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/student_apprisal_edit.js')}}"></script>
@endpush

@stop