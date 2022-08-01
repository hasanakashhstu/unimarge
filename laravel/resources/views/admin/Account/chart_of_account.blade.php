@extends('admin.index')
@section('Title','Chart Of Accountant')
@section('breadcrumbs','Chart of Accountant')
@section('breadcrumbs_link','/chart_of_account')
@section('breadcrumbs_title','Manage Chart Of Accountant')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif

@if (Session::has('Error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('Error') }}
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
	
<h2><i class="fa fa-list-alt" aria-hidden="true"></i> Chart Of Accounts</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}} Chart Of Accounts</p> <!-- Transport Details -->


 		

    <div class='row'>
         <div class="panel panel-default" >
          <div class="panel-body text-left">
             <ul class='dropdown_test'> 
                <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
                <li><a href='/student_payment_entry'><i class="fa fa-money" aria-hidden="true"></i> &nbsp; Invoice</a></li>
                 
               <li><a href='/expense'><i class="fa fa-bus" aria-hidden="true" ></i>&nbsp;Journal Entry</a></li>
                <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; NoticeBoard</a></li>
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


<style type="text/css">.tree > li > label {
    padding: 0 10px;
}

.tree {
    padding: 0 10px;
}

.nav-header {
  display: block;
  padding: 3px 15px;
  font-size: 11px;
  font-weight: bold;
  line-height: 20px;
  color: Black;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
  text-transform: uppercase;
}

.nav-list>li>a, .nav-list .nav-header {
  margin-left: -15px;
  margin-right: -15px;
  font-size: 11px;
  text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
.well{    margin-top: 4%;}
.tree li a{color: black}</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">$(document).ready(function () {
    $('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });
    $(function () {
        $('.tree-toggler').parent().children('ul.tree').toggle(200);
    });
});
</script>



<div class="col-md-12">
  <div class="well" style="padding: 8px;">
    <ul class="nav nav-list">
      <li>
        <label class="tree-toggler nav-header "><b class='chart_account_heading'>Chart Of Account</b></label>
        <ul class="nav nav-list tree" style="display: block;">
             <li><label class="tree-toggler nav-header"><b>Asset</b></label>
             @foreach($assets_info as $asset_list) 
<ul class="nav nav-list tree"><li><a href="#">{{$asset_list->account_code}}-{{$asset_list->account_name}}</a></li></ul>           @endforeach
            </li>

            <li><label class="tree-toggler nav-header"><b>Liblaties</b></label>
             @foreach($liblaties_info as $liblaties) 
<ul class="nav nav-list tree"><li><a href="#">{{$liblaties->account_code}}-{{$liblaties->account_name}}</a></li></ul>           @endforeach
            </li>


            <li><label class="tree-toggler nav-header"><b>income</b></label>
             @foreach($income_info as $income) 
<ul class="nav nav-list tree"><li><a href="#">{{$income->account_code}}-{{$income->account_name}}</a></li></ul>           @endforeach
            </li>

            
            <li><label class="tree-toggler nav-header"><b>Expense</b></label>
            @foreach($expense_info as $expense_list) 
 <ul class="nav nav-list tree"><li><a href="#">{{$expense_list->account_code}}-{{$expense_list->account_name}}</a></li></ul>     @endforeach
      </li>
        </ul>

      </li>
    </ul>
  </div>
</div>

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-plus-circle" aria-hidden="true"></i> Account</a></li>
          <li><a data-toggle="tab" href="#menu1"><i class="fa fa-bars" aria-hidden="true"></i> Account Report</a></li>
        </ul>

      

    <div class="tab-content"> <!-- Transport List Report  -->
          
          <div id="home" class="tab-pane fade in active">
              <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>New Account</h5>
          </div>
          <div class="widget-content nopadding">
             {{Form::open(['url'=>'/chart_of_account','files'=>true,'class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}} 
             
              <div class="control-group">
                {{Form::label('account_name','Account Name:',['class'=>'control-label','title'=>'Account Name'])}}
                <div class="controls">
                  {{Form::text('account_name','',['id'=>'required','title'=>'account_name','placeholder'=>'Account Name'])}}
                </div>
              </div>
               <div class="control-group">
                {{Form::label('account_code','Account Code:',['class'=>'control-label','title'=>'Account code'])}}
                <div class="controls">
                  {{Form::text('account_code','',['id'=>'required','title'=>'account_code','placeholder'=>'Account Code'])}}
                </div>
              </div>
              
              <div class="control-group">
                {{Form::label('root','Root',['class'=>'control-label','title'=>'root'])}}
                <div class="controls">
                  {{Form::select('parent_account',['Asset' => 'Asset', 'Expense' => 'Expense','Liabilities'=>'Liabilities','Income'=>'Income'])}}
                </div>
              </div>
              
              

              <div class="control-group">
                {{Form::label('max_tran_amnt','Maximum Tran. Amt.',['class'=>'control-label','title'=>'Maximum Tran. Amt.'])}}
                <div class="controls">
                  {{Form::text('transaction_amount','',['id'=>'required','title'=>'transaction_amount','placeholder'=>'Maximum Tran. Amt.'])}}
                </div>
              </div>


              <div class="control-group">
                {{Form::label('transaction_type','Transaction Type',['class'=>'control-label','title'=>'transaction_type'])}}
                <div class="controls">
                  {{Form::select('transaction_type',['Check' => 'Check', 'Cash' => 'Cash'])}}
                </div>
              </div>

              

          <div class="form-actions">
                <input type="submit" value="Submit" class="btn btn-success">
              </div>
            {{Form::close()}}
          </div>
        </div>
        </div>
        

        




        <div id="menu1" class="tab-pane fade">
          <div>
            <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Data table</h5>
                  </div>

              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                  
                    <thead>
                      <tr>
                        <th>Account Name</th>
                        <th>Account Code</th>
                        <th>Root</th>
                        <th>Maximum Transaction Amount</th>
                        <th>Transaction Type</th>
                        <th>Actions</th>
                      </tr>
                    </thead>


                    <tbody>
                    @foreach($accounts as $accounts_data)
                      <tr class="gradeX">
                        <td>{{$accounts_data->account_name}}</td>
                        <td>{{$accounts_data->account_code}}</td>
                        <td>{{$accounts_data->parent_account}}</td>
                        <td>{{$accounts_data->transaction_amount}}</td>
                        <td>{{$accounts_data->transaction_type}}</td>
                        <td class="center">

                          <div class="display_status">
                                    {{Form::open(['url'=>"chart_of_account/$accounts_data->id/edit" ,'method'=>'GET'])}}
                                    {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                                    {{Form::close()}}
                                    

                                    {{Form::button('DELETE',['class'=>'btn btn-danger applicant_student_delete','value'=>$accounts_data->id,])}}


                           </div>
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






<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}"></script>
      <script type="text/javascript">

      $(document).ready(function(){
        $('.applicant_student_delete').unbind().click(function(){
         var id = $(this).attr('value');
        if (confirm('Are you sure you want to delete this?')) { 
         $(this).closest('tr').remove();
        
         $.ajax({
            url: '/chart_of_account/'+id+'',
            type: "DELETE",
            data: {'id':id,'_token': $('input[name=_token]').val()},
            success: function(data){
              
              
            }
          });
       }

        });
      });


      </script>


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