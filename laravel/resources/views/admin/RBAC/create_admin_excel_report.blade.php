<!DOCTYPE HTML>
<html lang="en-US"><head>
  <meta charset="UTF-8">
  <title></title>
  

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
                            
                                   <tr class='report_class_background'>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      

                                  </tr>
                        
                                  @foreach($create_admin_data as $admin_data)
                                       <tr style="font-size: 12px;">
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
             <p class='p_tag_report' style='text-align:center'>Develop by : Codebool Software Company Ltd.<br>website : http://codebool.com<br>Contact No :01621370238</p>
      </div>

       

<!-- <script src="{{URL::asset('js/bootstrap.min.js')}}"></script> -->
</body></html>