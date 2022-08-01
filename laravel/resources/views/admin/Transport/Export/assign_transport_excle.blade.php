<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Assign Transport Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Assign Transport Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                               
                                   <tr class='report_class_background' >
                                   <th>Assign Transport Id</th>
                                  <th>Route Name</th>
                                  <th>Name of Transport</th>
                                  <th>Transport Color</th>
                                 <th>Transport Number</th>
                                 <th>Student Roll No</th>
                                 <th>Route Fare</th>  
                                 </tr>

                              @foreach($assign_transport as $assign_transport_information)
                                  <tr class="gradeX" style=" font-size:10px;">
                                          <td>
                                         {{$assign_transport_information->transport_id}}
                                         </td>
                                         <td>
                                         {{$assign_transport_information->route_name}}
                                         </td>
                                         <td>
                                          {{$assign_transport_information->name_transport}}
                                         </td>
                                         <td>
                                         {{$assign_transport_information->transport_color}}
                                         </td>
                                         <td>
                                         {{$assign_transport_information->number_of_transport}}
                                         </td>
                                         <td>
                                         {{$assign_transport_information->student_roll}}
                                         </td>
                                        <td>
                                        {{$assign_transport_information->route_fare}}
                                        </td>
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

