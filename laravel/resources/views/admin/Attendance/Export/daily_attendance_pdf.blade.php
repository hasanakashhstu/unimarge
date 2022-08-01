
<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Daily Attendance Report</title>
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

              <h5 style="text-align: center;">Daily Attendance Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                        
                            <div class="tab-content"> 
					          <div id="home" class="tab-pane fade in active">
					              <div class="widget-box">
					                 <div class="widget-title"> 
					                   <span class="icon"><i class="icon-th"></i></span>
					                    <h5>Student Attendance </h5>
					                 </div>
					                <div class="student_attendence_data_table"></div>
					                   <table class="table table-bordered data-table">
						                <thead>
						                   <tr>
						                     <th>Student Name</th>
						                     <th>Roll</th>
						                     <th class="date">Date</th>     
						                   </tr>
						                </thead>
						               <tbody>
						                    <tr>
						                       <td>okk</td>
						                       <td>okk</td>
						                       <td>okk<input type="checkbox" checked/></td>
						                       <td>okk<input type="checkbox"/></td>
						                     </tr>
						                </tbody>
						           </table>
					                </div>
					            </div>
					        </div>
                          
                       	</div>
                  	
             </div>
             <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
             <p class='p_tag_report' style='text-align:center'>Develop by : TMSS ICT Ltd.<br>website : https://tmss-ict.com/<br>Contact No : 880-2-55073530</p>
      </div>

       


</body></html>



