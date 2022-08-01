@extends('admin.index')
@section('Title', 'Edit Event Information')
@section('breadcrumbs', 'Edit Event')
@section('breadcrumbs_link', '/frontend/events')
@section('breadcrumbs_title', 'Edit Event')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Event</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Event</p> <!-- Transport Details -->
        </div>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Edit Event Information</h5>
            </div>

            <div class="widget-content padding">
                {{ Form::open(['url' => "/frontend/events/$event->website_events_id",'class' => 'form-horizontal','method' => 'PUT','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}


                <div class="control-group">
                    {{ Form::label('title', 'Title', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        {{ Form::text('title', old('title', $event->title), ['id' => 'required','placeholder' => 'Title','title' => 'title']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('description', 'Description', ['class' => 'control-label', 'title' => 'description']) }}
                    <div class="controls">
                        {{ Form::textarea('description', old('description', $event->description), ['id' => 'description','placeholder' => 'Designation','title' => 'Designation']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('start_date', 'Start Date', ['class' => 'control-label', 'title' => 'description']) }}
                    <div class="controls">
                        {{ Form::date('start_date', old('start_date', $event->start_date), ['id' => 'required','placeholder' => 'Designation','title' => 'Designation']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('department', 'Department Name', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        <select name="department" id="department" class="department">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if (old('department', $event->department) == $department->id) selected @endif>
                                    {{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('image', '', ['class' => 'control-label', 'title' => 'image']) }}

                    <div class="controls">
                        {{ Form::image(Storage::url($event->image), 'image', ['alt' => 'Image','class' => 'img-responsive img-circle blank_applicant_student_image','id' => 'blah','style' => 'width:19%']) }}
                        <br>
                        {{ Form::file('image', ['onchange' => 'readURL(this)']) }}
                    </div>
                </div>


                <div class="modal-footer">
                    {{ Form::submit('Submit', ['class' => 'btn btn-success','id' => 'edit_submit_button','style' => 'float:left']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/create_admin_edit.js') }}"></script>
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result)
                            .width(200)
                            .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#description');
        </script>
    @endpush

@stop
