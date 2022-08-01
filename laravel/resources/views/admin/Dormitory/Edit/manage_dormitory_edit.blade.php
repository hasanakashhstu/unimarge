@extends('admin.index')
@section('Title','dormitory')
@section('breadcrumbs',' Manage Dormitory > Dormitory Edit')
@section('breadcrumbs_link','/dormitory')
@section('breadcrumbs_title','dormitory')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
  		<h2><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;Manage Dormitory Edit </h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Manage Dormitory Details Edit </p> <br><!-- Transport Details -->





<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
           <li><a href='/assign_dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Assign Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
            <li><a href='/dormitory'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



    <div class="controls text-right">
              <div data-toggle="buttons-checkbox" class="btn-group">
                <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
              </div>
      </div>
</div><br>



    <!-- Modal content-->

     <div class="container">
  <!-- Transport Details -->
  <div class="widget-box">
   <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5> {{$dormitory_data->dormitory_name}} Edit Data Table
      </h5>
    </div>

        <div class="widget-content padding">
        {{Form::open(['url'=>"/dormitory/$dormitory_data->manage_dormitory_id",'class'=>'form-horizontal','method'=>'Put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                             <div class="control-group">
                           {{Form::label('dormitory_title','Dormitory Title',['class'=>'control-label','title'=>'dormitor_title'])}}
							<div class="controls">
							 {{Form::text('dormitory_title',$dormitory_data->dormitory_title,['id'=>'required','placeholder'=>'Dormitory Title','title'=>'dormitory_title'])}}

							</div>
						</div>
            <div class="control-group">
						 {{Form::label('dormitory_author','Dormitory Author',['class'=>'control-label','title'=>'dormitory_author'])}}
							<div class="controls">
               @foreach($teacher_info as $teacher_data)
                @php $teacher_name_list[$teacher_data->teacher_name]=$teacher_data->teacher_name @endphp
                @endforeach
                  {{Form::select('dormitory_author',$teacher_name_list)}}
							</div>
						</div>
						<div class="control-group">
							 {{Form::label('dormitory_no','Dormitory No',['class'=>'control-label','title'=>'dormitory_no'])}}
							<div class="controls">
								{{Form::text('dormitory_no',$dormitory_data->dormitory_no,['id'=>'required','placeholder'=>'Dormitory No','title'=>'dormitory_no'])}}
							</div>
						</div>
            <div class="control-group">
              {{Form::label('dormitory_name','Dormitory Name',['class'=>'control-label','title'=>'dormitory_name'])}}
              <div class="controls">
                {{Form::text('dormitory_name',$dormitory_data->dormitory_name,['id'=>'required','placeholder'=>'Dormitory Name','title'=>'dormitory_name'])}}
              </div>
            </div>
						<div class="control-group">
							 {{Form::label('dormitory_floor','Dormitory Floor',['class'=>'control-label','title'=>'dormitory_floor'])}}
							<div class="controls">
							{{Form::text('dormitory_floor',$dormitory_data->dormitory_floor,['id'=>'required','placeholder'=>'Dormitory Floor','title'=>'dormitory_floor'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('total_room_number','Total Room Number',['class'=>'control-label','title'=>'dormitory_floor'])}}
							<div class="controls">
								{{Form::text('total_room_number',$dormitory_data->total_room_number,['id'=>'required','placeholder'=>'Total Room Number','title'=>'total_room_number'])}}
							</div>
						</div>

            <div class="control-group">
              {{Form::label('total_seat_number','Total Seat Number',['class'=>'control-label','title'=>'dormitory_floor'])}}
              <div class="controls">
                {{Form::text('total_seat_number',$dormitory_data->total_seat_number,['id'=>'required','placeholder'=>'Total Seat Number','title'=>'total_seat_number'])}}
              </div>
            </div>

						<div class="control-group">
							{{Form::label('dormitory_location','Dormitory Location',['class'=>'control-label','title'=>'dormitory_location'])}}
							<div class="controls">
								{{Form::text('dormitory_location',$dormitory_data->dormitory_location,['id'=>'required','placeholder'=>'Dormitory Location','title'=>'dormitory_location'])}}
							</div>
						</div>
            <div class="control-group">
             {{Form::label('description','Description',['class'=>'control-label','title'=>'description'])}}
              <div class="controls">
              {{Form::text('description',$dormitory_data->description,['id'=>'required','placeholder'=>'Description ','cols'=>'20','rows'=>'4','title'=>'description'])}}
              </div>
            </div>
          <div class="form-actions">
         {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success'])}}
        </div>
        </div>
        {{Form::close()}}
      </div>
        </div>
        </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function()
   {
    $("#print").click(function()
     {
          var w = window.open('/manage_dormitory_pdf');

          w.onload = function()
          {
              w.print();
          };

    });



});

</script>


@stop
