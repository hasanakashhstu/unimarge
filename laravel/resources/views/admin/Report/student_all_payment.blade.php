
@extends('admin.index')
@section('Title','Payment Report')
@section('breadcrumbs','Payment Report')
@section('breadcrumbs_link','/payment_report')
@section('breadcrumbs_title','Payment Report')

@section('content')



@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
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
        <h2> <i class="fa fa-check-square-o" aria-hidden="true">
    </i> Payment Report</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Payment Report</p><br/> <!-- Transport Details -->
  


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
             
           <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Create New Payment</a></li>
            <li><a href='/accountant'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>
</div>


  <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">


        </ul>
      </div>
    </div>


    <div class="tab-content">
    <br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/accountant_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/accountant_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/accountant_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>




        <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test'>
         
      </div>
    </div>


{{Form::open(['url'=>"/student_all_payment",'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

 <div class="widget-box">
      <div class="widget-title">
        <span class="icon"><i class="icon-info-sign"></i></span><h5>Payment Report</h5>
      </div>


    <div class="widget-content padding">
     
        <div class="control-group">
          <table class="table">
            <thead>
              <tr>
                <th>Roll</th>
                <th></th>
              </tr>
            </thead>
        

            <tbody>
   <tr>

    <td>
      {{Form::text('roll','',['id'=>'roll','style'=>'width: 120px;margin-left: 38%;'])}}
    </td>

    <td>
      {{Form::submit('Generate Report',['class'=>'btn btn-success','id'=>'generate_report','style'=>'width: 155px;'])}}
    </td>
                </tr>
            </tbody>
        </table>
      </div>
      
    </div>
  </div>

</div>
{{Form::close()}}
           
@stop
