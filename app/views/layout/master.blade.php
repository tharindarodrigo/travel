<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->

    @yield('title')

    <!-- Bootstrap -->
    {{ HTML::style('dist/css/bootstrap.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('assets/css/custom.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Carousel -->
    {{ HTML::style('examples/carousel/carousel.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script('assets/js/html5shiv.js') }}
    {{ HTML::script('assets/js/respond.min.js') }}
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

    <!-- jQuery -->
    {{ HTML::script('assets/js/jquery.v2.0.3.js') }}

    {{ HTML::script('https://www.google.com/recaptcha/api.js') }}

    @yield('custom_style')

</head>

@yield('content')

@extends('layout.footer')

@yield('script')

<!-- Javascript -->

<!-- This page JS -->
{{ HTML::script('assets/js/js-index.js') }}

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

</html>