@extends('admin.index')
@section('Title','assign_dormitory')
@section('breadcrumbs','assign_dormitory')
@section('breadcrumbs_link','assign_dormitory')
@section('breadcrumbs_title','assign_dormitory')
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
   <i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;Assign Dormitory Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Assign Dormitory Edit
  </p><br>
  <!-- Transport Details -->


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Manage Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
            <li><a href='/assign_dormitory'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



    <div class="controls text-right">
              <div data-toggle="buttons-checkbox" class="btn-group">
                <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Export Excel' type="button"><a  href="/assign_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
              </div>
      </div>
</div><br>
  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>{{$assign_dormitory_data->title}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
 {{Form::open(['url'=>"/assign_dormitory/$assign_dormitory_data->assign_dormitory_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

               <div class="control-group">
			              {{Form::label('title','Title',['class'=>'control-label','title'=>'title'])}}
			               <div class="controls">
			                {{Form::text('title',$assign_dormitory_data->title,['id'=>'required','placeholder'=>'Title','title'=>'title'])}}

			              </div>
			            </div>
					 <div class="control-group">
             {{Form::label('student_roll','Student Roll',['class'=>'control-label','title'=>'student_roll'])}}
              <div class="controls">
               {{Form::text('student_roll',$assign_dormitory_data->student_roll,['id'=>'required','class'=>'student_roll','placeholder'=>'Student Roll','title'=>'student_roll'])}}
              </div>
            </div>

             <div class="control-group">
                 {{Form::label('student_name','Student Name',['class'=>'control-label','title'=>'student_name'])}}
              <div class="controls">
               {{Form::text('student_name',$assign_dormitory_data->student_name,['id'=>'student_name','class'=>'student_name','placeholder'=>'Student Name','title'=>'student_name'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('department',' Department',['class'=>'control-label','title'=>'department'])}}
              <div class="controls">
                {{Form::text('department',$assign_dormitory_data->department,['id'=>'department','class'=>'department','placeholder'=>'Department','title'=>'department'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('Section','Class',['class'=>'control-label','title'=>'class'])}}
              <div class="controls">
               {{Form::text('semester',$assign_dormitory_data->semester,['id'=>'section','placeholder'=>'Section','title'=>'semester'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('dormitory_no','Dormitory No',['class'=>'control-label','title'=>'dormitory_no'])}}
                <div class="controls">
                          @foreach($dormitory_info as $dormitory_data)
                              @php $dormitory_roll_list[$dormitory_data->	dormitory_no]=$dormitory_data->	dormitory_no @endphp
                             @endforeach

                  {{Form::select('dormitory_no',$dormitory_roll_list)}}
                </div>
            </div>
				            <div class="control-group">
				            {{Form::label('dormitory_name',' Dormitory Name',['class'=>'control-label','title'=>'dormitory_name'])}}
				              <div class="controls">
				                 @foreach($dormitory_info as $dormitory_data)
                               @php 

                               $dormitory_name_list[$dormitory_data->dormitory_name]=$dormitory_data->dormitory_name; @endphp
                          @endforeach

                               {{Form::select('dormitory_name',$dormitory_name_list)}}
				              </div>
				            </div>
							<div class="control-group">
							  {{Form::label('room_number','Room Number',['class'=>'control-label','title'=>'room_number'])}}
							<div class="controls">
							  {{Form::text('room_number',$assign_dormitory_data->room_number,['id'=>'required','placeholder'=>'Room Number','title'=>'room_number'])}}
							</div>
						 </div>

             <div class="control-group">
                {{Form::label('seat_number','Room Number',['class'=>'control-label','title'=>'seat_number'])}}
              <div class="controls">
                {{Form::text('seat_number',$assign_dormitory_data->seat_number,['id'=>'required','placeholder'=>'Seat Number','title'=>'seat_number'])}}
              </div>
             </div>

             <div class="control-group">
                {{Form::label('arrive_date','Arrive Date',['class'=>'control-label','title'=>'arrive_date'])}}
              <div class="controls">
                {{Form::date('arrive_date',$assign_dormitory_data->arrive_date,['id'=>'required','placeholder'=>'Arrive Date','title'=>'arrive_date'])}}
              </div>
             </div>

			             <div class="control-group">
			               {{Form::label('description','Description',['class'=>'control-label','title'=>'description'])}}
			              <div class="controls">
			               {{Form::text('description',$assign_dormitory_data->description,['id'=>'required','placeholder'=>'Description','rows'=>'10','cols'=>'39','title'=>'description'])}}

			              </div>
			            </div>


          <div class="modal-footer">
             {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
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

    $(".student_roll").unbind().keyup(function()
     {

         var student_roll=$(".student_roll").val();

         $.ajax({
            url: '/student_data_get',
            type: "post",
            data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
            success: function(data){
               console.log(data);

               $('#student_name').val(data.student_name);
               $('#department').val(data.department);
               $('#section').val(data.class);
            }
          });
    });



});
</script>
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
