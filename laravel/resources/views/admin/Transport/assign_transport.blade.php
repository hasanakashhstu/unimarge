@extends('admin.index')
@section('Title','Assign Transport')
@section('breadcrumbs','Assign Trasport')
@section('breadcrumbs_link','/assign_transport')
@section('breadcrumbs_title','assign_transport')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
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
      <h2><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Assign Transport</h2> <!-- Tab Heading  -->
    <p title="Transport Details">{{Session::get('school.system_name')}}( {{Session::get('school.school_eiin')}} ) Assign Transport</p><br/><!-- Transport Details -->
    <div class='row'>
     <div class="panel panel-default" >
      <div class="panel-body text-left">
         <ul class='dropdown_test'> 
            <li><a href='/home'><i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;Home</a></li>
               <li><a href='/route'><i class="fa fa-road" aria-hidden="true"></i>&nbsp; Route</a></li>
            <li><a href='/manage_transport'><i class="fa fa-bus" aria-hidden="true" ></i> &nbsp; Manage Transport</a></li>
            <li><a href='notice_board'><i class="fa fa-list-alt" aria-hidden="true" ></i> &nbsp; NoticeBoard</a></li>
         </ul>
      </div>
    </div>
    </div>

  <div class="panel panel-default text-right" >
      <div class="panel-body">
         <ul class='dropdown_test' data-toggle="modal" data-target="#myModal">

            <li><a href='#'><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Assign New</a></li>

        </ul>
      </div>
    </div><br/>
   <div class='row'>
  <div class="controls text-right">
            <div data-toggle="buttons-checkbox" class="btn-group">
              <button  class="btn btn-default" title='Export PDF' type="button"><a target="_blank" href="/assign_transport_pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></button>
              <button class="btn btn-default" title='Export Excel' type="button"><a  href="/assign_transport_excle"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></button>
              
              <button class="btn btn-default" title='Preview' ttype="button"><a target="_blank" href="/assign_transport_pdf"><i class="fa fa-street-view" aria-hidden="true"></i></a></button>
              <button id='print' class="btn btn-default" title='Print' type="button"><i class="fa fa-print" aria-hidden="true"></i></button>
            </div>
    </div>
</div>

    <div class="tab-content">

      <!--new add form-->
      <div class="modal fade" id="myModal" role="dialog" style="margin-left:-79px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-car" aria-hidden="true"></i>&nbsp;Assign New </h4>
      </div>
      <div class="modal-body">
        <div class="widget-content padding">
          {{Form::open(['url'=>'/assign_transport','class'=>'form-horizontal','method'=>'post','files'=>true,'name'=>'basic_validate','id'=>'basic_validate','novalidate'=>'novalidate'])}}
           <div class="control-group" hidden>
            {{Form::label('hidden_field','Hidden',['class'=>'control-label','title'=>'hidden_field'])}}
                <div class="controls">
                  {{Form::text('transport_id',time(),['id'=>'required','hidden'=>'hidden','title'=>'transport_id'])}}
               
                </div>
            </div>
            <div class="control-group">
             {{Form::label('route_name','Route Name',['class'=>'control-label','title'=>'route_name'])}}
              <div class="controls">
                @php $route_name_data['']="" @endphp
               @foreach($route_info as $route_name_list) 
                @php 
                 $route_name_data[$route_name_list->name]=$route_name_list->name
                @endphp 
               @endforeach
              {{Form::select('route_name',$route_name_data,null,['id'=>'route_name'])}}

              </div>
            </div>
            <div class="control-group">
              {{Form::label('name_of_transport','Transport Name',['class'=>'control-label','title'=>'name_of_transport'])}}
              <div class="controls">
              @php
                $transport_name_data=['--select--'=>'--select--'];
              @endphp
               @foreach($manage_transport_info as $manage_transport_list) 
                @php 
                 $transport_name_data[$manage_transport_list->name_of_transport]=$manage_transport_list->name_of_transport
                @endphp 
               @endforeach
              {{Form::select('name_transport',$transport_name_data,null,['id'=>'name_transport'])}}
                
              </div>
            </div>
            <div class="control-group">
              {{Form::label('transport_color','Transport Color',['class'=>'control-label','title'=>'transport_color'])}}
              <div class="controls">
                {{Form::text('transport_color','',['id'=>'transport_color','placeholder'=>'Transport Color','title'=>'transport_color'])}}
              </div>
            </div>
            <div class="control-group">
               {{Form::label('number_of_transport',' Transport Number',['class'=>'control-label','title'=>'number_of_transport'])}}
              <div class="controls">
                 {{Form::text('number_of_transport','',['id'=>'number_of_transport','placeholder'=>'Number Of Transport','title'=>'number_of_transport'])}}
              </div>
            </div>
            <div class="control-group">
               {{Form::label('student_roll','Student Roll No',['class'=>'control-label','title'=>'student_roll'])}}
              <div class="controls">
                        {{Form::text('student_roll','',['id'=>'required','placeholder'=>'Student Roll No','title'=>'student_roll'])}}
              </div>
            </div>
            <div class="control-group">
               {{Form::label('route_fare','Route Fare',['class'=>'control-label','title'=>'route_fare'])}}
              <div class="controls">
              {{Form::text('route_fare','',['id'=>'route_fare','placeholder'=>'Route Fare'])}}
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          {{Form::submit('submit',['value'=>'Submit','class'=>'btn btn-success','style'=>'float:left'])}}
            {{Form::button('Close',['class'=>'btn btn-default','data-dismiss'=>'modal'])}}
      </div>
    </div>
      {{Form::close()}}
  </div>
</div>

</div>



      <!--end of the new add form-->

      <!-- Transport List Report  -->

          <div id="home" class="tab-pane fade in active">
              <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Transport Data table</h5>
                  </div>

              <div class="widget-content nopadding">
                <table class="table table-bordered data-table">

                    <thead>
                      <tr>
                        <th>Route Name</th>
                        <th>Name of Transport</th>
                        <th>Transport Color</th>
                       <th>Transport Number</th>
                       <th>Student Roll No</th>
                       <th>Route Fare</th>   
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($assign_transport as $assign_transport_information)
                      <tr class="gradeX">
                        <td>{{$assign_transport_information->route_name}}</td>
                       <td>{{$assign_transport_information->name_transport}}</td>
                         <td>{{$assign_transport_information->transport_color}}</td>
                        <td>{{$assign_transport_information->number_of_transport}}</td>
                        <td>{{$assign_transport_information->student_roll}}</td>
                        <td>{{$assign_transport_information->route_fare}}</td>
                        
                         <td id="my_align" class="display_status">                     
                       {{Form::open(['url'=>"/assign_transport/$assign_transport_information->transport_id/edit",'method'=>'GET'])}}
                       {{Form::submit('Edit',['class'=>'btn btn-primary'])}} 
                       {{Form::close()}}
                       {{Form::open(['url'=>"/assign_transport/$assign_transport_information->transport_id",'method'=>'DELETE','onclick'=>"return confirm('Are you sure you want to Remove ?')"])}}
                       {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
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
      
          var w = window.open('/assign_transport_pdf');

          w.onload = function()
          {
              w.print();
          };
      
    });
});

 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#route_name").unbind().change(function()
     {
          
         var route_name=$("#route_name").val();
         
         $.ajax({
            url: '/route_wise_data',
            type: "post",
            data: {'route_name':route_name,'_token': $('input[name=_token]').val()},
            success: function(data){
              $("#route_fare").val(data.fare);
             
            }
          });
    });
       
       
  
});
</script>
<script type="text/javascript">

   $(document).ready(function()
   {
    
    $("#name_transport").unbind().change(function()
     {
          
         var name_transport=$("#name_transport").val();
         
         $.ajax({
            url: '/transport_wise_data',
            type: "post",
            data: {'name_transport':name_transport,'_token': $('input[name=_token]').val()},
            success: function(data){
              $("#transport_color").val(data.transport_color);
              $("#number_of_transport").val(data.number_of_transport);
            }
          });
    });
       
       
  
});
</script>
@stop