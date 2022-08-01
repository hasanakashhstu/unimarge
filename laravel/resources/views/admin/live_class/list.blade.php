@extends('admin.index')
@section('Title', 'Live Classes')
@section('breadcrumbs', 'Live Class')
@section('breadcrumbs_link', '/live_class')
@section('breadcrumbs_title', 'Live Class')
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js"></script>
    <style>
        td.center {
            text-align: center;
        }

    </style>
@endsection
@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
            <ul style='list-style:none'>
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($zoom_error))
        <div class="container">
            <h2> <i class="fa fa-check-square-o" aria-hidden="true">
                </i>Zoom Verification</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
            </p> <br /> <!-- Transport Details -->
        </div>
        <div class="tab-content">
            <!-- Transport List Report  -->
            <div class="widget-box">

                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Verified</h5>
                </div>

                <div class="widget-content text-center">
                    <h3 style="color: red">{{ $zoom_error }}</h3><br>
                    <a class="btn btn-primary" href="#" onclick="location.reload()">
                        <h1>Reload</h1>
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- @if (auth()->user()->zoom_user_id) --}}
        <div id="Vue_component_wrapper">
            <h2><i class="fa fa-window-restore" aria-hidden="true"></i>Live Class</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
                Details</p><br /><!-- Transport Details -->

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars"
                            aria-hidden="true"></i>Live Classes</a></li>

                @can('create live class')<li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle"
                            aria-hidden="true"></i>Add Live Class</a></li>@endcan

            </ul>
            <div class="tab-content">
                <!-- Transport List Report  -->

                <div id="home" class="tab-pane fade in active">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Data table</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table font_my">
                                <thead>
                                    <tr>
                                        <th>SL </th>
                                        <th>Topic </th>
                                        <th>Teacher </th>
                                        <th>Class Name</th>
                                        {{-- <th>Subject</th> --}}
                                        <th>Department</th>
                                        <th>Medium</th>
                                        <th>Session</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Live</th>
                                        <th>Files</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($live_classes as $key => $class)
                                        <tr class="gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $class->topic }}</td>
                                            <td>{{ array_key_exists($class->teacher_id, $teacher_data) ? $teacher_data[$class->teacher_id]->name : '' }}
                                            </td>
                                            {{-- <td>{{$class->subject}}</td> --}}
                                            <td>{{ $class->class_name }}</td>
                                            <td>{{ $class->department }}</td>
                                            <td>{{ $class->medium }}</td>
                                            <td>{{ $class->session }}</td>
                                            <td>{{ date('Y-m-d h:i:A', strtotime($class->start_time)) }}</td>
                                            <td>{{ date('Y-m-d h:i:A', strtotime($class->end_time)) }}</td>
                                            <td>{{ $class->duration }}</td>
                                            @php
                                                $start_time = strtotime($class->start_time);
                                                $end_time = strtotime($class->end_time);
                                                $current_time = strtotime(date('Y-m-d H:i:s'));
                                                $minuit = round(abs($start_time - $current_time) / 60, 2);
                                            @endphp
                                            <td class="center">
                                                @if ($current_time > $end_time)
                                                    <a style="padding:4px" id="{{ $class->id }}">CLOSED</a>
                                                @else
                                                    @if ($class->status == 0)
                                                        <a style="padding:4px" id="{{ $class->id }}">UPCOMING</a>
                                                    @else
                                                        <a style="padding:4px" id="{{ $class->id }}">InLive</a>
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="center start_class">

                                                @if ($current_time > $end_time)
                                                    <a>---</a>
                                                @else
                                                    <a target="_blank" href="{{ $class->start_url }}"
                                                        class="btn btn-primary"
                                                        style="margin-top:5px; margin-left:5px;display: inline-block;white-space: nowrap;margin-bottom:5px">JOIN
                                                        WITH APP</a>
                                                    <a style="padding:4px" target="_blank" id="{{ $class->id }}"
                                                        href="#" class="btn-primary start_button">START</a>
                                                @endif

                                            </td>
                                            <td class="center">
                                                <button style="padding:4px;height:26px;" class="btn-success"
                                                    style="padding: 5px"
                                                    @click="OpenFileModal({{ $class->id }})">Files</button>
                                            </td>
                                            <td class="center">
                                                <div class="display_status">

                                                    {{ Form::open(['url' => "live_class/$class->id/edit", 'method' => 'GET']) }}
                                                    {{ Form::submit('Edit', ['class' => 'btn-primary', 'style' => 'padding:4px;height:26px;']) }}
                                                    {{ Form::close() }}
                                                    <button style="padding:4px;height:26px;" class="btn-danger"
                                                        @click="DeleteClass({{ $class->id }})"
                                                        style="padding: 5px">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="FileModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Course Materials</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <form method="post" action="{{ url('update_class_file') }}"
                                                    enctype="multipart/form-data">
                                                    <div class="control-group">
                                                        {{ Form::label('Add Course Materials', '', []) }}
                                                        {{ @csrf_field() }}
                                                        <div class="controls" style="margin: 20px 0"
                                                            v-for="(file, index) in Files">
                                                            <input name="class_id" type="hidden" v-model="class_id">
                                                            <input type="text" required placeholder="File Name"
                                                                name="file_name[]" class="form-control">
                                                            <input
                                                                style="height: 33px; line-height: 34px;background: #ddd;margin-top: -10px;"
                                                                type="file" name="files[]">
                                                            <a v-if="index === Files.length-1" @click="AddRow()"
                                                                class="btn btn-primary">Add Row</a>
                                                            <a v-if="index+1 !== Files.length" @click="DeleteRow(index)"
                                                                class="btn btn-warning">Remove</a>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="widget-content nopadding">
                                                <table class="table table-bordered data-table font_my">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>File</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody v-html="html">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div>

                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i>
                                </span>
                                <h5>Live Class</h5>
                            </div>

                            <div class="widget-content nopadding">
                                {{ Form::open(['url' => '/live_class', 'class' => 'form-horizontal', 'files' => true, 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
                                <div class="control-group">
                                    {{ Form::label('Topic', '', ['class' => 'control-label']) }}
                                    <div class="controls">
                                        {{ Form::text('topic', '', ['title' => 'topic']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="description" class="control-label">Start Time</label>
                                    <div class="controls">
                                        <input id="datepicker" autocomplete="off" title="description" name="start_date"
                                            type="text">
                                        <input id="time1" class="timepicker" autocomplete="off" name="start_time"
                                            type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="description" class="control-label">End Time</label>
                                    <div class="controls">
                                        <input id="datepicker2" autocomplete="off" title="description" name="end_date"
                                            type="text">
                                        <input id="time2" class="timepicker" autocomplete="off" name="end_time"
                                            type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="duration" class="control-label">Duration</label>
                                    <div class="controls">
                                        <input id="duration" title="description" name="duration" type="text" readonly>
                                    </div>
                                </div>

                                <div class="control-group">
                                    @php
                                        $all_teacher = ['' => '--select--'];
                                    @endphp

                                    @foreach ($teachers as $single_teacher)
                                        @php $all_teacher[$single_teacher->id]=$single_teacher->name; @endphp
                                    @endforeach
                                    {{ Form::label('teacher', 'Teacher', ['class' => 'control-label']) }}
                                    <div class="controls">
                                        {{ Form::select('teacher_id', $all_teacher, null, ['id' => 'teacher_id']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('class_name', 'Class Name', ['class' => 'control-label', 'title' => 'class_name']) }}
                                    <div class="controls">

                                        <select name="class_name" id="class_name" @change="ClassNameChange('class_name')">
                                            <option value="">--select--</option>
                                            @foreach ($manage_class as $manage_class_list)
                                                <option value="{{ $manage_class_list->class_name }}">
                                                    {{ $manage_class_list->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="multiple" v-for="(input, in_index) in InputRowList">
                                    <div class="control-group">
                                        {{ Form::label('department', 'Department', ['class' => 'control-label']) }}
                                        <div class="controls">
                                            <select class="department" name="department[]" v-html="DepartmentList">
                                                <option value="">Department Name</option>
                                            </select>
                                            <a v-if="in_index === InputRowList.length-1" class="btn btn-primary"
                                                @click="AddInputRow()">Add Row</a>
                                            <a v-if="in_index+1 !== InputRowList.length" class="btn btn-warning"
                                                @click="DeleteInputRow(in_index)">Delete Row</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('medium', 'Medium', ['class' => 'control-label']) }}
                                    <div class="controls">
                                        @php
                                            $medium_array = ['' => '--select--'];
                                        @endphp
                                        @foreach ($medium as $medium_data)
                                            @php
                                                $medium_array[$medium_data->type_name] = $medium_data->type_name;
                                            @endphp
                                        @endforeach
                                        {{ Form::select('medium', $medium_array, null, ['class' => 'medium', 'id' => 'medium']) }}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{ Form::label('session', 'Session', ['class' => 'control-label']) }}
                                    <div class="controls">
                                        @php
                                            $session_list_array = ['' => '--select--'];
                                        @endphp
                                        @foreach ($sessions as $session_list)
                                            @php$session_list_array[$session_list->type_name]=$session_list->type_name
                                                                                        @endphp ?>
                                        @endforeach
                                        {{ Form::select('session', $session_list_array, null, ['class' => 'default_session', 'id' => 'medium']) }}
                                    </div>
                                </div>
                                <hr>
                                <div class="control-group">
                                    {{ Form::label('Course Materials', '', ['class' => 'control-label']) }} :
                                    <div class="controls" v-for="(file, index) in Files">
                                        <input type="text" name="file_name[]" class="form-control">
                                        <input type="file" name="files[]" class="btn btn-default">
                                        <a v-if="index === Files.length-1" @click="AddRow()" class="btn btn-primary">Add
                                            Row</a>
                                        <a v-if="index+1 !== Files.length" @click="DeleteRow(index)"
                                            class="btn btn-warning">Remove</a>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    {{ Form::submit('submit', ['class' => 'btn btn-success']) }}
                                </div>

                                {{ Form::close() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @else --}}
        <!--<div class="container">
                    <h2>  <i class="fa fa-check-square-o" aria-hidden="true">
                        </i>Create Account</h2>
                    <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}Create Account</p> <br/>
                </div>
                <div class="tab-content">
                    <div>

                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                <h5>Create Account</h5>
                            </div>
                            <div class="widget-content nopadding">
                                {{ Form::open(['url' => '/zoom_create', 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
                    <div class="control-group">
    {{ Form::label('Email', '', ['class' => 'control-label']) }}
                    <div class="controls">
    {{ Form::text('email', auth()->user()->email, ['readonly', 'title' => 'email']) }}
                    </div>
                </div>
    @php
    $array = explode(' ', auth()->user()->name);
    @endphp
                    <div class="control-group">
    {{ Form::label('Name', '', ['class' => 'control-label']) }}
                    <div class="controls">
    {{ Form::text('first_name', str_replace(end($array), '', auth()->user()->name), ['title' => 'first_name']) }}
                    </div>
                </div>
                <div class="control-group">
    {{ Form::label('Name', '', ['class' => 'control-label']) }}
                    <div class="controls">
    {{ Form::text('last_name', end($array), ['title' => 'last_name']) }}
                    </div>
                </div>
                <div class="control-group">
                    <label for="password" class="control-label">Password</label>
                    <div class="controls">
                        <input title="password" name="password" type="password" id="password"><br>
                        <div class="text-warning">
                            <div class="" role="tooltip" id="update_password_tip">
                                <p style="margin-top:5px">Password must:</p>
                                <ul style="font-size:12px; color:red">
                                    <li class="lengthRule error">Have at least 8 characters</li>
                                    <li class="alpabetRule error">Have at least 1 letter (a, b, c...)</li>
                                    <li class="numberRule success">Have at least 1 number (1, 2, 3...)</li>
                                    <li class="combineRule error">Include both Upper case and Lower case characters</li>
                                </ul>
                                <p>Password must NOT:</p>
                                <ul style="font-size:12px; color:red">
                                    <li class="notOneRepeatRule success">Contain only one character (11111111 or aaaaaaaa)</li>
                                    <li class="notConsecutiveRule error">Contain only consecutive characters (12345678 or abcdefgh)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
    {{ Form::submit('submit', ['class' => 'btn btn-success']) }}
                    </div>

    {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>-->
        {{-- @endif --}}
    @endif


    <script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/live_class.js') }}"></script>
    @endpush
@stop
@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
            $("#datepicker2").datepicker();
            $('.timepicker').timepicker({
                timeFormat: 'hh:mm a',
                change: function(time) {
                    timeCalculation();
                }
            });
        });
    </script>
    <script>
        function timeCalculation() {
            var start_date = $('#datepicker').val();
            var start_time = $('#time1').val();
            var today = new Date(start_date + " " + start_time);

            var end_date = $('#datepicker2').val();
            var end_time = $('#time2').val();
            var Christmas = new Date(end_date + " " + end_time);

            var diffMs = (Christmas - today);
            var diffHrs = Math.floor((diffMs % 86400000) / 3600000);
            var diffMins = Math.round(((diffMs % 86400000) % 3600000) / 60000);
            if (diffHrs > 0 || diffMins > 0) {
                var duration = diffHrs + " Hours, " + diffMins + ' Minuets';
                $('#duration').val(duration);
            }

        };
        $(document).ready(function() {
            $('#datepicker, #datepicker2').on('change', function(event) {
                timeCalculation();
            });
        });
        $(document).ready(function() {
            $('.start_button').on('click', function(event) {
                event.preventDefault();
                var target = $(this);
                var id = target.attr('id');

                var confirm = window.confirm('Are you sure, want to active live class?');
                if (confirm) {
                    $.ajax({
                        url: 'start_live_class',
                        type: "post",
                        data: {
                            _token: '{{ @csrf_token() }}',
                            id: id,
                        },
                        success: function(response) {
                            if (parseInt(response.status) === 2000) {
                                var a = document.createElement('a');
                                a.href = baseUrl + '/start_live_class/' + id;
                                a.setAttribute('target', '_blank');
                                a.click();
                            } else if (parseInt(response.status) === 3000) {
                                alert(response.message);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $('.class_delete').unbind().click(function(event) {
            alert('clicjed');
            event.preventDefault();
            var x = window.confirm("Are you sure you want to delete?");
            if (x) {
                var id = $(this).attr('value');
                var url = $(this).attr('name');
                $(this).closest('tr').remove();
                $.ajax({
                    url: baseUrl + '/' + url,
                    type: "get",
                    success: function(data) {

                    }
                });
            } else {
                return false;
            }

        });
    </script>
    <script>
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                Files: [{
                    one: ''
                }, ],
                html: '',
                class_id: '',
                UploadedFiles: [],
                baseUrl: '{{ url('/') }}',
                InputRowList: [{}],
                DepartmentList: '',
            },
            methods: {
                AddRow: function() {
                    const _this = this;
                    _this.Files.push({
                        one: 0
                    });
                },
                DeleteRow: function(index) {
                    const _this = this;
                    _this.Files.splice(index, 1);

                },
                OpenFileModal: function(class_id) {
                    const _this = this;
                    _this.class_id = class_id;
                    $.ajax({
                        url: baseUrl + '/live_class_files',
                        type: "post",
                        data: {
                            _token: '{{ @csrf_token() }}',
                            id: class_id,
                        },
                        success: function(response) {
                            $('#FileModal').modal('show');
                            var html = '';
                            $.each(response.data, function(i, v) {
                                html += '<tr><td>';
                                html += v.file_name += '</td>';
                                html +=
                                    '<td class="center"><a class="btn btn-success" target="_blank" href="' +
                                    baseUrl + '/' + v.file_path + '">Download</a></td>';
                                html +=
                                    '<td class="center"><a class="btn btn-danger" href="' +
                                    baseUrl + '/delete_class_file/' + v.id +
                                    '">Delete</a></td><tr>';
                            });
                            _this.html = html;
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                },
                DeleteFile: function(class_id) {
                    const _this = this;
                    _this.class_id = class_id;
                    $.ajax({
                        url: baseUrl + '/delete_class_file',
                        type: "post",
                        data: {
                            _token: '{{ @csrf_token() }}',
                            id: class_id,
                        },
                        success: function(response) {

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                },
                DeleteClass: function(class_id) {
                    const _this = this;
                    var x = window.confirm("Are you sure you want to delete?");
                    if (x) {
                        $.ajax({
                            url: baseUrl + '/delete_live_class/' + class_id,
                            type: "get",
                            data: {
                                _token: '{{ @csrf_token() }}',
                                id: class_id,
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }

                },
                AddInputRow: function() {
                    this.InputRowList.push({});
                },
                DeleteInputRow: function(index) {
                    const _this = this;
                    _this.InputRowList.splice(index, 1);

                },
                ClassNameChange: function(id) {
                    const _this = this;
                    var class_name = $('#' + id).val();
                    $.ajax({
                        url: '/class_wise_department_live_class',
                        type: "post",
                        data: {
                            'class_name': class_name,
                            '_token': '{{ @csrf_token() }}'
                        },
                        success: function(data) {
                            _this.DepartmentList = data;
                            //$('.department').html(data);
                        }
                    });
                }
            },
        });
    </script>
@endsection
