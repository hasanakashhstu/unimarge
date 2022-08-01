@extends('admin.index')
@section('Title','Edit Course Category Information')
@section('breadcrumbs','Create Course Category > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Course Category Information')

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
      <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Course Category</h2> <!-- Tab Heading  -->
      <p title="Transport Details">{{Session::get('school.system_name')}} Course Category</p> <!-- Transport Details -->
		  



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
              <h5>{{$course_category->title}} Information Edit</h5>
            </div>

          <div class="widget-content padding">
              {{Form::open(['url'=>"/frontend/course_category/$course_category->id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
				          
              <div class="control-group">
                  {{Form::label('name','Title',['class'=>'control-label','title'=>'name'])}}
                    <div class="controls">
                      {{Form::text('name',$course_category->name,['id'=>'required','placeholder'=>'name','Title'=>'name'])}}
                      </div>
              </div>
                  
              <div class="control-group">
                  {{Form::label('description','Description',['class'=>'control-label','title'=>'title'])}}
                    <div class="controls">
                      {{Form::text('description',$course_category->description,['id'=>'required','placeholder'=>'Description','title'=>'description'])}}
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
