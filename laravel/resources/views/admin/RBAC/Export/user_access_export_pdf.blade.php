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
             <img src="img/logo.png" alt="Company Logo" style='background: currentColor;height: 132px;width: 100px;' height="120" width="120"/>
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
                                      <td>User Name</td>
                                      <td>Role Name</td>
                                    </tr>
                         
                                  @foreach($user_access as $user_access_data_info)
 @php $user_name=DB::table('users')->where('id',$user_access_data_info->user_id)->first(); @endphp
@php $role_name=DB::table('roles')->where('id',$user_access_data_info->role_id)->first(); @endphp
                                       <tr style="font-size: 12px;">
                                           <td>{{$user_name->id}}</td>
                                           <td>{{$user_name->email}}</td>
                                           <td>{{$role_name->display_name}}</td>
                                           
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

