@extends('admin.index')
@section('Title', 'Parent Report ')
@section('breadcrumbs', 'Parent Report')
@section('breadcrumbs_link', '/parentreport')
@section('breadcrumbs_title', 'Parent Report')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong>
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

    <div class="container">
        <h2>
            <i class="fa fa-address-card" aria-hidden="true"></i>
            </i> &nbsp; Parent's Report
        </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }} )
            Parent's Info Report</p>




        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                        <li><a href='/parents_info'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Add Parent</a>
                        </li>

                        <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/parents_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/parents_report_excel"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/parents_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>





        <!-- Transport Details -->
        <div class="tab-content">
            <!-- Transport List Report  -->
            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-th">
                            </i>
                        </span>
                        <h5>Parent's Data table
                        </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender </th>
                                    <th>Profession</th>
                                    <th>Monthly Salery</th>


                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parents_info as $parents_information)
                                    <tr class="gradeX">
                                        <td>{{ $parents_information->name }}</td>
                                        <td>{{ $parents_information->email }}</td>
                                        <td>{{ $parents_information->phone }}</td>
                                        <td>{{ $parents_information->gender }}</td>
                                        <td>{{ $parents_information->profession }}</td>
                                        <td>{{ $parents_information->monthly_salary }}</td>

                                        <td id="my_align" class="display_status">

                                            @can('edit parent')
                                                {{ Form::open(['url' => "/parents_info/$parents_information->parent_id/edit", 'method' => 'GET']) }}
                                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                {{ Form::close() }}
                                            @endcan
                                            @can('delete parent')
                                                {{ Form::open(['url' => "/parents_info/$parents_information->parent_id", 'method' => 'DELETE']) }}
                                                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Remove ?')"]) }}
                                                {{ Form::close() }}
                                            @endcan

                                            <!--   {{ Form::button('Delete', ['class' => 'btn btn-danger class_delete', 'value' => $parents_information->parent_id, 'onclick' => "return confirm('Are you sure you want to delete this Parents Details?')"]) }} -->
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
        <script type="text/javascript" src="{{ asset('extra_js/parents.js') }}"></script>
    @endpush
@stop
