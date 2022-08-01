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
    <h2><i class="fa fa-archive" aria-hidden="true"></i> Stock Books</h2> <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Books Stock</p> <br/>.<!-- Transport Details -->
  

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/templet_article'><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;Templete Article</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Article</a></li>
         
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
           
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


      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-bars" aria-hidden="true"></i>Stock Books Report</a></li>
        <li><a data-toggle="tab" href="#menu1"><i class="fa fa-plus-circle" aria-hidden="true"></i>Stock New Book</a></li>
      </ul>
  <div class="tab-content"> <!-- Transport List Report  -->

        <div id="home" class="tab-pane fade in active">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Show</h5>
                </div>

            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">

                  <thead>
                    <tr>
                      <th>Book Name</th>
                      <th>Language</th>
                      <th>Edition</th>
                      <th>Author</th>
                      <th>Isbn No</th>
                      <th>Stock Date</th>
                      <th>Publisher</th>
                       <th>Price Details</th>
                      <th>Net Price</th>
                      <th>Purchase Price</th>
                      <th>Discount</th>
                      <th>Quantity</th>
                       <th>Action</th>
                      </tr>
                    </thead>


                    <tbody>
                   @foreach($stock_article_info as $stock_article_information)
                      <tr class="gradeX">
                        <td>{{$stock_article_information->article_name}}</td>
                       <td>{{$stock_article_information->language}}</td>
                       <td>{{$stock_article_information->edition}}</td>
                         <td>{{$stock_article_information->author}}</td>
                        <td>{{$stock_article_information->isbn}}</td>
                        <td>{{$stock_article_information->stock_date}}</td>
                        <td>{{$stock_article_information->publisher}}</td>
                        <td>{{$stock_article_information->price_details}}</td>
                         <td>{{$stock_article_information->net_price}}</td>
                        <td>{{$stock_article_information->purchase_price}}</td>
                        <td>{{$stock_article_information->discount}}</td>
                        <td>{{$stock_article_information->quantity}}</td>
                         <td id="my_align" class="display_status">                     
<!--                        {{Form::open(['url'=>"/stock_article/$stock_article_information->stock_id/edit" ,'method'=>'GET'])}}
                       {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                       {{Form::close()}} -->
                       {{Form::open(['url'=>"/stock_article/$stock_article_information->stock_id",'method'=>'DELETE'])}}
                       {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                       {{Form::close()}}
                      </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
          </div>
      </div>

      <div id="menu1" class="tab-pane fade">
        <div >
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
          <h5>Stock</h5>
        </div>
        <div class="widget-content nopadding">
           {{Form::open(['url'=>'/stock_article','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           <div class="control-group" hidden>
            {{Form::label('stock_id','Stock Id',['class'=>'control-label','title'=>'stock_id'])}}
              <div class="controls">
               {{Form::text('stock_id',time(),['id'=>'required','placeholder'=>'Stock Id','title'=>'stock_id'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
              <div class="controls">
                @php $templet_article_data['']="" @endphp
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
                {{Form::text('language','',['id'=>'language','placeholder'=>'Language','title'=>'language'])}}
               
              </div>
            </div>
            <div class="control-group">
             {{Form::label('edition','Edition',['class'=>'control-label','title'=>'Edition'])}}
             <div class="controls">
                {{Form::text('edition','',['id'=>'edition','placeholder'=>'Edition','title'=>'Edition'])}}
               
              </div>
            </div>
            <div class="control-group">
            {{Form::label('author','Author',['class'=>'control-label','title'=>'author'])}}
               <div class="controls">
                {{Form::text('author','',['id'=>'author','placeholder'=>'Author','title'=>'author'])}}
               
              </div>
            </div>
            <div class="control-group">
                {{Form::label('isbn','Isbn No',['class'=>'control-label','title'=>'isbn'])}}
                <div class="controls">
                {{Form::text('isbn','',['id'=>'isbn','placeholder'=>'Accession No','title'=>'isbn'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('stock_date','Stock Date',['class'=>'control-label','title'=>'stock_date'])}}
              <div class="controls">
                {{Form::date('stock_date','',['id'=>'required','placeholder'=>'Stock Date','title'=>'stock_date'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
             <div class="controls">
                {{Form::text('publisher','',['id'=>'publisher','placeholder'=>'Publisher','title'=>'publisher'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('price_details','Price Details',['class'=>'control-label','title'=>'price_details'])}}
              <div class="controls">
                {{Form::text('price_details','',['id'=>'required','placeholder'=>'Price Details','title'=>'price_details'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('net_price','Net Price',['class'=>'control-label','title'=>'net_price'])}}
             <div class="controls">
                {{Form::text('net_price','',['id'=>'required','placeholder'=>'Net Price','title'=>'net_price'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('purchase_price','Purchase Price',['class'=>'control-label','title'=>'purchase_price'])}}
             <div class="controls">
                {{Form::text('purchase_price','',['id'=>'required','placeholder'=>'Purchase Price','title'=>'purchase_price'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('discount','Discount',['class'=>'control-label','title'=>'discount'])}}
             <div class="controls">
                {{Form::text('discount','',['id'=>'required','placeholder'=>'Discount','title'=>'discount'])}}
              </div>
            </div>
            <div class="control-group">
             {{Form::label('quantity','Quantity',['class'=>'control-label','title'=>'quantity'])}}
              <div class="controls">
                {{Form::text('quantity','',['id'=>'required','placeholder'=>'Quantity','title'=>'quantity'])}}
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
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
                    $('#edition').val(data.edition);
                    $('#author').val(data.author);
                    $('#isbn').val(data.isbn);
                     $('#publisher').val(data.publisher);


                  }
                });
            
         });
       
         });
           




              

      </script>


@stop
