@extends('admin.index')
@section('Title', 'due_fees_report')
@section('breadcrumbs', 'due_fees_report')
@section('breadcrumbs_link', '/due_fees')
@section('breadcrumbs_title', 'due_fees_report')
@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Ledger Report
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

        {{ Form::open(['url' => '/ledger_report', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        {{ Form::close() }}

        <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">

                    <th>Party</th>
                    <th>Ledger Head</th>
                    <th>Type</th>
                    <th></th>
                    <th></th>

                </tr>
            </thead>


            <tbody>
                <tr>



                    <td>{{ Form::text('party', '', ['style' => 'width: 85px', 'id' => 'party', 'class' => 'party']) }}</td>

                    <td>
                        @php
                            $ledger_head_array = ['all' => '--all--'];
                        @endphp
                        @foreach ($ledger_head as $ledger_head_data)
                            @php
                                $ledger_head_array[$ledger_head_data->account_code] = $ledger_head_data->account_name;
                                
                            @endphp
                        @endforeach


                        {{ Form::select('ledger_head', $ledger_head_array, null, ['style' => 'width: 85px', 'id' => 'department', 'class' => 'ledger_head']) }}
                    </td>

                    <td>{{ Form::select('type', ['' => '--select--', 'Staff' => 'Staff', 'Teacher' => 'Teacher', 'Student' => 'Student'], null, ['style' => 'width: 85px', 'id' => 'department', 'class' => 'department']) }}
                    </td>

                    <td>{{ Form::text('all', '', ['style' => 'width: 85px', 'id' => 'all', 'class' => 'all']) }}</td>
                    <td>
                        {{ Form::submit('Generate Report', [
                            'style' => 'width: 125px;margin-top: -11px;
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

                $(".report_view").unbind().click(function() {
                    var party = $(".party").val();
                    var ledger_head = $(".ledger_head").val();
                    var department = $(".department").val();
                    var all = $(".all").val();
                    $.ajax({
                        url: '/get_ledger_report',
                        type: 'POST',
                        data: {
                            'party': party,
                            'ledger_head': ledger_head,
                            'department': department,
                            'all': all,
                            '_token': $('input[name=_token]').val()
                        },
                        success: function(data) {
                            if (data) {
                                $(".report_data_table").html(data);
                                $(".gif").hide(1000);
                            }
                        }

                    });
                });

                $(".gif_show").click(function() {
                    $(".gif").show();
                });

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

                w.document.write('<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');

                w.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>");


                w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
                w.document.write(jQuery('.print').html());


                w.document.close();
            }
        </script>

    @stop
