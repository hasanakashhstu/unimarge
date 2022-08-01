@extends('admin.index')
@section('Title','Invoice Component')
@section('breadcrumbs','Invoice Component')
@section('breadcrumbs_link','/invoice_component')
@section('breadcrumbs_title','invoice_component')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
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
  <h2>
    <i class="fa fa-pencil-square" aria-hidden="true"></i>  Invoice Component Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}  Invoice Component Details</p>










<div class='row'>
  

  <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/chart_of_account'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
            <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Payment Templete</a></li>
            
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student Invoice</a></li>
            <li><a href='/invoice_component'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>

    




  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/invoice_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/invoice_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>

</div>



      <div>
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon">
              <i class="icon-info-sign">
              </i>
            </span>
            <h5>Add New Components
            </h5>
          </div>
           <div class="widget-content nopadding">
            {{Form::open(['url'=>"/invoice_component/$invoice_data->invoice_component_id",'class'=>'form-horizontal','method'=>'put','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
          
              <div class="control-group">
                 {{Form::label('component_name','Component Name',['class'=>'control-label','title'=>'component_name'])}}
                <!-- <label class="control-label">Component Name</label> -->
                <div class="controls">
                    {{Form::text('component_name',$invoice_data->component_name,['id'=>'required','placeholder'=>'Component Name','title'=>'component_name'])}}
                 <!--  <input type="text" name="required" id="required"> -->
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">

                  <input type="checkbox" id="max"/></label>
                
                <div class="controls">
                 Set Maximum Value
                </div>
                <div class="controls" hidden="hidden" id="maximum">
                 <!--   <input type="text" name="required"  /> -->
                  {{Form::text('set_max_value',$invoice_data->set_max_value,['id'=>'required','placeholder'=>'Set Max Value','title'=>'set_max_value'])}}
                </div>
              </div>


              <div class="control-group">
                <label class="control-label"><input type="checkbox" id="min"/></label>
                <div class="controls">
                  Set Minimum Value
                </div>
                <div class="controls" hidden id="minimum">
                 {{Form::text('set_min_value',$invoice_data->set_min_value,['id'=>'required','placeholder'=>'Set Max Value','title'=>'set_min_value'])}}
                </div>
              </div>


              <div class="control-group">
                 {{Form::label('income_account','Income Account',['class'=>'control-label','title'=>'income_account'])}}
                <div class="controls">
                  @php
                    $income_account_array=[$invoice_data->income_account=>$invoice_data->income_account]
                  @endphp
                  @foreach($income_account as $income_account_value)
                    @php
                      $income_account_array[$income_account_value->account_code]=$income_account_value->account_name
                    @endphp
                  @endforeach
                {{Form::select('income_account',$income_account_array,null,['id'=>'required','title'=>'income_account'])}}
                </div>
              </div>


              <div class="control-group">
                 {{Form::label('asset_account','Asset Account',['class'=>'control-label','title'=>'asset_account'])}}
                <div class="controls">
                 @php
                    $asset_account_array=[$invoice_data->asset_account=>$invoice_data->asset_account]
                  @endphp
                  @foreach($asset_account as $asset_account_value)
                    @php
                      $asset_account_array[$asset_account_value->account_code]=$asset_account_value->account_name
                    @endphp
                  @endforeach
                {{Form::select('asset_account',$asset_account_array,null,['id'=>'required','title'=>'asset_account'])}}
                </div>
              </div>
              
              <div class="control-group">
                {{Form::label('payment_term','Default Payment Term',['class'=>'control-label','title'=>'payment_term'])}}
               <!--  <label class="control-label">Default Payment Term</label> -->
                <div class="controls">
                  {{Form::select('payment_term',[$invoice_data->payment_term =>$invoice_data->payment_term,'Cash'=>'Cash','Check'=>'Check'])}}
              </div>
                
             
      <div class="modal-footer">
               {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
            
      </div>
      {{Form::close()}}
                  </div>
                </div>
               </div>
                </div>
</div>
              
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script type="text/javascript">
          $(document).ready(function() {
             $("#max").click(function(){
                  $("#maximum").toggle();
             });
              $("#min").click(function(){
                  $("#minimum").toggle();
             });
          });

     </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/invoice_component_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
    @stop