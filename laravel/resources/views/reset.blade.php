<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Reset Password</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/matrix-login.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
        <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    </head>
    <body>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('status') }}
            </div>
        @endif


        @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> {{ $errors->first('email') }}
            </div>
       @endif

       @if ($errors->has('password'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> {{ $errors->first('password') }}
            </div>
        @endif


        @if($errors->has('password_confirmation'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> {{ $errors->first('password_confirmation') }}
            </div>
        @endif



        <div id="loginbox">  
      
        {{Form::open(['url'=>'/password/reset','method'=>'POST','id'=>'loginform','class'=>'form'])}}       
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="control-group normal_text text-center">
                <img src="{{URL::asset('img/HS LOGO.png')}}" alt="Logo" height="60px" width="80px"/><br><br>
               <div class="school_name_login ">{{$general_settings->system_name}}</div></div>
                 <br>   
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_lg"><i class="icon-user"> </i></span>{{Form::email('email','',['placeholder'=>'Your Email','id'=>'email' ,'required','autofocus'])}}
                            </div>
                        </div>
                 <br>
                    <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span>{{Form::password('password',['placeholder'=>'Your password','id'=>'password' ,'required'])}}
                            </div>
                        </div>
                    </div>
                   <div class="control-group">
                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-lock"></i></span>{{Form::password('password_confirmation',['placeholder'=>'confiram password','id'=>'password' ,'required'])}}
                            </div>
                        </div>
                    </div>
    				 <div class="col-sm-12 text-center">
    				  <input name="info_submit" type="submit" class="btn btn-primary" value="Reset Password">
    				
           
                </div>
           </div>
            {{Form::close()}}
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>  
        <script src="{{URL::asset('js/matrix.login.js')}}"></script> 
    </body>

</html>


