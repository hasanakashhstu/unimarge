@extends('admin.index')
@section('Title', 'Office List')
@section('breadcrumbs', 'Office List')
@section('breadcrumbs_link', route('auth.administrativeOffices.index'))
@section('breadcrumbs_title', 'Office List')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Office</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Edit Office</p>
            <!-- Transport Details -->

            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i></span>
                    <h5>Edit Office</h5>
                </div>


                <div class="widget-content padding">
                    <form action="{{ route('auth.administrativeOffices.update', $administrativeOffice) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="control-group">
                            <label for="name">Office Name</label>
                            <div class="controls">
                                <input type="text" name="name" id="name" value="{{ old('name', $administrativeOffice->name) }}" required>
                                @error('name')
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
