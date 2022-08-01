<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Accountant Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Accountant Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                                
                                   <tr class='report_class_background' >
                                     <td>Accountant Id</td>
                                      <td>Accountant Name</td>
        		                         <td>Mobile</td>
        		                         <td>Email</td>
        		                         <td>Job Type</td>
        		                         <td>Department</td>	
                                    
                               </tr>

                                    @foreach($accountet_list as $accountent_data)
                                  <tr class="gradeX" style=" font-size:10px;">
                                          <td>{{$accountent_data->accontant_id}}</td>
                                         <td>{{$accountent_data->accountant_name}}</td>
                                         <td>{{$accountent_data->mobile_no}}</td>
                                         <td>{{$accountent_data->email}}</td>
                                         <td>{{$accountent_data->job_type}}</td>
                                         <td>{{$accountent_data->work_department}}</td>
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

