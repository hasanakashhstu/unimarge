@extends('admin.index')
@section('Title', 'Apprisal Report')
@section('breadcrumbs', 'Apprisal Report')
@section('breadcrumbs_link', '/student_apprisal_report')
@section('breadcrumbs_title', 'Student Apprisal Report')

@section('content')


    <div class="container">
        <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Apprisal Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Apprisal Report</p>
        <!-- Transport Details -->


        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/student_apprisal'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Apprisal</a>
                        </li>
                        <li><a href='/student_apprisal_component'><i class="fa fa-plus-circle"
                                    aria-hidden="true"></i>&nbsp;Apprisal Template</a></li>

                        <li><a href='/apprisal_template_report'><i class="fa fa-list-alt"
                                    aria-hidden="true"></i>&nbsp;Apprisal Template Report</a></li>

                    </ul>
                </div>
            </div>
        </div>



        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Apprisal Report</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    <th>Apprisal Type</th>
                                    <th>Medium</th>
                                    <th>Apprisal Name</th>
                                    <th>Apprisal template</th>

                                    <th>Remark</th>

                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Converted</th>
                                    <th>Total Score</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($apprisals as $apprisal)
                                    <tr class="gradeX">
                                        <td>{{ $apprisal->apprisal_type }}</td>
                                        <td>{{ $apprisal->medium }}</td>
                                        <td>
                                            @php
                                                if ($apprisal->apprisal_name) {
                                                    if ($apprisal->apprisal_type == 'Student') {
                                                        $apprisal_person_name = DB::table('students')
                                                            ->where('roll', $apprisal->apprisal_name)
                                                            ->first();
                                                    } else {
                                                        $apprisal_person_name = DB::table('teachers')
                                                            ->where('teacher_id', $apprisal->apprisal_name)
                                                            ->first();
                                                    }
                                                }
                                            @endphp
                                            @php
                                                
                                                if ($apprisal->apprisal_name) {
                                                    if ($apprisal->apprisal_type == 'Student' && isset($apprisal_person_name->student_name)) {
                                                        echo $apprisal_person_name->student_name;
                                                    } else {
                                                        if (isset($apprisal_person_name->teacher_name)) {
                                                            echo $apprisal_person_name->teacher_name;
                                                        }
                                                    }
                                                }
                                                
                                            @endphp
                                        </td>
                                        <td>

                                            @php
                                                
                                                $apprisal_person_name = DB::table('apprisal_template')
                                                    ->where('template_id', $apprisal->apprisal_template)
                                                    ->first();
                                                
                                            @endphp
                                            {{ isset($apprisal_person_name->title) ? $apprisal_person_name->title : '' }}
                                        </td>

                                        <td>{{ $apprisal->remarks }}</td>

                                        <td>{{ $apprisal->start_date }}</td>
                                        <td>{{ $apprisal->end_date }}</td>
                                        <td>{{ $apprisal->convert }}</td>
                                        <td>{{ $apprisal->apprisals }}</td>
                                        <td>
                                            <div class="display_status">
                                                @can('edit apprisal')
                                                    {{ Form::open(['url' => "student_apprisal_edit/$apprisal->apprisal_id", 'method' => 'GET']) }}
                                                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                                    {{ Form::close() }}
                                                @endcan
                                                @can('delete apprisal')
                                                    {{ Form::open(['url' => "/student_apprisal/$apprisal->apprisal_id", 'method' => 'DELETE']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure you want to Delete This Apprisal?')"]) }}
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
        <script type="text/javascript" src="{{ asset('extra_js/student_apprisal_report.js') }}"></script>
    @endpush

@stop
