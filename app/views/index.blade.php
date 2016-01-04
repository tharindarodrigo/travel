@extends('layout.master')

@section('title')

    <title>Sri Lanka Hotels - Best Hotels In Sri Lanka</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="Sri lanka Hotels,Hotels In Sri Lanka,Sri Lanka Accommodation,Accommodation In Sri Lanka,
          Sri Lanka Tours,Business Hotels In Sri Lanka,Comfort Hotels In Sri Lanka,One Day Excursion Sri Lanka
          Beach Hotels In Sri Lanka,Cheap Hotels In Sri Lanka,Budget Hotels In Sri Lanka,Book Hotels Online Sri Lanka,
          Online Hotel Booking,5 Star Hotels In Sri Lanka">
    <meta name="description"
          content="Sri Lanka Hotels holds a solid name in the world of travel and tourism. Sri Lanka Hotels can be used to reserve hotels and tours online for your holidays.We give the best hotel rates. You can book hotels online through us">

@endsection

@section('custom_style')

    <style type="text/css">
        .top_destination {
            width: 200px;
            height: 180px;
        }

        .fwimg {
            width: 797px;
            height: 107px;
        }

        .img_home_offer {
            background: #efefef;
            /*width: 100%;*/
            height: 100%;
        }

        .guest_review {
            width: 330px;
            height: 250px;
        }

        .lastminute3_head {
            height: 42px;
            background: #3498db;
            color: #FFFFFF;
            /*border-radius: 14px 14px 14px 14px;*/
            /*-moz-border-radius: 14px 14px 14px 14px;*/
            /*-webkit-border-radius: 14px 14px 14px 14px;*/
            border: 0px solid #000000;
        }

        .lastminute3_img {
            margin-top: 7px;
            margin-left: 20px;
        }

        .lastminute3_img_2 {
            /*display: inline;*/
        }

        #commentbox {
            background-image: url(images/site/aaaa.png);
            background-repeat: no-repeat;
            z-index: 90;
            height: 50px;
            width: 90px;
            text-align: center;
            box-shadow: 5px 5px 5px #888888;
        }

        #commentrating {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-weight: bold;
            color: #FFF;
            padding-top: 8px;
        }

        #commentnums {
            color: #FFF;
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 14px;
            font-weight: bolder;
        }

        .ddd {
            margin-top: -10px;
        }

        .shadow {
            background: #4b646f !important;
            height: 254px !important;
        }

        .deal {
            padding: 0px !important;
            height: 30px !important;
            min-height: 50px !important;
            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 0px solid #000000;
            background: #FFFFFF;
            margin: 5px !important;
            padding-bottom: 0px !important;
        }

        .dealtitle {
            padding-top: 10px;
            font-size: 14px;
            line-height: 14px !important;
        }

        .fwimg {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            border: 0px solid #000000;
            height: 80px;
        }

        .smallblacklabel {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            border: 0px solid #000000;
            /*margin-left: 10px;*/
        }

        .tour_img_index {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            border: 2px solid #3498db;
            width: 50px;
            height: 50px;
        }

        .tour_img_index1 {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            width: 50px;
            height: 50px;
        }

        .categorylayer {
            padding: 2px;
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            background: #EAE7E7;
        }

        .cstyle05 {
            height: auto !important;
        }

        .lastminute3_content_bac {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            background: #EAE7E7 !important;
        }
    </style>

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

@endsection

@section('content')

    <body id="top">

    <!-- navbar -->
    @include('layout.navbar')
    <!-- / navbar -->

    <div style="position: absolute" class="mtslide sliderbg">
        @include('layout.slider')
    </div>


    <div class="container wrap cstyle03">
        <div class="col-md-4" style="position: absolute; top: -280px;">
            @include('layout.reservation_box')
        </div>

        <div class="col-md-4 hidden-xs hidden-md" style="position: absolute; top: -280px; left: 400px;">
            <div class="shadow ">
                <div class="fwi one" style="background: #FFFFFF">
                    {{ HTML::image('images/site/993_anilana pasikuda1.png', '', array('class' => 'img_home_offer'))}}
                    <div class="mhover none">
                                <span class="icon">
                                    <a href="{{URL::to('sri-lanka/-Passikudah/Anilana-Passikudah')}}">
                                        <img src="images/spacer.png" alt=""/>
                                    </a>
                                </span>
                    </div>
                </div>
                <div class="ctitle" style="font-size: 16px;"> Anilana Pasikuda
                    <a href="#">
                        <img src="images/spacer.png" alt=""/>
                    </a>
                    <span>{{ Session::get('currency') . '&nbsp;' . ( (number_format(((RoomRates::lowestHotelRate(993, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', ''))); }} </span>
                </div>
            </div>
        </div>

        <div class="col-md-4 hidden-xs hidden-md" style="position: absolute; top: -280px; left: 780px;">
            <div class="shadow ">
                <div class="fwi one" style="background: #FFFFFF">
                    {{ HTML::image('images/site/1339_Serene_Pavilion.png', '', array('class' => 'img_home_offer'))}}
                    <div class="mhover none">
                                <span class="icon">
                                    <a href="{{URL::to('sri-lanka/Wadduwa/Serene-Pavilions')}}">
                                        <img src="images/spacer.png" alt=""/>
                                    </a>
                                </span>
                    </div>
                </div>
                <div class="ctitle" style="font-size: 16px;"> Serene Pavilion
                    <a href="#">
                        <img src="images/spacer.png" alt=""/>
                    </a>
                    <span>{{ Session::get('currency') . '&nbsp;' . ( number_format(((RoomRates::lowestHotelRate(1339, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', '')); }}</span>
                </div>
            </div>
        </div>

    </div>

    <div style="margin-top: 60px !important;" class="wrap cstyle03">

        <div style="padding-left: 0px; padding-right: 0px" class="container">
            <div class="col-md-3">
                <div class=" cstyle05">
                    <div class="fwi one" style="background: #fcf2f2">
                        <a href="{{URL::to('sri-lanka/Bentota/Centara-Ceysands-Resort-&-Spa')}}">
                            {{ HTML::image('images/special_offers/1.png', '', array('class' => 'img_home_offer'))}}
                        </a>
                        {{--<div class="mhover none">--}}
                        {{--<span class="icon">--}}
                        {{--<a href="{{URL::to('sri-lanka/-Passikudah/Anilana-Passikudah')}}">--}}
                        {{--<img src="images/spacer.png" alt=""/>--}}
                        {{--</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    {{--<div class="ctitle" style="font-size: 16px;"> Anilana Pasikuda--}}
                    {{--<a href="#">--}}
                    {{--<img src="images/spacer.png" alt=""/>--}}
                    {{--</a>--}}
                    {{--<span>{{ Session::get('currency') . '&nbsp;' . ( (number_format(((RoomRates::lowestHotelRate(993, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', ''))); }} </span>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="col-md-3">
                <div class=" cstyle05">
                    <div class="fwi one" style="background: #fcf2f2">
                        <a href="{{URL::to('sri-lanka/Bentota/Eden-Resort-&-Spa')}}">
                            {{ HTML::image('images/special_offers/2.png', '', array('class' => 'img_home_offer'))}}
                        </a>
                        {{--<div class="mhover none">--}}
                        {{--<span class="icon">--}}
                        {{--<a href="{{URL::to('sri-lanka/Wadduwa/Serene-Pavilions')}}">--}}
                        {{--<img src="images/spacer.png" alt=""/>--}}
                        {{--</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    {{--<div class="ctitle" style="font-size: 16px;"> Serene Pavilion--}}
                    {{--<a href="#">--}}
                    {{--<img src="images/spacer.png" alt=""/>--}}
                    {{--</a>--}}
                    {{--<span>{{ Session::get('currency') . '&nbsp;' . ( number_format(((RoomRates::lowestHotelRate(1339, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', '')); }}</span>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="col-md-3">
                <div class=" cstyle05">
                    <div class="fwi one" style="background: #fcf2f2">
                        <a href="{{URL::to('sri-lanka/Wadduwa/The-Blue-Water')}}">
                            {{ HTML::image('images/special_offers/3.png', '', array('class' => 'img_home_offer'))}}
                        </a>
                        {{--<div class="mhover none">--}}
                        {{--<span class="icon">--}}
                        {{--<a href="{{URL::to('sri-lanka/-Passikudah/Anilana-Passikudah')}}">--}}
                        {{--<img src="images/spacer.png" alt=""/>--}}
                        {{--</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    {{--<div class="ctitle" style="font-size: 16px;"> Anilana Pasikuda--}}
                    {{--<a href="#">--}}
                    {{--<img src="images/spacer.png" alt=""/>--}}
                    {{--</a>--}}
                    {{--<span>{{ Session::get('currency') . '&nbsp;' . ( (number_format(((RoomRates::lowestHotelRate(993, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', ''))); }} </span>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="col-md-3">
                <div class=" cstyle05">
                    <div class="fwi one" style="background: #fcf2f2">
                        <a href="{{URL::to('sri-lanka/Beruwela/The-Palms')}}">
                            {{ HTML::image('images/special_offers/4.png', '', array('class' => 'img_home_offer'))}}
                        </a>
                        {{--<div class="mhover none">--}}
                        {{--<span class="icon">--}}
                        {{--<a href="{{URL::to('sri-lanka/Wadduwa/Serene-Pavilions')}}">--}}
                        {{--<img src="images/spacer.png" alt=""/>--}}
                        {{--</a>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                    </div>
                    {{--<div class="ctitle" style="font-size: 16px;"> Serene Pavilion--}}
                    {{--<a href="#">--}}
                    {{--<img src="images/spacer.png" alt=""/>--}}
                    {{--</a>--}}
                    {{--<span>{{ Session::get('currency') . '&nbsp;' . ( number_format(((RoomRates::lowestHotelRate(1339, $st_date, $ed_date)) * Session::get('currency_rate')), 2, '.', '')); }}</span>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <br/>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="lbl">
                        <a href="">
                            {{ HTML::image('images/tour.jpg', '', array('class' => 'fwimg'))}}
                        </a>

                        {{--<div class="smallblacklabel">Tours</div>--}}
                    </div>
                    <?php $j = 7; ?>
                    <div class="categorylayer">
                        @foreach($tour as $tours)
                            <div class="deal">
                                {{ HTML::image('images/tour_images/index/'.$tours->id.'.png', '', array('class' => 'tour_img_index left', 'style' => 'border: none !important'))}}

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $tours->tour_title))}}"
                                           target="_blank" class="dark">{{ $tours->tour_title }}</a>
                                    </p>
                                    {{--                                    {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}

                                </div>

                                {{--{{ HTML::image('images/site/kk.png', '', array('class' => 'right ddd'))}}--}}

                                {{--<div class="right" style="margin-top: -10px">--}}
                                {{--<div id="commentbox">--}}
                                {{--<div id="commentrating">Rating</div>--}}
                                {{--<div id="commentnums">--}}
                                {{--{{ $j }}/7--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <?php $j = $j - 1?>
                        @endforeach
                    </div>
                </div>
                <!-- End of first row-->

                <div class="col-md-3">
                    <div class="lbl">
                        <a href="">
                            {{ HTML::image('images/excursion.jpg', '', array('class' => 'fwimg'))}}
                        </a>

                        {{--<div class="smallblacklabel">Excursion</div>--}}
                    </div>
                    <?php $i = 7; ?>
                    <div class="categorylayer">
                        @foreach($excursion as $excursions)
                            <div class="deal">
                                {{ HTML::image('images/excursion_images/index/'.$excursions->id.'.jpg', '', array('class' => 'tour_img_index left'))}}

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursions->ExcursionType->excursion_type).'/'.str_replace(' ', '-', $excursions->excursion))}}"
                                           target="_blank" class="dark">
                                            {{ $excursions->excursion }}
                                        </a>
                                    </p>
                                    {{--                                    {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                </div>

                                {{--<div class="right" style="margin-top: -10px">--}}
                                {{--<div id="commentbox">--}}
                                {{--<div id="commentrating">Rating</div>--}}
                                {{--<div id="commentnums">--}}
                                {{--{{ $i }}/7--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            <?php $i = $i - 1; ?>
                        @endforeach
                    </div>
                </div>
                <!-- End of first row-->

                <div class="col-md-3">
                    <div class="lbl">
                        <a href="">
                            {{ HTML::image('images/destination.jpg', '', array('class' => 'fwimg'))}}
                        </a>

                        {{--<div class="smallblacklabel">Top Destination</div>--}}
                    </div>

                    {{--@foreach($user_review as $reviews)--}}
                    {{--<div class="deal">--}}
                    {{--<a href="#">--}}
                    {{--<img src="images/site/3.png" alt="" class="dealthumb"/>--}}
                    {{--</a>--}}

                    {{--<div class="dealtitle">--}}
                    {{--<p>--}}
                    <?php
                    // $get_city_id = DB::table('cities')->where('id', $reviews->hotel->id)->first();
                    //  $city = $get_city_id->city;
                    ?>

                    {{--<a href="{{URL::to('sri-lanka/'.str_replace(' ', '-', $city).'/'.str_replace(' ', '-', $reviews->hotel->name))}}"--}}
                    {{--class="dark">{{ $reviews->review }}--}}
                    {{--- {{ $reviews->hotel->name }}</a>--}}

                    {{--</p>--}}
                    <?php
                    //$stars = $reviews->hotel->star_category_id;
                    // $star = DB::table('star_categoriesgh')->where('id', $stars)->first();
                    // $hotel_star = $star->stars;
                    ?>

                    {{--{{ Star::star_loop_blue($hotel_star)}}--}}

                    {{--</div>--}}
                    {{--<div class="dealprice">--}}

                    <?php //$low_hotel_rate = RoomRates::lowestHotelRate($reviews->hotel_id, $st_date, $ed_date); ?>

                    {{--@if(!empty($low_hotel_rate))--}}
                    {{--<span class="price">--}}
                    {{--$ {{ $low_hotel_rate }}--}}
                    {{--</span>--}}
                    {{--@else--}}
                    {{--<span class="price">--}}
                    {{--No rate--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="dealtitle">--}}

                    {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                    {{--{{ HTML::image('images/site/guest_review.png', '', array('class' => 'guest_review'))}}--}}
                    <div class="categorylayer">

                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'kandy_city', 'method' => 'POST', 'target' => '_blank' )) }}
                        <div class="deal">

                            {{ HTML::image('images/city_images/index/kandy.jpg', '', array('class' => 'tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a style="cursor: pointer" class="kandy dark">
                                        Kandy
                                    </a>
                                </p>
                                {{--                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                <p style="font-size: 10px; margin-top: -7px"> Temple of the Tooth </p>
                            </div>

                            <input type="hidden" name="city_or_acc_hidden" value="Kandy"/>
                            <script type="text/javascript">
                                $('.kandy').click(function () {
                                    $('#kandy_city').submit();
                                });
                            </script>

                        </div>
                        {{ Form::close() }}

                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'sigiriya_city', 'method' => 'POST', 'target' => '_blank' )) }}
                        <div class="deal">
                            {{ HTML::image('images/city_images/index/sigiriya.jpg', '', array('class' => 'tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a style="cursor: pointer" class="sigiriya dark">
                                        Sigiriya
                                    </a>
                                </p>
                                {{--                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                <p style="font-size: 10px; margin-top: -7px"> Sigiriya Rock - Kingdom </p>
                            </div>

                            <input type="hidden" name="city_or_acc_hidden" value="Sigiriya"/>
                            <script type="text/javascript">
                                $('.sigiriya').click(function () {
                                    $('#sigiriya_city').submit();
                                });
                            </script>

                        </div>
                        {{ Form::close() }}

                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'pinnawala_city', 'method' => 'POST', 'target' => '_blank' )) }}
                        <div class="deal">
                            {{ HTML::image('images/city_images/index/pinnawala.jpg', '', array('class' => 'tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a style="cursor: pointer" class="pinnawala dark">
                                        Pinnawala
                                    </a>
                                </p>
                                {{--                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                <p style="font-size: 10px; margin-top: -7px"> Elephant Orphanage </p>
                            </div>

                            <input type="hidden" name="city_or_acc_hidden" value="Pinnawala"/>
                            <script type="text/javascript">
                                $('.pinnawala').click(function () {
                                    $('#pinnawala_city').submit();
                                });
                            </script>

                        </div>
                        {{ Form::close() }}

                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'pasikuda_city', 'method' => 'POST', 'target' => '_blank' )) }}
                        <div class="deal">
                            {{ HTML::image('images/city_images/index/pasikuda.jpg', '', array('class' => 'tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a style="cursor: pointer" class="pasikuda dark">
                                        Pasikuda
                                    </a>
                                </p>
                                {{--                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                <p style="font-size: 10px; margin-top: -7px"> Nice Weather </p>
                            </div>

                            <input type="hidden" name="city_or_acc_hidden" value="Pasikuda"/>
                            <script type="text/javascript">
                                $('.pasikuda').click(function () {
                                    $('#pasikuda_city').submit();
                                });
                            </script>

                        </div>
                        {{ Form::close() }}

                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'bentota_city', 'method' => 'POST', 'target' => '_blank' )) }}
                        <div class="deal">
                            {{ HTML::image('images/city_images/index/bentota.jpg', '', array('class' => 'tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a style="cursor: pointer" class="bentota dark">
                                        Bentota
                                    </a>
                                </p>
                                {{--{{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}--}}
                                <p style="font-size: 10px; margin-top: -7px"> Beautiful Beach </p>
                            </div>

                            <input type="hidden" name="city_or_acc_hidden" value="Bentota"/>
                            <script type="text/javascript">
                                $('.bentota').click(function () {
                                    $('#bentota_city').submit();
                                });
                            </script>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <!-- End of first row-->

                <div class="col-md-3">
                    <div class="lbl">
                        <a href="">
                            {{ HTML::image('images/transport.jpg', '', array('class' => 'fwimg'))}}
                        </a>

                        {{--<div class="smallblacklabel">Top Destination</div>--}}
                    </div>

                    <div class="categorylayer">
                        @foreach($transport_packages as $transport_package)
                            <a href="{{ URL::to('transport-list') }}">
                                <div class="deal">
                                    {{ HTML::image('images/transport_images/vehicles/'.$transport_package->vehicle_id.'.jpg', '', array('class' => 'tour_img_index1 left'))}}

                                    <div class="dealtitle1" style="width: 100%; padding: 0px !important;">
                                        <table>
                                            <tr>
                                                <td style="font-size: 10px">
                                                    <span style="font-size: 12px; margin-top: -10px"> {{ City::where('id', $transport_package->origin)->first()->city }} </span>
                                                    <br/>
                                                    <span style="font-size: 12px; margin-top: -10px"> {{ City::where('id', $transport_package->destination)->first()->city }} </span>
                                                </td>
                                                <td class="green" style="right: -30px">
                                                    {{ Session::get('currency') }}<br/>
                                                    {{ number_format(($transport_package->rate ), 2, '.', '') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
                <!-- End of first row-->
            </div>
        </div>
        <br/>

        <div class="container">
            <div class="hidden-xs hidden-md lastminute3_head">
                <span style="margin-left: 20px;">{{ HTML::image('images/site/bookwithconfitxt.png', '', array('class' => 'lastminute3_img'))}}</span>
                <span style="font-size: 12px; text-align: right;"> Rated among the top 5 traveling Sites to Sri Lanka </span>
            </div>
            <br/>

            <div class="hidden-xs hidden-md lastminute3_content_bac" style="text-align: left !important;">
                <div class="lastminute3_content_bac">
                    <div class="col-md-4">
                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Low rates</h4>

                        <p style="font-size: 12px; display: block">No booking fees • Save money!</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => ''))}}
                        <h4 style="display: inline">No hidden charges</h4>

                        <p style="font-size: 12px; display: block">What you see is what you get!</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Book 24/7</h4>

                        <p style="font-size: 12px; display: block">Book online or over the telephone 24 hours a day</p>
                    </div>
                    <div class="col-md-4">
                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Instant confirmation</h4>

                        <p style="font-size: 12px; display: block">Booking online or via the telephone</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Satisfied guests</h4>

                        <p style="font-size: 12px; display: block">More than 1000 bookings daily</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Unbiased hotel reviews</h4>

                        <p style="font-size: 12px; display: block">10,000 hotel reviews from real guests</p>
                    </div>
                    <div class="col-md-4">
                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Over 500 Hotels</h4>

                        <p style="font-size: 12px; display: block">Linked with the very finest hotels in the island</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">We speak your language</h4>

                        <p style="font-size: 12px; display: block">We cater to all kinds of clients and guests</p>

                        {{ HTML::image('images/site/rightmark.png', '', array('class' => 'lastminute3_img_2'))}}
                        <h4 style="display: inline">Unlimited service</h4>

                        <p style="font-size: 12px; display: block">Provide you the best service and guarantee your
                            satisfaction</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection

    @section('script')

        <!-- This page JS -->
        {{ HTML::script('assets/js/js-index3.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

    @endsection

    </body>

@stop

