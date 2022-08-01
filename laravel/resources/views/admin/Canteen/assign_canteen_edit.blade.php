@extends('admin.index')
@section('Title','assign_canteen')
@section('breadcrumbs','assign_canteen')
@section('breadcrumbs_link','assign_canteen')
@section('breadcrumbs_title','assign_canteen')
@section('content')


@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
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
    <h2><i class="fa fa-list" aria-hidden="true"></i> Assign Canteen </h2> <!-- Tab Heading  -->
  <p title="Transport Details">Assign Canteen Details</p> <!-- Transport Details -->

   <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/assign_dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Assign Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div> 
        <div>
          <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Assign Canteen</h5>
              </div>

              <div class="widget-content nopadding">
              {{Form::open(['url'=>"/assign_canteen/$canteen_data->assign_canteen_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                
            
               <div class="control-group">
                    {{Form::label('title','Title',['class'=>'control-label','title'=>'title'])}}
                     <div class="controls">
                      {{Form::text('title',$canteen_data->title,['id'=>'required','placeholder'=>'Title','title'=>'title'])}}

                    </div>
                  </div>
            <div class="control-group">
             {{Form::label('student_roll','Student Roll',['class'=>'control-label','title'=>'student_roll'])}}
              <div class="controls">
               {{Form::text('student_roll',$canteen_data->student_roll,['id'=>'required','class'=>'student_roll','placeholder'=>'Student Roll','title'=>'student_roll'])}}
              </div>
            </div>

             <div class="control-group">
                 {{Form::label('student_name','Student Name',['class'=>'control-label','title'=>'student_name'])}}
              <div class="controls">
               {{Form::text('student_name',$canteen_data->student_name,['id'=>'student_name','class'=>'student_name','placeholder'=>'Student Name','title'=>'student_name'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('Class','Class',['class'=>'control-label','title'=>'class'])}}
              <div class="controls">
               {{Form::text('class',$canteen_data->class,['id'=>'section','placeholder'=>'Class','title'=>'semester'])}}
              </div>
            </div>

            <div class="control-group">
              {{Form::label('department',' Department',['class'=>'control-label','title'=>'department'])}}
              <div class="controls">
                {{Form::text('department',$canteen_data->department,['id'=>'department','class'=>'department','placeholder'=>'Department','title'=>'department'])}}
              </div>
            </div>

  
            

                   <div class="control-group">
                                {{Form::label('Description','',['class'=>'control-label'])}}

                                <div class="controls">
                                  {{Form::textarea('description',$canteen_data->description,['col'=>'20','rows'=>'4','title'=>'description'])}}

                                </div>
                              </div>


                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
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

         var student_roll=$(".student_roll").val();

         $.ajax({
            url: '/student_data_get',
            type: "post",
            data: {'student_roll':student_roll,'_token': $('input[name=_token]').val()},
            success: function(data){
               console.log(data);

               $('#student_name').val(data.student_name);
               $('#department').val(data.department);
               $('#section').val(data.class);
            }
          });
    });




});
</script>



@stop
