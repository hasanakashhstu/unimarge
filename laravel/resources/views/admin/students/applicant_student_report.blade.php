@extends('admin.index')
@section('Title', 'Applicant Student Report')
@section('breadcrumbs', 'Applicant Student Report')
@section('breadcrumbs_link', '/applicant_student_report')
@section('breadcrumbs_title', 'Applicant Student Report')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ Session::get('success') }}
</div>

@endif


@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade in">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Wrong!</strong> <?php echo Session::get('error'); ?>
</div>

@endif

<div class="container">
    <h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbspApplicant Student Report</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{ Session::get('school.system_name') }} Applicant Report</p>
    <!-- Transport Details -->

    <div class="panel panel-default text-right">
        <div class="panel-body">
            <ul class='dropdown_test'>
                <li><a href='/aplicant_student'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Applicant
                        Student</a></li>
                <li><a href='/admit_student'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Admit Student</a>
                </li>
                <li><a href='/student_promoation'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student
                        Promoation </a></li>

            </ul>
        </div>
    </div>


    <div class="tab-content">
        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Applicant Student Data table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">

                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Applicant ID</th>
                                <th>Student Name</th>
                                <th>Degree Name</th>
                                <th>Session</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($applicant_student as $applicant_student_data)
                            <tr class="gradeX">
                                <td>@php
                                    echo $i;
                                    $i++;
                                    @endphp</td>
                                <td>{{ $applicant_student_data->applicant_id }}</td>
                                <td>{{ $applicant_student_data->student_name }}</td>
                                <td>{{ $applicant_student_data->degree_name }}</td>
                                <td>{{ $applicant_student_data->session_choose }}</td>
                                <td>{{ $applicant_student_data->department }}</td>
                                <td>{{ $applicant_student_data->email }}</td>
                                <td>{{ $applicant_student_data->phone }}</td>
                                <td>{{ $applicant_student_data->status }}</td>
                                <td id="my_align" class="display_status">

                                    {{ Form::button('Admit Card', ['class' => 'btn btn-default dropdown_test Admin_card', 'id' => 'Admin_card', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'value' => $applicant_student_data->applicant_id, 'aplicant_id' => "$applicant_student_data->applicant_id"]) }}

                                    {{ Form::open(['url' => "/aplicant_student/$applicant_student_data->applicant_id/edit", 'method' => 'GET']) }}
                                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                    {{ Form::close() }}
                                    {{ Form::open(['url' => "/aplicant_student/view/$applicant_student_data->applicant_id/", 'method' => 'GET']) }}
                                    {{ Form::submit('View', ['class' => 'btn btn-primary']) }}
                                    {{ Form::close() }}

                                    {{ Form::button('Delete', ['class' => 'btn btn-danger applicant_student_delete', 'value' => $applicant_student_data->applicant_id]) }}

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


<style type="text/css">
    @font-face {
        font-family: Barcode;
        font-weight: bold;
        src: url('font-awesome/barcode/BarcodeFont.ttf');
    }

</style>





<div class="modal fade" id="myModal" style="width: 50%; height: 70%;
     margin-left: -25%;" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Admit Card</h4>
            </div>

            <div id='print_div'><span id='markshet'></span></div>

            <div class="text-center"><input type="button" value="print" onclick="printDiv()" id="print_admit_card"
                                            class="btn btn-primary" name=""></div>
        </div>
    </div>
</div>
<script>

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('custom-scripts')
<script type="text/javascript" src="{{ asset('extra_js/applicant_student_report.js') }}"></script>
@endpush
@stop
