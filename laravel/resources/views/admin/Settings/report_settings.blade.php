@extends('admin.index')
@section('Title', 'report_settings')
@section('breadcrumbs', 'report_settings')
@section('breadcrumbs_link', '/report_settings')
@section('breadcrumbs_title', 'report_settings')
@section('content')




    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade in">
            <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get('success') }}
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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--close-left-menu-stats-sidebar-->

    <div class="container">
        <h2><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Report Settings</h2> <!-- Tab Heading  -->
        <p title="Transport Details">I School Managment Report Settings</p> <!-- Transport Details -->

        {{ Form::open(['url' => '/report_settings', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'name' => 'basic_validate', 'id' => 'basic_validate', 'novalidate' => 'novalidate']) }}
        <div class="container-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Report Footer</h5>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>


                <div class="input_fields_wrap text-center" style="padding:2%">

                    <div>
                        {{ Form::text('name[]', '', ['id' => 'required', 'class' => 'b_s_name', 'placeholder' => ' Name', 'title' => 'student_name', 'style' => 'width:14%']) }}


                        {{ Form::text('designation[]', '', ['id' => 'required', 'class' => 'b_s_reg', 'placeholder' => 'Designation', 'title' => 'student_reg']) }}

                        &nbsp;<a href='#' style="margin-bottom: 2px;margin-top: 3px;" class='remove_field btn btn-danger'><i
                                class='fa fa-trash' aria-hidden='true'></i></a>
                    </div>
                </div>

                <div class='container text-center' style="margin-left: -60px;">
                    @can('create report')
                        {{ Form::submit('Add More Fields', ['class' => 'add_field_button btn btn-info', 'data-original-title' => 'Tabulation Sheet']) }}
                        {{ Form::submit('Save', ['class' => 'btn btn-success ', 'data-original-title' => 'Save']) }}
                    @endcan
                    <!-- <input type="submit" class="add_field_button btn btn-info">Add More Fields
     -->
                </div>
            </div>
        </div>






    </div>







    <script type="text/javascript">
        $(document).ready(function() {
            var max_fields = 50; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var max_student_id = 0;
            var batch = 0;
            var year = 0;

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click



                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        "<div class='test'><input type='text' class='b_s_name' placeholder='Name' name='name[]'><input type='text' class='b_s_reg' placeholder='Designation' name='designation[]'>&nbsp;<a href='#' style='margin-bottom: 2px;margin-top: 3px;'  class='remove_field btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a></div>"
                        ); //add input box
                } else {
                    alert('Only 10 Fields Are Allowed')
                }




            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
    {{ Form::close() }}
@stop
