@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Exam')
@section('breadcrumbs','Student Dhasboard Exam')
@section('student_dasboard_content')
 <table class="table table-responsive " style="background: #fff;">
	 <tbody>
	  <tr style="background:#147F7F">
		<td class="text-center" colspan="2">
		 <span style="font-size:19px; color:#FFFFFF;"><b>Exam Information</b></span>
	    </td>
	  </tr>
	  </tbody>
	  </table>
  <table class="table table-bordered">
  <thead  class="thead-inverse"> 
    <tr>
      <th>Sl.No</th>
      <th>Exam Name</th>
      <th>Controller</th>
      <th>Exam Start Date</th>
      <th>Exam End Dates</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    ?>
    @foreach($exam_list as $exam_data_list)
     <tr>
       <td>{{$i++}}</td>
       <td>{{$exam_data_list->exam_name}}</td>
       <td>{{$exam_data_list->teacher_name}}</td>
       <td>{{date('d-M-Y', strtotime($exam_data_list->exam_start_date))}}</td>
       <td>{{date('d-M-Y', strtotime($exam_data_list->exam_end_date))}}</td>
     </tr>
     @endforeach
  </tbody>
</table>
@stop