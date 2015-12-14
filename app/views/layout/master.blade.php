<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->

    @yield('title')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style('dist/css/bootstrap.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('assets/css/custom.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Carousel -->
    {{ HTML::style('examples/carousel/carousel.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <!--{{ HTML::script('assets/js/html5shiv.js') }}-->
    <!--{{ HTML::script('assets/js/respond.min.js') }}-->
    <![endif]-->

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet'
          type='text/css'>

    <!-- Font-Awesome -->
    {{ HTML::style('assets/css/font-awesome.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    <!--[if lt IE 7]>
    {{ HTML::style('assets/css/font-awesome-ie7.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    <![endif]-->

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    {{ HTML::style('css/fullscreen.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('rs-plugin/css/settings.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Picker UI-->
    {{ HTML::style('assets/css/jquery-ui.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('assets/css/filterable.css' , array('rel' => 'stylesheet')) }}

    <!-- jQuery -->
    {{ HTML::script('assets/js/jquery.v2.0.3.js') }}


    {{ HTML::script('https://www.google.com/recaptcha/api.js') }}

    <!-- Jquery Confirm -->
{{--    {{ HTML::style('jquery-confirm/demo/libs/bootstrap.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}--}}
{{--    {{ HTML::style('jquery-confirm/demo/libs/bootstrap-theme.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}--}}
{{--    {{ HTML::style('jquery-confirm/demo/libs/font-awesome.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}--}}
{{--    {{ HTML::style('jquery-confirm/demo/libs/default.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}--}}
{{--    {{ HTML::style('jquery-confirm/demo/demo.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}--}}
{{--    {{ HTML::script('jquery-confirm/demo/libs/jquery.min.js') }}--}}
{{--    {{ HTML::script('jquery-confirm/demo/libs/bootstrap.min.js') }}--}}
    {{--{{ HTML::script('jquery-confirm/demo/libs/pretty.js') }}--}}

    {{ HTML::style('jquery-confirm/css/jquery-confirm.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::script('jquery-confirm/js/jquery-confirm.js') }}

    @yield('custom_style')

    <style type="text/css">
        body{
            overflow-x: hidden;
        }
    </style>
</head>

@yield('content')

{{--@yield('breadcrumbs')--}}

<!-- footer area -->

@include('layout.footer')

<!-- Javascript -->


<!-- Custom functions -->
{{ HTML::script('assets/js/functions.js') }}

<!-- Picker UI-->
{{ HTML::script('assets/js/jquery-ui.js') }}

<!-- Easing -->
{{ HTML::script('assets/js/jquery.easing.js') }}

<!-- jQuery KenBurn Slider  -->
{{ HTML::script('rs-plugin/js/jquery.themepunch.revolution.min.js') }}

<!-- Nicescroll  -->
{{ HTML::script('assets/js/jquery.nicescroll.min.js') }}

<!-- CarouFredSel -->
{{ HTML::script('assets/js/jquery.carouFredSel-6.2.1-packed.js') }}
{{ HTML::script('assets/js/helper-plugins/jquery.touchSwipe.min.js') }}
{{ HTML::script('assets/js/helper-plugins/jquery.mousewheel.min.js') }}
{{ HTML::script('assets/js/helper-plugins/jquery.transit.min.js') }}
{{ HTML::script('assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js') }}

<!-- Custom Select -->
{{ HTML::script('assets/js/jquery.customSelect.js') }}

<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script('dist/js/bootstrap.min.js') }}

<!-- Jquery Confirm -->
{{--{{ HTML::script('jquery-confirm/demo/demo.min.js') }}--}}

@yield('script')

{{ HTML::script('assets/js/filterable.js') }}

</html>