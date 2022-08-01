<!DOCTYPE html>
<html lang="en" >

<head>
        <title>University</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap-responsive.min.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/matrix-login.css')}}" />
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}" />
        <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <style>
            .form_vertical_wrapper,
            #loginbox form{
                background-color: #2760a1 !important;
            }
           /* input[type="submit"]{
                padding: 10px !important;
            } */
            .school_name_login{
                color: white;
            }
        </style>
  
    </head>
    <body style="background-color: rgb(18 58 114)">

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

        @if (session('applicant_id'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> {{ session('applicant_id') }}
            </div>
        @endif

        @if (session('email'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> {{ session('email') }}
            </div>
        @endif
       
       
        @if($errors->has('login_error'))
            <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Login Failed :)</strong> {{ $errors->first('login_error') }}
            </div>
        @endif


        

       



<div class="control-group normal_text text-center">
             {{-- <div class="alert alert-danger" style="width:auto">
                <h3 style="font-size:18px">অনলাইনে ক্লাস করতে অবশ্যই গুগল ক্রম ব্রাউজার ব্যবহার করুন। </h3>
            </div><br> --}}
    <img src="{{URL::asset('img/logo.png')}}" alt="Logo" height="60px" width="80px"/><br><br>
            
            <div class="school_name_login">{{Form::label($general_settings->system_name)}}</div>
        </div>
        <br>    


        <div id="loginbox">
            {{Form::open(['url'=>"/frontend/online-admission-student-admit-card-front" , 'method'=>'post','id'=>'loginform','class'=>'form_vertical_wrapper'])}}
                @csrf
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                           {{Form::text('applicant_id','',['placeholder'=>'Applicant ID','title'=>'Applicant ID','value'=>'old()','required' => 'true'])}}
                            {{-- <span class="text-danger">@error('applicant_id') --}}
                                
                            {{-- @enderror</span> --}}
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            {{Form::email('email','',['placeholder'=>'Applicant Email','title'=>'Email','required' => 'true'])}}
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>
                    </div>
                </div>


                 {{-- <div class="">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="hidden" name="user_type" value="Student">
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="form-actions "> --}}
                    {{-- <div class="controls"> --}}
                    {{-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> --}}
                        {{-- <span class="pt-3 pb-3"><input type="submit" value="Login" class="btn-success btn-block p-2"></span>
                    </div>
                      --}}
                {{-- </div> --}}

           {{Form::close()}}

           

           {{-- {{Form::open(['url'=>'/password/email','method'=>'post','id'=>'recoverform','class'=>'form-vertical'])}}
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
           {{Form::close()}} --}}
        </div>


        <script src="{{URL::asset('js/matrix.login.js')}}"></script>
         <script src="{{URL::asset('js/notify.js')}}"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
