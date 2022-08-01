@extends('admin.index')
@section('Title', 'Role List')
@section('breadcrumbs', 'Role List')
@section('breadcrumbs_link', route('auth.roles.index'))
@section('breadcrumbs_title', 'Role List')

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

    <div class="container">
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Role List</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Role List</p> <!-- Transport Details -->


        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href={{ route('auth.roles.create') }}><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>&nbsp;Create Role</a></li>
                </ul>
            </div>
        </div>

        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Role List</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ Str::title($role->name) }}</td>
                                    <td>{{ $role->updated_at->diffForHumans() }}</td>
                                    <td id="my_align" class="display_status">
                                        @if ($role->name == 'super admin')
                                            All access granted!
                                        @else
                                            {{ Form::open(['url' => route('auth.roles.edit', $role->id), 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}


                                            @if ($role->name == 'super admin' || $role->name == 'teacher' || $role->name == 'staff' || $role->name == 'parent' || $role->name == 'student')
                                                <div>
                                                    <button class="btn btn-danger disabled">Delete</button>
                                                </div>
                                            @else
                                                {{ Form::open(['url' => route('auth.roles.destroy', $role->id), 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete?')"]) }}
                                                {{ Form::close() }}
                                            @endif
                                        @endif
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

@stop
