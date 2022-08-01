@extends('admin.index')
@section('Title', 'Role List')
@section('breadcrumbs', 'Role List')
@section('breadcrumbs_link', route('auth.roles.index'))
@section('breadcrumbs_title', 'Role List')

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit Role</h2> <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Edit Role</p>
            <!-- Transport Details -->

            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i></span>
                    <h5>Edit Role</h5>
                </div>


                <div class="widget-content padding">
                    <form action="{{ route('auth.roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="control-group">
                            <label for="role_name">Role Name</label>
                            <div class="controls">
                                <input type="text" name="role_name" id="role_name" placeholder="Role Name"
                                    value="{{ old('role_name', Str::title($role->name)) }}" required />
                                @error('role_name')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        <div class="control-group">
                            <h3>Permissions</h3>
                            @error('permissions')
                                <p style="color: red;"><strong>{{ $message }}</strong></p>
                            @enderror
                            <div class="controls">

                                @foreach ($permissions as $permissionGroup => $permissionArray)
                                    <div class="control-group" style="border: 1px solid black; padding: 5px;">
                                        <label><strong>{{ Str::title($permissionGroup) }}</strong></label>
                                        <div class="controls" style="padding: 8px;">
                                            @foreach ($permissionArray as $permissionObj)
                                                <div style="@if (!$loop->last) border-bottom: 1px solid green; @endif padding: 5px;">
                                                    <input type="checkbox" name="permissions[]"
                                                        value="{{ $permissionObj->name }}" @foreach ($role->permissions as $rolePermission) @if ($rolePermission->name == $permissionObj->name) checked @break @endif @endforeach />
                                                    {{ Str::title($permissionObj->name) }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="modal-footer">
                            {{ Form::submit('Submit', ['class' => 'btn btn-success', 'id' => 'edit_submit_button', 'style' => 'float:left']) }}
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

@stop
