@extends('admin.index')
@section('Title','Course')
@section('breadcrumbs','Course')
@section('breadcrumbs_link','/manage_department')
@section('breadcrumbs_title','Manage Department')

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
    <h2><i class="fa fa-plus-circle" aria-hidden="true"></i>Course</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Department Details</p><br/><!-- Transport Details -->

   
    <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage Class</a></li>
            <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Manage Section</a></li>
            <li><a href='/academic_syllabus'><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_department_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_department_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_department_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
             
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Course</a></li>

        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Course</a></li>
    
      </ul>



  <div class="tab-content"> <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Course Data table</h5>
                </div>

            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">

                  <thead>
                    <tr>
                      <th>Course Title </th>
                      <th>Vanue </th>
                      <th>Trainner Name</th>
                      
                      <th>Amount</th>
                      <th>Available Seat</th>
                      <th>Total Hours</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @foreach($course as $course_list)
                  <tr class="gradeX">
                       <td>{{$course_list->title}}</td>
                       <td>{{$course_list->venue}}</td>
                       <td>{{$course_list->trainner_name}}</td>
                       <td>{{$course_list->amount}}</td>
                       <td>{{$course_list->available_seat}}</td>
                       <td>{{$course_list->total_hours}}</td>
                       <td>{{$course_list->created_at->format('d/m/Y')}}</td>
                       <td>{{$course_list->updated_at->format('d/m/Y')}}</td>
                       <td id="my_align" class="display_status">
                      
                        {{Form::open(['url'=>"/frontend/create_course/$course_list->website_course_id/edit" ,'method'=>'GET'])}}
                          {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                     

                        {{Form::open(['url'=>"/frontend/create_course/$course_list->website_course_id" ,'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this Course?')"])}}
                        {{Form::close()}}
                    
                        

                      </td>
                  </tr>
                  @endforeach

                </table>
              </div>
          </div>
      </div>



      <div id="menu1" class="tab-pane fade">
        <div>
          <div class="widget-box">
            <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Department</h5>
            </div>
        
          <div class="widget-content nopadding">
           {{Form::open(['url'=>'/frontend/create_course','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

            <div class="control-group">
              {{Form::label('course_category_id','Course Category',['class'=>'control-label','title'=>'title'])}}
              <div class="controls">
                @php
                  $course_category_array=[''=>'--select--']
                @endphp
                @foreach($course_category as $value)
                  @php $course_category_array[$value->id]=$value->name @endphp
                @endforeach

                {{Form::select('course_category_id',$course_category_array,null,['class'=>'responsible_teacher','id'=>'course_category_id'])}}
              </div>
            </div>
            
            <div class="control-group">
              {{Form::label('Title','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('title','',['title'=>'Title'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Description','',['class'=>'control-label','title'=>'description'])}}
              <div class="controls">
              {{ Form::textarea('description', null,['style'=>'width:60%']) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Venue','',['class'=>'control-label','title'=>'venue'])}}
              <div class="controls">
              {{ Form::textarea('venue', null,['style'=>'width:60%','rows'=>3]) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Schedule','',['class'=>'control-label','title'=>'schedule'])}}
              <div class="controls">
              {{ Form::textarea('schedule', null,['style'=>'width:60%','rows'=>3]) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Amount','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::number('amount','',['title'=>'Amount'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('banner','',['class'=>'control-label','title'=>'banner'])}}
             
            <div class="controls"> 
              {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Banner ','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'banner','style'=>'width:19%'])}}
              <br>
              {{Form::file('banner',['onchange'=>'bannerURL(this)'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Trainner Name','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('trainner_name','',['title'=>'Trainner Name'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('trainner_image','',['class'=>'control-label','title'=>'trainner_image'])}}
            <div class="controls"> 
              {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Banner ','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'trainner','style'=>'width:19%'])}}
              <br>
              {{Form::file('trainner_image',['onchange'=>'trainnerURL(this)'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Available Seat','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::number('available_seat','',['title'=>'Available Seat'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Who can join?','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('who_can_join','',['title'=>'Who can join?'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Total Hours','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('total_hours','',['title'=>'Total Hours'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Start Date','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::date('start_date','',['title'=>'Start Date'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('End Date','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::date('end_date','',['title'=>'End Date'])}}
              </div>
            </div>
            
            
            <div class="form-actions">
                {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success'])}}
           
            </div>
          {{Form::close()}}
        </div>
      </div>
    </div>
      </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript">
      function bannerURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#banner')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }
      function trainnerURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#trainner')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
@endpush
@stop