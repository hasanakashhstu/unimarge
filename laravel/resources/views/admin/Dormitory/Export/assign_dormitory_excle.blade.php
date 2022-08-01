<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Assign Dormitory Excle</title>
	

</head><body class='body_for_report'>
      
      <div class='print_report'>
      		<div class="container">
	      
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
      <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

                   <h5 style="text-align: center;">Assign Dormitory Report<hr style="width: 100px; margin-left:266px; "></h5>
	  
                     <div class="col-sm-12">
                         <div class="panel-body">
                             <table>
                               
                                   <tr class='report_class_background' >
                                   <th>Id<th>
                                    <th> Title</th>
                                   <th>Student Name</th>
                                   <th>Student Roll</th>
                                   <th> Department</th>
                                   <th>Semester</th>                            
                                     <th>Dormitory No</th>
                                   <th>Dormitory Name</th>
                                   <th>Room Number </th>
                                   <th>Description</th>
                       
                                 </tr>

                                  
                                   @foreach($assign_dormitory_data as $assign_dormitory_information)
                                  <tr class="gradeX" style=" font-size:10px;">
                                  <td>{{$assign_dormitory_information->assign_dormitory_id}}</td>
                                    <td>{{$assign_dormitory_information->title}}</td>
                                    <td>{{$assign_dormitory_information->student_name}}</td>
                                    <td>{{$assign_dormitory_information->student_roll}}</td>
                                    <td>{{$assign_dormitory_information->department}}</td>
                                    <td>{{$assign_dormitory_information->semester}}</td>
                                    <td>{{$assign_dormitory_information->dormitory_no}}</td>
                                     <td>{{$assign_dormitory_information->dormitory_name}}</td>
                                    <td>{{$assign_dormitory_information->room_number}}</td>
                                    <td>{{$assign_dormitory_information->description}}</td>
                      
                     
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

