<?php
//$rate = 2;
//Session::put('currency', 'USD');
//Session::put('currency_rate', $rate);

if (isset($_POST["to"])) {
    dd('yes');
    $from_currency = 'USD';
    $to_currency = $_POST["to"];
    dd($to_currency);
    $amount = 1;
    $results = converCurrency($from_currency, $to_currency, $amount);

    $regularExpression = '#\<span class=bld\>(.+?)\<\/span\>#s';
    preg_match($regularExpression, $results, $finalData);
    $finalData[1];
    $str = $finalData[1];
    $rr = (explode(" ", $str));

    echo $rr[0];
    echo '<br>';
    echo $rr[1];
}else{
    //dd('no');
}

function converCurrency($from, $to, $amount)
{
    $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $request = curl_init();
    $timeOut = 0;
    curl_setopt($request, CURLOPT_URL, $url);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
    $response = curl_exec($request);
    curl_close($request);
    return $response;
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
                            <ul class="dropdown-menu" style="padding: 5px 20px; max-width: 1000px; width: 1000px; left: -600px; right: 50px">
                                <form name="to" id="bb" action="" method="POST">
                                    <div class="col-md-3">
                                        <li><a class="currency"  id="BRL">Brazilian Real (R$)</a></li>
                                        <li><a class="currency"  id="BSD">Bahamian Dollar (BSD)</a></li>
                                        <li><a class="currency"  id="BTC">Bitcoin (฿)</a></li>
                                        <li><a class="currency"  id="BTN">Bhutanese Ngultrum (BTN)</a></li>
                                        <li><a class="currency"  id="BWP">Botswanan Pula (BWP)</a></li>
                                        <li><a class="currency"  id="BYR">Belarusian Ruble (BYR)</a></li>
                                        <li><a class="currency"  id="BZD">Belize Dollar (BZD)</a></li>
                                        <li><a class="currency"  id="CAD">Canadian Dollar (CA$)</a></li>
                                        <li><a class="currency"  id="CDF">Congolese Franc (CDF)</a></li>
                                        <li><a class="currency"  id="CHF">Swiss Franc (CHF)</a></li>
                                        <li><a class="currency"  id="CLF">Chilean Unit of Account (UF) (CLF)</a></li>
                                        <li><a class="currency"  id="CLP">Chilean Peso (CLP)</a></li>
                                        <li><a class="currency"  id="CNH">CNH (CNH)</a></li>
                                        <li><a class="currency"  id="CNY">Chinese Yuan (CN¥)</a></li>
                                        <li><a class="currency"  id="COP">Colombian Peso (COP)</a></li>
                                        <li><a class="currency"  id="CRC">Costa Rican Colón (CRC)</a></li>
                                        <li><a class="currency"  id="CUP">Cuban Peso (CUP)</a></li>
                                        <li><a class="currency"  id="CVE">Cape Verdean Escudo (CVE)</a></li>
                                        <li><a class="currency"  id="CZK">Czech Republic Koruna (CZK)</a></li>
                                        <li><a class="currency"  id="DEM">German Mark (DEM)</a></li>
                                        <li><a class="currency"  id="DJF">Djiboutian Franc (DJF)</a></li>
                                        <li><a class="currency"  id="DKK">Danish Krone (DKK)</a></li>
                                        <li><a class="currency"  id="DOP">Dominican Peso (DOP)</a></li>
                                        <li><a class="currency"  id="DZD">Algerian Dinar (DZD)</a></li>
                                        <li><a class="currency"  id="EGP">Egyptian Pound (EGP)</a></li>
                                        <li><a class="currency"  id="ERN">Eritrean Nakfa (ERN)</a></li>
                                        <li><a class="currency"  id="ETB">Ethiopian Birr (ETB)</a></li>
                                        <li><a class="currency"  id="EUR">Euro (€)</a></li>
                                        <li><a class="currency"  id="FIM">Finnish Markka (FIM)</a></li>
                                        <li><a class="currency"  id="FJD">Fijian Dollar (FJD)</a></li>
                                        <li><a class="currency"  id="FKP">Falkland Islands Pound (FKP)</a></li>
                                        <li><a class="currency"  id="FRF">French Franc (FRF)</a></li>
                                        <li><a class="currency"  id="GBP">British Pound (£)</a></li>
                                        <li><a class="currency"  id="GEL">Georgian Lari (GEL)</a></li>
                                        <li><a class="currency"  id="GHS">Ghanaian Cedi (GHS)</a></li>
                                        <li><a class="currency"  id="GIP">Gibraltar Pound (GIP)</a></li>
                                        <li><a class="currency"  id="GMD">Gambian Dalasi (GMD)</a></li>
                                        <li><a class="currency"  id="GNF">Guinean Franc (GNF)</a></li>
                                    </div>

                                    <div class="col-md-3">
                                        <li><a class="currency"  id="KGS">Kyrgystani Som (KGS)</a></li>
                                        <li><a class="currency"  id="KHR">Cambodian Riel (KHR)</a></li>
                                        <li><a class="currency"  id="KMF">Comorian Franc (KMF)</a></li>
                                        <li><a class="currency"  id="KPW">North Korean Won (KPW)</a></li>
                                        <li><a class="currency"  id="KRW">South Korean Won (₩)</a></li>
                                        <li><a class="currency"  id="KWD">Kuwaiti Dinar (KWD)</a></li>
                                        <li><a class="currency"  id="KYD">Cayman Islands Dollar (KYD)</a></li>
                                        <li><a class="currency"  id="KZT">Kazakhstani Tenge (KZT)</a></li>
                                        <li><a class="currency"  id="LAK">Laotian Kip (LAK)</a></li>
                                        <li><a class="currency"  id="LBP">Lebanese Pound (LBP)</a></li>
                                        <li><a class="currency"  id="LKR">Sri Lankan Rupee (LKR)</a></li>
                                        <li><a class="currency"  id="LRD">Liberian Dollar (LRD)</a></li>
                                        <li><a class="currency"  id="LSL">Lesotho Loti (LSL)</a></li>
                                        <li><a class="currency"  id="LTL">Lithuanian Litas (LTL)</a></li>
                                        <li><a class="currency"  id="LVL">Latvian Lats (LVL)</a></li>
                                        <li><a class="currency"  id="LYD">Libyan Dinar (LYD)</a></li>
                                        <li><a class="currency"  id="MAD">Moroccan Dirham (MAD)</a></li>
                                        <li><a class="currency"  id="MDL">Moldovan Leu (MDL)</a></li>
                                        <li><a class="currency"  id="MGA">Malagasy Ariary (MGA)</a></li>
                                        <li><a class="currency"  id="MKD">Macedonian Denar (MKD)</a></li>
                                        <li><a class="currency"  id="MMK">Myanmar Kyat (MMK)</a></li>
                                        <li><a class="currency"  id="MNT">Mongolian Tugrik (MNT)</a></li>
                                        <li><a class="currency"  id="MOP">Macanese Pataca (MOP)</a></li>
                                        <li><a class="currency"  id="MRO">Mauritanian Ouguiya (MRO)</a></li>
                                        <li><a class="currency"  id="MUR">Mauritian Rupee (MUR)</a></li>
                                        <li><a class="currency"  id="MVR">Maldivian Rufiyaa (MVR)</a></li>
                                        <li><a class="currency"  id="MWK">Malawian Kwacha (MWK)</a></li>
                                        <li><a class="currency"  id="MXN">Mexican Peso (MX$)</a></li>
                                        <li><a class="currency"  id="MYR">Malaysian Ringgit (MYR)</a></li>
                                        <li><a class="currency"  id="MZN">Mozambican Metical (MZN)</a></li>
                                        <li><a class="currency"  id="NAD">Namibian Dollar (NAD)</a></li>
                                        <li><a class="currency"  id="NGN">Nigerian Naira (NGN)</a></li>
                                        <li><a class="currency"  id="NIO">Nicaraguan Córdoba (NIO)</a></li>
                                        <li><a class="currency"  id="NOK">Norwegian Krone (NOK)</a></li>
                                        <li><a class="currency"  id="NPR">Nepalese Rupee (NPR)</a></li>
                                        <li><a class="currency"  id="NZD">New Zealand Dollar (NZ$)</a></li>
                                        <li><a class="currency"  id="OMR">Omani Rial (OMR)</a></li>
                                        <li><a class="currency"  id="PAB">Panamanian Balboa (PAB)</a></li>
                                    </div>

                                    <div class="col-md-3">
                                        <li><a class="currency"  id="SGD">Singapore Dollar (SGD)</a></li>
                                        <li><a class="currency"  id="SHP">St. Helena Pound (SHP)</a></li>
                                        <li><a class="currency"  id="SKK">Slovak Koruna (SKK)</a></li>
                                        <li><a class="currency"  id="SLL">Sierra Leonean Leone (SLL)</a></li>
                                        <li><a class="currency"  id="SOS">Somali Shilling (SOS)</a></li>
                                        <li><a class="currency"  id="SRD">Surinamese Dollar (SRD)</a></li>
                                        <li><a class="currency"  id="STD">São Tomé &amp; Príncipe Dobra (STD)</a></li>
                                        <li><a class="currency"  id="SVC">Salvadoran Colón (SVC)</a></li>
                                        <li><a class="currency"  id="SYP">Syrian Pound (SYP)</a></li>
                                        <li><a class="currency"  id="SZL">Swazi Lilangeni (SZL)</a></li>
                                        <li><a class="currency"  id="THB">Thai Baht (THB)</a></li>
                                        <li><a class="currency"  id="TJS">Tajikistani Somoni (TJS)</a></li>
                                        <li><a class="currency"  id="TMT">Turkmenistani Manat (TMT)</a></li>
                                        <li><a class="currency"  id="TND">Tunisian Dinar (TND)</a></li>
                                        <li><a class="currency"  id="TOP">Tongan Paʻanga (TOP)</a></li>
                                        <li><a class="currency"  id="TRY">Turkish Lira (TRY)</a></li>
                                        <li><a class="currency"  id="TTD">Trinidad &amp; Tobago Dollar (TTD)</a></li>
                                        <li><a class="currency"  id="TWD">New Taiwan Dollar (NT$)</a></li>
                                        <li><a class="currency"  id="TZS">Tanzanian Shilling (TZS)</a></li>
                                        <li><a class="currency"  id="UAH">Ukrainian Hryvnia (UAH)</a></li>
                                        <li><a class="currency"  id="UGX">Ugandan Shilling (UGX)</a></li>
                                        <li><a class="currency" SELECTED id="USD">US Dollar ($)</a></li>
                                        <li><a class="currency"  id="UYU">Uruguayan Peso (UYU)</a></li>
                                        <li><a class="currency"  id="UZS">Uzbekistani Som (UZS)</a></li>
                                        <li><a class="currency"  id="VEF">Venezuelan Bolívar (VEF)</a></li>
                                        <li><a class="currency"  id="VND">Vietnamese Dong (₫)</a></li>
                                        <li><a class="currency"  id="VUV">Vanuatu Vatu (VUV)</a></li>
                                        <li><a class="currency"  id="WST">Samoan Tala (WST)</a></li>
                                        <li><a class="currency"  id="XAF">Central African CFA Franc (FCFA)</a></li>
                                        <li><a class="currency"  id="XCD">East Caribbean Dollar (EC$)</a></li>
                                        <li><a class="currency"  id="XDR">Special Drawing Rights (XDR)</a></li>
                                        <li><a class="currency"  id="XOF">West African CFA Franc (CFA)</a></li>
                                        <li><a class="currency"  id="XPF">CFP Franc (CFPF)</a></li>
                                        <li><a class="currency"  id="YER">Yemeni Rial (YER)</a></li>
                                        <li><a class="currency"  id="ZAR">South African Rand (ZAR)</a></li>
                                        <li><a class="currency"  id="ZMK">Zambian Kwacha (1968–2012) (ZMK)</a></li>
                                        <li><a class="currency"  id="ZMW">Zambian Kwacha (ZMW)</a></li>
                                        <li><a class="currency"  id="ZWL">Zimbabwean Dollar (2009) (ZWL)</a></li>
                                        <li><a class="currency"  id="LKR">Sri Lankan Rupee (LKR)</a></li>
                                    </div>

                                    <div class="col-md-3">
                                        <li><a class="currency"  id="AED">United Arab Emirates Dirham (AED)</a></li>
                                        <li><a class="currency"  id="AFN">Afghan Afghani (AFN)</a></li>
                                        <li><a class="currency"  id="ALL">Albanian Lek (ALL)</a></li>
                                        <li><a class="currency"  id="AMD">Armenian Dram (AMD)</a></li>
                                        <li><a class="currency"  id="ANG">Netherlands Antillean Guilder (ANG)</a></li>
                                        <li><a class="currency"  id="AOA">Angolan Kwanza (AOA)</a></li>
                                        <li><a class="currency"  id="ARS">Argentine Peso (ARS)</a></li>
                                        <li><a class="currency"  id="AUD">Australian Dollar (A$)</a></li>
                                        <li><a class="currency"  id="AWG">Aruban Florin (AWG)</a></li>
                                        <li><a class="currency"  id="AZN">Azerbaijani Manat (AZN)</a></li>
                                        <li><a class="currency"  id="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</a></li>
                                        <li><a class="currency"  id="BBD">Barbadian Dollar (BBD)</a></li>
                                        <li><a class="currency"  id="BDT">Bangladeshi Taka (BDT)</a></li>
                                        <li><a class="currency"  id="BGN">Bulgarian Lev (BGN)</a></li>
                                        <li><a class="currency"  id="BHD">Bahraini Dinar (BHD)</a></li>
                                        <li><a class="currency"  id="BIF">Burundian Franc (BIF)</a></li>
                                        <li><a class="currency"  id="BMD">Bermudan Dollar (BMD)</a></li>
                                        <li><a class="currency"  id="BND">Brunei Dollar (BND)</a></li>
                                        <li><a class="currency"  id="BOB">Bolivian Boliviano (BOB)</a></li>
                                        <li><a class="currency"  id="GTQ">Guatemalan Quetzal (GTQ)</a></li>
                                        <li><a class="currency"  id="GYD">Guyanaese Dollar (GYD)</a></li>
                                        <li><a class="currency"  id="HKD">Hong Kong Dollar (HK$)</a></li>
                                        <li><a class="currency"  id="HNL">Honduran Lempira (HNL)</a></li>
                                        <li><a class="currency"  id="HRK">Croatian Kuna (HRK)</a></li>
                                        <li><a class="currency"  id="HTG">Haitian Gourde (HTG)</a></li>
                                        <li><a class="currency"  id="HUF">Hungarian Forint (HUF)</a></li>
                                        <li><a class="currency"  id="IDR">Indonesian Rupiah (IDR)</a></li>
                                        <li><a class="currency"  id="IEP">Irish Pound (IEP)</a></li>
                                        <li><a class="currency"  id="ILS">Israeli New Sheqel (₪)</a></li>
                                        <li><a class="currency"  id="INR">Indian Rupee (Rs.)</a></li>
                                        <li><a class="currency"  id="IQD">Iraqi Dinar (IQD)</a></li>
                                        <li><a class="currency"  id="IRR">Iranian Rial (IRR)</a></li>
                                        <li><a class="currency"  id="ISK">Icelandic Króna (ISK)</a></li>
                                        <li><a class="currency"  id="ITL">Italian Lira (ITL)</a></li>
                                        <li><a class="currency"  id="JMD">Jamaican Dollar (JMD)</a></li>
                                        <li><a class="currency"  id="JOD">Jordanian Dinar (JOD)</a></li>
                                        <li><a class="currency"  id="JPY">Japanese Yen (¥)</a></li>
                                        <li><a class="currency"  id="KES">Kenyan Shilling (KES)</a></li>
                                        <li><a class="currency"  id="PEN">Peruvian Nuevo Sol (PEN)</a></li>
                                        <li><a class="currency"  id="PGK">Papua New Guinean Kina (PGK)</a></li>
                                        <li><a class="currency"  id="PHP">Philippine Peso (Php)</a></li>
                                        <li><a class="currency"  id="PKG">PKG (PKG)</a></li>
                                        <li><a class="currency"  id="PKR">Pakistani Rupee (PKR)</a></li>
                                        <li><a class="currency"  id="PLN">Polish Zloty (PLN)</a></li>
                                        <li><a class="currency"  id="PYG">Paraguayan Guarani (PYG)</a></li>
                                        <li><a class="currency"  id="QAR">Qatari Rial (QAR)</a></li>
                                        <li><a class="currency"  id="RON">Romanian Leu (RON)</a></li>
                                        <li><a class="currency"  id="RSD">Serbian Dinar (RSD)</a></li>
                                        <li><a class="currency"  id="RUB">Russian Ruble (RUB)</a></li>
                                        <li><a class="currency"  id="RWF">Rwandan Franc (RWF)</a></li>
                                        <li><a class="currency"  id="SAR">Saudi Riyal (SAR)</a></li>
                                        <li><a class="currency"  id="SBD">Solomon Islands Dollar (SBD)</a></li>
                                        <li><a class="currency"  id="SCR">Seychellois Rupee (SCR)</a></li>
                                        <li><a class="currency"  id="SDG">Sudanese Pound (SDG)</a></li>
                                        <li><a class="currency"  id="SEK">Swedish Krona (SEK)</a></li>
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
                                        <span class="count">{{ count(Session::get('rate_box_details')) + count(Session::get('transport_cart_box')) + count(Session::get('predefined_transport')) + count(Session::get('excursion_cart_details')) }}</span>
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

<script type="text/javascript">
    $('.aa').click(function () {
        $('#bb').submit();
    });
</script>