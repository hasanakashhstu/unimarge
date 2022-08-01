@extends('admin.index')
@section('Title', 'Component')
@section('breadcrumbs', 'Component')
@section('breadcrumbs_link', '/component')
@section('breadcrumbs_title', 'component')
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



        <h2><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Component</h2>
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

            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/component_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/component_excel"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/component_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>


        </div><br />






        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Component List</a>
            </li>
            @can('create subject')
                <li>
                    <a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Component</a>
                </li>
            @endcan
        </ul>


        <div class="tab-content">
            <!-- Transport List Report  -->
            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">

                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5> Component Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Component Name</th>
                                    <th>Abbr</th>
                                    <th>Mark</th>
                                    <th>Calculate Percent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($component_data as $component_list_data)
                                    <tr class="gradeX">
                                        <td>{{ $component_list_data->component_name }}</td>
                                        <td>{{ $component_list_data->abbr }}</td>
                                        <td>{{ $component_list_data->mark }}</td>
                                        <td>{{ $component_list_data->calculate_percent }}</td>
                                        <td id="my_align" class="display_status">
                                            @can('edit subject')
                                                {{ Form::open(['url' => "/component/$component_list_data->component_id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan

                                            @can('delete subject')
                                                {{ Form::open(['url' => "/component/$component_list_data->component_id", 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Remove ?')"]) }}
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
                        <div class="widget-title">
                            <span class="icon"><i class="icon-info-sign"></i></span>
                            <h5>Add Component </h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/component', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                            <div class="control-group">
                                {{ Form::label('Component Name', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('component_name', '', ['id' => 'required', 'placeholder' => 'Component Name']) }}
                                </div>
                            </div>



                            <div class="control-group">
                                {{ Form::label('Abbr', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('abbr', '', ['id' => 'required', 'placeholder' => 'Abbr', 'title' => 'abbr']) }}
                                </div>
                            </div>




                            <div class="form-actions">
                                {{ Form::submit('submit', ['class' => 'btn btn-success']) }}
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
