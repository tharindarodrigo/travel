<!-- jQuery OnlineLink -->
{{ HTML::script('//code.jquery.com/jquery-1.11.2.min.js') }}
{{ HTML::script('//code.jquery.com/jquery-migrate-1.2.1.min.js') }}

<!-- Bootstrap -->
{{ HTML::style('dist/css/bootstrap.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
{{ HTML::style('assets/css/custom.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

{{ HTML::script('dist/js/bootstrap.min.js') }}

<style type="text/css">
    body {
        /*padding-top: 10px;*/
    }

    .panel-login {
        border-color: #ccc;
        -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
    }

    .panel-login > .panel-heading {
        color: #00415d;
        background-color: #fff;
        border-color: #fff;
        text-align: center;
    }

    .panel-login > .panel-heading a {
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }

    .panel-login > .panel-heading a.active {
        color: #029f5b;
        font-size: 18px;
    }

    .panel-login > .panel-heading hr {
        margin-top: 10px;
        margin-bottom: 0px;
        clear: both;
        border: 0;
        height: 1px;
        background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
    }

    .panel-login input[type="text"], .panel-login input[type="email"], .panel-login input[type="password"] {
        height: 45px;
        border: 1px solid #ddd;
        font-size: 16px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }

    .panel-login input:hover,
    .panel-login input:focus {
        outline: none;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        border-color: #ccc;
    }

    .btn-login {
        background-color: #59B2E0;
        outline: none;
        color: #fff;
        font-size: 14px;
        height: auto;
        font-weight: normal;
        padding: 14px 0;
        text-transform: uppercase;
        border-color: #59B2E6;
    }

    .btn-login:hover,
    .btn-login:focus {
        color: #fff;
        background-color: #53A3CD;
        border-color: #53A3CD;
    }

    .forgot-password {
        text-decoration: underline;
        color: #888;
    }

    .forgot-password:hover,
    .forgot-password:focus {
        text-decoration: underline;
        color: #666;
    }

    .btn-register {
        background-color: #1CB94E;
        outline: none;
        color: #fff;
        font-size: 14px;
        height: auto;
        font-weight: normal;
        padding: 14px 0;
        text-transform: uppercase;
        border-color: #1CB94A;
    }

    .btn-register:hover,
    .btn-register:focus {
        color: #fff;
        background-color: #1CA347;
        border-color: #1CA347;
    }

    /*.dropdown-menu li:hover ul {*/
    /* Display the dropdown on hover */
    /*display: block;*/
    /*position: absolute;*/
    /*}*/
</style>

<style type="text/css">
    .logo {
        position: absolute;
        top: 40px;
        width: 175px !important;
        height: 60px !important;
    }

    .popover {
        z-index: 10000 !important;
    }
</style>

<style type="text/css">
    .navbar-custom {
        background-color: #006699;
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
        background-image: -webkit-linear-gradient(top, #005078, 0%, #0072ab, 100%);
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

    @media (max-width: 767) {
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
        font-weight: bold;
        color: #FFFFFF;
    }

    .navbar-custom th {
        color: #FFFFFF;
        border-left: double #FFFFFF 1px;
        border-right: double #FFFFFF 1px;
    }

    .navbar-custom a:hover, th:hover {
        color: #000000;
        background: #FFFFFF;
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

<div class="row navbar-custom">
    <div class="col-md-7"></div>
    <div class="col-md-5" style=" overflow-x: visible !important; overflow-y: visible !important;">
        <table align="center">
            <tr>
                <th style="padding: 10px;"><a href="" style="text-decoration: none">Language</a></th>
                <th style="padding: 10px;"><a href="" style="text-decoration: none">USD</a></th>
                <th>
                    @if(Auth::check())
                        <ul class="">
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    {{(Auth::user()->first_name)}} {{(Auth::user()->last_name)}}</a>
                                <ul class="dropdown-menu">
                                    <li><a href=""> Dashboard </a></li>
                                    <li><a href=""> My Booking </a></li>
                                    <li><a href=""> Reviews </a></li>
                                    <li><a href=""> Settings </a></li>
                                    <li>
                                        <a href="{{ URL::route('account-sign-out')}}"><i class="fa fa-check-circle"></i>
                                            Sign Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @else
                        <a style="padding: 10px; text-decoration: none" href="{{URL::to('/account/sign-in')}}">
                            Sign in
                        </a>
                        or
                        <a style="padding: 10px; text-decoration: none" href="{{URL::to('/account/create')}}">
                            Sign up
                        </a>
                    @endif
                </th>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <div class="">

        <div class="container offset-3">
            <!-- Navigation-->
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{URL::route('index')}}" class="navbar-brand">
                    {{ HTML::image('images/site/logo.png', '',  array('class' => 'logo')) }}
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="{{URL::route('index')}}">Home</a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Hotels </a>
                        <ul class="dropdown-menu" style="margin-right: -100px; padding: 5px 20px">
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
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Tours </a>
                        <ul class="dropdown-menu" style="margin-right: -150px; padding: 5px 20px">
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
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Excursions </a>
                        <ul class="dropdown-menu" style="margin-right: -100px; padding: 5px 20px">
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
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> Transportation </a>
                        <ul class="dropdown-menu" style="margin-right: -100px; padding: 5px 20px">
                            <li>
                                <a href="{{ URL::to('transport-list') }}"> Predefined Packages </a>
                                <a href="{{ URL::to('create-my-trip') }}"> Create My Trip </a>
                            </li>
                        </ul>
                    </li>

                    {{--<li><a href="#">Flights</a></li>--}}

                    {{--<li><a href="special_offers.php"> Hot Deals </a></li>--}}

                    <li><a href="{{URL::to('/contact')}}">Contact Us</a></li>

                </ul>
            </div>
            <!-- /Navigation-->
        </div>

    </div>
</div>

