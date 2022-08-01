@extends('website.index')
@section('website_main_section')

    <div class="col-lg-8 twelve columns" id="left-content">
        <div class="row row_border">
            <div class="panel panel-primary">
              <div class="panel-heading">About Department of {{$department->department_name}}</div>
              <div class="panel-body">
                <p>{{$department->description}}</p>
         
              </div>
            </div>
        </div>
    </div>

@stop