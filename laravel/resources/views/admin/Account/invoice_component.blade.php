@extends('admin.index')

@section('Title','invoice_component')
@section('breadcrumbs','invoice_component')
@section('breadcrumbs_link','/invoice_component')
@section('breadcrumbs_title','invoice_component')
@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('Error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Error!</strong> {{ Session::get('Error') }}
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
    <i class="fa fa-address-book" aria-hidden="true">
    </i> &nbsp;Invoice Component
  </h2> 
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}  Applicant Report
  </p>
  



<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
           <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
            <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Payment Templete</a></li>
            
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Student Invoice</a></li>
            
         </ul>
      </div>
    </div>


</div>







  <!-- Transport Details -->

  <div class="panel panel-default text-right" >
    <div class="panel-body">
      <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
        <li>
          <a href='#'>
            <i class="fa fa-pencil-square-o" aria-hidden="true">
            </i> Add New Invoice Component 
          </a>
        </li>
      </ul>
    </div>
  </div><br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/invoice_component_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/invoice_component_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/invoice_component_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>



  <div class="tab-content">
    <!--new add form-->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
            <h4 class="modal-title">Add New Invoice Component 
            </h4>
          </div>
      </div>
      <div class="modal-body">
        <div class="widget-content nopadding">
          {{Form::open(['url'=>'/invoice_component','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
          
              <div class="control-group">
                 {{Form::label('component_name','Component Name',['class'=>'control-label','title'=>'component_name'])}}
                <!-- <label class="control-label">Component Name</label> -->
                <div class="controls">
                    {{Form::text('component_name','',['id'=>'required','placeholder'=>'Component Name','title'=>'component_name'])}}
                 <!--  <input type="text" name="required" id="required"> -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><input type="checkbox" id="max"/></label>
                <div class="controls">
                 Set Maximum Value
                </div>
                <div class="controls" hidden="hidden" id="maximum">
                 <!--   <input type="text" name="required"  /> -->
                  {{Form::text('set_max_value','',['id'=>'required','placeholder'=>'Set Max Value','title'=>'set_max_value'])}}
                </div>
              </div>
              <div class="control-group">
                <label class="control-label"><input type="checkbox" id="min"/></label>
                <div class="controls">
                  Set Minimum Value
                </div>
                <div class="controls" hidden id="minimum">
                 {{Form::text('set_min_value','',['id'=>'required','placeholder'=>'Set Max Value','title'=>'set_min_value'])}}
                </div>
              </div>


              <div class="control-group">
                 {{Form::label('income_account','Income Account',['class'=>'control-label','title'=>'income_account'])}}
                <div class="controls">
                  @php
                    $income_account_array=[''=>'--select--']
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
                    $asset_account_array=[''=>'--select--']
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
                	{{Form::select('payment_term',['Cash'=>'Cash','Check'=>'Check'])}}
							</div>
                
                </div>
              </div>
             
            
          </div>
      <div class="modal-footer">
               {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      {{Form::close()}}
    </div>
     </div>


        <div class="tab-content" >
  <!-- Transport List Report  -->
  <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Student Invoice Component Data Table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
              <tr>
                    
                    <th>Component Name</th>
                     <th>Set Minimun Value</th>
                      <th>Set Minimun Value</th>
                     <th>Payment Term</th>
                     <th>Income Account</th>
                     <th>Asset Account</th>
                    <th>Action</th>
                  </tr>
          </thead>
          <tbody>
                @foreach($invoice_component_data as $invoice_component_list)
                  <tr class="gradeX">
                    <td>{{$invoice_component_list->component_name}}</td>
                    <td>{{$invoice_component_list->set_max_value}}</td>
                     <td>{{$invoice_component_list->set_min_value}}</td>
                     <td>{{$invoice_component_list->payment_term}}</td>
                     <td>
                       @php
                          $income_account_name=DB::table('chart_of_accounts')->where('account_code',$invoice_component_list->income_account)->first();
                       @endphp
                        {{$income_account_name ? $income_account_name->account_name : '--'}}
                     </td>
                     <td>
                      @php
                          $asset_account_name=DB::table('chart_of_accounts')->where('account_code',$invoice_component_list->asset_account)->first();
                       @endphp
                        {{$asset_account_name ? $asset_account_name->account_name : '--'}}
                      </td>
                     
           
                     <td id="my_align" class="display_status">
           
                    
                        {{Form::open(['url'=>"/invoice_component/$invoice_component_list->invoice_component_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/invoice_component/$invoice_component_list->invoice_component_id",'method'=>'DELETE'])}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this Component?');"])}}
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