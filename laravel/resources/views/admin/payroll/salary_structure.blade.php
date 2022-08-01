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
    {{Form::open(['url'=>"/salary_structure",'class'=>'form-horizontal','method'=>'Post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

        
        <div hidden="hidden" class="control-group">
          <label class="control-label">ID</label>
          <div class="controls">
            {{Form::text('payroll_structure_id',time(),['id'=>'required'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Title</label>
          <div class="controls">
            {{Form::text('title',null,['id'=>'required'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Is Active</label>
          <div class="controls">
          {{Form::select('status',['Yes'=>'Yes','No'=>'No'])}}
          </div>
        </div>


        <div class="control-group">
          <label class="control-label">Payroll Frequency</label>
          <div class="controls">
          {{Form::select('frequency',['Monthly'=>'Monthly','Weekly'=>'Weekly','Daily'=>'Daily'])}}
          </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function() {

                   



    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click


                    $.ajax({
                        url: '/salary_structure_teacher_name',
                        type: "GET",
                        data: {'_token': $('input[name=_token]').val()},
                        success: function(data){
                         
                          $('.teacher_info_table').html(data);
                        }
                      });


        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append("<tr>\
              <td><select class='teacher_name teacher_info_table' id='a_table' name=\"teacher_or_staff_name[]\">\
                      <option></option>\
                  </select>\
              </td>\
              <td><input name=\"from_date[]\" id='a_table' type='date'></td>\
              <td><input name=\"base[]\" id='a_table' type='text'></td>\
              <td><input name=\"variable[]\" id='a_table' type='text'></td>\
              <tr>"); //add input box
        }
        else
        {
        	alert('Only 10 Fields Are Allowed')
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('<tr>').remove(); x--;
    })
});
</script>



        <div class="control-group">
          <label class="control-label">Teacher & Staff </label>
          
          <div class="controls">
          <div class='container text-center'><button class="add_field_button btn btn-info">Add Teacher & Staff</button></div>
            
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
              
               
                <tr >
                  <td>
                    @foreach($teacer_name as $teacer_name_data)
                      @php $teacher_array[$teacer_name_data->teacher_id]=$teacer_name_data->teacher_name @endphp
                    @endforeach
                      {{Form::select('teacher_or_staff_name[]',$teacher_array,null,['id'=>'a_table','class'=>'teacher_name','style'=>'width:100%'])}}
                    
                  </td>
                  <td>
                      {{Form::date('from_date[]',null,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('base[]',null,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('variable[]',null,['id'=>'a_table'])}}
                  </td>
                  
                </tr>
            	

              </tbody>
            </table>
          </div>
        </div>
     









  <script type="text/javascript">

	$(document).ready(function() {
    var max_fields_earning      = 10; //maximum input boxes allowed
    var wrapper_earning         = $(".input_fields_wrap_earning"); //Fields wrapper
    var add_button_earning      = $(".add_field_button_earning"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button_earning).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields_earning){ //max input box allowed
            x++; //text box increment
            $(wrapper_earning).append("<tr>\
            <td><input name=\"earn_component_name[]\" id='a_table' type='text'></td>\
            <td><input name=\"earn_formula[]\" id='a_table' type='text'></td>\
            <td><input name=\"earn_amount[]\" id='a_table' type='text'></td>\
            <tr>"); //add input box
        }
        else
        {
        	alert('Only 10 Fields Are Allowed')
        }
    });
    
    $(wrapper_earning).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('<tr>').remove(); x--;
    })
});
</script>



        <div class="control-group">
          <label class="control-label">Earning Component
          </label>
          <div class="controls">
            <div class='container text-center'><button class="add_field_button_earning btn btn-info">Add Earning Component</button></div>
            
            <table class="table address input_fields_wrap_earning">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula(As Percentage Ex: Base*.20)</th>
                  
                  <th>Amount</th>
                </tr>
              </thead>

              <tbody>
                 @foreach($earning_component_data as $earning_component_Data_value) 
                <tr>
                  <td>
                    {{Form::text('earn_component_name[]',$earning_component_Data_value->components_name,['id'=>'a_table'])}}
                    
                  </td>
                  <td>
                    {{Form::text('earn_formula[]',null,['id'=>'a_table','class'=>'earn_formula'])}}
                  </td>
                  <td>
                    {{Form::text('earn_amount[]',null,['id'=>'a_table','class'=>'earn_amount'])}}
                  </td>
                 
                  
                </tr>
            	   @endforeach

              </tbody>
            </table>
          </div>
        </div>






     <script type="text/javascript">

	$(document).ready(function() {
    var max_fields_deducation      = 10; //maximum input boxes allowed
    var wrapper_deducation       = $(".input_fields_wrap_deducation"); //Fields wrapper
    var add_button_deducation       = $(".add_field_button_deducation"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button_deducation).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields_deducation){ //max input box allowed
            x++; //text box increment
            $(wrapper_deducation).append("<tr>\
            <td><input name=\"deduction_component_name[]\" id='a_table' type='text'></td>\
            <td><input name=\"deduction_formula[]\" id='a_table' type='text'></td><td>\
            <input  name=\"deduction_amount[]\" id='a_table' type='text'></td>\
            <tr>"); //add input box
        }
        else
        {
        	alert('Only 10 Fields Are Allowed')
        }
    });
    
    $(wrapper_deducation).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('<tr>').remove(); x--;
    })
});
</script>



        <div class="control-group">
          <label class="control-label">Deduction Component
          </label>
          <div class="controls">
            <div class='container text-center'><button class="add_field_button_deducation btn btn-info">Add Deducation Component</button></div>
            <table class="table address input_fields_wrap_deducation">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula(As Percentage Ex: Base*.20)</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                
               @foreach($deducation_component as $deducation_component_data) 
                <tr>
                  <td>
                      {{Form::text('deduction_component_name[]',$deducation_component_data->components_name,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('deduction_formula[]',null,['id'=>'a_table'])}}
                  </td>
                  <td>
                      {{Form::text('deduction_amount[]',null,['id'=>'a_table'])}}
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
            @php $asset_account_data_array['']="" @endphp
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
            @php $expense_account_data_array['']="" @endphp
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