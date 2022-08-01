@extends('admin.index')
@section('Title','Student Apprisal Report')
@section('breadcrumbs','Student Apprisal Report')
@section('breadcrumbs_link','/student_apprisal_report')
@section('breadcrumbs_title','Student Apprisal Report')

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
  		<h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Apprisal Template Report</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}} Apprisal Report</p> <!-- Transport Details -->

			
 	    
       <div class='row'>
         
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
             
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
            <li><a href='/student_apprisal'><i class="fa fa-address-card-o" aria-hidden="true"></i> Apprisal</a></li>
            <li><a href='/student_apprisal_component'><i class="fa fa-street-view" aria-hidden="true"></i>Apprisal Template</a></li>
            <li><a href='/student_apprisal_report'><i class="fa fa-list-alt" aria-hidden="true"></i>Apprisal Report </a></li>
             </ul>
          </div>
        </div>

    </div>
		  






		<div class="tab-content"> <!-- Transport List Report  -->
		    	
		    	<div id="home" class="tab-pane fade in active">
		      		<div class="widget-box">
          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            				<h5>Apprisal Report</h5>
          				</div>

          		<div class="widget-content nopadding">
		            <table class="table table-bordered data-table">
		              
			              <thead>
			                <tr>
			                  <th>Apprisal Title</th>
			                  <th>Active Status</th>
                        <th>Total Weightage</th>
                        <th>Created At</th>
			                  <th>Last Modified</th>
			                  <th>Action</th>
			                 
			                 
			                </tr>
			              </thead>


			              <tbody>
			              @foreach($student_apprisal_report as $student_apprisal_report_data)
			                <tr class="gradeX">
			                  <td>{{$student_apprisal_report_data->title}}</td>
			                  <td>{{$student_apprisal_report_data->active_status}}</td>
                        <td>100</td>
                        <td>{{$student_apprisal_report_data->created_at}}</td>
			                  <td>{{$student_apprisal_report_data->updated_at}}</td>
			                  <td>
                                  <div class="display_status">
                                  @can('edit apprisal')
                                   {{Form::open(['url'=>"student_apprisal_component/$student_apprisal_report_data->template_id/edit" ,'method'=>'GET'])}}
                                    	{{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                                   {{Form::close()}}
                                   @endcan

                                   @can('delete apprisal')

                                    {{Form::open(['url'=>"student_apprisal_component/$student_apprisal_report_data->template_id" ,'method'=>'DELETE' ])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Delete this Template?');"])}}
                                    {{Form::close()}} 
                                  @endcan                                 
                                  </div>

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




@stop