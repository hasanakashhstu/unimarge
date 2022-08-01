@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
              <div class="panel-heading">Live Class Schedule</div>
              <div class="panel-body">
                
                <table class="table table-responsive table-bordered" style="font-size:10px;">
                    <tr style="font-weight:bold;">
                        <th>SL</th>
                        <th>Topic </th>
                        <th>Class Name</th>
                        <th>Department</th>
                        <th>Session</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Status</th>
                    </tr>
                    @foreach($live_classes as $key => $class)
                        <tr>
                            <th>{{$key+1}}</th>
                            <th>{{$class->topic}}</th>
                            <th>{{$class->class_name}}</th>
                            <th>{{$class->department}}</th>
                            <th>{{$class->session}}</th>
                            <th>{{date('Y-m-d h:i:A', strtotime($class->start_time))}}</th>
                            <th>{{date('Y-m-d h:i:A', strtotime($class->end_time))}}</th>
                            <th>{{$class->duration}}</th>
                            @php
                                $start_time = strtotime($class->start_time);
                                $end_time = strtotime($class->end_time);
                                $current_time = strtotime(date('Y-m-d H:i:s'));
                                $minuit = round(abs($start_time - $current_time) / 60,2);
                            @endphp
                            <th class="center">
                                @if($current_time > $end_time)
                                    CLOSED
                                @else
                                    @if($class->status == 0)
                                        UPCOMING
                                    @else
                                        In Live
                                    @endif
                                @endif
                            </th>
                        </tr>
                    @endforeach
                </table>
              </div>
            </div>
        </div>
    </div>

@stop