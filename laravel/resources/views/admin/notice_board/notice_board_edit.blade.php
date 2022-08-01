@extends('admin.index')
@section('Title', 'Edit Notice Board')
@section('breadcrumbs', 'Notice Board')
@section('breadcrumbs_link', '/notice_board')
@section('breadcrumbs_title', 'Edit Notice Board')
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
        <h2><i class="fa fa-book" aria-hidden="true"></i>Notice</h2> <!-- Tab Heading  -->
        <p title="Transport Details">Edit Notice Details</p> <!-- Transport Details -->

        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Add Notice</h5>
            </div>
            <div class="widget-content nopadding">





                {{ Form::open(['url' => url('notice_board/' . $noticeBoard->notice_id),'class' => 'form-horizontal','files' => true,'method' => 'put','name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}

                <div class="control-group">
                    {{ Form::label('notice_title', 'Notice Title', ['class' => 'control-label', 'title' => 'notice_title']) }}
                    <div class="controls">
                        {{ Form::text('notice_title', old('notice_title', $noticeBoard->notice_title), ['id' => 'required','placeholder' => 'Notice Title','title' => 'notice_title']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('notice_subject', 'Notice Subject', ['class' => 'control-label', 'title' => 'notice_subject']) }}
                    <div class="controls">
                        {{ Form::text('notice_subject', old('notice_subject', $noticeBoard->notice_subject), ['id' => 'required','placeholder' => 'Notice Subject','title' => 'notice_subject']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('author', 'Author', ['class' => 'control-label', 'title' => 'author']) }}
                    <div class="controls">
                        {{ Form::text('author', old('author', $noticeBoard->author), ['id' => 'required','placeholder' => 'Author','title' => 'author']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('notice_department', 'Department Name', ['class' => 'control-label','title' => 'department_name']) }}
                    <div class="controls">
                        @php $department_name['ALL']='ALL' @endphp
                        @foreach ($manage_department as $manage_department_list)
                            @php $department_name[$manage_department_list->department_code]=$manage_department_list->department_name @endphp
                        @endforeach
                        {{ Form::select('notice_department',$department_name,old('notice_department', $noticeBoard->notice_department),['id' => 'notice_department', 'class' => 'notice_department']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('to', 'TO', ['class' => 'control-label', 'title' => 'to']) }}
                    <div class="controls">
                        {{ Form::text('to', $noticeBoard->to, ['id' => 'select', 'disabled' => true]) }}

                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('write_notice', 'Write Notice', ['class' => 'control-label', 'title' => 'write_notice']) }}
                    <div class="controls">
                        {{ Form::textarea('Notice', $noticeBoard->Notice, ['col' => '20','rows' => '4','title' => 'Notice','id' => 'Notice']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('file', 'Notice File', ['class' => 'control-label', 'title' => 'queston_file']) }}
                    <div class="controls">
                        {{ Form::file('file') }}
                        <a href="{{ Storage::url($noticeBoard->file) }}" class="btn btn-primary" target="_blank">Notice
                            File</a>
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
    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#Notice');
        </script>
    @endpush
@stop
