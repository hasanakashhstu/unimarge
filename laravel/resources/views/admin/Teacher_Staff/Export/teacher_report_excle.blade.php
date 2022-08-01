<!DOCTYPE HTML>
<html lang="en-US"><head>
  <meta charset="UTF-8">
  <title>Teacher's Report Excle</title>
  

</head><body class='body_for_report'>
      
      <div class='print_report'>
          <div class="container">
        
      <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>
    
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                                
                                   <tr style="background: aliceblue; font-size:11px;">
                                      <td><strong>Teacher Id</strong></td>
                                        <td><strong>Teacher Name</strong></td>
                                        <td><strong>Job Type</strong></td>
                                        <td><strong>Work Department</strong></td>
                                        <td><strong>Mobile No</strong></td>
                                        <td><strong>Email</strong></td>
                                    </tr>
                       
                                  @foreach($teacher_report_data as $teacher_report_list)
                                      <tr style="font-size: 12px;">
                                          <td>{{$teacher_report_list->teacher_id}}</td>
                                          <td>{{$teacher_report_list->teacher_name}}</td>
                                          <td>{{$teacher_report_list->job_type}}</td>
                                          <td>{{$teacher_report_list->work_department}}</td>
                                          <td>{{$teacher_report_list->mobile_no}} </td>
                                          <td>{{$teacher_report_list->email}} </td>
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
