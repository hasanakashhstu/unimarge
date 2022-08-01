@extends('admin.index')
@section('Title', 'Fess Structure')
@section('breadcrumbs', 'Fess Structure')
@section('breadcrumbs_link', '/frontend/fees_structure')
@section('breadcrumbs_title', 'Fess Structure')

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
            <strong>Error!</strong> {{ Session::get('error') }}
        </div>

    @endif

    <div class="container">
        <h2><i class="fa fa-plus-circle" aria-hidden="true"></i> Fees Structure</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Fees Structure</p><br /><!-- Transport Details -->

        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href={{ url('frontend/fees_structure/create') }}><i class="fa fa-plus-circle"
                                aria-hidden="true"></i>&nbsp;Create New</a></li>
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Fees Structure Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                  <th>#</th>
                                    <th>Department</th>
                                    <th>Fees Structure</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($feesStructures as $feesStructure)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $feesStructure->getDepartment->department_name }}</td>
                                    <td>{!! $feesStructure->fees_structure !!}</td>
                                    <td id="my_align" class="display_status">

                                        {{ Form::open(['url' => "/frontend/fees_structure/$feesStructure->id/edit", 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                        {{ Form::close() }}


                                        {{ Form::open(['url' => "/frontend/fees_structure/$feesStructure->id", 'method' => 'DELETE']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to delete this fees structure?')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
