<!DOCTYPE HTML>
<html lang="en-US"><head>
	<meta charset="UTF-8">
	<title>Library Stock Article's Report</title>
  <style>
  
  .print_report{margin-top: 2%;margin-left: 5%;margin-right: 5%;}
  .p_tag_report{font-size: 12px;margin-top: 30px}
</style>
</head><body class='body_for_report'>
      <div class='print_report'>
      		<div class="container">
	           <img src="img/logo.png" alt="Company Logo" style='background: currentColor;height: 120px;width: 100px;' height="120" width="120"/>
		  <h5>{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )
      </h5>
		  <h5>{{Session::get('school.address')}}<br>
          {{Session::get('school.Phone')}}<br>
          {{Session::get('school.country')}}<br>
          {{Session::get('school.postal_code')}}</h5>

              <h5 style="text-align: center;">Stock Article Report<hr style="width: 100px; margin-left:266px; "></h5>
                     <div class="col-sm-12">
                         <div class="panel-body">
                          <table style="width: 100%;">
                              
                                   <tr style="background: aliceblue; font-size:11px;">
                                    
                                 <th>Article Name</th>
                                  <th>Language</th>
                                  <th>Author</th>
                                  <th>Isbn</th>
                                  <th>Stock Date</th>
                                  <th>Publisher</th>
                                   <th>Price Details</th>
                                  <th>Net Price</th>
                                  <th>Purchase Price</th>
                                  <th>Discount</th>
                                  <th>Quantity</th>
                                    
                                    </tr>
                             
	                                  @foreach($stock_article_info as $stock_article_information)
	                                     <tr style="font-size: 12px;">
	                                         <td>{{$stock_article_information->article_name}}</td>
                                           <td>{{$stock_article_information->language}}</td>
                                             <td>{{$stock_article_information->author}}</td>
                                            <td>{{$stock_article_information->isbn}}</td>
                                            <td>{{$stock_article_information->stock_date}}</td>
                                            <td>{{$stock_article_information->publisher}}</td>
                                            <td>{{$stock_article_information->price_details}}</td>
                                             <td>{{$stock_article_information->net_price}}</td>
                                            <td>{{$stock_article_information->purchase_price}}</td>
                                            <td>{{$stock_article_information->discount}}</td>
                                            <td>{{$stock_article_information->quantity}}</td>
	                                         
	                                     </tr>
								            	  @endforeach  
	                           
                         		</table>
                       		</div>
                  	</div>
             </div>
             <p class='p_tag_report'>Print Date &nbsp;:&nbsp;{{date('d-m-Y')}}</p>
             <p class='p_tag_report' style='text-align:center'>Develop by : TMSS ICT Ltd.<br>website : https://tmss-ict.com/<br>Contact No : 880-2-55073530</p>
      </div>

       


</body></html>



