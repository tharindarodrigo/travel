@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - </title>

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
            /*width: 100%;*/
            height: 100%;
        }

        .guest_review {
            width: 330px;
            height: 250px;
        }
        .m1{

        }
    </style>

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

@endsection

@section('content')

    <body id="top">

    <!-- navbar -->
    <div class="navbar-wrapper2 navbar-fixed-top">

        @include('layout.navbar')

    </div>
    <!-- / navbar -->

    <!--
    #################################
            - THEMEPUNCH BANNER -
    #################################
    -->
    <div id="dajy" class="fullscreen-container mtslide sliderbg fixed">

        @include('layout.slider')

    </div>

    <!--
    ##############################
     - ACTIVATE THE BANNER HERE -
    ##############################
    -->

    <script type="text/javascript">

        var tpj = jQuery;
        tpj.noConflict();

        tpj(document).ready(function () {

            if (tpj.fn.cssOriginal != undefined)
                tpj.fn.css = tpj.fn.cssOriginal;

            tpj('.fullscreenbanner').revolution(
                    {
                        delay: 9000,
                        startwidth: 1170,
                        startheight: 600,
                        onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off

                        thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                        thumbHeight: 50,
                        thumbAmount: 3,
                        hideThumbs: 0,
                        navigationType: "bullet", // bullet, thumb, none
                        navigationArrows: "solo", // nexttobullets, solo (old name verticalcentered), none

                        navigationStyle: false, // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


                        navigationHAlign: "left", // Vertical Align top,center,bottom
                        navigationVAlign: "bottom", // Horizontal Align left,center,right
                        navigationHOffset: 30,
                        navigationVOffset: 30,
                        soloArrowLeftHalign: "left",
                        soloArrowLeftValign: "center",
                        soloArrowLeftHOffset: 20,
                        soloArrowLeftVOffset: 0,
                        soloArrowRightHalign: "right",
                        soloArrowRightValign: "center",
                        soloArrowRightHOffset: 20,
                        soloArrowRightVOffset: 0,
                        touchenabled: "on", // Enable Swipe Function : on/off


                        stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                        stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                        hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                        hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value
                        hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value


                        fullWidth: "on", // Same time only Enable FullScreen of FullWidth !!
                        fullScreen: "off", // Same time only Enable FullScreen of FullWidth !!


                        shadow: 0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

                    });


        });
    </script>

    <!-- WRAP -->

    <div class="wrap cstyle03">

        <div class="container mt-200 z-index100">
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
                                    <a href="list4.html">
                                        <img src="images/spacer.png" alt=""/>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="ctitle" style="font-size: 16px;"> Anilana Pasikuda
                            <a href="#">
                                <img src="images/spacer.png" alt=""/>
                            </a>
                            <span>$59.99</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="shadow cstyle05">
                        <div class="fwi one">
                            {{ HTML::image('images/site/1339_Serene_Pavilion.png', '', array('class' => 'img_home_offer'))}}
                            <div class="mhover none">
                                <span class="icon">
                                    <a href="list4.html">
                                        <img src="images/spacer.png" alt=""/>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="ctitle" style="font-size: 16px;"> Serene Pavilion
                            <a href="#">
                                <img src="images/spacer.png" alt=""/>
                            </a>
                            <span>$59.99</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="lastminute3">

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
                        @foreach($tour as $tours)
                            <div class="deal">
                                <a href="#">
                                    <img src="images/site/1.png" alt="" class="dealthumb"/>
                                </a>

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $tours->tour_title))}}"
                                           class="dark">{{ $tours->tour_title }}</a>
                                    </p>
                                    {{ HTML::image('images/smallrating-4.png', '', array('class' => 'mt-10'))}}
                                </div>
                            </div>
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
                        @foreach($excursion as $excursions)
                            <div class="deal">
                                <a href="#">
                                    <img src="images/site/2.png" alt="" class="dealthumb"/>
                                </a>

                                <div class="dealtitle">
                                    <p>
                                        <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursions->excursion_type))}}"
                                           class="dark">
                                            {{ $excursions->excursion_type }}
                                        </a>
                                    </p>
                                    {{ HTML::image('images/smallrating-4.png', '', array('class' => 'mt-10'))}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- End of first row-->

                    <div class="col-md-4">

                        <div class="lbl">
                            <a href="">
                                {{ HTML::image('images/review_banner.png', '', array('class' => 'fwimg'))}}
                            </a>

                            <div class="smallblacklabel">Guest Reviews</div>
                        </div>

                        @foreach($user_review as $reviews)
                            <div class="deal">
                                <a href="#">
                                    <img src="images/site/3.png" alt="" class="dealthumb"/>
                                </a>

                                {{--<div class="dealtitle">--}}
                                {{--<p>--}}
                                {{--<?php--}}
                                {{--$get_city_id = DB::table('cities')->where('id', $reviews->hotel->id)->first();--}}
                                {{--$city = $get_city_id->city;--}}
                                {{--?>--}}

                                {{--<a href="{{URL::to('sri-lanka/'.str_replace(' ', '-', $city).'/'.str_replace(' ', '-', $reviews->hotel->name))}}"--}}
                                {{--class="dark">{{ $reviews->review }}--}}
                                {{--- {{ $reviews->hotel->name }}</a>--}}

                                {{--</p>--}}
                                {{--<?php--}}
                                {{--$stars = $reviews->hotel->star_category_id;--}}
                                {{--$star = DB::table('star_categories')->where('id', $stars)->first();--}}
                                {{--$hotel_star = $star->stars;--}}
                                {{--?>--}}

                                {{--{{ Star::star_loop_blue($hotel_star)}}--}}

                                {{--</div>--}}
                                {{--<div class="dealprice">--}}

                                {{--<?php $low_hotel_rate = RoomRates::lowestHotelRate($reviews->hotel_id, $st_date, $ed_date); ?>--}}

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

                                <div class="dealtitle">

                                </div>
                            </div>
                        @endforeach
                        {{ HTML::image('images/site/guest_review.png', '', array('class' => 'guest_review'))}}
                    </div>
                    <!-- End of first row-->
                </div>
            </div>
        </div>

        <!-- END OF srilankahotels.travel - tours -->


        <div class="container cstyle06">

            <div class="row anim2">
                <div class="col-md-3">
                    <h2>Top Destination</h2><br/>
                    Start your search with a look at the best rates on our site.
                </div>
                <div class="col-md-9">

                    <!-- Carousel -->
                    <div class="wrapper">
                        <div class="list_carousel">
                            <ul id="foo">
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/1.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Kandy</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/2.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Anuradhapura</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/3.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>The Galle Fort</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/4.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Dambulla</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="list3.html">--}}
                                        {{--{{ HTML::image('images/top_destination/5.jpg', '', array('class' => 'top_destination'))}}--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="list3.html">--}}
                                        {{--{{ HTML::image('images/top_destination/6.jpg', '', array('class' => 'top_destination'))}}--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="list3.html">--}}
                                        {{--{{ HTML::image('images/top_destination/7.jpg', '', array('class' => 'top_destination'))}}--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/8.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Yala National Park</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/9.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>The Pinnawela Elephant Orphanage</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/10.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Nuwara Eliya</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list3.html">
                                        {{ HTML::image('images/top_destination/11.jpg', '', array('class' => 'top_destination'))}}
                                    </a>
                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Sigiriya</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <a id="prev_btn" class="prev" href="#"><img src="images/spacer.png" alt=""/></a>
                            <a id="next_btn" class="next" href="#"><img src="images/spacer.png" alt=""/></a>
                        </div>
                    </div>

                </div>
            </div>

            <br/>
            <hr class="featurette-divider2">
            <br/>

            <div class="row anim3">
                <div class="col-md-3">
                    <h2>Our Partners</h2><br/>
                    Dedicated to excellent service
                </div>

                <div class="col-md-9">
                    <!-- Carousel -->
                    <div class="wrapper">
                        <div class="list_carousel" style="height: 150px;">
                            <ul id="foo2">
                                <li>
                                    <a href="list3.html"><img src="images/site/101.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/102.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/103.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/104.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/105.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/108.jpg" style="padding-top: 50px;"
                                                              alt=""/></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                            <a id="prev_btn2" class="prev" href="#"><img src="images/spacer.png" alt=""/></a>
                            <a id="next_btn2" class="next" href="#"><img src="images/spacer.png" alt=""/></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- / WRAP -->

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

