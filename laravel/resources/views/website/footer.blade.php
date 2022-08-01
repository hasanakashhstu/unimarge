<div class="footer-wrapper full-width" id="footer-wrapper">
        <div class="row">
            <div class="col-lg-4 col-xs-4 col-sm-4 col-xs-4 footer_description">
                <img style="width: 120px;" src="{{asset('img/logo.png')}}">
                <p>{{$general_settings->system_name}}</p>
                <br>

                <p><i class="fas fa-map-maker"></i>&nbsp;{{$general_settings->address}}</p>
                <p><i class="fas fa-phone"></i>&nbsp;{{$general_settings->Phone}}</p>
                <ul class="footer_social">
                    <li>
                        <a href="https://web.facebook.com/tisibogra/?_rdc=1&_rdr" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-xs-4">
                <h3>TECHNOLOGY</h3>
                @php
                    $footer_dept = collect($manage_department)->unique('department_code');
                @endphp
                <ul>
                    @foreach($footer_dept as $value)
                    <li>{{$value['department_name']}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-xs-4">
                <iframe class="footer_map" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftisibogra%2F&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=287260618344437" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
            </div>
        </div>
    </div>

   