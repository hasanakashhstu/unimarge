@extends('admin.index')
@section('Title','general_settings')
@section('breadcrumbs','general_settings')
@section('breadcrumbs_link','/general_settings')
@section('breadcrumbs_title','general_settings')
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
      <h2><i class="fa fa-car" aria-hidden="true"></i>&nbsp;General Settings</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}}  General Settings</p> <!-- Transport Details -->





<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>System Settings</h5>
  </div>

        <div class="widget-content nopadding">
         {{Form::open(['url'=>"/general_settings",'class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
         <div class="control-group">
           <div class="controls">
             {{Form::hidden('general_settings_id',$general_settings_data->general_settings_id,['class'=>'span11'])}}
            </div>
         </div>

            <div class="control-group">
              {{Form::label('system_name',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('system_name',$general_settings_data->system_name,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('System Title',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('system_title',$general_settings_data->system_title,['class'=>'span11'])}}
               </div>
            </div>

            <div class="control-group">
              {{Form::label('Phone',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('Phone',$general_settings_data->Phone,['class'=>'span11'])}}
               </div>
            </div>

            <div class="control-group">
              {{Form::label('email',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('email',$general_settings_data->email,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('Address Line',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::textarea('address',$general_settings_data->address,['class'=>'span11'])}}
               </div>
            </div>





            <div class="control-group">
              {{Form::label('Country Name',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('country',$general_settings_data->country,['class'=>'span11'])}}
               </div>
            </div>






            <div class="control-group">
              {{Form::label('postal_code',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('postal_code',$general_settings_data->postal_code,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('School EIIN',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('school_eiin',$general_settings_data->school_eiin,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('Default Examination Venue',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::text('admission_exam_venue',$general_settings_data->admission_exam_venue,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('Addmission Exam Start Time',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::time('admission_exam_time',$general_settings_data->admission_exam_time,['class'=>'span11'])}}
               </div>
            </div>


            <div class="control-group">
              {{Form::label('Addmission Exam End Time',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::time('admission_exam_end_time',$general_settings_data->admission_exam_end_time,['class'=>'span11'])}}
               </div>
            </div>





            <div class="control-group">
              {{Form::label('Default Session',null,['class'=>'control-label'])}}

              <div class="controls">
              @php $session_array[$general_settings_data->default_session]=$general_settings_data->default_session @endphp
              @foreach($session as $session_list)
                @php $session_array[$session_list->type_name]=$session_list->type_name @endphp
              @endforeach
                {{Form::select('default_session',$session_array,null,['style'=>'width:80%'])}}
               </div>
            </div>

            <div class="control-group">
            @php $batch_array[$general_settings_data->default_batch]=$general_settings_data->default_batch @endphp
              @foreach($batch as $batch_list)
                @php $batch_array[$batch_list->type_name]=$batch_list->type_name @endphp
              @endforeach

              {{Form::label('Default Batch',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::select('default_batch',$batch_array,null,['style'=>'width:80%'])}}
               </div>
            </div>




            <div class="control-group">
              {{Form::label('School Logo',null,['class'=>'control-label'])}}

              <div class="controls">
                {{Form::file('school_logo')}}
               </div>
            </div>

            <div class="control-group">
                {{Form::label('map_location',null,['class'=>'control-label'])}}

                <div class="controls">
                    {{Form::textarea('map_location',$general_settings_data->map_location,['class'=>'span11'])}}
                </div>
            </div>

            <div class="control-group">
                {{Form::label('social_network_1','Facebook',['class'=>'control-label','title'=>'Facebook'])}}

                <div class="controls">
                    {{Form::text('social_network_1',$general_settings_data->social_network_1,['id'=>'required','title'=>'social_network_1','placeholder'=>'Facebook'])}}

                </div>
            </div>
            <div class="control-group">
                {{Form::label('social_network_2','Twitter',['class'=>'control-label','title'=>'Twitter'])}}

                <div class="controls">
                    {{Form::text('social_network_2',$general_settings_data->social_network_2,['id'=>'required','title'=>'social_network_2','placeholder'=>'Twitter'])}}

                </div>
            </div>
            <div class="control-group">
                {{Form::label('social_network_3','Instagram',['class'=>'control-label','title'=>'Instagram'])}}

                <div class="controls">
                    {{Form::text('social_network_3',$general_settings_data->social_network_3,['id'=>'required','title'=>'social_network_3','placeholder'=>'Instagram'])}}

                </div>
            </div>
            <div class="control-group">
                {{Form::label('social_network_4','Pinterest',['class'=>'control-label','title'=>'Pinterest'])}}

                <div class="controls">
                    {{Form::text('social_network_4',$general_settings_data->social_network_4,['id'=>'required','title'=>'social_network_4','placeholder'=>'Pinterest'])}}
                </div>
            </div>




            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          {{Form::close()}}
        </div>
      </div>



    </div>






<div class="span6">
      <div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Current Settings</h5>
  </div>

        <div class="widget-content nopadding">
         <table class="table">
            <tr>

              <th colspan="2"><img style="height:10%;" src="img/logo.png"></th>
            </tr>

            <tr>
              <th>System Name</th>
              <th>{{$general_settings_data->system_name}}</th>
            </tr>

            <tr>
              <th>System Title</th>
              <th>{{$general_settings_data->system_title}}</th>
            </tr>

            <tr>
              <th>Phone</th>
              <th>{{$general_settings_data->Phone}}</th>
            </tr>


            <tr>
              <th>Address Line</th>
              <th>{{$general_settings_data->address}}</th>
            </tr>


            <tr>
              <th>Country Name</th>
              <th>{{$general_settings_data->country}}</th>
            </tr>



            <tr>
              <th>Postal Code</th>
              <th>{{$general_settings_data->postal_code}}</th>
            </tr>



            <tr>
              <th>School EIIN</th>
              <th>{{$general_settings_data->school_eiin}}</th>
            </tr>

            <tr>
              <th>Default Session</th>
              <th>{{$general_settings_data->default_session}}</th>
            </tr>


            <tr>
              <th>Default Batch</th>
              <th>{{$general_settings_data->default_batch}}</th>
            </tr>

         </table>
        </div>
      </div>
</div>
  </div>
</div>
</div>


@stop
