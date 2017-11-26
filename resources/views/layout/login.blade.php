<!DOCTYPE html>
<html class="chrome">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Ned Administration</title>

        <!-- Favicon-->
        <link rel="icon" type="image/jpg" href="/images/icon.jpg">

        <!-- Custom Css -->
        <!-- <link href="{{ asset('css/login/icon') }}" rel="stylesheet" type="text/css"> -->
        <link href="{{ asset('css/login/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login/all-themes.css') }}" rel="stylesheet">
    </head>

    <body class="theme-cyan" style="background-image: -webkit-linear-gradient(0deg, rgb(46, 97, 181), rgb(241, 169, 180));">
        <div class="authentication">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-8 col-xs-12">
                        <div class="l-detail">
                            <h5>¡Bienvenido!</h5>
                            <h1>Administración <span>NED</span></h1>
                            <h3>Comencemos...</h3>
                            <!-- <p></p>                             -->
                        </div>
                    </div>
                    
                    @yield('content')                    
                    @yield('js')
                </div>
            </div>
        </div>

        <!-- Jquery Core Js --> 
        <script src="{{ asset('js/login/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
        <script src="{{ asset('js/login/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js --> 
        <script src="{{ asset('js/login/gradientify.min.js') }}"></script><!-- Gradientify Js -->
        <script src="{{ asset('js/login/mainscripts.bundle.js') }}"></script><!-- Custom Js --> 

        <script type="text/javascript">
            $(document).ready(function() {
                $("body").gradientify({
                    gradients: [
                        { start: [49,76,172], stop: [242,159,191] },
                        { start: [255,103,69], stop: [240,154,241] },
                        { start: [33,229,241], stop: [235,236,117] }
                    ]
                });
            });
        </script>
    </body>
</html>