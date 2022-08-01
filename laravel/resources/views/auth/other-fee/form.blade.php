@extends('admin.index')
@section('Title', 'Other Fee')
@section('breadcrumbs', 'Other Fee')
@section('breadcrumbs_link', route('auth.otherFees.index'))
@section('breadcrumbs_title', 'Other Fee')

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
            <h2><i class="fa fa-user-circle-o"
                    aria-hidden="true"></i>&nbsp;{{ Request::routeIs('auth.otherFees.create') ? 'Create' : 'Edit' }} Other
                Fee</h2>
            <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }}
                {{ Request::routeIs('auth.otherFees.create') ? 'Create' : 'Edit' }} Other Fee</p>
            <!-- Transport Details -->

            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i></span>
                    <h5>{{ Request::routeIs('auth.otherFees.create') ? 'Create' : 'Edit' }} Other Fee</h5>
                </div>


                <div class="widget-content padding">
                    @if (Request::routeIs('auth.otherFees.create'))
                        <form action="{{ route('auth.otherFees.store') }}" method="post">
                        @else
                            <form action="{{ route('auth.otherFees.update', $otherFee) }}" method="post">
                                @method('put')
                    @endif
                    @csrf

                    <div class="control-group">
                        <label for="name">Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name"
                                value="{{ old('name', isset($otherFee) ? $otherFee->name : '') }}" required>
                            @error('name')
                                <p style="color: red;"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="session">Session</label>
                        <div class="controls">
                            <select name="session" id="session" required>
                                @foreach ($sessions as $session)
                                    <option value="{{ $session->type_name }}"
                                        @if (old('session', isset($otherFee) ? $otherFee->session : '') == $session->type_name) selected @endif>{{ $session->type_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('session')
                                <p style="color: red;"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="per_semester_fee">Per Semester Fee</label>
                        <div class="controls">
                            <input type="text" name="per_semester_fee" id="per_semester_fee"
                                value="{{ old('per_semester_fee', isset($otherFee) ? $otherFee->per_semester_fee : '') }}" required>
                            @error('per_semester_fee')
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

@endsection
