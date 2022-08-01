@extends('admin.index')
@section('Title','setup')
@section('breadcrumbs','setup')
@section('breadcrumbs_link','/setup')
@section('breadcrumbs_title','setup')
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
    <i class="fa fa-address-book" aria-hidden="true">
    </i> &nbsp;Applicant For Templete Artical
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">I School Managment  Templete Artical Report
  </p>
  <!-- Transport Details -->


  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5> Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
      {{Form::open(['url'=>"/setup/$ovr_all_data->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
                    <div class="control-group">
                      {{Form::label($ovr_all_data->type,'',['class'=>'control-label'])}}
                      <div class="controls">
                       {{Form::hidden('type',$ovr_all_data->type,['title'=>'type'])}}  
                      {{Form::text('type_name',$ovr_all_data->type_name,['title'=>'type_name'])}}
                      </div>
                    </div>

                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
          </div>
           </div>
          </div>
  


@stop