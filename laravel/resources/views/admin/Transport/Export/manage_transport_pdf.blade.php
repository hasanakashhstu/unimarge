<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Manage Transport Report</title>
  <style>
  
  .print_report{margin-top: 2%;margin-left: 5%;margin-right: 5%;}
  .p_tag_report{font-size: 12px;margin-top: 30px}
</style>
</head><body class='body_for_report'>
      <div class='print_report'>
      		<div class="container">
	           <img src="img/logo.png" alt="Company Logo" style='background: currentColor;height: 120px;width: 100px;' height="120" width="120"/>
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
		  <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

              <h5 style="text-align: center;">Manage Transport Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                          
                                   <tr style="background: aliceblue; font-size:11px;">
                                    <th> Manage Transport Id</th>
                                    <th>Route Name</th>
                                    <th>Number Of Vechicle</th>
                                    <th>Description</th>
                                    <th>Licence No</th>
                                    <th>Start Date</th>
                                    <th>Transport Color</th>
                                    <th>Number Of Seat</th>
                                                        
                                    </tr>
                              
	                                  @foreach($manage_transport_info as $manage_transport_information)
	                                     <tr style="font-size: 12px;">
                                        <td>
                                        {{$manage_transport_information-> manage_transport_id}}</td>
                                        <td>
                                        {{$manage_transport_information->route_name}}</td>
                                        <td>
                                        {{$manage_transport_information->name_of_transport}}
                                        </td>
                                        <td>
                                        {{$manage_transport_information->number_of_transport}}
                                        </td>
                                        <td>
                                        {{$manage_transport_information->licence_no}}
                                        </td>
                                        <td>
                                        {{$manage_transport_information->start_date}}
                                        </td>
                                        <td>{{$manage_transport_information->transport_color}}
                                        </td>
                                        <td>
                                        {{$manage_transport_information->number_of_seat}}
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

       


</body></html>



