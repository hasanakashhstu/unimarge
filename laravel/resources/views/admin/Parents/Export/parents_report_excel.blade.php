<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Parent's Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Parent's Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                             
                                   <tr class='report_class_background'>
                                    
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Gender</th>
                                      <th>Profession</th>
                                      <!-- <th>Monthly Salary</th>
                                      <th>Anual Salary</th> -->

                                	</tr>
                              	
	                              @foreach($parents_info as $parents_info_list)
                                       <tr style="font-size: 10px;">
                                           
                                           <td>{{$parents_info_list->name}}</td>
                                           <td>{{$parents_info_list->email}}</td>
                                           <td>{{$parents_info_list->phone}}</td>
                                           <td>{{$parents_info_list->gender}}</td>
                                           <td>{{$parents_info_list->profession}}</td>
                                           <!-- <td>{{$parents_info_list->monthly_salary}}</td>
                                           <td>{{$parents_info_list->anual_salary}}</td> -->
                                           
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

