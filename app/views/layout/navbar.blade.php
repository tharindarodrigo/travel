{{--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">--}}

{{--{{ HTML::script('dist/js/bootstrap.min.js') }}--}}

<script type="text/javascript">
    //------------------------------
    //slider parallax effect
    //------------------------------
    jQuery(document).ready(function ($) {
        var $scrollTop;
        var $headerheight;
        var $loggedin = false;

        if ($loggedin == false) {
            $headerheight = $('.navbar-wrapper2').height() - 20;
        } else {
            $headerheight = $('.navbar-wrapper2').height() + 80;
        }


        $(window).scroll(function () {
            var $iw = $('body').innerWidth();
            $scrollTop = $(window).scrollTop();
            if ($iw < 992) {

            }
            else {
                $('.navbar-wrapper2').css({'min-height': 90 + 'px'});
            }
            $('#dajy').css({'top': ((-$scrollTop / 5) + $headerheight) + 'px'});
            //$(".sboxpurple").css({'opacity' : 1-($scrollTop/300)});
            $(".scrolleffect").css({'top': ((-$scrollTop / 5) + $headerheight) + 50 + 'px'});
            $(".tp-leftarrow").css({'left': 20 - ($scrollTop / 2) + 'px'});
            $(".tp-rightarrow").css({'right': 20 - ($scrollTop / 2) + 'px'});
        });

    });
</script>

<!-- jQuery OnlineLink -->
{{ HTML::script('//code.jquery.com/jquery-1.11.2.min.js') }}
{{ HTML::script('//code.jquery.com/jquery-migrate-1.2.1.min.js') }}

        <!-- Bootstrap -->
{{ HTML::style('dist/css/bootstrap.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
{{ HTML::style('assets/css/custom.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

{{--{{ HTML::script('dist/js/bootstrap.min.js') }}--}}

<style type="text/css">
    .nav_arrow {
        width: 20px;
        height: 10px;
    }

    .logo {
        position: absolute;
        left: 124px;
        top: 25px;
        width: 304px !important;
        height: 92px !important;
    }

    .popover {
        z-index: 10000 !important;
    }
</style>

<style type="text/css">
    .navbar-custom {
        background: #15262f !important;
        border-color: #005078;
        background-image: -webkit-gradient(linear, left 0%, left 100%, from(#0088cc), to(#006699));
        background-image: -webkit-linear-gradient(top, #0088cc 0%, #006699 100%);
        background-image: -moz-linear-gradient(top, #0088cc 0%, #006699 100%);
        background-image: linear-gradient(to bottom, #0088cc 0%, #006699 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff006699', GradientType=0);
    }

    .navbar-custom .navbar-brand {
        color: #ffffff;
    }

    .navbar-custom .navbar-brand:hover,
    .navbar-custom .navbar-brand:focus {
        color: #e6e6e6;
        background-color: transparent;
    }

    .navbar-custom .navbar-text {
        color: #ffffff;
    }

    .navbar-custom .navbar-nav > li:last-child > a {
        border-right: 1px solid #005078;
    }

    .navbar-custom .navbar-nav > li > a {
        color: #ffffff;
        border-left: 1px solid #005078;
    }

    .navbar-custom .navbar-nav > li > a:hover,
    .navbar-custom .navbar-nav > li > a:focus {
        color: #96d187;
        background-color: transparent;
    }

    .navbar-custom .navbar-nav > .active > a,
    .navbar-custom .navbar-nav > .active > a:hover,
    .navbar-custom .navbar-nav > .active > a:focus {
        color: #96d187;
        background-color: #005078;
        background-image: -webkit-gradient(linear, left 0%, left 100%, from(#005078), to(#0072ab));
        background-image: -webkit-linear-gradient(top, #005078 0%, #0072ab 100%);
        background-image: -moz-linear-gradient(top, #005078 0%, #0072ab 100%);
        background-image: linear-gradient(to bottom, #005078 0%, #0072ab 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff005078', endColorstr='#ff0072ab', GradientType=0);
    }

    .navbar-custom .navbar-nav > .disabled > a,
    .navbar-custom .navbar-nav > .disabled > a:hover,
    .navbar-custom .navbar-nav > .disabled > a:focus {
        color: #cccccc;
        background-color: transparent;
    }

    .navbar-custom .navbar-toggle {
        border-color: #dddddd;
    }

    .navbar-custom .navbar-toggle:hover,
    .navbar-custom .navbar-toggle:focus {
        background-color: #dddddd;
    }

    .navbar-custom .navbar-toggle .icon-bar {
        background-color: #cccccc;
    }

    .navbar-custom .navbar-collapse,
    .navbar-custom .navbar-form {
        border-color: #004e75;
    }

    .navbar-custom .navbar-nav > .dropdown > a:hover .caret,
    .navbar-custom .navbar-nav > .dropdown > a:focus .caret {
        border-top-color: #96d187;
        border-bottom-color: #96d187;
    }

    .navbar-custom .navbar-nav > .open > a,
    .navbar-custom .navbar-nav > .open > a:hover,
    .navbar-custom .navbar-nav > .open > a:focus {
        background-color: #005078;
        color: #96d187;
    }

    .navbar-custom .navbar-nav > .open > a .caret,
    .navbar-custom .navbar-nav > .open > a:hover .caret,
    .navbar-custom .navbar-nav > .open > a:focus .caret {
        border-top-color: #96d187;
        border-bottom-color: #96d187;
    }

    .navbar-custom .navbar-nav > .dropdown > a .caret {
        border-top-color: #ffffff;
        border-bottom-color: #ffffff;
    }

    @media (max-width: 767px) {
        .navbar-custom .navbar-nav .open .dropdown-menu > li > a {
            color: #ffffff;
        }

        .navbar-custom .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-custom .navbar-nav .open .dropdown-menu > li > a:focus {
            color: #96d187;
            background-color: transparent;
        }

        .navbar-custom .navbar-nav .open .dropdown-menu > .active > a,
        .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:hover,
        .navbar-custom .navbar-nav .open .dropdown-menu > .active > a:focus {
            color: #96d187;
            background-color: #005078;
        }

        .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a,
        .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:hover,
        .navbar-custom .navbar-nav .open .dropdown-menu > .disabled > a:focus {
            color: #cccccc;
            background-color: transparent;
        }
    }

    .navbar-custom .navbar-link {
        color: #ffffff;
    }

    .navbar-custom .navbar-link:hover {
        color: #96d187;
    }

    .navbar-custom a {
        /*/ font-weight: bold;*/
        color: #DAA520;
    }

    .navbar-custom th {
        color: #DAA520;
    }

    .navbar-custom .navbar-nav > li > a {
        color: #DAA520;
    }

    .navbar-custom a:hover, th:hover {
        color: #FFFFFF;

    }

    .navbar-custom th:hover {
        color: #FFFFFF;

    }

    .navbar-nav > li:last-child > a {
        border: none !important;
    }

    .navbar-custom-2 a:hover {
        color: #FFFFFF !important;
        background: #006699 !important;
    }

    .navbar-custom a:hover {
        color: #FFFFFF !important;
    }

    .navbar-custom li > a:hover {
        color: #000000 !important;
    }

    @media only screen and (min-width: 480px) and (max-width: 767px) {
        .dropdown-menu {
            max-width: 95% !important;
        }
    }

    @media only screen and (min-width: 0px) and (max-width: 479px) {
        .dropdown-menu {
            max-width: 95% !important;
        }
    }


</style>

<style type="text/css">
    .navbar-custom-2 a, li {
        color: #FFFFFF;
    }
</style>

<script type="text/javascript">
    $(function () {

        $('#login-form-link').click(function (e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function (e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

</script>

{{--Desktop version--}}

<div class="navbar-wrapper2 navbar-fixed-top hidden-xs hidden-md " style="background: #006699;">
    <div class="row navbar-custom">
        <div class="col-md-7"></div>
        <div class="col-md-5">
            <table align="center">
                <tr>
                    <th style="padding: 10px;"><a href="" style="text-decoration: none">Language &nbsp;&nbsp;|</a></th>
                    <th style="padding: 10px;"><a href="" style="text-decoration: none">USD &nbsp;&nbsp;|</a></th>
                    <th>
                        @if(Auth::check())
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding: 10px;">
                                        {{(Auth::user()->first_name)}} {{(Auth::user()->last_name)}}
                                        {{ HTML::image('images/site/gold-arrow.png', '', array('class' => 'nav_arrow')) }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href=""> Dashboard </a></li>
                                        <li><a href=""> My Booking </a></li>
                                        <li><a href=""> Reviews </a></li>
                                        <li><a href=""> Settings </a></li>
                                        <li>
                                            <a href="{{ URL::route('account-sign-out')}}"><i
                                                        class="fa fa-check-circle"></i>
                                                Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <a style="padding-left: 10px; padding-right: 2px; text-decoration: none"
                               href="{{URL::to('/account/sign-in')}}">
                                Sign in
                            </a>
                            or
                            <a style="padding-left: 2px; padding-right: 10px; text-decoration: none"
                               href="{{URL::to('/account/create')}}">
                                Sign up
                            </a>
                        @endif
                    </th>
                </tr>
            </table>
        </div>
    </div>

    <div class="container navbar-custom-2">
        <div class="container offset-3">
            <!-- Navigation-->
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{URL::route('index')}}" class="navbar-brand">
                    {{ HTML::image('images/site/logo11.png', '',  array('class' => 'logo')) }}
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="{{URL::route('index')}}">Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |</a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Hotels {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        <ul class="dropdown-menu" style="margin-right: -50px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Accommodation</li>
                            <?php
                            $hotel_type = DB::table('hotel_categories')
                                    ->get();
                            ?>
                            @foreach($hotel_type as $hotel_categories)
                                <li>
                                    <a href="{{URL::to('/sri-lanka/'.str_replace(' ', '-',$hotel_categories->hotel_category)) }}">{{ $hotel_categories->hotel_category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Tours {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        <ul class="dropdown-menu" style="margin-right: -60px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Tours</li>
                            <?php
                            $tour_type = DB::table('tours')
                                    ->get();
                            ?>
                            @foreach($tour_type as $tours)
                                <li>
                                    <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-',$tours->tour_title)) }}">{{ $tours->tour_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Excursions {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        <ul class="dropdown-menu" style="margin-right: -30px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Excursions</li>
                            <?php
                            $excursion_type = DB::table('excursion_types')
                                    ->get();
                            ?>
                            @foreach($excursion_type as $excursions)
                                <li>
                                    <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-',$excursions->excursion_type)) }}">{{ $excursions->excursion_type }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Transportation {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </a>
                        <ul class="dropdown-menu" style="margin-right: -20px; padding: 5px 20px">
                            <li>
                                <a href="{{ URL::to('transport-list') }}"> Predefined Packages </a>
                                <a href="{{ URL::to('create-my-trip') }}"> Create My Trip </a>
                            </li>
                        </ul>
                    </li>

                    {{--<li><a href="#">Flights</a></li>--}}

                    {{--<li><a href="special_offers.php"> Hot Deals </a></li>--}}

                    <li><a href="{{URL::to('/contact')}}">Contact Us </a></li>

                </ul>
            </div>
            <!-- /Navigation-->
        </div>
    </div>
</div>

{{-- Mobile Version --}}

<div class="navbar-wrapper2 navbar-fixed-top hidden-lg" style="background: #006699;">
    <div class="row navbar-custom">
        <div class="col-md-7"></div>
        <div class="col-md-5" style="overflow-x: visible !important; overflow-y: visible !important;">
            <table align="right">
                <tr>
                    <th style="padding: 10px;"><a href="" style="text-decoration: none">Language </a></th>
                    <th style="padding: 10px;"><a href="" style="text-decoration: none">USD</a></th>
                    <th>
                        @if(Auth::check())
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding: 10px;">
                                        {{(Auth::user()->first_name)}} {{(Auth::user()->last_name)}}
                                        {{ HTML::image('images/site/gold-arrow.png', '', array('class' => 'nav_arrow')) }}
                                        &nbsp;&nbsp;&nbsp;
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(Entrust::hasRole('Hotelier'))
                                            <li><a href="{{URL::to('control-panel')}}"> Dashboard </a></li>
                                        @endif
                                        <li><a href=""> My Booking </a></li>
                                        <li><a href=""> Reviews </a></li>
                                        <li><a href=""> Settings </a></li>
                                        <li>
                                            <a href="{{ URL::route('account-sign-out')}}"><i
                                                        class="fa fa-check-circle"></i>
                                                Sign Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <a style="padding-left: 10px; padding-right: 2px; text-decoration: none"
                               href="{{URL::to('/account/sign-in')}}">
                                Sign in
                            </a>
                            or
                            <a style="padding-left: 2px; padding-right: 10px; text-decoration: none"
                               href="{{URL::to('/account/create')}}">
                                Sign up
                            </a>
                        @endif
                    </th>
                </tr>
            </table>
        </div>
    </div>

    <div class="container navbar-custom-2">
        <div class="container offset-3">

            <!-- Navigation-->
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{URL::route('index')}}" class="navbar-brand">
                    {{--{{ HTML::image('images/site/logo11.png', '',  array('class' => 'logo')) }}--}}
                </a>

            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="{{URL::route('index')}}">Home </a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Hotels {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                        </a>
                        <ul class="dropdown-menu" style="margin-right: -50px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Accommodation</li>
                            <?php
                            $hotel_type = DB::table('hotel_categories')
                                    ->get();
                            ?>
                            @foreach($hotel_type as $hotel_categories)
                                <li>
                                    <a href="{{URL::to('/sri-lanka/'.str_replace(' ', '-',$hotel_categories->hotel_category)) }}">{{ $hotel_categories->hotel_category }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Tours {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                        </a>
                        <ul class="dropdown-menu" style="margin-right: -60px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Tours</li>
                            <?php
                            $tour_type = DB::table('tours')
                                    ->get();
                            ?>
                            @foreach($tour_type as $tours)
                                <li>
                                    <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-',$tours->tour_title)) }}">{{ $tours->tour_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Excursions {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                        </a>
                        <ul class="dropdown-menu" style="margin-right: -30px; padding: 5px 20px">
                            <li class="dropdown-header"> Select Excursions</li>
                            <?php
                            $excursion_type = DB::table('excursion_types')
                                    ->get();
                            ?>
                            @foreach($excursion_type as $excursions)
                                <li>
                                    <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-',$excursions->excursion_type)) }}">{{ $excursions->excursion_type }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Transportation {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                        </a>
                        <ul class="dropdown-menu" style="margin-right: -20px; padding: 5px 20px">
                            <li>
                                <a href="{{ URL::to('transport-list') }}"> Predefined Packages </a>
                                <a href="{{ URL::to('create-my-trip') }}"> Create My Trip </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{{URL::to('/contact')}}">Contact Us </a></li>

                </ul>
            </div>
            <!-- /Navigation-->
        </div>
    </div>
</div>