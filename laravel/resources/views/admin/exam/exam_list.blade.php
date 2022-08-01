@extends('admin.index')
@section('Title', 'Exam List')
@section('breadcrumbs', 'Exam List')
@section('breadcrumbs_link', '/exam_list')
@section('breadcrumbs_title', 'Exam list')

@section('content')


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




    <div class="container">
        <h2><i class="fa fa-list" aria-hidden="true"></i> Exam List</h2> <!-- Tab Heading  -->
        <p title="Transport Details">I SchoolExam List Details</p> <!-- Transport Details -->
        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                        <li><a href='/exam_grade'><i class="fa fa-address-card-o" aria-hidden="true"></i> Exam Grade</a></li>
                        <li><a href='/manage_marks'><i class="fa fa-street-view" aria-hidden="true"></i>Manage Marks</a>
                        </li>
                        <li><a href='/check_marks'><i class="fa fa-address-book-o" aria-hidden="true"></i>Cheack Marks </a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/teacher_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/teacher_report_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/teacher_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>

                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Exam List</a></li>
            @can('create exam')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Exam </a></li>
            @endcan
        </ul>



        <div class="tab-content" style="width:1090px;">
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
                                    <th>Exam Name </th>
                                    <th>Controller</th>
                                    <th>Exam Start Date</th>
                                    <th>Exam End Date</th>
                                    <th>Publish</th>
                                    <th>Option</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($exam_list as $exam_list_data)
                                    <tr class="gradeX">
                                        <td>{{ $exam_list_data->exam_name }}</td>
                                        <td>{{ $exam_list_data->teacher_name }}</td>
                                        <td>{{ $exam_list_data->exam_start_date }}</td>
                                        <td>{{ $exam_list_data->exam_end_date }}</td>
                                        <td>
                                            @if ($exam_list_data->publish == 'Yes')
                                                <i style="color: green" class="fa fa-circle" aria-hidden="true"></i>
                                                Publish

                                            @else


                                                <i style="color: red" class="fa fa-circle" aria-hidden="true"></i> Draft

                                            @endif

                                        </td>

                                        <td id="my_align" class="display_status">
                                            @can('create exam')
                                                {{ Form::open(['url' => "exam_list/$exam_list_data->id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan

                                            @can('delete exam')

                                                {{ Form::open(['url' => "exam_list/$exam_list_data->id", 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
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
                            <h5>Exam List</h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/exam_list', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}


                            <div class="control-group">
                                {{ Form::label('exam_name', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('exam_name', '', ['title' => 'exam_name']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('Controller', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    @php $teacher_data_array=[''=>'--select--'] @endphp
                                    @foreach ($teacher_data as $teacher_list_data)
                                        @php $teacher_data_array[$teacher_list_data->teacher_id]=$teacher_list_data->teacher_name @endphp
                                    @endforeach
                                    {{ Form::select('controller', $teacher_data_array) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('Exam Start Date', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::date('exam_start_date', '', ['title' => 'exam_name']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('Exam End Date', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::date('exam_end_date', '', ['title' => 'exam_name']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('published', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::select('publish', ['Yes' => 'Yes', 'No' => 'No']) }}
                                </div>
                            </div>


                            <div class="form-actions">
                                @can('create exam')
                                    {{ Form::submit('submit', ['class' => 'btn btn-primary', 'value' => 'Add Exam']) }}
                                @endcan
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>





            </div>

        </div>
    </div>


@stop
