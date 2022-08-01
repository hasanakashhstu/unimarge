@extends('admin.index')
@section('Title','roster_configuration')
@section('breadcrumbs','roster_configuration')
@section('breadcrumbs_link','roster/create')
@section('breadcrumbs_title','roster_configuration')
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
                <strong>Error!</strong> {{ Session::get('error') }}
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
  		<h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;Roster Configuration</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Roster Configuration  </p> <!-- Transport Details -->

  <br>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/assign_dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Assign Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div>

    <br>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/manage_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/manage_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="a">


        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Roster Configuration</h5>
          </div>






          <div class="widget-content nopadding">

    <!-- Modal content-->
        <div class="widget-content padding">
        {{Form::open(['url'=>"/roster/$data->id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}


                    <div class="control-group">
                {{Form::label('default_component','Default Component',['class'=>'control-label'])}}
                           <div class="controls">
                            @php
                              $component=[$data->default_component=>$data->default_component]
                            @endphp
                            @foreach($invoice_component as $invoice_component_value)
                              @php
                                  $component[$invoice_component_value->invoice_component_id]=$invoice_component_value->component_name
                              @endphp
                            @endforeach
                                 {{Form::select('default_component',$component)}}
                             </div>
                    
                                     {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
                  </div>
            </div>

        </div>
      </div>
      
      </div>
    </div>
  {{Form::close()}}
  </div>
</div>

</div>



      <!--end of the new add form-->

      <!-- Transport List Report  -->
		    </div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

   $(document).ready(function()
   {
    $("#print").click(function()
     {
          var w = window.open('/manage_dormitory_pdf');

          w.onload = function()
          {
              w.print();
          };

    });



});

</script>
@stop
