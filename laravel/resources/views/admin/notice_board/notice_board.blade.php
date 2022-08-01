@extends('admin.index')
@section('Title', 'Notice Board')
@section('breadcrumbs', 'Notice Board')
@section('breadcrumbs_link', '/notice_board')
@section('breadcrumbs_title', 'Notice Board')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
            {{ Session::get('success') }}
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

    <div class="container">
        <h2><i class="fa fa-book" aria-hidden="true"></i>Notice</h2> <!-- Tab Heading  -->
        <p title="Transport Details">Notice Details</p> <!-- Transport Details -->

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Notice List</a></li>
            <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Notice</a></li>
        </ul>
        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <!-- report -->
                <!-- Main content -->
                <section class="content">
                    <!--report-->
                    <div class="tab-content">
                        <div id="all_notice_data" class="tab-pane fade in active">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"><i
                                            class="icon-th"></i></span>
                                    <h5>All Notice Data table</h5>
                                </div>

                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table">

                                        <thead>
                                            <tr>
                                                <th>Notice Title</th>
                                                <th>To</th>
                                                <th>Notice Subject</th>
                                                <th>Author</th>
                                                <th>Notice</th>
                                                <th>Notice Sent Date</th>

                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach ($notice_board_data as $all_data)
                                                <tr class="gradeX">
                                                    <td>{{ $all_data->notice_title }}</td>
                                                    <td>@php
                                                        if ($all_data->to == 'Option') {
                                                            echo 'All';
                                                        } else {
                                                            echo $all_data->to;
                                                        }
                                                    @endphp</td>
                                                    <td>{{ $all_data->notice_subject }}</td>
                                                    <td>{{ $all_data->author }}</td>
                                                    <td>{!! $all_data->Notice !!}</td>
                                                    <td>{{ $all_data->created_at }}</td>

                                                    <td class="center">
                                                        <div class="display_status">
                                                            {{ Form::open(['url' => "/notice_board/$all_data->notice_id/edit", 'method' => 'GET']) }}
                                                            {{ Form::submit('Edit', ['class' => 'btn btn-success']) }}
                                                            {{ Form::close() }}

                                                            {{ Form::open(['url' => "/notice_board/$all_data->notice_id", 'method' => 'DELETE']) }}
                                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger','onclick' => "return confirm('Are you sure you want to Remove ?')"]) }}
                                                            {{ Form::close() }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--report--->

            <div id="menu1" class="tab-pane fade">
                <div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Notice</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/notice_board','class' => 'form-horizontal','files' => true,'method' => 'post','name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}

                            <div hidden="hidden" class="control-group">
                                {{ Form::label('notice-id', 'Notice id', ['class' => 'control-label', 'title' => 'notice_title']) }}
                                <div class="controls">
                                    {{ Form::text('notice_id', time(), ['id' => 'required','placeholder' => 'Notice Title','title' => 'notice_id']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('notice_title', 'Notice Title', ['class' => 'control-label', 'title' => 'notice_title']) }}
                                <div class="controls">
                                    {{ Form::text('notice_title', '', ['id' => 'required','placeholder' => 'Notice Title','title' => 'notice_title']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('notice_subject', 'Notice Subject', ['class' => 'control-label', 'title' => 'notice_subject']) }}
                                <div class="controls">
                                    {{ Form::text('notice_subject', '', ['id' => 'required','placeholder' => 'Notice Subject','title' => 'notice_subject']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('author', 'Author', ['class' => 'control-label', 'title' => 'author']) }}
                                <div class="controls">
                                    {{ Form::text('author', '', ['id' => 'required', 'placeholder' => 'Author', 'title' => 'author']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('notice_department', 'Department Name', ['class' => 'control-label','title' => 'department_name']) }}
                                <div class="controls">
                                    @php $department_name['ALL']='ALL' @endphp
                                    @foreach ($manage_department as $manage_department_list)
                                        @php $department_name[$manage_department_list->department_code]=$manage_department_list->department_name @endphp
                                    @endforeach
                                    {{ Form::select('notice_department', $department_name, null, ['id' => 'notice_department','class' => 'notice_department']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('to', 'TO', ['class' => 'control-label', 'title' => 'to']) }}
                                <div class="controls">
                                    {{ Form::select('to',['Option' => 'Option', 'Student' => 'Student', 'Teacher' => 'Teacher', 'Class' => 'Class', 'Parents' => 'Parents'],null,['id' => 'select']) }}

                                </div>
                            </div>





                            <!-- //student wise Notice Part Add  -->

                            <div id="studenttype" hidden>

                                <div class="control-group">
                                    {{ Form::label('student_roll', 'Student Roll', ['class' => 'control-label', 'title' => 'student_roll']) }}
                                    <div class="controls">
                                        {{ Form::text('sw_student_roll', '', ['id' => 'required stuent_roll_wise_data','placeholder' => 'Student Roll','title' => 'student_roll','class' => 'stuent_roll_wise_data']) }}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {{ Form::label('student_name', 'Student Name', ['class' => 'control-label', 'title' => 'student_name']) }}
                                    <div class="controls">
                                        {{ Form::text('sw_student_name', '', ['id' => 'required','placeholder' => 'Student Name','title' => 'student_name','class' => 'sw_student_name']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('student_email', 'Student Email', ['class' => 'control-label', 'title' => 'student_email']) }}
                                    <div class="controls">
                                        {{ Form::text('sw_student_email', '', ['id' => 'required','placeholder' => 'Student Email','title' => 'student_email','class' => 'student_wise_email']) }}
                                    </div>
                                </div>





                                <div class="control-group">
                                    {{ Form::label('student_class', 'Student Class', ['class' => 'control-label', 'title' => 'student_class']) }}
                                    <div class="controls">
                                        {{ Form::text('sw_student_class', '', ['id' => 'required','placeholder' => 'Studennt Class','title' => 'student_class','class' => 'student_wise_class']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('student_section', 'Student Section', ['class' => 'control-label','title' => 'student_section']) }}
                                    <div class="controls">
                                        {{ Form::text('sw_student_section', '', ['id' => 'required','placeholder' => 'Student Section','title' => 'student_section','class' => 'student_wise_section']) }}
                                    </div>
                                </div>

                            </div>

                            <!-- ///Student Wise Data Add Part End  -->




                            <!-- Teacher wise data Add Part Start -->


                            <div id="teachertype" hidden>

                                <div class="control-group">
                                    {{ Form::label('teacher_name', 'Teacher Name', ['class' => 'control-label', 'title' => 'teacher_name']) }}
                                    <div class="controls">
                                        @php $teacher_name['ALL']='ALL' @endphp
                                        @foreach ($teacher_data as $teacher_list)
                                            @php $teacher_name[$teacher_list->teacher_name]=$teacher_list->teacher_name @endphp
                                        @endforeach
                                        {{ Form::select('tw_teacher_name', $teacher_name, null, ['id' => 'teacher', 'class' => 'teacher_name']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('teacher_email', 'Teacher Email', ['class' => 'control-label', 'title' => 'teacher_email']) }}
                                    <div class="controls">
                                        {{ Form::text('tw_teacher_email', '', ['id' => 'required','placeholder' => 'Teacher Email','title' => 'teacher_email','class' => 'tw_teacher_email']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('subject', 'Subject', ['class' => 'control-label', 'title' => 'subject']) }}
                                    <div class="controls">
                                        {{ Form::text('tw_subject', '', ['id' => 'required','placeholder' => 'Subject','title' => 'subject','class' => 'tw_subject']) }}
                                    </div>
                                </div>
                            </div>

                            <!-- Techer Wise Data add Part End -->





                            <!-- Class Wise Data Add Part Start -->
                            <div id="classtype" hidden>
                                <div class="control-group">
                                    {{ Form::label('class', 'Class', ['class' => 'control-label', 'title' => 'class']) }}
                                    <div class="controls">

                                        @foreach ($class_data as $class_list)
                                            @php $class_name[$class_list->class_name]=$class_list->class_name @endphp
                                        @endforeach

                                        {{ Form::select('cw_class', $class_name, null, ['id' => 'class', 'class' => 'class_name']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('department', 'Department', ['class' => 'control-label', 'title' => 'department']) }}
                                    <div class="controls">
                                        {{ Form::text('cw_department', '', ['id' => 'required','placeholder' => 'Department','title' => 'department','class' => 'cw_department']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('section', 'Section', ['class' => 'control-label', 'title' => 'section']) }}
                                    <div class="controls">
                                        {{ Form::text('cw_section', '', ['id' => 'required','placeholder' => 'Section','title' => 'section','class' => 'cw_section']) }}
                                    </div>
                                </div>


                            </div>
                            <!-- Class Wise Data add Part End  -->




                            <!--  Parent Wise Data add Part Start -->
                            <div id="parentstype" hidden>

                                <div class="control-group">
                                    {{ Form::label('parents_wise_student_roll', 'Student Roll', ['class' => 'control-label','title' => 'parents_wise_student_roll']) }}
                                    <div class="controls">
                                        {{ Form::text('pw_student_roll', '', ['id' => 'required','placeholder' => 'Student Roll','title' => 'parents_wise_student_roll','class' => 'parents_wise_student_roll']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('parents_wise_student_name', 'Student Name', ['class' => 'control-label','title' => 'parents_wise_student_name']) }}
                                    <div class="controls">
                                        {{ Form::text('pw_student_name', '', ['id' => 'required','placeholder' => 'Student Name','title' => 'parents_wise_student_name','class' => 'parents_wise_student_name']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('parents_name', 'Parents Name', ['class' => 'control-label', 'title' => 'parents_name']) }}
                                    <div class="controls">

                                        {{ Form::text('pw_parent_name', '', ['id' => 'required','placeholder' => 'Student Name','title' => 'pw_parent_name','class' => 'pw_parent_name']) }}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('parents_email', 'Parents Email', ['class' => 'control-label', 'title' => 'parents_email']) }}
                                    <div class="controls">
                                        {{ Form::text('pw_parents_email', '', ['id' => 'required','placeholder' => 'Parents Email','title' => 'parents_email','class' => 'pw_parents_email']) }}
                                    </div>
                                </div>
                            </div>
                            <!-- parents wise Data add part End  -->





                            <div class="control-group">
                                {{ Form::label('write_notice', 'Write Notice', ['class' => 'control-label', 'title' => 'write_notice']) }}
                                <div class="controls">
                                    {{ Form::textarea('Notice', '', ['col' => '20', 'rows' => '4', 'title' => 'Notice', 'id' => 'Notice']) }}
                                </div>
                            </div>
                            <div class="control-group">
                                {{ Form::label('file', 'Notice File', ['class' => 'control-label', 'title' => 'queston_file']) }}
                                <div class="controls">
                                    {{ Form::file('file') }}
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            {{ Form::submit('Submit', ['value' => 'Submit', 'class' => 'btn btn-success', 'style' => 'float:left;']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {



            $('#select').change(function() {
                var selection = $(this).val();


                if (selection == 'Student') {
                    $('#studenttype').show();
                    $('#teachertype').hide();
                    $('#classtype').hide();
                    $('#parentstype').hide();
                } else if (selection == 'Teacher') {
                    $('#teachertype').show();
                    $('#studenttype').hide();
                    $('#classtype').hide();
                    $('#parentstype').hide();
                } else if (selection == 'Class') {
                    $('#classtype').show();
                    $('#studenttype').hide();
                    $('#teachertype').hide();
                    $('#parentstype').hide();
                } else if (selection == 'Parents') {
                    $('#parentstype').show();
                    $('#studenttype').hide();
                    $('#teachertype').hide();
                    $('#classtype').hide();
                } else {
                    $('#studenttype').hide();
                    $('#teachertype').hide();
                    $('#classtype').hide();
                    $('#parentstype').hide();
                }
            });
        });


        $(document).ready(function() {

            $(".stuent_roll_wise_data").unbind().keyup(function() {

                var student_roll = $(".stuent_roll_wise_data").val();

                $.ajax({
                    url: '/notice_board_student_data_get',
                    type: "post",
                    data: {
                        'student_roll': student_roll,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(data) {

                        $(".sw_student_name").val(data.student_name);
                        $(".student_wise_email").val(data.email);
                        $(".student_wise_class").val(data.class);
                        $(".student_wise_section").val(data.section);

                        //$('#student_section').html(data);
                    }
                });



            });

            $(".teacher_name").unbind().change(function() {
                var teacher_name = $(this).val();
                $.ajax({
                    url: '/notice_board_teacher_data_get',
                    type: "post",
                    data: {
                        'teacher_name': teacher_name,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(data) {
                        $(".tw_teacher_email").val(data.email);
                        $(".tw_subject").val(data.work_department);

                    }
                });

            });

            $(".pw_parents_name").unbind().change(function() {

                var parents_name = $(this).val();
                $.ajax({
                    url: '/notice_board_parents_data_get',
                    type: "post",
                    data: {
                        'parents_name': parents_name,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(data) {
                        $(".pw_parents_email").val(data.email);
                    }
                });

            });
            $(".class_name").unbind().change(function() {

                var class_name = $(this).val();

                $.ajax({
                    url: '/notice_board_class_data_get',
                    type: "post",
                    data: {
                        'class_name': class_name,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(data) {
                        $(".cw_department").val(data.department_name);
                        $(".cw_section").val(data.section_name);
                    }
                });

            });
            $(".parents_wise_student_roll").unbind().keyup(function() {

                var student_roll = $(this).val();
                $.ajax({
                    url: '/notice_board_students_data_get',
                    type: "post",
                    data: {
                        'student_roll': student_roll,
                        '_token': $('input[name=_token]').val()
                    },
                    success: function(data) {
                        $(".parents_wise_student_name").val(data.student_name);
                        $(".pw_parent_name").val(data.name);
                        $(".pw_parents_email").val(data.email);
                    }
                });

            });


        });
    </script>

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#Notice');
        </script>
    @endpush

@stop
