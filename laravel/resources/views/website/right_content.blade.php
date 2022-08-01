<div class="col-lg-4 four columns right-side-bar" id="right-content">
	    <!-- <div class="column block">
	        <h5 class="bk-org title"><p>মাননীয় মন্ত্রী</p></h5>
	        <p class="imgcenterofficehead">
	            <img src="./index_files/Minister.jpg" alt="মাননীয় মন্ত্রী" width="100" height=""></p>
	        <p>ডাঃ দীপু মনি,&nbsp;এম.পি.&nbsp;</p>
	        <p>&nbsp;</p>
	        <p>&nbsp;</p>
	        <p>ডাঃ দীপু মনি<span sty...="" <p="">
	        <a href="http://bteb.portal.gov.bd/site/office_head/9e8a2004-c9b6-4d40-a2dc-a5492f44a805/%E0%A6%AC%E0%A6%BF%E0%A6%B8%E0%A7%8D%E0%A6%A4%E0%A6%BE%E0%A6%B0%E0%A6%BF%E0%A6%A4" title="বিস্তারিত">বিস্তারিত</a>	</span></p>
	    </div> -->
	    @foreach($our_management as $value)
	    <div class="column block">
			<h5 class="bk-org title">
				<p style="color: #fff !Important;">{{$value['designation']}}</p>
			</h5>
			<p class="imgcenterofficehead">	
				<img src="{{asset($value['image'])}}" alt="$value->image" width="100" height=""></p>
			<p style="text-align: center;">{{$value['name']}}</p>
		</div>
		@endforeach
	    <div class="column block">
	        <h5 class="bk-org title">Features</h5>
	        <ul>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="/frontend/principal_message">Principal's Message</a></li>

	            <!-- <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Vice Principal's Message</a></li> -->

	            <!-- <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Present Principal information</a></li> -->

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="/frontend/faculties/staff_info/Office">Office Staff</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Academic Information</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="/frontend/gallery">Gallery</a></li>

	            <!-- <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Video Gallery</a></li> -->

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="/frontend/online-admission">Online Admission</a></li>

	            <!-- <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Megazine</a></li>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Curriculum</a></li>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Scout</a></li>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">Cultural practices</a></li>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a href="#">About Hostels</a></li> -->
	        </ul>
	    </div>
	    <div class="column block">
	        <h5 class="bk-org title">Important Links</h5>
	        <ul>
	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="https://moedu.gov.bd/">Ministry of Education</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="http://www.bteb.gov.bd/">Bangladesh Technical Education Board (BTEB)</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="http://www.techedu.gov.bd/"> Directorate of Technical Education (DTE)</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="https://www.tmss-bd.org/"> TMSS</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="https://www.tmss-ict.com/">TMSS-ICT</a></li>

	            <li><i class="fas fa-caret-right"></i>&nbsp;<a target="_blank" href="http://www.pundrouniversity.edu.bd/">Pundra University of Science & Technology (PUST)</a></li>
	        </ul>
	    </div>
	   

	    <div class="clearfix"></div>
	</div>