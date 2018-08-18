<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-kpu-usd.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo-kpu-usd.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>@yield('title')</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/paper-kit.css?v=2.1.0') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">

        <!--    Progress Bar        -->
        <link href="{{ asset('assets/nprogress.css') }}" rel='stylesheet' />
        <script src="{{ asset('assets/nprogress.js') }}"></script>

        <!--for modal open load-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Jasny Row Link-->
        <script src="{{ asset('jasny/js/jasny-bootstrap.js') }}"></script>
        <script src="{{ asset('jasny/js/jasny-bootstrap.min.js') }}"></script>
        <link href="{{ asset('jasny/css/jasny-bootstrap.css') }}" rel='stylesheet' />
        <link href="{{ asset('jasny/css/jasny-bootstrap.css.map') }}" rel='stylesheet' />
        <link href="{{ asset('jasny/css/jasny-bootstrap.min.css') }}" rel='stylesheet' />

    </head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent nav-down" color-on-scroll="500">
            @include('layouts.nav')
            @if(Session::has('success_reg'))
            <div class="alert" style="background-color: gainsboro">
                <div class="container">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <span>Anda berhasil mendaftar.</span>
                </div>
            </div>
            @endif
        </nav>

        @yield('content')

        <footer class="footer footer-gray">
            <div class="container">
                <div class="row">
                    <div class="credits ml-auto">
                        <span class="copyright">
                            © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> for Sanata Dharma University
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.12.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/popper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- Switches -->
    <script src="{{ asset('assets/js/bootstrap-switch.min.js') }}"></script>

    <!--  Plugins for Slider -->
    <script src="{{ asset('assets/js/nouislider.js') }}"></script>

    <!--  Photoswipe files -->
    <script src="{{ asset('assets/js/photo_swipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('assets/js/photo_swipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('assets/js/photo_swipe/init-gallery.js') }}"></script>

    <!--  Plugins for Select -->
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>

    <!--  for fileupload -->
    <script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>

    <!--  Plugins for Tags -->
    <script src="{{ asset('assets/js/bootstrap-tagsinput.js') }}"></script>

    <!--  Plugins for DateTimePicker -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="{{ asset('assets/js/paper-kit.js?v=2.1.0') }}"></script>


    <!--    Progress Bar-->

    <script>
$('body').show();
NProgress.start();
setTimeout(function () {
    NProgress.done();
    $('.fade').removeClass('out');
}, 1000);
    </script>
</html>