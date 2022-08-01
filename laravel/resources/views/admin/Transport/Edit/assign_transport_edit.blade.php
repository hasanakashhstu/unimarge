@extends('admin.index')
@section('Title','Assign Transport')
@section('breadcrumbs','Assign Trasport')
@section('breadcrumbs_link','/assign_transport')
@section('breadcrumbs_title','assign_transport')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
  <h2>
    <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Assign Transport Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Assign Transport Edit
  </p><br/>
  <!-- Transport Details -->
 <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/route'><i class="fa fa-road" aria-hidden="true"></i>&nbsp; Route</a></li>
            <li><a href='/manage_transport'><i class="fa fa-bus" aria-hidden="true" ></i> &nbsp; Manage Transport</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
             <li><a href='/assign_transport'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/assign_transport_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/assign_transport_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/assign_transport_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$assign_transport_data->route_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
          {{Form::open(['url'=>"/assign_transport/$assign_transport_data->transport_id",'class'=>'form-horizontal','method'=>'put','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
          
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
						<div class="control-group">
							{{Form::label('name_of_transport','Transport Name',['class'=>'control-label','title'=>'name_of_transport'])}}
							<div class="controls">
              @php $transport_name_data=[] @endphp
								@foreach($manage_transport_info as $manage_transport_list) 
                @php 
                 $transport_name_data[$manage_transport_list->  name_of_transport]=$manage_transport_list->name_of_transport
                @endphp 
               @endforeach
              {{Form::select('name_transport',$transport_name_data,null,['id'=>'name_transport'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('transport_color','Transport Color',['class'=>'control-label','title'=>'transport_color'])}}
							<div class="controls">
								{{Form::text('transport_color',$assign_transport_data->transport_color,['id'=>'transport_color','placeholder'=>'Transport Color','title'=>'transport_color'])}}
							</div>
						</div>
						<div class="control-group">
							 {{Form::label('number_of_transport',' Transport Number',['class'=>'control-label','title'=>'number_of_transport'])}}
							<div class="controls">
								 {{Form::text('number_of_transport',$assign_transport_data->number_of_transport,['id'=>'number_of_transport','placeholder'=>'Number Of Transport','title'=>'number_of_transport'])}}
							</div>
						</div>
						<div class="control-group">
							 {{Form::label('student_roll','Student Roll No',['class'=>'control-label','title'=>'student_roll'])}}
							<div class="controls">
	                      {{Form::text('student_roll',$assign_transport_data->student_roll,['id'=>'required','placeholder'=>'Student Roll No','title'=>'student_roll'])}}
							</div>
						</div>
						<div class="control-group">
               {{Form::label('route_fare','Route Fare',['class'=>'control-label','title'=>'route_fare'])}}
              <div class="controls">
                {{Form::text('route_fare',$assign_transport_data->route_fare,['id'=>'route_fare','placeholder'=>'Route Fare'])}}
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left'])}}
           
      </div>
    </div>
      {{Form::close()}}
 </div>
    </div>
  </div>
  <!--end of the new add form-->
</div>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/assign_transport_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>

<script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#name_transport").unbind().change(function()
     {
          
         var name_transport=$("#name_transport").val();
         
         $.ajax({
            url: '/transport_wise_data',
            type: "post",
            data: {'name_transport':name_transport,'_token': $('input[name=_token]').val()},
            success: function(data){
              $("#transport_color").val(data.transport_color);
              $("#number_of_transport").val(data.number_of_transport);
            }
          });
    });
       
       
  
});
</script>
<script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#route_name").unbind().change(function()
     {
          
         var route_name=$("#route_name").val();
         
         $.ajax({
            url: '/route_wise_data',
            type: "post",
            data: {'route_name':route_name,'_token': $('input[name=_token]').val()},
            success: function(data){
              $("#route_fare").val(data.fare);
             
            }
          });
    });
       
       
  
});
</script>
@stop
