<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Staff's Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                           
                                   <tr class='report_class_background'>
                                      <th>Staff Id</th>
                                      <th>Staff Name</th>
			                           <th>Job Type</th>
			                            <th>Work Department</th>
			                            
			                            <th>Mobile No</th>

                                	</tr>
                            
	                              	@foreach($staff_report_data as $staff_report_list)
	                                     <tr style="font-size: 12px;">
	                                         <td>{{$staff_report_list->id}}</td>
	                                         <td>{{$staff_report_list->teacher_name}}</td>
			                                   <td>{{$staff_report_list->job_type}}</td>
			                                  <td>{{$staff_report_list->work_department}}</td>
			                                   
			                                  <td>{{$staff_report_list->mobile_no}} </td>
	                                         
	                                     </tr>
									@endforeach  
	                            
                         		</table>
                       		</div>
                  	</div>
             </div>
              <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
             <p class='p_tag_report' style='text-align:center'>Develop by : TMSS ICT Ltd.<br>website : https://tmss-ict.com/<br>Contact No : 880-2-55073530</p>
      </div>

       

<!-- <script src="{{URL::asset('js/bootstrap.min.js')}}"></script> -->
</body></html>

