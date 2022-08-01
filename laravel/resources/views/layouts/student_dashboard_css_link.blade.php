<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE HTML>
 <html>
   <head>
    <title>@yield('dashboard_title')</title>
       <style type="text/css">
           .align{
               color: black;
           }
           .li{
               margin: 0px 21px;
               margin-top: 11px;
               height: 70px;
               padding: 10px;
           }
           a:link {
               text-decoration: none;
           }
           ul li:hover{
               background-color: #009EE8;
           }
       </style>
       @yield('zoom_css')
   </head>
 <body style="background-color:#ecf0f1;">
   <div class="container">
