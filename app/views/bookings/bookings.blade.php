@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us</title>

@endsection

@section('custom_style')
    @yield('styles')
@endsection

@section('content')

<body id="top" class="thebg">

    <!-- navbar -->
    <div class="navbar-wrapper2 navbar-fixed-top">

        @include('layout.navbar')

    </div>
    <!-- / navbar -->

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    @yield('bread-crumbs')
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>
    @yield('body-content')

    {{ HTML::script('assets/js/js-about.js') }}

        <!-- Easy Pie Chart  -->
    {{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}
</body>

@stop