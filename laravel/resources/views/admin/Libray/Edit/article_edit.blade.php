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
  <h2>
  <i class="fa fa-check-square-o" aria-hidden="true">
    </i> &nbsp;Artical Edit
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Article Edit
  </p>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/stock_article'><i class="fa fa-archive" aria-hidden="true"></i>&nbsp; Stock Article</a></li>
            <li><a href='/membership'> <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Article Issue</a></li>
             <li><a href='/article'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/article_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/article_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/article_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$article_info->article_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
     {{Form::open(['url'=>"/article/$article_info->article_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

              <div class="control-group">
                {{Form::label('article_name','Article Name',['class'=>'control-label','title'=>'article_name'])}}
                    <div class="controls">
                      {{Form::text('article_name',$article_info->article_name,['id'=>'required','placeholder'=>'Article Name','title'=>'article_name'])}}
                    </div>
                  </div>
            <div class="control-group">
             {{Form::label('language','Language ',['class'=>'control-label','title'=>'language'])}}
              <div class="controls">
                {{Form::text('language',$article_info->language,['id'=>'required','placeholder'=>'Language ','title'=>'language'])}}
              </div>
            </div>
            <div class="control-group">
                   {{Form::label('author','Author ',['class'=>'control-label','title'=>'author'])}}
              <div class="controls">
                  {{Form::text('author',$article_info->author,['id'=>'author'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('isbn','Accession Code',['class'=>'control-label','title'=>'isbn'])}}
              <div class="controls">
                {{Form::text('accession_code',$article_info->accession_code,['id'=>'required','placeholder'=>'Accession Code','title'=>'isbn'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
              <div class="controls">
                {{Form::text('publisher',$article_info->publisher,['id'=>'required','placeholder'=>'Publisher','title'=>'publisher'])}}
              </div>
            </div>
            <div class="control-group">
              {{Form::label('description','Description',['class'=>'control-label','title'=>'description'])}}
            
              <div class="controls">
              {{Form::text('description',$article_info->description,['id'=>'required','placeholder'=>'Description','title'=>'description'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('stock_date',' Stock Date',['class'=>'control-label','title'=>'stock_date'])}}
              <div class="controls">
              {{Form::text('stock_date',$article_info->language,['id'=>'required','placeholder'=>'Stock Date','title'=>'stock_date'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('purchase_price','Price',['class'=>'control-label','title'=>'purchase_price'])}}
              <div class="controls">
              {{Form::text('purchase_price',$article_info->purchase_price,['id'=>'required','placeholder'=>'Price','title'=>'purchase_priced'])}}
              </div>
            </div>
            <div class="control-group">
            {{Form::label('available_status','Available Status',['class'=>'control-label','title'=>'available_status'])}}
              <div class="controls">
             {{Form::select('available_status',['Available'=>'Available','Not Available'=>'Not Available'])}}
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
      
          var w = window.open('/article_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
    

@stop