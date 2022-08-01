@extends('admin.index')
@section('Title', 'Website Setup')
@section('breadcrumbs', 'Admission Setup')
@section('breadcrumbs_link', '/frontend/admission_setup')
@section('breadcrumbs_title', 'general_settings')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
    {{ Session::get('success') }}
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
    <h2><i class="fa fa-book" aria-hidden="true"></i>Admission Setup</h2> <!-- Tab Heading  -->
    <p title="Transport Details">Admission Setup Details</p> <!-- Transport Details -->

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                Admission Setup List</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Admission Setup</a></li>
    </ul>
    <div class="tab-content">
        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data Table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Program Type</th>
                                <th>Name</th>
                                <th>Session</th>
                                <th>Year</th>
                                <th>Deadline</th>
                                <th>Admission Test</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach($setups as $key => $setup)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$setup->program_type}}</td>
                                <td>{{$setup->department_name}}</td>
                                <td>{{$setup->session_name}}</td>
                                <td>{{$setup->year}}</td>
                                <td>{{$setup->application_deadline}}</td>
                                <td>{{$setup->date_of_admission_test}}</td>
                                <td>{{$setup->status}}</td>


                                <td id="my_align" class="display_status">

                                    {{Form::open(['url'=>"/frontend/admission_setup_edit/$setup->admission_setup_id/edit" ,'method'=>'GET'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                    {{Form::close()}}

                                    {{Form::open(['url'=>"/frontend/admission_setup_delete/$setup->admission_setup_id" ,'method'=>'DELETE'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this User?')"])}}
                                    {{Form::close()}}

                                </td>
                            </tr>

                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--report--->

        <div id="menu1" class="tab-pane fade">
            <div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Notice</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {{Form::open(['url'=>'/frontend/admission_setup_save','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                        <div class="control-group">
                            {{Form::label('program_type','Program Type',['class'=>'control-label','title'=>'Program Type'])}}
                            <div class="controls">
                                @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                @foreach ($program_type as $degree_name_data_list)
                                @php $degree_name_data_list_array[$degree_name_data_list->id]=$degree_name_data_list->program_type @endphp
                                @endforeach
                                {!! Form::select('program_type',  $degree_name_data_list_array, null, ['required']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {{Form::label('department_id','Department Name',['class'=>'control-label','title'=>'Department Name'])}}
                            <div class="controls">
                                @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                @foreach ($manage_department as $degree_name_data_list)
                                @php $degree_name_data_list_array[$degree_name_data_list->id]=$degree_name_data_list->department_name @endphp
                                @endforeach
                                {!! Form::select('department_id',  $degree_name_data_list_array, null, ['required']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {{Form::label('session','Session',['class'=>'control-label','title'=>'session'])}}
                            <div class="controls">
                                @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                @foreach ($session_choose_data as $degree_name_data_list)
                                @php $degree_name_data_list_array[$degree_name_data_list->id]=$degree_name_data_list->name @endphp
                                @endforeach
                                {!! Form::select('session',  $degree_name_data_list_array, null, ['required']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {{Form::label('year','Year',['class'=>'control-label','title'=>'Year'])}}
                            <div class="controls">
                                {{Form::text('year','',['id'=>'required','placeholder'=>'Year','title'=>'Year'])}}
                            </div>
                        </div>
                        <div class="control-group">
                            {{Form::label('application_deadline','Application Deadline',['class'=>'control-label','title'=>'Application Deadline'])}}
                            <div class="controls">
                                <div data-date="12-02-2012" class="input-append date datepicker">
                                    {{ Form::date('application_deadline', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            {{Form::label('date_of_admission_test','Date f Admission Test',['class'=>'control-label','title'=>'date_of_admission_test'])}}
                            <div class="controls">
                                <div data-date="12-02-2012" class="input-append date datepicker">
                                    {{ Form::date('date_of_admission_test', null, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            {{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                            <div class="controls">
                                @php $degree_name_data_list_array=[''=>'--select--'] @endphp
                                @foreach ($status as $key => $degree_name_data_list)
                                @php $degree_name_data_list_array[$key]=$degree_name_data_list @endphp
                                @endforeach
                                {!! Form::select('status',  $degree_name_data_list_array, null, ['required']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        {{ Form::submit('Submit', ['value' => 'Submit', 'class' => 'btn btn-success', 'style' => 'float:left;']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/admit_student.js') }}"></script>
@endpush

@push('scripts')
<x-web.tiny-mce />

<script>
tinymceHelper.init('#about_us');
tinymceHelper.init('#history');
tinymceHelper.init('#overview');
tinymceHelper.init('#mission_vision');
tinymceHelper.init('#vision');
tinymceHelper.init('#principle_message');
tinymceHelper.init('#strategy');
tinymceHelper.init('#founder_message');
tinymceHelper.init('#chairman_message');
</script>
@endpush

@stop
