@extends('admin.index')
@section('Title','Journal Entry')
@section('breadcrumbs','Student Payment Entry')
@section('breadcrumbs_link','/expense')
@section('breadcrumbs_title','expense')
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


<div class="alert alert-info">
      <strong>Warning!</strong> <br>When You are Set Type of Entry is Asset System Autmatic count on this party as credit and you are selected Devit Account & When You are selected Type of entry is Expense System Automatic count on this party as Devit and you are selected Credit Account . 
</div>



	<div class="container">
      <h2><i class="fa fa-bus" aria-hidden="true" ></i>Journal Entry</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}} Journal Entry Details</p> <!-- Transport Details -->


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/chart_of_account'><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Chart Of Account</a></li>
             
           <li><a href='/create_template'><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Payment Templete</a></li>
            <li><a href='/student_payment_entry'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Create New Payment</a></li>
       
         </ul>
      </div>
    </div>
</div>
<br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/expense_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/expense_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/expense_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i> Journal Entry List</a></li>
          <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i> Journal Entry</a></li>
        </ul>

      

    <div class="tab-content"> <!-- Transport List Report  -->
          
          <div id="home" class="tab-pane fade in active">
              <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                  </div>

              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Journal Type</th>
                        <th>Asset Account</th>
                        <th>Expense Account</th>
                        <th>Amount Method</th>
                        <th>Bank Name</th>
                        <th>cheque No</th>
                        <th>Transaction Date</th>
                        <th>Amount</th>
                        <th>Allocate</th>
                        <th>Party Name</th>
                        <th>remark</th>
                       <th>Action</th>
                    </tr>
          </thead>
          <tbody>
                    
              @foreach($expense_info as $expense_information)
            <tr class="gradeX">
                <td>{{$expense_information->status}}</td>
                <td>{{$expense_information->journal_title}}</td>
                <td>{{$expense_information->journal_type}}</td>
                <td>{{$expense_information->asset_account}}</td>
                <td>{{$expense_information->expense_account}}</td>
                <td>{{$expense_information->amount_method}}</td>
                <td>{{$expense_information->bank_name}}</td>
                <td>{{$expense_information->cheque_no}}</td>
                <td>{{$expense_information->created_at}}</td>
                @php
                  $amount_info=DB::table('expense_child')->where('expense_id',$expense_information->expense_id)->first();

                @endphp
                <td>{{$amount_info->amount}}</td>
                <td>{{$amount_info->allocate_amount}}</td>
                <td>{{$amount_info->party_name}}</td>
                <td>{{$expense_information->remark}}</td>
             
              
           <td id="my_align" class="display_status">
                 {{Form::open(['url'=>"/expense/$expense_information->expense_id/edit" ,'method'=>'GET'])}}
                   {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
              {{Form::close()}}

               {{Form::open(['url'=>"/expense/$expense_information->expense_id",'method'=>'DELETE'])}}
                 {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                {{Form::close()}}
              </td>
            
              </tr>
          
              @endforeach
                     
                    </tbody>
                  </table>
                </div>
            </div>
        </div>







        <div id="menu1" class="tab-pane fade"><div >
          <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Transport</h5>
          </div>
          <div class="widget-content nopadding">

          {{Form::open(['url'=>'/expense','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}	
                
                <div class="control-group">
                {{Form::label('journal_title','Journal Title',['class'=>'control-label','title'=>'journal_title'])}}
                	<div class="controls">
                      {{Form::text('journal_title','',['id'=>'required','placeholder'=>'Journal Title','title'=>'journal_title'])}}
                	</div>
              	</div>


              	<div class="control-group">
                 {{Form::label('journal_type','Journal Type',['class'=>'control-label','title'=>'journal_type'])}}
                	<div class="controls">
                   {{Form::select('journal_type',['Earnings'=>'Earnings','Expense'=>'Expense'],null,['class'=>'journal'])}}
                	</div>
              	</div>


              	<div class="control-group" hidden="hidden" id="asset_account_list">
                  {{Form::label('asset_account','Asset Account',['class'=>'control-label','title'=>'asset_account'])}}
                	<div class="controls">
                  @php $asset_account_list_array=[''=>'']; @endphp
                    @foreach($asset_account as $asset_account_list)

                        @php $asset_account_list_array[$asset_account_list->account_name]=$asset_account_list->account_name @endphp
                    @endforeach
                  	 {{Form::select('asset_account',$asset_account_list_array)}}
                	</div>
              	</div>



                <div class="control-group" hidden="hidden" id="expense_account_list">
                {{Form::label('expense_account','Expense Account',['class'=>'control-label','title'=>'expense_account'])}}
                  <div class="controls">
                    
                  @php $expense_acount_list_array=[''=>'']; @endphp
                    @foreach($expense_account as $expense_info_list)

                        @php $expense_acount_list_array[$expense_info_list->account_name]=$expense_info_list->account_name @endphp
                    @endforeach


                  {{Form::select('expense_account',$expense_acount_list_array)}}
                  </div>
                </div>


              	<div class="control-group">
                 {{Form::label('amount_method','Amount Method',['class'=>'control-label','title'=>'amount_method'])}}
                	<div class="controls">
                   {{Form::select('amount_method',['Cash'=>'Cash','cheque'=>'cheque'],null,['class'=>'amount_method'])}}
                	</div>
              	</div>





                <div class="control-group" id="bank_name">
                {{Form::label('bank_name','Bank Name',['class'=>'control-label','title'=>'bank_name'])}}
                  <div class="controls">
                      {{Form::text('bank_name','',['id'=>'required','placeholder'=>'Bank Name','title'=>'bank_name'])}}
                  </div>
                </div>


                <div class="control-group" id="cheque_no">
                {{Form::label('cheque_no','cheque No',['class'=>'control-label','title'=>'cheque_no'])}}
                  <div class="controls">
                      {{Form::text('cheque_no','',['id'=>'required','placeholder'=>'Cheque No','title'=>'cheque_no'])}}
                  </div>
                </div>




              	<div class="control-group">
                	{{Form::label('status','Status',['class'=>'control-label','title'=>'status'])}}
                	<div class="controls">
                  	 {{Form::select('status',['Draft'=>'Draft','Submit'=>'Submit'])}}
                	</div>
              	</div>


                <div style="display: flex;justify-content: center;" class="control-group">
                  
                  

                    <table class="table address">
                      <thead>
                        <tr>
                          <th>Purpose</th>
                          <th>Amount</th>
                          <th>Allocate Amount</th>
                          <th>Party Name</th>
                        </tr>
                      </thead>
                      <tbody>
                       <tr>
                          <td>{{Form::text('purpose','',['id'=>'a_table','placeholder'=>'Purpose','title'=>'purpose'])}}</td>
                          <td>{{Form::text('amount','',['id'=>'a_table','placeholder'=>'Amount','title'=>'amount'])}} </td>
                          <td>{{Form::text('allocate_amount','',['id'=>'a_table','placeholder'=>'Allocate Amount','title'=>'allocate_amount'])}}</td>
                          <td>{{Form::text('party_name','',['id'=>'a_table','placeholder'=>'Party Name','title'=>'party_name'])}}</td>
                        </tr>
                      </tbody>
                    </table>



                 
                </div>


                <div class="control-group">
                  {{Form::label('remark','Remark',['class'=>'control-label','title'=>'remark'])}}
                  <div class="controls">
                  {{Form::text('remark','',['id'=>'requried','placeholder'=>'Remark','title'=>'remark'])}}
                  </div>
                </div>

              	


              

          <div class="form-actions">
         {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success'])}}
        </div>
        {{Form::close()}}
   
          </div> 
        </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">

     $(document).ready(function()
    {
        entry_category();
        method_cheque();
        $(".journal").unbind().change(function()
        {   
            entry_category();

        });

        $('.amount_method').change(function(){
            method_cheque();
        });


        function entry_category()
        {
           var journal_type=$("#journal_type").val();
            
            if(journal_type=="Earnings")
            {

              $('#expense_account_list').hide();
              $('#asset_account_list').show();
            }
            else
            {
                $('#expense_account_list').show();
                $('#asset_account_list').show();
            }
        }

        function method_cheque()
        {
            var amount_method=$('#amount_method').val();
            
            if(amount_method=="Cash")
            {
              $('#bank_name').hide();
              $('#cheque_no').hide();
            }
            else
            {
              $('#bank_name').show();
              $('#cheque_no').show();
            }
        }
  });

  

 </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/expense_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
@stop

