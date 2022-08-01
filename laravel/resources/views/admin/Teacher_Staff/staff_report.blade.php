@extends('admin.index')
@section('Title', 'Staff Report')
@section('breadcrumbs', 'Staff Report')
@section('breadcrumbs_link', '/staff_report')
@section('breadcrumbs_title', 'Staff Report')
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
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
        <h2><i class="fa fa-address-book-o" aria-hidden="true"></i> &nbsp; Staff's Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Staff Report</p> <!-- Transport Details -->



        <div class='row'>

            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>

                        <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                        <li><a href='/staff_info'><i class="fa fa-graduation-cap" aria-hidden="true"></i> Add Staff</a></li>
                        <li><a href='/teacher_info'><i class="fa fa-user" aria-hidden="true"></i> Add Teacher</a></li>
                        <li><a href='/teacher_report'><i class="fa fa-address-card-o" aria-hidden="true"></i> Teacher's
                                Report </a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/staff_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/staff_report_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>

                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/staff_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>

                </div>
            </div>
        </div>



        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Staff's Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employement ID</th>
                                    <th>Staff's Name</th>
                                    <th>Work Department</th>
                                    <th>Mobile No</th>
                                    <th>Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($staff_information as $staff_informations)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $staff_informations->employment_id }}</td>
                                        <td>{{ $staff_informations->teacher_name }}</td>
                                        <td>{{ $staff_informations->work_department }}</td>
                                        <td>{{ $staff_informations->mobile_no }} </td>
                                        <td style="width: 8%;"><img onerror="this.src='img/blankavatar.png'"
                                                src='{{ URL::asset("img/backend/teacher_staff/$staff_informations->teacher_id") }}.jpg'>
                                        </td>
                                        <td class="center">
                                            <div class="display_status">
                                                @can('edit staff')
                                                    {{ Form::open(['url' => "staff_info/$staff_informations->teacher_id/edit", 'method' => 'GET']) }}
                                                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                    {{ Form::close() }}
                                                @endcan
                                                @can('delete staff')
                                                    {{ Form::open(['url' => "teacher_info/$staff_informations->teacher_id", 'method' => 'DELETE']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Remove ?')"]) }}
                                                    {{ Form::close() }}
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
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
        <script type="text/javascript" src="{{ asset('extra_js/staff.js') }}"></script>
    @endpush


@stop
