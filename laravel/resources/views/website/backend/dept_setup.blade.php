@extends('admin.index')
@section('Title','Department Page setup')
@section('breadcrumbs','Department Page setup')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','create_admin')

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
            <strong>Wrong!</strong> <?php echo Session::get('error') ?>
        </div>

    @endif


    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade in">
            <ul  style='list-style:none'>
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div class="container">
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Department Page setup</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{Session::get('school.system_name')}}  @endif Department Page setup</p> <!-- Transport Details -->


        <div class="panel panel-default text-right" >
            <div class="panel-body">
                <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
                    <li><a href='#'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Create New</a></li>
                </ul>
            </div>
        </div>



        <div class='row'>
            <div class="controls text-right">
                <div data-toggle="buttons-checkbox" class="btn-group">
                    <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
                    <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>

                    <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>

        <div class="tab-content">

            <div class="modal fade" id="myModal" role="dialog" style="margin-left: -7%;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create New</h4>
                        </div>

                        <div class="modal-body">
                            <div class="widget-content padding">
                                {{Form::open(['url'=>'/frontend/department_page_setup','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}



                                <div class="control-group">
                                    {{Form::label('chairperson','Chairperson Message',['class'=>'control-label','title'=>'Chairperson Message'])}}
                                    <div class="controls">
                                        {{Form::textarea('chairperson','',['id'=>'required','placeholder'=>'Chairperson Message','title'=>'Chairperson Message'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('study','Why Study',['class'=>'control-label','title'=>'description'])}}
                                    <div class="controls">
                                        {{Form::textarea('study','',['id'=>'required','placeholder'=>'Why Study','title'=>'Why Study'])}}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {{Form::label('department','Department',['class'=>'control-label','title'=>'description'])}}
                                    <div class="controls">
                                        <select name="department">
                                            <option value="">--select--</option>
                                            @foreach($departments as $departments_list)
                                                <option value="{{$departments_list->id}}">{{$departments_list->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer">

                            {{Form::submit('Submit',['class'=>'btn btn-success','id'=>'submit_button','style'=>'float:left'])}}
                            {{Form::submit('Close',['class'=>'btn btn-default','data-dismiss'=>'modal'])}}

                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
        <!--end of the new add form-->


        <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data Table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table font_my">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Chairperson's Message</th>
                            <th>Why Study</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($message as $key => $value)
                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$value->chairperson}}</td>
                                <td>{{$value->study}}</td>
                                <td>{{$value->department_name}}</td>
                                <td id="my_align" class="display_status">

                                    {{Form::open(['url'=>"/frontend/department_page_setup/$value->department_setup_id/edit" ,'method'=>'GET'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                    {{Form::close()}}

                                    {{Form::open(['url'=>"/frontend/department_page_setup/$value->department_setup_id" ,'method'=>'DELETE'])}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this User?')"])}}
                                    {{Form::close()}}

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @push('custom-scripts')
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0])
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah')
                            .attr('src', e.target.result)
                            .width(200)
                            .height(200);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush
@stop
