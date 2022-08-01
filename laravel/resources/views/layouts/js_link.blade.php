<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('js/matrix.js') }}"></script>
<script src="{{ URL::asset('js/matrix.tables.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/chart.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.ui.custom.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-colorpicker.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('js/masked.js') }}"></script>
<script src="{{ URL::asset('js/jquery.uniform.js') }}"></script>
<script src="{{ URL::asset('js/matrix.form_common.js') }}"></script>
<script src="{{ URL::asset('js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{URL::asset('Beta/js/select2.min.js')}}"></script> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('script')

<script type="text/javascript">
    var url = window.location.pathname;
    path = unescape(url);
    var target = $('li.submenu ul li a[href$="' + path + '"]');
    target.parent().addClass("active open");
    target.parent().parent().css("display", "block");
    target.parent().parent().parent().addClass('active');
    var top_menu = $('.header a[href$="' + path + '"]');


    $('#sidebar > ul').animate({
        scrollTop: $(target.parent().parent().parent()).offset().top - 160
    }, 100);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>






<!--
<script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('js/matrix.js') }}"></script>

<script src="{{ URL::asset('js/matrix.tables.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/chart.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.min.js') }}"></script> -->




<script>
    $('.textarea_editor').wysihtml5();
</script>

<!--
<script src="Beta/js/bootstrap-colorpicker.js"></script>
<script src="Beta/js/bootstrap-datepicker.js"></script>
<script src="Beta/js/jquery.toggle.buttons.js"></script>
<script src="Beta/js/masked.js"></script>
<script src="Beta/js/jquery.uniform.js"></script>
<script src="Beta/js/select2.min.js"></script>

<script src="Beta/js/matrix.form_common.js"></script>
<script src="Beta/js/wysihtml5-0.3.0.js"></script>
<script src="Beta/js/jquery.peity.min.js"></script>
<script src="Beta/js/bootstrap-wysihtml5.js"></script>  -->
<!-- <script src="Beta/js/bootstrap.min.js"></script>
<script src="Beta/js/matrix.js"></script>  -->


<!--
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- <script src="{{ URL::asset('js/jquery.ui.custom.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.flot.resize.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.peity.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/excanvas.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/matrix.dashboard.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.gritter.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/matrix.interface.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/matrix.chat.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.validate.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/matrix.form_validation.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.wizard.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/jquery.uniform.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/select2.min.js') }}"></script> -->
<!-- <script src="{{ URL::asset('js/matrix.popover.js') }}"></script> -->
