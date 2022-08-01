@extends('admin.index')
@section('Title', 'advance_report')
@section('breadcrumbs', 'advance_report')
@section('breadcrumbs_link', '/advance')
@section('breadcrumbs_title', 'advance_report')
@section('content')


    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Fees Collection Data table</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Applicant Report</p>
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
        {{ Form::open(['url' => '/fees_collection_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        <table style="    margin-top: 9%;
        margin-left: 5%" class="">

            <thead>
                <tr>

                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Student Roll</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Class</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">From
                        Date</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">To
                        Date</th>
                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ Form::text('student_roll', '', ['style' => 'width: 170px', 'id' => 'student_roll', 'class' => 'student_roll']) }}
                    </td>
                    <td>
                        @php
                            $class_data_array = ['' => '--select--'];
                        @endphp
                        @foreach ($class_data as $class_data_fetch)
                            @php
                                $class_data_array[$class_data_fetch->class_name] = $class_data_fetch->class_name;
                                
                            @endphp

                        @endforeach
                        {{ Form::select('class', $class_data_array, null, ['style' => 'width: 183px', 'id' => 'fees_class', 'class' => 'class']) }}
                    </td>


                    <td>{{ Form::date('from_date', '', ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:170px', 'id' => 'from_date']) }}
                    </td>
                    <td>{{ Form::date('to_date', '', ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:170px', 'id' => 'to_date']) }}
                    </td>
                    <td>{{ Form::submit('Generate Report', [
                        'style' => 'width: 188px;
                        margin-bottom: 2px;',
                        'class' => 'btn btn-success gif_show',
                        'id' => 'report_show_btn',
                        'disabled',
                    ]) }}
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
                    <td rowspan="2">
                        <h3 style="margin-left: 300px;">{{ Session::get('school.system_name') }}</h3>
                        <br>
                        <h4 style="margin-left: 440px;margin-top: -30px;">{{ Session::get('school.address') }}</h4>
                    </td>
                </table>
            </div>
            <span>Reporting Date - Print Date : {{ date('d-M-Y') }}</span>
            <hr style="width: 95%;margin-top: -2px;">

            <div class="report_data_table">
                @if ($fees_data)
                    {!! $fees_data !!}
                @endif


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
                    $('#student_roll').keyup(function() {
                        var class_name = $('#fees_class').val();
                        var roll = $('#student_roll').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        // alert(class_name);
                        if (class_name.length == 0 && roll.length == 0 && from_date.length == 0 && to_date.length ==
                            0) {
                            $('#report_show_btn').attr('disabled', 'disabled');
                        } else {
                            $('#report_show_btn').removeAttr('disabled');
                        }

                    });
                    $('#fees_class').change(function() {
                        var class_name = $('#fees_class').val();
                        var roll = $('#student_roll').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        // alert(class_name);
                        if (class_name.length == 0 && roll.length == 0 && from_date.length == 0 && to_date.length ==
                            0) {
                            $('#report_show_btn').attr('disabled', 'disabled');
                        } else {
                            $('#report_show_btn').removeAttr('disabled');
                        }

                    });
                    $('#from_date').change(function() {
                        var class_name = $('#fees_class').val();
                        var roll = $('#student_roll').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        // alert(from_date);
                        // alert(class_name);
                        if (class_name.length == 0 && roll.length == 0 && from_date.length == 0 && to_date.length ==
                            0) {
                            $('#report_show_btn').attr('disabled', 'disabled');
                        } else {
                            $('#report_show_btn').removeAttr('disabled');
                        }

                    });
                    $('#to_date').change(function() {
                        var class_name = $('#fees_class').val();
                        var roll = $('#student_roll').val();
                        var from_date = $('#from_date').val();
                        var to_date = $('#to_date').val();
                        // alert(class_name);
                        if (class_name.length == 0 && roll.length == 0 && from_date.length == 0 && to_date.length ==
                            0) {
                            $('#report_show_btn').attr('disabled', 'disabled');
                        } else {
                            $('#report_show_btn').removeAttr('disabled');
                        }

                    });
                    $(".gif_show").click(function() {
                        $(".gif").show();

                    });

                });

                function pop_print() {
                    w = window.open(null, 'Print_Page', 'scrollbars=yes');
                    w.document.write("<span><?php echo Session::get('school.system_name'); ?></span></br>");
                    w.document.write("<span><?php echo Session::get('school.school_eiin'); ?></span></br>");
                    w.document.write("<span><?php echo Session::get('school.address'); ?></span></br>");
                    w.document.write("<span><?php echo Session::get('school.Phone'); ?></span></br>");
                    w.document.write("<span><?php echo Session::get('school.Phone'); ?></span></br>");
                    w.document.write("<span><?php echo Session::get('school.postal_code'); ?></span>");
                    w.document.write(jQuery('.print').html());
                    w.document.write('<style>@page{size:landscape;}</style><html><head><title></title>');
                    w.document.write("<link href='/css/bootstrap.min.css'>");
                    w.document.close();
                    w.print();
                }
            </script>



        @stop
