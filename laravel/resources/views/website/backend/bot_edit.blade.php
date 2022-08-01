@extends('admin.index')
@section('Title', 'Our Bot')
@section('breadcrumbs', 'BOT')
@section('breadcrumbs_link', '/frontend/bot_backend')
@section('breadcrumbs_title', 'BOT Edit Information')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit BOT</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} BOT</p> <!-- Transport Details -->




            <div class="controls text-right">
                <div our_management-toggle="buttons-checkbox" class="btn-group">
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
                <h5>{{ $bot->name }} Information Edit</h5>
            </div>

            <div class="widget-content padding">
                {{ Form::open(['url' => "/frontend/bot_backend/$bot->bot_id",'class' => 'form-horizontal','method' => 'PUT','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}

                <div class="control-group">
                    {{ Form::label('name', 'Name', ['class' => 'control-label', 'title' => 'name']) }}
                    <div class="controls">
                        {{ Form::text('name', $bot->name, ['id' => 'required', 'placeholder' => 'Admin Name', 'title' => 'name']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('designation', 'Designation', ['class' => 'control-label', 'title' => 'designation']) }}
                    <div class="controls">
                        {{ Form::text('designation', $bot->designation, ['id' => 'required','placeholder' => 'Designation','title' => 'designation']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('email', 'Email', ['class' => 'control-label', 'title' => 'email']) }}
                    <div class="controls">
                        {{ Form::text('email', $bot->email, ['id' => 'required', 'placeholder' => 'Email', 'title' => 'email']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('address', 'Address', ['class' => 'control-label', 'title' => 'address']) }}
                    <div class="controls">
                        {{ Form::text('address', $bot->address, ['id' => 'required', 'placeholder' => 'Address', 'title' => 'address']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('facebook', 'Facebook', ['class' => 'control-label', 'title' => 'facebook']) }}
                    <div class="controls">
                        {{ Form::text('facebook', $bot->facebook, ['id' => 'required','placeholder' => 'Facebook','title' => 'facebook']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('twitter', 'Twitter', ['class' => 'control-label', 'title' => 'twitter']) }}
                    <div class="controls">
                        {{ Form::text('twitter', $bot->twitter, ['id' => 'required', 'placeholder' => 'Twitter', 'title' => 'twitter']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('instagram', 'Instagram', ['class' => 'control-label', 'title' => 'instagram']) }}
                    <div class="controls">
                        {{ Form::text('instagram', $bot->instagram, ['id' => 'required','placeholder' => 'Instagram','title' => 'instagram']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('pinterest', 'Pinterest', ['class' => 'control-label', 'title' => 'pinterest']) }}
                    <div class="controls">
                        {{ Form::text('pinterest', $bot->pinterest, ['id' => 'required','Placeholder' => 'pinterest','title' => 'pinterest']) }}
                    </div>
                </div>

                <div class="control-group">
                    {{ Form::label('image', '', ['class' => 'control-label', 'title' => 'image']) }}

                    <div class="controls">
                        {{ Form::image(Storage::url($bot->image), 'Profile_image', ['alt' => 'Your Image','class' => 'img-responsive img-circle blank_applicant_student_image','id' => 'blah','style' => 'width:19%']) }}
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
    @endpush

@stop
