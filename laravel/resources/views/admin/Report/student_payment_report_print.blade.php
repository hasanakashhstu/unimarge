<!DOCTYPE html>
<html>
<head>
    <title>Student Money Receipt</title>
    <link rel="icon" type="image/gif" href="" />
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;}">

   
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/print_format.css')}}">




<div class="heading-wrapper"> 
    <p class="margin">Home > Payment Report </p>
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
	<center>
		<h1>Diploma In Engineering Course</h1>
		<h4>{{$data->student_name}}</h4>
		<h4>Session {{$data->session}}</h4>
	</center>


			@php
			
				   $invoice=DB::table('invoice')
							->where('student_roll',$data->roll)
							->groupBy('class_name')
							->get();

				
			@endphp
<?php
			$i=0;
			 if($invoice)
			{
			?>

					@foreach($invoice as $invoice_data)
					@php
						$all_fees_total=0;
						$all_payment_total=0;
						$all_waver_total=0;
					@endphp
					<table style="margin-left: 200px;width: 75%;line-height: 0px;">
					 <tr>
            			<th style="height:24px;width: 278px;background-color:#e6e6e6;color: black;"><span style="margin-left: -90%;color: #083163;">{{$invoice_data->class_name}}</span></th>
                     </tr>
					</table>
						@php
						
							$invoice_component=DB::table('invoice_child')
							                 ->where('invoice_id',$invoice_data->invoice_id)
							                 ->groupBy('component_id')
							                 ->get(); 
							$all_waver_total=$all_waver_total+$invoice_data->waber;                                   
						@endphp                 
			    <?php
			    	if(@$invoice_component)
			    	{
			    ?>		
	            @foreach($invoice_component as $key=>$invoice_component_data)
	            		@php
	            		$i++;
	            			$component_name=DB::table('invoice_component')
	            							  ->where('invoice_component_id',$invoice_component_data->component_id)
	            							  ->first();
	            						  	
	            		@endphp
          
<table style="margin-left: 200px;width: 75%;line-height: 0px;background-color: #c7e8ff99;">
            <tr>
            	<th style="height:15px;width: 278px;background-color: #afafaf;color: black;">{{$i}}</th>
            	<th style="height:15px;background-color: #afafaf;color: black;">
            		<span style="margin-left: -235px;">{{$component_name->component_name}}</span>
            	</th>
            </tr>
            <tr>
            	<td colspan="3">
            		<table style="width: 100%;line-height: 0px;" cellpadding="8" border="1">
            			<tr>
		            		<th style="width: 256px;">Date</th>
		            		<th style="width: 262px;">Fees</th>
		            		<th style="width: 410px;">Payment</th>
		            		<th style="">Due</th>
	            	   </tr>
	            	   @php
	            	   	$total_fees_component_wise=DB::table('invoice_child')
	            	   								->where('component_id',$invoice_component_data->component_id)
	            	   								->orderBy('created_at', 'ASC')
	            	   								->get();
	            	   							
	            	   	$payment_receipt=DB::table('payment_receipt')
											->where('class',$invoice_data->class_name)
											->where('student_roll',$data->roll)
											->get();								
	            	   @endphp
	            	   @php
	            	   	$payment_total=0;
	            	   	 $fees_total=0;
	            	     $due=0
	            	   @endphp
	            	   @foreach($total_fees_component_wise as $total_fees_component_wise_data)
	            	     @php
	            	        $fees_total=$fees_total+$total_fees_component_wise_data->amount;
	            	        $all_fees_total=$all_fees_total+$fees_total;
	            	   		$due=$due+$total_fees_component_wise_data->amount
	            	   	 @endphp	
		            	   <tr>
		            	   	 <td style="text-align: center;">{{date('d-M-Y', strtotime($total_fees_component_wise_data->created_at))}}</td>
		            	   	 <td style="text-align: center;">{{$total_fees_component_wise_data->amount}}</td>
		            	   	 	<td style="text-align: center;"></td>
		            	   	    <td style="text-align: center;">{{$due}}</td>
		            	   </tr>
                       @endforeach
                            @foreach($payment_receipt as $payment_receipt_data)
		            	   	 	@php
			            	   	 	$payment_amount=DB::table('payment_receipt_child')
			            	   	 					->where('payment_receipt_id',$payment_receipt_data->payment_receipt_id)
			            	   	 					->where('component_id',$invoice_component_data->component_id)
			            	   	 					->orderBy('created_at', 'ASC')
			            	   	 					->get();
		            	   	    @endphp	
		            	   	@foreach($payment_amount as $payment_amount_data)
		            	   	 @php
		            	   	  $payment_total=$payment_total+$payment_amount_data->amount;
		            	   	  $all_payment_total=$all_payment_total+$payment_total;
	            	   		   $due=$due-$payment_amount_data->amount
	            	   		 @endphp
			            	   <tr>
			            	   	 <td style="text-align: center;">{{date('d-M-Y', strtotime($payment_amount_data->created_at))}}</td>
			            	   	 <td style="text-align: center;"></td>
			            	   	 <td style="text-align: center;">{{$payment_amount_data->amount}}</td>
			            	   	 <td style="text-align: center;">{{$due}}</td>
			            	   </tr>
			            	   @endforeach

		            	   	 @endforeach
                           		<tr>
			            	   	   <td style="text-align: center;
    background-color: #305071ba;
    color: #ffffff;font-weight: 600;">Sub Total</td>
			            	   	   <td style="text-align: center;
    background-color: #305071ba;
    color: #ffffff;font-weight: 600;">{{$fees_total}}</td>
			            	   	   <td style="text-align: center;
    background-color: #305071ba;
    color: #ffffff;font-weight: 600;">{{$payment_total}}</td>
			            	   	   <td style="text-align: center;
    background-color: #305071ba;
    color: #ffffff;font-weight: 600;">{{$due}}</td>
			            	   </tr>

	            	</table>
            	</td>
            </tr>
	</table>
    @endforeach

<?php
  }
  ?>
@php
$in_total_waver=$all_fees_total-$all_waver_total-$all_payment_total;

@endphp
  <table style="margin-left: 200px;width: 75%;line-height: 0px;" border="1"  cellpadding="8">
            			<tr>
		            		<th style="width: 256px;">Total</th>
		            		<th style="width: 262px;">Fees</th>
		            		<th style="width: 410px;">Waber</th>
		            		<th>Payment</th>
		            		<th>Due</th>
	            	   </tr>
	<tr>
	   	   <td style="text-align: center;background-color: #e2e2e2;"></td>
	   	   <td style="text-align: center;background-color: #e2e2e2;color: #0a5ea7;font-size: 18px;
    font-weight: 700;">{{$all_fees_total}}</td>
	   	   <td style="text-align: center;background-color: #e2e2e2;color: green;font-size: 18px;
    font-weight: 700;">{{$all_waver_total}}</td>
	   	   <td style="text-align: center;background-color: #e2e2e2;    font-size: 18px;
    font-weight: 700;">{{$all_payment_total}}</td>
	   	   <td style="text-align: center;background-color: #e2e2e2;color: red;font-size: 18px;
    font-weight: 700;">{{$in_total_waver}}</td>
	</tr>
</table>	


  @endforeach
  <?php
}
?>
			







<div style="margin-left: 200px;">
   <table>
   	<tr>
   		@php
   			$report_settings=DB::table('report_settings')->get();

   		@endphp
   		@foreach($report_settings as $key=>$report_settings_value)
   		<td>
   			<hr style="margin-top: 52px;width: 180px;<?php if($key!=0) {?>margin-left:95px;<?php } else { ?> margin-left:0px; <?php } ?> ">
   			<span style="<?php if($key!=0) {?>margin-left:95px;<?php } else { ?> margin-left:0px; <?php } ?> ">{{$report_settings_value->name}}</span>
   			<br>
   			<span style="<?php if($key!=0) {?>margin-left:95px;<?php } else { ?> margin-left:0px; <?php } ?> ">{{$report_settings_value->designation}}</span>
   		</td>
   		@endforeach
   	</tr>
   </table>
</div>




</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">


   function pop_print(){
   w=window.open(null, 'Print_Page', 'scrollbars=yes');
    
            w.document.write('<style>@page{size:landscape;border:black 1px solid}</style><html><head><title></title>');
   
          w.document.write( "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"print\"/>" );

    
          w.document.write('<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />');
        w.document.write(jQuery('.print').html());


          w.document.close();
}

</script>













