@extends('admin.index')
@section('Title','Edit Admin Information')
@section('breadcrumbs','Create Admin > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Admin Information')

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
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Slider</h2> <!-- Tab Heading  -->
      <p title="Transport Details">{{Session::get('school.system_name')}} Slider</p> <!-- Transport Details -->
		  



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
              <h5>Edit Slider Information</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/frontend/slider/$slider->website_slider_id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                  {{Form::label('title','Title',['class'=>'control-label','title'=>'title'])}}
                    <div class="controls">
                      {{Form::text('title',$slider->title,['id'=>'required','placeholder'=>'Title','title'=>'title'])}}
                      </div>
              </div>
              <div class="control-group">
                  {{Form::label('description','Description',['class'=>'control-label','title'=>'description'])}}
                    <div class="controls">
                      {{Form::textarea('description',$slider->description,['id'=>'required','placeholder'=>'Description','title'=>'description'])}}
                      </div>
              </div>
              <div class="control-group">
                  {{Form::label('optional_text','Optional Title',['class'=>'control-label','title'=>'optional_text'])}}
                    <div class="controls">
                      {{Form::text('optional_text',$slider->optional_text,['id'=>'required','placeholder'=>'Optional Title','title'=>'optional_text'])}}
                      </div>
              </div>
                  

              <div class="control-group">
                  {{Form::label('image','',['class'=>'control-label','title'=>'image'])}}
                 
                  <div class="controls"> 
                  {{Form::image($slider->image,'Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                  <br>
                  <input type="hidden" name="image" value="{{$slider->image}}">
                  {{Form::file('image',['onchange'=>'readURL(this)'])}}
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
    <script type="text/javascript" src="{{asset('extra_js/create_admin_edit.js')}}"></script>
@endpush
 
@stop
