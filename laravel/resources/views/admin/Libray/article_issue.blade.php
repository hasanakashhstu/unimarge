
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
    <h2><i class="fa fa-check" aria-hidden="true"></i> Book Issue</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Book Issue</p><br/> <!-- Transport Details -->
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
    </div>
  <div class="tab-content" style="width:1090px;"> <!-- Transport List Report  -->


 	<div class="panel panel-default text-right" >
      <div class="panel-body">
        <ul class='dropdown_test' style="margin-top: 9px;" data-toggle="modal" data-target="#myModal">
        <li>
          <a href='#'>
            <i class="fa fa-plus" aria-hidden="true"></i> New Book Issue
          </a>
        </li>
      </ul>
      </div>
    </div>


		<div class="tab-content"><br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_issue_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_issue_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_issue_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

<ul class="nav nav-tabs">
    <li class="active">
      <a data-toggle="tab" href="#home">
        <i class="fa fa-bars" aria-hidden="true"></i> Student Book Issue List
      </a>
    </li>
    <li>
      <a data-toggle="tab" href="#menu1">
        <i class="fa fa-plus-circle" aria-hidden="true"></i>Teacher Book Issue List
      </a>
    </li>


  </ul>

      <!--new add form-->
      <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Book Issue</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
           {{Form::open(['url'=>'/article_issue','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
             <div class="control-group">
             {{Form::label('article_id','Accession Code',['class'=>'control-label','title'=>'article_id'])}}
              <div class="controls">

                 {{Form::text('article_id','',['id'=>'article_id','placeholder'=>'Accession Code','title'=>'article_id'])}}
               <div>
                  <span id="available"></span>
                  <span id="not_available"></span>
                  </div>
              </div>
            </div>
            <div class="control-group">
              {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              <div class="controls">

                {{Form::text('article_name','',['id'=>'article_name','placeholder'=>'Article Name','title'=>'article_name','readonly'=>'readonly'])}}

              </div>
            </div>

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
             {{Form::label('member_roll','Member Roll',['class'=>'control-label','title'=>'member_roll'])}}
              <div class="controls">

                 {{Form::text('member_roll','',['id'=>'required','placeholder'=>'Member Roll','class'=>'student_roll','title'=>'member_roll'])}}
                 <div>

                  <span id="status"></span>
                  </div>
              </div>

            </div>


            <div class="control-group">
             {{Form::label('member_reg','Member Registration',['class'=>'control-label','title'=>'member_reg'])}}

              <div class="controls">
               {{Form::text('member_reg','',['id'=>'required','placeholder'=>'Member Registration','class'=>'student_reg','title'=>'member_reg','readonly'=>'readonly'])}}

              </div>
            </div>
						<div class="control-group">
               {{Form::label('member_name','Member Name',['class'=>'control-label','title'=>'member_name'])}}
							<div class="controls">
							{{Form::text('member_name','',['id'=>'required','placeholder'=>'Member Name','class'=>'student_name','title'=>'member_name','readonly'=>'readonly'])}}
							</div>
						</div>

              <div class="control-group">
               {{Form::label('e_mail','E-mail',['class'=>'control-label','title'=>'e_mail'])}}

              <div class="controls">
                {{Form::text('e_mail','',['id'=>'required','placeholder'=>'E-mail','class'=>'student_email','title'=>'e_mail','readonly'=>'readonly'])}}

              </div>
            </div>
             <div class="control-group">
             {{Form::label('phone','Phone',['class'=>'control-label','title'=>'phone'])}}

              <div class="controls">
              {{Form::text('phone','',['id'=>'required','placeholder'=>'Phone','class'=>'student_phone','title'=>'phone','readonly'=>'readonly'])}}

              </div>
            </div>

          </div>

          <div class="teacher_type" style="display: none;">
            <div class="control-group">
             {{Form::label('teacher_id','Teacher Id',['class'=>'control-label','title'=>'teacher_id'])}}
              <div class="controls">

                 {{Form::text('teacher_id','',['id'=>'required','placeholder'=>'Teacher Id','class'=>'teacher_id','title'=>'teacher_id'])}}
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
              {{Form::label('issue_date','Issue From Date',['class'=>'control-label','title'=>'issue_date'])}}
							<div class="controls">
                {{Form::date('issue_date','',['id'=>'required','placeholder'=>'Issue From Date','title'=>'issue_date','class'=>'issue_date'])}}
							</div>
						</div>
						<div class="control-group">
             {{Form::label('return_date','Article Return Date',['class'=>'control-label','title'=>'return_date'])}}

							<div class="controls">
                {{Form::date('return_date','',['id'=>'required','placeholder'=>'Article Return Date','title'=>'return_date','class'=>'return_date'])}}

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
              {{Form::number('total_day','',['id'=>'required','placeholder'=>'Total Days','title'=>'total_day','readonly'=>'readonly','class'=>'total_day'])}}

							</div>
						</div>

        </div>
      </div>
      <div class="modal-footer">
        {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;','id'=>'submit'])}}
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
   {{Form::close()}}
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

    $(".teacher_id").unbind().keyup(function(){
      var teacher_id=$(this).val();

      $.ajax({
            url: '/member_wise_teacher_data',
            type: "post",
            data: {'teacher_id':teacher_id,'_token': $('input[name=_token]').val()},
            success: function(data){

              $('.teacher_name').val(data.teacher_name);
               $('.teacher_email').val(data.teacher_email);
              $('.teacher_phone').val(data.teacher_phone);

              if(data.status=='Active')
              {

                  $('#teacher_status').html("<font color='green'>Member Status Active</font>");
                  $("#submit").prop('disabled', false);
              }
              else if(data.teacher_id!=teacher_id)
              {

                    $('#teacher_status').html("<font color='red'>This Member Doexn't Exists</font>");
                    $("#submit").attr("disabled","disabled");
              }
              else
              {

                    $('#teacher_status').html("<font color='red'>Member Status Inactive</font>");
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
              console.log(data);
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

    $(".return_date").unbind().change(function(){
      var issue_date=$(".issue_date").val();
      var return_date=$(this).val();
      var startDate = Date.parse(issue_date);
      var endDate = Date.parse(return_date);
      var timeDiff = endDate - startDate;
      var daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
          //alert(daysDiff);
          $(".total_day").val(daysDiff);
      // Round down.
      //alert( Math.floor(days));
    });



});
</script>



<div class="tab-content">
        <div id="home" class="tab-pane fade in active">
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-th">
              </i>
            </span>
            <h5>Student Book Issue Data Table
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                  <tr>

                     <th>Article Name</th>
                     <th>Article Code</th>
                     <th>Member Roll</th>
                     <th>Member Registration</th>
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
                @foreach($article_issue_info_student as $article_issue_info_student_data)
                  <tr class="gradeX">

                    <td>{{$article_issue_info_student_data->article_name}}</td>
                    <td>{{$article_issue_info_student_data->article_id}}</td>
                    <td>{{$article_issue_info_student_data->member_roll}}</td>
                    <td>{{$article_issue_info_student_data->member_reg}}</td>
                    <td>{{$article_issue_info_student_data->member_name}}</td>
                    <td>{{$article_issue_info_student_data->issue_date}}</td>
                    <td>{{$article_issue_info_student_data->return_date}}</td>
                    <td>{{$article_issue_info_student_data->e_mail}}</td>
                    <td>{{$article_issue_info_student_data->phone}}</td>
                    <td>{{$article_issue_info_student_data->status}}</td>
                    <td>{{$article_issue_info_student_data->total_day}}</td>
                     <td id="my_align" class="display_status">

                        {{Form::open(['url'=>"/article_issue/$article_issue_info_student_data->article_issue_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                        {{Form::open(['url'=>"/article_issue/$article_issue_info_student_data->article_issue_id" ,'method'=>'DELETE'])}}
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
            <h5>Teacher Book Issue Data Table
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
                @foreach($article_issue_info_teacher as $article_issue_info_teacher_data)
                  <tr class="gradeX">

                    <td>{{$article_issue_info_teacher_data->article_name}}</td>
                    <td>{{$article_issue_info_teacher_data->article_id}}</td>
                    <td>{{$article_issue_info_teacher_data->teacher_id}}</td>
                    <td>{{$article_issue_info_teacher_data->teacher_name}}</td>
                    <td>{{$article_issue_info_teacher_data->issue_date}}</td>
                    <td>{{$article_issue_info_teacher_data->return_date}}</td>
                    <td>{{$article_issue_info_teacher_data->teacher_email}}</td>
                    <td>{{$article_issue_info_teacher_data->teacher_phone}}</td>
                    <td>{{$article_issue_info_teacher_data->status}}</td>
                    <td>{{$article_issue_info_teacher_data->total_day}}</td>
                     <td id="my_align" class="display_status">

                        {{Form::open(['url'=>"/article_issue/$article_issue_info_teacher_data->article_issue_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                        {{Form::open(['url'=>"/article_issue/$article_issue_info_teacher_data->article_issue_id" ,'method'=>'DELETE'])}}
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

          var w = window.open('/article_issue_pdf');

          w.onload = function()
          {
              w.print();
          };

    });
});

 </script>

@stop
