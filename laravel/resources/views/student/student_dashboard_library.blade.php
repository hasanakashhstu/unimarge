@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Library')
@section('breadcrumbs','Student Dhasboard Library')
@section('student_dasboard_content')
   <table class="table table-responsive " style="background: #fff;">
     <tbody>
      <tr style="background:#147F7F">
      <td class="text-center" colspan="2">
       <span style="font-size:19px; color:#FFFFFF;"><b>Library Information</b></span>
        </td>
      </tr>
      </tbody>
    </table>
@if($membership_info)
    @if($membership_info->status=='Active')
      @if($student_data)	
      <table class="table table-bordered">
      <thead  class="thead-inverse"> 
        <tr>
          <th>Sl.No</th>
          <th>Article Id</th>
          <th>Article Name</th>
          <th>Issue Date</th>
          <th>Return Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
      @foreach($student_data as $key=>$student_data_value)
        <tr>
          <th scope="row">{{$key+1}}</th>
           <td>{{$student_data_value->article_id}}</td>
          <td>{{$student_data_value->article_name}}</td>

          <td>{{date('d-M-Y', strtotime($student_data_value->issue_date))}}</td>
          <td>{{date('d-M-Y', strtotime($student_data_value->return_date))}}</td>
          <td>
          @if($student_data_value->status=='Recived')
            <span style="color: green;">Returned</span>
          @else
           <span style="color: red;">{{$student_data_value->status}}</span>
          @endif

          </td>
         
        </tr>
        @endforeach

      </tbody>
    </table>
     @else
      <center>
        <div class="alert alert-warning" style="margin: 114px;font-size: 15px;width: 795px">
           <strong>Warning!</strong> Sorry No Book Issued. Please Contact With Librarian.
        </div>
      </center>
     @endif
	@else
     <center>
        <div class="alert alert-warning" style="margin: 114px;font-size: 15px;width: 795px">
           <strong>Warning!</strong> Your Membership Has Been Expired.Please Contact With Librarian.
        </div>
      </center>
  @endif
@else
  <center>
        <div class="alert alert-warning" style="margin: 114px;font-size: 15px;width: 795px">
           <strong>Warning!</strong> You Are Not Member.Please Contact With Librarian.
        </div>
      </center>
@endif
@stop
