@extends('admin.index')
@section('Title', 'Edit Gallery')
@section('breadcrumbs', 'Gallery')
@section('breadcrumbs_link', '/admin/galleries')
@section('breadcrumbs_title', 'Gallery')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Gallery</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Gallery</p> <!-- Transport Details -->
        </div>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Edit Gallery</h5>
            </div>

            <div class="widget-content padding">
                {{ Form::open(['url' => "/admin/galleries/$event->website_event_id", 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true, 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                <div class="control-group">
                    {{ Form::label('title', 'Title', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        {{ Form::text('title', old('title', $event->title), ['id' => 'required', 'placeholder' => 'Title', 'Title' => 'title']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('description', 'Description', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        {{ Form::text('description', old('description', $event->description), ['id' => 'required', 'placeholder' => 'Description', 'title' => 'description']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('department', 'Department', ['class' => 'control-label', 'title' => 'Department']) }}
                    <div class="controls">
                        <select name="department" id="department">
                            @foreach ($departments as $department)
                                <option @if (old('department', $event->department) == $department->id) selected @endif value="{{ $department->id }}">
                                    {{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('type', 'Show On', ['class' => 'control-label', 'title' => 'description']) }}
                    <div class="controls">
                        <select name="type">
                            <option @if (old('type', $event->type) == 1) selected="selected" @endif value="1">All</option>
                            <option @if (old('type', $event->type) == 2) selected="selected" @endif value="2">Home Page</option>
                            <option @if (old('type', $event->type) == 3) selected="selected" @endif value="3">Gallery</option>
                        </select>
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('image', '', ['class' => 'control-label', 'title' => 'image']) }}

                    <div class="controls">
                        {{ Form::image(Storage::url($event->image), 'image', ['alt' => 'Image', 'class' => 'img-responsive img-circle blank_applicant_student_image', 'id' => 'blah', 'style' => 'width:19%']) }}
                        <br>
                        {{ Form::file('image', ['onchange' => 'readURL(this)']) }}
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
