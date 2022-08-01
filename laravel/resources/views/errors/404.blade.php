<html lang="en" xmlns="https://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- App Title -->
    <title>Z.H. Sikder University of Science and Technology</title>

    <link rel=icon href="{{ asset('/assets/uploads/images/logo/maan-lms-icon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <!-- vendor -->
    <link rel="stylesheet" href="{{ asset('/assets/frontend/assets/css/vendor.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/frontend/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/frontend/assets/css/responsive.css') }}">
    <style>
        @yield('online_apply_css') .thumb {
            background-image: url({{ asset('/assets/frontend/assets/img/banner/3.png') }});
        }

        .course-area {
            background-image: url({{ asset('/assets/frontend/assets/img/bg/2.png') }});
        }

        .video-area {
            background-image: url({{ asset('/assets/images/about-bg-2.jpg') }});
        }

        .jarallax {
            background-image: url({{ asset('/assets/images/about-bg-2.jpg') }});
        }

        .footer-area {
            background-image: url({{ asset('/assets/frontend/assets/img/other/1.png') }});
        }

        .page-title-area {
            background-image: url({{ asset('/assets/frontend/assets/img/bg/3.png)') }});
        }

        .banner-area {
            background-image: url({{ asset('/assets/frontend/assets/img/banner/2.png') }});
        }

    </style>
</head>

<body>


    <div class="container mt-5 mb-5 text-center" style="padding-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5 class="mb-5">Error 404</h5>
                    </div>
                    <div class="widget-content">
                        <div class="error_ex">
                            <h3 class="mb-5">Opps, You're lost.</h3>
                            <p class="mb-5">Access to this page is forbidden</p>
                            <a class="btn btn-warning btn-big mb-5" href="/">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script src="{{ asset('/assets/frontend/assets/js/vendor.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('/assets/frontend/assets/js/main.js') }}"></script>

</body>

</html>
