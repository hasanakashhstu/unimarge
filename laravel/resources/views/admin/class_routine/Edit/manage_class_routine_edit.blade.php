@extends('admin.index')
@section('Title','Manage Class Routine Edit')
@section('breadcrumbs','Manage Class Routine Edit')
@section('breadcrumbs_link','/manage_class_routine')
@section('breadcrumbs_title','Manage Class Routine Edit')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
              <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
               <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Error!</strong> {{ Session::get('error') }}
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
     <i class="fa fa-check-square-o" aria-hidden="true">
      </i> &nbsp;Class {{$class_name}} Info Edit
    </h2>
     <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}}(  {{Session::get('school.school_eiin')}} ) Class Details Edit
    </p>
    <!-- Transport Details -->

   <div class='row'>
      <div class="panel panel-default" >
       <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Manage Section</a></li>
            <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage Department</a></li>
            <li><a href='/academic_syllabus'><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>

         
         </ul>
      </div>
    </div>
    <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_class_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_class_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_class_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
             
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
     </div>
   </div>

      <div class="widget-box">
       <div class="widget-title">
        <span class="icon">
            <i class="icon-info-sign"></i>
          </span>
          <h5>{{$class_name}} Routine</h5>
        </div>

         <div class="widget-content nopadding">
         {{Form::open(['url'=>"/manage_class_routine/$class_routine_data->class_routine_id",'files'=>true,'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
            <div class="control-group">
              <label class="control-label">{{Form::label('class',null,[])}}</label>
              <div class="controls">
                {{$class_name}}
                {{Form::hidden('class_name',$class_name)}}
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"> {{Form::label('department','Department',['class'=>'control-label'])}}</label>
              <div class="controls">
          @php
            $dapertment_array=[$class_routine_data->department=>$class_routine_data->department]
          @endphp
          @foreach($department_data as $department_data_value)
              @php
                $dapertment_array[$department_data_value->department_name]=$department_data_value->department_name
              @endphp
          @endforeach

                {{Form::select('department',$dapertment_array)}}
              </div>
            </div>

             <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$class_routine_data->medium=>$class_routine_data->medium]
            @endphp
            @foreach($medium as $medium_data)
              @php
                $medium_array[$medium_data->type_name]=$medium_data->type_name
              @endphp
            @endforeach
            {{Form::select('medium',$medium_array,null,['class'=>'medium','id'=>'medium'])}}
          </div>
        </div>




            <div class="control-group">
              <label class="control-label">{{Form::label('Subject',null,[])}}</label>
              <div class="controls">
                @php
                $subject_name=[$class_routine_data->subject=>$class_routine_data->subject];
                @endphp
                @foreach($subject_info_class_wise as $suject_list)
                  @php  $subject_name[$suject_list->subject_name] = $suject_list->subject_name; @endphp
                @endforeach
                {{Form::select('subject',$subject_name)}}
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">{{Form::label('Section',null,[])}}</label>
              <div class="controls">
                @php
                $section_data_array=[$class_routine_data->section=>$class_routine_data->section];
                @endphp
                @foreach($section_info_class_wise as $section_list)
                  @php  $section_data_array[$section_list->section_name] = $section_list->section_name; @endphp
                @endforeach

                {{Form::select('section',$section_data_array)}}
              </div>
             </div>
            
            <div class="control-group">
              <label class="control-label">Day</label>
              <div class="controls">
              
          
              {{Form::select('class_day',[$class_routine_data->class_day=>$class_routine_data->class_day,'1'=>'Saturday','2'=>'Sunday','3'=>'Monday','4'=>'Tuesday','5'=>'Wednesday','6'=>'Thursday','7'=>'Friday'])}}

              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Teacher</label>
              <div class="controls">

                @php
                  $teacher_data_array=[$class_routine_data->teacher=>$class_routine_data->teacher];
                @endphp
                @foreach($teacher_detials as $techer_list)
                  @php  $teacher_data_array[$techer_list->teacher_name] = $techer_list->teacher_name; @endphp
                @endforeach
              {{Form::select('teacher',$teacher_data_array)}}

              </div>
            </div>

            @php
        
            $start_time_hour=date("h",$start_time_data->class_starting_time);
            $start_time_min=date("i",$start_time_data->class_starting_time);
            $end_time_hour=date("h",$end_time_data->class_ending_time);
            $end_time_min=date("i",$end_time_data->class_ending_time);
            @endphp
       
            <div class="control-group">
              <label class="control-label">Starting Time</label>
              <div class="controls">
                <table class="table address">
                  <thead>
                    <tr>
                       <th>Hour</th>
                       <th>Minutes</th>
                       <th>Type</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                        <td>

                        {{Form::select('class_starting_hour',[ $start_time_hour=> $start_time_hour,'0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'])}}

                        </td>
                        <td>

                         {{Form::select('class_starting_minutes',[$start_time_min=>$start_time_min,'0'=>'0','5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30','40'=>'40','45'=>'45','50'=>'50','55'=>'55','59'=>'59'])}}

                        </td>
                           <td>
                           {{Form::select('starting_type',[$start_time_data->starting_type=>$start_time_data->starting_type,'AM'=>'AM','PM'=>'PM'])}}
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Ending Time</label>
              <div class="controls">
                <table class="table address">
                  <thead>
                    <tr>
                      <th>Hour</th>
                      <th>Minutes</th>

                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      {{Form::select('class_ending_hour',[$end_time_hour=>$end_time_hour,'0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'])}}
                      </td>
                      <td>
                        {{Form::select('class_ending_minutes',[$end_time_min=>$end_time_min,'0'=>'0','5'=>'5','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30','40'=>'40','45'=>'45','50'=>'50','55'=>'55','59'=>'59'])}}
                      </td>
                       <td>
                           {{Form::select('ending_type',[$end_time_data-> ending_type=>$end_time_data->  ending_type,'AM'=>'AM','PM'=>'PM'])}}
                       </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-actions">
       
              <input type="submit" value="Submit" class="btn btn-success">
       
            </div>
         {{Form::close()}}
        </div>
       </div>
     </div>


@stop