@extends('admin.index')
@section('Title', 'Edit Fess Structure')
@section('breadcrumbs', 'Fess Structure')
@section('breadcrumbs_link', '/frontend/fees_structure')
@section('breadcrumbs_title', 'Fess Structure')

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
        <h2><i class="fa fa-plus-circle" aria-hidden="true"></i>Edit Fees Structure</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{ Session::get('school.system_name') }} Edit Fees Structure</p><br />
        <!-- Transport Details -->

        <div class="panel panel-default text-right">
            <div class="panel-body">
                <ul class='dropdown_test'>
                    <li><a href={{ url('frontend/fees_structure') }}>Fees Structure List</a></li>
                </ul>
            </div>
        </div>



        <div class="tab-content">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Edit Fees Structure</h5>
                </div>

                <div class="widget-content nopadding">
                    {{ Form::open(['url' => '/frontend/fees_structure/' . $feesStructure->id,'class' => 'form-horizontal','method' => 'put','files' => true,'name' => 'basic_validate','id' => 'basic_validate','novalidate' => 'novalidate']) }}

                    <div class="control-group">
                        {{ Form::label('department', 'Department Name', ['class' => 'control-label', 'title' => 'title']) }}
                        <div class="controls">
                            <select name="department" id="department">
                                <option value="">Select a Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        @if ($department->id == old('department', $feesStructure->department)) selected @endif>
                                        {{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        {{ Form::label('fees_structure', 'Fees Structure', ['class' => 'control-label', 'title' => 'description']) }}
                        <div class="controls">
                            {{ Form::textarea('fees_structure', old('fees_structure', $feesStructure->fees_structure), ['id' => 'fees_structure','placeholder' => 'Fees Structure','title' => 'Fees Structure']) }}
                        </div>
                    </div>


                    <div class="form-actions">
                        {{ Form::submit('submit', ['value' => 'Submit', 'class' => 'btn btn-success']) }}

                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#fees_structure');
        </script>
    @endpush

@stop
