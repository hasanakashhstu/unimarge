@extends('admin.index')
@section('Title', 'advance_report')
@section('breadcrumbs', 'advance_report')
@section('breadcrumbs_link', '/advance')
@section('breadcrumbs_title', 'advance_report')
@section('content')
    <link href='https://fonts.googleapis.com/css?family=Almendra Display' rel='stylesheet'>
    <style>
        .tec {
            font-family: 'Almendra Display';
            font-size: 55px;
        }

    </style>
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Customize Student Marksheet Report
        </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Student Marksheet Report
        </p><br />
        <!-- Transport Details -->

        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/daily_attendance'><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Add Daily
                                Attendance</a></li>
                        <li><a href='/teacher_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Teacher</a></li>
                        <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's Report
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>

        <table style="margin-top: 4%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">
                    <th>Exam Name</th>
                    <th>Class Name</th>
                    <th>Section Name</th>
                    <th>Department Name</th>
                    <th>Session</th>
                    <th>Generate Report</th>
                </tr>
            </thead>


            <tbody>
                <tr>

                    @php
                        $exam_list_array = ['' => '--Select--'];
                    @endphp
                    @foreach ($exam_list as $fetch_exam_list)
                        @php
                            $exam_list_array[$fetch_exam_list->exam_name] = $fetch_exam_list->exam_name;
                        @endphp
                    @endforeach

                    @php
                        $class_list_array = ['' => '--Select--'];
                    @endphp
                    @foreach ($class_list as $fetch_class_list)
                        @php
                            $class_list_array[$fetch_class_list->class_name] = $fetch_class_list->class_name;
                        @endphp
                    @endforeach
                    <td>
                        {{ Form::select('exam_name', $exam_list_array, null, ['style' => 'width: 157px', 'class' => 'exam_name']) }}
                    </td>
                    <td>
                        {{ Form::select('class_name', $class_list_array, null, ['style' => 'width: 157px', 'class' => 'class_name']) }}
                    </td>
                    <td>
                        {{ Form::select('section', ['' => 'Section Name'], null, ['class' => 'section', 'style' => 'width: 126px']) }}
                    </td>
                    <td>
                        {{ Form::select('department_name', ['' => 'Department Name'], null, ['style' => 'width: 157px', 'class' => 'department_name']) }}
                    </td>

                    <td>
                        @php
                            $session_list_array[] = '--Select--';
                        @endphp
                        @foreach ($session as $session_list)
                            @php $session_list_array[$session_list->type_name]=$session_list->type_name @endphp
                        @endforeach
                        {{ Form::select('session', $session_list_array, null, ['style' => 'width: 157px', 'class' => 'session']) }}
                    </td>

                    <td>
                        {{ Form::button('Generate Report', [
                            'class' => 'btn btn-success',
                            'id' => 'student_marks_report',
                            'style' => 'width: 152px;
                            margin-top: -8px;',
                        ]) }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        {{-- Report Body Start  Here --}}

        <div class="report_view"></div>
        @can('view report')
            <button style="margin-top: 22px;">
                <a id='print' onclick="pop_print()" media='print' target="_blank" title='Print' type="button"><i
                        class="fa fa-print" aria-hidden="true"></i></a>
            </button>
            <button style="margin-top: 22px;">
                <a media='pdf' id="cmd" title='Pdf' type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </button>
        @endcan




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @push('custom-scripts')
            <script type="text/javascript">
                $('.class_name').unbind().change(function() {
                    var class_name = $('.class_name').val();
                    $.ajax({
                        url: '/class_w_department_filter',
                        type: "post",
                        data: {
                            'class_name': class_name,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            $('.department_name').html(data);
                        }
                    });


                    $.ajax({
                        url: '/class_w_section_filter',
                        type: "post",
                        data: {
                            'class_name': class_name,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            $('.section').html(data);
                        }
                    });


                });

                $("#student_marks_report").click(function() {
                    var exam_name = $(".exam_name").val();
                    var class_name = $(".class_name").val();
                    var section = $(".section").val();
                    var department_name = $(".department_name").val();
                    var session = $(".session").val();
                    if (exam_name == '') {
                        toastr.error("Please Select Exam Name");
                        return false;
                    } else if (class_name == '') {
                        toastr.error("Please Select Class Name");
                        return false;
                    } else if (section == '') {
                        toastr.error("Please Select Section");
                        return false;
                    } else if (department_name == '') {
                        toastr.error("Please Select Department");
                        return false;
                    } else if (session == '' || session == '0') {
                        toastr.error("Please Select Session");
                        return false;
                    } else {

                        $('html,body').css('cursor', 'wait');
                        $("html").css({
                            'background-color': 'black',
                            'opacity': '0.5'
                        });
                        $("body").css('pointer-events', 'none');

                        $.ajax({
                            url: '/marks_report',
                            type: "POST",
                            data: {
                                'exam_name': exam_name,
                                'class_name': class_name,
                                'section': section,
                                'department_name': department_name,
                                'session': session,
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                $(".report_view").html(response);
                                $("html").css({
                                    'background-color': '',
                                    'opacity': ''
                                });
                                $("body").css('pointer-events', '');
                                $('html,body').css('cursor', 'default');
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                toastr.error("Please Try Again Later");
                                $("html").css({
                                    'background-color': '',
                                    'opacity': ''
                                });
                                $("body").css('pointer-events', '');
                                $('html,body').css('cursor', 'default');
                            }
                        });
                    }
                });

                function pop_print() {
                    w = window.open(null, 'Print_Page', 'scrollbars=yes');

                    w.document.write('<style>@page{border:black 1px solid}</style><html><head><title></title>');

                    w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                    w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                    w.document.write(jQuery('.report_view').html());
                    w.document.close();
                }
            </script>
        @endpush
    @stop
