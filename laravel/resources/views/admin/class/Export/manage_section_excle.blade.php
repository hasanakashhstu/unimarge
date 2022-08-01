<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Manage Section Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Manage Section Report<hr style="width: 100px; margin-left:266px; "></h5>
	                    @foreach($groupby_class as $groupby_class_info)
                      <h4 style="font-size: 14px; text-align: center;">{{$groupby_class_info->class}}</h4>
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                              
                                   <tr class='report_class_background' >
                                        <td>Id</td>
                                        <td>Section Name </td>
                                        <td>Nick Name</td>
                                       <td>Teacher</td>
                                 </tr>
                                      @foreach($section_list as $section_list_data)
                    
                                    @if($groupby_class_info->class==$section_list_data->class)
                                  <tr class="gradeX" style=" font-size:10px;">
                                        <td>{{$section_list_data->id}}</td>
                                        <td>{{$section_list_data->section_name}}</td>
                                        <td>{{$section_list_data->nick_name}}</td>
                                       <td>{{$section_list_data->teacher}}</td>
                                   </tr>
                                    @endif
                                   @endforeach  
	                               
                         		</table>
                       		</div>
                  	</div>
                      @endforeach
             </div>
              <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
             <p class='p_tag_report' style='text-align:center'>Develop by : TMSS ICT Ltd.<br>website : https://tmss-ict.com/<br>Contact No : 880-2-55073530</p>
      </div>

       

<!-- <script src="{{URL::asset('js/bootstrap.min.js')}}"></script> -->
</body></html>

