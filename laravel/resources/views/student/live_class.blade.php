@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Subject')
@section('breadcrumbs','Student Dhasboard Subject')
@section('zoom_css')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js"></script>
    <style>
        td.center {
            text-align: center;
        }
    </style>
@endsection
@section('student_dasboard_content')
    <div class="container">
        <div class="row">
            <div class="tm-main uk-width-medium-3-4 uk-push-1-4" id="Vue_component_wrapper" style="min-height: 1783px;">
                <table class="table table-responsive " style="background: #fff; width: 1108px;margin-left: 17px;">
                    <tbody>
                    <tr style="background:#147F7F">
                        <td class="text-center" colspan="2">
                            <span style="font-size:19px; color:#FFFFFF;"><b>Live Class</b></span>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-responsive" style="background: #fff; width: 1108px;margin-left: 17px;">
                    <thead class="thead-inverse">
                    <tr>
                        <th>SL </th>
                        <th>Topic </th>
                        <th>Teacher Name</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Files</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($live_classes as $key => $class)
                        <tr class="gradeX">
                            <td>{{$key+1}}</td>
                            <td>{{$class->topic}}</td>
                            <td>{{$class->name}}</td>
                            <td>{{date('Y-m-d h:i:a', strtotime($class->start_time))}}</td>
                            <td>{{date('Y-m-d h:i:a', strtotime($class->end_time))}}</td>
                            <td>{{$class->duration}}</td>
                            @php
                                $start_time = strtotime($class->start_time);
                                $end_time = strtotime($class->end_time);
                                $current_time = strtotime(date('Y-m-d H:i:s'));
                                $minuit = round(abs($start_time - $current_time) / 60,2);
                            @endphp
                            <td class="center">
                                @if($current_time > $end_time)
                                    <a target="_blank" id="{{$class->id}}">CLOSED</a>
                                @else
                                    @if($class->status == 0)
                                        <a  target="_blank" id="{{$class->id}}">UPCOMING</a>
                                    @else
                                        <a  target="_blank" id="{{$class->id}}">IN LIVE</a>
                                    @endif
                                @endif
                            </td>
                            <td class="center">
                                <a target="_blank" @click="OpenFileModal({{$class->id}})" class="btn btn-success" >FILES</a>
                            </td>
                            <td class="center">
                                @if($current_time > $end_time)
                                    <a>---</a>
                                @else
                                    <a  target="_blank" id="{{$class->id}}" href="/open_live_class/{{$class->id}}" class="btn btn-primary" >JOIN CLASS</a>
                                    <a  target="_blank" href="{{$class->start_url}}" class="btn btn-primary" style="margin-top:5px; margin-left:5px">JOIN WITH APP</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="FileModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Course Materials</h4>
                            </div>
                            <div class="modal-body">
                                <div class="widget-content nopadding">
                                    <table class="table table-bordered data-table font_my">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>File</th>
                                        </tr>
                                        </thead>
                                        <tbody v-html="html">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        new Vue({
            el: '#Vue_component_wrapper',
            data: {
                Files :[
                    { one : ''},
                ],
                html : '',
                class_id : '',
                UploadedFiles : [],
                baseUrl : '{{url('/')}}',
            },
            methods: {
                AddRow : function () {
                    const  _this = this;
                    _this.Files.push({one:0});
                },
                DeleteRow : function (index) {
                    const  _this = this;
                    _this.Files.splice(index,1);

                },
                OpenFileModal : function (class_id) {
                    const _this = this;
                    _this.class_id = class_id;
                    $.ajax({
                        url: baseUrl+'/live_class_files',
                        type: "post",
                        data: {
                            _token: '{{@csrf_token()}}',
                            id : class_id,
                        },
                        success: function (response) {
                            $('#FileModal').modal('show');
                            var html = '';
                            $.each(response.data, function (i,v) {
                                html += '<tr><td class="center">';
                                html += v.file_name += '</td>';
                                html += '<td class="center">';
                                html += '<a class="btn btn-success" target="_blank" href="'+baseUrl+'/'+v.file_path+'">Download</a></td><tr>';
                            });
                            _this.html = html;
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            },
        });
    </script>
@endsection