@extends('admin.index')
@section('Title', 'Create News Information')
@section('breadcrumbs', 'Create News')
@section('breadcrumbs_link', '/create_admin')
@section('breadcrumbs_title', 'Create News Information')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create News</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} News</p> <!-- Transport Details -->




            <div class="controls text-right">
                <div slider-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a
                            href="/create_admin_Excel_report"><i class="fa fa-file-excel-o"
                                aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/create_admin_pdf_report"><i class="fa fa-street-view"
                                aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Print' type="button"><a href="#" id='print'><i
                                class="fa fa-print" aria-hidden="true"></i></a></button>
                </div>
            </div>
        </div>







        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Create News</h5>
            </div>


            <div class="widget-content padding">
                {{ Form::open(['url' => 'frontend/news','class' => 'form-horizontal','method' => 'POST','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}


                <div class="control-group">
                    {{ Form::label('title', 'Title', ['class' => 'control-label', 'title' => 'title']) }}
                    <div class="controls">
                        {{ Form::text('title', old('title'), ['id' => 'required', 'placeholder' => 'Title', 'title' => 'title']) }}
                    </div>




                    <div class="control-group">
                        {{ Form::label('description', 'Description', ['class' => 'control-label', 'title' => 'description']) }}
                        <div class="controls">
                            {{ Form::textarea('description', old('description'), ['id' => 'description','placeholder' => 'Designation','title' => 'Designation']) }}
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('news_date', 'News Date', ['class' => 'control-label', 'title' => 'news_date']) }}
                        <div class="controls">
                            {{ Form::date('news_date', old('news_date'), ['id' => 'required','placeholder' => 'News Date','title' => 'news_date']) }}
                        </div>
                    </div>


                    <div class="control-group">
                        {{ Form::label('department', 'Department', ['class' => 'control-label', 'title' => 'description']) }}
                        <div class="controls">
                            <select name="department">

                                <option value="">Select a Department</option>
                                @foreach ($departments as $departments_list)
                                    <option value="{{ $departments_list->id }}"
                                        @if (old('department') == $departments_list->id) selected @endif>
                                        {{ $departments_list->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('file', '', ['class' => 'control-label', 'title' => 'file']) }}

                        <div class="controls">
                            {{ Form::file('file') }}
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
