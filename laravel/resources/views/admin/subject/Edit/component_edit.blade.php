@extends('admin.index')
@section('Title','Component')
@section('breadcrumbs','Component')
@section('breadcrumbs_link','/component')
@section('breadcrumbs_title','component')
@section('content')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
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
    <i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Edit Component Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Edit Component Details
  </p>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
            <li><a href='/membership'> <i class="fa fa-user-plus" aria-hidden="true"></i></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
             <li><a href='/component'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/component_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/component_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/component_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$component_data->component_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
     {{Form::open(['url'=>"/component/$component_data->component_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                <div class="control-group">
              {{Form::label('Component Name','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('component_name',$component_data->component_name,['id'=>'required','placeholder'=>'Component Name'])}}
                </div>
              </div>


              
              <div class="control-group">
              {{Form::label('Abbr','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('abbr',$component_data->abbr,['id'=>'required','placeholder'=>'Abbr','title'=>'abbr'])}}
                </div>
              </div>

               <div class="control-group">
              {{Form::label('Mark','',['class'=>'control-label'])}}
          
                <div class="controls">
                {{Form::text('mark',$component_data->mark,['id'=>'required','placeholder'=>'Mark','title'=>'mark'])}}
                </div>
              </div>

               <div class="control-group">
              {{Form::label('Calculate Percent','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('calculate_percent',$component_data->calculate_percent,['id'=>'required','placeholder'=>'Calculate Percent','title'=>'calculate_percent'])}}
                </div>
              </div>

              <div class="form-actions">
              {{Form::submit('submit',['class'=>'btn btn-success'])}}
              </div>

            {{Form::close()}}
           </div>
          </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/subject.js')}}"></script>
@endpush

@stop