@extends('admin.index')
@section('Title','Salary Slip')
@section('breadcrumbs','Salary Slip')
@section('breadcrumbs_link','/slary_slip')
@section('breadcrumbs_title','Salary Slip')
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


<style type="text/css">
  
  #mydiv {
 
  position: relative;
  background-color: gray; /* for demonstration */
}
.ajax-loader {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  margin: auto; /* presto! */ display: block; 
  transform: translate(-48%, 411%);
  z-index: 100;
}
</style>

<div hidden="hidden" id="mydiv">
  <img  src="img/success.png" class="ajax-loader">
</div>



<div class="container">
  <h2>
    <i class="fa fa-user-plus" aria-hidden="true">
    </i> Salary Salary Slip
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">I School Managment  Strucuture Details
  </p>
  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5>New Strucuture
      </h5>
    </div>



 
    <div class="widget-content nopadding">
         {{Form::open(['url'=>'#','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','navalidate'=>'navalidate'])}}           
        

     <div class="control-group">
          {{Form::label('medium','Medium',['class'=>'control-label'])}}
          <div class="controls">
            @php 
              $medium_array=[''=>'--select--']
            @endphp
            @foreach($medium as $medium_data)
              @php
                $medium_array[$medium_data->type_name]=$medium_data->type_name
              @endphp
            @endforeach
            {{Form::select('medium',$medium_array,null,['class'=>'medium','id'=>'medium'])}}
          </div>
        </div>


        <div class="control-group">
            {{Form::label('type','Type',['class'=>'control-label'])}}
          <div class="controls">
              {{Form::select('type',['--select--'=>'--select--','Teacher'=>'Teacher','Staff'=>'Staff'],null,['class'=>'teacher_staff'])}}
          </div>
        </div>


        <div class="control-group">
          
            {{Form::label('names','Name',['class'=>'control-label'])}}
          <div class="controls">
              {{Form::select('names',[],null,['id'=>'teacher_name_field'])}} &nbsp;&nbsp;
              <span  style="color:red" id='alert_message'></span>
          </div>
        </div>

        

      

        <div class="control-group">
            {{Form::label('payroll_frequency','Payroll Frequency',['class'=>'control-label'])}}
          <div class="controls">
               {{Form::select('payroll_frequency',['--select--'=>'--select--','Monthly'=>'Monthly','Weekly'=>'Weekly','Daily'=>'Daily'],null,['class'=>'payroll_frequecy','id'=>'payroll_frequecy'])}}
          </div>
        </div>




        <div class="control-group">

            {{Form::label('','',['class'=>'control-label','id'=>'teacher_or_staff_label'])}}
          <div class="controls">
            
            <table class="table address input_fields_wrap text-center">
              <thead>
                <tr>
                  <th>Name
                  </th>
                  <th>Join Date
                  </th>
                  <th>Base
                  </th>
                  <th>Variable</th>
                  
                </tr>
              </thead>
              <tbody>
                
               
                <tr >
                  <td id='t_s_name'></td>
                  <td id='t_s_join_date'></td>
                  <td id='t_s_base'></td>
                  <td id='t_s_variable'></td>
                       
                </tr>
              </tbody>
            </table>
          </div>
        </div>








        <div class="control-group">

            {{Form::label('earning_component','Earning component',['class'=>'control-label'])}}
          <div class="controls">
            
            <table class="table address input_fields_wrap">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula</th>
                  <th>Amount</th>
                  
                  
                </tr>
              </thead>
              <tbody id="earn_com">
                
               
              </tbody>
            </table>
          </div>
        </div>
     





        <div class="control-group">

            {{Form::label('deduction_component','Deduction Component',['class'=>'control-label'])}}
          <div class="controls">
            
            <table class="table address input_fields_wrap text-center">
              <thead>
                <tr>
                  <th>Component Name</th>
                  <th>Formula</th>
                  <th>Amount</th>
                  
                  
                </tr>
              </thead>
              <tbody id="Deduction">
                
               
              </tbody>
            </table>
          </div>
        </div>
     



         <div class="control-group">
             {{Form::label('payment_account','Payment Account',['class'=>'control-label'])}}
          <div class="controls" id="payment_account">
           
          </div>
        </div>


         <div class="control-group">
              {{Form::label('expense_account','Expense Account',['class'=>'control-label'])}}
          <div class="controls" id="expense_account">
            
          </div>
        </div>

        <div class="control-group">
              {{Form::label('round_of','Round Off',['class'=>'control-label'])}}
          <div class="controls">
            {{Form::text('round_of',null,['id'=>'required','class'=>'round_of','placeholder'=>'Round Of','title'=>'round_of'])}}
          </div>
        </div>





        <div class="control-group">
          {{Form::label('total_earning','Total Earning',['class'=>'control-label'])}}
          <div class="controls" id="total_earning_id">
           
          </div>
        </div>


        <div class="control-group">
          {{Form::label('total_deduction','Total Deduction',['class'=>'control-label'])}}
          <div class="controls" id="total_deduction_id">
           
          </div>
        </div>

        <div class="control-group">
          {{Form::label('salary_date','Which Month Of Salary ?',['class'=>'control-label'])}}
          <div class="controls" id="total_deduction_id">
             {{Form::select('month',['January'=>'January','Feburay'=>'Feburay','March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','Nobemeber'=>'Nobemeber','December'=>'December'],null,['id'=>'month'])}}
          </div>
        </div>


        <div class="control-group">
          {{Form::label('salary_date','Which Month Of Salary ?',['class'=>'control-label'])}}
          <div class="controls" id="total_deduction_id">
             {{Form::text('date',null,['id'=>'current_date','class'=>'posting_date'])}}
          </div>
        </div>


         <div class="control-group">
          {{Form::label('','',['class'=>'control-label'])}}
          <div class="controls text-center">
           Gross Salary
            <span id='gross_salary'></span>
          </div>
        </div>




       
        
       
      
       
        <div class="form-actions">
          <input type="button" id="submit_salary_slip" value="Submit"  class="btn btn-success">

           <a class="btn btn-default" href="/print_salary_slip" target="_blank">Print Last Salary Slip</a>
        </div>

         


       {{ Form::close() }}
    </div>
  </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
        
        var global_value="";
        
        $('#current_date').val(new Date().getFullYear());
         $('.teacher_staff').unbind().change(function(){
         var teacher_or_staff_value = $(this).attr('class','teacher_staff').val();
        
         $.ajax({
            url: '/salary_slip_teacher_name',
            type: "POST",
            data: {'teacher_or_staff':teacher_or_staff_value,'_token': $('input[name=_token]').val()},
            success: function(data){
              $('#teacher_name_field').html(data);
            }
          });

        });


         $('.payroll_frequecy').unbind().change(function(){
          

            var payroll_frequecy = $('#payroll_frequecy').val();
            var teacher_or_staff_name = $('#teacher_name_field').val();
            
            var type=$('#type').val();
            // if(teacher_or_staff_name=='')
            // {
            //     alert('Please Fill Out Teacher Or Staff Name Field At First');
            // }
            // else
            // {

                $.ajax({
                  url: '/salary_slip_details',
                  type: "POST",
                  data: {'payroll_frequecy':payroll_frequecy,'teacher_or_staff_name':teacher_or_staff_name,'_token': $('input[name=_token]').val()},
                    success: function(data){
                      console.log(data);
                      global_value=data;
                      console.log(data);
                      if(data=="This Empoyee Are Not Found In Active Salary Structure" || data=="This Empoyee  Are Not Found In any Salary Structure")
                      {
                          $('#alert_message').html(data);
                          
                      }
                      else
                      {
                        $("#teacher_or_staff_label").text(type +' Details');
                        $('#t_s_name').text(data.teacher_name);
                        $('#t_s_join_date').text(data.from_date);
                        $('#t_s_base').text(data.base);
                        $('#t_s_variable').text(data.variable);
                        $('#payment_account').text(data.payment_acount);
                        $('#expense_account').text(data.expense_acount);

                            // Total Eraning Part 

                            var total_earning=0;
                            for(i=0;i<data[0].earn_component.length;i++)
                            {  
                              if(data[0].earn_component[i].earn_formula!="")
                              {
                                formula=data[0].earn_component[i].earn_formula;
                                var formula_expolde=formula.split('*');
                                var formula_value=formula_expolde[1];
                                var Formula_based_amount= parseInt(data.base)*formula_value;
                                
                                total_earning=total_earning+Formula_based_amount;

                                $("#earn_com").append("<tr>\
                                                        <td>"+data[0].earn_component[i].earn_component_name+"</td>\
                                                        <td>"+data[0].earn_component[i].earn_formula+"</td>\
                                                        <td>"+Formula_based_amount+"</td>\
                                                        </tr>");

                              }
                              else
                              {
                                 
                                  $("#earn_com").append("<tr>\
                                                        <td>"+data[0].earn_component[i].earn_component_name+"</td>\
                                                        <td>"+data[0].earn_component[i].earn_formula+"</td>\
                                                        <td>"+data[0].earn_component[i].earn_amount+"</td>\
                                                        </tr>");
                                  total_earning=total_earning+parseInt(data[0].earn_component[i].earn_amount);
                              }
                            }
                            $("#total_earning_id").text(total_earning);
                            // Total Eraning Part End



                            // Total Deduction Part Start
                            var total_deduction=0;
                            for(i=0;i<data[1].deduction.length;i++)
                            {  
                              if(data[1].deduction[i].deduction_formula!="")
                              {

                                formula=data[1].deduction[i].deduction_formula;
                                var formula_expolde=formula.split('*');
                                var formula_value=formula_expolde[1];
                                var Formula_based_amount= parseInt(data.base)*formula_value;

                                var total_deduction=total_deduction+Formula_based_amount;
                                $("#Deduction").append("<tr>\
                                                        <td>"+data[1].deduction[i].deduction_component_name+"</td>\
                                                        <td>"+data[1].deduction[i].deduction_formula+"</td>\
                                                        <td>"+Formula_based_amount+"</td>\
                                                        </tr>");
                                

                              }
                              else
                              {
                                  
                                $("#Deduction").append("<tr>\
                                                        <td>"+data[1].deduction[i].deduction_component_name+"</td>\
                                                        <td>"+data[1].deduction[i].deduction_formula+"</td>\
                                                        <td>"+data[1].deduction[i].deduction_amount+"</td>\
                                                        </tr>");
                                var total_deduction=total_deduction+parseInt(data[1].deduction[i].deduction_amount);
                              }
                              $("#total_deduction_id").text(total_deduction);
                            }

                            // Total Deduction Part End
                      }
                      //$('#teacher_name_field').html(data);
                    }
                });


          

        });  
         //payroll_frequecyEND


           

         $(".round_of").keyup(function(e){
           var total_earning=$("#total_earning_id").html();
           var total_deduction=$("#total_deduction_id").html();
           var round_of=$('.round_of').val();

           var gross_parse_amount=parseInt(total_earning)-parseInt(total_deduction)-parseInt(round_of);
           $('#gross_salary').text(gross_parse_amount);
         });

         $("#submit_salary_slip").click(function(){

            var type=$("#type").val();
            var person_id=global_value.teacher_or_staff_name;
            var person_name=global_value.teacher_name;
            var salary_structure=global_value.title;
            var payroll_frequency=global_value.frequency;
            var posting_date=$(".posting_date").val();
            var total_earning=parseInt($("#total_earning_id").html());
            var total_deduction=parseInt($("#total_deduction_id").html());
            var gross_salary=parseInt($("#gross_salary").html());
            var payment_account=$("#payment_account").html();
            var expense_account=$("#expense_account").html();
            var round_of=$(".round_of").val();
            var month=$('#month').val();
            var t_s=$('.teacher_staff').val();
            var medium=$('#medium').val();

            $.ajax({
              url: '/salary_slip',
              type: "POST",
              data: {'medium':medium,'t_s':t_s,'type':type,'person_id':person_id,'person_name':person_name,'salary_structure':salary_structure,'payroll_frequency':payroll_frequency,'posting_date':posting_date,'total_earning':total_earning,'total_deduction':total_deduction,'gross_salary':gross_salary,'payment_account':payment_account,'expense_account':expense_account,'round_of':round_of,'month':month,'_token': $('input[name=_token]').val()},
              success: function(data){
                  console.log(data);
                  if (data=="Salary Slip Create Succesfully On This Month") {
                    $("#mydiv").show();
                    setTimeout(function() { $("#mydiv").hide().slow(3000); }, 2000);
                    setTimeout(function() { window.location.reload(true); }, 3000);
                    
                  }
                  else
                  {
                    alert(data);
                  }
                
                  


              }
            });
        


         });



 });

$(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/salary_slip_report_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});


    </script>


@stop

