@extends('admin.index')
@section('Title', "Subject $request_class Class")
@section('breadcrumbs', 'subject_one_class')
@section('breadcrumbs_link', '/subject_one_class')
@section('breadcrumbs_title', 'Subject $request_class Class')
@section('content')
    <div class="container">


        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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



        <h2><i class="fa fa-book" aria-hidden="true"></i> Subject For Class {{ $request_class }}</h2>
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            subject Details</p>

        <br />
        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                        <li><a href='/teacher_info_report'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Teacher
                                Report</a></li>
                        <li><a href='/marks_publish'><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; Publish
                                Marks</a></li>
                        <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a>
                        </li>
                    </ul>
                </div>
            </div>




        </div><br />






        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Suject Class List</a>
            </li>
            @can('create subject')
                <li>
                    <a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Subject
                        Class</a>
                </li>
            @endcan
        </ul>


        <div class="tab-content">
            <!-- Transport List Report  -->
            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">

                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5> Class {{ $request_class }} Subject's Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Department</th>
                                    <th>Section</th>
                                    <th>Medium</th>
                                    <th>Subject Name</th>
                                    <th>Subject Code</th>
                                    <th>Subject Mark</th>
                                    <th>Subject Credit</th>
                                    <th>Type</th>
                                    <th>Teacher</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($subject_list as $subject_list_data)
                                    <tr class="gradeX">
                                        <td>{{ $subject_list_data->class }}</td>
                                        <td>{{ $subject_list_data->department_name }}</td>
                                        <td>{{ $subject_list_data->section }}</td>
                                        <td>{{ $subject_list_data->medium }}</td>
                                        <td>{{ $subject_list_data->subject_name }}</td>
                                        <td>{{ $subject_list_data->subject_code }}</td>
                                        <td>{{ $subject_list_data->subject_mark }}</td>
                                        <td>{{ $subject_list_data->subject_credit }}</td>
                                        <td>{{ $subject_list_data->type }}</td>
                                        <td>{{ $subject_list_data->teacher }}</td>
                                        <td id="my_align" class="display_status">
                                            @can('edit subject')
                                                {{ Form::open(['url' => "/manage_subject/$subject_list_data->id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan
                                            @can('delete subject')
                                                {{ Form::button('Delete', ['class' => 'btn btn-danger class_delete', 'value' => $subject_list_data->id]) }}
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div id="menu1" class="tab-pane fade">
                <div>
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-info-sign"></i></span>
                            <h5>Add Class {{ $request_class }} Subject </h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/manage_subject', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                            <div class="control-group" hidden="hidden">
                                {{ Form::label('id', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('id', time(), ['id' => 'required', 'placeholder' => 'Subject Id']) }}
                                </div>
                            </div>
                            <div class="control-group" hidden="hidden">
                                {{ Form::label('User', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('user', Auth::user()->name, ['id' => 'required', 'placeholder' => 'Subject Name']) }}
                                </div>
                            </div>



                            <div class="control-group">
                                {{ Form::label('Subject Name', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('subject_name', '', ['id' => 'required', 'placeholder' => 'Subject Name', 'title' => 'subject_name']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Subject Code', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('subject_code', '', ['id' => 'required', 'placeholder' => 'Subject Code', 'title' => 'subject_code']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Subject Mark', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('subject_mark', '', ['id' => 'required', 'placeholder' => 'Subject Mark', 'title' => 'subject_mark']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Subject Credit', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('subject_credit', '', ['id' => 'required', 'placeholder' => 'Subject Credit', 'title' => 'subject_credit']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('medium', 'Medium', ['class' => 'control-label']) }}
                                <div class="controls">
                                    @php
                                        $medium_array = ['' => '--select--'];
                                    @endphp
                                    @foreach ($medium as $medium_data)
                                        @php
                                            $medium_array[$medium_data->type_name] = $medium_data->type_name;
                                        @endphp
                                    @endforeach
                                    {{ Form::select('medium', $medium_array, null, ['class' => 'medium', 'id' => 'medium']) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('Class', '', ['class' => 'control-label', 'title' => 'class']) }}
                                <div class="controls">
                                    {{ Form::select('class', [$request_class => $request_class]) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('Department', '', ['class' => 'control-label', 'title' => 'department']) }}
                                <div class="controls">
                                    @php
                                        
                                        $department_array = ['--select--' => '--select--'];
                                    @endphp
                                    @foreach ($department as $department_data)
                                        @php
                                            $department_array[$department_data->id] = $department_data->department_name;
                                        @endphp

                                    @endforeach


                                    {{ Form::select('department', $department_array) }}
                                </div>
                            </div>


                            <div class="control-group">

                                {{ Form::label('Section', '', ['class' => 'control-label', 'title' => 'section']) }}
                                <div class="controls">
                                    @php
                                        $section = DB::table('manage_section')
                                            ->where('class', $request_class)
                                            ->get();
                                        $section_array = ['--select--' => '--select--'];
                                    @endphp
                                    @foreach ($section as $section_data)
                                        @php
                                            $section_array[$section_data->section_name] = $section_data->section_name;
                                        @endphp

                                    @endforeach


                                    {{ Form::select('section', $section_array) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('type', ' Type', ['class' => 'control-label', 'title' => 'Type']) }}
                                <div class="controls">
                                    {{ Form::select('type', ['' => '--select--', 'Tech' => 'Tech', 'Non-Tech' => 'Non-Tech'], null, ['id' => 'type']) }}
                                </div>

                            </div>




                            <div class="control-group">

                                {{ Form::label('Teacher', '', ['class' => 'control-label', 'title' => 'teacher']) }}
                                <div class="controls">
                                    @foreach ($teacher as $teacher_list)
                                        @php $teacher_data[$teacher_list->teacher_name]=$teacher_list->teacher_name @endphp
                                    @endforeach
                                    {{ Form::select('teacher', $teacher_data) }}
                                </div>
                            </div>




                            <div class="control-group">
                                {{ Form::label('Component', '', ['class' => 'control-label', 'title' => 'teacher']) }}
                                <div class="controls">

                                    <table class='table' style="width:80%">
                                        <thead>
                                            <tr>
                                                <th>Component Name </th>
                                                <th>Total Mark</th>
                                                <th>Pass mark ( set as percentge )</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($component_data as $component_data_list)
                                                <tr>
                                                    <td>{{ $component_data_list->component_name }} (
                                                        {{ $component_data_list->abbr }} )</td>
                                                    <td>
                                                        {{ Form::hidden('component_id[]', $component_data_list->component_id) }}
                                                        {{ Form::text('total_mark[]') }}
                                                    </td>

                                                    <td>
                                                        {{ Form::text('percentage[]') }} %
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>




                                </div>
                            </div>




                            <div class="form-actions">
                                @can('create subject')
                                    {{ Form::submit('submit', ['class' => 'btn btn-success']) }}
                                @endcan
                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/subject.js') }}"></script>
    @endpush
@stop
