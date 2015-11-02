<?php
$rate = 1;

if (Session::has('currency') && (Session::has('currency_rate'))) {

} else {
    Session::put('currency', 'USD');
    Session::put('currency_rate', $rate);
}

?>

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

    .icon-cart {
        width: 35px;
        height: 30px;
    }

    .basket-item-count {
        position: relative;
        display: inline-block;
        vertical-align: middle;
    }

    .basket-item-count .count {
        position: absolute;
        color: #fff;
        right: 10px;
        border-radius: 100px;
        width: 21px;
        height: 21px;
        line-height: 21px;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
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

<div class="navbar-wrapper2 navbar-fixed-top hidden-xs hidden-md" style="background: #006699;">
    <div class="row navbar-custom">
        <div class="col-md-6"></div>
        <div class="col-md-5">
            <table style="display: inline" align="right">
                <tr>
                    <th style="padding: 10px;"><a href="" style="text-decoration: none">Language &nbsp;&nbsp;|</a></th>

                    <th style="padding: 10px;">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                Crruency {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| </a>
                            <ul class="dropdown-menu"
                                style="padding: 5px 20px; max-width: 1000px; width: 1000px; left: -600px; right: 50px">
                                <form name="to" id="bb" action="" method="POST">
                                    <div class="col-md-3">
                                        <li>
                                            <a class="currency" id="AED" title="Arab Emirates Dirham"><span
                                                        class="blue">AED</span>Arab Emirates Dirham</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="IDR" title="Indonesian Rupiah"><span class="blue">IDR</span>Indonesian
                                                Rupiah</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="PLN" title="Polish Zloty"><span
                                                        class="blue">PLN</span>Polish Zloty</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="ARS" title="Argentine Peso"><span
                                                        class="blue">ARS</span>Argentine Peso</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="JPY" title="Japanese Yen"><span
                                                        class="blue">JPY</span>Japanese Yen</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="QAR" title="Qatari Rial"><span
                                                        class="blue">QAR</span>Qatari Rial</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="AUD" title="Australian Dollar"><span class="blue">AUD</span>Australian
                                                Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="JOD" title="Jordanian Dinar"><span
                                                        class="blue">JOD</span>Jordanian Dinar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="RON" title="Romanian Leu"><span
                                                        class="blue">RON</span>Romanian Leu</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="BHD" title="Bahrain Dinar"><span
                                                        class="blue">BHD</span>Bahrain Dinar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="KZT" title="Kazakh Tenge"><span
                                                        class="blue">KZT</span>Kazakh Tenge</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="RUB" title="Russian Ruble"><span
                                                        class="blue">RUB</span>Russian Ruble</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="GBP" title="British Pound"><span
                                                        class="blue">GBP</span>British Pound</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="KRW" title="Korean Won"><span
                                                        class="blue">KRW</span>Korean Won</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="SAR" title="Saudi Riyal"><span
                                                        class="blue">SAR</span>Saudi Riyal</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="BGN" title="Bulgarian Lev"><span
                                                        class="blue">BGN</span>Bulgarian Lev</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="KWD" title="Kuwaiti Dinar"><span
                                                        class="blue">KWD</span>Kuwaiti Dinar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="SGD" title="Singapore Dollar"><span
                                                        class="blue">SGD</span>Singapore Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="CAD" title="Canadian Dollar"><span
                                                        class="blue">CAD</span>Canadian Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="MYR" title="Malaysian Ringgit"><span class="blue">MYR</span>Malaysian
                                                Ringgit</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="ZAR" title="South African Rand"><span class="blue">ZAR</span>South
                                                African Rand</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="XPF" title="CFP Franc"><span class="blue">XPF</span>CFP
                                                Franc</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="MXN" title="Mexican Peso"><span
                                                        class="blue">MXN</span>Mexican Peso</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="SEK" title="Swedish Krona"><span
                                                        class="blue">SEK</span>Swedish Krona</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="CNY" title="Chinese Yuan"><span
                                                        class="blue">CNY</span>Chinese Yuan</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="ILS" title="New Israeli Sheqel"><span class="blue">ILS</span>New
                                                Israeli Sheqel</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="CHF" title="Swiss Franc"><span
                                                        class="blue">CHF</span>Swiss Franc</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="CZK" title="Czech Koruna"><span
                                                        class="blue">CZK</span>Czech Koruna</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="NZD" title="New Zealand Dollar"><span class="blue">NZD</span>New
                                                Zealand Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="TWD" title="Taiwan Dollar"><span
                                                        class="blue">TWD</span>Taiwan Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="DKK" title="Danish Krone"><span
                                                        class="blue">DKK</span>Danish Krone</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="NGN" title="Nigerian Naira"><span
                                                        class="blue">NGN</span>Nigerian Naira</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="THB" title="Thai Baht"><span class="blue">THB</span>Thai
                                                Baht</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="EUR" title="Euro"><span class="blue">EUR</span>Euro</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="NOK" title="Norwegian Krone"><span
                                                        class="blue">NOK</span>Norwegian Krone</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="TRY" title="Turkish Lira"><span
                                                        class="blue">TRY</span>Turkish Lira</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="FJD" title="Fiji Dollar"><span
                                                        class="blue">FJD</span>Fiji Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="OMR" title="Omani Rial"><span
                                                        class="blue">OMR</span>Omani Rial</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="UAH" title="Ukrainian Grivna"><span
                                                        class="blue">UAH</span>Ukrainian Grivna</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="HKD" title="Hong Kong Dollar"><span
                                                        class="blue">HKD</span>Hong Kong Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="PKR" title="Pakistan Rupee"><span
                                                        class="blue">PKR</span>Pakistan Rupee</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="USD" title="US Dollar"><span class="blue">USD</span>US
                                                Dollar</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="HUF" title="Hungarian Forint"><span
                                                        class="blue">HUF</span>Hungarian Forint</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="PHP" title="Philippine Peso"><span
                                                        class="blue">PHP</span>Philippine Peso</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="VND" title="Vietnamese Dong"><span
                                                        class="blue">VND</span>Vietnamese Dong</a>
                                        </li>
                                        <li>
                                            <a class="currency" id="INR" title="Indian Rupee"><span
                                                        class="blue">INR</span>Indian Rupee</a>
                                        </li>
                                    </div>
                                </form>
                            </ul>
                        </li>
                    </th>

                    <th>
                        @if(Auth::check())
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="padding: 10px;">
                                        {{(Auth::user()->first_name)}} {{(Auth::user()->last_name)}}&nbsp;&nbsp;|
                                        {{ HTML::image('images/site/gold-arrow.png', '', array('class' => 'nav_arrow')) }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        @if(Entrust::hasRole('Hotelier') || Entrust::hasRole('Admin'))
                                            <li><a href="{{URL::to('control-panel')}}"> Control Panel </a></li>
                                            <li><a href="{{URL::to('profile')}}"> Profile </a></li>
                                        @endif
                                        @if(Entrust::hasRole('Agent') || Entrust::hasRole('Admin'))
                                            <li><a href="{{URL::to('bookings')}}"> Bookings </a></li>
                                        @endif
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
                               href="{{URL::to('/account/sign-up')}}">
                                Sign up &nbsp;&nbsp;|
                            </a>
                        @endif
                    </th>
                    <th>
                        <div class="basket right">
                            <a href="{{URL::to('/booking-cart')}}">
                                <div style="display: inline;" class="basket-item-count">
                                    @if(Session::has('rate_box_details'))
                                        <span class="count">{{ (count(Session::get('rate_box_details')) + count(Session::get('transport_cart_box')) + count(Session::get('predefined_transport')) + count(Session::get('excursion_cart_details'))) }}</span>
                                        {{ HTML::image('images/site/icon-cart.png', '',  array('class' => 'icon-cart')) }}
                                    @else
                                        <span class="count">0</span>
                                        {{ HTML::image('images/site/icon-cart.png', '',  array('class' => 'icon-cart')) }}
                                    @endif
                                </div>


                                <div style="display: inline;" class="total-price-basket">
                                    {{--<span class="sign">$</span>--}}
                                    {{--<span class="id">3219,00</span>--}}
                                    <span>View</span>
                                </div>

                            </a>

                            {{--<ul class="dropdown-menu">--}}
                            {{--<li>--}}
                            {{--<div class="basket-item">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-xs-4 col-sm-4 no-margin text-center">--}}
                            {{--<div class="thumb">--}}
                            {{--<img alt="" src="assets/images/products/product-small-01.jpg"/>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-8 col-sm-8 no-margin">--}}
                            {{--<div class="title">Blueberry</div>--}}
                            {{--<div class="price">$270.00</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<a class="close-btn" href="#"></a>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="checkout">--}}
                            {{--<div class="basket-item">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-xs-12 col-sm-6">--}}
                            {{--<a href="cart" class="le-button inverse">View cart</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12 col-sm-6">--}}
                            {{--<a href="checkout" class="le-button">Checkout</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</li>--}}
                            {{--</ul>--}}

                        </div>
                        <!-- /.basket -->

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
                                        @if(Entrust::hasRole('Hotelier') || Entrust::hasRole('Admin'))
                                            <li><a href="{{URL::to('control-panel')}}"> Control Panel </a></li>
                                            <li><a href="{{URL::to('profile')}}"> Profile </a></li>
                                        @endif
                                        @if(Entrust::hasRole('Agent') || Entrust::hasRole('Admin'))
                                            <li><a href="{{URL::to('bookings')}}"> Bookings </a></li>
                                        @endif
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
                               href="{{URL::to('/account/sign-up')}}">
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

<script>
    $('.currency').click(function () {
        var text = $(this).attr('id');

        var formData = new FormData();
        var url = 'http://' + window.location.host + '/sri-lanka/get-currency-rate';

        formData.append('currency', text);

        $.ajax({
            url: url,
            method: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function (data) {
                // alert(data);
                location.reload();
            },

            error: function () {
                //alert('There was an error signing In');
            }
        });

    });

</script>

