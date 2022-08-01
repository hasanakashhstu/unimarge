@extends('admin.index')
@section('Title', 'News')
@section('breadcrumbs', 'News')
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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;News</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{ Session::get('school.system_name') }}  @endif News</p> <!-- Transport Details -->


        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href={{ url('frontend/news/create') }}><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>&nbsp;Create New</a></li>
                </ul>
            </div>
        </div>



        <div class='row'>
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

        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>News Table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>news Date</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsList as $news)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td>{!! $news->description !!}</td>
                                    <td>{{ $news->news_date }}</td>
                                    <td>{{ $news->getDepartment->department_name }}</td>
                                    <td id="my_align" class="display_status">

                                        {{ Form::open(['url' => "/frontend/news/$news->website_news_id/edit", 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                        {{ Form::close() }}

                                        {{ Form::open(['url' => "/frontend/news/$news->website_news_id", 'method' => 'DELETE']) }}
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
