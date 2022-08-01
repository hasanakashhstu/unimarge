@extends('admin.index')
@section('Title','Exam List')
@section('breadcrumbs','Exam List')
@section('breadcrumbs_link','/exam_list')
@section('breadcrumbs_title','Exam list')

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
    <h2><i class="fa fa-list" aria-hidden="true"></i> Exam List</h2> <!-- Tab Heading  -->
  <p title="Transport Details">I SchoolExam List Details</p> <!-- Transport Details -->

    
        <div>
          <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Exam List</h5>
              </div>

              <div class="widget-content nopadding">
              {{Form::open(['url'=>"/exam_list/$exam_list->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label('exam_name','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::text('exam_name',$exam_list->exam_name,['title'=>'exam_name'])}}
                      </div>
                    </div>


                    <div class="control-group">
                      {{Form::label('Controller','',['class'=>'control-label'])}}
                      <div class="controls">
                      @php $teacher_data_array=[$exam_list->controller] @endphp
                      @foreach($teacher_data as $teacher_list_data)
                  @php $teacher_data_array[$teacher_list_data->teacher_id]=$teacher_list_data->teacher_name @endphp
                      @endforeach
                      {{Form::select('controller',$teacher_data_array)}}
                      </div>
                    </div>


                    <div class="control-group">
                      {{Form::label('Exam Start Date','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::date('exam_start_date',$exam_list->exam_start_date,['title'=>'exam_start_date'])}}
                      </div>
                    </div>


                    <div class="control-group">
                      {{Form::label('Exam End Date','',['class'=>'control-label'])}}
                      <div class="controls">
                      {{Form::date('exam_end_date',$exam_list->exam_end_date,['title'=>'exam_name'])}}
                      </div>
                    </div>


                    <div class="control-group">
                      {{Form::label('published','',['class'=>'control-label'])}}
                      <div class="controls">
                      @php
                        $publish[$exam_list->publish]=$exam_list->publish;
                        

                        $publish=array_add($publish,'Yes','No')
                      @endphp
                      {{Form::select('publish',$publish,['title'=>'exam_name'])}}
                      </div>
                    </div>


                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
      </div>




@stop
