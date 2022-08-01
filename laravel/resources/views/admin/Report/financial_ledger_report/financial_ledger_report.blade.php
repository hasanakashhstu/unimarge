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
        <form method="post" action="financial_ledger_report_data">
            {{ @csrf_field() }}
            <table style="margin-top: 9%;margin-left: 5%" class="">
                <thead>
                    <tr>

                        <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                            Student Roll</th>
                        <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                            Class</th>
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
        </form>
        <div style="text-align:center;display:none;" class="gif">
            <img src="{{ asset('img/loading2.gif') }}" style="height: 150px;margin-top: 20px;" />
        </div>
        <div class="print">
            <div>
                <table style="margin-top: 60px;border: 0px solid gray;width: 95%;">
                    <td rowspan="2">
                        <h3 style="margin-left: 200px;">{{ Session::get('school.system_name') }}</h3>
                        <br>
                        <h4 style="margin-left: 240px;margin-top: -30px;">{{ Session::get('school.address') }}</h4>
                    </td>
                </table>
            </div>
            <span>Reporting Date - Print Date : {{ date('d-M-Y') }}</span>
            <hr style="width: 95%;margin-top: -2px;">

            <div class="report_data_table">
                @if ($fees_data)
                    {!! $fees_data !!}
                @endif
                @if (isset($all_data))
                    <table class="table" style="margin: 0 auto; padding: 20px 0">
                        <tr>
                            <td><strong>Roll : </strong>{{ $student_info->roll }}</td>
                            <td><strong>Roll : </strong>{{ $student_info->class }}</td>
                        </tr>
                        <tr>
                            <td><strong>Name : </strong>{{ $student_info->student_name }}</td>
                            <td><strong>Reg Number : </strong>{{ $student_info->reg_number }}</td>
                        </tr>
                    </table>
                    <table width="100%" border="1" class="table table-bordered">
                        <thead>
                            <th></th>
                            <th>Date</th>
                            <th>Particulars</th>
                            <th>Amount</th>
                            <th>Waiver</th>
                            <th>Total</th>
                            <th>Balance</th>
                        </thead>
                        <tbody>
                            @foreach ($all_data as $data)
                                <tr>
                                    <td colspan="7">
                                        <a><strong>Semester : </strong>{{ $data->class_name }},</a>
                                        <a><strong>Session : </strong>{{ $data->session }}</a>
                                    </td>
                                </tr>
                                @foreach ($data->invoice_details as $key => $invoice_details)
                                    <tr>
                                        @if ($key == 0)
                                            <td style="vertical-align: middle"
                                                rowspan="{{ count($data->invoice_details) }}">Payable</td>
                                        @endif
                                        <td></td>
                                        <td>{{ $invoice_details->component_name }}</td>
                                        <td>{{ $invoice_details->amount }}</td>
                                        @if ($key == 0)
                                            <td style="vertical-align: middle"
                                                rowspan="{{ count($data->invoice_details) }}">
                                                {{ $data->waber ? $data->waber : 0 }}</td>
                                            <td style="vertical-align: middle"
                                                rowspan="{{ count($data->invoice_details) }}">{{ $data->on_net_total }}
                                            </td>
                                        @endif
                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="9" style="border-bottom: 2px solid #DDD"></td>
                                </tr>
                                @foreach ($data->payment_details as $payment_data)
                                    @foreach ($payment_data->payment_details as $key2 => $payment_details)
                                        <tr>
                                            @if ($key2 == 0)
                                                <td style="vertical-align: middle"
                                                    rowspan="{{ count($payment_data->payment_details) }}">Paid</td>
                                            @endif
                                            <td>{{ date('d-M-Y', strtotime($payment_data->receipt_date)) }}</td>
                                            <td>{{ $payment_details->component_name }}</td>
                                            <td>{{ $payment_details->amount }}</td>
                                            @if ($key2 == 0)
                                                <td style="vertical-align: middle"
                                                    rowspan="{{ count($payment_data->payment_details) }}">0</td>
                                                <td style="vertical-align: middle"
                                                    rowspan="{{ count($payment_data->payment_details) }}">
                                                    {{ $payment_data->receipt_amount }}</td>
                                            @endif
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data->balance }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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
