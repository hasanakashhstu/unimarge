@extends('admin.index')
@section('Title','Article Receive')
@section('breadcrumbs','Article Receive')
@section('breadcrumbs_link','/article_receive')
@section('breadcrumbs_title','article_receive')

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
    </i> &nbsp;Article Recive Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Article Recive Details Edit
  </p>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
            <li><a href='/membership'><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
             <li><a href='/article_recive'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_recive_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_recive_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_recive_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$article_recive_info->article_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
   {{Form::open(['url'=>"/article_recive/$article_recive_info->article_recive_id",'class'=>'form-horizontal','method'=>'put','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           <div class="control-group">
             {{Form::label('article_id','',['class'=>'control-label','title'=>'article_id'])}}
              <div class="controls">

                 {{Form::text('article_id',$article_recive_info->article_id,['id'=>'article_id','placeholder'=>'Article Id','title'=>'article_id','readonly'=>'readonly'])}}
                  <div>
                  <span id="available"></span>
                  </div>
              </div>
                   
            </div>
            <div class="control-group">
              {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              </label>
              <div class="controls">
             {{Form::text('article_name',$article_recive_info->article_name,['id'=>'article_name','placeholder'=>'Article Name','title'=>'article_name','readonly'=>'readonly'])}}
              </div>
                    
            </div>
            @if($article_recive_info->type=="Student")
              <div class="control-group">
                  {{Form::label('member_roll','Member Roll',['class'=>'control-label','title'=>'member_roll'])}}
              <div class="controls">
               {{Form::text('member_roll',$article_recive_info->member_roll,['id'=>'member_roll','placeholder'=>'Member Roll','title'=>'member_roll','readonly'=>'readonly'])}}
              </div>
            </div>
            <div class="control-group">
                  {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
              <div class="controls">
               {{Form::text('member_name',$article_recive_info->member_name,['id'=>'member_name','placeholder'=>'Member Name','title'=>'member_name','readonly'=>'readonly'])}}
              </div>
            </div>

                        <div class="control-group">
             {{Form::label('e_mail','E-mail',['class'=>'control-label','title'=>'e_mail'])}}
              <div class="controls">
                {{Form::text('e_mail',$article_recive_info->e_mail,['id'=>'e_mail','placeholder'=>'E-mail','class'=>'student_email','title'=>'e_mail','readonly'=>'readonly'])}}
              </div>
            </div>
            <div class="control-group">
           {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
              <div class="controls">
               {{Form::text('phone',$article_recive_info->phone,['id'=>'phone','placeholder'=>'Phone','class'=>'student_phone','title'=>'phone','readonly'=>'readonly'])}}
              </div>
            </div>

            @else


             <div class="control-group">
             {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
              <div class="controls">

                 {{Form::text('teacher_id',$article_recive_info->teacher_id,['id'=>'required','placeholder'=>'Teacher Id','class'=>'teacher_id','title'=>'teacher_id','readonly'=>'readonly'])}}
                 <div>

                  <span id="teacher_status"></span>
                  </div>
              </div>

            </div>

            <div class="control-group">
               {{Form::label('teacher_name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
              <div class="controls">
              {{Form::text('teacher_name',$article_recive_info->teacher_name,['id'=>'required','placeholder'=>'Teacher Name','class'=>'teacher_name','title'=>'teacher_name','readonly'=>'readonly'])}}
              </div>
            </div>

              <div class="control-group">
               {{Form::label('teacher_email','E-mail',['class'=>'control-label','title'=>'teacher_email'])}}

              <div class="controls">
                {{Form::text('teacher_email',$article_recive_info->teacher_email,['id'=>'required','placeholder'=>'E-mail','class'=>'teacher_email','title'=>'teacher_email','readonly'=>'readonly'])}}

              </div>
            </div>
             <div class="control-group">
             {{Form::label('teacher_phone','Phone',['class'=>'control-label','title'=>'teacher_phone'])}}

              <div class="controls">
              {{Form::text('teacher_phone',$article_recive_info->teacher_phone,['id'=>'required','placeholder'=>'Phone','class'=>'teacher_phone','title'=>'phone','readonly'=>'readonly'])}}

              </div>
            </div>


            @endif

            <div class="control-group">
              {{Form::label('issue_date','Issue Date',['class'=>'control-label','title'=>'issue_date'])}}
            
              <div class="controls">
             {{Form::date('issue_date',$article_recive_info->issue_date,['id'=>'issue_date','placeholder'=>'Issue From Date','title'=>'issue_date'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('return_date','Article Return Date',['class'=>'control-label','title'=>'return_date'])}}

              <div class="controls">
              {{Form::date('return_date',$article_recive_info->return_date,['id'=>'return_date','placeholder'=>'Article Return Date','title'=>'return_date'])}}
                
              </div>
            </div>
            <div class="control-group">
             {{Form::label('total_day','Total Days',['class'=>'control-label','title'=>'total_day'])}}
              <div class="controls">
                 {{Form::number('total_day',$article_recive_info->total_day,['id'=>'total_day','placeholder'=>'Total Days','title'=>'total_day'])}}
              </div>
            </div>
             <div class="control-group">
            {{Form::label('status','Article Status',['class'=>'control-label','title'=>'status'])}}
            
              <div class="controls">
                {{Form::select('status',['Recived'=>'Recived'])}}
               
              
            </div>
       
      <div class="modal-footer">
           {{Form::submit('Submit',['value'=>'Submit','id'=>'submit','class'=>'btn btn-success','style'=>'float:left;'])}}

      </div>
    </div>
    {{Form::close()}}
    </div>
       </div>
          </div>
         </div>
          </div>
  
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/article_recive_pdf');

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
    
    $("#article_id").unbind().keyup(function()
     {
          
         var article_id=$("#article_id").val();
        
          
         $.ajax({
            url: '/article_id_issue_data',
            type: "post",
            data: {'article_id':article_id,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              $('#article_name').val(data.article_name);
               $('#member_roll').val(data.member_roll);
               $('#member_reg').val(data.member_reg);
               $('#member_name').val(data.member_name);
               $('#issue_date').val(data.issue_date);
               $('#return_date').val(data.return_date);
               $('#e_mail').val(data.e_mail);
               $('#phone').val(data.phone);
               $('#total_day').val(data.total_day);
              if(data.status=='Issue')
              {
                 $('#available').html("<font color='green'>This Article Issued</font>");
                 $("#submit").prop('disabled', false);
              }
              else
              {
                 $('#available').html("<font color='red'>This Article Not Issued</font>");
                 $("#submit").attr("disabled","disabled");
               
              }
           
            }
          });
    });
       
       
  
});
</script>


@stop