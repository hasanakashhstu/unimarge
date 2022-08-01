@extends('admin.index')
@section('Title','Chart Of Accountant Edit')
@section('breadcrumbs','Chart of Accountant Edit')
@section('breadcrumbs_link','/chart_of_account_edit')
@section('breadcrumbs_title','Manage Chart Of Accountant edit')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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

	
<h2><i class="fa fa-list-alt" aria-hidden="true"></i> &nbspChart Of Account</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}  Chart Of Accounts</p> <!-- Transport Details -->


    <div class='row'> 
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'>
                <li><a href='/accountant'><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Add Accountant</a></li>
                <li><a href='/create_template'><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Payment Templete</a></li>
                <li><a href='/student_payment_entry'><i class="fa fa-money" aria-hidden="true"></i> &nbsp; Invoice</a></li>
                 <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; NoticeBoard</a></li>
                <li><a href='/chart_of_account'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
             </ul>
          </div>
        </div>
    </div>
    <div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/chart_of_account_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/chart_of_account_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/chart_of_account_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>



                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                  </div>

          <div class="widget-content nopadding">
             {{Form::open(['url'=>"/chart_of_account/$accounts->id",'files'=>true,'class'=>'form-horizontal','method'=>'PUT','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}} 
             
              <div class="control-group">
                {{Form::label('account_name','Account Name:',['class'=>'control-label','title'=>'Account Name'])}}
                <div class="controls">
                  {{Form::text('account_name',$accounts->account_name,['id'=>'required','title'=>'accountant_name','placeholder'=>'Accountant Name'])}}
                </div>
              </div>
               <div class="control-group">
                {{Form::label('account_code','Account Code:',['class'=>'control-label','title'=>'Account code'])}}
                <div class="controls">
                  {{Form::text('account_code',$accounts->account_code,['id'=>'required','title'=>'account_code','placeholder'=>'Account Code'])}}
                </div>
              </div>
              
              <div class="control-group">
                {{Form::label('root','Root',['class'=>'control-label','title'=>'root'])}}
                <div class="controls">
                  {{Form::select('parent_account',['Asset' => 'Asset', 'Expense' => 'Expense'])}}
                </div>
              </div>
              
              

              <div class="control-group">
                {{Form::label('max_tran_amnt','Maximum Tran. Amt.',['class'=>'control-label','title'=>'Maximum Tran. Amt.'])}}
                <div class="controls">
                  {{Form::text('transaction_amount',$accounts->transaction_amount,['id'=>'required','title'=>'transaction_amount','placeholder'=>'Maximum Tran. Amt.'])}}
                </div>
              </div>


              <div class="control-group">
                {{Form::label('transaction_type','Transaction Type',['class'=>'control-label','title'=>'transaction_type'])}}
                <div class="controls">
                  {{Form::select('transaction_type',['Check' => 'Check', 'Cash' => 'Cash'])}}
                </div>
              </div>

              

          <div class="form-actions">
                <input type="submit" value="UPDATE" class="btn btn-success">
              </div>
            {{Form::close()}}
          </div>
            </div>
            </div>

<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
   <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/chart_of_account_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
        
@stop