@extends('admin.index')
@section('Title','Academic Syllabus')
@section('breadcrumbs','Academic Syllabus')
@section('breadcrumbs_link','/academic_syllabus')
@section('breadcrumbs_title','Academic Syllabus')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif
@if (Session::has('Error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('Error') }}
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
    <h2>  <i class="fa fa-check-square-o" aria-hidden="true">
    </i> Academic Syllabus Details Edit</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} Academic Syllabus Details Edit</p> <br/> <!-- Transport Details -->

     
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
           <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage Class</a></li>
            <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Manage Section</a></li>
            <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage Department</a></li>
           <li><a href='/academic_syllabus'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                  <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/academic_syllabus_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                  <button class="btn btn-default" title='Export Excel' type="button"><a  href="/academic_syllabus_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                  <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/academic_syllabus_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                 
                  <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
                </div>
        </div>
</div>


  <div class="tab-content"> <!-- Transport List Report  -->

        
     

     
        <div>
      
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Academic Syllabus</h5>
            </div>
        
            <div class="widget-content nopadding">
            {{Form::open(['url'=>"/academic_syllabus/$academic_syllabus_data->id",'class'=>'form-horizontal','files'=>True,'method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           
            
              <div class="control-group">
                
              {{Form::label('Title','',['class'=>'control-label'])}}
                <div class="controls">
                  {{Form::text('title',$academic_syllabus_data->title,['title'=>'title'])}}
                </div>
              </div>

              <div class="control-group">
                
                {{Form::label('description','',['class'=>'control-label'])}}
                <div class="controls">
                {{Form::text('description',$academic_syllabus_data->description,['id'=>'description','title'=>'description'])}}
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Class</label>
                <div class="controls">
                @php $class_list[$academic_syllabus_data->class_name]=$academic_syllabus_data->class_name @endphp
                @foreach($class_data as $class_list_data)
                    @php $class_list[$class_list_data->class_name]=$class_list_data->class_name @endphp
                @endforeach
                 
                  {{Form::select('class_name',$class_list,null,['id'=>'class_name'])}}
                </div>
              </div>

              <div class="control-group">
                
              {{Form::label('Subject','',['class'=>'control-label'])}}
                <div class="controls">
                 
                  {{Form::select('subject',["$academic_syllabus_data->subject"=>"$academic_syllabus_data->subject"],null,['id'=>'subject'])}}
                </div>
              </div>

              <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[$academic_syllabus_data->medium=>$academic_syllabus_data->medium]
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
            {{Form::label('academic_syllebus_file','Academic Syllebus File',['class'=>'control-label','title'=>'queston_file'])}}
                <div class="controls">
                {{Form::file('files',['onchange'=>'readURL(this)'])}}
                <font color="red">PDF File Only Upload Here</font>
                </div>
            </div>
            <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <embed src="img/backend/academic_syllabus/{{$class_list_data->class_name}}.pdf" width="80px" height="60px"/>
                          </div>
              </div>


              <div class="control-group" hidden="hidden">
                {{Form::label('uploader','',['class'=>'control-label'])}}
               
                <div class="controls">
                {{Form::text('uploader',Auth::user()->name,['id'=>'description','title'=>'description'])}}
                </div>
              </div>

              <div class="form-actions">
              {{Form::submit('Update syllabus',['class'=>'btn btn-success'])}}
              </div>

            {{Form::close()}}
      </div>

      </div>
    </div>
      </div>
  
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
    <script type="text/javascript" src="{{asset('extra_js/academic_syllabus.js')}}"></script>
@endpush

@stop


