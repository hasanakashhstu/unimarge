
@extends('admin.index')
@section('Title','Accountant')
@section('breadcrumbs','Accountant')
@section('breadcrumbs_link','/accountant')
@section('breadcrumbs_title','Accountant')

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
    </i> Subsidiary Configuration Edit</h2> <!-- Tab Heading  -->
        <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Subsidiary Configuration Edit</p><br/> <!-- Transport Details -->
  


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



             <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Teacher</h5>
          </div>
          <div class="widget-content nopadding">
           


              {{Form::open(['url'=>"/subsidiary_configuration",'files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}
  

                <table style="padding: 5%" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Transcation Pur.</th>
                            <th >Income</th>
                            <th>Asset</th>
                            <th>Expense</th>
                            <th>Transcation Type</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($conf_data as $conf_data_value)
                    
                        <tr>
                            <td>Configuration > {{$conf_data_value->transcation_purpose}}</td>
                            <td>
                               {{Form::hidden('configuration_id[]',$conf_data_value->configuration_id)}}
                                @php
                                    if($conf_data_value->income == 1990):
                                @endphp
                                    <p style="color:green">Depand On Templeate Configuration</p>
                                    {{Form::hidden('income_head[]','1990',['style'=>'width:40%'])}}
                                @php
                                    else:
                                @endphp
                                    {{Form::text('income_head[]',$conf_data_value->income,['style'=>'width:40%'])}}
                                @php
                                    endif;
                                @endphp
                            </td>
                            

                            <td>

                                    @if($conf_data_value->asset == 1990)
                                
                                    <p style="color:green">Depand On Templeate Configuration</p>
                               {{Form::hidden('asset_head[]','1990',['style'=>'width:40%'])}}
                                    @else
                                
                                    {{Form::text('asset_head[]',$conf_data_value->asset,['style'=>'width:40%'])}}
                               
                                    @endif
                               
                            </td>


                                
                            <td>

                                 @if($conf_data_value->expense == 1990)
                                
                                    <p style="color:green">Depand On Templeate Configuration</p>
                                 {{Form::hidden('expense_head[]','1990',['style'=>'width:40%'])}}
                                    @else
                                
                                {{Form::text('expense_head[]',$conf_data_value->expense,['style'=>'width:40%'])}}
                                    
                                    @endif
                             </td>       

                            <td>{{$conf_data_value->transcation_type}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

           




                    <div class="form-actions">
                <input type="submit" value="UPDATE" class="btn btn-success" id="submit_button" >
              </div>
                            {{Form::close()}}
            <!-- </form> -->
          </div>
        </div>
</div>

    

           
@stop
