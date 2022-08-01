@extends('admin.index')
@section('Title','assign_canteen')
@section('breadcrumbs','assign_canteen')
@section('breadcrumbs_link','assign_canteen')
@section('breadcrumbs_title','assign_canteen')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>

@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('error') }}
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
  		<h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Assign Canteen</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Assign  Dormitory</p> <!-- Transport Details -->

         <br>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Manage Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div>



 	<div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Assign Canteen</a></li>

        </ul>
      </div>
    </div>
      <br>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/assign_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>

		<div class="tab-content">

      <!--new add form-->
      <div class="modal fade" id="myModal" role="dialog" style="margin-left:-154px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-child" aria-hidden="true"></i> &nbsp;Assign Canteen</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
          {{Form::open(['url'=>'/assign_canteen','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}


			            <div class="control-group">
			              {{Form::label('title','Title',['class'=>'control-label','title'=>'title'])}}
			               <div class="controls">
			                {{Form::text('title','',['id'=>'required','placeholder'=>'Title','title'=>'title'])}}

			              </div>
			            </div>
						<div class="control-group">
						 {{Form::label('student_roll','Student Roll',['class'=>'control-label','title'=>'student_roll'])}}
							<div class="controls">
							 {{Form::text('student_roll','',['id'=>'required','class'=>'student_roll','placeholder'=>'Student Roll','title'=>'student_roll'])}}
							</div>
						</div>

						 <div class="control-group">
						     {{Form::label('student_name','Student Name',['class'=>'control-label','title'=>'student_name'])}}
							<div class="controls">
							 {{Form::text('student_name','',['id'=>'student_name','class'=>'student_name','placeholder'=>'Student Name','title'=>'student_name'])}}
							</div>
						</div>

						<div class="control-group">
							{{Form::label('Class','Class',['class'=>'control-label','title'=>'class'])}}
							<div class="controls">
							 {{Form::text('class','',['id'=>'section','placeholder'=>'Class','title'=>'semester'])}}
							</div>
						</div>

						<div class="control-group">
							{{Form::label('department',' Department',['class'=>'control-label','title'=>'department'])}}
							<div class="controls">
							  {{Form::text('department','',['id'=>'department','class'=>'department','placeholder'=>'Department','title'=>'department'])}}
							</div>
						</div>

	
						

			             <div class="control-group">
                                {{Form::label('Description','',['class'=>'control-label'])}}

                                <div class="controls">
                                  {{Form::textarea('description','',['col'=>'20','rows'=>'4','title'=>'description'])}}

                                </div>
                              </div>

		        </div>
		      </div>
      <div class="modal-footer">
           {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
          {{Form::close()}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>

</div>



      <!--end of the new add form-->
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

      <!-- Transport List Report  -->

					    	<div id="home" class="tab-pane fade in active">
					      		<div class="widget-box">
			          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			            				<h5>Assign Canteen Data table</h5>
			          				</div>

			          		<div class="widget-content nopadding">
					            <table class="table table-bordered data-table">

						              <thead>
										<tr>
										  <th> Title</th>
										   <th>Student Name</th>
										   <th>Student Roll</th>
										   <th>Class</th>
										   <th> Department</th>
										   <th>Description</th>
										   <th>Action </th>
										</tr>

						              </thead>
						              <tbody>
						               @foreach($assign_canteen_data as $assign_canteen_information)
							            <tr class="gradeX">
							              <td>{{$assign_canteen_information->title}}</td>
							              <td>{{$assign_canteen_information->student_name}}</td>
							              <td>{{$assign_canteen_information->student_roll}}</td>
							              <td>{{$assign_canteen_information->class}}</td>
							              <td>{{$assign_canteen_information->department}}</td>
							              <td>{{$assign_canteen_information->description}}</td>

						                 <td id="my_align" class="display_status">

						                        {{Form::open(['url'=>"/assign_canteen/$assign_canteen_information->assign_canteen_id/edit" ,'method'=>'GET'])}}
						                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
						                        {{Form::close()}}
						                        {{Form::open(['url'=>"/assign_canteen/$assign_canteen_information->assign_canteen_id" ,'method'=>'DELETE'])}}
						                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
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
          var w = window.open('/assign_dormitory_pdf');

          w.onload = function()
          {
              w.print();
          };

    });



});

</script>




@stop
