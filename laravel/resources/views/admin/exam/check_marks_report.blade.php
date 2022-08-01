@extends('admin.index')
@section('Title', 'Check Exam')
@section('breadcrumbs', 'Check Exam')
@section('breadcrumbs_link', '/check_marks')
@section('breadcrumbs_title', 'Check Marks')

@section('content')

    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp Edit Mark's Information</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ config('app.name') }} Report</p> <!-- Transport Details -->


        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href='/applicant_student_report'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant
                            Teacher's Report</a></li>
                    <li><a href='#'>Add Teacher</a></li>
                    <li><a href='#'>Teacher's Report </a></li>

                </ul>
            </div>
        </div>





        <table style="margin-top: 4%" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">
                    <th>Exam</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Department</th>
                    <th>subject</th>
                    <th>Default Session</th>


                </tr>
            </thead>


            <tbody>
                <tr>
                    {{ Form::open(['url' => '/check_marks', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                    @php $all_exam_list['']="" @endphp
                    @foreach ($exam_data as $exam_data_list)
                        @php
                            $all_exam_list[$exam_data_list->exam_name] = $exam_data_list->exam_name;
                        @endphp
                    @endforeach

                    @php $all_class_list['']="" @endphp
                    @foreach ($class_data as $class_data_list)
                        @php
                            $all_class_list[$class_data_list->class_name] = $class_data_list->class_name;
                        @endphp
                    @endforeach

                    <td>{{ Form::select('exam_name', $all_exam_list, null, ['style' => 'width: 157px', 'id' => 'exam_name']) }}</td>
                    <td>{{ Form::select('class_name', $all_class_list, null, ['style' => 'width: 157px', 'id' => 'class_info']) }}
                    </td>

                    <td>{{ Form::select('section', ['Section Name' => 'Section Name'], null, ['id' => 'section_info', 'style' => 'width: 157px']) }}
                    </td>

                    <td>{{ Form::select('Department', ['Department Name' => 'Department Name'], null, ['id' => 'Department_info', 'style' => 'width: 157px']) }}
                    </td>

                    <td>{{ Form::select('subject', ['subject Name' => 'subject Name'], null, ['id' => 'subject_info', 'style' => 'width: 157px']) }}
                    </td>

                    <td>{{ Form::select('subject', $sessions, null, ['id' => 'default_session', 'style' => 'width: 157px;']) }}</td>

                </tr>
                {{ Form::close() }}
            </tbody>
        </table>



        <div id="table_show_trigger_forsubject" hidden="hidden" class="col-xs-12">
            <table style="width: 25%;" class="table">
                <tr>
                    <td><b>Exam Name</b></td>
                    <td class="exam_name_in_view"></td>

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
                    <td><b>Subject Name</b></td>
                    <td class="subject_name_in_view"></td>

                </tr>
            </table>
        </div>


        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Edit Mark's Information</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" id="report">

                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Roll</th>
                                    <th>CGPA</th>
                                    <th>Grade Name</th>
                                    <th>Mark</th>
                                    @can('delete exam')
                                        <th>Actions</th>
                                    @endcan
                                </tr>
                            </thead>


                            <tbody id="edit_mark_data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>






        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/exam.js') }}"></script>
    @endpush

@stop
