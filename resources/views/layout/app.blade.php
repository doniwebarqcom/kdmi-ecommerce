<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>@yield('title')</title>

    <meta name="author" content="CreativeLayers">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Boostrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/bootstrap.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/style.css?v=4') }}">

    <!-- Reponsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/responsive.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheets/uploadfile.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.png') }}">
    <script type="text/javascript">
        function ready(callback){
            // in case the document is already rendered
            if (document.readyState!='loading') callback();
            // modern browsers
            else if (document.addEventListener) document.addEventListener('DOMContentLoaded', callback);
            // IE <= 8
            else document.attachEvent('onreadystatechange', function(){
                if (document.readyState=='complete') callback();
            });
        }
    </script>
</head>
<body class="header_sticky">

    @yield('content')


    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('javascript/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/tether.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/waypoints.min.js') }}"></script>
    <!-- <script type="text/javascript" src="javascript/jquery.circlechart.js"></script> -->
    <script type="text/javascript" src="{{ asset('javascript/easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/owl.carousel.js') }}"></script>
    
    <!-- <script type="text/javascript" src="javascript/jquery-ui.js"></script> -->
    <script type="text/javascript" src="{{ asset('javascript/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&region=GB"></script>
    <script type="text/javascript" src="{{ asset('javascript/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/waves.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('javascript/jquery.countdown.js') }}"></script>

    <script type="text/javascript" src="{{ asset('javascript/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/jquery.validate.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('javascript/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('javascript/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('javascript/main.js') }}"></script>

    <script type="text/javascript" src="{{ asset('javascript/jquery.uploadfile.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('javascript/jquery.maskMoney.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
    (function() {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });
    })();
    </script>

    @yield('footer-script')

</body>
</html>