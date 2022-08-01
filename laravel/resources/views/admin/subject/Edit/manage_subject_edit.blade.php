@extends('admin.index')
@section('Title',"Subject ")
@section('breadcrumbs','subject_one_class')
@section('breadcrumbs_link','/subject_one_class')
@section('breadcrumbs_title','Subject ')
@section('content')
<div class="container">


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


  
  <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit  Class Subject Details  </h2>
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  subject Details</p>
  
 
  <br/>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/academic_syllabus'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Academic Syllabus</a></li>
            <li><a href='/marks_publish'><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; Publish Marks</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>



  
</div><br/>


  <div class="tab-content">
    <!-- Transport List Report  -->
    


    
      <div>
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="icon-info-sign"></i></span>
            <h5>Edit Class  Subject Details </h5>
          </div>

          <div class="widget-content nopadding">
          {{Form::open(['url'=>"/manage_subject/$subject_info->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
            
              <div class="control-group" hidden="hidden">
              {{Form::label('User','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('user',Auth::user()->name,['id'=>'required','placeholder'=>'Subject Name'])}}
                </div>
              </div>


              
              <div class="control-group">
              {{Form::label('Subject Name','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('subject_name',$subject_info->subject_name,['id'=>'required','placeholder'=>'Subject Name','title'=>'subject_name'])}}
                </div>
              </div>
               
                <div class="control-group">
              {{Form::label('Subject Code','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('subject_code',$subject_info->subject_code,['id'=>'required','placeholder'=>'Subject Code','title'=>'subject_code'])}}
                </div>
              </div>

               <div class="control-group">
              {{Form::label('Subject Mark','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('subject_mark',$subject_info->subject_mark,['id'=>'required','placeholder'=>'Subject Mark','title'=>'subject_mark'])}}
                </div>
              </div>

               <div class="control-group">
              {{Form::label('Subject Credit','',['class'=>'control-label'])}}
                
                <div class="controls">
                {{Form::text('subject_credit',$subject_info->subject_credit,['id'=>'required','placeholder'=>'Subject Credit','title'=>'subject_credit'])}}
                </div>
              </div>

               <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$subject_info->medium=>$subject_info->medium]
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
                
                {{Form::label('Class','',['class'=>'control-label','title'=>'class'])}}
                <div class="controls">

                @php $subject_class_array[$subject_info->class]=$subject_info->class @endphp
                @foreach($class_list as $class_list_data)
                  @php $subject_class_array[$class_list_data->class_name]=$class_list_data->class_name @endphp
                @endforeach

                
                  {{Form::select('class',$subject_class_array)}}
                </div>
              </div>


               <div class="control-group">
                
                {{Form::label('Department','',['class'=>'control-label','title'=>'department'])}}
                <div class="controls">
                  @php
                    $department_array=[$subject_info->department=>$subject_info->department]
                  @endphp
                  @foreach($department as $department_data)
                    @php
                        $department_array[$department_data->id]=$department_data->department_name
                    @endphp

                  @endforeach


                  {{Form::select('department',$department_array)}}
                </div>
              </div>


                <div class="control-group">
                
                {{Form::label('Section','',['class'=>'control-label','title'=>'section'])}}
                <div class="controls">
                  @php
                    $section=DB::table('manage_section')->where('class',$subject_info->class)->get();
                    $section_array=[$subject_info->section=>$subject_info->section]
                  @endphp
                  @foreach($section as $section_data)
                    @php
                        $section_array[$section_data->section_name]=$section_data->section_name
                    @endphp

                  @endforeach


                  {{Form::select('section',$section_array)}}
                </div>
              </div>


               <div class="control-group">

                             {{Form::label('type','Job Type',['class'=>'control-label','title'=>'Job Type'])}} 
                            <div class="controls">
                              {{Form::select('type',[$subject_info->type=>$subject_info->type,'Tech'=>'Tech','Non-Tech'=>'Non-Tech'],null,['id'=>'job_type'])}} 
                            
                            </div>

              </div>

              

              <div class="control-group">
                
                {{Form::label('Teacher','',['class'=>'control-label','title'=>'teacher'])}}
                <div class="controls">

               @php $teacher[$subject_info->teacher]=$subject_info->teacher @endphp
               
                @foreach($teacher_list as $teacher_list_data)
                @php $teacher[$teacher_list_data->teacher_name]=$teacher_list_data->teacher_name @endphp
                @endforeach

                  {{Form::select('teacher',$teacher)}}
                </div>
              </div>



              <div class="control-group">
                
                {{Form::label('Teacher','',['class'=>'control-label','title'=>'teacher'])}}
                <div class="controls">

                      <table class='table' style="width:80%">
                      <thead>
                          <tr>
                              <th>Component Name </th>
                              <th>Total Mark</th>
                              <th>Pass mark ( set as percentge )</th>
                          </tr>
                      </thead>

                      <tbody>
                      
                      <?php 


                      ?>
                  <?php  $paticular_data = $particular_component_data->toArray();?>  
                  @foreach($all_component as $allc)
                      <?php $status='0'; $key=0; 



                      for ($i=0; $i <count($paticular_data) ; $i++) { 
                        if($allc->component_id == $paticular_data[$i]->component_id)
                        {
                          $status='1'; $key=$i;
                          break;
                        }
                      }

                      ?>
                      


                      


                       @if($status=='1')


                          <tr>
                            <td hidden>{{Form::text('component_id[]',$paticular_data[$key]->subject_component_id)}}</td>
                            <td>{{$paticular_data[$key]->component_name}}</td>
                            <td>{{Form::text('total_mark[]',$paticular_data[$key]->total_mark)}}</td>
                            <td>{{Form::text('pass_mark[]',$paticular_data[$key]->pass_mark)}} % </td>
                          </tr>
                      @else
                            <tr>                
                              <td hidden>{{Form::text('component_id[]',$allc->component_id)}}</td>
                              <td>{{$allc->component_name}}</td>
                              <td>{{Form::text('total_mark[]','')}}</td>
                              <td>{{Form::text('pass_mark[]','')}} % </td>
                            </tr> 


                      @endif

                  @endforeach

        
                     

  
                         

                            
                          
                      </tbody>
                    </table>

                </div>
              </div>





         

              <div class="form-actions">
              {{Form::submit('submit',['class'=>'btn btn-success'])}}
              </div>

            {{Form::close()}}
          </div>
        </div>
      </div>
    

  </div>
</div>
@stop