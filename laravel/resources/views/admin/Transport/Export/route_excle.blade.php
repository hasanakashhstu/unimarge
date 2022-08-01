<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Route Report Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Route Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                               
                                   <tr class='report_class_background' >
                                    <th>Route Id</th>
                                   <th>Route Name</th>
                                  <th>Route Fare</th>
                                  <th>Route Length</th>
                                  <th>Compliting Hour</th>
                                  <th>Form Here</th>
                                  <th>To</th>
                                 </tr>

                                     @foreach($route_info as $route_information)
                                  <tr class="gradeX" style=" font-size:10px;">
                                           <td>{{$route_information->route_id}}</td>
                                          <td>{{$route_information->name}}</td>
                                          <td>{{$route_information->fare}}</td>
                                          <td>{{$route_information->distance}}</td>
                                           <td>{{$route_information->hour}}</td>
                                          <td>{{$route_information->from}}</td>
                                          <td>{{$route_information->to}}</td>
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

