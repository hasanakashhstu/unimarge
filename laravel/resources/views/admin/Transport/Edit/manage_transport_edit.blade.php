@extends('admin.index')
@section('Title','Manage Transport')
@section('breadcrumbs','Manage Transport')
@section('breadcrumbs_link','/manage_transport')
@section('breadcrumbs_title','Manage Transport')
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
    <i class="fa fa-check-square-o" aria-hidden="true"></i> Manage Transport Information Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Manage Transport Info Edit Details</p>


 <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/route'><i class="fa fa-road" aria-hidden="true"></i>&nbsp; Route</a></li>
            <li><a href='/assign_transport'><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Assign Transport</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
             <li><a href='/manage_transport'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_transport_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_transport_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_transport_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>





      <div>
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-info-sign">
              </i>
            </span>
            <h5>{{$manage_transport_info->route_name}} Data Table
            </h5>
          </div>
           <div class="widget-content nopadding">
            {{Form::open(['url'=>"/manage_transport/$manage_transport_info->transport_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
              <div class="control-group">
              {{Form::label('route_name','Route Name',['class'=>'control-label','title'=>'route_name'])}}
                <div class="controls">

                 @foreach($route_info as $route_name_list) 
                @php 
                 $route_name_data[$route_name_list->name]=$route_name_list->name
                @endphp 
               @endforeach
              {{Form::select('route_name',$route_name_data,null,['id'=>'route_name'])}}
                
                </div>
              </div>
              <div class="control-group">
               {{Form::label('name_of_transport','Name Of Transport',['class'=>'control-label','title'=>'name_of_transport'])}}
                <div class="controls">
                  {{Form::text('name_of_transport',$manage_transport_info->name_of_transport,['id'=>'required','placeholder'=>'Name Of Transport','title'=>'name_of_transport'])}}
                </div>
              </div>
              <div class="control-group">
                  {{Form::label('number_of_transport','Number Of Transport',['class'=>'control-label','title'=>'number_of_transport'])}}
                <div class="controls">
                {{Form::text('number_of_transport',$manage_transport_info->number_of_transport,['id'=>'required','placeholder'=>'Number Of Transport','title'=>'number_of_transport'])}}
                </div>
              </div>
              <div class="control-group">
               {{Form::label('licence_no','Licence No',['class'=>'control-label','title'=>'licence_no'])}}
                <div class="controls">
                   {{Form::text('licence_no',$manage_transport_info->licence_no,['id'=>'required','placeholder'=>'Licence No','title'=>'licence_no'])}}
            </div>
              </div>
               <div class="control-group">
               {{Form::label('start_date','Start Date',['class'=>'control-label','title'=>'start_date'])}}
                <div class="controls">
                {{Form::date('start_date',$manage_transport_info->start_date,['id'=>'required','placeholder'=>'Start Date','title'=>'start_date'])}}
            </div>
              </div>
               <div class="control-group">
                {{Form::label('transport_color','Transport Color',['class'=>'control-label','title'=>'transport_color'])}}
                <div class="controls">
                 {{Form::text('transport_color',$manage_transport_info->transport_color,['id'=>'required','placeholder'=>'Transport Color','title'=>'transport_color'])}}
            </div>
              </div>
               <div class="control-group">
                {{Form::label('number_of_seat','Number Of Seat',['class'=>'control-label','title'=>'number_of_seat'])}}
                <div class="controls">
                {{Form::text('number_of_seat',$manage_transport_info->number_of_seat,['id'=>'required','placeholder'=>'Number Of Seat','title'=>'number_of_seat'])}}
            </div>
              </div>
       <div class="form-actions">
               {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success'])}}
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
      
          var w = window.open('/manage_transport_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>

   

    @stop