<div class="row">
    <div class="co-lg-12">
        <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
            @php
                $nav_dept = collect($manage_department)->groupBy('department_name');
            @endphp
            <div class="container-fluid" style="background-color: #428dc9 !important; color: #fff; padding-left: 0px;">
                <!-- <div class="navbar-header">
                  <img src="./index_files/logo.png">
                </div> -->
                <ul class="nav navbar-nav main_navbar">
                    <li class="dropdown"><a href="/frontend">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Institute<span class="caret"></span></a>
                        <ul class="dropdown-menu main_menu">
                            <li>
                                <a tabindex="-1" href="/frontend/about_us">About The Institution</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/frontend/history">History</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/frontend/mission_vision">Mission & Vission</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="/frontend/principal_message">Principle Message</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Faculties<span class="caret"></span></a>
                        <ul class="dropdown-menu main_menu">
                            @foreach($nav_dept as $key => $value)
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">
                                        {{$key}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <!-- <li>
                              <a tabindex="-1" href="/frontend/faculties/message-from-head/{{$key}}">Message From Head</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="/frontend/faculties/about_department/{{$key}}">About Department</a>
                            </li> -->
                                        <li>
                                            <a tabindex="-1" href="/frontend/faculties/teacher_info/{{$key}}">Teacher Info</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="/frontend/faculties/lab_info/{{$key}}">Lab Info</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="/frontend/faculties/fees_structure/{{$key}}">Fees Structure</a>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                            <li>
                                <a class="test" tabindex="-1" href="/frontend/faculties/staff_info/staff">Administrative Staff</a>
                            </li>
                            <li>
                                <a class="test" tabindex="-1" href="/frontend/non_tech_instructor">Non Tech Instructor</a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" tabindex="-1" href="#">
                                    Course
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($course_category as $value)
                                        <li>
                                            <a tabindex="-1" href="/frontend/courses/{{$value->id}}">
                                                {{$value->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student's Info<span class="caret"></span></a>
                        <ul class="dropdown-menu main_menu">
                            @foreach($nav_dept as $key => $value)
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">
                                        {{$key}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($value as $key => $sub_menu)
                                            <li>
                                                <a tabindex="-1" href="/frontend/student-info/{{$sub_menu['department_code']}}/{{str_slug($sub_menu['class_name'])}}">{{$sub_menu['class_name']}}</a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <a class="test" tabindex="-1" href="#">Ex Students</a>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course Material<span class="caret"></span></a>
                        <ul class="dropdown-menu main_menu">
                            @foreach($nav_dept as $key => $value)
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">
                                        {{$key}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($value as $key => $sub_menu)
                                            <li>
                                                <a tabindex="-1" href="/frontend/course-material/{{$sub_menu['department_code']}}/{{str_slug($sub_menu['class_name'])}}">{{$sub_menu['class_name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Class Routine<span class="caret"></span></a>
                        <ul class="dropdown-menu main_menu">
                            @foreach($nav_dept as $key => $value)
                                <li class="dropdown-submenu">
                                    <a class="test" tabindex="-1" href="#">
                                        {{$key}}
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($value as $key => $sub_menu)
                                            <li>
                                                <a tabindex="-1" href="/frontend/class-routine/{{$sub_menu['department_code']}}/{{str_slug($sub_menu['class_name'])}}">{{$sub_menu['class_name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!--
                                      <li>
                                        <a href="#">Digital Content</a>
                                      </li> -->

                    <!--  <li>
                       <a tabindex="-1" href="/frontend/citizen-charter">Citizen Charter</a>
                     </li> -->

                    <li class="dropdown">
                        <a tabindex="-1" href="/frontend/live-class">Live Class Schedule</a>
                    </li>

                    <li class="dropdown">
                        <a tabindex="-1" href="/frontend/contact_info">Contact</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>