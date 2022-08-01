@extends('admin.index')
@section('Title', 'Create Permission')
@section('breadcrumbs', 'Create Permission')
@section('breadcrumbs_link', '/create_permission')
@section('breadcrumbs_title', 'Create Permission')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;Success!</strong>
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

    @if (Session::has('success_failed'))
        <div class="alert alert-danger alert-dismissible ">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o"
                    aria-hidden="true"></i>&nbsp;{{ Session::get('success_failed') }}</strong>
        </div>

    @endif




    <div class="container">

        <h2><i class="fa fa-sign-in" aria-hidden="true"></i></i> &nbsp; User Access</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ config('app.name') }} User Access</p> <!-- Transport Details -->


        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/create_permission'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Create
                                permission</a></li>
                        <li><a href='/create_role'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create role</a>
                        </li>
                        <li><a href='/create_admin'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Create Admin</a>
                        </li>
                        <li><a href='/'><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/user_access_export"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a
                            href="/user_access_export_excel"><i class="fa fa-file-excel-o"
                                aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/user_access_export"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>








        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars"
                        aria-hidden="true"></i>User List</a></li>
            @can('manage role and permission')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> User Access </a>
                </li>
            @endcan
        </ul>


        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Show</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Role Name</th>
                                    @can('manage role and permission')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_access as $user_access_list)
                                    <tr class="gradeX">

                                        @php
                                            $user_name = DB::table('users')
                                                ->where('id', $user_access_list->user_id)
                                                ->first();
                                        @endphp
                                        @php
                                            $role_name = DB::table('roles')
                                                ->where('id', $user_access_list->role_id)
                                                ->first();
                                        @endphp

                                        <td>{{ $user_name->email }}</td>
                                        <td>{{ $role_name->display_name }}</td>
                                        @can('manage role and permission')
                                            <td>
                                                {{ Form::open(['url' => "/user_access/$user_access_list->user_id", 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this User?')"]) }}
                                                {{ Form::close() }}
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div id="menu1" class="tab-pane fade">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>User Access</h5>
                    </div>
                    <div class="widget-content nopadding">
                        {{ Form::open(['url' => '/user_access', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate']) }}


                        <div class="control-group">
                            {{ Form::label('User Name', '', ['class' => 'control-label']) }}
                            <div class="controls">
                                @foreach ($user_list as $users)
                                    @php $user_array[$users->id]=$users->email @endphp
                                @endforeach
                                {{ Form::select('user_id', $user_array) }}
                            </div>
                        </div>


                        <div class="control-group">
                            {{ Form::label('User Name', '', ['class' => 'control-label']) }}
                            <div class="controls">
                                @foreach ($role_list as $roles)
                                    @php $role_array[$roles->id]=$roles->display_name @endphp
                                @endforeach
                                {{ Form::select('role_id', $role_array) }}
                            </div>
                        </div>

                        <div class="form-actions">
                            @can('manage role and permission')
                                <input type="submit" value="Save" class="btn btn-success">
                            @endcan
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/user_access.js') }}"></script>
    @endpush


@stop
