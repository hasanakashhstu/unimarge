<!--sidebar-menu-->
<div id="sidebar" style="margin-top: 6%;">
    <a href="{{ url('home') }}" class="visible-phone"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>

    <ul>
        <li><a href="{{ url('home') }}"><i class="fa fa-tachometer" aria-hidden="true"></i><span> Dashboard</span></a>
        </li>


        @can('manage role and permission')
            <li class="submenu"><a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i><span>&nbsp;Role and
                        Permission</span><span class="label label-important">&#8688;</span></a>
                <ul>
                    <li><a href="{{ route('auth.roles.create') }}"><i class="fa fa-user-secret"
                                aria-hidden="true"></i>&nbsp;Create Role</a></li>
                    <li><a href="{{ route('auth.roles.index') }}"><i class="fa fa-sign-in"
                                aria-hidden="true"></i></i>&nbsp; Role List</a>
                    </li>
                </ul>
            </li>
        @endcan

        @if (Auth::user()->can('view student') || Auth::user()->can('create student') || Auth::user()->can('edit student') || Auth::user()->can('delete student'))

            <li class="submenu"><a href="#"><i class="fa fa-users" aria-hidden="true"></i><span>
                        Students</span><span class="label label-important">&#8688;</span></a>
                <ul>
                    <li><a href="/aplicant_student"><i class="fa fa-user-plus" aria-hidden="true"></i> Aplicant
                            Students</a>
                    </li>

                    <li><a href="/applicant_student_report"><i class="fa fa-user-plus" aria-hidden="true"></i> Aplicant
                            Students Report</a></li>

                    <li><a href="/addmission_test"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Addmission
                            Test</a></li>

                    <li><a href="/admit_student"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Admit
                            Students</a>
                    </li>
                    <li><a href="/admit_bulk_student"><i class="fa fa-address-card-o" aria-hidden="true"></i>Admit Bulk
                            Students</a></li>
                    <li><a href="/student_promoation"><i class="fa fa-line-chart" aria-hidden="true"></i> Students
                            Promotion</a></li>

                    <li>
                        <a href="/advance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Details Report
                        </a>
                    </li>

                    <li>
                        <a href="/student_admission_register_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Admission Register Report
                        </a>
                    </li>
                </ul>
            </li>
            <li class="submenu"><a href="#"><i class="fa fa-users" aria-hidden="true"></i><span> Students
                        Information</span><span class="label label-important">&#8688;</span></a>
                <ul>
                    @php
                        $student_class = DB::table('students')
                            ->groupby('class')
                            ->get();
                    @endphp
                    @foreach ($student_class as $student_class_data)
                        <li><a href="/student_information/{{ $student_class_data->class }}"><i class="fa fa-info"
                                    aria-hidden="true"></i> &nbsp;{{ $student_class_data->class }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view apprisal') || Auth::user()->can('create apprisal') || Auth::user()->can('edit apprisal') || Auth::user()->can('delete apprisal'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-smile-o" aria-hidden="true"></i>
                    <span> Apprisal</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>

                    <li>
                        <a href="/student_apprisal">
                            <i class="fa fa-user-o" aria-hidden="true"></i> Apprisal
                        </a>
                    </li>

                    <li>
                        <a href="/student_apprisal_component">
                            <i class="fa fa-object-ungroup" aria-hidden="true"></i>Apprisal Templete
                        </a>
                    </li>

                    <li>
                        <a href="/student_apprisal_report">
                            <i class="fa fa-list" aria-hidden="true"></i> Apprisal Report
                        </a>
                    </li>

                    <li>
                        <a href="/apprisal_template_report">
                            <i class="fa fa-list" aria-hidden="true"></i> Apprisal Template Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif


        @if (Auth::user()->can('view teacehr') || Auth::user()->can('create teacehr') || Auth::user()->can('edit teacehr') || Auth::user()->can('delete teacehr') || Auth::user()->can('view staff') || Auth::user()->can('create staff') || Auth::user()->can('edit staff') || Auth::user()->can('delete staff') || Auth::user()->can('view publication') || Auth::user()->can('view awards and honours'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span> Teacher And Staff</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view teacher')
                        <li>
                            <a href="/total_teacher_report">
                                <i class="fa fa-circle" aria-hidden="true"></i> Total Teacher Report
                            </a>
                        </li>
                        <li>
                            <a href="/class_wise_teacher">
                                <i class="fa fa-circle" aria-hidden="true"></i> Class Wise Teacher Report
                            </a>
                        </li>
                        <li>
                            <a href="/reponsible_teacher_report">
                                <i class="fa fa-circle" aria-hidden="true"></i> Responsible Teacher Report
                            </a>
                        </li>
                    @endcan

                    @can('create teacher')
                        <li>
                            <a href="/teacher_info">
                                <i class="fa fa-user-plus" aria-hidden="true"></i>Create Teacher
                            </a>
                        </li>
                    @endcan
                    @can('view teacher')
                        <li>
                            <a href="/teacher_info_report">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Teacher's Report
                            </a>
                        </li>
                    @endcan
                    @can('create staff')
                        <li>
                            <a href="/staff_info">
                                <i class="fa fa-male" aria-hidden="true"></i>
                                <span>Create Staff</span>
                                <span class="label label-important"></span>
                            </a>
                        </li>
                    @endcan
                    @can('view staff')
                        <li>
                            <a href="/staff_report">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Staff Report
                            </a>
                        </li>
                    @endcan

                    @can('view publication')
                        <li>
                            <a href="{{ url('admin/publications') }}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i> Publication List
                            </a>
                        </li>
                    @endcan

                    @can('view awards and honours')
                        <li>
                            <a href="{{ url('admin/award_honours') }}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                Awards and Honours
                            </a>
                        </li>
                    @endcan

                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view parent') || Auth::user()->can('create parent') || Auth::user()->can('edit parent') || Auth::user()->can('delete parent'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                    <span> Parent</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('create parent')
                        <li>
                            <a href="/parents_info">
                                <i class="fa fa-address-book" aria-hidden="true"></i>Create Parents
                            </a>
                        </li>
                    @endcan

                    @can('view parent')
                        <li>
                            <a href="/parentreport">
                                <i class="fa fa-address-card-o" aria-hidden="true"></i> Parents Report
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view department') || Auth::user()->can('create department') || Auth::user()->can('edit department') || Auth::user()->can('delete department'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span> Department & Program</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/manage_class">
                            <i class="fa fa-book" aria-hidden="true"></i> Manage Programs
                        </a>
                    </li>

                    <li>
                        <a href="/manage_section">
                            <i class="fa fa-bandcamp" aria-hidden="true"></i> Manage Sections
                        </a>
                    </li>

                    <li>
                        <a href="/academic_syllabus">
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Academic Syllabus
                        </a>
                    </li>

                    <li>
                        <a href="/manage_department">
                            <i class="fa fa-table" aria-hidden="true"></i> Manage Department
                        </a>
                    </li>

                    <li>
                        <a href="/manage_faculty">
                            <i class="fa fa-table" aria-hidden="true"></i> Manage Faculty
                        </a>
                    </li>

                    <li>
                        <a href="/manage_tution_fees">
                            <i class="fa fa-table" aria-hidden="true"></i> Manage Tuition Fees
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('auth.otherFees.index') }}">
                            <i class="fa fa-table" aria-hidden="true"></i> Manage Other Fees
                        </a>
                    </li>

                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view subject') || Auth::user()->can('create subject') || Auth::user()->can('edit subject') || Auth::user()->can('delete subject'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    <span> Subject</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @php
                    $class_name = DB::table('manage_class')->get(); @endphp
                    @foreach ($class_name as $class_name_list)
                        <li>
                            <a href="/manage_subject/{{ $class_name_list->class_name }}">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $class_name_list->class_name }}
                            </a>
                        </li>
                    @endforeach

                    <li>
                        <a href="/component">
                            <i class="fa fa-plus-square" aria-hidden="true"></i> Component
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view class routine') || Auth::user()->can('create class routine') || Auth::user()->can('edit class routine') || Auth::user()->can('delete class routine'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span> Class Routine</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @php
                    $class_name = DB::table('manage_class')->get(); @endphp
                    @foreach ($class_name as $class_name_list)
                        <li>
                            <a href="/manage_class_routine/{{ $class_name_list->class_name }}">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                {{ $class_name_list->class_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view attendence') || Auth::user()->can('create attendence') || Auth::user()->can('edit attendence') || Auth::user()->can('delete attendence'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                    <span> Daily Attendence</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/daily_attendance">
                            <i class="fa fa-hand-paper-o" aria-hidden="true"></i> Daily Attendence
                        </a>
                    </li>
                    <li>
                        <a href="/daily_attendance_report">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i> Attendence Report
                        </a>
                    </li>

                    <li>
                        <a href="/all_student_attendance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>All Student Attendance Report
                        </a>
                    </li>
                    <li>
                        <a href="/single_student_attendance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Single Student Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/daily_attendance/create">
                            <i class="fa fa-circle" aria-hidden="true"></i>Overall Attendance Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view exam') || Auth::user()->can('create exam') || Auth::user()->can('edit exam') || Auth::user()->can('delete exam'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span> Exam</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view exam')
                        <li>
                            <a href="/exam_list">
                                <i class="fa fa-list" aria-hidden="true"></i> Exam List
                            </a>
                        </li>

                        <li>
                            <a href="/exam_grade">
                                <i class="fa fa-university" aria-hidden="true"></i> Exam Grade
                            </a>
                        </li>
                    @endcan

                    <li>
                        <a href="/manage_marks">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Manage Marks
                        </a>
                    </li>
                    <li>
                        <a href="/manage_marks/create">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Manage Marks Report
                        </a>
                    </li>


                    <li>
                        <a href="/subject_wise_publish_marks">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Subject Wise Publish Marks
                        </a>
                    </li>
                    <li>
                        <a href="/pass_fail_report">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Pass Fail Report
                        </a>
                    </li>
                    <li>
                        <a href="/result_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Mark Sheet Report
                        </a>
                    </li>
                    <li>
                        <a href="/check_marks">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Check Marks
                        </a>
                    </li>


                    <li>
                        <a href="/marks_publish">
                            <i class="fa fa-building-o" aria-hidden="true"></i> Publish Marks
                        </a>
                    </li>

                    <li>
                        <a href="/tabulation_sheet">
                            <i class="fa fa-file-o" aria-hidden="true"></i> Tabulation Sheet
                        </a>
                    </li>

                    <li>
                        <a href="/question_paper">
                            <i class="fa fa-file-text" aria-hidden="true"></i> Question Paper
                        </a>
                    </li>

                    <li>
                        <a href="/result_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Result Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view payroll') || Auth::user()->can('create payroll') || Auth::user()->can('edit payroll') || Auth::user()->can('delete payroll'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span> Payroll</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view payroll')
                        <li>
                            <a href="/salary_slip">
                                <i class="fa fa-list" aria-hidden="true"></i>Salary Slip
                            </a>
                        </li>
                    @endcan

                    <li>
                        <a href="/salary_slip_report">
                            <i class="fa fa-list" aria-hidden="true"></i>Salary Slip Report
                        </a>
                    </li>

                    @can('view payroll')
                        <li>
                            <a href="/salary_structure">
                                <i class="fa fa-university" aria-hidden="true"></i>Salary Structure
                            </a>
                        </li>
                    @endcan

                    <li>
                        <a href="/salary_structure_report">
                            <i class="fa fa-university" aria-hidden="true"></i>Salary Structure Report
                        </a>
                    </li>

                    <li>
                        <a href="/salary_component">
                            <i class="fa fa-university" aria-hidden="true"></i>Salary Components
                        </a>
                    </li>

                    <li>
                        <a href="/total_earning_report">
                            <i class="fa fa-university" aria-hidden="true"></i>Total Earning Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view accounting') || Auth::user()->can('create accounting') || Auth::user()->can('edit accounting') || Auth::user()->can('delete accounting'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span> Accounting</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/subsidiary_configuration">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span> Subsidiary Configuration</span>
                        </a>
                    </li>

                    <li>
                        <a href="/student_payment">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Student Payment</span>
                        </a>
                    </li>

                    <li>
                        <a href="/student_transaction_status">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Student Transaction Status</span>
                        </a>
                    </li>

                    <li>
                        <a href="/payment_report">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Payment Report</span>
                        </a>
                    </li>

                    <li>
                        <a href="/accountant">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span> Accountant</span>
                        </a>
                    </li>

                    <li>
                        <a href="/chart_of_account">
                            <i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account
                        </a>
                    </li>

                    <li>
                        <a href="/create_template">
                            <i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Payment Templete
                        </a>
                    </li>

                    <li>
                        <a href="/student_payment_entry">
                            <i class="fa fa-window-maximize" aria-hidden="true"></i> &nbsp; Invoice
                        </a>
                    </li>

                    <li>
                        <a href="/invoice">
                            <i class="fa fa-money" aria-hidden="true"></i> &nbsp;Invoice Report
                        </a>
                    </li>

                    <li>
                        <a href="/invoice_component">
                            <i class="fa fa-money" aria-hidden="true"></i> &nbsp;Invoice Component
                        </a>
                    </li>

                    <li>
                        <a href="/student_all_payment">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student All Payment Report
                        </a>
                    </li>

                    <li>
                        <a href="/ledger_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Ledger Report
                        </a>
                    </li>

                    <li>
                        <a href="/asset_revenue">
                            <i class="fa fa-circle" aria-hidden="true"></i> Asset Revenue Report
                        </a>
                    </li>
                    <li>
                        <a href="/financial_ledger_repport">
                            <i class="fa fa-circle" aria-hidden="true"></i>Financial Ledger Report
                        </a>
                    </li>

                    <li>
                        <a href="/fees_collection_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Fees Collection Report
                        </a>
                    </li>

                    <li>
                        <a href="/due_fees">
                            <i class="fa fa-circle" aria-hidden="true"></i> Due Fees Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view library') || Auth::user()->can('create library') || Auth::user()->can('edit library') || Auth::user()->can('delete library'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    <span> Libray</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/templet_article">
                            <i class="fa fa-th-large" aria-hidden="true"></i> Book Accession
                        </a>
                    </li>
                    <li>
                        <a href="/stock_article">
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i><i class="fa fa-book"
                                aria-hidden="true"></i> Stock Books
                        </a>
                    </li>
                    <li>
                        <a href="/article">
                            <i class="fa fa-book" aria-hidden="true"></i><i class="fa fa-pencil"
                                aria-hidden="true"></i> Manage Books
                        </a>
                    </li>
                    <li>
                        <a href="/membership">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Membership
                        </a>
                    </li>
                    <li>
                        <a href="/article_issue">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Book Issue
                        </a>
                    </li>
                    <li>
                        <a href="/article_recive">
                            <i class="fa fa-recycle" aria-hidden="true"></i> Book Recived
                        </a>
                    </li>

                    <li>
                        <a href="/book_list_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Book List Report
                        </a>
                    </li>

                    <li>
                        <a href="/library_bill_generator">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Library Invoice Generate
                        </a>
                    </li>

                    <li>
                        <a href="/library_bill_generator/create">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Library Invoice Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view transport') || Auth::user()->can('create transport') || Auth::user()->can('edit transport') || Auth::user()->can('delete transport'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span> Transport</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/route">
                            <i class="fa fa-road" aria-hidden="true"></i> Route
                        </a>
                    </li>

                    <li>
                        <a href="/manage_transport">
                            <i class="fa fa-bus" aria-hidden="true"></i> Manage Transport
                        </a>
                    </li>

                    @can('create transport')
                        <li>
                            <a href="/assign_transport">
                                <i class="fa fa-bus" aria-hidden="true"></i> Assign Transport
                            </a>
                        </li>
                    @endcan

                    <li>
                        <a href="/transport_bill_generator">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Transport Invoice Generate
                        </a>
                    </li>

                    <li>
                        <a href="/transport_bill_generator/create">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Transport Invoice Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif


        @if (Auth::user()->can('view dormitory') || Auth::user()->can('create dormitory') || Auth::user()->can('edit dormitory') || Auth::user()->can('delete dormitory'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span> Dormitory</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view dormitory')
                        <li>
                            <a href="/dormitory">
                                <i class="fa fa-life-ring" aria-hidden="true"></i> Manage Dormitory
                            </a>
                        </li>
                    @endcan

                    @can('create dormitory')
                        <li>
                            <a href="/assign_dormitory">
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> Assign Dormitory
                            </a>
                        </li>
                    @endcan

                    <li>
                        <a href="/dormitory_bill_generator">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Dormitory Invoice Generate
                        </a>
                    </li>
                    <li>
                        <a href="/dormitory_bill_generator/create">
                            <i class="fa fa-recycle" aria-hidden="true"></i>Dormitory Invoice Report
                        </a>
                    </li>

                    <li>
                        <a href="/dormitory_student_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Dormitory Student Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view canteen') || Auth::user()->can('create canteen') || Auth::user()->can('edit canteen') || Auth::user()->can('delete canteen'))
            <li class="submenu">
                <a href="#">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    <span> Canteen</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/canteen_component">
                            <i class="fa fa-life-ring" aria-hidden="true"></i> Component
                        </a>
                    </li>

                    <li>
                        <a href="/assign_canteen">
                            <i class="fa fa-life-ring" aria-hidden="true"></i> Assign To Canteen
                        </a>
                    </li>

                    <li>
                        <a href="/roster/create">
                            <i class="fa fa-life-ring" aria-hidden="true"></i> Roster Configuration
                        </a>
                    </li>

                    <li>
                        <a href="/roster">
                            <i class="fa fa-life-ring" aria-hidden="true"></i> Roster
                        </a>
                    </li>

                    <li>
                        <a href="/monthly_roster_closing">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>Monthly Roster Closing
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @can('view message')
            <li>
                <a href="/message_settings">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <span> Messages Settings </span>
                </a>
            </li>
        @endcan

        @if (Auth::user()->can('view setting') || Auth::user()->can('create setting') || Auth::user()->can('edit setting') || Auth::user()->can('delete setting'))
            <li class="submenu">
                <a href="#">
                    <i class="icon icon-info-sign"></i>
                    <span> Settings</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/general_settings">
                            <i class="fa fa-circle" aria-hidden="true"></i> General Settings
                        </a>
                    </li>
                    <li>
                        <a href="/setup">
                            <i class="fa fa-circle" aria-hidden="true"></i> All Setup
                        </a>
                    </li>

                    <li>
                        <a href="/report_settings">
                            <i class="fa fa-circle" aria-hidden="true"></i> Report Settings
                        </a>
                    </li>

                    <li>
                        <a href="/report_settings/create">
                            <i class="fa fa-circle" aria-hidden="true"></i> Report Settings View
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @can('view live_class')
            <li>
                <a href="/live_class">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <span> Live Class</span>
                </a>
            </li>
        @endcan

        @if (Auth::user()->can('view report') || Auth::user()->can('create report') || Auth::user()->can('edit report') || Auth::user()->can('delete report'))
            <li class="submenu">
                <a href="#">
                    <i class="icon icon-info-sign"></i>
                    <span> Report</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/result_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Result Report
                        </a>
                    </li>

                    <li>
                        <a href="/marks_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Students Marks Report
                        </a>
                    </li>

                    <li>
                        <a href="/all_student_attendance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>All Student Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/single_student_attendance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Single Student Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/daily_attendance/create">
                            <i class="fa fa-circle" aria-hidden="true"></i>Overall Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/advance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Details Report
                        </a>
                    </li>

                    <li>
                        <a href="/student_admission_register_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Admission Register Report
                        </a>
                    </li>

                    <li>
                        <a href="/student_all_payment">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student All Payment Report
                        </a>
                    </li>

                    <li>
                        <a href="/fees_collection_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Fees Collection Report
                        </a>
                    </li>

                    <li>
                        <a href="/due_fees">
                            <i class="fa fa-circle" aria-hidden="true"></i> Due Fees Report
                        </a>
                    </li>

                    <li>
                        <a href="/ledger_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Ledger Report
                        </a>
                    </li>

                    <li>
                        <a href="/asset_revenue">
                            <i class="fa fa-circle" aria-hidden="true"></i> Asset Revenue Report
                        </a>
                    </li>

                    <li>
                        <a href="/dormitory_student_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Dormitory Student Report
                        </a>
                    </li>

                    <li>
                        <a href="/book_list_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Book List Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view department') || Auth::user()->can('create department') || Auth::user()->can('edit department') || Auth::user()->can('delete department'))
            <li class="submenu">
                <a href="#">
                    <i class="icon icon-info-sign"></i>
                    <span> Department Setup</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/single_student_attendance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Single Student Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/daily_attendance/create">
                            <i class="fa fa-circle" aria-hidden="true"></i>Overall Attendance Report
                        </a>
                    </li>

                    <li>
                        <a href="/advance_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Details Report
                        </a>
                    </li>

                    <li>
                        <a href="/student_admission_register_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student Admission Register Report
                        </a>
                    </li>

                    <li>
                        <a href="/student_all_payment">
                            <i class="fa fa-circle" aria-hidden="true"></i> Student All Payment Report
                        </a>
                    </li>

                    <li>
                        <a href="/fees_collection_report">
                            <i class="fa fa-circle" aria-hidden="true"></i>Fees Collection Report
                        </a>
                    </li>


                    <li>
                        <a href="/due_fees">
                            <i class="fa fa-circle" aria-hidden="true"></i> Due Fees Report
                        </a>
                    </li>


                    <li>
                        <a href="/ledger_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Ledger Report
                        </a>
                    </li>

                    <li>
                        <a href="/asset_revenue">
                            <i class="fa fa-circle" aria-hidden="true"></i> Asset Revenue Report
                        </a>
                    </li>



                    <li>
                        <a href="/dormitory_student_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Dormitory Student Report
                        </a>
                    </li>


                    <li>
                        <a href="/book_list_report">
                            <i class="fa fa-circle" aria-hidden="true"></i> Book List Report
                        </a>
                    </li>

                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view website setup') || Auth::user()->can('create website setup') || Auth::user()->can('edit website setup') || Auth::user()->can('delete website setup'))
            <li class="submenu">
                <a href="#">
                    <i class="icon icon-info-sign"></i>
                    <span>Website</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    <li>
                        <a href="/frontend/website_setup">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Website Setup
                        </a>
                    </li>
                   <!--akash @13/6-->
                    <li>
                        <a href="/frontend/admission_setup">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                           Admission Setup
                        </a>
                    </li>
 <!--akash @13/6-->
                    <li>
                        <a href="/frontend/our_management">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Our Management
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/bot_backend">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            BOT
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/slider">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Slider
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/galleries') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Gallery
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/events">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Events
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/news">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            News
                        </a>
                    </li>

                    <li>
                        <a href="/notice_board">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <span> Noticeboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/results') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Result
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/department_page_setup">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Page Setup
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/department_contacts') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Contact
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/officers') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Officer
                        </a>
                    </li>

                    <li>
                        <a href="/frontend/fees_structure">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Fees Structure
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/activities') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Activity
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/schollerships') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Department Schollership
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/department_contents?type=Annoucement') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Annoucement
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/department_contents?type=Alumni') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Alumni
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/department_contents?type=Lab_Facilities') }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            Lab Facilities
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view administrative') || Auth::user()->can('create administrative'))
            <li class="submenu"><a href="#">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>&nbsp;Administrative</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view administrative')
                        <li><a href="{{ route('auth.administrativeOffices.index') }}"><i class="fa fa-circle"
                                    aria-hidden="true"></i>&nbsp; Office List</a>
                        </li>
                    @endcan

                    @can('create administrative')
                        <li><a href="{{ route('auth.administratives.create') }}"><i class="fa fa-circle"
                                    aria-hidden="true"></i>&nbsp;New Administrative</a></li>
                    @endcan

                    @can('view administrative')
                        <li><a href="{{ route('auth.administratives.index') }}"><i class="fa fa-circle"
                                    aria-hidden="true"></i>&nbsp; Administrative List</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @if (Auth::user()->can('view administrative') || Auth::user()->can('create administrative'))
            <li class="submenu"><a href="#">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>&nbsp;Admission</span>
                    <span class="label label-important">&#8688;</span>
                </a>
                <ul>
                    @can('view administrative')
                        <li><a href="{{ route('auth.metaData.index', ['type' => 'Fees and Funding']) }}"><i class="fa fa-circle"
                                    aria-hidden="true"></i>&nbsp; Fees and Funding</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
    </ul>
</div>
<!--sidebar-menu-->
