<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Libray Article Issue Report</title>
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

              <h5 style="text-align: center;">Apprisal Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                            
                                  <tr style="background: aliceblue; font-size:11px;">
                                    <th>Apprisal Type</th>
                                    <th>Apprisal Name</th>
                                    <th>Apprisal template</th>
                                   
                                    <th>Remark</th>
                                    
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Converted</th>
                                    <th>Total Score</th>
                                    
                                  </tr>
                              
                              @foreach($apprisals as $apprisal)
                      <tr style="font-size:11px;" class="gradeX">
                        <td>{{$apprisal->apprisal_type}}</td>
                        @php
                        if($apprisal->apprisal_name)
                        {

                               if($apprisal->apprisal_type=="Student")
                              {
                                $apprisal_person_name=DB::table('students')->where('roll',$apprisal->apprisal_name)->first();
                              }
                              else
                              {
                                $apprisal_person_name=DB::table('teacher')->where('teacher_id',$apprisal->apprisal_name)->first();

                              }


                        }
                       
                        
                        @endphp
                        <td>
                        @php
                        if($apprisal->apprisal_name)
                        {
                          if($apprisal->apprisal_type=="Student")
                          {
                            echo $apprisal_person_name->student_name;
                          }
                          else
                          {
                            echo $apprisal_person_name->teacher_name;

                          }
                      }
                        
                        @endphp</td>
                        <td>

                           @php
                       
                          $apprisal_person_name=DB::table('apprisal_template')->where('template_id',$apprisal->apprisal_template)->first();

                        @endphp
                        {{$apprisal_person_name->title}}</td>
                        
                         <td>{{$apprisal->remarks}}</td>
                         
                         <td>{{$apprisal->start_date}}</td>
                         <td>{{$apprisal->end_date}}</td>
                         <td>{{$apprisal->convert}}</td>
                         <td>{{$apprisal->apprisals}}</td>
                        
                      </tr>
                       @endforeach
                    </tbody>
                         		</table>
                       		</div>
                  	</div>
             </div>
             <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
             <p class='p_tag_report' style='text-align:center'>Develop by : TMSS ICT Ltd.<br>website : https://tmss-ict.com/<br>Contact No : 880-2-55073530</p>
      </div>

       


</body></html>



