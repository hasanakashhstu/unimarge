@extends('admin.index')
@section('Title','membership')
@section('breadcrumbs','membership')
@section('breadcrumbs_link','/membership')
@section('breadcrumbs_title','membership')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <h2>
 <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp; Add Membership
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Add Membership
  </p><br/>

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/templet_article'><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Templete Article</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
           
         </ul>
      </div>
    </div>

  <!-- Transport Details -->
  <div class="panel panel-default text-right" >
    <div class="panel-body">
      <ul class='dropdown_test' data-toggle="modal" data-target="#myModal" >
        <li>
          <a href='#'>
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Membership
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="tab-content">
  <br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/membership_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/membership_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/membership_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

<ul class="nav nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#home">
        <i class="fa fa-bars" aria-hidden="true"></i> Student Membership List
      </a>
    </li>
    <li>
      <a data-toggle="tab" href="#menu1">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>Teacher Membership List
      </a>
    </li>


  </ul>

    <!--new add form-->
    <div class="modal fade" id="myModal" role="dialog" style="margin-left: -5%;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
            <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> Add New Membership Info
            </h4>
          </div>
          <div class="modal-body">
            <div class="widget-content padding">
              {{Form::open(['url'=>'/membership','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

              <div class="control-group">
                 {{Form::label('type','Type',['class'=>'control-label','title'=>'type'])}}
                
                  <div class="controls">
                      {{Form::select('type',['Student'=>'Student','Teacher'=>'Teacher'],null,['id'=>'type','title'=>'type','class'=>'type'])}}
                      <div>
                      </div>
                  
                  </div>
                </div>
          <div class="student_type">
               <div class="control-group">
                 {{Form::label('roll_number','Roll Number',['class'=>'control-label','title'=>'roll_number'])}}
                
                  <div class="controls">
                      {{Form::text('roll_number','',['id'=>'roll_number','placeholder'=>'Roll Number','title'=>'roll_number'])}}
                      <div>
                      <span id="available"></span>
                      </div>
                  
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
                  <div class="controls">
                   {{Form::text('member_name','',['id'=>'member_name','placeholder'=>'Member Name','title'=>'member_name','readonly'=>'readonly'])}}
                  </div>
                </div>
               
                <div class="control-group">
                 {{Form::label('reg_number','Registration Number',['class'=>'control-label','title'=>'reg_numbe'])}}
                 
                  <div class="controls">
                      {{Form::text('reg_number','',['id'=>'reg_number','placeholder'=>'Registration Number','title'=>'reg_number','readonly'=>'readonly'])}}
                  </div>
                </div>
								<div class="control-group">
                 {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
									<div class="controls">
                          {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'])}}
										</select>
									</div>
								</div>
                <div class="control-group">
                 {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                  <div class="controls">
                      {{Form::text('email','',['id'=>'email','placeholder'=>'Email','title'=>'email','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                  
                  <div class="controls">
                      {{Form::text('phone','',['id'=>'phone','placeholder'=>'Phone','title'=>'phone','readonly'=>'readonly'])}}
                  </div>
                </div>
            </div>


            <div class="teacher_type" style="display: none;">
               <div class="control-group">
                 {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
                
                  <div class="controls">
                      {{Form::text('teacher_id','',['id'=>'teacher_id','placeholder'=>'Teacher Id','title'=>'teacher_id'])}}
                      <div>
                      <span id="teacher_available"></span>
                      </div>
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('teacher_name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
                  <div class="controls">
                   {{Form::text('teacher_name','',['id'=>'teacher_name','placeholder'=>'Teacher Name','title'=>'teacher_name','readonly'=>'readonly'])}}
                  </div>
                </div>
               
                <div class="control-group">
                 {{Form::label('teacher_phone','Phone Number',['class'=>'control-label','title'=>'teacher_phone'])}}
                 
                  <div class="controls">
                      {{Form::text('teacher_phone','',['id'=>'teacher_phone','placeholder'=>'Phone Number','title'=>'teacher_phone','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('teacher_email','Teacher Email',['class'=>'control-label','title'=>'teacher_email'])}}
                  <div class="controls">
                      {{Form::text('teacher_email','',['id'=>'teacher_email','placeholder'=>'Email','title'=>'teacher_email','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                  <div class="controls">
                          {{Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'])}}
                    </select>
                  </div>
                </div>
            </div>

                <div class="control-group">
                 {{Form::label('from_date','From Date',['class'=>'control-label','title'=>'from_date'])}}
                  <div class="controls">
                      {{Form::date('from_date','',['id'=>'required','placeholder'=>'From Date','title'=>'from_date'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('to_date','To Date',['class'=>'control-label','title'=>'to_date'])}}     
                  <div class="controls">
                   {{Form::date('to_date','',['id'=>'required','placeholder'=>'To Date','title'=>'to_date'])}}
                    
                  </div>
                </div>
                </div>
            </div>
          <div class="modal-footer">
             {{Form::submit('Submit',['value'=>'Submit','id'=>'submit','class'=>'btn btn-success','style'=>'float:left;'])}}
            <button type="button" class="btn btn-default" data-dismiss="modal">Close
            </button>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-th">
              </i>
            </span>
            <h5>Student Membership Data Table
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
               <tr>
                  <th>Member Name</th>
                  <th>Roll Number</th>
                  <th>Registration Number</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Phone </th>
                  <th>From Date </th>
                 <th>To Date </th>
                  <th>Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($library_student_data as $library_student_data_value)
                <tr class="gradeX">
                  <td>{{$library_student_data_value->member_name}}</td>
                  <td>{{$library_student_data_value->roll_number}}</td>
                  <td>{{$library_student_data_value->reg_number}}</td>
                  <td>{{$library_student_data_value->status}}</td>
                  <td>{{$library_student_data_value->email}}</td>
                  <td>{{$library_student_data_value->phone}}</td>
                  <td>{{$library_student_data_value->from_date}}</td>
                  <td>{{$library_student_data_value->to_date}}</td>
                  
                     <td id="my_align" class="display_status">
               
                            {{Form::open(['url'=>"/membership/$library_student_data_value->member_id/edit",'method'=>'GET'])}}
                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                            {{Form::close()}}
                            {{Form::open(['url'=>"/membership/$library_student_data_value->member_id" ,'method'=>'DELETE'])}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                            {{Form::close()}}
      
                    
                  </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>


        <div id="menu1" class="tab-pane fade">
            <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-th">
              </i>
            </span>
            <h5>Teacher Membership Data Table
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
               <tr>
                  <th>Teacher Name</th>
                  <th>Teacher Id</th>
                  <th>Status</th>
                  <th>Email</th>
                  <th>Phone </th>
                  <th>From Date </th>
                 <th>To Date </th>
                  <th>Action </th>
                </tr>
              </thead>
              <tbody>
                @foreach($library_teacher_data as $library_teacher_data_value)
                <tr class="gradeX">
                  <td>{{$library_teacher_data_value->teacher_name}}</td>
                  <td>{{$library_teacher_data_value->teacher_id}}</td>
                  <td>{{$library_teacher_data_value->status}}</td>
                  <td>{{$library_teacher_data_value->teacher_email}}</td>
                  <td>{{$library_teacher_data_value->teacher_phone}}</td>
                  <td>{{$library_teacher_data_value->from_date}}</td>
                  <td>{{$library_teacher_data_value->to_date}}</td>
                  
                     <td id="my_align" class="display_status">
               
                            {{Form::open(['url'=>"/membership/$library_teacher_data_value->member_id/edit",'method'=>'GET'])}}
                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                            {{Form::close()}}
                            {{Form::open(['url'=>"/membership/$library_teacher_data_value->member_id" ,'method'=>'DELETE'])}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                            {{Form::close()}}
      
                    
                  </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        </div>
        </div>
  </div>
  <!--end of the new add form-->
  <!-- Transport List Report  -->
  {{-- <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Applicant Member Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
           <tr>
              <th>Member Name</th>
              <th>Roll Number</th>
              <th>Registration Number</th>
              <th>Status</th>
              <th>Email</th>
              <th>Phone </th>
              <th>From Date </th>
             <th>To Date </th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
            @foreach($membership_data as $membership_information)
            <tr class="gradeX">
              <td>{{$membership_information->member_name}}</td>
              <td>{{$membership_information->roll_number}}</td>
              <td>{{$membership_information->reg_number}}</td>
              <td>{{$membership_information->status}}</td>
              <td>{{$membership_information->email}}</td>
              <td>{{$membership_information->phone}}</td>
              <td>{{$membership_information->from_date}}</td>
              <td>{{$membership_information->to_date}}</td>
              
                 <td id="my_align" class="display_status">
           
                        {{Form::open(['url'=>"/membership/$membership_information->member_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/membership/$membership_information->member_id" ,'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                        {{Form::close()}}
  
                
              </td>
            </tr>
             @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div> --}}
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/membership_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
 <script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#roll_number").unbind().keyup(function()
     {
          
         var student_roll=$("#roll_number").val();
        
          
         $.ajax({
            url: '/student_data_get',
            type: "post",
            data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
            success: function(data){
               if(data)
               {

                     $('#member_name').val(data.student_name);
                     $('#reg_number').val(data.reg_number);
                     $('#email').val(data.email);
                     $('#phone').val(data.phone);

                  $('#available').html("<font color='green'>This roll Student is exit</font>");
                  $("#submit").prop('disabled', false);
               }
                else
              { 
                 $('#member_name').val('');
                 $('#reg_number').val('');
                 $('#email').val('');
                 $('#phone').val('');
                 $('#available').html("<font color='red'>This roll student is not exit</font>");
                 $("#submit").attr("disabled","disabled");
               
              }
            }
          });
    });

    $("#teacher_id").unbind().keyup(function(){
       var teacher_id=$(this).val();
       $.ajax({
            url: '/teacher_data_get_for_library',
            type: "post",
            data: {'teacher_id':teacher_id,'_token': $('input[name=_token]').val()},
            success: function(response){
              if(response)
              {
                $("#teacher_name").val(response.teacher_name);
                $("#teacher_phone").val(response.mobile_no);
                $("#teacher_email").val(response.email);
                $("#teacher_available").html("<font color='green'>Teacher Information Found</font>");
                  $("#submit").prop('disabled', false);
              }
              else
              {


                $("#teacher_name").val('');
                $("#teacher_phone").val('');
                $("#teacher_email").val('');
                $("#teacher_available").html("<font color='red'>Teacher Doesn't Exists</font>");
                 $("#submit").attr("disabled","disabled");
              }
            }
          });

    });

    $(".type").change(function(){
        var type=$(this).val();
        if(type=="Student")
        {
           $(".teacher_type").hide();
           $(".student_type").show();
        }
        else
        {
           $(".student_type").hide();
           $(".teacher_type").show();
        }
    });
       
       
  
});
</script>
@stop
