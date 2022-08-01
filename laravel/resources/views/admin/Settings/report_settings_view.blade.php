@extends('admin.index')
@section('Title','report_settings')
@section('breadcrumbs','report_settings')
@section('breadcrumbs_link','/report_settings')
@section('breadcrumbs_title','report_settings')
@section('content')




@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--close-left-menu-stats-sidebar-->

<div class="container">
      <h2><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Report Settings</h2> <!-- Tab Heading  -->
    <p title="Transport Details">I School Managment  Report Settings</p> <!-- Transport Details -->
<div class="container-fluid">
 <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Data Table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Name</th>
              <th>Designation</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            @foreach($report_settings as $key=>$value)
              <tr class="gradeX">
                <td>{{$key+1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->designation}}</td>
                <td>
                
        {{Form::open(['url'=>"report_settings/$value->report_settings_id",'method'=>'DELETE'])}}
            {{Form::submit('Delete',['class'=>'btn btn-danger','target'=>'_blank'])}}
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