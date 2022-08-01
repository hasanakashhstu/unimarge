@extends('admin.index')
@section('Title','Edit Course Information')
@section('breadcrumbs','Create Course > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Course Information')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
                <strong>Wrong!</strong> {{Session::get('error')}}
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

<div class="widget-content nopadding">
  <div class="container">
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Course</h2> <!-- Tab Heading  -->
      <p title="Transport Details">{{Session::get('school.system_name')}} Course</p> <!-- Transport Details -->
		  



  <div class="controls text-right">
            <div slider-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

              <button  class="btn btn-default" title='Print' type="button"><a href="#" id='print'><i class="fa fa-print" aria-hidden="true"></i></a></button>
            </div>
    </div>
</div>








        <div class="widget-box">
            <div class="widget-title">
              <span class="icon"> <i class="icon-info-sign"></i></span>
              <h5>{{$course->title}} Information Edit</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/frontend/create_course/$course->website_course_id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                {{Form::label('course_category_id','Course Category',['class'=>'control-label','title'=>'title'])}}
                <div class="controls">
             
                  <select name="course_category_id">
                    <option value="">--select--</option>
                    @foreach($course_category as $value)
                    <option @if($value->id == $course->course_category_id) selected="selected" @endif value="{{$value->id}}">{{$value->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="control-group">
              {{Form::label('Title','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('title',$course->title,['title'=>'Title'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Description','',['class'=>'control-label','title'=>'description'])}}
              <div class="controls">
              {{ Form::textarea('description', $course->description,['style'=>'width:60%']) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Venue','',['class'=>'control-label','title'=>'venue'])}}
              <div class="controls">
              {{ Form::textarea('venue', $course->venue,['style'=>'width:60%','rows'=>3]) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Schedule','',['class'=>'control-label','title'=>'schedule'])}}
              <div class="controls">
              {{ Form::textarea('schedule', $course->schedule,['style'=>'width:60%','rows'=>3]) }}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Amount','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::number('amount',$course->amount,['title'=>'Amount'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('banner','',['class'=>'control-label','title'=>'banner'])}}
             
            <div class="controls"> 
              {{Form::image($course->banner,'Profile_image',['alt'=>'Banner ','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'banner','style'=>'width:19%'])}}
              <input type="hidden" name="banner" value="{{$course->banner}}">
              <br>
              {{Form::file('banner',['onchange'=>'bannerURL(this)'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Trainner Name','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('trainner_name',$course->trainner_name,['title'=>'Trainner Name'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('trainner_image','',['class'=>'control-label','title'=>'trainner_image'])}}
            <div class="controls"> 
              {{Form::image($course->trainner_image,'Profile_image',['alt'=>'Banner ','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'trainner','style'=>'width:19%'])}}
              <input type="hidden" name="trainner_image" value="{{$course->trainner_image}}">
              <br>
              {{Form::file('trainner_image',['onchange'=>'trainnerURL(this)'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Available Seat','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::number('available_seat',$course->available_seat,['title'=>'Available Seat'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Who can join?','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('who_can_join',$course->who_can_join,['title'=>'Who can join?'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Total Hours','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::text('total_hours',$course->total_hours,['title'=>'Total Hours'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Start Date','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::date('start_date',$course->start_date,['title'=>'Start Date'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('End Date','',['class'=>'control-label'])}}
              <div class="controls">
              {{Form::date('end_date',$course->end_date,['title'=>'End Date'])}}
              </div>
            </div>
        
              <div class="modal-footer">
                 {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'edit_submit_button','style'=>'float:left'])}}  
              </div>
      		{{Form::close()}}
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
