<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Expense Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Expense Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                                   <tr class='report_class_background' >
                                        <th>Status</th>
                                       <th>Title</th>
                                       <th>Journal Type</th>
                                       <th>Asset Account</th>
                                       <th>Expense Account</th>
                                       <th>Amount Method</th>
                                       <th>Bank Name</th>
                                       <th>cheque No</th>
                                       <th>Transaction Date</th>
                                       <th>Amount</th>
                                        <th>Party Name</th>
                                       </tr>

                                 @foreach($expense_info as $expense_information)
                                  <tr class="gradeX" style=" font-size:10px;">
	                                         <td>{{$expense_information->status}}</td>
                                             <td>{{$expense_information->journal_title}}</td>
                                             <td>{{$expense_information->journal_type}}</td>
                                             <td>{{$expense_information->asset_account}}</td>
                                             <td>{{$expense_information->expense_account}}</td>
                                             <td>{{$expense_information->amount_method}}</td>
                                             <td>{{$expense_information->bank_name}}</td>
                                             <td>{{$expense_information->cheque_no}}</td>
                                             <td>{{$expense_information->created_at}}</td>
                                             @php
                                               $amount_info=DB::table('expense_child')->where('expense_id',$expense_information->expense_id)->first();

                                                @endphp
                                            <td>{{$amount_info->amount}}</td>
                                            <td>{{$amount_info->allocate_amount}}</td>
                                            <td>{{$amount_info->party_name}}</td>
                                            <td>{{$expense_information->remark}}</td>
	
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

