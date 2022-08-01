@extends('admin.index')
@section('Title', 'Admit Bulk Student')
@section('breadcrumbs', 'Admit Bulk Student')
@section('breadcrumbs_link', '/admit_bulk_student')
@section('breadcrumbs_title', 'admit_bulk_student')

@section('content')



    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
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



    <div class="container">
        <h2><i class="fa fa-address-card-o" aria-hidden="true"></i> Admit Bulk Student </h2> <!-- Tab Heading  -->
        <p title="Transport Details">I School Managment Addmission Pass Student Entry</p> <!-- Transport Details -->
    </div>

    <div class="container">
        <div class="text-right">
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test'>
                        <li><a href='/applicant_student_report'><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Send
                                Result By Email</a></li>
                        <li><a href='#'><i class="fa fa-comment" aria-hidden="true"></i>&nbsp;Send Result By Sms</a></li>
                        <li><a href='#'><i class="fa fa-table" aria-hidden="true"></i>&nbsp;Tabulation Sheet </a></li>
                        <li><a href='#'><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp; Cheack More Addmission
                                Information</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>




    <div class="alert alert-info">
        <strong>Warning!</strong> <br>System Automatic Set Default Batch For New Student Admited

        After Complete Admit Bulk Student Operation Must be Set All Information For This Student If Dont set Mandatory
        Information this student deprived our felicity
    </div>

    {{ Form::open(['url' => '/admit_bulk_student', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
    <div class="container" style="margin-left: 23%;">
        <table style="margin-top: 4%;" class="">
            <thead style="background: #1F262D">
                <tr style="height: 34px;color: #fff">
                    <th>Class</th>
                    <th>Section</th>
                    <th>Department</th>
                    <th>Shift</th>
                    <th>Medium</th>
                    <th>Batch</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                        @php $class_data_array[""]="Select Class" @endphp
                        @foreach ($class as $class_data)
                            @php $class_data_array[$class_data->class_name]=$class_data->class_name @endphp
                        @endforeach

                        {{ Form::select('class', $class_data_array, null, ['class' => 'manage_class', 'id' => 'manage_class', 'style' => 'width:100%']) }}
                    </td>

                    <td>

                        {{ Form::select('section', ['' => 'Select Class First'], null, ['id' => 'student_section', 'style' => 'width:100%']) }}

                    </td>

                    <td>
                        {{ Form::select('department', ['' => 'Select Class First'], null, ['id' => 'Manage_department', 'style' => 'width:100%']) }}

                    </td>

                    <td>


                        @php $shift_data_array[""]="--Select--" @endphp
                        @foreach ($shift_data as $shift_data_list)
                            @php $shift_data_array[$shift_data_list->type_name]=$shift_data_list->type_name @endphp
                        @endforeach

                        {{ Form::select('shift', $shift_data_array, null, ['id' => 'mange_shift', 'style' => 'width:100%']) }}

                    </td>
                    <td>

                        @php $medium_data_array[""]="--Select--" @endphp
                        @foreach ($medium as $medium_data_list)
                            @php $medium_data_array[$medium_data_list->type_name]=$medium_data_list->type_name @endphp
                        @endforeach

                        {{ Form::select('medium', $medium_data_array, null, ['id' => 'medium', 'style' => 'width:100%']) }}
                    </td>
                    <td>
                        @php
                        $session_array[$general_settings->default_session] = $general_settings->default_session; @endphp

                        {{ Form::select('session', $session_array, null, ['id' => 'session', 'class' => 'ajax_test', 'style' => 'width:100%', 'readonly' => 'readonly']) }}

                    </td>

                </tr>

            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


    <div class="input_fields_wrap text-center" style="padding:2%">

        <div>
            {{ Form::text('student_name[]', '', ['id' => 'required', 'class' => 'b_s_name', 'placeholder' => 'Student Name', 'title' => 'student_name', 'style' => 'width:14%']) }}

            {{ Form::text('roll[]', $generate_autoname, ['id' => 'required', 'class' => 'b_s_roll', 'placeholder' => 'Student Roll', 'title' => 'student_roll', 'disabled']) }}

            {{ Form::hidden('roll[]', $generate_autoname, ['id' => 'required', 'class' => 'b_s_roll', 'placeholder' => 'Student Roll', 'title' => 'student_roll']) }}

            {{ Form::text('reg_number[]', '', ['id' => 'required', 'class' => 'b_s_reg', 'placeholder' => 'Student Reg', 'title' => 'student_reg']) }}

            &nbsp;<a href='#' style="margin-bottom: 2px;margin-top: 3px;" class='remove_field btn btn-danger'><i
                    class='fa fa-trash' aria-hidden='true'></i></a>
        </div>
    </div>
    <div class='container text-center'>
        @can('create student')
            {{ Form::submit('Add More Fields', ['class' => 'add_field_button btn btn-info', 'data-original-title' => 'Tabulation Sheet']) }}
            {{ Form::submit('Save Students', ['class' => 'btn btn-success ', 'data-original-title' => 'Save Students']) }}
        @endcan
        <!-- <input type="submit" class="add_field_button btn btn-info">Add More Fields
     -->
    </div>
    <div class='container text-center'>

        <!-- <button type='submit' class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Save Student</button> -->
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/admit_bulk_student.js') }}"></script>
    @endpush
    {{ Form::close() }}
@stop
