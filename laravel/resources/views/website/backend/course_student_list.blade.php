@extends('admin.index')
@section('Title','Course Student List')
@section('breadcrumbs','Course Student List')
@section('breadcrumbs_link','/create_admin')
@section('breadcrumbs_title','create_admin')

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('success') }}
    </div>
   
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Wrong!</strong> <?php echo Session::get('error') ?>
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
    <h2><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Course Student List</h2> <!-- Tab Heading  -->
    <p title="Transport Details">@if (Session::has('school')) {{Session::get('school.system_name')}}  @endif Course Student List</p> <!-- Transport Details -->





<!-- <div class='row'>
    <div class="controls text-right">
      <div data-toggle="buttons-checkbox" class="btn-group">
        <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
        <button class="btn btn-default" title='Export Excel' type="button"><a  href="/create_admin_Excel_report"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
        <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/create_admin_pdf_report"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
        
        <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
      </div>
    </div>
</div> -->



<!-- Transport List Report  -->

         <div id="home" class="tab-pane fade in active">
             <div class="widget-box">
                 <div class="widget-title">
                   <span class="icon"><i class="icon-th"></i></span>
                   <h5>Data Table</h5>
                 </div>

             <div class="widget-content nopadding">
               <table class="table table-bordered data-table font_my">

                   <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course Title</th>
                        <th>Father Name</th>
                        <th>Phone</th>
                        <th>Image</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach($data as $key => $value)
                    <tr class="gradeX">
                       <td>{{$key+1}}</td>
                       <td>{{$value->name}}</td>
                       <td>{{$value->title}}</td>
                       <td>{{$value->father_name}}</td>
                       <td>{{$value->phone}}</td>
                       <td>
                          <img style="width: 50px;" src="{{asset($value->image)}}">
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

@push('custom-scripts')
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0])
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
@endpush
@stop
