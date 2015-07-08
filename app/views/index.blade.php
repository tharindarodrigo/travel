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
    </style>

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
                        <div class="fwi one"><img src="images/hotel_images/bentota.jpg" alt="" height="100%"/>

                            <div class="mhover none"><span class="icon"><a href="list4.html"><img
                                                src="images/spacer.png"
                                                alt=""/></a></span></div>
                        </div>
                        <div class="ctitle" style="font-size: 16px;"> Bentota Beach Hotel <a href="list4.html"><img
                                        src="images/spacer.png" alt=""/></a>
                            <span>$59.99</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="shadow cstyle05">
                        <div class="fwi one"><img src="images/hotel_images/Hibiscus.jpg" alt="" height="100%"/>

                            <div class="mhover none"><span class="icon"><a href="list4.html"><img
                                                src="images/spacer.png"
                                                alt=""/></a></span></div>
                        </div>
                        <div class="ctitle" style="font-size: 16px;"> Hibiscus Beach Hotel <a href="list4.html"><img
                                        src="images/spacer.png" alt=""/></a>
                            <span>$59.99</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="lastminute3">
            <div class="container">
                {{--<img src="images/rating-4.png" alt=""/> <br />--}}
                {{--LAST MINUTE: <b>Barcelona</b> - 2 nights - Flight+4* Hotel, Dep 27h Aug from $209/person<br/>--}}

                {{--<form action="details.html">--}}
                {{--<button class="btn iosbtn" type="submit">Read more</button>--}}
                {{--</form>--}}
            </div>
        </div>

        <!--srilankahotels.travel - tours-->

        <div class="deals3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="lbl">
                            <a href="list4.html"><img src="images/egypt-thumb.jpg" alt="" class="fwimg"></a>

                            <div class="smallblacklabel">Tours</div>
                        </div>

                        <div class="deal">
                            <a href="details.html"><img src="images/site/1.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Diana Hotel</a></p>
                                <img src="images/smallrating-4.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$35</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/1.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Village Inn Studios & Family Apartments</a></p>
                                <img src="images/smallrating-3.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$49</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/1.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Palatino Hotel</a></p>
                                <img src="images/smallrating-4.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$90</span><br/>per night</p>
                            </div>
                        </div>
                    </div>
                    <!-- End of first row-->

                    <div class="col-md-4">
                        <div class="lbl">
                            <a href="list4.html"><img src="images/egypt-thumb.jpg" alt="" class="fwimg"></a>

                            <div class="smallblacklabel">Excursion</div>
                        </div>

                        <div class="deal">
                            <a href="details.html"><img src="images/site/2.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Comfort Suites Paradise Island</a></p>
                                <img src="images/smallrating-4.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Bahamas</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$29</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/2.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Barcelo Malaga</a></p>
                                <img src="images/smallrating-3.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Spain</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$32</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/2.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Palatino Hotel</a></p>
                                <img src="images/smallrating-3.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            ``
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$90</span><br/>per night</p>
                            </div>
                        </div>
                    </div>
                    <!-- End of first row-->

                    <div class="col-md-4">

                        <div class="lbl">
                            <a href="list4.html"><img src="images/egypt-thumb.jpg" alt="" class="fwimg"></a>

                            <div class="smallblacklabel">Guest Reviews</div>
                        </div>

                        <div class="deal">
                            <a href="details.html"><img src="images/site/3.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Parayso Hotel And Spa</a></p>
                                <img src="images/smallrating-4.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$49</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/3.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Village Inn Studios & Family Apartments</a></p>
                                <img src="images/smallrating-3.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$79</span><br/>per night</p>
                            </div>
                        </div>
                        <div class="deal">
                            <a href="details.html"><img src="images/site/3.png" alt="" class="dealthumb"/></a>

                            <div class="dealtitle">
                                <p><a href="details.html" class="dark">Diana Hotel</a></p>
                                <img src="images/smallrating-3.png" alt="" class="mt-10"/><span
                                        class="size13 grey mt-9">Zakynthos</span>
                            </div>
                            <div class="dealprice">
                                <p class="size12 grey lh2">from<span class="price">$299</span><br/>per night</p>
                            </div>
                        </div>
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
                                    <a href="list4.html"><img src="images/site/kandy.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Visit the Hawaii Beaches</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list4.html"><img src="images/site/n_eliya.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Santorini - Greece</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list4.html"><img src="images/site/galle.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Dubai</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list4.html"><img src="images/site/sigiriya.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Visit the Hawaii Beaches</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list4.html"><img src="images/site/kandy.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Santorini - Greece</b></h6>
                                        <h6 class="lh1 green">Save up to 30%</h6>
                                    </div>
                                </li>
                                <li>
                                    <a href="list4.html"><img src="images/site/n_eliya.jpg" alt="" class="top_destination"/></a>

                                    <div class="m1">
                                        <h6 class="lh1 dark"><b>Dubai</b></h6>
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
                                    <a href="list3.html"><img src="images/site/101.jpg" style="padding-top: 50px;" alt="" /></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/102.jpg" style="padding-top: 50px;" alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/103.jpg" style="padding-top: 50px;" alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/104.jpg" style="padding-top: 50px;" alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/105.jpg" style="padding-top: 50px;" alt=""/></a>
                                </li>
                                <li>
                                    <a href="list3.html"><img src="images/site/108.jpg" style="padding-top: 50px;" alt=""/></a>
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

@endsection

</body>

@stop

