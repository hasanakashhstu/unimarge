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
  <i class="fa fa-pencil-square" aria-hidden="true"></i> &nbsp;Book Accession
  </h2> 
  <!-- Tab Heading  -->
  <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Book Accession details
  </p><br/>


<div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
            <li><a href='/stock_article'><i class="fa fa-archive" aria-hidden="true"></i> &nbsp;Stock Article</a></li>
            <li><a href='/article'><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Manage Article</a></li>
            <li><a href='/notice_board'><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;NoticeBoard</a></li>
         </ul>
      </div>
    </div>
</div>
  <!-- Transport Details -->
  <div class="panel panel-default text-right" >
    <div class="panel-body">
      <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">
        <li>
          <a href='#'>
              <i class="fa fa-plus" aria-hidden="true"></i> Book Accession
          </a>
        </li>
      </ul>
    </div>
  </div><br/>


<div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/templete_article_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/templete_article_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/templete_article_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>




  <div class="tab-content">
    <!--new add form-->
    <div class="modal fade" id="myModal" role="dialog" style="    margin-left: -5%;">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
         
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
      
             <h5> <i class="icon-info-sign"></i> Add New Book Info</h5>
         
          </div>
          <div class="modal-body">
            <div class="widget-content padding">
            {{Form::open(['url'=>'/templet_article','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}

                <div class="control-group">
                 {{Form::label('article_name','Title',['class'=>'control-label','title'=>'article_name'])}}
                  <div class="controls">
                    {{Form::text('article_name','',['id'=>'required','placeholder'=>'Article Name','title'=>'article_name'])}}
                  </div>
                </div>

                <div class="control-group">
                {{Form::label('author','Author',['class'=>'control-label','title'=>'Author'])}}
                  <div class="controls">
                  
                   {{Form::text('author','',['id'=>'required','placeholder'=>'Author','title'=>'Author'])}}
                  </div>
                </div>
                <div class="control-group">
                 {{Form::label('publisher','Publisher',['class'=>'control-label','title'=>'publisher'])}}
                  <div class="controls">
                    {{Form::text('publisher','',['id'=>'required','placeholder'=>'Publisher','title'=>'publisher'])}}
                  </div>
                </div>

                <div class="control-group">
                 {{Form::label('edition','Edition',['class'=>'control-label','title'=>'Edition'])}}
                  <div class="controls">
                     {{Form::text('edition','',['id'=>'required','placeholder'=>'Edition','title'=>'Edition'])}}
                  </div>
                </div>

                <div class="control-group">
                 {{Form::label('language','Language',['class'=>'control-label','title'=>'language'])}}
                  <div class="controls">
                     {{Form::text('language','',['id'=>'required','placeholder'=>'Language','title'=>'language'])}}
                  </div>
                </div>

                 <div class="control-group">
                 {{Form::label('call_no','Call No',['class'=>'control-label','title'=>'Call No'])}}
                  <div class="controls">
                     {{Form::text('call_no','',['id'=>'required','placeholder'=>'Call No','title'=>'Call No'])}}
                  </div>
                </div>


                <div class="control-group">
                {{Form::label('isbn','ISBN',['class'=>'control-label','title'=>'isbn'])}}
                  <div class="controls">
                     {{Form::text('isbn','N/A',['id'=>'required','placeholder'=>'Accession No','title'=>'isbn','class'=>'isbn'])}}
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
  </div>
  <!--end of the new add form-->
  <!-- Transport List Report  -->
  <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Book Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Book Name</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Edition</th>
              <th>Language</th>
              <th>Call No</th>
              <th>Isbn No</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
             @foreach($templet_article_data as $templet_article_information)
            <tr class="gradeX">
              <td>{{$templet_article_information->article_name}}</td>
              <td>{{$templet_article_information->author}}</td>
              <td>{{$templet_article_information->publisher}}</td>
              <td>{{$templet_article_information->edition}}</td>
              <td>{{$templet_article_information->language}}</td>
              <td>{{$templet_article_information->call_no}}</td>
              <td>{{$templet_article_information->isbn}}</td>
              
                 <td id="my_align" class="display_status">
           
                        {{Form::open(['url'=>"/templet_article/$templet_article_information->templet_id/edit",'method'=>'GET'])}}
                        {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                        {{Form::close()}}
                        {{Form::open(['url'=>"/templet_article/$templet_article_information->templet_id" ,'method'=>'DELETE'])}}
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
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 <script type="text/javascript">
 $(document).ready(function()
 {
    $("#print").click(function()
     {
      
          var w = window.open('/templete_article_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });

    $(".isbn").keyup(function(){
         var isbn_no=$(this).val();
         console.log(isbn_no);
         $.ajax({
            url:'/check_isbn_no',
            type:"POST",
            data:{'isbn_no':parseInt(isbn_no),'_token':"{{csrf_token()}}"},
            success:function(response){
              if(response=="Found")
              {
                $(".isbn").val(' ');
                toastr.error('Sorry! Accession No Already Exists');
              }
            }
         });
    });
});

 </script>
    
@stop
