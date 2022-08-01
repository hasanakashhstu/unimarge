<html lang="en" xmlns="https://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- App Title -->
    <title>Z.H. Sikder University of Science and Technology</title>

    <link rel=icon href="{{asset('/assets/uploads/images/logo/maan-lms-icon.png')}}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <!-- vendor -->
    <link rel="stylesheet" href="{{asset('/assets/frontend/assets/css/vendor.css')}}">

    <link rel="stylesheet" href="{{asset('/assets/frontend/assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('/assets/frontend/assets/css/responsive.css')}}">
    <style>
        .thumb {
            background-image: url({{asset('/assets/frontend/assets/img/banner/3.png')}});
        }

        .course-area {
            background-image: url({{asset('/assets/frontend/assets/img/bg/2.png')}});
        }

        .video-area {
            background-image: url({{asset('/assets/images/about-bg-2.jpg')}});
        }

        .jarallax {
            background-image: url({{asset('/assets/images/about-bg-2.jpg')}});
        }

        .footer-area {
            background-image: url({{asset('/assets/frontend/assets/img/other/1.png')}});
        }

        .page-title-area {
            background-image: url({{asset('/assets/frontend/assets/img/bg/3.png)')}});
        }

        .banner-area {
            background-image: url({{asset('/assets/frontend/assets/img/banner/2.png')}});
        }
    </style>
</head>
<body class="bteb-portal-gov-bd">



<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->
<div class="body-overlay" id="body-overlay"></div>

<div class="navbar-area">
    @include('website.header_part')
{{--    <marquee width="100%" direction="left" height="30px" style="color: red; font-size: 20px; line-height:30px;margin-top: 21px;"> The website is under development. In case of emergencies,--}}
{{--        please contact on +8801313760750</marquee>--}}
    @yield('website_main_section')
    @include('website.footer_part')
</div>




{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="{{asset('/assets/frontend/assets/js/vendor.js')}}"></script>
<!-- main js  -->
<script src="{{asset('/assets/frontend/assets/js/main.js')}}"></script>

</body>

</html>