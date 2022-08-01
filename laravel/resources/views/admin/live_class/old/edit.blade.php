@extends('admin.index')
@section('Title','Live Classes')
@section('breadcrumbs','Live Class')
@section('breadcrumbs_link','/live_class')
@section('breadcrumbs_title','Live Class')
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>

    @endif
    @if (Session::has('Error'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error!</strong> {{ Session::get('Error') }}
        </div>

    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade in">
            <ul  style='list-style:none'>
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container">
        <h2>  <i class="fa fa-check-square-o" aria-hidden="true">
            </i> Live Class Edit</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} Live Class Edit</p> <br/> <!-- Transport Details -->
    </div>
    <div class="tab-content"> <!-- Transport List Report  -->
        <div>

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Live Class</h5>
                </div>
                <div class="widget-content nopadding">
                    {{Form::open(['url'=>"/live_class/$live_class->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
                    <div class="control-group">
                        {{Form::label('Topic','',['class'=>'control-label'])}}
                        <div class="controls">
                            {{Form::text('topic',$live_class->topic,['title'=>'topic'])}}
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="description" class="control-label">Start Time</label>
                        <div class="controls">
                            <input id="datepicker" value="{{date('m/d/Y',strtotime($live_class->start_time))}}" title="description" name="start_date" type="text">
                            <input class="timepicker" id="time1" name="start_time" value="{{date('h:m a', strtotime($live_class->start_time))}}" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="description" class="control-label">End Time</label>
                        <div class="controls">
                            <input id="datepicker2" value="{{date('m/d/Y', strtotime($live_class->end_time))}}" title="description"  name="end_date" type="text">
                            <input id="time2" class="timepicker" value="{{date('h:m a', strtotime($live_class->end_time))}}"  name="end_time" type="text">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="duration" class="control-label">Duration</label>
                        <div class="controls">
                            <input id="duration" value="{{$live_class->duration}}" title="description" name="duration" type="text" readonly>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        @php
                            $all_teacher=[''=>'--select--']
                        @endphp

                        @foreach($teachers as $single_teacher)
                            @php $all_teacher[$single_teacher->id]=$single_teacher->name; @endphp
                        @endforeach
                        {{Form::label('teacher','Teacher',['class'=>'control-label'])}}
                        <div class="controls">
                            {{Form::select('teacher_id',$all_teacher,$live_class->teacher_id,['id'=>'teacher_id'])}}
                        </div>
                    </div>
                    
                    <div class="control-group">
                        {{Form::label('class_name','Class Name',['class'=>'control-label','title'=>'class_name'])}}
                        <div class="controls">
                            @php
                                $class=[''=>'--select--']
                            @endphp

                            @foreach($manage_class as $manage_class_list)
                                @php $class[$manage_class_list->class_name]=$manage_class_list->class_name @endphp
                            @endforeach

                            {{Form::select('class_name',$class,$live_class->class_name,['id'=>'class_name'])}}
                        </div>
                    </div>

                    <div class="control-group">
                        @php
                            $all_department=[''=>'--select--']
                        @endphp

                        @foreach($departments as $single_department)
                            @php $all_department[$single_department->department_name]=$single_department->department_name @endphp
                        @endforeach
                        {{Form::label('department','Department',['class'=>'control-label'])}}
                        <div class="controls">
                            {{Form::select('department',$all_department,$live_class->department,['id'=>'department'])}}
                        </div>
                    </div>

                    <div class="control-group">
                        {{Form::label('medium','Medium',['class'=>'control-label'])}}
                        <div class="controls">
                            @php
                                $medium_array=[''=>'--select--']
                            @endphp
                            @foreach($medium as $medium_data)
                                @php
                                    $medium_array[$medium_data->type_name]=$medium_data->type_name
                                @endphp
                            @endforeach
                            {{Form::select('medium',$medium_array,$live_class->medium,['class'=>'medium','id'=>'medium'])}}
                        </div>
                    </div>

                    <div class="control-group">
                        {{Form::label('session','Session',['class'=>'control-label'])}}
                        <div class="controls">
                            @php
                                $session_list_array=[''=>'--select--']
                            @endphp
                            @foreach($sessions as $session_list)
                                @php$session_list_array[$session_list->type_name]=$session_list->type_name
                                @endphp
                            @endforeach
                            {{Form::select('session',$session_list_array,$live_class->session,['class'=>'default_session','id'=>'medium'])}}
                        </div>
                    </div>
                    <div class="form-actions">
                        {{Form::submit('submit',['class'=>'btn btn-success'])}}
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>
    </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{asset('extra_js/academic_syllabus.js')}}"></script>
    @endpush

@stop

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $( function() {
            $( "#datepicker").datepicker();
            $( "#datepicker2").datepicker();
            $('.timepicker').timepicker({
                timeFormat: 'hh:mm a',
                change: function(time) {
                    timeCalculation();
                }
            });
        } );

        function timeCalculation(){
            var start_date = $('#datepicker').val();
            var start_time = $('#time1').val();
            var today = new Date(start_date+" "+start_time);

            var end_date = $('#datepicker2').val();
            var end_time = $('#time2').val();
            var Christmas = new Date(end_date+" "+end_time);

            var diffMs = (Christmas - today);
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000);
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);
            if (diffHrs > 0 || diffMins > 0) {
                var duration = diffHrs+ " Hours, " + diffMins+' Minuets';
                $('#duration').val(duration);
            }

        };
        $(document).ready(function(){
            $('#datepicker, #datepicker2').on('change',function (event) {
                timeCalculation();
            });
        });

    </script>
@endsection


