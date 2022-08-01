@extends('admin.index')
@section('Title', 'Create Role')
@section('breadcrumbs', 'Create Role')
@section('breadcrumbs_link', '/create_role')
@section('breadcrumbs_title', 'Create Role')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp;Success!</strong>
            {{ Session::get('success') }}
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
        <h2><i class="fa fa-user-secret" aria-hidden="true"></i> &nbsp;Create Role</h2>
        <p title="Transport Details">{{ Session::get('school.system_name') }} User Role Details</p>
        @can('manage role and permission')
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
                        <li>
                            <a href=''>
                                <i class="fa fa-child" aria-hidden="true">
                                </i> Create Role
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endcan
        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/create_admin'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create Admin</a>
                        </li>
                        <li><a href='/user_access'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;User Access</a>
                        </li>
                        <li><a href='/permission_role'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Permission
                                Role </a></li>
                        <li><a href='/'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>

                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/create_role_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Export Excel' type="button"><a
                            href="/create_role_Excel_report"><i class="fa fa-file-excel-o"
                                aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/create_role_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>

                </div>
            </div>
        </div>


        <div class="tab-content">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-child" aria-hidden="true"></i> &nbsp;Create Role
                            </h4>
                        </div>


                        {{ Form::open(['url' => '/create_role', 'method' => 'post', 'action' => '#', 'name' => 'basic_validate', 'id' => 'basic_validate', 'class' => 'form-horizontal']) }}
                        <div class="modal-body">
                            <div class="widget-content padding">


                                <div class="control-group">
                                    {{ Form::label('Role Name', '', ['class' => 'control-label']) }}

                                    <div class="controls">
                                        {{ Form::text('display_name', '', ['title' => 'display_name', 'id' => 'required']) }}

                                    </div>
                                </div>

                                <div class="control-group">
                                    {{ Form::label('Description', '', ['class' => 'control-label']) }}

                                    <div class="controls">
                                        {{ Form::textarea('description', '', ['col' => '20', 'rows' => '4', 'title' => 'description']) }}

                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="modal-footer">
                            @can('manage role and permission')
                                {{ Form::submit('submit', ['class' => 'btn btn-success', 'style' => 'float:left', 'value' => 'submit']) }}
                                {{ Form::button('close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal', 'value' => 'Close']) }}
                            @endcan

                        </div>
                        {{ Form::close() }}


                    </div>
                </div>
            </div>
        </div>





        <!--end of the new add form-->




        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">

                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Role Data table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th> Role Name
                                </th>
                                <th>Description
                                </th>
                                <th>Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($role_info as $role_information)
                                <tr class="gradeX">
                                    <td>{{ $role_information->display_name }}</td>
                                    <td>{{ $role_information->description }}</td>
                                    <td id="my_align" class="display_status">
                                        @can('manage role and permission')
                                            {{ Form::open(['url' => "/create_role/$role_information->name/edit", 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan

                                        @can('manage role and permission')
                                            {{ Form::open(['url' => "/create_role/$role_information->name", 'method' => 'DELETE']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Delete This Role?')"]) }}
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/create_role.js') }}"></script>
    @endpush
@stop
