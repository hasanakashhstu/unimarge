@extends('admin.index')
@section('Title','Salary Structure')
@section('breadcrumbs','Salary Structure')
@section('breadcrumbs_link','/salary_structure')
@section('breadcrumbs_title','Salary Strucuture')
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
  <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Salary Strucuture</h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">I School Managment  Strucuture Details</p>
  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon"><i class="icon-info-sign"></i></span><h5>New Strucuture</h5>
    </div>


    <div class="widget-content nopadding">
    {{Form::open(['url'=>"/salary_structure_update/$salary_structure_details->payroll_structure_id",'class'=>'form-horizontal','method'=>'PUT','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

        
        <div hidden="hidden" class="control-group">
          <label class="control-label">ID</label>
          <div class="controls">
            {{Form::text('payroll_structure_id',time(),['id'=>'required'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Title</label>
          <div class="controls">
            {{Form::text('title',$salary_structure_details->title,['id'=>'required'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Is Active</label>
          <div class="controls">
          {{Form::select('status',[$salary_structure_details->status=>$salary_structure_details->status,'Yes'=>'Yes','No'=>'No'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Payroll Frequency</label>
          <div class="controls">
          {{Form::select('frequency',[$salary_structure_details->frequency=>$salary_structure_details->frequency,'Monthly'=>'Monthly','Weekly'=>'Weekly','Daily'=>'Daily'])}}
          </div>
        </div>




        <div class="control-group">
          <label class="control-label">Teacher & Staff </label>
          
          <div class="controls">
          <div class='container text-center'></div>
            
            <table class="table address input_fields_wrap">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>From Date</th>
                  <th>Base</th>
                  <th>Variable</th>
                  
                </tr>
              </thead>
              <tbody>
              
               @foreach($teacher_staff as $teacher_staff_list)
                <tr >
                  <td>
                  @php $teacher_array=[$teacher_staff_list->teacher_or_staff_name=>$teacher_staff_list->teacher_or_staff_name] @endphp
                    @foreach($teacer_name as $teacer_name_data)
                      @php $teacher_array[$teacer_name_data->teacher_id]=$teacer_name_data->teacher_name @endphp
                    @endforeach
                      {{Form::select('teacher_or_staff_name[]',$teacher_array,null,['id'=>'a_table','class'=>'teacher_name','style'=>'width:100%'])}}
                    
                  </td>
                  <td>
                      {{Form::date('from_date[]',$teacher_staff_list->from_date,['id'=>'a_table'])}}
                      {{Form::hidden('id[]',$teacher_staff_list->id,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('base[]',$teacher_staff_list->base,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('variable[]',$teacher_staff_list->variable,['id'=>'a_table'])}}
                  </td>
                  
                </tr>
            	@endforeach

              </tbody>
            </table>
          </div>
        </div>
     













        <div class="control-group">
          <label class="control-label">Earning Component
          </label>
          <div class="controls">
            <div class='container text-center'></div>
            
            <table class="table address input_fields_wrap_earning">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula</th>
                  
                  <th>Amount</th>
                </tr>
              </thead>


              <tbody>
                 @foreach($earn as $earn_list) 
                <tr>
                  <td>
                    {{Form::text('earn_component_name[]',$earn_list->earn_component_name,['id'=>'a_table','disabled'=>'disabled'])}}
                    {{Form::hidden('earn_component_name[]',$earn_list->earn_component_name,['id'=>'a_table'])}}
                    
                  </td>
                  <td>
                    {{Form::text('earn_formula[]',$earn_list->earn_formula,['id'=>'a_table','class'=>'earn_formula'])}}
                  </td>
                  <td>
                    {{Form::text('earn_amount[]',$earn_list->earn_amount,['id'=>'a_table','class'=>'earn_amount'])}}
                  </td>
                 
                  
                </tr>
            	   @endforeach

              </tbody>
            </table>
          </div>
        </div>






        <div class="control-group">
          <label class="control-label">Deduction Component
          </label>
          <div class="controls">
            <div class='container text-center'></div>
            <table class="table address input_fields_wrap_deducation">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                
               @foreach($deduction as $deducation_component_data) 
                <tr>
                  <td>
                      {{Form::text('deduction_component_name[]',$deducation_component_data->deduction_component_name,['id'=>'a_table','disabled'=>'disabled'])}}

                      {{Form::hidden('deduction_component_name[]',$deducation_component_data->deduction_component_name,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('deduction_formula[]',$deducation_component_data->deduction_formula,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('deduction_amount[]',$deducation_component_data->deduction_amount,['id'=>'a_table'])}}
                  </td>
                </tr>
            	@endforeach

              </tbody>
            </table>
          </div>
        </div>



        <div class="control-group">
          <label class="control-label">Payment Account </label>
          <div class="controls">
          @php $asset_account_data_array=[$salary_structure_details->payment_acount=$salary_structure_details->payment_acount] @endphp
            @foreach($asset_account as $asset_account_data)
              @php $asset_account_data_array[$asset_account_data->account_name]=$asset_account_data->account_name @endphp
            @endforeach
            {{Form::select('payment_acount',$asset_account_data_array,['id'=>'required'])}}
            
          </div>
        </div>


         <div class="control-group">
          <label class="control-label">Expense Account
          </label>
          <div class="controls">


          	 @php $expense_account_data_array=[$salary_structure_details->expense_acount=>$salary_structure_details->expense_acount] @endphp


            @foreach($expense_account as $expense_account_data)
@php $expense_account_data_array[$expense_account_data->account_name]=$expense_account_data->account_name @endphp
            @endforeach
              {{Form::select('expense_acount',$expense_account_data_array,['id'=>'required'])}}
          </div>
        </div>




       
        
       
      
       
        <div class="form-actions">
          {{Form::submit("submit",['class'=>'btn btn-success'])}}
        </div>
      {{Form::close()}}
    </div>
  </div>
</div>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){
        


         $('.earn_formula , .earn_amount').unbind().keyup("check_formula_amount",function(){
            var earn_amount=$(this).closest("tr").find("input.earn_amount").val();
            var earn_formula =$(this).closest("tr").find("input.earn_formula").val();
            if(earn_formula && earn_amount)
            {
                 alert("Select Only One (Earn Formula or Earn Amount)");
                 $(this).closest("tr").find("input.earn_amount").val('');
                 $(this).closest("tr").find("input.earn_formula").val('');
            }
         
         $( ".earn_amount").trigger( "check_formula_amount", [ "check_formula_amount", "keyup" ] );

        });


         



         
 });

      

      </script>

@stop