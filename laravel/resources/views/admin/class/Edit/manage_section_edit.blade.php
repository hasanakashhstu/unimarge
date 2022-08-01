@extends('admin.index')
@section('Title','Manage Sections')
@section('breadcrumbs','Manage Sections')
@section('breadcrumbs_link','/manage_section')
@section('breadcrumbs_title','Manage section')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('error') }}
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
    <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> Manage Section Edit</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} Sections Details</p> <!-- Transport Details -->

  
  <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Manage Class</a></li>
            <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage Department</a></li>
            <li><a href='/academic_syllabus'><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>

            <li><a href='/manage_section'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>
    <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_section_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_section_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_section_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
             
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>


  

  
        <div>
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>{{$section_list->section_name}} Mange Section Info</h5>
            </div>
            <div class="widget-content nopadding">
            {{Form::open(['url'=>"/manage_section/$section_list->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate'])}}
         
            
            <div class="control-group">
            {{Form::label('Name','',['class'=>'control-label'])}}
             
              <div class="controls">
                {{Form::text('section_name',$section_list->section_name,['title'=>'section_name'])}}
              </div>
            </div>

            <div class="control-group">
            {{Form::label('Nick Name','',['class'=>'control-label'])}}
             
              <div class="controls">
                {{Form::text('nick_name',$section_list->nick_name,['title'=>'nick_name'])}}
              </div>
            </div>


            <div class="control-group">
            {{Form::label('Class','',['class'=>'control-label'])}}
             
              <div class="controls">

                @php
                  $class[$section_list->class]=$section_list->class
                @endphp
                @foreach($class_list_data as $class_list)
                  @php $class[$class_list->class_name]=$class_list->class_name @endphp
                @endforeach
                {{Form::select('class',$class)}}
              </div>
            </div>


            <div class="control-group">
            {{Form::label('Teacher','',['class'=>'control-label'])}}
             
              <div class="controls">
            @php $teahcer[$section_list->teacher]=$class_list->teacher @endphp
               @foreach($teacher_info as $teacher_info_data)
                @php $teahcer[$teacher_info_data->teacher_name]=$teacher_info_data->teacher_name @endphp
              @endforeach
                {{Form::select('teacher',$teahcer)}}
              </div>
            </div>

            <div class="form-actions">
                {{Form::submit('Submit',['class'=>'btn btn-success'])}}
              
            </div>

            {{Form::close()}}
          </div>
        </div>
      </div>

    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/manage_section.js')}}"></script>
@endpush


@stop