@extends('admin.index')
@section('Title', 'Events')
@section('breadcrumbs', 'Events')
@section('breadcrumbs_link', '/frontend/events')
@section('breadcrumbs_title', 'Events')

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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Events</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Events</p> <!-- Transport Details -->


        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href="{{ url('frontend/events/create') }}"><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>&nbsp;Create New</a></li>
                </ul>
            </div>
        </div>

        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Event List</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>Department</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $value)
                                <tr class="gradeX">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>{{ $value->start_date }}</td>
                                    <td>{{ $value->getDepartment->department_name }}</td>
                                    <td>
                                        <img style="width: 50px;" src="{{ Storage::url($value->image) }}">
                                    </td>
                                    <td id="my_align" class="display_status">

                                        {{ Form::open(['url' => "/frontend/events/$value->website_events_id/edit", 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                        {{ Form::close() }}

                                        {{ Form::open(['url' => "/frontend/events/$value->website_events_id", 'method' => 'DELETE']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this User?')"]) }}
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
