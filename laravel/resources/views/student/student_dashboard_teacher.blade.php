@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Teacher')
@section('breadcrumbs','Student Dhasboard Teacher')
@section('student_dasboard_content')
<div class="container">
<div class="row">
<div class="tm-main uk-width-medium-3-4 uk-push-1-4" style="min-height: 1783px;">
         		
 <table class="table table-responsive " style="background: #fff; width: 1108px;margin-left: 17px;">
	 <tbody>
	  <tr style="background:#147F7F">
		<td class="text-center" colspan="2">
		 <span style="font-size:19px; color:#FFFFFF;"><b>Teacher Information</b></span>
	    </td>
	  </tr>
	  </tbody>
	  </table>
  <table class="table table-bordered"  style="width: 1037px;margin-left: 53px;">

	 <thead  class="thead-inverse"> 
	 <tr>
	 <td  class="text-center" colspan="2" style="background: #dfe6e9;">
	 	 <span style="font-size:12px; color:#2d3436;"><b>Teacher's Details</b></span>
	 </td>
	 </tr>
	 </thead>
	 	 <tbody>
		  @foreach($teacher_info as $teacher_information)
	  <tr>
         <?php
          if(file_exists("img/backend/student/$teacher_information->teacher_id.jpg"))
            {
               $teacher_image_path="img/backend/student/$teacher_information->roll.jpg";
            }
          else
            {
               $teacher_image_path="img/blankavatar.png";
            }
          ?>
         <td  style=" text-align:right" class="visible-lg visible-md visible-sm">	
           <img src="{{$teacher_image_path}}" style="height:110px; width:120px;">
         </td>
 
		 <td class="text-center" colspan="2">
          <table class="table-responsive">
	        <tbody>
		     <tr>
			    <td>Name:</td>
		        <td><a href="">{{$teacher_information->teacher_name}}</a></td>
		     </tr>	
		     <tr>
			    <td>Designation:</td>
			    <td>{{$teacher_information->work_department}}</td>
		     </tr>
		     <tr>
			    <td>Email:</td>
			    <td>{{$teacher_information->email}}</td>
		     </tr>
		     <tr>
			    <td>Phone:</td>
			    <td>{{$teacher_information->mobile_no}}</td>
		     </tr>
	        </tbody>
          </table>
	    </td>
      </tr>
      @endforeach  
     </tbody>
   </table>
  <div class="text-center"> {{ $teacher_info->links() }}</div>
</div>
</div>
</div>



	
@stop
