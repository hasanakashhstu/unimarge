
@extends('admin.index')
@section('Title','Article Issue')
@section('breadcrumbs','Article Issue')
@section('breadcrumbs_link','/article_issue')
@section('breadcrumbs_title','article_issue')

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
    <i class="fa fa-check-square-o" aria-hidden="true">
    </i>  &nbsp;Book Issue Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Book Issue Edit
  </p><br/>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
            <li><a href='/membership'> <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
             <li><a href='/article_issue'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_issue_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_issue_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_issue_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$article_issue_info->article_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
    {{Form::open(['url'=>"/article_issue/$article_issue_info->article_issue_id",'class'=>'form-horizontal','method'=>'put','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
            
             <div class="control-group">
             {{Form::label('article_id','Accession Code',['class'=>'control-label','title'=>'article_id'])}}
              <div class="controls">

                 {{Form::text('article_id',$article_issue_info->article_id,['id'=>'article_id','placeholder'=>'Article Id','title'=>'article_id','readonly'=>'readonly'])}}
                <div>
                  <span id="available"></span>
                  <span id="not_available"></span>
                  </div>
              </div>
            </div>
            <div class="control-group">
              {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              <div class="controls">
              
                {{Form::text('article_name',$article_issue_info->article_name,['id'=>'article_name','placeholder'=>'Article Name','title'=>'article_name','readonly'=>'readonly'])}}
                
              </div>
            </div>
            @if($article_issue_info->type=="Student")
            <div class="control-group">
             {{Form::label('member_roll','Member Roll',['class'=>'control-label','title'=>'member_roll'])}}
              <div class="controls">

                 {{Form::text('member_roll',$article_issue_info->member_roll,['id'=>'required','placeholder'=>'Member Roll','class'=>'student_roll','title'=>'member_roll'])}}
                <div>
                  <span id="status"></span>
                  </div>
              </div>
           
            </div>
            
           
            <div class="control-group">
             {{Form::label('member_reg','Member Registration',['class'=>'control-label','title'=>'member_reg'])}}
              
              <div class="controls">
               {{Form::text('member_reg',$article_issue_info->member_reg,['id'=>'required','placeholder'=>'Member Registration','class'=>'student_reg','title'=>'member_reg'])}}
               
              </div>
            </div>
            <div class="control-group">
               {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
              <div class="controls">
              {{Form::text('member_name',$article_issue_info->member_name,['id'=>'required','placeholder'=>'Member Name','class'=>'student_name','title'=>'member_name'])}}
              </div>
            </div>

            <div class="control-group">
               {{Form::label('e_mail','E-mail',['class'=>'control-label','title'=>'e_mail'])}}
              
              <div class="controls">
                {{Form::text('e_mail',$article_issue_info->e_mail,['id'=>'required','placeholder'=>'E-mail','class'=>'student_email','title'=>'e_mail'])}}
                
              </div>
            </div>
             <div class="control-group">
             {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
             
              <div class="controls">
              {{Form::text('phone',$article_issue_info->phone,['id'=>'required','placeholder'=>'Phone','class'=>'student_phone','title'=>'phone'])}}
               
              </div>
            </div>
            @else

               <div class="control-group">
             {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
              <div class="controls">

                 {{Form::text('teacher_id',$article_issue_info->teacher_id,['id'=>'required','placeholder'=>'Teacher Id','class'=>'teacher_id','title'=>'teacher_id','readonly'=>'readonly'])}}
                 <div>

                  <span id="teacher_status"></span>
                  </div>
              </div>

            </div>

            <div class="control-group">
               {{Form::label('teacher_name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
              <div class="controls">
              {{Form::text('teacher_name',$article_issue_info->teacher_name,['id'=>'required','placeholder'=>'Teacher Name','class'=>'teacher_name','title'=>'teacher_name','readonly'=>'readonly'])}}
              </div>
            </div>

              <div class="control-group">
               {{Form::label('teacher_email','E-mail',['class'=>'control-label','title'=>'teacher_email'])}}

              <div class="controls">
                {{Form::text('teacher_email',$article_issue_info->teacher_email,['id'=>'required','placeholder'=>'E-mail','class'=>'teacher_email','title'=>'teacher_email','readonly'=>'readonly'])}}

              </div>
            </div>
             <div class="control-group">
             {{Form::label('teacher_phone','Phone',['class'=>'control-label','title'=>'teacher_phone'])}}

              <div class="controls">
              {{Form::text('teacher_phone',$article_issue_info->teacher_phone,['id'=>'required','placeholder'=>'Phone','class'=>'teacher_phone','title'=>'phone','readonly'=>'readonly'])}}

              </div>
            </div>

            @endif

            <div class="control-group">
              {{Form::label('issue_date','Issue From Date',['class'=>'control-label','title'=>'issue_date'])}}
              <div class="controls">
                {{Form::date('issue_date',$article_issue_info->issue_date,['id'=>'required','placeholder'=>'Issue From Date','title'=>'issue_date'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('return_date','Article Return Date',['class'=>'control-label','title'=>'return_date'])}}

              <div class="controls">
                {{Form::date('return_date',$article_issue_info->return_date,['id'=>'required','placeholder'=>'Article Return Date','title'=>'return_date'])}}
                
              </div>
            </div>

            <div class="control-group">
            {{Form::label('status','Article Status',['class'=>'control-label','title'=>'status'])}}
            
              <div class="controls">
                {{Form::select('status',['Issue'=>'Issue'])}}
               
              
            </div>
              </div>
           
            <div class="control-group">
              {{Form::label('total_day','Total Days',['class'=>'control-label','title'=>'total_day'])}}
              
              <div class="controls">
              {{Form::number('total_day',$article_issue_info->total_day,['id'=>'required','placeholder'=>'Total Days','title'=>'total_day'])}}
                
              </div>
            
      <div class="modal-footer">
        {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;','id'=>'submit'])}}
    
      </div>
    </div>
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
    
    $(".student_roll").unbind().keyup(function()
     {
          
         var roll_number=$(".student_roll").val();
         
         $.ajax({
            url: '/member_wise_data',
            type: "post",
            data: {'roll_number':roll_number,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              $('.student_reg').val(data.reg_number);
              $('.student_name').val(data.member_name);
               $('.student_email').val(data.email);
              $('.student_phone').val(data.phone);
             
              if(data.status=='Active')
              {
               
                  $('#status').html("<font color='green'>Member Status Active</font>");
                  $("#submit").prop('disabled', false);
              }
              else if(data.roll_number!=roll_number)
              {
                 
                    $('#status').html("<font color='red'>This roll student not exit</font>");
                    $("#submit").attr("disabled","disabled");
              }
              else
              {
       
                  $('#status').html("<font color='red'>Member Status Inactive</font>");
                  $("#submit").attr("disabled","disabled");
              }
              
            }
          });
    });
       
       
  
});
</script>

<script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#article_id").unbind().keyup(function()
     {
          
         var article_id=$("#article_id").val();
        
          
         $.ajax({
            url: '/article_id_wise_data',
            type: "post",
            data: {'article_id':article_id,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              $('#article_name').val(data.article_name);
              if(data.available_status=='Available')
              {
                 $('#available').html("<font color='green'>Available</font>");
                 $("#submit").prop('disabled', false);
              }
              else
              {
                 $('#available').html("<font color='red'>Out Of Stock This Article</font>");
                 $("#submit").attr("disabled","disabled");
               
              }
           
            }
          });
    });
       
       
  
});
</script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/article_issue_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>


@stop