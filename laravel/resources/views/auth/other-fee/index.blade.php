@extends('admin.index')
@section('Title', 'Other Fees')
@section('breadcrumbs', 'Other Fees')
@section('breadcrumbs_link', route('auth.otherFees.index'))
@section('breadcrumbs_title', 'Other Fees')

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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Other Fees</h2> <!-- Tab Heading  -->
        <p title="Transport Details">
            @if (Session::has('school'))
                {{ Session::get('school.system_name') }}
            @endif Other Fees
        </p> <!-- Transport Details -->

        @can('create department')
            <div class="panel panel-default text-right">
                <div class="panel-body">
                    <ul class='dropdown_test'>
                        <li><a href={{ route('auth.otherFees.create') }}><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>&nbsp;Create Other Fee</a></li>
                    </ul>
                </div>
            </div>
        @endcan

        <!-- meta data list  -->
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Other Fees</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Fee (Per Semester)</th>
                                <th>Session</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($otherFees as $otherFee)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $otherFee->name }}</td>
                                    <td>{{ $otherFee->per_semester_fee }}</td>
                                    <td>{{ $otherFee->session }}</td>
                                    <td id="my_align" class="display_status">
                                        @can('edit department')
                                            {{ Form::open(['url' => route('auth.otherFees.edit', $otherFee->id), 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan

                                        @can('delete department')
                                            {{ Form::open(['url' => route('auth.otherFees.destroy', $otherFee->id), 'method' => 'DELETE']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger','onclick' => "return confirm('Are you sure to delete?')"]) }}
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

@endsection
