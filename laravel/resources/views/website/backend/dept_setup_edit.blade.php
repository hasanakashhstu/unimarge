@extends('admin.index')
@section('Title', 'Department Page setup')
@section('breadcrumbs', 'Department Page setup')
@section('breadcrumbs_link', '/create_admin')
@section('breadcrumbs_title', 'create_admin')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif


    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Wrong!</strong> <?php echo Session::get('error'); ?>
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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Department Page setup</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Department Page setup</p> <!-- Transport Details -->

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon"> <i class="icon-info-sign"></i></span>
                <h5>Edit Department Page setup</h5>
            </div>


            <div class="widget-content padding">
                {{ Form::open(['url' => "/frontend/department_page_setup/$departmentPageSetup->department_setup_id", 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true, 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                <div class="control-group">
                    {{ Form::label('chairperson', 'Chairperson Message', ['class' => 'control-label', 'title' => 'Chairperson Message']) }}
                    <div class="controls">
                        {{ Form::textarea('chairperson', $departmentPageSetup->chairperson, ['id' => 'required', 'placeholder' => 'Chairperson Message', 'title' => 'Chairperson Message']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('study', 'Why Study', ['class' => 'control-label', 'title' => 'description']) }}
                    <div class="controls">
                        {{ Form::textarea('study', $departmentPageSetup->study, ['id' => 'required', 'placeholder' => 'Why Study', 'title' => 'Why Study']) }}
                    </div>
                </div>


                <div class="control-group">
                    {{ Form::label('department', 'Department', ['class' => 'control-label', 'title' => 'description']) }}
                    <div class="controls">
                        <select name="department">
                            <option value="" disabled selected>--select--</option>
                            @foreach ($departments as $departments_list)
                                <option value="{{ $departments_list->id }}" @if ($departmentPageSetup->department == $departments_list->id) selected @endif>
                                    {{ $departments_list->department_name }}
                                </option>
                            @endforeach
                        </select>
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
@stop
