@extends('admin.index')
@section('Title','roster')
@section('breadcrumbs','roster')
@section('breadcrumbs_link','roster')
@section('breadcrumbs_title','roster')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
    </div>

@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong> {{ Session::get('error') }}
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
  		<h2><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Roster</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Roster</p> <!-- Transport Details -->

         <br>
<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'>
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/dormitory'><i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;Manage Dormitory</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>


</div>
      <br>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/assign_dormitory_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/assign_dormitory_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
    {{Form::open(['url'=>''])}}
     <table style="margin-top: 4%; margin-left: 3%" class="">
            <thead style="background: #1F262D">
            <tr style="height: 34px;color: #fff">
                <th>Date</th>
                <th>Generate Roster</th>
            </tr>
            </thead>


            <tbody>
            <tr>
                <td>
                	{{Form::date('date','',['style'=>'width:     
                	160px;','id'=>'date'])}}
                </td>

                 <td>
                   <input type="button" name="submit" class="btn btn-success generate" value="Generate" style="margin-top: -9px;">
                </td>

            </tr>

            </tbody>
        </table>
 {{Form::close()}}
 <center>
 	<div style="display: none;" class="gif">
	  <img src="{{asset('img/loading2.gif')}}">
   </div>
 </center>

	<div id="home" class="tab-pane fade in active">
					      		<div class="widget-box" style="width: 100% !important;">
			          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			            				<h5>Roster</h5>
			          				</div>

			          		<div class="widget-content nopadding">
					           <div class="roster_data_table"></div>
			        		</div>
					    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

       $(".generate").click(function(){
       	     var date=$("#date").val();
       	     $(".gif").show();
       	     $.ajax({
       	     	url:'/roster_data',
       	     	type:'post',
       	     	data:{'date':date,'_token': $('input[name=_token]').val()},
       	     	success:function(data){
       	     		//console.log(data);
       	     		$(".gif").hide("slow");
       	     		$(".roster_data_table").html(data);

       	     	}
       	     });
       });

		$(document).on('keyup','.amount',function(){

			   var date=$("#date").val();
		     var student_roll = $(this).closest("td").find("input[name='student_roll']").val();   
		     var component_id = $(this).closest("td").find("input[name='component_id']").val();
		     var amount=$(this).val();
		     	//alert(amount);
		     $.ajax({
		     	url:'/roster_inserting',
		     	type:'post',
		     	data:{'date':date,'student_roll':student_roll,'component_id':component_id,'amount':amount,'_token': $('input[name=_token]').val()},
		     	success:function(r){
		     		console.log(r);
		     	}
		     });
		 });

	});
</script>

@stop					    