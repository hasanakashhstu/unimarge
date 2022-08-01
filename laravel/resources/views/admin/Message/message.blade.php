@extends('admin.index')
@section('Title','Addmission Test')
@section('breadcrumbs','Addmission Test')
@section('breadcrumbs_link','/message_settings')
@section('breadcrumbs_title','Addmission Test')

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
      <h2> <i class="fa fa-check-square-o" aria-hidden="true">
    </i> Message Settings</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Accountant Details Edit</p><br/> <!-- Transport Details -->



<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>

           <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>
</div>


<div class="tabbable tabs-left left-tab-process" style="margin-top: 10%;">
    <ul class="nav nav-tabs book-process-ltab text-center">
        <li class="active"><a href="#a" data-toggle="tab">ORSMS</a></li>
        <li class=""><a href="#b" data-toggle="tab">UPCOMMING</a></li>

    </ul>



    <div class="tab-content">
        <div class="tab-pane active" id="a">


        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>ORSMS Settings</h5>
          </div>






          <div class="widget-content nopadding">




        {{Form::open(['url'=>"/message_settings",'files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           <?php
            $sms_data=json_decode($sms_info->info);


           ?>


        	<div class="control-group">
               {{Form::label('username','User Name',['class'=>'control-label','title'=>'relation'])}}
                <div class="controls">
    {{Form::text('username',$sms_data->username,['id'=>'required','placeholder'=>'User Name','title'=>'relation'])}}
                </div>
            </div>

            <div class="control-group">
               {{Form::label('Password','Password',['class'=>'control-label','title'=>'relation'])}}
                <div class="controls">
    {{Form::text('Password',$sms_data->password,['id'=>'required','placeholder'=>'User Name','title'=>'relation'])}}

                </div>
            </div>



            <div class="control-group">
               {{Form::label('Mask','Mask',['class'=>'control-label','title'=>'relation'])}}
                <div class="controls">
    {{Form::text('mask',$sms_data->mask,['id'=>'required','placeholder'=>'Mask','title'=>'relation'])}}
                </div>
            </div>

              <div class="control-group" style="display: inline-flex;">
               {{Form::label('Activate','Activate',['class'=>'control-label','title'=>'option'])}}
                <div class="controls">
                 @if(isset($sms_data->option) && $sms_data->option=='active')
                   <input type="radio" name="option" value="active" checked="checked">
                 @else
                    <input type="radio" name="option" value="active">
                 @endif  
                </div>
                {{Form::label('Deactivate','Deactivate',['class'=>'control-label','title'=>'option'])}}
                 <div class="controls">
                 @if(isset($sms_data->option) && $sms_data->option=='inactive')
                   <input type="radio" name="option" value="inactive" checked="checked">
                 @else
                    <input type="radio" name="option" value="inactive">
                 @endif 
                </div>
            </div>

             <div class="form-actions">
           {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success'])}}
              </div>
        {{Form::close()}}
     </div>
     </div>






        </div>

        <div class="tab-pane" id="b">
            <div class="">
                <h4>Nothing To Here :</h4>

            </div>
        </div>


 	</div>

</div>

 </div>

@stop