@extends('admin.index')
@section('Title', 'Manage Tution Fees')
@section('breadcrumbs', 'Manage Tution Fees')
@section('breadcrumbs_link', '/manage_tution_fees')
@section('breadcrumbs_title', 'Manage Tution Fees')

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
            <strong>Error!</strong> {{ Session::get('error') }}
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
        <h2><i class="fa fa-plus-circle" aria-hidden="true"></i> Manage Tution Fees</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }}( {{ Session::get('school.school_eiin') }}
            )
            Tution Fees Details</p><br /><!-- Transport Details -->


        <div class='row'>
            <div class="panel panel-default">
                <div class="panel-body text-left">
                    <ul class='dropdown_test'>
                        <li><a href='/manage_class'><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Manage
                                Program</a></li>
                        <li><a href='/manage_section'><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;Manage
                                Section</a></li>
                        <li><a href='/academic_syllabus'><i class="fa fa-window-restore"
                                    aria-hidden="true"></i>&nbsp;Academic Syllabus</a></li>
                    </ul>
                </div>
            </div>



            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button class="btn btn-default" title='Export PDF' type="button"><a target="_blank"
                            href="/manage_department_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a href="/manage_department_excle"><i
                                class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank"
                            href="/manage_department_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print"
                            aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>
                    Tution Fees</a></li>
            @can('create department')
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Tution
                        Fees</a></li>
            @endcan
        </ul>



        <div class="tab-content">
            <!-- Transport List Report  -->

            <div id="home" class="tab-pane fade in active">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Tution Fees Data table</h5>
                    </div>

                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">

                            <thead>
                                <tr>
                                    {{-- <th>Class Name</th> --}}
                                    <th>Deparmtent Name </th>
                                    <th>Programe Name </th>
                                    <th>Fees per Credit</th>
                                    <th>Total Credit</th>

                                    <th>Total Semester</th>
                                    <th>Discount</th>
                                    <th>Total Credit Fee</th>
                                    <th>Total Fees After Discount</th>
                                    <th>Created At</th>
                                    <th>Update At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($tution_fees as $tution_fees_list)
                                <tr class="gradeX">
                                    {{-- <td>{{$tution_fees_list->class_name}}</td> --}}
                                    <td>{{ $tution_fees_list->department_name }}</td>
                                    <td>{{ $tution_fees_list->program_name }}</td>
                                    <td>{{ $tution_fees_list->fee_per_credit }}</td>
                                    <td>{{ $tution_fees_list->total_credit }}</td>
                                    <td>{{ $tution_fees_list->total_semester }}</td>
                                    <td>{{ $tution_fees_list->discount }}</td>
                                    <td>{{ $tution_fees_list->total_credit_fee }}</td>
                                    <td>{{ $tution_fees_list->after_discount_total_fee }}</td>
                                    <td>{{ $tution_fees_list->created_at }}</td>
                                    <td>{{ $tution_fees_list->updated_at }}</td>
                                    <td id="my_align" class="display_status">
                                        @can('edit department')
                                            {{ Form::open(['url' => "/manage_tution_fees/$tution_fees_list->tution_fees_id/edit", 'method' => 'GET']) }}
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan

                                        @can('delete department')
                                            {{ Form::open(['url' => "/manage_tution_fees/$tution_fees_list->tution_fees_id", 'method' => 'DELETE']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger','onclick' => "return confirm('Are you sure to delete?')"]) }}
                                            {{ Form::close() }}
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>



            <div id="menu1" class="tab-pane fade">
                <div>
                    <div class="widget-box">
                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Tution Fees</h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{ Form::open(['url' => '/manage_tution_fees','class' => 'form-horizontal','method' => 'post','name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}

                            <div class="control-group">
                                {{ Form::label('Department Name', '', ['class' => 'control-label']) }}
                                <div class="controls">

                                    @php
                                        $department_array = ['' => '--select--'];
                                    @endphp
                                    @foreach ($department as $department_data)
                                        @php
                                            
                                            $department_array[$department_data->id] = $department_data->department_name;
                                        @endphp
                                    @endforeach
                                    {{ Form::select('department_name', $department_array, null, ['title' => 'department_name','class' => 'department_name','id' => 'department_name']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('program_name', 'Program Name', ['class' => 'control-label']) }}
                                <div class="controls">

                                    {{ Form::text('program_name', '', ['title' => 'program_name']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('program_type', 'Program Type', ['class' => 'control-label']) }}
                                <div class="controls">

                                    {{ Form::select('program_type',['Undergraduate Program' => 'Undergraduate Program', 'Graduate Program' => 'Graduate Program'],['class' => 'program_type', 'id' => 'program_type']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('session', 'Session', ['class' => 'control-label required', 'title' => 'session']) }}
                                <div class="controls">
                                    @php
                                        //   $session_list_array['']='--Select--';
                                        $session_list_array[$batch->default_session] = $batch->default_session;
                                    @endphp
                                    @foreach ($session as $session_list)
                                        @php
                                        $session_list_array[$session_list->type_name] = $session_list->type_name; @endphp
                                    @endforeach

                                    {{ Form::select('session', $session_list_array, null, ['required' => 'required']) }}
                                    <p style="color: red; margin-bottom: 0px;">By Default Set Default Session</p>
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Admission Fees', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('admission_fees', '', ['id' => 'admission_fees','class' => 'admission_fees','title' => 'admission_fees']) }}
                                </div>
                            </div>



                            <div class="control-group">
                                {{ Form::label('Total Credit', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('total_credit', '', ['id' => 'total_credit', 'title' => 'total_credit']) }}
                                </div>
                            </div>



                            <div class="control-group">
                                {{ Form::label('Fee Per Credit', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('fee_per_credit', '', ['title' => 'fee_per_credit', 'id' => 'fee_per_credit']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Total Credit Fee', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('total_credit_fee', '', ['readonly' => 'readonly','title' => 'total_credit_fee','id' => 'total_credit_fee','class' => 'total_credit_fee']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Total Discount', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('discount', '', ['title' => 'discount', 'id' => 'discount', 'class' => 'discount']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('After Discount ', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('after_discount', '', ['id' => 'after_discount','class' => 'after_discount','readonly' => 'readonly','title' => 'after_discount']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Total Semester', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('total_semester', '', ['title' => 'total_semester','id' => 'total_semester','class' => 'total_semester']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('Each Semester Fee', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('semester_fee', '', ['readonly' => 'readonly','title' => 'semester_fee','id' => 'semester_fee','class' => 'semester_fee']) }}
                                </div>
                            </div>

                            <div class="control-group">
                                {{ Form::label('After DiscountTotal Fee', '', ['class' => 'control-label']) }}
                                <div class="controls">
                                    {{ Form::text('after_discount_total_fee', '', ['readonly' => 'readonly','title' => 'after_discount_total_fee','id' => 'after_discount_total_fee','class' => 'after_discount_total_fee']) }}
                                </div>
                            </div>

                            <div class="form-actions">
                                @can('create department')
                                    {{ Form::submit('submit', ['value' => 'Submit', 'class' => 'btn btn-success']) }}
                                @endcan
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('custom-scripts')
        <script type="text/javascript" src="{{ asset('extra_js/manage_department.js') }}"></script>
    @endpush
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fee_per_credit,#total_credit").change(function() {

                var total_credit = $("#total_credit").val();
                var fee_per_credit = $("#fee_per_credit").val();
                var total_credit_fee = total_credit * fee_per_credit;

                //var department_name=$("#Manage_department").val();
                console.log(total_credit_fee);
                // document.getElementById('#total_credit_fee').value =total_credit_fee;
                $("#total_credit_fee").val(total_credit_fee);

            });


        });
        $(document).ready(function() {
            $("#discount,#total_credit_fee").change(function() {

                var total_credit_fee = $("#total_credit_fee").val();
                var discount = $("#discount").val();
                var after_discount = total_credit_fee - discount;

                //var department_name=$("#Manage_department").val();
                console.log(after_discount);
                // document.getElementById('#total_credit_fee').value =total_credit_fee;
                $("#after_discount").val(after_discount);

            });
        });
        $(document).ready(function() {
            $("#total_semester").change(function() {

                var after_discount = $("#after_discount").val();
                var admission_fees = $("#admission_fees").val();
                var total_semester = $("#total_semester").val();
                var after_discount_total_fee = parseInt(after_discount) + parseInt(admission_fees);
                var semester_fee = after_discount_total_fee / total_semester;

                //var department_name=$("#Manage_department").val();
                console.log(semester_fee);
                console.log(after_discount_total_fee);

                $("#after_discount_total_fee").val(after_discount_total_fee);
                $("#semester_fee").val(semester_fee);

            });
        });
    </script>
@stop
