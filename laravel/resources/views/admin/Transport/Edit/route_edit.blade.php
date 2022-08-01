@extends('admin.index')
@section('Title','Route')
@section('breadcrumbs','Route')
@section('breadcrumbs_link','/route')
@section('breadcrumbs_title','route')
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
<div class="container">
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Route Edit</h2> 
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Route Detail's Edit</p> 
  <!-- Transport Details -->
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/assign_transport'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Assign Transport</a></li>
            <li><a href='/manage_transport'><i class="fa fa-bus" aria-hidden="true" ></i> &nbsp; Manage Transport</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
             <li><a href='/route'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/route_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/route_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/route_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$route_data->name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
    {{Form::open(['url'=>"/route/$route_data->route_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
               <div class="control-group" hidden>
            {{Form::label('hidden_field','Hidden',['class'=>'control-label','title'=>'hidden_field'])}}
                <div class="controls">
                  {{Form::text('route_id',$route_data->route_id,['id'=>'required','hidden'=>'hidden','title'=>'route_id'])}}
               
                </div>
            </div>
                <div class="control-group">
                  {{Form::label('name','Route Name',['class'=>'control-label','title'=>'Name'])}}
                  <div class="controls">
                    {{Form::text('name',$route_data->name,['id'=>'required','placeholder'=>'Route Name','title'=>'name'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('fare','Route Fare',['class'=>'control-label','title'=>'fare'])}}
                  <div class="controls">
                   {{Form::text('fare',$route_data->fare,['id'=>'required','placeholder'=>'Route Fare','title'=>'fare'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('distance','Distance',['class'=>'control-label','title'=>'distance'])}}
                  <div class="controls">
                    {{Form::text('distance',$route_data->distance,['id'=>'required','placeholder'=>'Distance','title'=>'distance'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('hour','Compliting Hour',['class'=>'control-label','title'=>'hour'])}}
                  <div class="controls">
                  {{Form::text('hour',$route_data->hour,['id'=>'required','placeholder'=>'Compliting Hour','title'=>'hour'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('from','From Here',['class'=>'control-label','title'=>'form'])}}
                  <div class="controls">
                   {{Form::text('from',$route_data->from,['id'=>'required','placeholder'=>'From','title'=>'from'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('to','To',['class'=>'control-label','title'=>'to'])}}
                  <div class="controls">
                   {{Form::text('to',$route_data->to,['id'=>'required','placeholder'=>'To','title'=>'to'])}}
                  </div>
                </div>
           
          <div class="modal-footer">
             {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left'])}}
          
        </div>
         {{Form::close()}}
          </div>
          </div>
           </div>
          </div>
     </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/route_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
@stop