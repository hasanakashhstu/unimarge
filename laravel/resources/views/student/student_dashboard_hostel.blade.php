@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Teacher')
@section('breadcrumbs','Student Dhasboard Teacher')
@section('student_dasboard_content')
 <table class="table table-responsive " style="background: #fff;">
	 <tbody>
	  <tr style="background:#147F7F">
		<td class="text-center" colspan="2">
		 <span style="font-size:19px; color:#FFFFFF;"><b>Hostel Information</b></span>
	    </td>
	  </tr>
	  </tbody>
	  </table>
    @if($student_hostel_data)
  <table class="table table-bordered">
  <thead  class="thead-inverse"> 
    <tr>
      <th>Sl.No</th>
      <th>Student Roll</th>
      <th>Dormitory No</th>
      <th>Dormitory Name</th>
      <th>Room Number</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
     <tr>
       <td>{{1}}</td>
       <td>{{$student_hostel_data->student_roll}}</td>
       <td>{{$student_hostel_data->dormitory_no}}</td>
       <td>{{$student_hostel_data->dormitory_name}}</td>
       <td>{{$student_hostel_data->room_number}}</td>
       <td>{{$student_hostel_data->description}}</td>
     </tr>
  </tbody>
</table>
@else
 <center>
        <div class="alert alert-warning" style="margin: 114px;font-size: 15px;width: 795px">
           <strong>Warning!</strong> Sorry You Are Not Hostel Member.
        </div>
      </center>
@endif
@stop