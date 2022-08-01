<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Article Issue Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Article Issue Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                               
                                   <tr class='report_class_background' >
                                       <th>Article Issue Id</th>
                                        <th>Article Name</th>
                                        <th>Article Code</th>
                                        <th>Member Roll</th>
                                        <th>Member Registration</th>
                                        <th>Member Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>E Mail</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Total Days</th>
                                 </tr>

                                  
                                    @foreach($article_issue_info as $article_issue_data)
                                  <tr class="gradeX" style=" font-size:10px;">
                                          <td>{{$article_issue_data->article_issue_id}}</td>
                                           <td>{{$article_issue_data->article_name}}</td>
                                           <td>{{$article_issue_data->article_id}}</td>
                                           <td>{{$article_issue_data->member_roll}}</td>
                                           <td>{{$article_issue_data->member_reg}}</td>
                                           <td>{{$article_issue_data->member_name}}</td>
                                           <td>{{$article_issue_data->issue_date}}</td>
                                           <td>{{$article_issue_data->return_date}}</td>
                                           <td>{{$article_issue_data->e_mail}}</td>
                                           <td>{{$article_issue_data->phone}}</td>
                                            <td>{{$article_issue_data->status}}</td>
                                           <td>{{$article_issue_data->total_day}}</td>
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

