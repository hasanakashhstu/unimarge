@extends('admin.index')
@section('Title', 'Create Result')
@section('breadcrumbs', 'Results')
@section('breadcrumbs_link', '/admin/results')
@section('breadcrumbs_title', 'result')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" slider-dismiss="alert" aria-label="close">&times;</a>
            <strong>Wrong!</strong> {{ Session::get('error') }}
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

    <div class="widget-content nopadding">
        <div class="container">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create Result</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Result</p> <!-- Transport Details -->
        </div>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Create Result</h5>
            </div>


            <div class="widget-content padding">
                {{ Form::open(['url' => url('admin/results/' . $result->id),'class' => 'form-horizontal','method' => 'PUT','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}


                <div class="control-group">
                    {{ Form::label('title', 'Title', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        {{ Form::text('title', old('title', $result->title), ['id' => 'required','placeholder' => 'Title','title' => 'title']) }}
                    </div>

                    <div class="control-group">
                        {{ Form::label('description', 'Description', ['class' => 'control-label', 'title' => 'description']) }}
                        <div class="controls">
                            {{ Form::textarea('description', old('description', $result->description), ['id' => 'required','placeholder' => 'Designation','title' => 'Designation','id' => 'description']) }}
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('file', '', ['class' => 'control-label', 'title' => 'file']) }}

                        <div class="controls">
                            {{ Form::file('file') }}
                            <a href="{{ Storage::url($result->file) }}" class="btn btn-primary" target="_blank">Result
                                File</a>
                        </div>
                    </div>


                    <div class="modal-footer">
                        {{ Form::submit('Submit', ['class' => 'btn btn-success','id' => 'edit_submit_button','style' => 'float:left']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/create_admin_edit.js') }}"></script>
    @endpush

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#description');
        </script>
    @endpush

@stop
