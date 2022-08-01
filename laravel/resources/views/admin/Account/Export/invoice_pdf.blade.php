<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Invoice Report</title>
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

              <h5 style="text-align: center;">Invoice Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                               
                                   <tr style="background: aliceblue; font-size:11px;">
                                      <th>Invoice ID</th>
                                      <th>Class</th>
                                      <th>Student Roll</th>
                                      <th>On Net Total</th>
                                      <th>Waber</th>
                                      <th>Waber Purpose</th>
                                      <th>Payment</th>
                                      <th>Status</th>
                                      <th>Creator</th>
                                      <th>Created At</th>
                                      <th>Last Updated</th>
                                    </tr>
         
	                            @foreach($invoice_data as $invoice_data_list)
	                                     <tr style="font-size: 12px;">
                                            <td>{{$invoice_data_list->invoice_id}}</td>
                                            <td>{{$invoice_data_list->class_name}}</td>
                                            <td>{{$invoice_data_list->student_roll}}</td>
                                            <td>{{$invoice_data_list->on_net_total}}</td>
                                            <td>{{$invoice_data_list->waber}}</td>
                                            <td>{{$invoice_data_list->waber_purpose}}</td>
                                            <td>{{$invoice_data_list->Payment}}</td>
                                             <td>{{$invoice_data_list->cash_status}}</td>
                                            <td>{{$invoice_data_list->invoice_creator}}</td>
                                            <td>{{$invoice_data_list->created_at}}</td>
                                            <td>{{$invoice_data_list->updated_at}}</td>
	                                         
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



