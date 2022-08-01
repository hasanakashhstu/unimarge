@extends('admin.index')
@section('Title', 'Question Paper')
@section('breadcrumbs', 'Question Paper')
@section('breadcrumbs_link', '/question_paper')
@section('breadcrumbs_title', 'Question Paper')

@section('content')


    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif


    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade in">
            <ul style='list-style:none'>
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div hidden="hidden" class="modal fade" id="myModal" style="width: 50%; height: 80%" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;File View</h4>
                </div>

                <div id='file_div'>sss</div>

                <div class="text-center"><input type="button" value="Download" onclick="printDiv()" id="print_admit_card"
                        class="btn btn-success" name=""></div>
            </div>
        </div>
    </div>





    <div class="container">
        <h2><i class="fa fa-file-text" aria-hidden="true"></i>Question Paper</h2> <!-- Tab Heading  -->
        <p title="Transport Details">I School Management Qustion Paper</p> <!-- Transport Details -->

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars"
                        aria-hidden="true"></i>Question</a></li>
            @can('create exam')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Qustion </a>
                </li>
            @endcan
        </ul>
        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Exam</th>
                                    <th>Department</th>
                                    <th>files</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($question as $question_data)
                                    <tr class="gradeX">
                                        <td>{{ $question_data->class_name }}</td>
                                        <td>{{ $question_data->section_name }}</td>
                                        <td>{{ $question_data->exam_name }}</td>
                                        <td>{{ $question_data->department }}</td>
                                        @php $src="img/backend/question_paper/$question_data->exam_name.pdf"; @endphp

                                        <td style="font-size: 24px">
                                            <!-- <embed src="img/backend/question_paper/{{ $question_data->exam_name }}.pdf" width="80px" height="60px"/> -->
                                            @if ($question_data->file_extension == 'pdf')
                                                <a file_extension="<?php echo $question_data->file_extension; ?>"
                                                    file_title="<?= $question_data->title ?>" data-toggle='modal'
                                                    data-target='#myModal' class="file_jquery" id="file_jquery" href="#">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                </a>

                                            @elseif($question_data->file_extension == 'doc' || 'docx' || 'odt')
                                                <a file_extension="<?php echo $question_data->file_extension; ?>"
                                                    file_title="<?= $question_data->title ?>" data-toggle='modal'
                                                    data-target='#myModal' class="file_jquery" id="file_jquery" href="">
                                                    <i class="fa fa-file-word-o" aria-hidden="true"></i>
                                                </a>
                                            @elseif($question_data->file_extension == 'xlsx' || 'csv')
                                                <a file_extension="<?php echo $question_data->file_extension; ?>"
                                                    file_title="<?= $question_data->title ?>" data-toggle='modal'
                                                    data-target='#myModal' class="file_jquery" id="file_jquery" href="#">
                                                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="center">

                                            <div class="display_status">
                                                @can('edit exam')
                                                    {{ Form::open(['url' => "question_paper/$question_data->id/edit", 'method' => 'GET']) }}
                                                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                    {{ Form::close() }}
                                                @endcan
                                                @can('delete exam')

                                                    {{ Form::button('DELETE', ['class' => 'btn btn-danger applicant_student_delete', 'value' => $question_data->id]) }}
                                                @endcan
                                                @can('view exam')
                                                    {{ Form::open(['url' => "question_paper_download/$question_data->title/$question_data->file_extension", 'method' => 'GET']) }}
                                                    {{ Form::submit('Download', ['class' => 'btn btn-danger qstn', 'value' => '']) }}
                                                    {{ Form::close() }}
                                                @endcan


                                            </div>
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
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Question Paper</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {{ Form::open(['url' => 'question_paper', 'class' => 'form-horizontal', 'method' => 'post', 'files' => true, 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                        <div class="control-group">
                            {{ Form::label('class_name', 'Class Name', ['class' => 'control-label', 'title' => 'class_name']) }}
                            <div class="controls">

                                @foreach ($manage_class as $manage_class_list)
                                    @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                @endforeach

                                {{ Form::select('class_name', $class) }}
                            </div>
                        </div>

                        <div class="control-group">
                            {{ Form::label('section_name', 'Section Name', ['class' => 'control-label', 'title' => 'section_name']) }}
                            <div class="controls">

                                @foreach ($manage_section as $manage_section_list)
                                    @php $section[$manage_section_list->section_name]=$manage_section_list->section_name @endphp
                                @endforeach

                                {{ Form::select('section_name', $section) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('exam_name', 'Exam Name', ['class' => 'control-label', 'title' => 'exam_name']) }}
                            <div class="controls">
                                @php $exams_list['']="" @endphp
                                @foreach ($exam_lsit as $exam_lsit_data)
                                    @php $exams_list[$exam_lsit_data->exam_name]=$exam_lsit_data->exam_name @endphp
                                @endforeach

                                {{ Form::select('exam_name', $exams_list) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('department', 'Department', ['class' => 'control-label', 'title' => 'department']) }}
                            <div class="controls">
                                @foreach ($department as $department_list)
                                    @php $department_data[$department_list->department_name]=$department_list->department_name @endphp
                                @endforeach
                                {{ Form::select('department', $department_data) }}
                            </div>
                        </div>
                        <div class="control-group">
                            {{ Form::label('teacher name', 'Teacher Name', ['class' => 'control-label', 'title' => 'teacher_name']) }}
                            <div class="controls">
                                @foreach ($teacher_lsit as $teacher_lsit_data)
                                    @php $teachers_list[$teacher_lsit_data->teacher_name]=$teacher_lsit_data->teacher_name @endphp
                                @endforeach

                                {{ Form::select('teacher_name', $teachers_list) }}
                            </div>
                        </div>



                        <div class="control-group">
                            {{ Form::label('queston_file', 'Question File', ['class' => 'control-label', 'title' => 'queston_file']) }}
                            <div class="controls">
                                {{ Form::file('files', ['onchange' => 'readURL(this)']) }}
                                <br><span style="color: red">File Must upload in this Extension ( doc,docx,pdf,odt,csv
                                    )</span>
                            </div>
                        </div>


                        <div class="form-actions">
                            {{ Form::submit('Submit', ['value' => 'Submit', 'class' => 'btn btn-success']) }}
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>





            </div>

        </div>
    </div>








    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/exam.js') }}"></script>
    @endpush



@stop
