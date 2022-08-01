@extends('admin.index')
@section('Title', 'advance_report')
@section('breadcrumbs', 'advance_report')
@section('breadcrumbs_link', '/advance')
@section('breadcrumbs_title', 'advance_report')
@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Advance/Customize Report
        </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Daily Attandance's Report
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
            <!--
                      <div class="controls text-right">
                               <div data-toggle="buttons-checkbox" class="btn-group">
                                  <button  class="btn btn-default"  title='Export PDF' type="button"><a target="_blank" href="/daily_attendance_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                                  <button class="btn btn-default"  title='Export Excel' type="button"><a  href="/daily_attendance_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                                  <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/daily_attendance_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                                  <button class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>

                                </div>
                        </div> -->
        </div>

        {{ Form::open(['url' => '/advance_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

        <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">

                    <th>Student Roll</th>
                    <th>Student Reg</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Section</th>
                    <th>Phone No</th>
                    <th>Parent Name</th>
                    <th>Student Type</th>
                    <th>Gender</th>
                </tr>
            </thead>


            <tbody>
                <tr>



                    <td>{{ Form::text('student_roll', '', ['style' => 'width: 85px', 'id' => 'student_roll']) }}</td>

                    <td>{{ Form::text('student_reg', '', ['style' => 'width: 85px', 'id' => 'student_reg']) }}</td>



                    <td>
                        @php $class_data_array=[''=>'--select--']@endphp
                        @foreach ($class_data as $class_data_value)
                            @php
                                $class_data_array[$class_data_value->class_name] = $class_data_value->class_name;
                            @endphp
                        @endforeach
                        {{ Form::select('class', $class_data_array, null, ['style' => 'width: 85px', 'id' => 'class', 'class' => 'class']) }}
                    </td>

                    <td>{{ Form::select('department', ['' => '--select class--'], null, ['style' => 'width: 85px', 'id' => 'department']) }}
                    </td>
                    <td>{{ Form::select('section', ['' => '--select section--'], null, ['style' => 'width: 85px', 'id' => 'section']) }}
                    </td>
                    <td>{{ Form::text('phone_no', '', ['style' => 'width: 85px', 'id' => 'phone_no']) }}</td>
                    <td>{{ Form::text('parent_name', '', ['style' => 'width: 85px', 'id' => 'parent_name']) }}</td>
                    <td>{{ Form::select('student_type', ['' => '--select--', 'Regular' => 'Regular', 'Irregular' => 'Irregular'], null, ['style' => 'width: 85px', 'id' => 'student_type']) }}
                    </td>
                    <td>{{ Form::select('gender', ['' => '--select--', 'Male' => 'Male', 'Female' => 'Female'], null, ['style' => 'width: 85px', 'id' => 'gender']) }}
                    </td>

                </tr>

            </tbody>
        </table>
        <table border="1" style="margin-top: 20px;margin-left: 37px;width: 380px;">
            <tr>
                <td style="padding: 5px;">Student Name</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('student_name_get', 'student_name_get', false, ['id' => 'student_name_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Student Roll</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('student_roll_get', 'student_roll_get', false, ['id' => 'student_roll_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Student Reg</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('student_reg_get', 'student_reg_get', false, ['id' => 'student_reg_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Class</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('class_get', 'class_get', false, ['id' => 'class_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Parent Name</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('parent_name_get', 'parent_name_get', false, ['id' => 'parent_name_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Department</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('department_get', 'department_get', false, ['id' => 'department_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Section</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('section_get', 'section_get', false, ['id' => 'section_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Batch</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('batch_get', 'batch_get', false, ['id' => 'batch_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Shift</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('shift_get', 'shift_get', false, ['id' => 'shift_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Email</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('email_get', 'email_get', false, ['id' => 'email_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Phone No</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('phone_get', 'phone_get', false, ['id' => 'phone_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Student Type</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('student_type_get', 'student_type_get', false, ['id' => 'student_type_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;">Gender</td>
                <td style="padding: 5px;">
                    {{ Form::checkbox('gender_get', 'gender_get', false, ['id' => 'gender_get']) }}
                </td>
            </tr>
            <tr>
                <td style="padding: 5px;text-align: center;" colspan="2">
                    {{ Form::submit('Show', ['style' => 'width: 85px;', 'class' => 'btn btn-success gif_show']) }}
                </td>
            </tr>
        </table>


        {{ Form::close() }}

        <div style="text-align:center;display:none;" class="gif">
            <img src="{{ asset('img/loading2.gif') }}" style="height: 150px;margin-top: 20px;" />
        </div>
        <div class="print">
            <div>
                <table style="margin-top: 60px;border: 0px solid gray;width: 95%;">

                    <tr>
                        <td rowspan="2">

                            <h2 style="margin-left: 270px;">&nbsp;{{ Session::get('school.system_name') }}</h2>
                            <br>
                            <h4 style="margin-left: 495px;margin-top: -20px;">School EIIN:
                                {{ Session::get('school.postal_code') }}</h4>
                            <br>
                            <h4 style="margin-left: 320px;margin-top: -30px;">{{ Session::get('school.address') }}, Postal
                                Code-{{ Session::get('school.postal_code') }}</h4>
                        </td>
                    </tr>
                </table>
            </div>
            <span style="margin-left:20px">Reporting Date - Print Date : {{ date('d-M-Y') }}</span>
            <!-- <div style="border: 2px solid black"></div> -->
            <hr style="width: 95%;margin-top: 25px;border: 2px solid black;margin-left: 20px;">
            <hr style="width: 95%;margin-top: -18px;border: 2px solid black;margin-left: 20px;">


            <div class="report_data_table">
                @if ($data)
                    {!! $data !!}
                @endif

            </div>
        </div>
        @can('view report')
            <button style="margin-top: 22px;">
                <a id='print' onclick="pop_print()" media='print' target="_blank" title='Print' type="button"><i
                        class="fa fa-print" aria-hidden="true"></i></a>
            </button>
            <button style="margin-top: 22px;">
                <a media='pdf' id="cmd" title='Pdf' type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </button>
        @endcan

        <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".class").unbind().change(function() {
                    var class_name = $(this).val();
                    $.ajax({
                        url: '/advance_report_department',
                        type: 'POST',
                        data: {
                            'class_name': class_name,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            console.log(data);
                            if (data[0]) {
                                $("#department").html("");
                                for (var i = 0; i <= data.length; i++) {

                                    $("#department").append("<option>" + data[i].department_name +
                                        "</option>");
                                }
                            } else {
                                $("#department").append("<option>No Department Found</option>");

                            }
                        }
                    });

                    $.ajax({
                        url: '/advance_report_section',
                        type: 'POST',
                        data: {
                            'class_name': class_name,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            console.log(data);
                            if (data[0]) {
                                $("#section").html("");
                                for (var i = 0; i <= data.length; i++) {

                                    $("#section").append("<option>" + data[i].section_name +
                                        "</option>");
                                }
                            } else {
                                $("#section").append("<option>No Department Found</option>");

                            }
                        }
                    });

                });

                $(".gif_show").click(function() {
                    $(".gif").show();
                });



                // $('#cmd').click(function () {
                //   var doc = new jsPDF();
                //   var specialElementHandlers = {
                // '#editor': function (element, renderer) {
                //     return true;
                // }
                // };
                //     doc.fromHTML($('.report_data_table').html(), 15, 15, {
                //         'width': 170,
                //             'elementHandlers': specialElementHandlers
                //     });
                //     doc.save('sample-file.pdf');
                // });

                $('#cmd').click(function() {
                    var doc = new jsPDF('p', 'pt', 'a4');
                    doc.addHTML($('.print'), 0, 20, {
                        'backgroundColor': '#FFFFFF',
                        'border': '2px solid white',
                    }, function() {
                        doc.save('report.pdf');
                    });
                });

            });

            function pop_print() {
                w = window.open(null, 'Print_Page', 'scrollbars=yes');

                w.document.write('<style>@page{border:black 1px solid}</style><html><head><title></title>');

                w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                w.document.write(jQuery('.print').html());


                w.document.close();
            }
        </script>

    @stop
