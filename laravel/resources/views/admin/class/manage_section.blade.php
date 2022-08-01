@extends('admin.index')
@section('Title', 'Manage Sections')
@section('breadcrumbs', 'Manage Sections')
@section('breadcrumbs_link', '/manage_sections')
@section('breadcrumbs_title', 'Manage section')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ Session::get('error') }}
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
        <h2> <i class="fa fa-plus-square-o" aria-hidden="true"></i> Manage Sections</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
            Sections Details</p><br /> <!-- Transport Details -->






        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage
                                Program</a></li>
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
                            href="/manage_section_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/manage_section_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/manage_section_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>












        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Sections List</a></li>
            @can('create department')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Sections</a>
                </li>
            @endcan
        </ul>



        <div class="tab-content">
            <!-- Transport List Report  -->



            <div id="home" class="tab-pane fade in active">

                @foreach ($groupby_class as $groupby_class_info)
                    <div style="padding: 10px;
        border: 1px black solid;
        width: 20%;background: #1F262D;color: #fff">{{ $groupby_class_info->class }}</div>

                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Data table</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">

                                <thead>
                                    <tr>
                                        <th>Section Name </th>
                                        <th>Short Name</th>
                                        <th>Program</th>
                                        <th>Teacher</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($section_list as $section_list_data)

                                        @if ($groupby_class_info->class == $section_list_data->class)
                                            <tr class="gradeX">
                                                <td>{{ $section_list_data->section_name }}</td>
                                                <td>{{ $section_list_data->nick_name }}</td>
                                                <td>{{ $section_list_data->class }}</td>
                                                <td>{{ $section_list_data->teacher }}</td>
                                                <td id="my_align" class="display_status">
                                                    @can('edit department')
                                                        {{ Form::open(['url' => "/manage_section/$section_list_data->id/edit", 'method' => 'GET']) }}
                                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                        {{ Form::close() }}
                                                    @endcan

                                                    <!-- {{ Form::open(['url' => "/manage_section/$section_list_data->id", 'method' => 'DELETE']) }} -->
                                                    @can('delete department')
                                                        {{ Form::button('Delete', ['class' => 'btn btn-danger class_delete', 'value' => $section_list_data->id]) }}
                                                    @endcan
                                                    <!-- {{ Form::close() }} -->

                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                @endforeach
            </div>







            <div id="menu1" class="tab-pane fade">
                <div>
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Mange Section</h5>
                        </div>
                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/manage_section', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate']) }}


                            <div class="control-group">
                                {{ Form::label('Section Name', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('section_name', '', ['title' => 'section_name']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Short Name', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    {{ Form::text('nick_name', '', ['title' => 'nick_name']) }}
                                </div>
                            </div>


                            <div class="control-group">
                                {{ Form::label('Program', '', ['class' => 'control-label']) }}

                                <div class="controls">
                                    @foreach ($class_list as $class_data)
                                        @php $class_array[$class_data->id]=$class_data->class_name  @endphp
                                    @endforeach
                                    {{ Form::select('class', $class_array) }}
                                </div>
                            </div>


                            {{-- <div class="control-group">
            {{Form::label('Teacher','',['class'=>'control-label'])}}
             
              <div class="controls">
              @foreach ($teacher_info as $teacher_info_data)
                @php $teahcer[$teacher_info_data->teacher_name]=$teacher_info_data->teacher_name @endphp
              @endforeach
                {{Form::select('teacher',$teahcer)}}
              </div>
            </div> --}}

                            <div class="form-actions">
                                {{ Form::submit('Add Section', ['class' => 'btn btn-success']) }}

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
        <script type="text/javascript" src="{{ asset('extra_js/manage_section.js') }}"></script>
    @endpush

@stop
