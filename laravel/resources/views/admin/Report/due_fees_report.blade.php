@extends('admin.index')
@section('Title', 'due_fees_report')
@section('breadcrumbs', 'due_fees_report')
@section('breadcrumbs_link', '/due_fees')
@section('breadcrumbs_title', 'due_fees_report')
@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Due Fees Report
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

        {{ Form::open(['url' => '/due_fees', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        {{ Form::close() }}
        <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">

                    <th>Class</th>
                    <th>Medium</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th></th>

                </tr>
            </thead>


            <tbody>
                <tr>



                    <td>
                        @php $class_data_array=[''=>'--select--']@endphp
                        @foreach ($class_data as $class_data_value)
                            @php
                                $class_data_array[$class_data_value->class_name] = $class_data_value->class_name;
                            @endphp
                        @endforeach
                        {{ Form::select('class', $class_data_array, null, ['style' => 'width: 85px', 'id' => 'class', 'class' => 'class']) }}
                    </td>


                    <td>
                        @php
                            $medium_array = [];
                        @endphp
                        @foreach ($medium as $medium_data)
                            @php
                                $medium_array[$medium_data->type_name] = $medium_data->type_name;
                            @endphp
                        @endforeach



                        {{ Form::select('medium', $medium_array, null, ['style' => 'width: 85px', 'id' => 'medium', 'class' => 'medium']) }}

                    </td>
                    <td>
                        {{ Form::date('from_date', '', ['style' => 'width: 132px', 'id' => 'from_date', 'class' => 'from_date']) }}
                    </td>
                    <td>
                        {{ Form::date('to_date', '', ['style' => 'width: 132px', 'id' => 'to_date', 'class' => 'to_date']) }}
                    </td>

                    <td>
                        {{ Form::button('Generate', ['style' => 'width: 125px;margin-top: -9px;', 'class' => 'btn btn-success gif_show']) }}
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


            <div class="report_data_table">




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
                    var class_data = $(".class").val();
                    var medium = $(".medium").val();
                    var from_date = $(".from_date").val();
                    var to_date = $(".to_date").val();

                    if (class_data == '' || medium == '' || from_date == '' || to_date == '') {
                        swal({
                            title: "Error!",
                            text: "Fill All Filed",
                            icon: "error",
                            button: "Opss!",
                        });
                    } else {
                        $.ajax({
                            url: '/due_fees_report_data',
                            type: 'POST',
                            data: {
                                'class_data': class_data,
                                'medium': medium,
                                'from_date': from_date,
                                'to_date': to_date,
                                '_token': $('input[name=_token]').val()
                            },
                            success: function(data) {
                                //console.log(data);
                                $(".report_data_table").html(data);
                            }
                        });
                    }




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
