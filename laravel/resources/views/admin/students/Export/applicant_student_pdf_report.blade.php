<!DOCTYPE HTML>
<html lang="en-US"><head>
  <meta charset="UTF-8">
  <title>Applicant Student Information</title>

<style>
  

  .p_tag_report{font-size: 12px;margin-top: 30px}
</style>
</head><body class='body_for_report'>
      <div class='print_report'>
          <div class="container">
             <img src="img/logo.png" alt="Company Logo" style='background: currentColor;height: 110px;width: 100px;' height="120" width="120"/>
      <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>


                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                                
                                   <tr style="background: aliceblue; font-size: 12px" class='report_class_background'>
                                      
                                      <td>Applicant ID</td>
                                      <td style="width: 15%">Student Name</td>
                                      
                                      <td>session</td>
                                      <td>class</td>
                                      <td>Department</td>
                                      
                                      <td>Phone</td>
                                      <td>Email</td>
                                      <td>Applicant Date</td>
                                      

                                  </tr>
                             
                                  @foreach($applicant_student as $applicant_student_list)
                                       <tr style="font-size: 10px;">
                                        
                                        <td>{{$applicant_student_list->applicant_id}}</td>
                                        <td>{{$applicant_student_list->student_name}}</td>
                                       
                                        <td>{{$applicant_student_list->session}}</td>
                                        <td>{{$applicant_student_list->class}}</td>
                                        <td>{{$applicant_student_list->department}}</td>
                                        
                                        <td>{{$applicant_student_list->phone}}</td>
                                        <td>{{$applicant_student_list->email}}</td>
                                        <td>{{$applicant_student_list->created_at}}</td>
                                           
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





















