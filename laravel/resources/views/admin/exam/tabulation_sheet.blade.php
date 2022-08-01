@extends('admin.index')
@section('Title', 'Tabulation')
@section('breadcrumbs', 'Tabulation')
@section('breadcrumbs_link', '/tabulation')
@section('breadcrumbs_title', 'Tabulation')

@section('content')
    <div class="container">
        <h2>
            <i class="fa fa-file-o" aria-hidden="true"></i>
            </i> Tabulation Sheet
        </h2>
        <!-- Tab Heading  -->
        <p title="Transport Details">I School Managment Tabulation
        </p>
        <!-- Transport Details -->
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-info-sign">
                    </i>
                </span>
                <h5>Tabulation Sheet
                </h5>
            </div>
            <div class="widget-content padding">
                {{ Form::open(['url' => '/tabulation']) }}
                <div class="control-group">
                    <table class="table address">
                        <thead>
                            <tr>
                                <th>Class
                                </th>
                                <th>Exam
                                </th>
                                <th>Default Session
                                </th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @php $class_data_array=[''=>'--select--'] @endphp
                                    @foreach ($class as $class_data)
                                        @php $class_data_array[$class_data->class_name]=$class_data->class_name @endphp
                                    @endforeach
                                    {{ Form::select('class', $class_data_array, null, ['style' => 'width:118px', 'class' => 'class_name', 'id' => 'class_name']) }}
                                </td>
                                <td>
                                    @php $exam_data_array=[''=>'--select--'] @endphp
                                    @foreach ($exam as $exam_data)
                                        @php $exam_data_array[$exam_data->exam_name]=$exam_data->exam_name @endphp
                                    @endforeach
                                    {{ Form::select('exam', $exam_data_array, null, ['style' => 'width:118px', 'class' => 'exam_name', 'id' => 'exam_name']) }}
                                </td>
                                <td>
                                    @php $session_data_array=[$default_session->default_session=>$default_session->default_session] @endphp
                                    @foreach ($all_session as $all_session_data)
                                        @php $session_data_array[$all_session_data->type_name]=$all_session_data->type_name @endphp
                                    @endforeach
                                    {{ Form::select('session', $session_data_array, null, ['style' => 'width:118px', 'class' => 'session', 'id' => 'session']) }}
                                </td>
                                <td>
                                    <input type="button" value="View Tabulation Sheet"
                                        class="btn btn-success tabulation_sheet">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="tile-stats tile-gray">
                    <div class="icon">
                        <i class="entypo-chart-area">
                        </i>
                    </div>
                    <h3 style="color: #34495e;">Tabulation Sheet
                    </h3>
                    <h4 style="color: #34495e;">
                        Class One First Term Exam
                    </h4>
                    <h4 style="color:#34495e;">
                    </h4>
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <br>
        </br>
        <br>
        </br>
        <form action="" method="post" accept-charset="utf-8">
            <div id="tabulation_sheet_report">

            </div>
            <center>
                @can('view exam')
                    <a id='print' onclick="pop_print()" media='print' title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true" style="font-size: 45px;"></i></a>
                    Print Tabulation Sheet
                @endcan
            </center>
            {{ Form::close() }}
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/exam.js') }}"></script>
    @endpush

@stop
