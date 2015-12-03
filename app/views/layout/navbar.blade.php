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

<script type="text/javascript"> var translate_src = 'en';</script>
<script type="text/javascript" src="http://www.certifiedchinesetranslation.com/translate.js"></script>

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

    .currency li {
        cursor: pointer;
        padding: 5px;
        border-bottom: double 1px #3498db;
    }

    .currency li:hover {
        background: #252525;
    }

    .currency li span:hover {
        color: #ffff00;
    }

    .blue {
        color: #3498db;
        padding-right: 8px;
    }

    .currency a {
        padding: 0px !important;
    }

    .translate_drop a {
        padding: 10px !important;
    }

    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    body {
        top: 0px !important;
    }

    .goog-logo-link {
        display: none !important;
    }

    .goog-te-gadget {
        color: transparent !important;
    }

    #google_translate_element {

        margin-top: 10px !important;
        height: 30px !important;
    }
</style>

<style type="text/css">
    .navbar-custom {
        background: #252525 !important;
        border-color: #005078;
        background-image: -webkit-gradient(linear, left 0%, left 100%, from(#0088cc), to(#3498db));
        background-image: -webkit-linear-gradient(top, #0088cc 0%, #3498db 100%);
        background-image: -moz-linear-gradient(top, #0088cc 0%, #3498db 100%);
        background-image: linear-gradient(to bottom, #0088cc 0%, #3498db 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff3498db', GradientType=0);
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

    .navbar-custom li > a {
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
        background: #3498db !important;
    }

    .navbar-custom li > a:hover {
        background: #252525 !important;
        color: #FFFFFF !important;
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
    .line21 {
        background: #72bf66;
    }

    a {
        text-decoration: none !important;
    }

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

<div class="navbar-wrapper2 navbar-fixed-top hidden-xs hidden-md" style="background: #3498db;">
    <div class="row navbar-custom">
        <div class="col-md-6"></div>
        <div class="col-md-5">
            <table style="display: inline" align="right">
                <tr>

                    <th>
                        <div id="google_translate_element"></div>
                        <div id="language"></div>
                        
                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                }, 'google_translate_element');
                            }
                        </script>

                        <script type="text/javascript"
                                src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                        <script>
                            $('document').ready(function () {
                                $('#google_translate_element').on("click", function () {
                                    $("iframe").contents().find(".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div, .goog-te-menu2 *")
                                            .css({
                                                'color': '#3498db',
                                                'font-family': 'Lato'
                                            });
                                    $("iframe").contents().find(".goog-te-menu2-item div").hover(function () {
                                        $(this).css('background-color', '#252525').find('span.text').css('color', '#DAA520');
                                    }, function () {
                                        $(this).css('background-color', 'white').find('span.text').css('color', '#3498db');
                                    });
                                    $("iframe").contents().find('.goog-te-menu2').css('border', '1px solid #000000');
                                    $(".goog-te-menu-frame").css({
                                        '-moz-box-shadow': '0 3px 8px 2px #000000',
                                        '-webkit-box-shadow': '0 3px 8px 2px #000',
                                        'box-shadow': '0 3px 8px 2px #666'
                                    });
                                });
                            });
                        </script>

                        <script>
                            $(document).ready(function () {
                                var imageUrl = 'public/images/site/gold-arrow.png';
                                setTimeout(function () {
                                    $(".goog-te-gadget-simple").css({
                                        'background-color': '#252525',
                                        'color': '#fff',
                                        'border-left': '0',
                                        'border-right': '0',
                                        'border-top': '0',
                                        'border-bottom': '0'
                                    });
                                    // $("span").css("color", "#DAA520");
                                    $('.goog-te-gadget-simple .goog-te-menu-value').css({
                                        'font-size': '14px',
                                        'color': '#DAA520',
                                        'font-family': '"Helvetica Neue", Helvetica, Arial, sans-serif'
                                    });
                                    $('.goog-te-gadget img').css({
                                        'background-image': 'url(' + imageUrl + ')'
                                    });
                                    $('.goog-te-gadget-simple .goog-te-menu-value span').css({
                                        'color': '#DAA520',
                                        'border': 'none',
                                        'background-image': 'url(' + imageUrl + ')'
                                    });

                                }, 1000);

                            });
                        </script>

                    </th>

                    <th>
                        <ul class="nav navbar-nav">
                            <li class="dropdown currency">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    {{ Session::get('currency') }} {{ HTML::image('images/site/gold-arrow.png', '', array('class' => 'nav_arrow')) }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|
                                </a>

                                <ul class="dropdown-menu"
                                    style="height: 800px; min-width: 0px; width: auto; top:30px; left: -300px; right: -300px">

                                    <span style="margin-left: 16px; text-align: center" class="size16 green">Top Currencies</span>

                                    <div style="" class="line21"></div>

                                    <div class="currency_make">
                                        <div class="col-md-4">
                                            <li>
                                                <a class="currency" id="USD"
                                                   title="US Dollar"><span class="blue">USD</span>US Dollar</a>
                                            </li>
                                            <br/>

                                            <span style="text-align: center" class="size14 green">All Currencies</span>

                                            <div style="" class="line21"></div>

                                            <li>
                                                <a class="currency" id="AED" title="Arab Emirates Dirham"><span
                                                            class="blue">AED</span>Arab Emirates Dirham</a>
                                            </li>
                                            <li>
                                                <a class="currency" id="IDR" title="Indonesian Rupiah"><span
                                                            class="blue">IDR</span>Indonesian
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
                                                <a class="currency" id="AUD" title="Australian Dollar"><span
                                                            class="blue">AUD</span>Australian
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
                                        </div>

                                        <div class="col-md-4">

                                            <li>
                                                <a class="currency" id="RUB" title="Russian Ruble"><span class="blue">RUB</span>Russian
                                                    Ruble</a>
                                            </li>
                                            <br/>
                                            <li style="background: transparent !important;border-bottom: none">
                                                <a> </a>
                                            </li>
                                            <br/>

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
                                                <a class="currency" id="MYR" title="Malaysian Ringgit"><span
                                                            class="blue">MYR</span>Malaysian
                                                    Ringgit</a>
                                            </li>
                                            <li>
                                                <a class="currency" id="ZAR" title="South African Rand"><span
                                                            class="blue">ZAR</span>South
                                                    African Rand</a>
                                            </li>
                                            <li>
                                                <a class="currency" id="XPF" title="CFP Franc"><span
                                                            class="blue">XPF</span>CFP
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
                                                <a class="currency" id="ILS" title="New Israeli Sheqel"><span
                                                            class="blue">ILS</span>New
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
                                                <a class="currency" id="NZD" title="New Zealand Dollar"><span
                                                            class="blue">NZD</span>New
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
                                                <a class="currency" id="LKR" title="Srilankan Rupee"><span
                                                            class="blue">LKR</span>Srilankan Rupee</a>
                                            </li>

                                        </div>

                                        <div class="col-md-4">
                                            <li>
                                                <a class="currency" id="CNY" title="Chinese Yuan"><span
                                                            class="blue">CNY</span>Chinese Yuan</a>
                                            </li>
                                            <br/>
                                            <li style="background: transparent !important;border-bottom: none">
                                                <a> </a>
                                            </li>
                                            <br/>

                                            <li>
                                                <a class="currency" id="NGN" title="Nigerian Naira"><span
                                                            class="blue">NGN</span>Nigerian Naira</a>
                                            </li>
                                            <li>
                                                <a class="currency" id="THB" title="Thai Baht"><span
                                                            class="blue">THB</span>Thai
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
                                                <a class="currency" id="USD" title="US Dollar"><span
                                                            class="blue">USD</span>US
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
                                    </div>
                                </ul>
                            </li>
                        </ul>
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
                            |
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

<div class="navbar-wrapper2 navbar-fixed-top hidden-lg" style="background: #3498db;">
    <div class="row navbar-custom">
        <div class="col-md-6"></div>
        <div class="col-md-5">
            <table style="display: inline" align="right">
                <tr>

                    <th>
                        {{--<div class="hidden-lg" id="google_translate_element"></div>--}}
                        {{--<script type="text/javascript">--}}
                        {{--function googleTranslateElementInit() {--}}
                        {{--new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');--}}
                        {{--}--}}
                        {{--</script>--}}
                        {{--<script type="text/javascript"--}}
                        {{--src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>--}}
                    </th>

                    <th>
                        {{--<ul class="nav navbar-nav">--}}
                        {{--<li class="dropdown currency">--}}
                        {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                        {{--{{ Session::get('currency') }} {{ HTML::image('images/site/gold-arrow.png', '', array('class' => 'nav_arrow')) }}--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" style="">--}}

                        {{--<span style="margin-left: 16px; text-align: center" class="size16 green">Top Currencies</span>--}}

                        {{--<div style="" class="line21"></div>--}}

                        {{--<div class="currency_make">--}}
                        {{--<div class="col-md-4">--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="USD"--}}
                        {{--title="US Dollar"><span class="blue">USD</span>US Dollar</a>--}}
                        {{--</li>--}}
                        {{--<br/>--}}

                        {{--<span style="text-align: center" class="size14 green">All Currencies</span>--}}

                        {{--<div style="" class="line21"></div>--}}

                        {{--<li>--}}
                        {{--<a class="currency" id="AED" title="Arab Emirates Dirham"><span--}}
                        {{--class="blue">AED</span>Arab Emirates Dirham</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="IDR" title="Indonesian Rupiah"><span--}}
                        {{--class="blue">IDR</span>Indonesian--}}
                        {{--Rupiah</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="PLN" title="Polish Zloty"><span--}}
                        {{--class="blue">PLN</span>Polish Zloty</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="ARS" title="Argentine Peso"><span--}}
                        {{--class="blue">ARS</span>Argentine Peso</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="JPY" title="Japanese Yen"><span--}}
                        {{--class="blue">JPY</span>Japanese Yen</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="QAR" title="Qatari Rial"><span--}}
                        {{--class="blue">QAR</span>Qatari Rial</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="AUD" title="Australian Dollar"><span--}}
                        {{--class="blue">AUD</span>Australian--}}
                        {{--Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="JOD" title="Jordanian Dinar"><span--}}
                        {{--class="blue">JOD</span>Jordanian Dinar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="RON" title="Romanian Leu"><span--}}
                        {{--class="blue">RON</span>Romanian Leu</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="BHD" title="Bahrain Dinar"><span--}}
                        {{--class="blue">BHD</span>Bahrain Dinar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="KZT" title="Kazakh Tenge"><span--}}
                        {{--class="blue">KZT</span>Kazakh Tenge</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="RUB" title="Russian Ruble"><span--}}
                        {{--class="blue">RUB</span>Russian Ruble</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="GBP" title="British Pound"><span--}}
                        {{--class="blue">GBP</span>British Pound</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="KRW" title="Korean Won"><span--}}
                        {{--class="blue">KRW</span>Korean Won</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="SAR" title="Saudi Riyal"><span--}}
                        {{--class="blue">SAR</span>Saudi Riyal</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="BGN" title="Bulgarian Lev"><span--}}
                        {{--class="blue">BGN</span>Bulgarian Lev</a>--}}
                        {{--</li>--}}
                        {{--</div>--}}

                        {{--<div class="col-md-4">--}}

                        {{--<li>--}}
                        {{--<a class="currency" id="RUB" title="Russian Ruble"><span class="blue">RUB</span>Russian--}}
                        {{--Ruble</a>--}}
                        {{--</li>--}}
                        {{--<br/>--}}
                        {{--<li style="background: transparent !important;border-bottom: none">--}}
                        {{--<a> </a>--}}
                        {{--</li>--}}
                        {{--<br/>--}}

                        {{--<li>--}}
                        {{--<a class="currency" id="KWD" title="Kuwaiti Dinar"><span--}}
                        {{--class="blue">KWD</span>Kuwaiti Dinar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="SGD" title="Singapore Dollar"><span--}}
                        {{--class="blue">SGD</span>Singapore Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="CAD" title="Canadian Dollar"><span--}}
                        {{--class="blue">CAD</span>Canadian Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="MYR" title="Malaysian Ringgit"><span--}}
                        {{--class="blue">MYR</span>Malaysian--}}
                        {{--Ringgit</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="ZAR" title="South African Rand"><span--}}
                        {{--class="blue">ZAR</span>South--}}
                        {{--African Rand</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="XPF" title="CFP Franc"><span--}}
                        {{--class="blue">XPF</span>CFP--}}
                        {{--Franc</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="MXN" title="Mexican Peso"><span--}}
                        {{--class="blue">MXN</span>Mexican Peso</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="SEK" title="Swedish Krona"><span--}}
                        {{--class="blue">SEK</span>Swedish Krona</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="CNY" title="Chinese Yuan"><span--}}
                        {{--class="blue">CNY</span>Chinese Yuan</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="ILS" title="New Israeli Sheqel"><span--}}
                        {{--class="blue">ILS</span>New--}}
                        {{--Israeli Sheqel</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="CHF" title="Swiss Franc"><span--}}
                        {{--class="blue">CHF</span>Swiss Franc</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="CZK" title="Czech Koruna"><span--}}
                        {{--class="blue">CZK</span>Czech Koruna</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="NZD" title="New Zealand Dollar"><span--}}
                        {{--class="blue">NZD</span>New--}}
                        {{--Zealand Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="TWD" title="Taiwan Dollar"><span--}}
                        {{--class="blue">TWD</span>Taiwan Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="DKK" title="Danish Krone"><span--}}
                        {{--class="blue">DKK</span>Danish Krone</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="LKR" title="Srilankan Rupee"><span--}}
                        {{--class="blue">LKR</span>Srilankan Rupee</a>--}}
                        {{--</li>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-4">--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="CNY" title="Chinese Yuan"><span--}}
                        {{--class="blue">CNY</span>Chinese Yuan</a>--}}
                        {{--</li>--}}
                        {{--<br/>--}}
                        {{--<li style="background: transparent !important;border-bottom: none">--}}
                        {{--<a> </a>--}}
                        {{--</li>--}}
                        {{--<br/>--}}

                        {{--<li>--}}
                        {{--<a class="currency" id="NGN" title="Nigerian Naira"><span--}}
                        {{--class="blue">NGN</span>Nigerian Naira</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="THB" title="Thai Baht"><span--}}
                        {{--class="blue">THB</span>Thai--}}
                        {{--Baht</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="EUR" title="Euro"><span class="blue">EUR</span>Euro</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="NOK" title="Norwegian Krone"><span--}}
                        {{--class="blue">NOK</span>Norwegian Krone</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="TRY" title="Turkish Lira"><span--}}
                        {{--class="blue">TRY</span>Turkish Lira</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="FJD" title="Fiji Dollar"><span--}}
                        {{--class="blue">FJD</span>Fiji Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="OMR" title="Omani Rial"><span--}}
                        {{--class="blue">OMR</span>Omani Rial</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="UAH" title="Ukrainian Grivna"><span--}}
                        {{--class="blue">UAH</span>Ukrainian Grivna</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="HKD" title="Hong Kong Dollar"><span--}}
                        {{--class="blue">HKD</span>Hong Kong Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="PKR" title="Pakistan Rupee"><span--}}
                        {{--class="blue">PKR</span>Pakistan Rupee</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="USD" title="US Dollar"><span--}}
                        {{--class="blue">USD</span>US--}}
                        {{--Dollar</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="HUF" title="Hungarian Forint"><span--}}
                        {{--class="blue">HUF</span>Hungarian Forint</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="PHP" title="Philippine Peso"><span--}}
                        {{--class="blue">PHP</span>Philippine Peso</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="VND" title="Vietnamese Dong"><span--}}
                        {{--class="blue">VND</span>Vietnamese Dong</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a class="currency" id="INR" title="Indian Rupee"><span--}}
                        {{--class="blue">INR</span>Indian Rupee</a>--}}
                        {{--</li>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
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
                            |
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
                    {{ HTML::image('images/moblie logo.png', '',  array('class' => '')) }}
                </a>
            </div>

            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="{{URL::route('index')}}">Home &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            Hotels {{ HTML::image('images/site/white-arrow.png', '', array('class' => 'nav_arrow')) }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <ul class="dropdown-menu" style="margin-right: -50px; padding: 5px 20px">
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <ul class="dropdown-menu" style="margin-right: -60px; padding: 5px 20px">
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                        <ul class="dropdown-menu" style="margin-right: -30px; padding: 5px 20px">
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </a>
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

