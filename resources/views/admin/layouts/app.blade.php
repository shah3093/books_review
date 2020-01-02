<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Books Review | Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/notika/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/notika/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/notika/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/meanmenu/meanmenu.min.css')}}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/wave/waves.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/style.css')}}">

    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/jquery.dataTables.min.css')}}">

    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('assets/notika/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('assets/notika/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/notika/custom/css/custom.css')}}">

    @yield('styles')
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Header Top Area -->
@include('admin.partials.header')
<!-- End Header Top Area -->
<!-- Mobile Menu start -->
@include('admin.partials.mobile_menu')
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
@include('admin.partials.main_menu')
<!-- Main Menu area End-->

@yield('content')

<!-- Start Footer area-->
<div class="footer-copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Copyright © 2018
                        . All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer area-->
<!-- jquery
    ============================================ -->
<script src="{{asset('assets/notika/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{asset('assets/notika/js/bootstrap.min.js')}}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{asset('assets/notika/js/wow.min.js')}}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{asset('assets/notika/js/jquery-price-slider.js')}}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{asset('assets/notika/js/owl.carousel.min.js')}}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{asset('assets/notika/js/jquery.scrollUp.min.js')}}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{asset('assets/notika/js/meanmenu/jquery.meanmenu.js')}}"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{asset('assets/notika/js/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/notika/js/counterup/waypoints.min.js')}}"></script>
<script src="{{asset('assets/notika/js/counterup/counterup-active.js')}}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{asset('assets/notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- jvectormap JS
    ============================================ -->
<script src="{{asset('assets/notika/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/notika/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/notika/js/jvectormap/jvectormap-active.js')}}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('assets/notika/js/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/notika/js/sparkline/sparkline-active.js')}}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('assets/notika/js/flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/notika/js/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/notika/js/flot/curvedLines.js')}}"></script>
<script src="{{asset('assets/notika/js/flot/flot-active.js')}}"></script>
<!-- knob JS
    ============================================ -->
<script src="{{asset('assets/notika/js/knob/jquery.knob.js')}}"></script>
<script src="{{asset('assets/notika/js/knob/jquery.appear.js')}}"></script>
<script src="{{asset('assets/notika/js/knob/knob-active.js')}}"></script>
<!--  wave JS
    ============================================ -->
<script src="{{asset('assets/notika/js/wave/waves.min.js')}}"></script>
<script src="{{asset('assets/notika/js/wave/wave-active.js')}}"></script>
<!--  todo JS
    ============================================ -->
<script src="{{asset('assets/notika/js/todo/jquery.todo.js')}}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{asset('assets/notika/js/plugins.js')}}"></script>

<!-- icheck JS
      ============================================ -->
<script src="{{asset('assets/notika/js/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/notika/js/icheck/icheck-active.js')}}"></script>

<!-- Data Table JS
      ============================================ -->
<script src="{{asset('assets/notika/js/data-table/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/notika/js/data-table/data-table-act.js')}}"></script>

<!--  Chat JS
    ============================================ -->
<script src="{{asset('assets/notika/js/chat/moment.min.js')}}"></script>
<!-- main JS
    ============================================ -->
<script src="{{asset('assets/notika/js/main.js')}}"></script>

<script src="{{asset('assets/notika/custom/js/custom.js')}}"></script>

@yield('scripts')

</body>

</html>
