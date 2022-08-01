@extends('admin.index')
@section('Title', 'advance_report')
@section('breadcrumbs', 'advance_report')
@section('breadcrumbs_link', '/advance')
@section('breadcrumbs_title', 'advance_report')
@section('content')


    <div class="container">
        <!-- Tab Heading  -->
        <h2 style="font-size: 36px;margin-left: 239px;margin-top: 48px;" title="Transport Details">
            {{ Session::get('school.system_name') }}</h2>
        <p style="font-size: 26px;margin-left: 414px;margin-bottom: 24px;margin-top: 23px;">
            {{ Session::get('school.address') }}</p>
        <p style="font-size: 28px;margin-left: 365px;margin-bottom: 56px;">Student Admission Register Report</p>
        <!-- Transport Details -->


        {{ Form::open(['url' => '/student_admission_register_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

        <table style="margin-top: 1%;
        margin-left: -1%;" class="">

            <thead style="margin-top: 1%;
        margin-left: -9%;">
                <tr style="background: #1F262D;height: 34px;     width: 150px;color: #fff;border: 1px solid white;">
                    <th>Applicant Id</th>
                    <th>Student Name</th>
                    <th>Session</th>
                    <th>Class</th>
                    <th>Department</th>
                    <th>Batch</th>
                    <th>Shift</th>
                    <th>Gender</th>
                    <th>Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ Form::text('applicant_id', '', ['style' => 'width: 100px', 'id' => 'applicant_id', 'class' => 'applicant_id']) }}
                    </td>
                    <td>{{ Form::text('student_name', '', ['style' => 'width: 100px', 'id' => 'student_name', 'class' => 'student_name']) }}
                    </td>
                    <td>
                        @php $session_data_array=[''=>'--select--']@endphp
                        @foreach ($session as $session_data)
                            @php
                                $session_data_array[$session_data->type_name] = $session_data->type_name;
                            @endphp
                        @endforeach
                        {{ Form::select('session', $session_data_array, null, ['style' => 'width: 100px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        @php $class_data_array=[''=>'--select--']@endphp
                        @foreach ($search as $search_data)
                            @php
                                $class_data_array[$search_data->class_name] = $search_data->class_name;
                            @endphp
                        @endforeach
                        {{ Form::select('class', $class_data_array, null, ['style' => 'width: 100px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        @php $dept_data_array=[''=>'--select--']@endphp
                        @foreach ($dept_data as $dept_data_value)
                            @php
                                $dept_data_array[$dept_data_value->department_name] = $dept_data_value->department_name;
                            @endphp
                        @endforeach
                        {{ Form::select('department', $dept_data_array, null, ['style' => 'width: 100px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        @php $bacth_data_array=[''=>'--select--']@endphp
                        @foreach ($batch as $bacth_data)
                            @php
                                $bacth_data_array[$bacth_data->type_name] = $bacth_data->type_name;
                            @endphp
                        @endforeach
                        {{ Form::select('batch', $bacth_data_array, null, ['style' => 'width: 183px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        @php $shift_data_array=[''=>'--select--']@endphp
                        @foreach ($shift as $shift_data)
                            @php
                                $shift_data_array[$shift_data->type_name] = $shift_data->type_name;
                            @endphp
                        @endforeach
                        {{ Form::select('shift', $shift_data_array, null, ['style' => 'width: 183px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        {{ Form::select('gender', ['' => '--select--', 'Male' => 'Male', 'Female' => 'Female'], null, ['style' => 'width: 183px', 'id' => 'session', 'class' => 'class']) }}
                    </td>
                    <td>
                        {{ Form::submit('Generate Report', ['style' => 'width: 125px;', 'class' => 'btn btn-success gif_show']) }}
                    </td>
                </tr>

            </tbody>
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

                @if ($table)
                    {!! $table !!}
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
                $(".gif_show").click(function() {
                    $(".gif").show();
                });

                $('#cmd').click(function() {
                    var doc = new jsPDF('p', 'pt', 'a4');
                    doc.addHTML($('.report_data_table'), 0, 20, {
                        'backgroundColor': '#FFFFFF',
                        'border': '2px solid white',
                    }, function() {
                        doc.save('report.pdf');
                    });
                });

            });

            function pop_print() {

                w = window.open(null, 'Print_Page', 'scrollbars=yes');

                w.document.write('<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');

                w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                w.document.write(jQuery('.print').html());


                w.document.close();
            }
        </script>


    @stop
