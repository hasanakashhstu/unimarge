<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Libray Member Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Libray Member Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                              
                                   <tr class='report_class_background' >
                                       <th>Member Id</th>
                                      <th>Member Name</th>
                                      <th>Roll Number</th>
                                      <th>Registration Number</th>
                                      <th>Status</th>
                                      <th>Email</th>
                                      <th>Phone </th>
                                      <th>From Date </th>
                                     <th>To Date </th>
                                     
                                 </tr>

                                   @foreach($membership_data as $membership_information)
                                  <tr class="gradeX" style=" font-size:10px;">
                                         <td>{{$membership_information->member_id}}</td>
                                          <td>{{$membership_information->member_name}}</td>
                                          <td>{{$membership_information->roll_number}}</td>
                                          <td>{{$membership_information->reg_number}}</td>
                                          <td>{{$membership_information->status}}</td>
                                          <td>{{$membership_information->email}}</td>
                                          <td>{{$membership_information->phone}}</td>
                                          <td>{{$membership_information->from_date}}</td>
                                          <td>{{$membership_information->to_date}}</td>
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

