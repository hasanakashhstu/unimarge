<!DOCTYPE html>
<html>
<head>
    <title>Student Money Receipt</title>
    <link rel="icon" type="image/gif" href="" />
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;}">

   
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/print_format.css')}}">

<div class="heading-wrapper"> 
    <p class="margin">Home > Invoice >{{$payment_receipt->payment_receipt_id}}</p>
</div>

<div class="print-tool-bar">
            <div class="tool-bar-standrad"><select><option>Standrad</option></select></div>
            <div class="Langugae"><select><option>English</option></select></div>
            <div class="letter-head"><input type="checkbox" checked="" name="">Letter Head</div>
            <div>
                <div class="btn-group tool">
                    <a onclick="pop_print()" class="btn-print-print btn-sm btn btn-default"><strong>Print</strong></a>
                    <a class="btn-print-edit btn-sm btn btn-default">Customize</a>        
                    <a class="btn-print-preview btn-sm btn btn-default">Full Page</a>        
                    <a class="btn-download-pdf btn-sm btn btn-default"> PDF</a>        
                </div>
            </div>
        </div>
<style type="text/css">



</style>
<div class="print">
	<div class="head">
		<div>
			@php
				$student_data=DB::table('students')->where('roll',$payment_receipt->student_roll)->first();
			@endphp
        <table style="margin-top: 60px;border: 0px solid gray;width: 95%;">

          <tr>
              <td style="border-right: 1px dashed black;">
                <h2 style="margin-left: 50px;font-size: 23px;">&nbsp;
                {{Session::get('school.system_name')}}
               </h2>
                <br>
                 <h4 style="margin-left: 210px;margin-top: -20px;font-size: 15px;">School EIIN: {{Session::get('school.postal_code')}}</h4>
                 <br>
                <h4 style="margin-left: 65px;margin-top: -30px;font-size: 15px;">{{Session::get('school.address')}}, Postal Code-{{Session::get('school.postal_code')}}</h4>
                <h2 style="background-color: #bbbbbb;width: 465px;margin-left: 65px;text-align: center;">Money Receipt</h2>
                <h4 style="margin-left: 65px;">Date:{{date('d-m-Y')}}</h4>
                 <h4 style="margin-left: 300px;margin-top: -40px;">Sl No: <span>
                 	{{$payment_receipt->payment_receipt_id}}
                 </span></h4>
         
                <h4 style="margin-left: 65px;">Name:<span>{{$student_data->student_name}}</span></h4>
       
                <h4 style="margin-left: 300px;margin-top: -40px;">Roll No:<span>
                 	{{$payment_receipt->student_roll}}
                 </span></h4>
           

                 <h4 style="margin-left: 65px;">Class:<span>{{$payment_receipt->class}}</span></h4>
          
                 <h4 style="margin-left: 65px;">Department:<span>{{$student_data->department}}</span></h4>
       
                <br>
                <h4 style="margin-left: 65px;margin-top: -15px;">Batch No:<span>{{$student_data->batch}}</span></h4>

              <table style="margin-left: 60px;width: 470px;margin-top: 25px;line-height: 3px;" border="1" cellpadding="8" cellspacing="1">
                	<tr>
                		<th style="background-color: #bbbbbb;">Sl No</th>
                		<th style="background-color: #bbbbbb;">Particulars</th>
                		<th style="background-color: #bbbbbb;">Amount</th>
                	</tr>
                	@php
                		$total=0;
                	@endphp
                	@foreach($invoice_component as $key=>$invoice_component_data)
                		@php
                			$component_amount=DB::table('payment_receipt_child')->where('payment_receipt_id',$payment_receipt->payment_receipt_id)
                			->where('component_id',$invoice_component_data->invoice_component_id)
                			->first();
                		@endphp
                	<tr>
                		<td style="font-size: 11px;text-align: left;">{{$key+1}}</td>
                		<td style="font-size: 11px;text-align: left;">{{$invoice_component_data->component_name}}</td>
                		<td style="font-size: 11px;text-align: left;">
                		<?php
                			if($component_amount)
                			{
                				$amount=$component_amount->amount;

                			}
                			else
                			{
                				$amount=0;
                			}
                			$total=$total+$amount
                		?>
                		{{$amount}}
                		</td>
                	</tr>
                	@endforeach
                	<tr>
                		<td colspan="2"><span style="float: right;">Total</span></td>
                		<td><input type="hidden" class="total" value="{{$total}}"> {{$total}}</td>
                	</tr>

                </table>
                <h4 style="margin-left: 65px;">In Word:<span class="word"></span></h4>
                <h4 style="float: right;margin-top: 2%;">Sign Of Accountant:</h4>
         
                <h4 style="margin-left: 65px;margin-top: 6%;">Receipt By: {{Auth::user()->name}}</h4>
       

              </td>

              <td style="border-right: 1px dashed black;">
                <h2 style="margin-left: 50px;font-size: 23px;">&nbsp;
                {{Session::get('school.system_name')}}
               </h2>
                <br>
                 <h4 style="margin-left: 210px;margin-top: -20px;font-size: 15px;">School EIIN: {{Session::get('school.postal_code')}}</h4>
                 <br>
                <h4 style="margin-left: 65px;margin-top: -30px;font-size: 15px;">{{Session::get('school.address')}}, Postal Code-{{Session::get('school.postal_code')}}</h4>
                <h2 style="background-color: #bbbbbb;width: 465px;margin-left: 65px;text-align: center;">Money Receipt</h2>
                <h4 style="margin-left: 65px;">Date:{{date('d-m-Y')}}</h4>

                 <h4 style="margin-left: 300px;margin-top: -40px;">Sl No:<span>
                 	{{$payment_receipt->payment_receipt_id}}
                 </span></h4>
        
                <h4 style="margin-left: 65px;">Name:<span>{{$student_data->student_name}}</span></h4>
            
                <h4 style="margin-left: 300px;margin-top: -40px;">Roll No:<span>
                 	{{$payment_receipt->student_roll}}
                 </span></h4>
         
               <h4 style="margin-left: 65px;">Class:<span>{{$payment_receipt->class}}</span></h4>
            
                 <h4 style="margin-left: 65px;">Department:<span>{{$student_data->department}}</span></h4>
             
                <br>
                <h4 style="margin-left: 65px;margin-top: -15px;">Batch No:<span>{{$student_data->batch}}</span></h4>
               
                <table style="margin-left: 60px;width: 470px;margin-top: 25px;line-height: 3px;" border="1" cellpadding="8" cellspacing="1">
                	<tr>
                		<th style="background-color: #bbbbbb;">Sl No</th>
                		<th style="background-color: #bbbbbb;">Particulars</th>
                		<th style="background-color: #bbbbbb;">Amount</th>
                	</tr>
                	@php
                		$total=0;
                	@endphp
                	@foreach($invoice_component as $key=>$invoice_component_data)
                		@php
                			$component_amount=DB::table('payment_receipt_child')->where('payment_receipt_id',$payment_receipt->payment_receipt_id)
                			->where('component_id',$invoice_component_data->invoice_component_id)
                			->first();
                		@endphp
                	<tr>
                		<td style="font-size: 11px;text-align: left;">{{$key+1}}</td>
                		<td style="font-size: 11px; text-align: left;">{{$invoice_component_data->component_name}}</td>
                		<td style="font-size: 11px;text-align: left;">
                		<?php
                			if($component_amount)
                			{
                				$amount=$component_amount->amount;

                			}
                			else
                			{
                				$amount=0;
                			}
                			$total=$total+$amount
                		?>
                		{{$amount}}
                		</td>
                	</tr>
                	@endforeach
                	<tr>
                		<td colspan="2"><span style="float: right;">Total</span></td>
                		<td><input type="hidden" class="total" value="{{$total}}"> {{$total}}</td>
                	</tr>

                </table>
                <h4 style="margin-left: 65px;">In Word:<span class="word"></span></h4>
           
                <h4 style="float: right;margin-top: 2%;">Sign Of Accountant:</h4>
         
                <h4 style="margin-left: 65px;margin-top: 6%;">Receipt By: {{Auth::user()->name}}</h4>
     

                <img src="{{asset('img/keci.png')}}" style="height: 29px;margin-left: -25px;margin-bottom: -20px;">
              </td>

              <td>
                <h2 style="margin-left: 50px;font-size: 23px;">&nbsp;
                {{Session::get('school.system_name')}}
               </h2>
                <br>
                 <h4 style="margin-left: 210px;margin-top: -20px;font-size: 15px;">School EIIN: {{Session::get('school.postal_code')}}</h4>
                 <br>
                <h4 style="margin-left: 65px;margin-top: -30px;font-size: 15px;">{{Session::get('school.address')}}, Postal Code-{{Session::get('school.postal_code')}}</h4>
                <h2 style="background-color: #bbbbbb;width: 465px;margin-left: 65px;text-align: center;">Money Receipt</h2>
                <h4 style="margin-left: 65px;">Date:{{date('d-m-Y')}}</h4>
               
                 <h4 style="margin-left: 300px;margin-top: -40px;">Sl No:<span>
                 	{{$payment_receipt->payment_receipt_id}}
                 </span></h4>
             
                <h4 style="margin-left: 65px;">Name:<span>{{$student_data->student_name}}</span></h4>
       
                <h4 style="margin-left: 300px;margin-top: -40px;">Roll No:<span>
                 	{{$payment_receipt->student_roll}}
                 </span></h4>
            
               <h4 style="margin-left: 65px;">Class:<span>{{$payment_receipt->class}}</span></h4>
               
                 <h4 style="margin-left: 65px;">Department:<span>{{$student_data->department}}</span></h4>
             
                <br>
                <h4 style="margin-left: 65px;margin-top: -15px;">Batch No:<span>{{$student_data->batch}}</span></h4>
          
                <table style="margin-left: 60px;width: 470px;margin-top: 25px;line-height: 3px;" border="1" cellpadding="8" cellspacing="1">
                	<tr>
                		<th style="background-color: #bbbbbb;">Sl No</th>
                		<th style="background-color: #bbbbbb;">Particulars</th>
                		<th style="background-color: #bbbbbb;">Amount</th>
                	</tr>
                	@php
                		$total=0;
                	@endphp
                	@foreach($invoice_component as $key=>$invoice_component_data)
                		@php
                			$component_amount=DB::table('payment_receipt_child')->where('payment_receipt_id',$payment_receipt->payment_receipt_id)
                			->where('component_id',$invoice_component_data->invoice_component_id)
                			->first();
                		@endphp
                	<tr>
                		<td style="font-size: 11px;text-align: left;">{{$key+1}}</td>
                		<td style="font-size: 11px;text-align: left;">{{$invoice_component_data->component_name}}</td>
                		<td style="font-size: 11px;text-align: left;">
                		<?php
                			if($component_amount)
                			{
                				$amount=$component_amount->amount;

                			}
                			else
                			{
                				$amount=0;
                			}
                			$total=$total+$amount
                		?>
                		{{$amount}}
                		</td>
                	</tr>
                	@endforeach
                	<tr>
                		<td colspan="2"><span style="float: right;">Total</span></td>
                		<td><input type="hidden" class="total" value="{{$total}}"> {{$total}}</td>
                	</tr>

                </table>
                <h4 style="margin-left: 65px;">In Word:<span class="word"></span></h4>
         
                <h4 style="float: right;margin-top: 2%;">Sign Of Accountant:</h4>
         
                <h4 style="margin-left: 65px;margin-top: 6%;">Receipt By: {{Auth::user()->name}}</h4>
       

                <img src="{{asset('img/keci.png')}}" style="height: 29px;margin-left: -25px;margin-bottom: -20px;">
              </td>

              
           
          </tr>

        </table>
      </div>
	</div>
<!-- 

    <div class="footer" style="text-align: center;margin-top: 50px">
      <p>Software Develop by :Codebool software company Limited<br>http://codebool.com<br>info@codebool.com</br>Contact : 01751783698 </p>
    </div> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var total=$(".total").val();
		var word=inWords(total);
		console.log(word);
		$(".word").text(word.toUpperCase());
	});



		  var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
          var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    return str;
}


   function pop_print(){
   w=window.open(null, 'Print_Page', 'scrollbars=yes');
    
            w.document.write('<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');
   
          w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

    
          w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
        w.document.write(jQuery('.print').html());


          w.document.close();
}

</script>













