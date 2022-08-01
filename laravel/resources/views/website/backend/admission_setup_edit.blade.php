@extends('admin.index')
@section('Title','Edit Admin Information')
@section('breadcrumbs','Create Admin > Edit')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','Edit Admin Information')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" our_management-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ Session::get('success') }}
</div>

@endif

@if (Session::has('error'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" our_management-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> {{Session::get('error')}}
</div>

@endif


@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade in">
    <ul  style='list-style:none'>
        @foreach ($errors->all() as $error)
        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="widget-content nopadding">
    <div class="container">
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Admission setup</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}} Admission Setup</p> <!-- Transport Details -->




        <div class="controls text-right">
            <div our_management-toggle="buttons-checkbox" class="btn-group">
                <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                <button  class="btn btn-default" title='Print' type="button"><a href="#" id='print'><i class="fa fa-print" aria-hidden="true"></i></a></button>
            </div>
        </div>
    </div>








    <div class="widget-box">
        <div class="widget-title">
            <span class="icon"> <i class="icon-info-sign"></i></span>
            <h5>Information Edit</h5>
        </div>

        <div class="widget-content padding">
            {{Form::open(['url'=>"/frontend/admission_setup_update/$admission_setup->admission_setup_id",'class'=>'form-horizontal','method'=>'POST','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

            <div class="control-group">
                {{Form::label('program_type','Program Type',['class'=>'control-label','title'=>'Program Type'])}}
                <div class="controls">
                    {{Form::text('program_type',$admission_setup->program_type,['id'=>'required','readonly'=>'true'])}}
                </div>
            </div>

            <div class="control-group">
                {{Form::label('department_id','Department Name',['class'=>'control-label','title'=>'Department Name'])}}
                <div class="controls">
                   {{Form::text('department_id',$admission_setup->department_name,['id'=>'required','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>

            <div class="control-group">
                {{Form::label('session','Session',['class'=>'control-label','title'=>'session'])}}
                <div class="controls">
                     {{Form::text('session',$admission_setup->session_name,['id'=>'required','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
            <div class="control-group">
                {{Form::label('year','Year',['class'=>'control-label','title'=>'Year'])}}
                <div class="controls">
                    {{Form::text('year',$admission_setup->year,['id'=>'required','placeholder'=>'Year','title'=>'Year','readonly'=>'true'])}}
                </div>
            </div>
            <div class="control-group">
                {{Form::label('application_deadline','Application Deadline',['class'=>'control-label','title'=>'Application Deadline'])}}
                <div class="controls">
                    <div data-date="12-02-2012" class="input-append date datepicker">
                        {{ Form::date('application_deadline', $admission_setup->application_deadline, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}
                    </div>
                </div>
            </div>
            <div class="control-group">
                {{Form::label('date_of_admission_test','Date f Admission Test',['class'=>'control-label','title'=>'date_of_admission_test'])}}
                <div class="controls">
                    <div data-date="12-02-2012" class="input-append date datepicker">
                        {{ Form::date('date_of_admission_test',  $admission_setup->date_of_admission_test, ['data-date-format' => 'mm-dd-yyyy', 'style' => 'width:85%']) }}
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
                    {!! Form::select('status',  $degree_name_data_list_array, $admission_setup->status, ['required']) !!}
                </div>
            </div>		          


            <div class="modal-footer">
                {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'edit_submit_button','style'=>'float:left'])}}  
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
<script type="text/javascript" src="{{asset('extra_js/create_admin_edit.js')}}"></script>
@endpush

@stop
