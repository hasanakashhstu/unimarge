<!DOCTYPE html>
<html lang="en">

<head>
        <title>SchoolManagment Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/matrix-login.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
        <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
       
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  
    </head>
    <body>

        @if ($errors->has('email'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong> {{ $errors->first('email') }}
            </div>
        @endif
       

       @if (session('status'))
            <div class="alert alert-success alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ session('status') }}
            </div>
        @endif
       
        @if($errors->has('login_error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Login Failed :)</strong> {{ $errors->first('login_error') }}
            </div>
        @endif

<div class="control-group normal_text text-center"><img src="{{URL::asset('img/logo.png')}}" alt="Logo" height="60px" width="80px"/><br><br>
            
            <div class="school_name_login">{{Form::label($general_settings->system_name)}}</div>
        </div>
        <br>    


        <div id="loginbox">
            {{Form::open(['url'=>"/auth_check" , 'method'=>'post','id'=>'loginform','class'=>'form-vertical'])}}
                
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>{{Form::text('user_name','',['placeholder'=>'User Name','title'=>'user_name'])}}
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>{{Form::password('passsword',['placeholder'=>'Password','title'=>'password'])}}
                        </div>
                    </div>
                </div>


                 <div class="">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="hidden" name="user_type" value="Parent">
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" value="Login" class="btn-success"></span>
                
                     
                </div>

           {{Form::close()}}

           {{Form::open(['url'=>'/password/email','method'=>'post','id'=>'recoverform','class'=>'form-vertical'])}}
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span>{{Form::email('email','',['placeholder'=>'E mail Address','title'=>'email'])}}
                        </div>
                        
                    </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type='submit' value="Forgot" class='btn-info'>
                </div>
           <!--  </form> -->
           {{Form::close()}}
        </div>


        <script src="{{URL::asset('js/matrix.login.js')}}"></script>
         <script src="{{URL::asset('js/notify.js')}}"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
