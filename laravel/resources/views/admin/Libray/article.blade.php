@extends('admin.index')
@section('Title','Article')
@section('breadcrumbs','Article')
@section('breadcrumbs_link','/article')
@section('breadcrumbs_title','article')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
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
  		<h2><i class="fa fa-book" aria-hidden="true"></i> &nbsp;Add Article</h2> <!-- Tab Heading  -->
 		<p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} )  Add Article</p> <!-- Transport Details -->
    <br/>


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/templet_article'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp;Templete Article</a></li>
             
           <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i> &nbsp;Article Issue</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; NoticeBoard</a></li>
         </ul>
      </div>
    </div>
</div>


 	<div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-plus" aria-hidden="true"></i> Add New Article</a></li>

        </ul>
      </div>
    </div>


		<div class="tab-content">
    <br/>

<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>


      <!--new add form-->
      <div class="modal fade" id="myModal" role="dialog" style="margin-left:-80px">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i>Add New Article Info</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
         {{Form::open(['url'=>'/article','class'=>'form-horizontal','method'=>'post','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

					  	<div class="control-group">
					   		{{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
			              <div class="controls">
			                {{Form::text('article_name','',['id'=>'required','placeholder'=>'Article Name','title'=>'article_name'])}}
			              </div>
			            </div>
						<div class="control-group">
						 {{Form::label('language','Language ',['class'=>'control-label','title'=>'language'])}}
							<div class="controls">
								{{Form::text('language','',['id'=>'required','placeholder'=>'Language ','title'=>'language'])}}
							</div>
						</div>
						<div class="control-group">
                               {{Form::label('author','Author ',['class'=>'control-label','title'=>'author'])}}
							<div class="controls">

                    {{Form::text('author','',['id'=>'required','placeholder'=>'author','title'=>'author'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('isbn','ISBN',['class'=>'control-label','title'=>'isbn'])}}
							<div class="controls">
								{{Form::text('isbn','',['id'=>'required','placeholder'=>'ISBN','title'=>'isbn'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
							<div class="controls">
								{{Form::text('publisher','',['id'=>'required','placeholder'=>'Publisher','title'=>'publisher'])}}
							</div>
						</div>
						<div class="control-group">
							{{Form::label('description','Description',['class'=>'control-label','title'=>'description'])}}
						
							<div class="controls">
							{{Form::text('description','',['id'=>'required','placeholder'=>'Description','title'=>'description'])}}
							</div>
						</div>
						<div class="control-group">
						{{Form::label('stock_date',' Stock Date',['class'=>'control-label','title'=>'stock_date'])}}
							<div class="controls">
							{{Form::date('stock_date','',['id'=>'required','placeholder'=>'Stock Date','title'=>'stock_date'])}}
							</div>
						</div>
						<div class="control-group">
						{{Form::label('purchase_price','Price',['class'=>'control-label','title'=>'purchase_price'])}}
							<div class="controls">
							{{Form::text('purchase_price','',['id'=>'required','placeholder'=>'Price','title'=>'purchase_price'])}}
							</div>
						</div>
						<div class="control-group">
						{{Form::label('available_status','Available Status',['class'=>'control-label','title'=>'available_status'])}}
							<div class="controls">
							{{Form::select('available_status',['Available'=>'Available','Not Available'=>'Not Available'])}}
							</div>
						</div>
         
        </div>
      </div>
      <div class="modal-footer">
        {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
            <button type="button" class="btn btn-default" data-dismiss="modal">Close
            </button>
            {{Form::close()}}
    </div>

  </div>
</div>

</div>



      <!--end of the new add form-->

      <!-- Transport List Report  -->

		    	<div id="home" class="tab-pane fade in active">
		      		<div class="widget-box">
          				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            				<h5> Article Data table</h5>
          				</div>

          		<div class="widget-content nopadding">
		            <table class="table table-bordered data-table">

			              <thead>
			                 <tr>
                       <th>Artical Code</th>
								       <th>Accession No</th>
                        <th>Artical Name</th>
                        <th>Language</th>
                        <th>Author</th>
                       <th>Publisher</th>
                       <th>Description</th>
                       <th>Stock Date</th>
                       <th>Price</th>       
                        <th>Available Status</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                  
                     
                    <tbody>
                    @foreach($article_info as $article_information)
                      <tr class="gradeX">
                       <td>{{$article_information->article_id}}</td>
						           <td>{{$article_information->accession_code}}</td>
                        <td>{{$article_information->article_name}}</td>
                         <td>{{$article_information->language}}</td>
                        <td>{{$article_information->author}}</td>
                        <td>{{$article_information->publisher}}</td>
                        <td>{{$article_information->description}}</td>
                         <td>{{$article_information->stock_date}}</td>
                        <td>{{$article_information->purchase_price}}</td>
                        <td>{{$article_information->available_status}}</td>

			               <td id="my_align" class="display_status">
                                {{Form::open(['url'=>"/article/$article_information->article_id/edit",'method'=>'GET'])}}
                                   {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                                 {{Form::close()}}
		                        {{Form::open(['url'=>"/article/$article_information->article_id",'method'=>'DELETE'])}}
		                        {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
		                        {{Form::close()}}
			                </tr>
			                @endforeach 
			              </tbody>
            			</table>
          			</div>
        		</div>
		    </div>






		</div>
	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/article_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
    

@stop
