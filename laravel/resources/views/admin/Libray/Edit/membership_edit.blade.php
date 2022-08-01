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
        <ul  style='list-style:none'>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <h2>
   <i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Membership Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Member Info Edit
  </p>
  <!-- Transport Details -->
   <div class="alert alert-info" style="margin-top: 2%;" >
      <strong>Warning!</strong> <br>You Can Update Only From Date and To Date
    </div>

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i>&nbsp; Manage Article</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
            <li><a href='/article_recive'><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Article Recive</a></li>
             <li><a href='/membership'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/membership_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/membership_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/membership_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>{{$membership_data->member_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
           {{Form::open(['url'=>"/membership/$membership_data->member_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
                 @if($membership_data->type=="Student")
                 <div class="control-group">
                 {{Form::label('roll_number','Roll Number',['class'=>'control-label','title'=>'roll_number'])}}
                  <div class="controls">
                      {{Form::text('roll_number',$membership_data->roll_number,['id'=>'roll_number','placeholder'=>'Roll Number','title'=>'roll_number','readonly'=>'readonly'])}}
                  <div>
                  <span id="available"></span>
                
                  </div>
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
                  <div class="controls">
                   {{Form::text('member_name',$membership_data->member_name,['id'=>'member_name','placeholder'=>'Member Name','title'=>'member_name','readonly'=>'readonly'])}}
                  </div>
                </div>
               
                <div class="control-group">
                 {{Form::label('reg_number','Registration Number',['class'=>'control-label','title'=>'reg_number'])}}
                 
                  <div class="controls">
                      {{Form::text('reg_number',$membership_data->reg_number,['id'=>'reg_number','placeholder'=>'Member LastName','title'=>'reg_number','readonly'=>'readonly'])}}
                  </div>
                </div>
                  <div class="control-group">
                 {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                  <div class="controls">
                      {{Form::text('email',$membership_data->email,['id'=>'email','placeholder'=>'Email','title'=>'email','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
                  
                  <div class="controls">
                      {{Form::text('phone',$membership_data->phone,['id'=>'phone','placeholder'=>'Phone','title'=>'phone','readonly'=>'readonly'])}}
                  </div>
                </div>
                @else
                  <div class="control-group">
                 {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
                
                  <div class="controls">
                      {{Form::text('teacher_id',$membership_data->teacher_id,['id'=>'teacher_id','placeholder'=>'Teacher Id','title'=>'teacher_id','readonly'=>'readonly'])}}
                      <div>
                      <span id="teacher_available"></span>
                      </div>
                  </div>
                </div>
                <div class="control-group">
                  {{Form::label('teacher_name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
                  <div class="controls">
                   {{Form::text('teacher_name',$membership_data->teacher_name,['id'=>'teacher_name','placeholder'=>'Teacher Name','title'=>'teacher_name','readonly'=>'readonly'])}}
                  </div>
                </div>
               
                <div class="control-group">
                 {{Form::label('teacher_phone','Phone Number',['class'=>'control-label','title'=>'teacher_phone'])}}
                 
                  <div class="controls">
                      {{Form::text('teacher_phone',$membership_data->teacher_phone,['id'=>'teacher_phone','placeholder'=>'Phone Number','title'=>'teacher_phone','readonly'=>'readonly'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('teacher_email','Teacher Email',['class'=>'control-label','title'=>'teacher_email'])}}
                  <div class="controls">
                      {{Form::text('teacher_email',$membership_data->teacher_email,['id'=>'teacher_email','placeholder'=>'Email','title'=>'teacher_email','readonly'=>'readonly'])}}
                  </div>
                </div>
                @endif
                <div class="control-group">
                 {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                  <div class="controls">
                          {{Form::select('status', [$membership_data->status=>$membership_data->status,'Active' => 'Active', 'Inactive' => 'Inactive'])}}
                    </select>
                  </div>
                </div>
              
                <div class="control-group">
                 {{Form::label('from_date','From Date',['class'=>'control-label','title'=>'from_date'])}}
                  <div class="controls">
                      {{Form::date('from_date',$membership_data->from_date,['id'=>'from_date','placeholder'=>'From Date','title'=>'from_date'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('to_date','To Date',['class'=>'control-label','title'=>'to_date'])}}     
                  <div class="controls">
                   {{Form::date('to_date',$membership_data->to_date,['id'=>'to_date','placeholder'=>'To Date','title'=>'to_date'])}}
                    
                  </div>
                </div>
                </div>
          <div class="modal-footer">
             {{Form::submit('Submit',['value'=>'Submit','id'=>'submit','class'=>'btn btn-success','style'=>'float:left;'])}}
            </div>
            {{Form::close()}}
          </div>
           </div>
          </div>
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
              $('#member_name').val(data.student_name);
               $('#reg_number').val(data.reg_number);
               
               $('#email').val(data.email);
               $('#phone').val(data.phone);
               if(data)
               {
                $('#available').html("<font color='green'>This roll Student is exit</font>");
                  $("#submit").prop('disabled', false);
               }
                else
              {
                 $('#available').html("<font color='red'>This roll student is not exit</font>");
                 $("#submit").attr("disabled","disabled");
               
              }
            }
          });
    });
       
       
  
});
</script>

@stop