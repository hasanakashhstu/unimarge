@extends('admin.index')
@section('Title', 'book_list_report')
@section('breadcrumbs', 'book_list_report')
@section('breadcrumbs_link', '/book_list_report')
@section('breadcrumbs_title', 'book_list_report')
@section('content')


    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Book List Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Book List Report</p>
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
        {{ Form::open(['url' => '/book_list_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        <table style="margin-top: 9%;
           margin-left: 24px;" class="">

            <thead>
                <tr>


                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">Book
                        Name</th>

                    <th style="background: #1F262D;height: 34px;     width: 181px;color: #fff;border: 1px solid white;">
                        Search</th>
                </tr>
            </thead>

            <tbody>
                <tr>


                    <td>
                        @php
                            $book_name_array = ['' => '--Select--', 'all' => 'all'];
                        @endphp
                        @foreach ($book_name as $book_name_list)
                            @php $book_name_array[$book_name_list->article_name]=$book_name_list->article_name @endphp
                        @endforeach
                        {{ Form::select('article_name', $book_name_array, null, ['style' => 'width: 183px', 'id' => 'article_name', 'class' => 'article_name']) }}

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
                                {{ Session::get('school.school_eiin') }}</h4>
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
                @if ($all_search_data)
                    {!! $all_search_data !!}
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

                var average_data = $("#average_data").val();

                $("#average_data_show").html(average_data);
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
