@extends('admin.index')
@section('Title', 'Z.H. SIKDER UNIVERSITY OF SCINCE AND TECHNOLOGY')
@section('breadcrumbs', '')
@section('breadcrumbs_link', '')
@section('breadcrumbs_title', '')

@section('content')
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <style type="text/css">
                .wd {
                    width: 237px;
                }

            </style>
            <li class="wd bg_ls"> <a href="/aplicant_student"><img src="img/student.png"
                        style="height:66px;" />Applicant Student</a></li>
            <li class="wd bg_lb"> <a href="/admit_student"><img src="img/admit.png" style="height:66px;" />Admit
                    Student</a></li>
            <li class="wd bg_ly"> <a href="/student_apprisal"><img src="img/appraisal.png"
                        style="height:66px;" />Appraisal</a></li>
            <li class="wd bg_lg"> <a href="/teacher_info"><img src="img/teacher.png" style="height:66px;" />Teacher</a>
            </li>
            <li class="wd bg_ls"> <a href="/staff_info"><img src="img/staff.png" style="height:66px;" /> Staff</a>
            </li>
            <li class="wd bg_lb"> <a href="/parents_info"><img src="img/parent.png" style="height:66px;" />Parents</a>
            </li>
            <li class="wd bg_ly"> <a href="/daily_attendance"><img src="img/attendance.png"
                        style="height:66px;" />Daily Attendance</a> </li>
            <li class="wd bg_lg"> <a href="/exam_list"><img src="img/exam.png" style="height:66px;" /> Exam</a> </li>
            <li class="wd bg_ls"> <a href="/salary_slip"><img src="img/payroll.png" style="height:66px;" />
                    Payroll</a> </li>
            <li class="wd bg_lb"> <a href="/invoice"><img src="img/accountant.png" style="height:66px;" />
                    Accountant</a> </li>
            <li class="wd bg_ly"> <a href="/article_issue"><img src="img/library.png" style="height:66px;" />
                    Library</a> </li>
            <li class="wd bg_lg"> <a href="/assign_transport"><img src="img/transport.png" style="height:66px;" />
                    Transpost</a> </li>
            <li class="wd bg_ls"> <a href="/assign_dormitory"><img src="img/dormitory.png" style="height:66px;" />
                    Dormitory</a> </li>
            <li class="wd bg_lb"> <a href="/notice_board"><img src="img/notice.png" style="height:66px;" /> Notice</a>
            </li>
            <li class="wd bg_ly"> <a href="/general_settings"><img src="img/settings.png" style="height:66px;" />
                    Settings</a> </li>

        </ul>
    </div>
    <!--End-Action boxes-->

    <!--Chart-box-->
    @php
    $student_data = DB::table('students')
        ->get()
        ->count();
    $teacher_data = DB::table('teachers')
        ->get()
        ->count();
    $parents_data = DB::table('parents_info')
        ->get()
        ->count();
    $attendance_data = DB::table('daily_attendance')
        ->get()
        ->count();
    $transport = DB::table('manage_transport')
        ->get()
        ->count();
    $Article = DB::table('article_info')
        ->get()
        ->count();
    $general = DB::table('general_settings')->first();
    $general_data = $general->default_session;
    $Hostel = DB::table('manage_dormitory')
        ->get()
        ->count();
    $school_name = $general->system_name;
    @endphp
    <div class="row-fluid">
        <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>{{ $school_name = $general->system_name }} Overview</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span9">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawVisualization);

                            function drawVisualization() {
                                // Some raw data (not necessarily accurate)
                                var data = google.visualization.arrayToDataTable([
                                    ['Session', 'Student', 'Teacher', 'Parents', 'Attendance', 'Transport', 'Library', 'Dormitory'],
                                    ['<?= $general_data ?>', <?= $student_data ?>, <?= $teacher_data ?>, <?= $parents_data ?>,
                                        <?= $attendance_data ?>, <?= $transport ?>, <?= $Article ?>, <?= $Hostel ?>
                                    ],

                                ]);

                                var options = {
                                    title: '<?= $school_name ?>',
                                    vAxis: {
                                        title: 'Overview'
                                    },
                                    hAxis: {
                                        title: 'Session'
                                    },
                                    seriesType: 'bars',
                                    series: {
                                        7: {
                                            type: 'line'
                                        }
                                    }
                                };

                                var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div id="chart_div" style="width: 800px; height: 500px;"></div>
                    </div>
                    <div class="span3">
                        <ul class="site-stats">
                            <li class="bg_lh"><i class="fa fa-users"></i>
                                <strong>{{ $Student = DB::table('students')->get()->count() }}</strong> <small>Total
                                    Student's</small></li>
                            <li class="bg_lh"><i class="fa fa-male"></i>
                                <strong>{{ $Teacher = DB::table('teachers')->where('status', 'Teacher')->get()->count() }}</strong>
                                <small>Total Teacher's</small></li>
                            <li class="bg_lh"><i class="fa fa-address-book-o"></i>
                                <strong>{{ $Class = DB::table('manage_class')->get()->count() }}</strong> <small>Total
                                    Class</small></li>
                            <li class="bg_lh"><i class="fa fa-book"></i>
                                <strong>{{ $Article = DB::table('article_info')->get()->count() }}</strong> <small>Total
                                    Library Books</small></li>
                            <li class="bg_lh"><i class="fa fa-male"></i>
                                <strong>{{ $Staff = DB::table('teachers')->where('status', 'Staff')->get()->count() }}</strong>
                                <small>Total Staff</small></li>
                            <li class="bg_lh"><i class="fa fa-bed"></i>
                                <strong>{{ $Hostel = DB::table('manage_dormitory')->get()->count() }}</strong>
                                <small>Hostel</small></li>
                            <li class="bg_lh"><i class="fa fa-bus" aria-hidden="true"></i>
                                <strong>{{ $Transport = DB::table('manage_transport')->get()->count() }}</strong>
                                <small>Transport</small></li>
                            <li class="bg_lh"><i class="fa fa-user"
                                    aria-hidden="true"></i><strong>{{ $Attendance = DB::table('daily_attendance')->get()->count() }}</strong>
                                <small>Attendance</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Chart-box-->

    <hr />

    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">

                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i
                            class="icon-chevron-down"></i></span>
                    <h5>Latest Notice</h5>
                </div>

                <div class="widget-content nopadding collapse in" id="collapseG2">
                    <ul class="recent-posts">
                        @php
                            $notice = DB::table('notice_board')
                                ->orderBy('notice_id', 'desc')
                                ->limit(4)
                                ->get();
                        @endphp
                        @foreach ($notice as $notice_list)
                            <li>
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/notice.png">
                                </div>
                                <div class="article-post"> <span class="user-info"> By: {{ $notice_list->author }} /
                                        Date:{{ $notice_list->created_at }}</span>
                                    <p><a href="#"> {{ $notice_list->Notice }}</a> </p>
                                </div>
                            </li>
                        @endforeach

                        <li>
                            <a href="/notice_board">
                                <button class="btn btn-warning btn-mini">View All</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="widget-box">
                <div class="widget-title">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab1">Software Overview</a></li>
                        <li><a data-toggle="tab" href="#tab2">Codebool History</a></li>
                        <li><a data-toggle="tab" href="#tab3">Codebool's Target</a></li>
                    </ul>
                </div>
                <div class="widget-content tab-content">
                    <div id="tab1" class="tab-pane active">
                        <p>Codebool I-School Management System is the most complete and versatile school management system
                            on envato market. Codebool provides the most advanced backend erp. Whatever platform you want to
                            use, Codebool has got your back.</p>
                        <img src="{{ asset('img/codebool_ischool_2.jpg') }}" alt="demo-image" style="width: 100%;" />
                    </div>
                    <div id="tab2" class="tab-pane"> <img src="{{ asset('img/codebool_ischool.jpg') }}"
                            style="width: 100%;height: 288px;" alt="demo-image" />
                        <p>School Management System is a is a complete school management software designed to automate a
                            school's diverse operations from classes, exams to school events calendar.</p>
                    </div>
                    <div id="tab3" class="tab-pane">
                        <p>This school software has a powerful online community to bring parents, teachers and students on a
                            common interactive platform. It is a paperless office automation solution for today's modern
                            schools. The School Management System provides the facility to carry out all day to day
                            activities of the school, making them fast, easy, efficient and accurate </p>
                        <img src="{{ asset('img/codebool1.jpg') }}" alt="demo-image" style="width: 100%; height: 287px;" />
                    </div>
                </div>
            </div>




            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>Dormitory Overview</h5>
                </div>
                @php
                    $manage_dormitory = DB::table('manage_dormitory')
                        ->get()
                        ->count();
                    $assign_dormitory = DB::table('assign_dormitory')
                        ->get()
                        ->count();
                @endphp
                <div class="widget-content">
                    <div class="widget-content">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                    ['Dormitory', 'Overview'],
                                    ['Total Dormitory', <?= $manage_dormitory ?>],
                                    ['Issued Dormitory', <?= $assign_dormitory ?>]
                                ]);

                                var options = {
                                    title: 'Dormitory Overview',
                                    is3D: true
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                    <div id="piechart2" style="height: 295px;"></div>
                </div>
            </div>



            <!--end calender-->

        </div>


        <div class="span6" style="margin-left: -2%;">


            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>Payment Overview</h5>
                </div>
                @php
                    $paid = DB::table('invoice')
                        ->where('cash_status', 'Paid')
                        ->get()
                        ->count();
                    $unpaid = DB::table('invoice')
                        ->where('cash_status', 'Unpaid')
                        ->get()
                        ->count();
                    
                @endphp
                <div class="widget-content">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['corechart']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                            var data = google.visualization.arrayToDataTable([
                                ['Payment', 'Total'],
                                ['Paid', <?= $paid ?>],
                                ['Unpaid', <?= $unpaid ?>]
                            ]);

                            var options = {
                                title: 'Payment Overview',
                                is3D: true
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                            chart.draw(data, options);
                        }
                    </script>
                    <div id="piechart" style="height: 500px;"></div>
                </div>
            </div>
        </div>



        <div class="span6" style="margin-left: -2%;">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>Library Overview</h5>
                </div>
                @php
                    $total_book = DB::table('article_info')
                        ->get()
                        ->count();
                    $issued = DB::table('article_issue')
                        ->get()
                        ->count();
                    $returned = DB::table('article_recive')
                        ->get()
                        ->count();
                    $membership = DB::table('membership')
                        ->get()
                        ->count();
                @endphp

                <div class="widget-content">
                    <div class="widget-content" style="height: 16px;">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {
                                packages: ["corechart"]
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Library', 'Overview'],
                                    ['Total Book', <?= $total_book ?>],
                                    ['Issued', <?= $issued ?>],
                                    ['Returned', <?= $returned ?>],
                                    ['Membership', <?= $membership ?>]
                                ]);

                                var options = {
                                    title: 'Library Overview',
                                    pieHole: 0.4,
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                chart.draw(data, options);
                            }
                        </script>

                    </div>
                    <div id="donutchart" style=" height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
@stop
