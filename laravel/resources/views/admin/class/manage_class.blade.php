@extends('admin.index')
@section('Title', 'Manage Class')
@section('breadcrumbs', 'Manage Class')
@section('breadcrumbs_link', '/manage_class')
@section('breadcrumbs_title', 'Manage Class')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Success!</strong>
            {{ Session::get('success') }}
        </div>

    @endif


    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Error!</strong> {{ Session::get('error') }}
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
        <h2><i class="fa fa-safari" aria-hidden="true"></i> Manage Program</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Program Details</p> <br /><!-- Transport Details -->






        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Manage
                                Section</a></li>
                        <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage
                                Department</a></li>
                        <li><a href='/academic_syllabus'><i class="fa fa-window-restore"
                                    aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/manage_class_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/manage_class_excel"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/manage_class_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Program List</a></li>
            @can('create class routine')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Program</a></li>
            @endcan
        </ul>



        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Program Name </th>
                                    <th>Department</th>
                                    <th>Short Name</th>
                                    <th>Program Type</th>
                                    <th>Code</th>
                                    <th>Program Coordinator</th>
                                    <th>Option</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($class_list as $class_list_data)

                                    <tr class="gradeX">
                                        <td>{{ $class_list_data->id }}</td>
                                        <td>{{ $class_list_data->class_name }}</td>
                                        <td>{{ $class_list_data->class_department }}</td>
                                        <td>{{ $class_list_data->numeric_name }}</td>
                                        <td>{{ $class_list_data->class_program_type }}</td>
                                        <td>{{ $class_list_data->class_code }}</td>
                                        <td>{{ $class_list_data->class_teacher }}</td>
                                        <td id="my_align" class="display_status">
                                            @can('edit class routine')
                                                {{ Form::open(['url' => "/manage_class/$class_list_data->id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan

                                            @can('delete class routine')
                                                {{ Form::button('Delete', ['class' => 'btn btn-danger class_delete', 'value' => $class_list_data->id]) }}
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
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Mange Class</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/manage_class', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate']) }}


                            <div class="control-group">
                                {{ Form::label('Program Name', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('class_name', '', ['id' => 'class_name']) }}
                                    <div>
                                        <span id="check"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Department', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    @php $department_name_array=[] @endphp
                                    @foreach ($department_data as $department_name_list)
                                        @php $department_name_array[$department_name_list->id]=$department_name_list->department_name @endphp
                                    @endforeach
                                    {{ Form::select('class_department', $department_name_array) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Short Name', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('numeric_name', '', ['id' => 'number']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Program Type', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    @php $program_type_array=[] @endphp
                                    @foreach ($program_type_data as $program_type_list)
                                        @php $program_type_array[$program_type_list->program_type]=$program_type_list->program_type @endphp
                                    @endforeach
                                    {{ Form::select('class_program_type', $program_type_array) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('Code', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('class_code', '', ['id' => 'code']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Program coordinator', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    @php $teacher_name_array=[] @endphp
                                    @foreach ($teacher_data as $teacher_name_list)
                                        @php $teacher_name_array[$teacher_name_list->teacher_name]=$teacher_name_list->teacher_name @endphp
                                    @endforeach
                                    {{ Form::select('class_teacher', $teacher_name_array) }}
                                </div>
                            </div>
                            <div class="form-actions">
                                @can('create class routine')
                                    <input type="submit" id="submit" value="Add Class" class="btn btn-success">
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
        <script type="text/javascript" src="{{ asset('extra_js/manage_class.js') }}"></script>
    @endpush

@stop
