@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel list </title>

@endsection

@section('custom_style')

    <style type="text/css">
        .hotel_img_1 {
            width: 325px;
            height: 250px;
        }
    </style>

    <!-- bin/jquery.slider.min.css -->
    {{ HTML::style('plugins/jslider/css/jslider.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('plugins/jslider/css/jslider.round.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- bin/jquery.slider.min.js -->
    {{ HTML::script('plugins/jslider/js/jshashtable-2.1_src.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.numberformatter-1.2.3.js') }}
    {{ HTML::script('plugins/jslider/js/tmpl.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/draggable-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
    <!-- end -->

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
                    <li><a href="#">Hotels</a></li>
                    <li>/</li>
                    <li><a href="#">U.S.A.</a></li>
                    <li>/</li>
                    <li><a href="#" class="active">New York</a></li>
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

            <!-- FILTERS -->
            <div class="col-md-3 filters offset-0">

                <!-- TOP TIP -->
                <div class="filtertip">
                    <div class="padding20">
                        <p class="size13"><span class="size18 bold counthotel">53</span> Hotels starting at </p>

                        <p class="size30 bold">$<span class="countprice"></span></p>

                        <p class="size13">Narrow results or <a href="#">view all</a></p>
                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <div class="bookfilters hpadding20">

                    <div class="w50percent">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                <span class="hotel-ico"></span> Hotels
                            </label>
                        </div>
                    </div>

                    <div class="w50percentlast">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                                <span class="car-ico"></span> Transport
                            </label>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <br/>

                    <!-- HOTELS TAB -->
                    <div class="hotelstab2 none">
                        <span class="opensans size13">Where do you want to go?</span>
                        <input type="text" class="form-control" placeholder="Greece">

                        <div class="clearfix pbottom15"></div>

                        <div class="w50percent">
                            <div class="wh90percent textleft">
                                <span class="opensans size13">Check in date</span>
                                <input type="text" class="form-control mySelectCalendar" id="datepicker"
                                       placeholder="mm/dd/yyyy"/>
                            </div>
                        </div>

                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13">Check in date</span>
                                <input type="text" class="form-control mySelectCalendar" id="datepicker2"
                                       placeholder="mm/dd/yyyy"/>
                            </div>
                        </div>

                        <div class="clearfix pbottom15"></div>

                        <div class="room1">
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>ROOM 1</b></span><br/>

                                    <div class="addroom1 block"><a onclick="addroom2()" class="grey cpointer">+ Add
                                            room</a>
                                    </div>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right ohidden">
                                    <div class="w50percent">
                                        <div class="wh90percent textleft left">
                                            <span class="opensans size13">Adult</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option>1</option>
                                                <option selected>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w50percentlast">
                                        <div class="wh90percent textleft right ohidden">
                                            <span class="opensans size13">Child</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option>0</option>
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room2 none">
                            <div class="clearfix"></div>
                            <div class="line1"></div>
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>ROOM 2</b></span><br/>

                                    <div class="addroom2 block grey"><a onclick="addroom3()" class="grey cpointer">+ Add
                                            room</a> | <a onclick="removeroom2()" class="orange cpointer"><img
                                                    src="images/delete.png" alt="delete"/></a></div>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <div class="w50percent">
                                        <div class="wh90percent textleft left">
                                            <span class="opensans size13">Adult</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option>1</option>
                                                <option>2</option>
                                                <option selected>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w50percentlast">
                                        <div class="wh90percent textleft right">
                                            <span class="opensans size13">Child</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option selected>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room3 none">
                            <div class="clearfix"></div>
                            <div class="line1"></div>
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>ROOM 3</b></span><br/>

                                    <div class="addroom3 block grey"><a onclick="addroom3()" class="grey cpointer">+ Add
                                            room</a> | <a onclick="removeroom3()" class="orange cpointer"><img
                                                    src="images/delete.png" alt="delete"/></a></div>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <div class="w50percent">
                                        <div class="wh90percent textleft left">
                                            <span class="opensans size13">Adult</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w50percentlast">
                                        <div class="wh90percent textleft right">
                                            <span class="opensans size13">Child</span>
                                            <select class="form-control mySelectBoxClass">
                                                <option selected>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" class="btn-search3">Search</button>
                    </div>
                    <!-- END OF HOTELS TAB -->

                    <!-- CARS TAB -->
                    <div class="carstab2 none">
                        <div class="w50percent">
                            <div class="wh90percent textleft">
                                <span class="opensans size13">Picking up</span>
                                <input type="text" class="form-control" placeholder="Airport, address">
                            </div>
                        </div>

                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13">Dropping off</span>
                                <input type="text" class="form-control" placeholder="Airport, address">
                            </div>
                        </div>

                        <div class="clearfix pbottom15"></div>

                        <div class="w50percent">
                            <div class="wh90percent textleft">
                                <span class="opensans size13">Pick up date</span>
                                <input type="text" class="form-control mySelectCalendar" id="datepicker5"
                                       placeholder="mm/dd/yyyy"/>
                            </div>
                        </div>

                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13">Hour</span>
                                <select class="form-control mySelectBoxClass">
                                    <option>12:00 AM</option>
                                    <option>12:30 AM</option>
                                    <option>01:00 AM</option>
                                    <option>01:30 AM</option>
                                    <option>02:00 AM</option>
                                    <option>02:30 AM</option>
                                    <option>03:00 AM</option>
                                    <option>03:30 AM</option>
                                    <option>04:00 AM</option>
                                    <option>04:30 AM</option>
                                    <option>05:00 AM</option>
                                    <option>05:30 AM</option>
                                    <option>06:00 AM</option>
                                    <option>06:30 AM</option>
                                    <option>07:00 AM</option>
                                    <option>07:30 AM</option>
                                    <option>08:00 AM</option>
                                    <option>08:30 AM</option>
                                    <option>09:00 AM</option>
                                    <option>09:30 AM</option>
                                    <option>10:00 AM</option>
                                    <option selected>10:30 AM</option>
                                    <option>11:00 AM</option>
                                    <option>11:30 AM</option>
                                    <option>12:00 PM</option>
                                    <option>12:30 PM</option>
                                    <option>01:00 PM</option>
                                    <option>01:30 PM</option>
                                    <option>02:00 PM</option>
                                    <option>02:30 PM</option>
                                    <option>03:00 PM</option>
                                    <option>03:30 PM</option>
                                    <option>04:00 PM</option>
                                    <option>04:30 PM</option>
                                    <option>05:00 PM</option>
                                    <option>05:30 PM</option>
                                    <option>06:00 PM</option>
                                    <option>06:30 PM</option>
                                    <option>07:00 PM</option>
                                    <option>07:30 PM</option>
                                    <option>08:00 PM</option>
                                    <option>08:30 PM</option>
                                    <option>09:00 PM</option>
                                    <option>09:30 PM</option>
                                    <option>10:00 PM</option>
                                    <option>10:30 PM</option>
                                    <option>11:00 PM</option>
                                    <option>11:30 PM</option>
                                </select>
                            </div>
                        </div>

                        <div class="clearfix pbottom15"></div>

                        <div class="room1">
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13">Drop off date</span>
                                    <input type="text" class="form-control mySelectCalendar" id="datepicker6"
                                           placeholder="mm/dd/yyyy"/>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <span class="opensans size13">Hour</span>
                                    <select class="form-control mySelectBoxClass">
                                        <option>12:00 AM</option>
                                        <option>12:30 AM</option>
                                        <option>01:00 AM</option>
                                        <option>01:30 AM</option>
                                        <option>02:00 AM</option>
                                        <option>02:30 AM</option>
                                        <option>03:00 AM</option>
                                        <option>03:30 AM</option>
                                        <option>04:00 AM</option>
                                        <option>04:30 AM</option>
                                        <option>05:00 AM</option>
                                        <option>05:30 AM</option>
                                        <option>06:00 AM</option>
                                        <option>06:30 AM</option>
                                        <option>07:00 AM</option>
                                        <option>07:30 AM</option>
                                        <option>08:00 AM</option>
                                        <option>08:30 AM</option>
                                        <option>09:00 AM</option>
                                        <option>09:30 AM</option>
                                        <option>10:00 AM</option>
                                        <option selected>10:30 AM</option>
                                        <option>11:00 AM</option>
                                        <option>11:30 AM</option>
                                        <option>12:00 PM</option>
                                        <option>12:30 PM</option>
                                        <option>01:00 PM</option>
                                        <option>01:30 PM</option>
                                        <option>02:00 PM</option>
                                        <option>02:30 PM</option>
                                        <option>03:00 PM</option>
                                        <option>03:30 PM</option>
                                        <option>04:00 PM</option>
                                        <option>04:30 PM</option>
                                        <option>05:00 PM</option>
                                        <option>05:30 PM</option>
                                        <option>06:00 PM</option>
                                        <option>06:30 PM</option>
                                        <option>07:00 PM</option>
                                        <option>07:30 PM</option>
                                        <option>08:00 PM</option>
                                        <option>08:30 PM</option>
                                        <option>09:00 PM</option>
                                        <option>09:30 PM</option>
                                        <option>10:00 PM</option>
                                        <option>10:30 PM</option>
                                        <option>11:00 PM</option>
                                        <option>11:30 PM</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <button type="submit" class="btn-search3">Search</button>
                    </div>
                    <!-- END OF CARS TAB -->

                </div>
                <!-- END OF BOOK FILTERS -->

                <div class="line2"></div>

                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
                <div class="line2"></div>

                <!-- Star ratings -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Star rating <span class="collapsearrow"></span>
                </button>

                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><img src="images/filter-rating-5.png" class="imgpos1" alt=""/> 5
                                Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><img src="images/filter-rating-4.png" class="imgpos1" alt=""/> 4
                                Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><img src="images/filter-rating-3.png" class="imgpos1" alt=""/> 3
                                Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><img src="images/filter-rating-2.png" class="imgpos1" alt=""/> 2
                                Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"><img src="images/filter-rating-1.png" class="imgpos1" alt=""/> 1
                                Star
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Star ratings -->

                <div class="line2"></div>

                <!-- Price range -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
                    Price range <span class="collapsearrow"></span>
                </button>

                <div id="collapse2" class="collapse in">
                    <div class="padding20">
                        <div class="layout-slider wh100percent">
                            <span class="cstyle09"><input id="Slider1" type="slider" name="price"
                                                          value="400;700"/></span>
                        </div>
                        <script type="text/javascript">
                            jQuery("#Slider1").slider({
                                from: 100,
                                to: 1000,
                                step: 5,
                                smooth: true,
                                round: 0,
                                dimension: "&nbsp;$",
                                skin: "round"
                            });
                        </script>
                    </div>
                </div>
                <!-- End of Price range -->

                <div class="line2"></div>

                <!-- Acomodations -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
                    Acomodation type <span class="collapsearrow"></span>
                </button>

                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation1" value="option1" checked>
                                All
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation2" value="option2">
                                Hotel
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation3" value="option3">
                                Bed & Breakfast
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation4" value="option4">
                                Apartment
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation5" value="option5">
                                Condo
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios2" id="Acomodation6" value="option6">
                                All-Inclusive Resort
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Acomodations -->

                <div class="line2"></div>

                <!-- Hotel Preferences -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    Hotel Preferences <span class="collapsearrow"></span>
                </button>
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">High-speed Internet (41)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Air conditioning (52)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Swimming pool (55)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Childcare (12)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Fitness equipment (49)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Free breakfast (14)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Free parking (11)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Hair dryer (48)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Pets allowed (16)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Restaurant in hotel (47)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Room service (38)
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Spa services on site (57)
                            </label>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Hotel Preferences -->

                <div class="line2"></div>
                <div class="clearfix"></div>
                <br/>
                <br/>
                <br/>


            </div>
            <!-- END OF FILTERS -->

            <!-- LIST CONTENT-->
            <div class="rightcontent col-md-9 offset-0">

                <div class="hpadding20">

                    <!-- Top filters -->
                    <div class="topsortby">
                        <div class="col-md-4 offset-0">

                            <div class="left mt7"><b>Sort by:</b></div>

                            <div class="right wh70percent">
                                <select class="form-control mySelectBoxClass ">
                                    <option selected>Guest rating</option>
                                    <option>5 stars</option>
                                    <option>4 stars</option>
                                    <option>3 stars</option>
                                    <option>2 stars</option>
                                    <option>1 stars</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="w50percent">
                                <div class="wh90percent">
                                    <select class="form-control mySelectBoxClass ">
                                        <option selected>Name</option>
                                        <option>A to Z</option>
                                        <option>Z to A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w50percentlast">
                                <div class="wh90percent">
                                    <select class="form-control mySelectBoxClass ">
                                        <option selected>Price</option>
                                        <option>Ascending</option>
                                        <option>Descending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offset-0">
                            <button class="popularbtn left">Most Popular</button>
                            <div class="right">
                                <a class="listbtn active" href="{{URL::to('home')}}"></a>
                                <a class="gridbtn" href="{{URL::to('home')}}"></a>
                                {{--<button class="listbtn active" onclick="location.href='http://google.com';">&nbsp;</button>--}}
                                {{--<button class="gridbtn" onclick="location.href='http://google.com';"">&nbsp;</button>--}}
                            </div>
                        </div>
                    </div>
                    <!-- End of topfilters-->
                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                @foreach($hotels as $hotel)

                    <div class="itemscontainer offset-1">

                        <div class="offset-2">
                            <div class="col-md-4 offset-0">
                                <div class="listitem2">

                                    <?php
                                    $directory = 'images/hotel_images/';
                                    $images = glob($directory . $hotel->id . "_" . "*.*");
                                    $img_path = array_shift($images);
                                    ?>

                                    <a href="<?php echo 'http://localhost/travel/public/' . $img_path; ?>"
                                       data-title="{{ $hotel->name }}" data-gallery="multiimages"
                                       data-toggle="lightbox">


                                        @if(count($img_path)>0)
                                            {{ HTML::image($img_path, '', array('class' => 'hotel_img_1'))}}
                                        @else
                                            {{ HTML::image('images/no-image.png', '', array('class' => 'property_img_1')) }}
                                        @endif

                                        <div class="liover"></div>
                                        <a class="fav-icon" href="#"></a>
                                        <a class="book-icon" href="details.html"></a>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 offset-0">
                                <div class="itemlabel3">

                                    <div class="labelright">
                                        <?php
                                        $stars = $hotel->star_category_id;
                                        $star = DB::table('star_categories')->where('id', $stars)->first();
                                        $hotel_star = $star->stars;

                                        ?>
                                        {{ Star::star_loop($hotel_star)}}<br/><br/><br/>

                                        {{ HTML::image('images/user-rating-5.png', '')}}<br/><br/>
                                        @foreach($hotel->hotelReview as $review)
                                            <span class="size11 grey">{{ $review->count(); }} Reviews </span><br/><br/>
                                        @endforeach

                                        <span class="green size18"><b>$36.00</b></span><br/>
                                        <span class="size11 grey">avg/night</span><br/><br/><br/>

                                        <form action="details.html">
                                            <button class="bookbtn mt1" type="submit"> Book</button>
                                        </form>
                                    </div>

                                    <div class="labelleft2">
                                        <b> {{ $hotel->name }} </b><br/><br/><br/>

                                        <p class="grey">
                                            {{ $hotel->overview; }}
                                        </p>
                                        <br/>
                                        <ul class="hotelpreferences">
                                            <?php
                                            $hotel_facilities = Hotel::with('hotelFacility')->find($hotel->id);
                                            ?>
                                            @foreach($hotel_facilities->hotelFacility as $hotel_facility)

                                                <li class="{{ $hotel_facility->name; }}"></li>

                                            @endforeach

                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="offset-2">
                            <hr class="featurette-divider3">
                        </div>

                    </div>
                    <!-- End of offset1-->

                @endforeach

                <div class="hpadding20">

                    <ul class="pagination right paddingbtm20">
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>

                </div>

            </div>
            <!-- END OF LIST CONTENT-->

        </div>
        <!-- END OF container-->

    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-list4.js') }}

        <!-- Custom Select -->
        {{ HTML::script('js/lightbox.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Picker -->
        {{ HTML::script('assets/js/jquery-ui.js') }}

    @endsection

    </body>
@stop
