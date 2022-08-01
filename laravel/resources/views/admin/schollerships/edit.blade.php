@extends('admin.index')
@section('Title', 'Edit Department Schollership')
@section('breadcrumbs', 'Department Schollership')
@section('breadcrumbs_link', '/admin/schollerships')
@section('breadcrumbs_title', 'Department Schollership')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Department Schollership</h2>
            <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Department Schollership</p>
            <!-- Transport Details -->
        </div>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Edit Department Schollership</h5>
            </div>


            <div class="widget-content padding">
                {{ Form::open(['url' => url('admin/schollerships/' . $schollership->id),'class' => 'form-horizontal','method' => 'PUT','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}


                <div class="control-group">
                    {{ Form::label('department_id', 'Department', ['class' => 'control-label', 'title' => 'department_id']) }}
                    <div class="controls">
                        <select name="department_id" id="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if (old('department_id', $schollership->department_id) == $department->id) selected @endif>
                                    {{ $department->department_name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="control-group">
                        {{ Form::label('content', 'Content', ['class' => 'control-label', 'title' => 'content']) }}
                        <div class="controls">
                            {{ Form::textarea('content', old('content', $schollership->content), ['id' => 'content_textarea','placeholder' => 'Content','title' => 'Content']) }}
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
            tinymceHelper.init('#content_textarea');
        </script>
    @endpush

@stop
