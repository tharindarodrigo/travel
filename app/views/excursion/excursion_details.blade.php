@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Excursion Details </title>

@endsection

@section('custom_style')

    <!-- Updates -->
    {{ HTML::style('updates/update1/css/style01.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- bin/jquery.slider.min.css -->
    {{ HTML::style('plugins/jslider/css/jslider.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('plugins/jslider/css/jslider.round-blue.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- bin/jquery.slider.min.js -->
    {{ HTML::script('plugins/jslider/js/jshashtable-2.1_src.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.numberformatter-1.2.3.js') }}
    {{ HTML::script('plugins/jslider/js/tmpl.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/draggable-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
    <!-- end -->

    <style type="text/css">
        .ex_details {
            height: 555px;
            width: 760px;
        }
    </style>

@endsection

@section('content')

    <body id="top" class="thebg">

    <div class="navbar-wrapper2 navbar-fixed-top">
        @include('layout.navbar')
    </div>

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li>/</li>
                    <li><a href="#">Activities</a></li>
                    <li>/</li>
                    <li><a href="#">U.A.E.</a></li>
                    <li>/</li>
                    <li><a href="#" class="active">Dubai</a></li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="container pagecontainer offset-0">

            <!-- SLIDER -->
            <div class="col-md-8" style="padding: 0 !important;">

                <?php
                $directory = 'images/excursion_images/excursion_types/';
                $images = glob($directory . $excursion_type_id . "*.*");
                $img_path = array_shift($images);
                ?>

                @if(count($img_path)>0)
                    {{ HTML::image($img_path, '', array('class' => 'ex_details'))}}
                @else
                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'ex_details')) }}
                @endif

            </div>
            <!-- END OF SLIDER -->

            <!-- RIGHT INFO -->
            <div class="col-md-4 detailsright offset-0">
                <div class="padding20">
                    <h1 style="color:#006699;"> {{ $excursion->excursion }} </h1>

                    {{ HTML::image('images/smallrating-5.png') }}
                </div>

                <div class="line3"></div>

                <div class="hpadding20">
                    <h2 class="opensans slim green2"> Good Experience !</h2>
                </div>

                <div class="line3 margtop20"></div>

                <div class="col-md-6 bordertype1 padding20">
                    <span class="opensans size30 bold grey2">97%</span><br/>
                    of guests<br/>recommend
                </div>
                <div class="col-md-6 bordertype2 padding20">
                    <span class="opensans size30 bold grey2">4.5</span>/5<br/>
                    guest ratings
                </div>

                <div class="col-md-6 bordertype3">
                    <img src="images/user-rating-4.png" alt=""/><br/>
                    18 reviews
                </div>
                <div class="col-md-6 bordertype3">
                    <a href="#" class="grey">+Add review</a>
                </div>
                <div class="clearfix"></div>
                <br/>

                <div class="hpadding20">
                    <a href="#" class="booknow margtop20 btnmarg">Book now</a>
                </div>
            </div>
            <!-- END OF RIGHT INFO -->

        </div>
        <!-- END OF container-->

        <div class="container mt25 offset-0">

            <div class="col-md-8 pagecontainer2 offset-0">
                <div class="cstyle10"></div>

                <ul class="nav nav-tabs" id="myTab">
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span
                                    class="summary"></span><span class="hidetext">Details</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span
                                    class="rates"></span><span class="hidetext">Rates</span>&nbsp;</a></li>
                    <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span
                                    class="maps"></span><span class="hidetext">Location</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate(); trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6();"
                        class=""><a data-toggle="tab" href="#reviews"><span class="reviews"></span><span
                                    class="hidetext">Reviews</span>&nbsp;</a></li>
                </ul>
                <div class="tab-content4">

                    <!-- TAB 1 -->
                    <div id="summary" class="tab-pane fade">
                        <div class="hpadding20">
                            <p class="hpadding20">
                                {{ $excursion->description }}
                            </p>
                        </div>
                    </div>

                    <!-- TAB 2 -->
                    <div id="roomrates" class="tab-pane fade active in">
                        <div class="hpadding20">
                            <h3 class="dark bold"> Pricing and availability </h3>

                            Trip dates: Wed Mar-5-2014 to Sat Mar-8-2014 (<a href="#" class="lblue">Select new trip
                                dates</a>)
                        </div>
                        <br/>

                        <div class="line2"></div>

                        <div class="padding20">

                            <div class="col-md-2">
                                <span class="green bold">$81.68</span> /each
                            </div>
                            <div class="col-md-8">
                                <div class="wh50percent left">
                                    <select class="form-control mySelectBoxClass">
                                        <option>1 Person</option>
                                        <option selected>2 Person</option>
                                        <option>3 Person</option>
                                        <option>4 Person</option>
                                        <option>5 Person</option>
                                    </select>
                                </div>
                                <div class="wh45percent right">
                                    over 42 inches
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <button class="updatebtn">Book</button>
                            </div>
                            <div class="clearfix"></div>

                        </div>

                        <div class="line2"></div>

                        <br/>
                        <br/>

                    </div>

                    <!-- TAB 4 -->
                    <div id="maps" class="tab-pane fade">
                        <div class="hpadding20">
                            <div id="map-canvas"></div>
                        </div>
                    </div>

                    <!-- TAB 5 -->
                    <div id="reviews" class="tab-pane fade ">
                        <div class="hpadding20">
                            <div class="col-md-4 offset-0">
                                <span class="opensans dark size60 slim lh3 ">4.5/5</span><br/>
                                <img src="images/user-rating-4.png" alt=""/>
                            </div>
                            <div class="col-md-8 offset-0">
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success wh75percent" role="progressbar"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">4.5 out of 5</span>
                                    </div>
                                </div>
                                <div class="progress progress-striped">
                                    <div class="progress-bar progress-bar-success wh100percent" role="progressbar"
                                         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">100% of guests recommend</span>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                Ratings based on 5 Verified Reviews
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                            <span class="opensans dark size16 bold">Average ratings</span>
                        </div>


                        <div class="line2"></div>

                        <div class="hpadding20">
                            <div class="col-md-4 offset-0 center">
                                <div class="padding20">
                                    <div class="bordertype5">
                                        <div class="circlewrap">
                                            <img src="images/user-avatar.jpg" class="circleimg" alt=""/>
                                            <span>4.5</span>
                                        </div>
                                        <span class="dark">by Sena</span><br/>
                                        from London, UK<br/>
                                        <img src="images/check.png" alt=""/><br/>
                                        <span class="green">Recommended<br/>for Everyone</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8 offset-0">
                                <div class="padding20">
                                    <span class="opensans size16 dark">Great experience</span><br/>
                                    <span class="opensans size13 lgrey">Posted Jun 02, 2013</span><br/>

                                    <p>Excellent hotel, friendly staff would def go there again</p>
                                    <ul class="circle-list">
                                        <li>4.5</li>
                                        <li>3.8</li>
                                        <li>4.2</li>
                                        <li>5.0</li>
                                        <li>4.6</li>
                                        <li>4.8</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="line2"></div>

                        <div class="hpadding20">
                            <div class="col-md-4 offset-0 center">
                                <div class="padding20">
                                    <div class="bordertype5">
                                        <div class="circlewrap">
                                            <img src="images/user-avatar.jpg" class="circleimg" alt=""/>
                                            <span>4.5</span>
                                        </div>
                                        <span class="dark">by Sena</span><br/>
                                        from London, UK<br/>
                                        <img src="images/check.png" alt=""/><br/>
                                        <span class="green">Recommended<br/>for Everyone</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8 offset-0">
                                <div class="padding20">
                                    <span class="opensans size16 dark">Great experience</span><br/>
                                    <span class="opensans size13 lgrey">Posted Jun 02, 2013</span><br/>

                                    <p>The view from our balcony in room # 409, was terrific. It was centrally located
                                        to everything on and around the port area. Wonderful service and everything was
                                        very clean. The breakfast was below average, although not bad. If back in Zante
                                        Town we would stay there again.</p>
                                    <ul class="circle-list">
                                        <li>4.5</li>
                                        <li>3.8</li>
                                        <li>4.2</li>
                                        <li>5.0</li>
                                        <li>4.6</li>
                                        <li>4.8</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="line2"></div>

                        <div class="hpadding20">
                            <div class="col-md-4 offset-0 center">
                                <div class="padding20">
                                    <div class="bordertype5">
                                        <div class="circlewrap">
                                            <img src="images/user-avatar.jpg" class="circleimg" alt=""/>
                                            <span>4.5</span>
                                        </div>
                                        <span class="dark">by Sena</span><br/>
                                        from London, UK<br/>
                                        <img src="images/check.png" alt=""/><br/>
                                        <span class="green">Recommended<br/>for Everyone</span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8 offset-0">
                                <div class="padding20">
                                    <span class="opensans size16 dark">Great experience</span><br/>
                                    <span class="opensans size13 lgrey">Posted Jun 02, 2013</span><br/>

                                    <p>It is close to everything but if you go in the lower season the pool won't be
                                        ready even though the temperature was quiet high already.</p>
                                    <ul class="circle-list">
                                        <li>4.5</li>
                                        <li>3.8</li>
                                        <li>4.2</li>
                                        <li>5.0</li>
                                        <li>4.6</li>
                                        <li>4.8</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="line2"></div>
                        <br/>
                        <br/>

                        <div class="hpadding20">
                            <span class="opensans dark size16 bold">Reviews</span>
                        </div>

                        <div class="line2"></div>

                        <div class="wh33percent left center">

                            <br/>
                            <ul class="jslidetext2">
                                <li>Username</li>
                                <li>Evaluation</li>
                                <li>Title</li>
                                <li>Comment</li>
                            </ul>
                        </div>
                        <div class="wh66percent right offset-0">
                            <script>
                                //This is a fix for when the slider is used in a hidden div
                                function testTriger() {
                                    setTimeout(function () {
                                        $(".cstyle01").resize();
                                    }, 500);
                                }
                            </script>
                            <div class="padding20 relative wh70percent">

                                <input type="text" class="form-control margtop10" placeholder="">
                                <select class="form-control mySelectBoxClass margtop10">
                                    <option selected>Wonderful!</option>
                                    <option>Nice</option>
                                    <option>Neutral</option>
                                    <option>Don't recommend</option>
                                </select>
                                <input type="text" class="form-control margtop10" placeholder="">

                                <textarea class="form-control margtop10" rows="3"></textarea>

                                <div class="clearfix"></div>
                                <button type="submit" class="btn-search4 margtop20">Submit</button>

                                <br/>
                                <br/>
                                <br/>
                                <br/>

                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div class="pagecontainer2 testimonialbox">
                    <div class="cpadding0 mt-10">
                        <span class="icon-quote"></span>

                        <p class="opensans size16 grey2">I've had the time of my life!!! Can wait the next vacation,
                            definitely i will return here.<br/>
                            <span class="lato lblue bold size13"><i>by Ellison from United Kingdom</i></span></p>
                    </div>
                </div>

                <div class="pagecontainer2 mt20 needassistancebox">
                    <div class="cpadding1">
                        <span class="icon-help"></span>

                        <h3 class="opensans">Need Assistance?</h3>

                        <p class="size14 grey">Our team is 24/7 at your service to help you with your booking issues or
                            answer any related questions</p>

                        <p class="opensans size30 lblue xslim">1-866-599-6674</p>
                    </div>
                </div>
                <br/>

                <div class="pagecontainer2 mt20 alsolikebox">
                    <div class="cpadding1">
                        <span class="icon-location"></span>

                        <h3 class="opensans">You May Also Like</h3>

                        <div class="clearfix"></div>
                    </div>
                    <div class="cpadding1 ">
                        <div class="wh30percent left">
                            <a href="#"><img src="updates/update1/img/activities/act01.jpg" width="80" class="left mr20"
                                             alt=""/></a>
                        </div>
                        <div class="wh65percent right">
                            <a href="#" class="dark"><b>4x4 Sunset Desert Safari and Dhow Cruise Dinner</b></a><br/>
                            <span class="opensans green bold size14">$36-$160</span> <span
                                    class="grey">/person</span><br/>
                            <img src="images/filter-rating-5.png" alt=""/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="line5"></div>
                    <div class="cpadding1 ">
                        <div class="wh30percent left">
                            <a href="#"><img src="updates/update1/img/activities/act02.jpg" width="80" class="left mr20"
                                             alt=""/></a>
                        </div>
                        <div class="wh65percent right">
                            <a href="#" class="dark"><b>Aquaventure Waterpark and The Lost Chambers
                                    Aquarium</b></a><br/>
                            <span class="opensans green bold size14">$36-$160</span> <span
                                    class="grey">/person</span><br/>
                            <img src="images/filter-rating-5.png" alt=""/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="line5"></div>
                    <div class="cpadding1 ">
                        <div class="wh30percent left">
                            <a href="#"><img src="updates/update1/img/activities/act03.jpg" width="80" class="left mr20"
                                             alt=""/></a>
                        </div>
                        <div class="wh65percent right">
                            <a href="#" class="dark"><b>Yas Waterworld and Ferrari World Abu Dhabi</b></a><br/>
                            <span class="opensans green bold size14">$36-$160</span> <span
                                    class="grey">/person</span><br/>
                            <img src="images/filter-rating-5.png" alt=""/>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <br/>


                </div>

            </div>
        </div>

    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-details.js') }}

        <!-- Googlemap -->
        {{ HTML::script('assets/js/initialize-google-map.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Carousel-->
        {{ HTML::script('assets/js/initialize-carousel-detailspage.js') }}

    @endsection

    </body>
@stop
