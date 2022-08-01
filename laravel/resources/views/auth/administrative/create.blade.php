@extends('admin.index')
@section('Title', 'Administrative List')
@section('breadcrumbs', 'Administrative List')
@section('breadcrumbs_link', route('auth.administratives.index'))
@section('breadcrumbs_title', 'Administrative List')

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

    <div class="widget-content nopadding">
        <div class="container">
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create Administrative</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Create Administrative</p>
            <!-- Transport Details -->

            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i></span>
                    <h5>Create Administrative</h5>
                </div>


                <div class="widget-content padding">
                    <form action="{{ route('auth.administratives.store') }}" method="post">
                        @csrf

                        <div class="control-group">
                            <label for="administrative_office_id">Office Name</label>
                            <div class="controls">
                                <select name="administrative_office_id" id="administrative_office_id" required>
                                    <option value="" disabled selected>Select an Office</option>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>
                                @error('administrative_office_id')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="type">Type</label>
                            <div class="controls">
                                <select name="type" id="type" required>
                                    <option value="" disabled selected>Select a Type</option>
                                    <option value="1">Head</option>
                                    <option value="2">Sub Head</option>
                                    <option value="3">Member</option>
                                </select>
                                @error('type')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="teacher_id">Teacher</label>
                            <div class="controls">
                                <select name="teacher_id" id="teacher_id" required>
                                    <option value="" disabled selected>Select a Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->teacher_id }}">
                                            {{ $teacher->teacher_name }}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class='btn btn-success' id='edit_submit_button'
                                style='float: left;'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@stop
