<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>ABC University</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/base.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/skeleton.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/style.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/meganizr.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/flaticon.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/css/style(1).css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/responsiveslides.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}">
    <link type="text/css" rel="stylesheet" media="all" href="{{asset('website/custom_style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/normalize.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <script type="text/javascript" src="{{asset('website/js/jquery-1.11.1.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{asset('website/js/responsiveslides.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easy-ticker/2.0.0/jquery.easy-ticker.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>              
</head>

<body class="bteb-portal-gov-bd">
    <div  id="app">
        <div class="container" style="width: min-content; padding: 0px 43px 0px 43px; background: #fff;border-radius: 10px">

            @include('website.slider')
            @include('website.navbar')

            <div class="row" style="margin-bottom: 0px;">
                <div id="contents" class="col-lg-12 sixteen columns"  style="margin-bottom: 0px;">
                    <div class="row">

                        @yield('website_main_section')
                        @include('website.right_content')

                    </div>
                    <div class="row">
                        @if(isset($event))
                        <div class="col-lg-12">
                            <div class="row">
                                <h2 style="margin: 10px 0px 0px 10px !important;">Gallery</h2>
                                <div class="carousel slide" id="myCarousel">
                                  <div class="carousel-inner">
                                   
                                    @foreach($event as $key => $value)
                                    <div class="item @if($key == 0) active @endif">
                                      <div class="col-xs-3"><a href="#"><img src="{{$value->image}}" class="img-responsive"></a></div>
                                    </div>
                                    @endforeach
                                   
                                  </div>
                                  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left" style="display: none;"></i></a>
                                  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right" style="display: none;"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif

                        @php
                            $count_dept = collect($manage_department)->groupBy('department_code')->unique()->count();

                            $count_teacher = collect($teacher_view_share)->where('status','Teacher')->count();
                            $count_staff = collect($teacher_view_share)->where('status','Staff')->count();
                       
                        @endphp

                        <div class="col-lg-12" style="padding: 0px;background: crimson;height: 76px;margin-bottom: 2%">
                            <table style="width: 100%;font-size: 28px;font-weight: bold;margin-bottom: 5%;margin-top: 1%;color: #fff;margin-left: 2%">
                                <tr>
                                    <td><i class="fas fa-book"></i> <span class="counter">{{$count_dept}}</span> Departments</td>
                                    <td><i class="fas fa-user"></i>  <span class="counter">{{$count_teacher}}</span> Teachers</td>
                                    <td><i class="fas fa-users"></i> <span class="counter">{{$count_staff}}</span> Staff</td>
                                    <!--<td><i class="fas fa-graduation-cap"></i> <span class="counter">{{$count_student}}</span> Students</td>-->
                                </tr>
                            </table>
                        </div>


                        <script>
                            jQuery(document).ready(function($) {
                                $('.counter').counterUp({
                                    delay: 10,
                                    time: 1000
                                });
                            });
                        </script>
            
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-artwork" id="footer-artwork">&nbsp;</div>
        
        @include('website.footer')
         <div class="container">
            <div class="col-lg-12" style="text-align: center;">Copyright © VIEWSOFT & Developed By : Viewsoft.</div>
        </div>

    </div>
<script type="text/javascript">
    $('#myCarousel').carousel({
      interval: 4000
    })

    $('.carousel .item').each(function(){
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
      
      for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        
        next.children(':first-child').clone().appendTo($(this));
      }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#gallery_image').magnificPopup({
        delegate: 'a',
        type: 'image',
        image: {
            //cursor: null,
            titleSrc: 'title'
        },
        gallery: {
            enabled: true,
            preload: [0,1], // Will preload 0 - before current, and 1 after the current image
            navigateByImgClick: true
        }
      });
    });
</script>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
    <script>
        $(function() {
            $("#front-image-slider").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 2000,
                maxwidth: 960,
                namespace: "callbacks"
            });
            $("#right-content a").click(function() {
                var url = $(this).attr('href');
                if (isExternal(url) && url != 'javascript:;') {
                    openInNewTab(url);
                    return false;
                }
            });
        });

        function openInNewTab(url) {
            var win = window.open(url, '_blank');
            win.focus();
        }

        function isExternal(url) {
            var match = url.match(/^([^:\/?#]+:)?(?:\/\/([^\/?#]*))?([^?#]+)?(\?[^#]*)?(#.*)?/);
            if (typeof match[1] === "string" && match[1].length > 0 && match[1].toLowerCase() !== location.protocol)
                return true;
            if (typeof match[2] === "string" && match[2].length > 0 && match[2].replace(new RegExp(":(" + {
                    "http:": 80,
                    "https:": 443
                }[location.protocol] + ")?$"), "") !== location.host)
                return true;
            return false;
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".slide-panel-button").click(function() {
                $('#domain-selector-panel').toggle() //animate({height: "toggle"}, 200);
                if ($('#domain-selector-panel').is(":visible")) {
                    $('#div-lang').css('z-index', '200');
                } else {
                    $('#div-lang').css('z-index', '1001');
                }
                $(".slide-panel-button").toggle();
            });

        });
    </script>

</body>

</html>