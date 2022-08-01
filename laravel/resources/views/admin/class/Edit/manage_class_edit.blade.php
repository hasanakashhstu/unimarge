@extends('admin.index')
@section('Title','Manage Class')
@section('breadcrumbs','Manage Class > Manage Class Edit')
@section('breadcrumbs_link','/manage_class')
@section('breadcrumbs_title','Manage Class')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Error!</strong> {{ Session::get('error') }}
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
  <i class="fa fa-check-square-o" aria-hidden="true">
    </i> &nbsp;Class {{$manage_class_list->class_name}} Info Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Class Details Edit
  </p>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Manage Section</a></li>
            <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage Department</a></li>
            <li><a href='/academic_syllabus'><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>

            <li><a href='/manage_class'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>


<div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_class_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_class_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_class_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
             
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>{{$manage_class_list->class_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
     {{Form::open(["url"=>"/manage_class/$manage_class_list->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate'])}}
            

              <div class="control-group">
                {{Form::label('Class Name','',['class'=>'control-label'])}}
                <div class="controls">
                  {{Form::text('class_name',$manage_class_list->class_name,['id'=>'class_name'])}}
                </div>
              </div>

              <div class="control-group">
                {{Form::label('Numeric Name','',['class'=>'control-label'])}}
                <div class="controls">
                  {{Form::text('numeric_name',$manage_class_list->numeric_name,[])}}
                </div>
              </div>

              <div class="control-group">
                {{Form::label('Class Teacher','',['class'=>'control-label'])}}
                <div class="controls">
                 @foreach($teacher_data as $teacher_name_list)
                     @php 
                     $teacher_name[$manage_class_list->class_teacher]=$manage_class_list->class_teacher
                     @endphp
                     @php 
                     $teacher_name[$teacher_name_list->teacher_name]=$teacher_name_list->teacher_name 
                    @endphp
                  @endforeach
                  {{Form::select('class_teacher',$teacher_name)}}
                </div>
              </div>

          <div class="form-actions">
          {{Form::submit('submit',['value'=>'Update','id'=>'submit','class'=>'btn btn-success'])}}
                
              </div>
            {{Form::close()}}
          </div>
          </div>
           </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/manage_class.js')}}"></script>
@endpush

@stop
