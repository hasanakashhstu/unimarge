@extends('admin.index')
@section('Title', 'Teacher Report')
@section('breadcrumbs', 'Teacher Report')
@section('breadcrumbs_link', '/teacher_info_report')
@section('breadcrumbs_title', 'Report')
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}" />
@endsection
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

        @endif @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade in">
                <ul style='list-style:none'>
                    @foreach ($errors->all() as $error)
                        <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp Teacher's Report</h2>
            <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Teacher Report</p>
            <!-- Transport Details -->

            <div class='row'>

                <div class="panel panel-default">
                    <div class="panel-body text-left">
                        <ul class='dropdown_test'>

                            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Homes</a></li>
                            <li><a href='/teacher_info'><i class="fa fa-user" aria-hidden="true"></i> Add Teacher</a>
                            </li>
                            <li><a href='/staff_info'><i class="fa fa-street-view" aria-hidden="true"></i> Add Staff</a>
                            </li>
                            <li><a href='/staff_report'><i class="fa fa-address-book-o" aria-hidden="true"></i> Staff's
                                    Report </a></li>
                        </ul>
                    </div>
                </div>

                <div class="controls text-right">
                    <div data-toggle="buttons-checkbox" class="btn-group">
                        <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                                href="/teacher_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>

                        <button class="btn btn-default" title='Export Excel' type="button"><a
                                href="/teacher_report_excle"><i class="fa fa-file-excel-o"
                                    aria-hidden="true"></i></a></button>

                        <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                                href="/teacher_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                        <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                                aria-hidden="true"></i></button>
                        <a id='print' class="btn btn-success" onclick="UpdateSort()" title='Print' type="button">Update
                            Sort</a>

                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div id="messageShow" class="text-success"></div>

                <div id="home" class="tab-pane fade in active">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Applicant Teacher's Data table</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <table class="table table-bordered">

                                <thead>
                                    <tr>
                                        <th>Employement ID</th>
                                        <th>Teacher Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>Job Type</th>
                                        <th>Work Department</th>
                                        <th>Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="sortable">
                                    @foreach ($teacher_report as $teacher_reports)
                                        <tr class="gradeX sort_teacher_each"
                                            data_teacher_id="{{ $teacher_reports->teacher_id }}">
                                            <td>{{ $teacher_reports->employment_id }}</td>
                                            <td>{{ $teacher_reports->teacher_name }}</td>
                                            <td>{{ $teacher_reports->mobile_no }}</td>
                                            <td>{{ $teacher_reports->email }}</td>
                                            <td>{{ ucfirst($teacher_reports->designation) }}</td>
                                            <td>{{ $teacher_reports->job_type }}</td>
                                            <td>{{ $teacher_reports->work_department }}</td>
                                            <td style="width: 8%;"><img onerror="this.src='img/blankavatar.png'"
                                                    src="{{ Storage::url($teacher_reports->photo) }}"></td>

                                            <td class="center">

                                                <div class="display_status">
                                                    @can('edit teacher')
                                                        {{ Form::open(['url' => "teacher_info/$teacher_reports->teacher_id/edit", 'method' => 'GET']) }}
                                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                        {{ Form::close() }}
                                                    @endcan

                                                    @can('delete teacher')
                                                        {{ Form::open(['url' => "teacher_info/$teacher_reports->teacher_id", 'method' => 'DELETE']) }}
                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Remove ?')"]) }}
                                                        {{ Form::close() }}
                                                    @endcan
                                                </div>
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
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript" src="{{ asset('extra_js/teacher.js') }}"></script>
            <script>
                let NewArray = [];
                jQuery(function() {
                    jQuery("#sortable").sortable({
                        update: function(event, ui) {
                            NewArray = [];
                            let product_list = jQuery(".sort_teacher_each");
                            product_list.each(function(index, value) {
                                let rv = {
                                    id: jQuery(value).attr("data_teacher_id"),
                                    sort_id: (product_list.length - index)
                                };
                                NewArray.push(rv)
                            });
                            //console.log(NewArray);
                        }
                    });
                });

                function UpdateSort(trigger) {
                    jQuery(trigger).html('Saving...');
                    jQuery(trigger).css('pointer-events', 'none');
                    let data = [];
                    NewArray = [];
                    let product_list = jQuery(".sort_teacher_each");
                    product_list.each(function(index, value) {
                        let rv = {
                            id: jQuery(value).attr("data_teacher_id"),
                            sort_id: (index + 1)
                        };
                        NewArray.push(rv)
                    });

                    jQuery.ajax({
                        type: "POST",
                        url: "{{ url('/') }}/teacher_sort_update",
                        data: {
                            _token: '{{ @csrf_token() }}',
                            all_teacher_data: NewArray
                        },
                        success: function(response) {
                            if (parseInt(response.status) === 2000) {
                                $('#messageShow').text('Successfully Updated');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            </script>
            @endpush @stop
