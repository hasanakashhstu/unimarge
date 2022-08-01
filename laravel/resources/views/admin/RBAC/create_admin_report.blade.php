<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Admin Report</title>
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


                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                            
                                   <tr style="background: aliceblue">
                                      <td>Id</td>
                                      <td>Name</td>
                                      <td>Email</td>
                                    </tr>
                        
	                              	@foreach($create_admin_data as $admin_data)
	                                     <tr >
	                                         <td>{{$admin_data->id}}</td>
	                                         <td>{{$admin_data->name}}</td>
	                                         <td>{{$admin_data->email}}</td>
	                                     </tr>
									                 @endforeach  
	                            
                         		</table>
                       		</div>
                  	</div>
             </div>
             <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
      			 <p class='p_tag_report' style='text-align:center'>Develop by : Codebool Software Company Ltd.<br>website : http://codebool.com<br>Contact No :01751783698</p>
      </div>

       


</body></html>

