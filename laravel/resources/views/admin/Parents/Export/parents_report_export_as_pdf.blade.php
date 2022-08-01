<!DOCTYPE HTML>
<html lang="en-US"><head>
  <meta charset="UTF-8">
  <title>Parents's Report </title>
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

                      <h5 style="text-align: center;">Parent's Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                            
                                   <tr style="background: aliceblue; font-size:11px; text-align: left;">
                                      
                                      <td>Name</td>
                                      <td>Email</td>
                                      <td>Phone</td>
                                      <td>Gender</td>
                                      <td>Profession</td>
                                      <!-- <td>Monthly Salary</td>
                                      <td>Anual Salary</td> -->
                                    </tr>
                      
                                @foreach($parents_info as $parents_info_list)
                                       <tr style="font-size: 10px;">
                                         
                                           <td>{{$parents_info_list->name}}</td>
                                           <td>{{$parents_info_list->email}}</td>
                                           <td>{{$parents_info_list->phone}}</td>
                                           <td>{{$parents_info_list->gender}}</td>
                                           <td>{{$parents_info_list->profession}}</td>
                                           <!-- <td>{{$parents_info_list->monthly_salary}}</td>
                                           <td>{{$parents_info_list->anual_salary}}</td> -->
                                           
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






