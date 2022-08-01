@extends('admin.index')
@section('Title', 'monthly_roster_closing')
@section('breadcrumbs', 'monthly_roster_closing')
@section('breadcrumbs_link', '/monthly_roster_closing')
@section('breadcrumbs_title', 'monthly_roster_closing')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
            {{ Session::get('success') }}
        </div>

    @endif
    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Monthly Roster Closing</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Monthly Roster Closing</p>
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

        <table style="    margin-top: 9%;
        margin-left: 301px" class="">

            <thead>
                <tr>
                    <th style="background: #1F262D;height: 34px;width: 181px;color: #fff;border: 1px solid white;">Month
                    </th>

                    <th style="background: #1F262D;height: 34px;width: 181px;color: #fff;border: 1px solid white;">Year</th>

                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>

                    <td>
                        {{ Form::select('month', ['1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'], null, ['style' => 'width: 183px', 'id' => 'class_select', 'class' => 'month']) }}
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
                        {{ Form::select('year', $year_array, null, ['style' => 'width: 183px', 'id' => 'class_select', 'class' => 'year']) }}
                    </td>

                    <td>
                        {{ Form::submit('Generate Report', ['style' => 'width: 182px;', 'class' => 'btn btn-success gif_show']) }}
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
            <br>
            <br>
            <span style="margin-left:20px;font-size: 16px;" class="month_show"></span>
            <span style="margin-left:20px;font-size: 16px;" class="year_show"></span>
            <!-- <div style="border: 2px solid black"></div> -->
            <hr style="width: 95%;margin-top: 25px;border: 2px solid black;margin-left: 20px;">
            <hr style="width: 95%;margin-top: -18px;border: 2px solid black;margin-left: 20px;">
            {{ Form::open(['url' => '/monthly_roster_closing', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

            <div class="report_data_table">



            </div>

            {{ Form::close() }}


        </div>
        @can('view canteen')
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

                    var month = $(".month").val();
                    var year = $(".year").val();
                    $(".month_show").html("Roster Closing Month:" + month);
                    $(".year_show").html("Roster Closing Year:" + year);

                    $.ajax({
                        url: '/monthly_roster_closing_data_show',
                        type: 'post',
                        data: {
                            'month': month,
                            'year': year,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            $(".report_data_table").html(data);
                            $(".gif").hide("slow");
                        }
                    });

                });

                $('.report_data_table').on('click', '#create_invoice', function(eq) {

                    var month = $(".month").val();
                    var year = $(".year").val();

                    var student_roll = $(this).closest("tr").find("input[name='student_roll']").val();
                    var student_name = $(this).closest("tr").find("input[name='student_name']").val();
                    var student_class = $(this).closest("tr").find("input[name='student_class']").val();
                    var department = $(this).closest("tr").find("input[name='department']").val();
                    var total = $(this).closest("tr").find("input[name='total']").val();
                    //alert(student_roll+student_name+student_class+department+total);
                    $.ajax({
                        url: '/monthly_roster_closing_single_invoice',
                        type: 'post',
                        data: {
                            'month': month,
                            'year': year,
                            'student_roll': student_roll,
                            'student_name': student_name,
                            'student_class': student_class,
                            'department': department,
                            'total': total,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(r) {
                            alert(r);

                        }
                    });
                });

                // $(".report_data_table").on('click',"#create_all_invoice",function(eq){
                //          $('.report_data_table td').each(function() {
                //               var student_roll = $(this).closest("tr").find("input[name='student_roll']").val();   
                //        var student_name = $(this).closest("tr").find("input[name='student_name']").val();
                //        var student_class = $(this).closest("tr").find("input[name='student_class']").val();
                //        var department = $(this).closest("tr").find("input[name='department']").val();
                //        var total = $(this).closest("tr").find("input[name='total']").val();

                //                alert(student_roll+student_name+student_class+department+total);
                //        });
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
