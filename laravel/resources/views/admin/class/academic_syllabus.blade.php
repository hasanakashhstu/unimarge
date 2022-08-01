@extends('admin.index')
@section('Title', 'Academic Syllabus')
@section('breadcrumbs', 'Academic Syllabus')
@section('breadcrumbs_link', '/academic_syllabus')
@section('breadcrumbs_title', 'Academic Syllabus')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::has('Error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ Session::get('Error') }}
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




    <div hidden="hidden" class="modal fade" id="myModal" style="width: 50%; height: 80%" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;File View</h4>
                </div>

                <div id='file_div'>sss</div>


            </div>
        </div>
    </div>





    <div class="container">
        <h2><i class="fa fa-window-restore" aria-hidden="true"></i>Academic Syllabus</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
            Details</p><br /><!-- Transport Details -->

        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage Class</a>
                        </li>
                        <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp;Manage
                                Section</a></li>
                        <li><a href='/manage_department'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Manage
                                Department</a></li>

                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/academic_syllabus_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/academic_syllabus_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/academic_syllabus_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>




        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Academic Syllabus</a></li>
            @can('create class routine')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Academic
                        Syllabus</a></li>
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
                        <table class="table table-bordered data-table font_my">

                            <thead>
                                <tr>
                                    <th>Title </th>
                                    <th>Description</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Department</th>
                                    <th>Medium</th>
                                    <th>File Name</th>
                                    <th>File Preview</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($academic_syllabus as $academic_syllabus_list)
                                    <tr class="gradeX">
                                        <td>{{ $academic_syllabus_list->title }}</td>
                                        <td>{{ $academic_syllabus_list->description }}</td>
                                        <td>{{ $academic_syllabus_list->class_name }}</td>
                                        <td>{{ $academic_syllabus_list->subject }}</td>
                                        <td>{{ $academic_syllabus_list->department }}</td>
                                        <td>{{ $academic_syllabus_list->medium }}</td>
                                        <td>{{ $academic_syllabus_list->class_name . '_' . $academic_syllabus_list->subject . '.pdf' }}
                                        </td>


                                        <td> <a style="font-size: 25px;color: red;margin-left: 40%;" file_extension=""
                                                file_title="{{ $academic_syllabus_list->class_name }}" data-toggle='modal'
                                                data-target='#myModal' class="file_jquery" id="file_jquery" href="#">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i></td>

                                        <td class="center">

                                            <div class="display_status">
                                                @can('edit class routine')
                                                    {{ Form::open(['url' => "academic_syllabus/$academic_syllabus_list->id/edit", 'method' => 'GET']) }}
                                                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                    {{ Form::close() }}
                                                @endcan

                                                @can('delete class routine')
                                                    {{ Form::button('DELETE', ['class' => 'btn btn-danger applicant_student_delete', 'value' => $academic_syllabus_list->id]) }}
                                                @endcan
                                                @can('view class routine')
                                                    {{ Form::open(['url' => "academic_syllabus_download/$academic_syllabus_list->class_name/$academic_syllabus_list->subject", 'method' => 'GET']) }}
                                                    {{ Form::submit('Download', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
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
                            <h5>Academic Syllabus</h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/academic_syllabus', 'class' => 'form-horizontal', 'files' => true, 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}


                            <div class="control-group">

                                {{ Form::label('Title', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('title', '', ['title' => 'title']) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('description', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('description', '', ['id' => 'description', 'title' => 'description']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('class_name', 'Class Name', ['class' => 'control-label', 'title' => 'class_name']) }}
                                <div class="controls">
                                    @php
                                        $class = ['' => '--select--'];
                                    @endphp

                                    @foreach ($manage_class as $manage_class_list)
                                        @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                                    @endforeach

                                    {{ Form::select('class_name', $class, null, ['id' => 'class_name']) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('department', 'Department', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::select('department', ['Department Name' => 'Department Name'], null, ['id' => 'department']) }}
                                </div>
                            </div>

                            <div class="control-group">

                                {{ Form::label('Subject', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::select('subject', ['Subject Name' => 'Subject Name'], null, ['id' => 'subject']) }}
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
                                {{ Form::label('academic_syllebus_file', 'Academic Syllebus File', ['class' => 'control-label', 'title' => 'queston_file']) }}
                                <div class="controls">
                                    {{ Form::file('files', ['onchange' => 'readURL(this)']) }} <font color="red">PDF File Only
                                        Upload Here</font>
                                </div>
                            </div>


                            <div class="form-actions">
                                {{ Form::submit('upload syllabus', ['class' => 'btn btn-success']) }}
                            </div>

                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/academic_syllabus.js') }}"></script>
    @endpush


@stop
