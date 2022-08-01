@extends('admin.index')
@section('Title', 'Department Contact')
@section('breadcrumbs', 'Department Contact')
@section('breadcrumbs_link', '/admin/department_contacts')
@section('breadcrumbs_title', 'Department Contact')

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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Department Contact</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Department Contact</p> <!-- Transport Details -->


        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href={{ url('admin/department_contacts/create') }}><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>&nbsp;Create New</a></li>
                </ul>
            </div>
        </div>

        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Department Contact Table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departmentContacts as $departmentContact)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $departmentContact->department->department_name }}</td>
                                    <td>{!! $departmentContact->content !!}</td>
                                    <td id="my_align" class="display_status">

                                        {{ Form::open(['url' => "/admin/department_contacts/$departmentContact->id/edit", 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                        {{ Form::close() }}

                                        {{ Form::open(['url' => "/admin/department_contacts/$departmentContact->id", 'method' => 'DELETE']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete?')"]) }}
                                        {{ Form::close() }}

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
