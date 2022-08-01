@extends('admin.index')
@section('Title', 'daily_attendance')
@section('breadcrumbs', 'daily_attendance')
@section('breadcrumbs_link', '/daily_attendance')
@section('breadcrumbs_title', 'daily_attendance')
@section('content')


    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
            {{ Session::get('success') }}
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


    {{ Form::open(['url' => '/daily_attendance', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}


    <div class="container">
        <h2><i class="fa fa-hand-paper-o" aria-hidden="true"></i></i> Student Daily Attandance </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Add Student Daily Attandance</p>
        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/daily_attendance_report'><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Daily
                                Attendance Report</a></li>
                        <li><a href='/teacher_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Teacher</a>
                        </li>
                        <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's Report
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/daily_attendance_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/daily_attendance_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/daily_attendance_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>

                </div>
            </div>
        </div>


        <!-- Transport Details -->
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                </span>
                <h5>Add Daily Attendance
                </h5>
            </div>
            <div class="widget-content padding">


                <div class="control-group">
                    <table class="table address">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Session</th>
                                <th>Medium</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Department</th>
                                <th>Subject</th>

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    {{ Form::date('date', \Carbon\Carbon::now(), ['id' => 'datepicker', 'title' => 'date', 'style' => 'width: 126px']) }}
                                </td>

                                @php
                                    $session_array = ['' => '--select--'];
                                @endphp
                                @foreach ($session_get as $session_list)
                                    @php
                                        $session_array[$session_list->type_name] = $session_list->type_name;
                                    @endphp
                                @endforeach
                                <td>{{ Form::select('Session', $session_array, null, ['style' => 'width: 112px', 'class' => 'default_session', 'id' => 'default_session']) }}
                                </td>


                                <td>
                                    @php
                                        $medium_array = ['' => '--select--'];
                                    @endphp
                                    @foreach ($medium as $medium_data)
                                        @php
                                            $medium_array[$medium_data->type_name] = $medium_data->type_name;
                                        @endphp
                                    @endforeach
                                    {{ Form::select('medium', $medium_array, null, ['style' => 'width: 157px', 'id' => 'medium']) }}
                                </td>
                                @php
                                    $class_list_all_data = ['' => '--select--'];
                                @endphp
                                @foreach ($class_data as $class_list_data)
                                    @php $class_list_all_data[$class_list_data->class_name]=$class_list_data->class_name @endphp
                                @endforeach
                                <td>{{ Form::select('class_name', $class_list_all_data, null, ['style' => 'width: 157px', 'id' => 'class_info']) }}
                                </td>



                                <td>{{ Form::select('section', ['Section Name' => 'Section Name'], null, ['id' => 'section_info', 'style' => 'width: 157px']) }}
                                </td>

                                <td>{{ Form::select('Department', ['Department Name' => 'Department Name'], null, ['id' => 'Department_info', 'style' => 'width: 84px']) }}
                                </td>

                                <td>{{ Form::select('subject', ['Subject' => 'Subject'], null, ['id' => 'subject_info', 'style' => 'width: 157px']) }}
                                </td>




                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



        <div id="table_show_trigger_forsubject" hidden="hidden" class="col-xs-12">
            <table style="width: 25%;" class="table">

                <tr>
                    <td><b>Medium</b></td>
                    <td class="medium_in_view"></td>

                </tr>
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
                    <td><b>Date</b></td>
                    <td class="date_in_view"></td>

                </tr>

            </table>
        </div>



        <div class="container">

            <div class="row" style="text-align: center;">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="tile-stats tile-gray">
                        <div class="icon"><i class="entypo-chart-area"></i></div>
                        <h3 style="color: #34495e;">Attendance For Cl</h3>
                        <h4 style="color: #34495e;">Section</h4>
                        <h4 style="color:#34495e;"></h4>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <br></br>


            <center>
                <a class="btn btn-default present"><i class="fa fa-check-square-o" aria-hidden="true"></i> Mark All
                    Present</a>
                <a class="btn btn-default absent"><i class="fa fa-times" aria-hidden="true"></i> Mark All Absent</a>
            </center>
            <br></br>



            <div id="attendance_update">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Roll</th>
                            <th>Name</th>
                            <th><?php echo date('d-m-Y'); ?></th>

                        </tr>
                    </thead>
                    <tbody id="student_data">

                    </tbody>
                </table>
            </div>

            @can('create attendence')
                <center>
                    {{ Form::submit('Save Attendance', ['class' => 'btn btn-success']) }}

                </center>
            @endcan
        </div>
        {{ Form::close() }}





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @push('custom-scripts')
            <script>
                var baseUrl = '{{ url('/') }}';
            </script>
            <script type="text/javascript" src="{{ asset('extra_js/attendance.js') }}"></script>
        @endpush
    @stop
