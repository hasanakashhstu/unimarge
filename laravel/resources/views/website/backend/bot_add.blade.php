@extends('admin.index')
@section('Title','Our Bot')
@section('breadcrumbs','BOT')
@section('breadcrumbs_link','/frontend/bot_backend')
@section('breadcrumbs_title','frontend/bot_backend')

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
        <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Create Admin</h2> <!-- Tab Heading  -->
        <p title="Transport Details">@if (Session::has('school')) {{Session::get('school.system_name')}}  @endif Create Admin</p> <!-- Transport Details -->


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
                                {{Form::open(['url'=>'/frontend/bot_backend','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                                <div class="control-group">
                                    {{Form::label('name','Name',['class'=>'control-label','title'=>'name'])}}
                                    <div class="controls">
                                        {{Form::text('name','',['id'=>'required','placeholder'=>' Name','title'=>'name'])}}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{Form::label('designation','Designation',['class'=>'control-label','title'=>'designation'])}}
                                    <div class="controls">
                                        {{Form::text('designation','',['id'=>'required','placeholder'=>'Designation','title'=>'designation'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('email','Email',['class'=>'control-label','title'=>'email'])}}
                                    <div class="controls">
                                        {{Form::text('email','',['id'=>'required','placeholder'=>'Email','title'=>'email'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('address','Address',['class'=>'control-label','title'=>'address'])}}
                                    <div class="controls">
                                        {{Form::text('address','',['id'=>'required','placeholder'=>'Address','title'=>'address'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('facebook','Facebook',['class'=>'control-label','title'=>'facebook'])}}
                                    <div class="controls">
                                        {{Form::text('facebook','',['id'=>'required','placeholder'=>'Facebook','title'=>'facebook'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('twitter','Twitter',['class'=>'control-label','title'=>'twitter'])}}
                                    <div class="controls">
                                        {{Form::text('twitter','',['id'=>'required','placeholder'=>'Twitter','title'=>'twitter'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('instagram','Instagram',['class'=>'control-label','title'=>'instagram'])}}
                                    <div class="controls">
                                        {{Form::text('instagram','',['id'=>'required','placeholder'=>'Instagram','title'=>'instagram'])}}
                                    </div>
                                </div>
                                <div class="control-group">
                                    {{Form::label('pinterest','Pinterest',['class'=>'control-label','title'=>'pinterest'])}}
                                    <div class="controls">
                                        {{Form::text('pinterest','',['id'=>'required','Placeholder'=>'pinterest','title'=>'pinterest'])}}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {{Form::label('image','',['class'=>'control-label','title'=>'image'])}}

                                    <div class="controls">
                                        {{Form::image('img/blankavatar.png','Profile_image',['alt'=>'Your Image','class'=>'img-responsive img-circle blank_applicant_student_image','id'=>'blah','style'=>'width:19%'])}}
                                        <br>
                                        {{Form::file('image',['onchange'=>'readURL(this)'])}}
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
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($bot as $key => $value)

                            <tr class="gradeX">
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->designation}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->address}}</td>
                                <td>
                                    <img style="width: 50px;" src="{{ Storage::url($value->image) }}">
                                </td>
                                <td id="my_align" class="display_status">

                                    {{Form::open(['url'=>"/frontend/bot_backend/$value->bot_id/edit" ,'method'=>'GET'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                                    {{Form::close()}}

                                    {{Form::open(['url'=>"/frontend/bot_backend/$value->bot_id" ,'method'=>'DELETE'])}}
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
        <script type="text/javascript" src="{{asset('extra_js/admit_student.js')}}"></script>

    @endpush
@stop
