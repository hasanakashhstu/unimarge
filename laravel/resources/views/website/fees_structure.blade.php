@extends('website.index')
@section('website_main_section')

	<div class="col-lg-8 twelve columns" id="left-content">
        <div class="row mainwrapper">
            <div class="panel panel-primary">
              <div class="panel-heading">Fees Structure Of {{$fees_structure->department}}</div>
              <div class="panel-body">
               
                {!!$fees_structure->fees_structure!!}
          
              </div>
            </div>
        </div>
    </div>

@stop