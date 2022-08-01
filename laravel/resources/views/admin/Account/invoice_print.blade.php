<!DOCTYPE html>
<html>
<head>
    <title>Invoice > {{$invoice_info->invoice_id}}</title>
    <link rel="icon" type="image/gif" href="../img/backend/student/{{$invoice_info->student_roll}}.jpg" />
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;}">

   
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/print_format.css')}}">

<div class="heading-wrapper"> 
    <p class="margin">Home > Invoice > {{$invoice_info->invoice_id}}</p>
</div>



<div class="system-wrapper"> 
    <p class="margin">
      {{Session::get('school.system_name')}}({{Session::get('school.school_eiin')}})<br>
      {{Session::get('school.address')}}<br>
      {{Session::get('school.Phone')}}<br>
      {{Session::get('school.country')}}<br>
      {{Session::get('school.postal_code')}}
      
      
    </p>
</div>
<style type="text/css"></style>

    <div class="form-print-wrapper">
        <div class="print-tool-bar">
            <div class="tool-bar-standrad"><select><option>Standrad</option></select></div>
            <div class="Langugae"><select><option>English</option></select></div>
            <div class="letter-head"><input type="checkbox" checked="" name="">Letter Head</div>
            <div>
                <div class="btn-group tool">
                    <a onclick="printDiv()" class="btn-print-print btn-sm btn btn-default"><strong>Print</strong></a>
                    <a class="btn-print-edit btn-sm btn btn-default">Customize</a>        
                    <a class="btn-print-preview btn-sm btn btn-default">Full Page</a>        
                    <a class="btn-download-pdf btn-sm btn btn-default"> PDF</a>        
                </div>
            </div>
        </div>
        <div class="print_preview_wrapper">
            <div id="print-preview" class="print-preview">
              <div class="print-format">
                <div class="page-break" style="display: flex; flex-direction: column;">
                    <div class="header"></div>
                    <div class="body_section">



                   	<div>{{Session::get('school.system_name')}}<br>Payment Recipt</div>
                   	<div style="text-align: center;"><u>{{$invoice_info->title}}</u></div>
                   	<div style="margin-top: 5%">
                   		<table  cellspacing="0" cellpadding="0" style="width: 100%">
                   			<tr>
                   				<td style="width: 20%">Class Name</td>
                   				<td>:</td>
                   				<td>{{$invoice_info->class_name}}</td>
                   			</tr>

                   			<tr>
                   				<td>Student Roll</td>
                   				<td>:</td>
                   				<td>{{$invoice_info->student_roll}}</td>
                   			</tr>
                   			@php
           					$student_data=DB::table('students')->where('roll',$invoice_info->student_roll)->first();
                   			@endphp
							@if($student_data)
                   			<tr>
                   				<td>Student Roll</td>
                   				<td>:</td>
                   				<td>{{$student_data->student_name}}</td>
                   			</tr>

                   			<tr>
                   				<td>Reg Number</td>
                   				<td>:</td>
                   				<td>{{$student_data->reg_number}}</td>
                   			</tr>

                   			<tr>
                   				<td>Payment Date</td>
                   				<td>:</td>
                   				<td>{{$invoice_info->created_at}}</td>
                   			</tr>
								@endif
                   		</table>
                   	</div>





               



                <div style="margin-top: 10%">
                	<table>
	                 	
	                 		<tr >
	                 			<td>From Date</td>
	                 			<td>:</td>
	                 			<td>{{$invoice_info->from_date}}</td>
	                 			
	                 		</tr>

	                 		<tr >
	                 			<td>To Date</td>
								<td>:</td>
	                 			<td>{{$invoice_info->to_date}}</td>
	                 			
	                 		</tr>

	                 		<tr >
	                 			<td>Total Month</td>
	                 			<td>:</td>
	                 			<td>{{$invoice_info->total_month}}</td>
	                 			
	                 		</tr>
	                 	

	                 	
	                 </table>
                </div>


                <div>
                		<table>
	                 		
	                 		<tr >
	                 			<td>Waber</td>
	                 			<td>:</td>
	                 			<td>{{$invoice_info->waber}}</td>
	                 			
	                 		</tr>

	                 		@if($invoice_info->waber)
	                 		<tr >
	                 			<td>Waber Purpose</td>
	                 			<td>:</td>
	                 			<td>{{$invoice_info->waber_purpose}}</td>
	                 			
	                 		</tr>
	                 		@endif

	                 		<tr >
	                 			<td>Actual Total</td>
	                 			<td>:</td>
	                 			<td>{{$invoice_info->on_net_total}}</td>
	                 			
	                 		</tr>

	                 </table>
                </div>
                <hr>
                <div>
                  <table style="width:100%;border: 1px solid gray;">
                      <tr>
                        <th style="background-color: #d6d6d6;">Sl No</th>
                        <th style="background-color: #d6d6d6;">Component Name</th>
                        <th style="background-color: #d6d6d6;">Amount</th>
                      </tr>
                      @foreach($component_data as $key=>$component_data_value)
                         <tr>
                           <td style="text-align: center;">{{$key+1}}</td>
                           <td style="text-align: center;">{{$component_data_value->component_name}}</td>
                           <td style="text-align: center;">{{$component_data_value->amount}}</td>
                         </tr>
                      @endforeach   
                  </table>
                </div>
                <br>




                <div>Invoice Creator : {{$invoice_info->invoice_creator}}<br>
                	IP:<?php  echo $_SERVER['REMOTE_ADDR']; ?></div>





                    </div>
                    <div class="footer" style="text-align: center;margin-top: 40%">
                      <p>Software Develop by :Codebool software company Limited<br>http://codebool.com<br>info@codebool.com</br>Contact : 01751783698 </p>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    
    




</body>
</html>




<script>
function printDiv()
        {
          var divToPrint=document.getElementById('print-preview');
          var newWin=window.open('','Print-Window');
          newWin.document.open();
          newWin.document.write('<html> <style type="text/css">@font-face { font-family: Barcode; font-weight: bold; src: url("font-awesome/barcode/BarcodeFont.ttf")}</style><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
          newWin.document.close();
        }
</script>













