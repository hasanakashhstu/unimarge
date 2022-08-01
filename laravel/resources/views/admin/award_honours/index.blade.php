@extends('admin.index')
@section('Title', 'Awards and Honours')
@section('breadcrumbs', 'Awards and Honours')
@section('breadcrumbs_link', '/admin/award_honours')
@section('breadcrumbs_title', 'Awards and Honours')

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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Awards and Honours</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif Awards and Honours</p> <!-- Transport Details -->

        @can('create awards and honours')
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test'>
                        <li><a href={{ url('admin/award_honours/create') }}><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>&nbsp;Create New</a></li>
                    </ul>
                </div>
            </div>
        @endcan

        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Awards and Honours Table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Teacher</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($awardHonours as $awardHonour)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ optional($awardHonour->teacher)->teacher_name }}</td>
                                    <td>{!! $awardHonour->content !!}</td>
                                    <td id="my_align" class="display_status">
                                        @can('edit awards and honours')
                                            {{ Form::open(['url' => "/admin/award_honours/$awardHonour->id/edit", 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan

                                        @can('delete awards and honours')
                                            {{ Form::open(['url' => "/admin/award_honours/$awardHonour->id", 'method' => 'DELETE']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete?')"]) }}
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

@stop
