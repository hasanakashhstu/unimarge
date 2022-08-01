@extends('admin.index')
@section('Title','Stock')
@section('breadcrumbs','Stock')
@section('breadcrumbs_link','/stock_article')
@section('breadcrumbs_title','Stock')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
  <h2>
   <i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Stock Article Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Stock Atricle  Details Edit
  </p><br/>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
            <li><a href='/membership'> <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
             <li><a href='/stock_article'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
             <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/stock_article_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/stock_article_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/stock_article_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>


  <!-- Transport Details -->
  <div class="widget-box">
    <div class="widget-title">
      <span class="icon">
        <i class="icon-info-sign">
        </i>
      </span>
      <h5> {{$stock_article_info->article_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
     {{Form::open(['url'=>"/stock_article/$stock_article_info->stock_id",'class'=>'form-horizontal','method'=>'put','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
            <div class="control-group">
            {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              <div class="controls">
              
               @foreach($templet_article_info as $templet_article_list) 
                @php 
                 $templet_article_data[$templet_article_list->article_name]=$templet_article_list->article_name
                @endphp 
               @endforeach
              {{Form::select('article_name',$templet_article_data,null,['id'=>'article_name'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('language','Language',['class'=>'control-label','title'=>'language'])}}
             <div class="controls">
                {{Form::text('language',$stock_article_info->language,['id'=>'language','placeholder'=>'Language','title'=>'language'])}}
               
              </div>
            </div>
            <div class="control-group">
            {{Form::label('author','Author',['class'=>'control-label','title'=>'author'])}}
               <div class="controls">
                {{Form::text('author',$stock_article_info->author,['id'=>'author','placeholder'=>'Author','title'=>'author'])}}
               
              </div>
            </div>
            <div class="control-group">
                {{Form::label('isbn','ISBN',['class'=>'control-label','title'=>'isbn'])}}
                <div class="controls">
                {{Form::text('isbn',$stock_article_info->isbn,['id'=>'isbn','placeholder'=>'ISBN','title'=>'isbn'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('stock_date','Stock Date',['class'=>'control-label','title'=>'stock_date'])}}
              <div class="controls">
                {{Form::date('stock_date',$stock_article_info->stock_date,['id'=>'required','placeholder'=>'Stock Date','title'=>'stock_date'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
             <div class="controls">
                {{Form::text('publisher',$stock_article_info->publisher,['id'=>'publisher','placeholder'=>'Publisher','title'=>'publisher'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('price_details','Price Details',['class'=>'control-label','title'=>'price_details'])}}
              <div class="controls">
                {{Form::text('price_details',$stock_article_info->price_details,['id'=>'required','placeholder'=>'Price Details','title'=>'price_details'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('net_price','Net Price',['class'=>'control-label','title'=>'net_price'])}}
             <div class="controls">
                {{Form::text('net_price',$stock_article_info->net_price,['id'=>'required','placeholder'=>'Net Price','title'=>'net_price'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('purchase_price','Purchase Price',['class'=>'control-label','title'=>'purchase_price'])}}
             <div class="controls">
                {{Form::text('purchase_price',$stock_article_info->purchase_price,['id'=>'required','placeholder'=>'Purchase Price','title'=>'purchase_price'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('discount','Discount',['class'=>'control-label','title'=>'discount'])}}
             <div class="controls">
                {{Form::text('discount',$stock_article_info->discount,['id'=>'required','placeholder'=>'Discount','title'=>'discount'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('quantity','Quantity',['class'=>'control-label','title'=>'quantity'])}}
              <div class="controls">
                {{Form::text('quantity',$stock_article_info->quantity,['id'=>'required','placeholder'=>'Quantity','title'=>'quantity'])}}
              </div>
            </div>
             <div class="form-actions">
              {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success'])}}
            </div>
             {{Form::close()}}
          </div>
           </div>
          </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript">

      $(document).ready(function(){
     
         $('#article_name').unbind().change(function(){
            var article_name=$('#article_name').val();
          
         
                 $.ajax({
                  url: '/article_filter_data',
                  type: "post",
                  data: {'article_name':article_name,'_token': $('input[name=_token]').val()},
                  success: function(data){
                    $('#language').val(data.language);
                    $('#author').val(data.author);
                    $('#isbn').val(data.isbn);
                     $('#publisher').val(data.publisher);


                  }
                });
            
         });
       
         });
           




              

      </script>
<script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/stock_article_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>


@stop
