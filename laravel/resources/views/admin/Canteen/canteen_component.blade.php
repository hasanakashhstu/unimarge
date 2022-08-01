@extends('admin.index')
@section('Title','canteen_component')
@section('breadcrumbs','Canteen Component')
@section('breadcrumbs_link','canteen_component')
@section('breadcrumbs_title','canteen_component')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
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
  		<h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;Canteen Component</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Canteen Component   </p> <!-- Transport Details -->

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

            <li><a href='#'><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New Canteen Component</a></li>

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
        <h4 class="modal-title"><i class="fa fa-bed" aria-hidden="true"></i> &nbsp;Add New Canteen Component Details</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
        {{Form::open(['url'=>'/canteen_component','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                <div class="control-group">
                 {{Form::label('component_title','Component Title',['class'=>'control-label','title'=>'component_title'])}}
							<div class="controls">
							 {{Form::text('component_title','',['id'=>'required','placeholder'=>'Component Title','title'=>'component_title'])}}

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
            				<h5>Canteen Component Data table</h5>
          				</div>

          		<div class="widget-content nopadding">
		            <table class="table table-bordered data-table">

			              <thead>
			                <tr>
			                  <th>Component Title</th>
	                      <th>Description</th>
                        <th>Action</th>
			                </tr>
			              </thead>


			              <tbody>
                     @foreach($canteen_component as $canteen_component_information)

			                <tr class="gradeX">
			                      <td>{{$canteen_component_information->component_title}}</td>
                            <td>{{$canteen_component_information->description}}</td>
    			                  <td id="my_align" class="display_status">
                               {{Form::open(['url'=>"/canteen_component/$canteen_component_information->canteen_component_id/edit" ,'method'=>'GET'])}}
                                   {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                              {{Form::close()}}

                                 {{Form::open(['url'=>"/canteen_component/$canteen_component_information->canteen_component_id" ,'method'=>'DELETE'])}}
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
