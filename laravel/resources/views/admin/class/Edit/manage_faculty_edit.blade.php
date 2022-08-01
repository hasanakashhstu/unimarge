@extends('admin.index')
@section('Title', 'Manage Department')
@section('breadcrumbs', 'Manage Department')
@section('breadcrumbs_link', '/manage_department')
@section('breadcrumbs_title', 'Manage Department')

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
        <h2><i class="fa fa-check-square-o" aria-hidden="true"></i> Manage Department Edit</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
            )
            Department Details Edit</p><br /> <!-- Transport Details -->



        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage Program</a>
                        </li>
                        <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Manage
                                Section</a></li>
                        <li><a href='/academic_syllabus'><i class="fa fa-window-restore"
                                    aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>
                        <li><a href='/manage_department'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/manage_department_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/manage_department_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/manage_department_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

        <div>
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>{{ $faculty_info->faculty_name }} faculty Name</h5>
                </div>

                <div class="widget-content nopadding">
                    {{ Form::open(['url' => "/manage_faculty/$faculty_info->faculty_id", 'class' => 'form-horizontal', 'method' => 'put', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                    <div class="control-group">
                        {{ Form::label('Faculty Name', '', ['class' => 'control-label']) }}
                        <div class="controls">
                            {{ Form::text('faculty_name', $faculty_info->faculty_name, ['title' => 'faculty_name']) }}
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('Faculty Code', '', ['class' => 'control-label']) }}
                        <div class="controls">
                            {{ Form::text('faculty_code', $faculty_info->faculty_code, ['title' => 'faculty_code']) }}
                        </div>
                    </div>


                    {{-- <div class="control-group">
                      {{Form::label('Class Name','',['class'=>'control-label','title'=>'class_name'])}}
                      <div class="controls">
                          @php $class[$faculty_info->class_name]=$faculty_info->class_name @endphp
                      @foreach ($class_list as $class_list_data)
                          @php $class[$class_list_data->class_name]=$class_list_data->class_name @endphp
                      @endforeach

                      {{Form::select('class_name',$class)}}
                      </div>
                    </div> --}}


                    <div class="control-group">
                        {{ Form::label('chairperson', 'Chairperson', ['class' => 'control-label']) }}
                        <div class="controls">
                            @if ($faculty_info->getChairperson)
                                @php
                                    $chairperson_array = [$faculty_info->getChairperson->teacher_id => $faculty_info->getChairperson->teacher_name];
                                @endphp
                            @endif

                            @foreach ($chairperson as $chairperson_array_data)
                                @php
                                    $chairperson_array[$chairperson_array_data->teacher_id] = $chairperson_array_data->teacher_name;
                                @endphp
                            @endforeach

                            {{ Form::select('chairperson', $chairperson_array, null, ['class' => 'chairperson', 'id' => 'chairperson']) }}
                        </div>
                    </div>



                    <div class="control-group">
                        {{ Form::label('Description', '', ['class' => 'control-label', 'title' => 'description']) }}
                        <div class="controls">
                            {{ Form::textarea('description', $faculty_info->description, ['style' => 'width:60%']) }}
                        </div>
                    </div>






                    <div class="form-actions">
                        {{ Form::submit('submit', ['value' => 'Submit', 'class' => 'btn btn-success']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/manage_department.js') }}"></script>
    @endpush


@stop
