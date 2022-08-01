@extends('admin.index')
@section('Title', 'Student Apprisal Report')
@section('breadcrumbs', 'Student Apprisal Report')
@section('breadcrumbs_link', '/student_apprisal_report')
@section('breadcrumbs_title', 'Student Apprisal Report')

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


    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Apprisal Template Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Apprisal Report</p> <!-- Transport Details -->

        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/student_apprisal'><i class="fa fa-address-card-o" aria-hidden="true"></i> Apprisal</a>
                        </li>
                        <li><a href='/student_apprisal_component'><i class="fa fa-street-view"
                                    aria-hidden="true"></i>Apprisal Template</a></li>
                        <li><a href='/student_apprisal_report'><i class="fa fa-list-alt" aria-hidden="true"></i>Apprisal
                                Report </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <!-- Transport List Report  -->


            <div id="home" class="tab-pane fade in active">
                <div id="report_container" style="display: block;">
                    <div class="scroll-report">
                        @can('view report')
                            <button style="    margin-left: 1070px;">
                                <a id='print' onclick="pop_print()" media='print' target="_blank" title='Print' type="button"><i
                                        class="fa fa-print" aria-hidden="true"></i></a>
                            </button>
                            <button>
                                <a media='pdf' id="cmd" title='Pdf' type="button"><i class="fa fa-file-pdf-o"
                                        aria-hidden="true"></i></a>
                            </button>
                        @endcan
                        <div class="print">
                            <div class="report-header">
                                <div align="center">

                                    <div style="margin-right: 188px;" width="100%" class="">
                                        <table border="0" cellspacing="0" style="margin-top: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td align="center"><b>
                                                            <font size="3">{{ Session::get('school.system_name') }}(
                                                                {{ Session::get('school.school_eiin') }} )</font>
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><b>
                                                            <font size="2">{{ Session::get('school.address') }}(
                                                                {{ Session::get('school.postal_code') }} )
                                                                {{ Session::get('school.country') }}</font>
                                                        </b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><b>
                                                            <font size="2">Phone:- {{ Session::get('school.Phone') }}
                                                            </font>
                                                        </b>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <table width="85%" border="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="4">
                                                <h3>Asset Revenue Report</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">
                                                <div align="left"></div>
                                            </th>
                                            <td class="align-left">
                                                <strong> </strong>
                                            </td>
                                            <th width="15% ">
                                                <div style="margin-left: 302px;">MonthName</div>
                                            </th>
                                            <td class="align-left">
                                                <div align="left" style="margin-left: 14px;"><strong>:
                                                    </strong>{{ date('F') }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <div align="left"></div>
                                            </th>
                                            <td class="align-left">
                                                <strong> </strong>
                                            </td>
                                            <th>
                                                <div align="left" style="margin-left: 302px;">Year</div>
                                            </th>
                                            <td class="align-left">
                                                <div align="left" style="margin-left: 14px;"><strong>:
                                                    </strong>{{ date('Y') }}</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">
                                                <div align="left">Table Name</div>
                                            </th>
                                            <td class="align-left">
                                                <strong>: </strong>Asset Revenue
                                            </td>
                                            <th width="15%">
                                                <div align="left" style="margin-left: 302px;">Date</div>
                                            </th>
                                            <td class="align-left">
                                                <div align="left" style="margin-left: 14px;"><strong>:
                                                    </strong>{{ date('d') }}</div>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                            <hr>
                            <div style="text-align:center;display:none;" class="gif">
                                <img src="{{ asset('img/loading2.gif') }}" style="height: 150px;margin-top: 20px;" />
                            </div>

                            <?php
                            $current_date = date('Y');
                            $previous_date = date('Y', strtotime('-1 year'));
                            $income_total = 0;
                            $asset_total = 0;
                            ?>
                            <table border="1" style="width: 1000px;">
                                <tr>
                                    <th>Income</th>
                                    <th>Asset</th>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="1" cellpadding="11" cellspacing="3"
                                            style="width: 561px;height: 165px;">
                                            <tr>
                                                <th style="width: 50px;">Sl No</th>
                                                <th style="width: 50px;">Account Code</th>
                                                <th style="width: 703px;">Account Name</th>
                                                <th style="width: 100px;">Previous Year({{ $previous_date }})</th>
                                                <th style="width: 100px;">Current Year({{ $current_date }})</th>
                                            </tr>
                                            @foreach ($asset_revenue_data as $key => $fetch_data)

                                                <tr>
                                                    @if ($fetch_data->account_name == $fetch_data->account_code && $fetch_data->parent_account == 'Income')

                                                        <td style="width: 50px;">{{ $key + 1 }}</td>
                                                        <td style="width: 50px;">{{ $fetch_data->account_name }}</td>
                                                        @php
                                                            $income_account_name = DB::table('chart_of_accounts')
                                                                ->where('account_code', $fetch_data->account_name)
                                                                ->first();
                                                        @endphp
                                                        <td style="width: 703px;">{{ $income_account_name->account_name }}
                                                        </td>
                                                        @if ($previous_date == $fetch_data->created_at->year)

                                                            <td style="width: 100px;">
                                                                {{ $fetch_data->dr_amount - $fetch_data->cr_amount }}</td>
                                                            @php
                                                                $income_total = $income_total + $fetch_data->dr_amount - $fetch_data->cr_amount;
                                                            @endphp

                                                        @else

                                                            <td style="width: 100px;">0</td>

                                                        @endif
                                                        @if ($current_date == $fetch_data->created_at->year)

                                                            <td style="width: 100px;">
                                                                {{ $fetch_data->dr_amount - $fetch_data->cr_amount }}</td>
                                                            @php
                                                                $income_total = $income_total + $fetch_data->dr_amount - $fetch_data->cr_amount;
                                                            @endphp

                                                        @else

                                                            <td style="width: 100px;">0</td>
                                                        @endif
                                                    @endif
                                                </tr>
                                            @endforeach


                                        </table>
                                    </td>
                                    <td>
                                        <table border="1" cellpadding="11" cellspacing="3"
                                            style="width: 601px;height: 165px;">
                                            <tr>
                                                <th style="width: 50px;">Sl No</th>
                                                <th style="width: 50px;">Account code</th>
                                                <th style="width: 703px;">Account Name</th>
                                                <th style="width: 100px;">Previous Year({{ $previous_date }})</th>
                                                <th style="width: 100px;">Current Year({{ $current_date }})</th>
                                            </tr>
                                            @foreach ($asset_revenue_data as $key => $fetch_data)

                                                <tr>
                                                    @if ($fetch_data->account_name == $fetch_data->account_code && $fetch_data->parent_account == 'Asset')

                                                        <td style="width: 50px;">{{ $key + 1 }}</td>
                                                        <td style="width: 50px;">{{ $fetch_data->account_name }}</td>
                                                        @php
                                                            $asset_account_name = DB::table('chart_of_accounts')
                                                                ->where('account_code', $fetch_data->account_name)
                                                                ->first();
                                                        @endphp
                                                        <td style="width: 703px">{{ $asset_account_name->account_name }}
                                                        </td>
                                                        @if ($previous_date == $fetch_data->created_at->year)

                                                            <td style="width: 100px;">
                                                                {{ $fetch_data->dr_amount - $fetch_data->cr_amount }}</td>

                                                            @php
                                                                $asset_total = $asset_total + $fetch_data->dr_amount - $fetch_data->cr_amount;
                                                            @endphp


                                                        @else

                                                            <td style="width: 100px;">0</td>
                                                        @endif
                                                        @if ($current_date == $fetch_data->created_at->year)

                                                            <td style="width: 100px;">
                                                                {{ $fetch_data->dr_amount - $fetch_data->cr_amount }}</td>


                                                            @php
                                                                $asset_total = $asset_total + $fetch_data->dr_amount - $fetch_data->cr_amount;
                                                            @endphp


                                                        @else

                                                            <td style="width: 100px;">0</td>

                                                        @endif
                                                    @endif
                                            @endforeach

                                </tr>

                            </table>
                            </td>
                            </tr>
                            </table>
                            <table border="1" style="width: 1000px;">
                                <tr>
                                    <td>
                                        <table border="1" cellpadding="11" cellspacing="3"
                                            style="width: 562px;height: 40px;">
                                            <tr>
                                                <th style="width: 220px;">Total</th>
                                                <th style="width: 100px;">{{ $income_total }}</th>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table border="1" cellpadding="11" cellspacing="3"
                                            style="width:600px;height: 40px;">
                                            <tr>
                                                <th style="width: 224px;">Total</th>
                                                <th style="width: 100px;">{{ $asset_total }}</th>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table border="1">
                                <tr>
                                    <td>
                                        <table border="1" cellpadding="11" cellspacing="3"
                                            style="width: 1166px;height: 40px;">
                                            <tr>
                                                <th style="width: 220px;">Differance</th>
                                                <?php
                                                $difference = 0;
                                                
                                                if ($asset_total <= 0):
                                                    $difference = $income_total + $asset_total;
                                                else:
                                                    $difference = $income_total - $asset_total;
                                                endif;
                                                
                                                ?>

                                                <th style="width: 100px;">{{ @$difference }}</th>

                                            </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/applicant_student_report.js') }}"></script>
    @endpush
    <script type="text/javascript">
        $(document).ready(function() {

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
