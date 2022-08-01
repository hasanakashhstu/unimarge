@extends('student.master_template')
@section('dashboard_title','Student Dhasboard Subject')
@section('breadcrumbs','Student Dhasboard Subject')
@section('zoom_css')
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js"></script>
@endsection
@section('student_dasboard_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="report_view" style="min-height: 1783px;">
                @if(isset($all_data) && count($all_data) > 0)
                <table class="table table-bordered" style="margin: 0 auto; padding: 20px 0">
                    <tr>
                        <td><strong>Roll : </strong>{{$student_info->roll}}</td>
                        <td><strong>Roll : </strong>{{$student_info->class}}</td>
                    </tr>
                    <tr>
                        <td><strong>Name : </strong>{{$student_info->student_name}}</td>
                        <td><strong>Reg Number : </strong>{{$student_info->reg_number}}</td>
                    </tr>
                </table>
                <table width="100%" border="1" class="table table-bordered">
                    <thead>
                    <th></th>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Waiver</th>
                    <th>Total</th>
                    <th>Balance</th>
                    </thead>
                    <tbody>
                    @foreach($all_data as $data)
                    <tr>
                        <td colspan="7">
                            <a><strong>Semester : </strong>{{$data->class_name}},</a>
                            <a><strong>Session : </strong>{{$data->session}}</a>
                        </td>
                    </tr>
                    @foreach($data->invoice_details as $key => $invoice_details)
                    <tr>
                        @if($key == 0)
                        <td style="vertical-align: middle" rowspan="{{count($data->invoice_details)}}">Payable</td>
                        @endif
                        <td></td>
                        <td>{{$invoice_details->component_name}}</td>
                        <td>{{$invoice_details->amount}}</td>
                        @if($key == 0)
                        <td style="vertical-align: middle" rowspan="{{count($data->invoice_details)}}">{{$data->waber ? $data->waber : 0}}</td>
                        <td style="vertical-align: middle" rowspan="{{count($data->invoice_details)}}">{{$data->on_net_total}}</td>
                        @endif
                        <td></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="9" style="border-bottom: 2px solid #DDD"></td>
                    </tr>
                    @foreach($data->payment_details as $payment_data)
                    @foreach($payment_data->payment_details as $key2 => $payment_details)
                    <tr>
                        @if($key2 == 0)
                        <td style="vertical-align: middle" rowspan="{{count($payment_data->payment_details)}}">Paid</td>
                        @endif
                        <td>{{date('d-M-Y', strtotime($payment_data->receipt_date))}}</td>
                        <td>{{$payment_details->component_name}}</td>
                        <td>{{$payment_details->amount}}</td>
                        @if($key2 == 0)
                        <td style="vertical-align: middle" rowspan="{{count($payment_data->payment_details)}}">0</td>
                        <td style="vertical-align: middle" rowspan="{{count($payment_data->payment_details)}}">{{$payment_data->receipt_amount}}</td>
                        @endif
                        <td></td>
                    </tr>
                    @endforeach
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$data->balance}}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                    <div class="col-md-12 text-left no-print">
                        <i style="font-size: 30px; padding: 10px; cursor: pointer" class="fa fa-print" onclick="pop_print()"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/print_div.js')}}"></script>
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
                                html += '<tr><td>';
                                html += v.file_name += '</td>';
                                html += '<td>';
                                html += '<a target="_blank" href="'+baseUrl+'/'+v.file_path+'">Download</a></td><tr>';
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
    <script>
        function pop_print(){
            $('#report_view').print();
        }
    </script>
@endsection