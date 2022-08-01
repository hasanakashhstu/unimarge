@extends('admin.index')
@section('Title', 'Student Information')
@section('breadcrumbs', 'Student Information')
@section('breadcrumbs_link', '/student_information')
@section('breadcrumbs_title', 'Student Information')

@section('content')







    <div class="container">
        <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student Information </h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Student Information</p>
        <!-- Transport Details -->
    </div>

    <div class="container">
        <div class="text-right">
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test'>
                        @can('create student')
                            <li><a href='/admit_student'><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add New
                                    Student</a></li>
                        @endcan
                        <li><a href='/applicant_student_report'><i class="fa fa-file-text"
                                    aria-hidden="true"></i>&nbsp;Applicant Students</a></li>

                        <li><a href='/student_promoation'><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Student
                                Promotion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <h3>Student Data Table </h3>
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box" style="width: 100%!important;">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Applicant Student Data table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">

                        <thead>
                            <tr>
                                <th>Roll</th>
                                <th>Student Name</th>
                                <th>Gurdian Name</th>
                                <th>Class</th>
                                <th>Medium</th>
                                <th style="width:6%">Section</th>
                                <th>Department</th>
                                <th>Registration Number</th>
                                <th>Email</th>
                                <th style="width:10%">Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($student_data_table as $student_data)
                                @php
                                    $parent_name_c_id = DB::table('parents_info')
                                        ->select('name')
                                        ->where('parent_id', $student_data->parent_name)
                                        ->first();
                                @endphp
                                <tr class="gradeX">
                                    <td>{{ $student_data->roll }}</td>
                                    <td>{{ $student_data->student_name }}</td>
                                    <td>@php
                                        if ($parent_name_c_id):
                                            echo $parent_name_c_id->name;
                                        endif;
                                    @endphp </td>
                                    <td>{{ $student_data->class }}</td>
                                    <td>{{ $student_data->medium }}</td>
                                    <td>{{ $student_data->section }}</td>
                                    <td>{{ $student_data->department }}</td>
                                    <td>{{ $student_data->reg_number }}</td>
                                    <td>{{ $student_data->email }}</td>

                                    <?php
                                    if (file_exists("img/backend/student/$student_data->roll.jpg")) {
                                        $student_image_path = "img/backend/student/$student_data->roll.jpg";
                                    } else {
                                        $student_image_path = 'img/blankavatar.png';
                                    }
                                    
                                    ?>
                                    <td>{{ Form::image($student_image_path, null, ['style' => 'height: 6%; width: 50%', 'class' => 'img-responsive img-circle']) }}
                                    </td>
                                    <td id="my_align" class="display_status">
                                        @if ($student_data->class == 'EX-STUDENT')
                                            {{ Form::open(['url' => "/ex_student_information/$student_data->roll", 'method' => 'GET']) }}
                                            {{ Form::submit('Testimonial', ['class' => 'btn btn-warning']) }}
                                            {{ Form::close() }}
                                        @elseif($student_data->class == 'TRANSFERRED STUDENT')
                                            {{ Form::open(['url' => "/ex_student_information/$student_data->roll", 'method' => 'GET']) }}
                                            {{ Form::submit('TC', ['class' => 'btn btn-warning']) }}
                                            {{ Form::close() }}
                                        @endif

                                        @can('edit student')
                                            {{ Form::open(['url' => "/student_information/$student_data->roll/edit", 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan

                                        @can('view student')
                                            {{ Form::open(['url' => "/student_print/$student_data->roll", 'method' => 'GET', 'target' => '_blank']) }}
                                            {{ Form::submit('Print', ['class' => 'btn btn-info', 'id' => 'admit_student_info_print', 'get_value' => "$student_data->roll"]) }}
                                            {{ Form::close() }}
                                        @endcan


                                        @can('delete student')
                                            {{ Form::button('Delete', ['id' => "$student_data->roll", 'value' => "$student_data->roll", 'class' => 'btn btn-danger admit_student_info_delete']) }}
                                        @endcan

                                        <!-- {{ Form::button('Print', ['id' => 'Student_report', 'class' => 'btn btn-info admit_student_info_print', 'onclick' => 'printDiv()', 'value' => $student_data->roll, 'roll' => "$student_data->roll", 'target' => '_blank']) }} -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--print section-->

    <!--print section-->




    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>

    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/student_information.js') }}"></script>
    @endpush

@stop
