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
<i class="fa fa-share-square-o" aria-hidden="true"></i> Book Receive</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Book Receive</p> <!-- Transport Details -->
  <br/>

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/templet_article'><i class="fa fa-pencil-square" aria-hidden="true"></i> &nbsp;Book Accession</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i>&nbsp; Manage Book</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
           
         </ul>
      </div>
    </div>
    </div>
  <div class="tab-content" style="width:1090px;"> <!-- Transport List Report  -->


 	<div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' style="margin-top: 9px;" data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-plus" aria-hidden="true"></i>   Book Receive</a></li>

        </ul>
      </div>
    </div>


		<div class="tab-content">
       <br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_recive_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_recive_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_recive_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

<ul class="nav nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#home">
        <i class="fa fa-bars" aria-hidden="true"></i> Student Book Receive List
      </a>
    </li>
    <li>
      <a data-toggle="tab" href="#menu1">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>Teacher Book Receive List
      </a>
    </li>

  </ul>
      <!--new add form-->
      <div class="modal fade" id="myModal" role="dialog" style="    margin-left: -5%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i>  Receive Book Info</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
          {{Form::open(['url'=>'/article_recive','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           <div class="control-group">
             {{Form::label('article_id','Accession Code',['class'=>'control-label','title'=>'article_id'])}}
              <div class="controls">

                 {{Form::text('article_id','',['id'=>'article_id','placeholder'=>'Article Id','title'=>'article_id'])}}
                  <div>
                  <span id="available"></span>
                  </div>
              </div>
                   
            </div>
            <div class="control-group">
              {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              </label>
              <div class="controls">
             {{Form::text('article_name','',['id'=>'article_name','placeholder'=>'Article Name','title'=>'article_name','readonly'=>'readonly'])}}
              </div>
                    
            </div>


            <div class="control-group">
                  {{Form::label('type','Type',['class'=>'control-label','title'=>'member_roll'])}}
              <div class="controls">
               {{Form::text('type','',['id'=>'type','placeholder'=>'Member Type','title'=>'type','readonly'=>'readonly'])}}
              </div>
            </div>

            <div class="student_type">
              <div class="control-group">
                  {{Form::label('member_roll','Member Roll',['class'=>'control-label','title'=>'member_roll'])}}
              <div class="controls">
               {{Form::text('member_roll','',['id'=>'member_roll','placeholder'=>'Member Roll','title'=>'member_roll','readonly'=>'readonly'])}}
              </div>
            </div>
            <div class="control-group">
                  {{Form::label('member_reg','Member Registration',['class'=>'control-label','title'=>'member_reg'])}}
              <div class="controls">
               {{Form::text('member_reg','',['id'=>'member_reg','placeholder'=>'Member Registration','title'=>'member_reg','readonly'=>'readonly'])}}
              </div>
            </div>
						<div class="control-group">
							    {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
							<div class="controls">
							 {{Form::text('member_name','',['id'=>'member_name','placeholder'=>'Member Name','title'=>'member_name','readonly'=>'readonly'])}}
							</div>
						</div>

            <div class="control-group">
             {{Form::label('e_mail','E-mail',['class'=>'control-label','title'=>'e_mail'])}}
              <div class="controls">
                {{Form::text('e_mail','',['id'=>'e_mail','placeholder'=>'E-mail','class'=>'student_email','title'=>'e_mail','readonly'=>'readonly'])}}
              </div>
            </div>
            <div class="control-group">
           {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}
              <div class="controls">
               {{Form::text('phone','',['id'=>'phone','placeholder'=>'Phone','class'=>'student_phone','title'=>'phone','readonly'=>'readonly'])}}
              </div>
            </div>
          </div>

          <div class="teacher_type" style="display: none;">
            <div class="control-group">
             {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
              <div class="controls">

                 {{Form::text('teacher_id','',['id'=>'required','placeholder'=>'Teacher Id','class'=>'teacher_id','title'=>'teacher_id','readonly'=>'readonly'])}}
                 <div>

                  <span id="teacher_status"></span>
                  </div>
              </div>

            </div>

            <div class="control-group">
               {{Form::label('teacher_name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
              <div class="controls">
              {{Form::text('teacher_name','',['id'=>'required','placeholder'=>'Teacher Name','class'=>'teacher_name','title'=>'teacher_name','readonly'=>'readonly'])}}
              </div>
            </div>

              <div class="control-group">
               {{Form::label('teacher_email','E-mail',['class'=>'control-label','title'=>'teacher_email'])}}

              <div class="controls">
                {{Form::text('teacher_email','',['id'=>'required','placeholder'=>'E-mail','class'=>'teacher_email','title'=>'teacher_email','readonly'=>'readonly'])}}

              </div>
            </div>
             <div class="control-group">
             {{Form::label('teacher_phone','Phone',['class'=>'control-label','title'=>'teacher_phone'])}}

              <div class="controls">
              {{Form::text('teacher_phone','',['id'=>'required','placeholder'=>'Phone','class'=>'teacher_phone','title'=>'phone','readonly'=>'readonly'])}}

              </div>
            </div>

          </div>


						<div class="control-group">
              {{Form::label('issue_date','Issue Date',['class'=>'control-label','title'=>'issue_date'])}}
						
							<div class="controls">
						 {{Form::date('issue_date','',['id'=>'issue_date','placeholder'=>'Issue From Date','title'=>'issue_date','readonly'=>'readonly'])}}
							</div>
						</div>
						<div class="control-group">
						{{Form::label('return_date','Article Return Date',['class'=>'control-label','title'=>'return_date'])}}

							<div class="controls">
							{{Form::date('return_date','',['id'=>'return_date','placeholder'=>'Article Return Date','title'=>'return_date'])}}
                
							</div>
						</div>

            <div class="control-group">
						 {{Form::label('total_day','Total Days',['class'=>'control-label','title'=>'total_day'])}}
							<div class="controls">
								 {{Form::number('total_day','',['id'=>'total_day','placeholder'=>'Total Days','title'=>'total_day','readonly'=>'readonly'])}}
							</div>
						</div>
             <div class="control-group">
            {{Form::label('status','Article Status',['class'=>'control-label','title'=>'status'])}}
            
              <div class="controls">
                {{Form::select('status',['Recived'=>'Recived'],null,['style'=>'width:78%'])}}
               
              
            </div>
              </div>
        
        </div>
      </div>
      <div class="modal-footer">
           {{Form::submit('Submit',['value'=>'Submit','id'=>'submit','class'=>'btn btn-success','style'=>'float:left;'])}}
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    {{Form::close()}}
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
            <h5>Student Book Receive Data Table
            </h5>
          </div>
          <div class="widget-content nopadding">
             <table class="table table-bordered data-table">
                <thead>
                 <tr>
                   <th>Article Name</th>
                     <th>Article Code</th>
                     <th>Member Roll</th>
                     <th>Member Name</th>
                     <th>Issue Date</th>
                     <th>Return Date</th>
                     <th>E Mail</th>
                     <th>Phone</th>
                     <th>Status</th>
                     <th>Total Days</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($article_recive_info_student as $article_recive_info_student_data)
                  <tr class="gradeX">
               
                    <td>{{$article_recive_info_student_data->article_name}}</td>
                    <td>{{$article_recive_info_student_data->article_id}}</td>
                    <td>{{$article_recive_info_student_data->member_roll}}</td>
                     <td>{{$article_recive_info_student_data->member_name}}</td>
                     <td>{{$article_recive_info_student_data->issue_date}}</td>
                     <td>{{$article_recive_info_student_data->return_date}}</td>
                     <td>{{$article_recive_info_student_data->e_mail}}</td>
                     <td>{{$article_recive_info_student_data->phone}}</td>
                     <td>Received</td>
                     <td>{{$article_recive_info_student_data->total_day}}</td>
                     <td id="my_align" class="display_status">
           
                    
                        {{Form::open(['url'=>"/article_recive/$article_recive_info_student_data->article_recive_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/article_recive/$article_recive_info_student_data->article_recive_id",'method'=>'DELETE'])}}
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
            <h5>Teacher Book Receive Data Table
            </h5>
          </div>
          <div class="widget-content nopadding">
             <table class="table table-bordered data-table">
                <thead>
                 <tr>
                     <th>Article Name</th>
                     <th>Article Code</th>
                     <th>Teacher Id</th>
                     <th>Teacher Name</th>
                     <th>Issue Date</th>
                     <th>Return Date</th>
                     <th>E Mail</th>
                     <th>Phone</th>
                     <th>Status</th>
                     <th>Total Days</th>
                     <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($article_recive_info_teacher as $article_recive_info_teacher_data)
                  <tr class="gradeX">
               
                    <td>{{$article_recive_info_teacher_data->article_name}}</td>
                    <td>{{$article_recive_info_teacher_data->article_id}}</td>
                    <td>{{$article_recive_info_teacher_data->teacher_id}}</td>
                     <td>{{$article_recive_info_teacher_data->teacher_name}}</td>
                     <td>{{$article_recive_info_teacher_data->issue_date}}</td>
                     <td>{{$article_recive_info_teacher_data->return_date}}</td>
                     <td>{{$article_recive_info_teacher_data->teacher_email}}</td>
                     <td>{{$article_recive_info_teacher_data->teacher_phone}}</td>
                     <td>Received</td>
                     <td>{{$article_recive_info_teacher_data->total_day}}</td>
                     <td id="my_align" class="display_status">
           
                    
                        {{Form::open(['url'=>"/article_recive/$article_recive_info_teacher_data->article_recive_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/article_recive/$article_recive_info_teacher_data->article_recive_id",'method'=>'DELETE'])}}
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
</div>
</div>
  
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
              if(data.type=="Student")
              {
                   $('#member_roll').val(data.member_roll);
                   $('#member_reg').val(data.member_reg);
                   $('#member_name').val(data.member_name);
                   $('#e_mail').val(data.e_mail);
                   $('#phone').val(data.phone);
                   $(".teacher_type").hide();
                   $(".student_type").show();

              }
              else
              {
                   $(".teacher_type").show();
                   $(".student_type").hide();
                   $('.teacher_id').val(data.teacher_id);
                   $('.teacher_name').val(data.teacher_name);
                   $('.teacher_email').val(data.teacher_email);
                   $('.teacher_phone').val(data.teacher_phone);
                   
              }
               $('#issue_date').val(data.issue_date);
               $('#type').val(data.type);
               $('#return_date').val(data.return_date);
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
