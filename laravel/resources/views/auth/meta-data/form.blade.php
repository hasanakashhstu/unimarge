@extends('admin.index')
@section('Title', $metaType)
@section('breadcrumbs', $metaType)
@section('breadcrumbs_link', route('auth.metaData.index', ['type' => $metaType]))
@section('breadcrumbs_title', $metaType)

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
            <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Edit {{ $metaType }}</h2>
            <!-- Tab Heading  -->
            <p title="Transport Details">{{ Session::get('school.system_name') }} Edit {{ $metaType }}</p>
            <!-- Transport Details -->

            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-info-sign"></i></span>
                    <h5>Edit {{ $metaType }}</h5>
                </div>


                <div class="widget-content padding">
                    <form action="{{ route('auth.metaData.update', $metaInfo) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="control-group">
                            <label for="meta_key">Meta Key</label>
                            <div class="controls">
                                <input type="text" readonly name="meta_key" value="{{ $metaInfo->meta_key }}">
                                @error('meta_key')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="control-group">
                            <label for="title">Title</label>
                            <div class="controls">
                                <input type="text" name="title" value="{{ $metaInfo->title }}">
                                @error('title')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="control-group">
                            {{ Form::label('meta_value', 'Meta Value', ['class' => 'control-label']) }}
                            <div class="controls">
                                {{ Form::textarea('meta_value', old('meta_value', $metaInfo->meta_value), ['id' => 'meta_value']) }}
                                @error('meta_key')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="control-group">
                            <label for="sort_order">Sort Order</label>
                            <div class="controls">
                                <input type="number" min="1" name="sort_order" value="{{ $metaInfo->sort_order }}">
                                @error('sort_order')
                                    <p style="color: red;"><strong>{{ $message }}</strong></p>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="submit" class='btn btn-success' id='edit_submit_button'
                                style='float: left;'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <x-web.tiny-mce />

        <script>
            tinymceHelper.init('#meta_value');
        </script>
    @endpush

@endsection
