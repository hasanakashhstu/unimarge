@extends('admin.index')
@section('Title','templete_article')
@section('breadcrumbs','templet_article')
@section('breadcrumbs_link','/templet_article')
@section('breadcrumbs_title','templet_article')
@section('content')
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
    <i class="fa fa-check-square-o" aria-hidden="true"></i> &nbsp;Edit Book Accession Detail's
  </h2>
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Edit Book Accession details
  </p>
  <!-- Transport Details -->

<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i> &nbsp; Manage Book</a></li>
            <li><a href='/membership'> <i class="fa fa-user-plus" aria-hidden="true"></i></i>&nbsp;Membership</a></li>
            <li><a href='/article_issue'><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Book Issue</a></li>
             <li><a href='/templet_article'>&nbsp;<i class="fa fa-backward" aria-hidden="true"></i></a></li>
         </ul>
      </div>
    </div>



  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/parents_report_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/parents_report_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/parents_report_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
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
      <h5>{{$templet_article_data->article_name}} Data Table
      </h5>
    </div>
    <div class="widget-content nopadding">
     {{Form::open(['url'=>"/templet_article/$templet_article_data->templet_id",'class'=>'form-horizontal','method'=>'put','name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                <div class="control-group">
                 {{Form::label('article_name','Title',['class'=>'control-label','title'=>'article_name'])}}
                  <div class="controls">
                    {{Form::text('article_name',$templet_article_data->article_name,['id'=>'required','placeholder'=>'Article Name','title'=>'article_name'])}}
                  </div>
                </div>
                <div class="control-group">
                {{Form::label('author','Author',['class'=>'control-label','title'=>'author'])}}

                <div class="controls">
                                   
                  {{Form::text('author',$templet_article_data->author,null,['id'=>'author'])}}
                  </div>


                  </div>

                <div class="control-group">
                 {{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
                  <div class="controls">
                    {{Form::text('publisher',$templet_article_data->publisher,['id'=>'required','placeholder'=>'Publisher','title'=>'publisher'])}}
                  </div>
                </div>

                <div class="control-group">
                 {{Form::label('edition','Edition',['class'=>'control-label','title'=>'Edition'])}}
                  <div class="controls">
                     {{Form::text('edition',$templet_article_data->edition,['id'=>'required','placeholder'=>'Edition','title'=>'Edition'])}}
                  </div>
                </div>

                <div class="control-group">
                 {{Form::label('language','Language',['class'=>'control-label','title'=>'language'])}}
                  <div class="controls">
                     {{Form::text('language',$templet_article_data->language,['id'=>'required','placeholder'=>'Language','title'=>'language'])}}
                  </div>
                </div>

                <div class="control-group">
                 {{Form::label('call_no','Call No',['class'=>'control-label','title'=>'Call No'])}}
                  <div class="controls">
                     {{Form::text('call_no',$templet_article_data->call_no,['id'=>'required','placeholder'=>'Call No','title'=>'Call No'])}}
                  </div>
                </div>

                <div class="control-group">
                {{Form::label('isbn','ISBN',['class'=>'control-label','title'=>'isbn'])}}
                  <div class="controls">
                     {{Form::text('isbn',$templet_article_data->isbn,['id'=>'required','placeholder'=>'ISBN','title'=>'isbn'])}}
                  </div>
                </div>
           
           
          <div class="modal-footer">
             {{Form::submit('Submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left;'])}}
            {{Form::close()}}
          </div>
           </div>
          </div>
  </div>
</div>


@stop