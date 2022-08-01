@extends('admin.index')
@section('Title','Exam Grade')
@section('breadcrumbs','Exam Grade')
@section('breadcrumbs_link','/exam_grade')
@section('breadcrumbs_title','Exam grade')

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
    <h2><i class="fa fa-university" aria-hidden="true"></i> Exam Grade</h2> <!-- Tab Heading  -->
  <p title="Transport Details">I School Exam Grade Details</p> <!-- Transport Details -->
  
    <div class='row'>
         
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
             
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
              <li><a href='/exam_grade'><i class="fa fa-address-card-o" aria-hidden="true"></i> Exam Grade</a></li>
            <li><a href='/manage_marks'><i class="fa fa-street-view" aria-hidden="true"></i>Manage Marks</a></li>
            <li><a href='/check_marks'><i class="fa fa-address-book-o" aria-hidden="true"></i>Cheack Marks </a></li>
             </ul>
          </div>
        </div>



      <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                  <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/teacher_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                  <button class="btn btn-default" title='Export Excel' type="button"><a  href="/teacher_report_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                  
                  <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/teacher_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                  
                  <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>

                </div>
        </div>
    </div>






        <div >
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          <h5>Exam Grade</h5>
        </div>
        <div class="widget-content nopadding">
          {{Form::open(['url'=>"/exam_grade/$exam_grade->id",'files'=>true,'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}


            <div class="control-group">
              {{Form::label('grade_for','Grade For:',['class'=>'control-label','title'=>'Grade For'])}}
              <div class="controls">
                 @php 
                  $mark_list=[$exam_grade->grade_for=>$exam_grade->grade_for]
                @endphp
                @foreach($subject_mark as $subject_mark_value)
                  @php 
                    $mark_list[$subject_mark_value]=$subject_mark_value;
                  @endphp
                @endforeach
                {{Form::select('grade_for',$mark_list,null,['id'=>'required','title'=>'grade_for'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('grade_name','Grade Name:',['class'=>'control-label','title'=>'Grade Name'])}}
              <div class="controls">
                {{Form::text('grade_name',$exam_grade->grade_name,['id'=>'required','title'=>'grade_name','placeholder'=>'Grade Name'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('grade_point','Grade Point:',['class'=>'control-label','title'=>'Grade Point'])}}
              <div class="controls">
                {{Form::text('grade_point',$exam_grade->grade_point,['id'=>'required','title'=>'grade_point','placeholder'=>'Grade Point'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('mark_from','Mark From:',['class'=>'control-label','title'=>'Mark From'])}}
              <div class="controls">
                {{Form::text('mark_from',$exam_grade->mark_from,['id'=>'required','title'=>'mark_from','placeholder'=>'Mark From'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('mark_upto','Mark Upto:',['class'=>'control-label','title'=>'Mark Upto'])}}
              <div class="controls">
                {{Form::text('mark_upto',$exam_grade->mark_upto,['id'=>'required','title'=>'mark_upto','placeholder'=>'Mark Upto'])}}
              </div>
            </div>
            


        <div class="form-actions">
              <input type="submit" value="Update Grade" class="btn btn-primary">
            </div>
            {{ csrf_field() }}
            {{Form::close()}}
        </div>
      </div>
    </div>





      </div>

  </div>
</div>


<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
   @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>
@endpush

@stop
