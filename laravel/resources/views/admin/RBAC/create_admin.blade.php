@extends('admin.index')
@section('Title', 'Create Admin')
@section('breadcrumbs', 'Create Admin')
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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create Admin</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Create Admin</p> <!-- Transport Details -->

        @can('create admin')
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
                        <li><a href='#'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create New</a></li>
                    </ul>
                </div>
            </div>
        @endcan


        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/create_permission'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create
                                permission</a></li>
                        <li><a href='/create_role'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create role</a>
                        </li>

                        <li><a href='/user_access'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;User acess</a>
                        </li>
                        <li><a href='/'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a
                            href="/create_admin_Excel_report"><i class="fa fa-file-excel-o"
                                aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/create_admin_pdf_report"><i class="fa fa-street-view"
                                aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>







        <div class="tab-content">

            <div class="modal fade" id="myModal" role="dialog" style="margin-left: -7%;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create
                                New</h4>
                        </div>

                        <div class="modal-body">
                            <div class="widget-content padding">
                                {{ Form::open(['url' => '/create_admin', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}

                                <div class="control-group">
                                    {{ Form::label('name', 'Name', ['class' => 'control-label', 'title' => 'name']) }}
                                    <div class="controls">
                                        {{ Form::text('name', '', ['id' => 'required', 'placeholder' => 'Admin Name', 'title' => 'name']) }}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {{ Form::label('email', 'Email Address', ['class' => 'control-label', 'title' => 'email']) }}
                                    <div class="controls">
                                        {{ Form::email('email', '', ['id' => 'required', 'placeholder' => 'Email Address', 'title' => 'email']) }}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {{ Form::label('User Type', 'User Type', ['class' => 'control-label', 'title' => 'email']) }}
                                    <div class="controls">
                                        {{ Form::select('user_type', ['Software User' => 'Software User', 'Website User' => 'Website User', 'Student' => 'Student', 'Parent' => 'Parent'], null, ['class' => 'user_type']) }}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {{ Form::label('password', 'Password', ['class' => 'control-label', 'title' => 'password']) }}
                                    <div class="controls">
                                        <div class="input-append">
                                            {{ Form::password('password', ['class' => 'form-control', 'onkeyup' => 'password_len_check()', 'id' => 'password', 'title' => 'password']) }}
                                            <span class="add-on" id="password_show_button"><i
                                                    class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                        </div>

                                        <div hidden="hidden">
                                            {{ Form::text('remember_token', csrf_token(), ['id' => 'required', 'placeholder' => 'Student Name', 'title' => 'Token', 'class' => 'form-control']) }}

                                        </div>
                                        </br>
                                        <span id="help_block"></span>
                                    </div>



                                    <div class="control-group">
                                        {{ Form::label('confirm_password', 'Confirm Password', ['class' => 'control-label', 'title' => 'confirm_password']) }}
                                        <div class="controls">
                                            {{ Form::password('confirm_password', ['class' => 'form-control', 'onkeyup' => 'Password_match()', 'id' => 'password_confirm', 'name' => 'password_confirmation', 'title' => 'confirm_password']) }}
                                            </br>
                                            <span id="password_match"></span>
                                        </div>
                                    </div>





                                </div>
                            </div>
                            <div class="modal-footer">
                                @can('create admin')
                                    {{ Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'submit_button', 'style' => 'float:left', 'disabled' => 'disabled']) }}
                                    {{ Form::submit('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
                                @endcan
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end of the new add form-->


            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Admin & User List</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table font_my">

                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($create_admin_data as $admin_info)

                                    <tr class="gradeX">
                                        <td>{{ $admin_info->id }}</td>
                                        <td>{{ $admin_info->name }}</td>
                                        <td>{{ $admin_info->email }}</td>
                                        <td>************</td>
                                        <td id="my_align" class="display_status">
                                            @can('view admin')
                                                {{ Form::open(['url' => "/create_admin/$admin_info->id", 'method' => 'GET']) }}
                                                @if ($admin_info->status == 'Active')
                                                    {{ Form::submit($admin_info->status, ['class' => 'btn btn-default']) }}
                                                @else
                                                    {{ Form::submit($admin_info->status, ['class' => 'btn btn-warning']) }}
                                                @endif
                                                {{ Form::close() }}
                                            @endcan

                                            @can('edit admin')
                                                {{ Form::open(['url' => "/create_admin/$admin_info->id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan

                                            @can('delete admin')
                                                {{ Form::open(['url' => "/create_admin/$admin_info->id", 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this User?')"]) }}
                                                {{ Form::close() }}
                                            @endcan

                                        </td>
                                    </tr>

                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/create_admin.js') }}"></script>
    @endpush
@stop
