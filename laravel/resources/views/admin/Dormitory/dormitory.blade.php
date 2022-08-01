@extends('admin.index')
@section('Title','dormitory')
@section('breadcrumbs','Manage Dormitory')
@section('breadcrumbs_link','dormitory')
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
  		<h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;Manage Dormitory</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Create Dormitory   </p> <!-- Transport Details -->

  <br>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/assign_dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Assign Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div>




 	<div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Dormitory</a></li>

        </ul>
      </div>
    </div>
    <br>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
        <h4 class="modal-title"><i class="fa fa-bed" aria-hidden="true"></i> &nbsp;Add New Dormitory Details</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
        {{Form::open(['url'=>'/dormitory','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                <div class="control-group">
                 {{Form::label('dormitory_title','Dormitory Title',['class'=>'control-label','title'=>'dormitor_title'])}}
							<div class="controls">
							 {{Form::text('dormitory_title','',['id'=>'required','placeholder'=>'Dormitory Title','title'=>'dormitory_title'])}}

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
								{{Form::text('dormitory_no','',['id'=>'required','placeholder'=>'Dormitory No','title'=>'dormitory_no'])}}
							</div>
						</div>
            <div class="control-group">
              {{Form::label('dormitory_name','Dormitory Name',['class'=>'control-label','title'=>'dormitory_name'])}}
              <div class="controls">
                {{Form::text('dormitory_name','',['id'=>'required','placeholder'=>'Dormitory Name','title'=>'dormitory_name'])}}
              </div>
            </div>
						<div class="control-group">
							 {{Form::label('total_floor','Total Floor',['class'=>'control-label','title'=>'total_floor'])}}
							<div class="controls">
							{{Form::text('dormitory_floor','',['id'=>'required','placeholder'=>'Total Floor','title'=>'total_floor'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('total_room_number','Total Room Number',['class'=>'control-label','title'=>'dormitory_floor'])}}
							<div class="controls">
								{{Form::text('total_room_number','',['id'=>'required','placeholder'=>'Total Room Number','title'=>'total_room_number'])}}
							</div>
						</div>

            <div class="control-group">
              {{Form::label('total_seat_number','Total Seat Number',['class'=>'control-label','title'=>'dormitory_floor'])}}
              <div class="controls">
                {{Form::text('total_seat_number','',['id'=>'required','placeholder'=>'Total Seat Number','title'=>'total_seat_number'])}}
              </div>
            </div>

						<div class="control-group">
							{{Form::label('dormitory_location','Dormitory Location',['class'=>'control-label','title'=>'dormitory_location'])}}
							<div class="controls">
								{{Form::text('dormitory_location','',['id'=>'required','placeholder'=>'Dormitory Location','title'=>'dormitory_location'])}}
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
           {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            				<h5>Manage Dormitory Data table</h5>
          				</div>

          		<div class="widget-content nopadding">
		            <table class="table table-bordered data-table">

			              <thead>
			                <tr>
			                  <th>Dormitory Title</th>
                        <th>Dormitory Author</th>
                        <th>Dormitory No</th>
                        <th>Dormitory Name</th>
						            <th>Dormitory floor</th>
                        <th>Total Room Number</th>
	                      <th>Total Seat Number</th>
	                      <th>Dormitory Location</th>
	                      <th>Description</th>
                        <th>Action</th>
			                </tr>
			              </thead>


			              <tbody>
                     @foreach($dormitory_data as $manage_dormitory_information)

			                <tr class="gradeX">
			                      <td>{{$manage_dormitory_information->dormitory_title}}</td>
                            <td>{{$manage_dormitory_information->dormitory_author}}</td>
                            <td>{{$manage_dormitory_information->dormitory_no}}</td>
                            <td>{{$manage_dormitory_information->dormitory_name}}</td>
							              <td>{{$manage_dormitory_information->dormitory_floor}}</td>
                            <td>{{$manage_dormitory_information->total_room_number}}</td>
							              <td>{{$manage_dormitory_information->total_seat_number}}</td>
							              <td>{{$manage_dormitory_information->dormitory_location}}</td>
						               <td>{{$manage_dormitory_information->description}}</td>
    			                  <td id="my_align" class="display_status">
                               {{Form::open(['url'=>"/dormitory/$manage_dormitory_information->manage_dormitory_id/edit" ,'method'=>'GET'])}}
                                   {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                              {{Form::close()}}

                                 {{Form::open(['url'=>"/dormitory/$manage_dormitory_information->manage_dormitory_id" ,'method'=>'DELETE'])}}
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
