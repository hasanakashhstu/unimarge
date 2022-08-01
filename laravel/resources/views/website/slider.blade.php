<div class="row" style="margin-bottom: 0px;">
        <div class="sixteen columns co-lg-12" style="background-color: #428dc9; box-shadow: 0 1px 5px #999999;height: 26px;">
            <div>
                <div class="slide-panel-btns" style="width: 165px;float: left;">
                    <div class="slide-panel-button" style="display: block;">
                        <a href="#" target="_blank" title="{{$general_settings->system_name}}"></a>
                    </div>
                </div>
                <div id="div-lang" style="float:right;">
                <div id="newNavigation"></div>
                <div id="div-lang-sel" style="float: right">
                        
                    <div id="search_any" style="float: left"></div>

                    <div style="float: right; margin: 2px; font-size: 12px; line-height: 0px" class="top_bar">
                        <ul style="display: inline-flex;">
                            <li>
                                <a href="/student">Student Portal |</a>
                            </li>
                            <li>
                                <a href="/teacher">Teacher Portal |</a>
                            </li>
                            <li>
                                <a href="/frontend/result">Result</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="co-lg-12 sixteen columns">
            <div class="callbacks_container" style="box-shadow: 0 1px 5px #999999;">
                <ul class="rslides callbacks callbacks1" id="front-image-slider" style="max-width: 960px;">
                    
                    @foreach($fixed_slider as $key => $slider_value)
                    <li id="callbacks1_s{{$key}}" class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 2000ms ease-in-out 0s;">

                        <img src="{{asset($slider_value->image)}}" title="{{$slider_value->title}}" alt="Baner1" width="960" height="220" style="height: 300px;">

                    </li>
                    @endforeach
                    <!-- <li id="callbacks1_s1" style="float: left; position: relative; opacity: 1; z-index: 2; display: list-item; transition: opacity 2000ms ease-in-out 0s;" class="callbacks1_on">

                        <img src="{{asset('website/index_files/Kormoshala1.jpg')}}" alt="Kormoshala1" width="960" height="220">

                    </li>
                    <li id="callbacks1_s2" style="float: none; position: absolute; opacity: 0; z-index: 1; display: list-item; transition: opacity 2000ms ease-in-out 0s;" class="">

                        <img src="{{asset('website/index_files/APA.jpg')}}" alt="APA" width="960" height="220">

                    </li> -->
                </ul><a href="#" class="callbacks_nav callbacks1_nav prev">Previous</a><a href="http://bteb.portal.gov.bd/#" class="callbacks_nav callbacks1_nav next">Next</a>
            </div>

            <div class="header-site-info" id="header-site-info">
              
                    <div id="logo">
                        <a href="/frontend">
                            <img alt="logo" src="{{asset('img/logo.png')}}">
                        </a>
                    </div>
                    <div class="clearfix" id="site-name-wrapper">
                        <span id="site-name"> 
                            <a title="{{$general_settings->system_name}}" href="#">{{$general_settings->system_name}}</a>
                        </span>
                        <span id="slogan">{{$general_settings->address}}</span>
                    </div>
               
                <!-- /header-site-info-inner -->
            </div>
        </div>
    </div>