@extends('admin.index')
@section('Title', 'report_of_attendance')
@section('breadcrumbs', 'report_of_attendance')
@section('breadcrumbs_link', '/report_of_attendance')
@section('breadcrumbs_title', 'report_of_attendance')
@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-braille" aria-hidden="true"></i>
            Student Daily Attandance Report
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


        <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">

                    <th>Class</th>
                    <th>Section</th>
                    <th>Department</th>
                    <th>From Date </th>
                    <th>To Date</th>
                    <th>Default Session</th>
                </tr>
            </thead>


            <tbody>
                <tr>
                    {{ Form::open(['url' => '/report_of_attendance', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}


                    @foreach ($class_data as $class_data_list)
                        @php
                            $all_class_list[$class_data_list->class_name] = $class_data_list->class_name;
                        @endphp
                    @endforeach


                    <td>{{ Form::select('class_name', $all_class_list, null, ['style' => 'width: 150px', 'id' => 'class_info']) }}
                    </td>

                    <td>{{ Form::select('section', ['Section Name' => 'Section Name'], null, ['id' => 'section_info', 'style' => 'width: 150px']) }}
                    </td>

                    <td>{{ Form::select('Department', ['Department Name' => 'Department Name'], null, ['id' => 'Department_info', 'style' => 'width: 150px']) }}
                    </td>


                    <td>{{ Form::date('from_date', '', ['id' => 'from_date', 'style' => 'width: 150px']) }}</td>
                    <td>{{ Form::date('to_date', '', ['id' => 'to_date', 'style' => 'width: 150px']) }}</td>
                    <td>{{ Form::select('Default Session', [$general->default_session => $general->default_session], null, ['style' => 'width: 157px', 'readonly' => 'readonly', 'class' => 'default_session', 'id' => 'default_session']) }}
                    </td>



                </tr>
                {{ Form::close() }}
            </tbody>
        </table>



        <div id="table_show_trigger_forattendance" hidden="hidden" class="col-xs-12">
            <table style="width: 25%;  margin-left: 4%; border: 1px solid;" class="table">


                <tr>
                    <td><b>Class Name</b></td>
                    <td class="class_name_in_view"></td>

                </tr>

                <tr>
                    <td><b>Section Name</b></td>
                    <td class="section_name_in_view"></td>

                </tr>

                <tr>
                    <td><b>Department Name</b></td>
                    <td class="department_name_in_view"></td>

                </tr>
                <tr>
                    <td><b>From Date</b></td>
                    <td class="from_date_view"></td>

                </tr>
                <tr>
                    <td><b>To Date</b></td>
                    <td class="to_date_view"></td>

                </tr>
                <tr>
                    <td><b>Default Session</b></td>
                    <td class="default_session_data"></td>

                </tr>


            </table>
        </div>
        <img src="{{ asset('img/loading.gif') }}" hidden="hidden" id='loader' style="margin-left: 372px;">

        <div class="tab-content" hidden="hidden" id="data_show_tbl">
            @can('view attendence')
                <button class="btn btn-info" style="width: 64px; margin-left: 1092px;">
                    <a id='print' onclick="pop_print()" media='print' target="_blank" title='Print' type="button"><i
                            class="fa fa-print" aria-hidden="true"></i></a>
                </button>
            @endcan
            <div id="home" class="tab-pane fade in active" style="width:1710px">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Student Attendance Information</h5>
                    </div>

                    <div class="student_attendence_data_table"></div>

                </div>
            </div>

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @push('custom-scripts')
            <script type="text/javascript" src="{{ asset('extra_js/attendance.js') }}"></script>
        @endpush
    @stop
