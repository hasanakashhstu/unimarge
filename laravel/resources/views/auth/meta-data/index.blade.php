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

    <div class="container">
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;{{ $metaType }}</h2> <!-- Tab Heading  -->
        <p title="Transport Details">
            @if (Session::has('school'))
                {{ Session::get('school.system_name') }}
            @endif {{ $metaType }}
        </p> <!-- Transport Details -->

        <!-- meta data list  -->
        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>{{ $metaType }}</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Meta Key</th>
                                {{-- <th>Title</th> --}}
                                <th>Meta Value</th>
                                {{-- <th>Sorting</th> --}}
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metaData as $metaInfo)
                                <tr class="gradeX">
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $metaInfo->meta_key }}</td>
                                    {{-- <td>{{ $metaInfo->title ?? 'N/A' }}</td> --}}
                                    <td>{!! $metaInfo->meta_value !!}</td>
                                    {{-- <td>{{ $metaInfo->sort_order ?? 0 }}</td> --}}
                                    {{-- <td>{{ $metaInfo->getStatus() }}</td> --}}
                                    <td id="my_align" class="display_status">
                                        @can('edit administrative')
                                            {{ Form::open(['url' => route('auth.metaData.edit', $metaInfo->id), 'method' => 'GET']) }}
                                            <input type="hidden" name="type" value="{{ $metaType }}">
                                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                                            {{ Form::close() }}
                                        @endcan
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

@endsection
