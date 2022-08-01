@extends('admin.index')
@section('Title', 'salary_report')
@section('breadcrumbs', 'salary_report')
@section('breadcrumbs_link', '/total_earning_report')
@section('breadcrumbs_title', 'salary_report')
@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Salary Report
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
        </div>

        {{ Form::open(['url' => '/ledger_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        {{ Form::close() }}

        <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">

                    <th>Month</th>
                    <th>Year</th>
                    <th>Generate Report</th>

                </tr>
            </thead>


            <tbody>
                <tr>


                    <td>
                        {{ Form::select('month', ['January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'], null, ['style' => 'width: 183px', 'id' => 'month', 'class' => 'month']) }}
                    </td>

                    @php
                        $current_year = date('Y');
                        $year_array = [$current_year => $current_year];
                    @endphp
                    <?php
                    for ($current_year = 2015; $current_year <= 2030; $current_year++) {
                        $year_array[$current_year] = $current_year;
                    }
                    
                    ?>

                    <td>
                        {{ Form::select('year', $year_array, null, ['style' => 'width: 183px', 'id' => 'year', 'class' => 'year']) }}
                    </td>


                    <td>
                        {{ Form::submit('Generate Report', [
                            'style' => 'width: 125px;margin-top:-11px;
                        ',
                            'class' => 'btn btn-success report_view gif_show',
                        ]) }}
                    </td>

                </tr>

            </tbody>
        </table>




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
            <div class="report_data_table"></div>

            </table>
        </div>
        @can('view payroll')
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

                $(".report_view").click(function() {
                    var month = $(".month").val();
                    var year = $(".year").val();
                    $(".gif").show();
                    $.ajax({
                        url: '/total_earning_report',
                        type: 'POST',
                        data: {
                            'month': month,
                            'year': year,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            console.log(data);
                            $(".gif").hide();
                            $(".report_data_table").html(data);
                        }
                    });
                });



                // $(".gif_show").click(function(){
                //    $(".gif").show();
                // });



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
