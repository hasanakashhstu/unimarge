@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Academic Syllabus')
@section('breadcrumbs','Student Dhasboard Academic Syllabus')
@section('student_dasboard_content')
<div class="container">
 <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>Applicant Article Receive Data table</h5>
            </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
                <thead>
                 <tr>
                   <th>Title</th>
                     <th>Class Name</th>
                     <th>Description</th>
                     <th>Subject</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($academic_syllabus as $academic_syllabus_data)
                  <tr class="gradeX">
                     <td>{{$academic_syllabus_data->title}}</td>
                     <td>{{$academic_syllabus_data->class_name.".pdf"}}</td>
                     <td>{{$academic_syllabus_data->description}}</td>
                     <td>{{$academic_syllabus_data->subject}}</td> 
                     <td id="my_align" class="display_status">
                       {{Form::open(['url'=>"syllabus_download/$academic_syllabus_data->class_name" ,'method'=>'GET'])}}
                        {{Form::submit('Download',['class'=>'btn btn-danger'])}}
                       {{Form::close()}}
                     </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>

  
@stop

