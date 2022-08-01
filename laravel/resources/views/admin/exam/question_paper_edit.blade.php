@extends('admin.index')
@section('Title','Question Paper Edit')
@section('breadcrumbs','Question Paper Edit')
@section('breadcrumbs_link','/question_edit')
@section('breadcrumbs_title','Question Paper Edit')

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
    <h2><i class="fa fa-list" aria-hidden="true"></i> Question Paper</h2> <!-- Tab Heading  -->
  <p title="Transport Details">I SchoolExam List Details</p> <!-- Transport Details -->

    
        <div>
          <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Exam List</h5>
              </div>

              <div class="widget-content nopadding">
              {{Form::open(['url'=>"/question_paper/$question->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','files'=>'true','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                

                <div class="control-group">
              {{Form::label('title','Title',['class'=>'control-label','title'=>'class_name'])}}
                  <div class="controls">
                      {{Form::text('disabled_title',$question->title,['disabled' => 'disabled'])}}   
                      {{Form::hidden('file_title',$question->title)}}  
                      {{Form::hidden('file_extension',$question->file_extension)}}    
                  </div>
                </div>


                <div class="control-group">
              {{Form::label('class_name','Class Name',['class'=>'control-label','title'=>'class_name'])}}
                  <div class="controls">
                      @php $class[$question->class_name]=$question->class_name @endphp
                      @foreach($manage_class as $manage_class_list)
                      @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                      @endforeach

                      {{Form::select('class_name',$class)}}
                      </div>
                </div>



                    <div class="control-group">
                      {{Form::label('section_name','Section Name',['class'=>'control-label','title'=>'section_name'])}}
                        <div class="controls">
                        @php $section[$question->section_name]=$question->section_name @endphp
                        @foreach($manage_section as $manage_section_list)
                            @php $section[$manage_section_list->section_name]=$manage_section_list->section_name @endphp
                          @endforeach

                          {{Form::select('section_name',$section)}}
                        </div>
                    </div>
                    <div class="control-group">
                      {{Form::label('exam_name','Exam Name',['class'=>'control-label','title'=>'exam_name'])}}
                          <div class="controls">
                          @php 
                            $exams_list[$question->exam_name]=$question->exam_name @endphp
                          @foreach($exam_lsit as $exam_lsit_data)
                             @php $exams_list[$exam_lsit_data->exam_name]=$exam_lsit_data->exam_name @endphp
                          @endforeach
                           
                            {{Form::select('exam_name',$exams_list)}}
                          </div>
                      </div>
                      <div class="control-group">
                      {{Form::label('department','Department',['class'=>'control-label','title'=>'department'])}}
                          <div class="controls">
                          @php $department_data[$question->department]=$question->department @endphp
                          @foreach($department as $department_list)
                             @php $department_data[$department_list->department_name]=$department_list->department_name @endphp
                          @endforeach
                            {{Form::select('department',$department_data)}}
                          </div>
                      </div>
                      <div class="control-group">
                      {{Form::label('teacher name','Teacher Name',['class'=>'control-label','title'=>'teacher_name'])}}
                          <div class="controls">
                          @php $teachers_list[$question->teacher_name]=$question->teacher_name @endphp
                          @foreach($teacher_lsit as $teacher_lsit_data)
                             @php $teachers_list[$teacher_lsit_data->teacher_name]=$teacher_lsit_data->teacher_name @endphp
                          @endforeach
                           
                            {{Form::select('teacher_name',$teachers_list)}}
                          </div>
                      </div>
                      <script type="text/javascript">
                          function readURL(input) {
                            if (input.files && input.files[0])
                                {
                                  var reader = new FileReader();
                                  reader.onload = function (e)
                                  {
                                          $('#blah')
                                              .attr('src', e.target.result)
                                              .width(200)
                                              .height(200);
                                  };
                                  reader.readAsDataURL(input.files[0]);
                                }
                          }
                        </script>


                        <div class="control-group">
                        {{Form::label('queston_file','Question File',['class'=>'control-label','title'=>'queston_file'])}}
                            <div class="controls">
                            {{Form::file('files',['onchange'=>'readURL(this)'])}}
                            </div>
                        </div>


                        <div class="control-group">
                        <label class="control-label"></label>
                        <div class="controls">
                            <embed src="img/backend/question_paper/{{$question->exam_name}}.pdf" width="80px" height="60px"/>
                          </div>
                      </div>

                    


                    <div class="form-actions">
                      {{Form::submit('submit',['class'=>'btn btn-primary','value'=>'Add Exam'])}}
                    </div>
                {{Form::close()}}
              </div>
            </div>
      </div>




@stop

