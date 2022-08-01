@extends('website.index')
@section('website_main_section')

<div class="col-lg-8 twelve columns" id="left-content">
       
   <div class="row mainwrapper">
       <div class="col-lg-12">
           @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><i class="fa fa-commenting-o" aria-hidden="true"></i> &nbsp; Success!</strong> {{ Session::get('success') }}
                </div>
               
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade in">
                  <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul  style='list-style:none'>
                        @foreach ($errors->all() as $error)
                            <li><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
       </div>
       <div class="col-lg-5">
            <br>
            <center>
                <img style="width: 120px;" src="{{asset('img/logo.png')}}">
            </center>
            <br>
           <ul style="list-style: none; color: rgb(0, 0, 0);">
                <li><span>{{$general_settings->system_name}}</span></li>
                <br>
                <li><span>Phone : </span><p>{{$general_settings->Phone}}</p></li> 
                <li><span>Address : </span><p>{{$general_settings->address}}</p></li>
           </ul>
       </div>
       <div class="col-lg-7">
        <!-- {{Form::open(['url'=>'/frontend/contact_message','class'=>'form-horizontal','method'=>'post'])}} -->
         <!--   <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="name" class="form-control" name="name" id="name" placeholder="Name" style="width: 95%">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="phone" class="form-control" name="phone" id="phone" placeholder="Phone" style="width: 95%">
                    </div>
                </div>
           </div>
           <div class="row">
               <div class="col-lg-12">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" style="width: 98%">
                    </div>
                </div>
           </div>
           <div class="row">
               <div class="col-lg-12">
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Message" style="width: 98%"></textarea>
                    </div>
                </div>
           </div>
           <div class="row">
               <button class="btn btn-primary">Sent Message</button>
           </div>

           {{Form::close()}} -->
       </div>
       <div class="col-lg-12">
           <br>
           <br>
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.0332300399564!2d90.47018651433845!3d23.241877813929783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375505a119847cab%3A0xcf8973eae6c1b242!2sZ.%20H.%20Sikder%20University%20of%20Science%20%26%20Technology!5e0!3m2!1sen!2sbd!4v1612117038338!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
           <!-- <iframe width="100%" height="300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115860.91172982461!2d89.30016571213251!3d24.84152086391454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fc54e7e81df441%3A0x27133ed921fe73f4!2sBogra!5e0!3m2!1sen!2sbd!4v1542267344194" frameborder="0" allowfullscreen="allowfullscreen"></iframe> -->
       </div>
   </div>     
         
</div>

@stop