@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - </title>

@endsection

@section('custom_style')

    <style type="text/css">
        .tour_img_index {
            width: 60px;
            height: 60px;
        }

        .top_destination {
            width: 200px;
            height: 180px;
        }

        .fwimg {
            width: 797px;
            height: 107px;
        }

        .img_home_offer {
            /*width: 100%;*/
            height: 100%;
        }

        .guest_review {
            width: 330px;
            height: 250px;
        }

        .lastminute3_head {
            height: 42px;
        {{--            background-image: url('{{ asset(public_path().'/images/site/confideance-background.png') }}');--}} margin-top: -30px;
            background: #3498db;
            color: #FFFFFF;
            /*border-radius: 14px 14px 14px 14px;*/
            /*-moz-border-radius: 14px 14px 14px 14px;*/
            /*-webkit-border-radius: 14px 14px 14px 14px;*/
            border: 0px solid #000000;
        }

        .lastminute3_img {
            /*margin-left: -50px;*/
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

    </style>

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

@endsection

@section('content')

    <body id="top">
{{dd(Booking::find(Booking::max('id'))->reference_number)}}
    <!-- navbar -->
    @include('layout.navbar')
    <!-- / navbar -->

    <!--
    #################################
            - THEMEPUNCH BANNER -
    #################################
    -->

    <div id="" class="mtslide sliderbg fixed">
        @include('layout.slider')
    </div>

    <!--
    ##############################
     - ACTIVATE THE BANNER HERE -
    ##############################
    -->

    <!-- WRAP -->

    <div class="wrap cstyle03">

        <div style="" id="index_body" class="container mt-200 z-index100">
            <div class="row">

                <div class="col-md-4">
                    @include('layout.reservation_box')
                </div>

                <div class="col-md-4">
                    <div class="shadow cstyle05">
                        <div class="fwi one">
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

                <div class="col-md-4">
                    <div class="shadow cstyle05">
                        <div class="fwi one">
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
        </div>

        <!--srilankahotels.travel - tours-->

        <div class="deals3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="lbl">
                            <a href="">
                                {{ HTML::image('images/tour_images/tour_banner.png', '', array('class' => 'fwimg'))}}
                            </a>

                            <div class="smallblacklabel">Tours</div>
                        </div>
                        <?php $j = 7; ?>
                        @foreach($tour as $tours)
                            <div class="deal">
                                {{ HTML::image('images/tour_images/index/'.$tours->id.'.jpg', '', array('class' => 'mt-10 tour_img_index left'))}}

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $tours->tour_title))}}"
                                           class="dark">{{ $tours->tour_title }}</a>
                                    </p>
                                    {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}

                                </div>

                                {{--{{ HTML::image('images/site/kk.png', '', array('class' => 'right ddd'))}}--}}

                                <div class="right" style="margin-top: -10px">
                                    <div id="commentbox">
                                        <div id="commentrating">Rating</div>
                                        <div id="commentnums">
                                            {{ $j }}/7
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $j = $j - 1?>
                        @endforeach
                    </div>
                    <!-- End of first row-->

                    <div class="col-md-4">
                        <div class="lbl">
                            <a href="">
                                {{ HTML::image('images/excursion_images/excursion_banner.jpg', '', array('class' => 'fwimg'))}}
                            </a>

                            <div class="smallblacklabel">Excursion</div>
                        </div>
                        <?php $i = 7; ?>
                        @foreach($excursion as $excursions)
                            <div class="deal">
                                {{ HTML::image('images/excursion_images/index/'.$excursions->id.'.jpg', '', array('class' => 'mt-10 tour_img_index left'))}}

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursions->excursion_type))}}"
                                           class="dark">
                                            {{ $excursions->excursion_type }}
                                        </a>
                                    </p>
                                    {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}
                                </div>

                                <div class="right" style="margin-top: -10px">
                                    <div id="commentbox">
                                        <div id="commentrating">Rating</div>
                                        <div id="commentnums">
                                            {{ $i }}/7
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i = $i - 1; ?>
                        @endforeach

                    </div>
                    <!-- End of first row-->

                    <div class="col-md-4">

                        <div class="lbl">
                            <a href="">
                                {{ HTML::image('images/top_destination.jpg', '', array('class' => 'fwimg'))}}
                            </a>

                            <div class="smallblacklabel">Top Destination</div>
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

                        <div class="deal">
                            {{ HTML::image('images/city_images/index/kandy.jpg', '', array('class' => 'mt-10 tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a href=""
                                       class="dark">
                                        Kandy
                                    </a>
                                </p>
                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}
                                <p style="font-size: 10px; margin-top: -7px"> Temple of the Tooth </p>
                            </div>

                            <div class="right" style="margin-top: -10px">
                                <div id="commentbox">
                                    <div id="commentrating">Rating</div>
                                    <div id="commentnums">
                                        7/7
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="deal">
                            {{ HTML::image('images/city_images/index/sigiriya.jpg', '', array('class' => 'mt-10 tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a href=""
                                       class="dark">
                                        Sigiriya
                                    </a>
                                </p>
                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}
                                <p style="font-size: 10px; margin-top: -7px"> Sigiriya Rock - Kingdom </p>
                            </div>

                            <div class="right" style="margin-top: -10px">
                                <div id="commentbox">
                                    <div id="commentrating">Rating</div>
                                    <div id="commentnums">
                                        6/7
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="deal">
                            {{ HTML::image('images/city_images/index/pinnawala.jpg', '', array('class' => 'mt-10 tour_img_index left'))}}

                            <div class="dealtitle">
                                <p>
                                    <a href=""
                                       class="dark">
                                        Pinnawala
                                    </a>
                                </p>
                                {{ HTML::image('images/user-rating-5.png', '', array('class' => 'mt-10'))}}
                                <p style="font-size: 10px; margin-top: -7px"> Elephant Orphanage </p>
                            </div>

                            <div class="right" style="margin-top: -10px">
                                <div id="commentbox">
                                    <div id="commentrating">Rating</div>
                                    <div id="commentnums">
                                        5/7
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of first row-->
                </div>
            </div>
        </div>

        <!-- END OF srilankahotels.travel - tours -->

        <br/><br/>

        <!-- / WRAP -->

        <div class="lastminute3 container" style="background: #FFFFFF !important;">
            <div class="hidden-xs hidden-md lastminute3_head">
                <span>{{ HTML::image('images/site/bookwithconfitxt.png', '', array('class' => 'lastminute3_img'))}}</span>
                <span style="font-size: 12px; text-align: right"> Rated among the top 5 traveling Sites to Sri Lanka </span>
            </div>

            <div class="hidden-xs hidden-md lastminute3_content" style="text-align: left !important;">
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

        @endsection
    </div>
    @section('script')

        <!-- This page JS -->
        {{ HTML::script('assets/js/js-index3.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

    @endsection

    </body>

@stop

