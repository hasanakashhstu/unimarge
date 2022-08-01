@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Subject')
@section('breadcrumbs','Student Dhasboard Subject')
@section('student_dasboard_content')
<div class="container">
<div class="row">
<div class="tm-main uk-width-medium-3-4 uk-push-1-4" style="min-height: 1783px;">

 <table class="table table-responsive " style="background: #fff; width: 1108px;margin-left: 17px;">
	 <tbody>
	  <tr style="background:#147F7F">
		<td class="text-center" colspan="2">
		 <span style="font-size:19px; color:#FFFFFF;"><b>Subject Information</b></span>
	    </td>
	  </tr>
	  </tbody>
	  </table>
  <table class="table table-bordered"  style="width: 1037px;margin-left: 53px;>
  <thead  class="thead-inverse"> 
    <tr>
      <th>Sl.No</th>
      <th>Subject Name</th>
      <th>Teacher Name</th>
      <th>Subject Mark</th>
      <th>Subject Credit</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
  ?>
  @foreach($subject_data as $subject_data_list)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$subject_data_list->subject_name}}</td>
      <td>{{$subject_data_list->teacher}}</td>
      <td>{{$subject_data_list->subject_mark}}</td>
      <td>{{$subject_data_list->subject_credit}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
</div>
</div>
@stop