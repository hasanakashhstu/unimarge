@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Teacher')
@section('breadcrumbs','Student Dhasboard Teacher')
@section('student_dasboard_content')
<table class="table table-responsive " style="background: #fff;">
	 <tbody>
	  <tr style="background:#147F7F">
		<td class="text-center" colspan="2">
		 <span style="font-size:19px; color:#FFFFFF;"><b>Transport Information</b></span>
	    </td>
	  </tr>
	  </tbody>
	  </table>
    @if($transport_data_list)
  <table class="table table-bordered">
  <thead  class="thead-inverse"> 
    <tr>
      <th>Sl.No</th>
      <th>Route Name</th>
      <th>Transport Name</th>
      <th>Transport Color</th>
      <th>Transport Number</th>
      <th>Route Fare</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{1}}</th>
      <td>{{$transport_data_list->route_name}}</td>
      <td>{{$transport_data_list->name_transport}}</td>
      <td>{{$transport_data_list->transport_color}}</td>
      <td>{{$transport_data_list->number_of_transport }}</td>
      <td>{{$transport_data_list->route_fare}}</td>
    </tr>
  </tbody>
</table>
@else
 <center>
        <div class="alert alert-warning" style="margin: 114px;font-size: 15px;width: 795px">
           <strong>Warning!</strong> Sorry No Transport Asssigned For You.
        </div>
      </center>
@endif


@stop