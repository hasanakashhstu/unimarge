@extends('admin.index')
@section('Title','salary_slip_report')
@section('breadcrumbs','Salary Slip Report')
@section('breadcrumbs_link','/salary_slip_report')
@section('breadcrumbs_title','salary_slip_report')
@section('content')


@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif
<div class="container">
  <h2>
   <i class="fa fa-file-text-o" aria-hidden="true"></i>
    </i> Salary Structure Report
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Salary Slip Report Details
  </p><br/>
  <!-- Transport Details -->
 
    
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/salary_slip'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Salary Slip</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
           
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/salary_slip_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/salary_slip_report_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/salary_slip_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

   <div class="widget-box">
			          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			            				<h5>Salary Slip Data table</h5>
			          				</div>

			          		<div class="widget-content nopadding">
					            <table class="table table-bordered data-table">

						              <thead>
										<tr>
										  <th>Structure Id</th>
										  <th>Title</th>	
										  <th>Status</th>
										   <th>Frequency</th>
										   <th>Payment Account</th>
										   <th>Expense Account</th>
										   <th>Total Teacher and Staff Include </th>
										   <th>Structure Create Date</th>
										  <th> Action</th>
										</tr>

						              </thead>
						              <tbody>
						               @foreach($salary_structure_details as $salary_structure_details_info)
							            <tr class="gradeX">
							             <td>{{$salary_structure_details_info->payroll_structure_id}}</td>
							             <td>{{$salary_structure_details_info->title}}</td>
							             <td>{{$salary_structure_details_info->status}}</td>
							             <td>{{$salary_structure_details_info->frequency}}</td>
							             <td>{{$salary_structure_details_info->payment_acount}}</td>
							             <td>{{$salary_structure_details_info->expense_acount}}</td>

							             <td>{{DB::table('salary_structure')->where('payroll_structure_id',$salary_structure_details_info->payroll_structure_id)->count()}}</td>
							             <td>{{$salary_structure_details_info->created_at}}</td>
							             <!--  -->
						                 <td id="my_align" class="display_status">
						                 {{Form::open(['url'=>"salary_structure_edit/$salary_structure_details_info->payroll_structure_id" ,'method'=>'GET'])}}
					                       {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
					                       {{Form::close()}}

					                       {{Form::open(['url'=>"salary_structure_delete/$salary_structure_details_info->payroll_structure_id" ,'method'=>'get'])}}
					                       {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
						                 </td>
						           
							            </tr>
							             @endforeach
						              </tbody>
			            			</table>
			          			</div>
			        		</div>
					   

    
@stop
