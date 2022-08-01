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
  <h2><i class="fa fa-road" aria-hidden="true"></i>&nbsp;Add Route</h2> 
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Add Route</p><br/>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/manage_transport'><i class="fa fa-bus" aria-hidden="true" ></i> &nbsp; Manage Transport</a></li>
            <li><a href='/assign_transport'><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Assign Transport</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
           
         </ul>
      </div>
    </div>
    </div>
  <!-- Transport Details -->
  <div class="panel panel-default text-right" >
    <div class="panel-body">
      <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
        <li><a href='#'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Add New</a></li>
      </ul>
    </div>
  </div><br/>
  <div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/route_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/route_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/route_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>
  <div class="tab-content">
    <!--new add form-->
    <div class="modal fade" id="myModal" role="dialog" style="margin-left:-29px;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><i class="fa fa-road" aria-hidden="true"></i>&nbsp;Add New</h4>
          </div>
          <div class="modal-body">
            <div class="widget-content padding">
             {{Form::open(['url'=>'/route','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
               <div class="control-group" hidden>
            {{Form::label('hidden_field','Hidden',['class'=>'control-label','title'=>'hidden_field'])}}
                <div class="controls">
                  {{Form::text('parents_id',time(),['id'=>'required','hidden'=>'hidden','title'=>'parents_name'])}}
               
                </div>
            </div>
                <div class="control-group">
                  {{Form::label('name','Route Name',['class'=>'control-label','title'=>'Name'])}}
                  <div class="controls">
                    {{Form::text('name','',['id'=>'required','placeholder'=>'Route Name','title'=>'name'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('fare','Route Fare',['class'=>'control-label','title'=>'fare'])}}
                  <div class="controls">
                   {{Form::text('fare','',['id'=>'required','placeholder'=>'Route Fare','title'=>'fare'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('distance','Distance',['class'=>'control-label','title'=>'distance'])}}
                  <div class="controls">
                    {{Form::text('distance','',['id'=>'required','placeholder'=>'Distance','title'=>'distance'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('hour','Compliting Hour',['class'=>'control-label','title'=>'hour'])}}
                  <div class="controls">
                  {{Form::text('hour','',['id'=>'required','placeholder'=>'Compliting Hour','title'=>'hour'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('from','From Here',['class'=>'control-label','title'=>'form'])}}
                  <div class="controls">
                   {{Form::text('from','',['id'=>'required','placeholder'=>'From','title'=>'from'])}}
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('to','To',['class'=>'control-label','title'=>'to'])}}
                  <div class="controls">
                   {{Form::text('to','',['id'=>'required','placeholder'=>'To','title'=>'to'])}}
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
             {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left'])}}
            {{Form::button('Close',['class'=>'btn btn-default','data-dismiss'=>'modal'])}}
          </div>
        </div>
         {{Form::close()}}
      </div>
    </div>
  </div>
  <!--end of the new add form-->
  <!-- Transport List Report  -->
  <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title"> 
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Route Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Route Name</th>
              <th>Route Fare</th>
              <th>Route Length</th>
              <th>Compliting Hour</th>
              <th>Form Here</th>
              <th>To</th>
              <th>Active</th>
            </tr>
          </thead>
          <tbody>
            @foreach($route_info as $route_information)
            <tr class="gradeX">
              <td>{{$route_information->name}}</td>
              <td>{{$route_information->fare}}</td>
              <td>{{$route_information->distance}}</td>
               <td>{{$route_information->hour}}</td>
              <td>{{$route_information->from}}</td>
              <td>{{$route_information->to}}</td>
              <td id="my_align" class="display_status">                     
               {{Form::open(['url'=>"/route/$route_information->route_id/edit" ,'method'=>'GET'])}}
               {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
               {{Form::close()}}
               {{Form::open(['url'=>"/route/$route_information->route_id" ,'method'=>'DELETE','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
               {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
               {{Form::close()}}
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
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