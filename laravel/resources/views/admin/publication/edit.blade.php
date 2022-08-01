@extends('admin.index')
@section('Title', 'Edit Publication')
@section('breadcrumbs', 'Publication')
@section('breadcrumbs_link', '/admin/publications')
@section('breadcrumbs_title', 'Publication')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Publication</h2>
            <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Publication</p>
            <!-- Transport Details -->
        </div>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Edit Publication</h5>
            </div>


            <div class="widget-content padding">
                {{ Form::open(['url' => url('admin/publications/' . $publication->id), 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true, 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}


                <div class="control-group">
                    {{ Form::label('teacher_id', 'Teacher', ['class' => 'control-label', 'title' => 'teacher_id']) }}
                    <div class="controls">
                        <select name="teacher_id" id="teacher_id">
                            <option value="" selected>Select a Teacher</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->teacher_id }}" @if (old('teacher_id', $publication->teacher_id) == $teacher->teacher_id) selected @endif>
                                    {{ $teacher->teacher_name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="control-group">
                        {{ Form::label('content', 'Content', ['class' => 'control-label', 'title' => 'content']) }}
                        <div class="controls">
                            {{ Form::textarea('content', old('content', $publication->content), ['id' => 'required', 'placeholder' => 'Designation', 'title' => 'Designation', 'class' => 'ckeditor']) }}
                        </div>
                    </div>

                    <div class="modal-footer">
                        {{ Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'edit_submit_button', 'style' => 'float:left']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        @push('custom-scripts')
            <script type="text/javascript" src="{{ asset('extra_js/create_admin_edit.js') }}"></script>
        @endpush

    @stop
