@extends('admin.index')
@section('Title','Subject Wise Publish Marks')
@section('breadcrumbs','Subject Wise Publish Marks')
@section('breadcrumbs_link','/subject_wise_publish_marks')
@section('breadcrumbs_title','Subject Wise Publish Marks')

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
  		<h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp Subject Wise Publish Marks Information</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{config('app.name')}} Report</p> <!-- Transport Details -->


 		<div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test'>
            <li><a href='/applicant_student_report'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant Teacher's Report</a></li>
            <li><a href='#'>Add Teacher</a></li>
            <li><a href='#'>Teacher's Report </a></li>

        </ul>
      </div>
    </div>



   

    <table style="margin-top: 4%" class="">
        <thead style="background: #1F262D">
              <tr style="height: 34px;color: #fff">
                <th>Exam</th>
                <th>Class</th>
                <th>Section</th>
                <th>Department</th>
                 <th>Default Session</th>
                <th>Serach</th>
                
               
              </tr>
        </thead>
        

            <tbody>
              <tr>
               
       
              @php $all_exam_list['']="" @endphp
               @foreach($exam_data as $exam_data_list)
                 @php 
                    $all_exam_list[$exam_data_list->exam_name]=$exam_data_list->exam_name
                 @endphp
               @endforeach
               
               @php $all_class_list['']="" @endphp
               @foreach($class_data as $class_data_list)
                @php
                 $all_class_list[$class_data_list->class_name]=$class_data_list->class_name
                @endphp
              @endforeach

            <td>{{Form::select('exam_name',$all_exam_list,null,['style'=>'width: 157px','id'=>'exam_name'])}}</td>
            <td>{{Form::select('class_name',$all_class_list,null,['style'=>'width: 157px','id'=>'class_info'])}}</td>
            
            <td>{{Form::select('section',['Section Name'=>'Section Name'],null,['id'=>'section_info','style'=>'width: 157px'])}}</td>

            <td>{{Form::select('Department',['Department Name'=>'Department Name'],null,['id'=>'Department_info','style'=>'width: 157px'])}}</td>

 
            <td>
              @php 
                $session_array=[$general_settings->default_session=>$general_settings->default_session];
              @endphp
              @foreach($session as $session_data)
                @php
                    $session_array[$session_data->type_name]=$session_data->type_name;
                @endphp
              @endforeach
              {{Form::select('default_session',$session_array,null,['id'=>'default_session','style'=>'width: 126px'])}}
            </td>
             <td>{{Form::button('Search',['class'=>'btn btn-success','id'=>'serach_btn_publish','style'=>'width: 152px;
    margin-top: -8px;'])}}</td>
    
          </tr>
            
            </tbody>
        </table>

   {{Form::open(['url'=>'/subject_wise_publish_marks','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}


    <div id="show_publish_marks_view"> <!-- Transport List Report  -->

      






    </div>
    {{Form::close()}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/exam.js')}}"></script>
@endpush

@stop