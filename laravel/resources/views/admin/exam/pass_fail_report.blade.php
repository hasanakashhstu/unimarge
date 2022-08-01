@extends('admin.index')
@section('Title', 'pass_fail_report')
@section('breadcrumbs', 'pass_fail_report')
@section('breadcrumbs_link', '/pass_fail_report')
@section('breadcrumbs_title', 'pass_fail_report')
@section('content')

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong> {{ Session::get('error') }}
        </div>

    @endif
    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Pass Fail Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Pass Fail Report</p>
        <!-- Transport Details -->

        <div class="panel panel-default text-left" style='margin-top: 3%;'>
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href='/aplicant_student'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant
                            Student</a></li>
                    <li><a href='/admit_student'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Admit Student</a>
                    </li>
                    <li><a href='/student_promoation'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student
                            Promoation </a></li>

                </ul>
            </div>
        </div>

        <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
                <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                        href="/applicant_student_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Export Excel' type="button"><a href="/applicant_student_excel"><i
                            class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                        href="/applicant_student_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                        aria-hidden="true"></i></button>
            </div>
        </div>
        {{ Form::open(['url' => '/pass_fail_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        <table style="margin-top: 9%;
           margin-left: 24px;" class="">

            <thead>
                <tr>


                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">Exam
                        Name</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Class Name</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Section Name</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Department Name</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Default Session</th>

                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    @php $exam_list_array['']="Exam Name" @endphp
                    @foreach ($exam_list as $exam_list_data)
                        @php $exam_list_array[$exam_list_data->exam_name]=$exam_list_data->exam_name @endphp
                    @endforeach

                    @php $class_list_data_array['']="Class Name" @endphp
                    @foreach ($class_list as $class_list_data)
                        @php $class_list_data_array[$class_list_data->class_name]=$class_list_data->class_name @endphp
                    @endforeach

                    <td>
                        {{ Form::select('exam_name', $exam_list_array, null, ['id' => 'exam_info', 'style' => 'width: 186px']) }}
                    </td>
                    <td>
                        {{ Form::select('class_name', $class_list_data_array, null, ['style' => 'width: 186px', 'id' => 'class_info']) }}
                    </td>
                    <td>
                        {{ Form::select('section', ['' => 'Section Name'], null, ['id' => 'section_info', 'style' => 'width: 186px']) }}
                    </td>
                    <td>
                        {{ Form::select('Department', ['' => 'Department Name'], null, ['id' => 'Department_info', 'style' => 'width: 186px']) }}
                    </td>

                    <td>

                        @php
                            $session_array = [$general_settings->default_session => $general_settings->default_session];
                        @endphp
                        @foreach ($session as $session_data)
                            @php
                                $session_array[$session_data->type_name] = $session_data->type_name;
                            @endphp
                        @endforeach

                        {{ Form::select('default_session', $session_array, null, ['id' => 'default_session', 'style' => 'width: 186px']) }}
                    </td>
                    <td>
                        {{ Form::submit('Generate Report', ['style' => 'width: 182px;', 'class' => 'btn btn-success gif_show']) }}
                    </td>



                </tr>

            </tbody>
        </table>
        {{ Form::close() }}
        <div style="text-align:center;display:none;" class="gif">
            <img src="{{ asset('img/loading.gif') }}" style="height: 150px;margin-top: 20px;" />
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
                            <h4 style="margin-left: 363px;margin-top: -30px;">{{ Session::get('school.address') }}, Postal
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
                @if ($publish_status != '')
                    <div style="border: solid red;margin-top: 63px;width: 931px;margin-left: 131px;">
                        <img style="margin-left: 445px;height: 73px;"
                            src="{{ URL::asset('/img/cross_unpublish_img.jpg') }}">
                        <h4 style="margin-left: 352px;font-size: 28px;"><strong>{!! $publish_status !!}</strong></h4>
                    </div>
                @else
                    {!! $all_data !!}
                @endif


            </div>
        </div>
        @can('view exam')
            <button style="margin-top: 22px;">
                <a id='print' onclick="pop_print()" media='print' target="_blank" title='Print' type="button"><i
                        class="fa fa-print" aria-hidden="true"></i></a>
            </button>
            <button style="margin-top: 22px;">
                <a media='pdf' id="cmd" title='Pdf' type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </button>
        @endcan


        <style type="text/css">
            @font-face {
                font-family: Barcode;
                font-weight: bold;
                src: url('font-awesome/barcode/BarcodeFont.ttf');
            }

        </style>





        <script>

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        @push('custom-scripts')
            <script type="text/javascript" src="{{ asset('extra_js/applicant_student_report.js') }}"></script>
        @endpush
        <script type="text/javascript">
            $(document).ready(function() {


                        $(".gif_show").click(function() {
                            $(".gif").show();

                        });


                        function pop_print() {

                            w = window.open(null, 'Print_Page', 'scrollbars=yes');

                            w.document.write(
                                '<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');

                            w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                            w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                            w.document.write(jQuery('.print').html());


                            w.document.close();
                        }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @push('custom-scripts')
            <script type="text/javascript" src="{{ asset('extra_js/exam.js') }}"></script>
        @endpush


    @stop
