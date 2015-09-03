@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel Grid </title>

@endsection

@section('custom_style')

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

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <style type="text/css">

        .hotel_img_1 {
            width: 325px;
            height: 250px;
        }

        .collapsebtn {
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }
    </style>

    <style type="text/css">
        .search_thumb {
            width: 25px;
            height: 25px;
        }

        /* SEARCH FORM */

        #suggestions {
            color: #FFFFFF !important;
            background: #FFFFFF;
            position: relative;
            top: 5px;
            left: 0px;
            /*width: 100%;*/
            display: none;
        }

        div .auto_complete:hover {
            width: 100%;
            background: #006699;
        }

        .auto_complete:hover a {
            text-decoration: none;
            color: #FFFFFF !important;
        }

        /* SEARCHRESULTS */

        #searchresults {
            border-width: 1px;
            border-color: #919191;
            border-style: solid;
            width: 320px;
            background-color: #a0a0a0;
            font-size: 10px;
            line-height: 14px;
        }

        #searchresults a {
            display: block;
            background-color: #e4e4e4;
            clear: left;
            height: 56px;
            text-decoration: none;
        }

        #searchresults a:hover {
            background-color: #FFFFFF;
            text-decoration: none;
            color: #000000 !important;
        }

        #searchresults a img {
            float: left;
            padding: 5px 10px;
        }

        #searchresults a span.searchheading {
            display: block;
            font-weight: bold;
            padding-top: 5px;
            color: #191919;
        }

        #searchresults a:hover span.searchheading {
            color: #000000;
        }

        #searchresults a span {
            color: #555555;
        }

        #searchresults a:hover span {
            background: #000066;
            color: #FFFFFF !important;
        }

        #searchresults span.category {
            font-size: 11px;
            margin: 5px;
            display: block;
            color: #000000;
        }

        #searchresults span.seperator {
            float: right;
            padding-right: 15px;
            margin-right: 5px;
            background-image: url(../images/shortcuts_arrow.gif);
            background-repeat: no-repeat;
            background-position: right;
        }

        #searchresults span.seperator a {
            background-color: transparent;
            display: block;
            margin: 5px;
            height: auto;
            color: #000000;
        }

        .grey:hover {
            color: #000000;
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
                        <p class="size13"><span class="size18 bold counthotel">{{ count($hotels); }}</span> Hotels
                            starting at </p>

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

                    {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}

                    {{--<form action="{{ URL::route('ho') }}" method="POST">--}}

                    <!-- HOTELS TAB -->
                    <div class="hotelstab2 none">
                        <span class="opensans size13">Where do you want to go?</span>

                        <input type="text" class="form-control" name="txt-search" id="inputString" category=""
                               onkeyup="lookup(this.value);" autocomplete="off"/>

                        <div id="suggestions"></div>

                        <div class="clearfix pbottom15"></div>

                        <div class="w50percent">
                            <div class="wh90percent textleft">
                                <span class="opensans size13">Check In Date</span>
                                <input type="text" name="check_in_date" class="form-control mySelectCalendar"
                                       id="datepicker"
                                       value="{{ Session::has('st_date') ? Session::get('st_date') : $st_date }}"/>
                            </div>
                        </div>

                        <div class="w50percentlast">
                            <div class="wh90percent textleft right">
                                <span class="opensans size13">Check Out Date</span>
                                <input type="text" name="check_out_date" class="form-control mySelectCalendar"
                                       id="datepicker2"
                                       value="{{ Session::has('ed_date') ? Session::get('ed_date') : $ed_date }}"/>
                            </div>
                        </div>

                        <div class="clearfix pbottom15"></div>

                        <div class="w50percent">
                            <div class="">
                                <span class="opensans size13">Adult</span>
                                <select class="form-control mySelectBoxClass" name="adult"
                                        id="change_adult">
                                    <option value="1" {{ Session::get('adult') == 1 ? 'selected' : '' }}>
                                        1
                                    </option>
                                    <option value="2" {{ Session::get('adult') == 2 ? 'selected' : '' }}>
                                        2
                                    </option>
                                    <option value="3" {{ Session::get('adult') == 3 ? 'selected' : '' }}>
                                        3
                                    </option>
                                    <option value="4" {{ Session::get('adult') == 4 ? 'selected' : '' }}>
                                        4
                                    </option>
                                    <option value="5" {{ Session::get('adult') == 5 ? 'selected' : '' }}>
                                        5
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="w50percentlast">
                            <div class="wh90percent textleft right ohidden">
                                <span class="opensans size13">Child</span>
                                <select class="form-control mySelectBoxClass" name="child"
                                        id="change_child">
                                    <option value="0" {{ Session::get('child') == 0 ? 'selected' : '' }}>
                                        0
                                    </option>
                                    <option value="1" {{ Session::get('child') == 1 ? 'selected' : '' }}>
                                        1
                                    </option>
                                    <option value="2" {{ Session::get('child') == 2 ? 'selected' : '' }}>
                                        2
                                    </option>
                                    <option value="3" {{ Session::get('child') == 3 ? 'selected' : '' }}>
                                        3
                                    </option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="city_or_acc_hidden" value="{{ $city = Request::segment(2); }}"/>

                        <div class="clearfix"></div>
                        <div class="clearfix pbottom15"></div>

                        <button type="submit" class="btn-search3 right">Search</button>

                    </div>
                    <!-- END OF HOTELS TAB -->

                    {{Form::close()}}

                    <!-- TRANSPORT TAB -->
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
                    <!-- END OF TRANSPORT TAB -->

                </div>
                <!-- END OF BOOK FILTERS -->

                <div class="line2"></div>
                <?php $city_or_acc = Request::segment(2); ?>
                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
                <div class="line2"></div>

                <!-- Star ratings -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Star rating <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/'.$city_or_acc, 'method' => 'POST', 'id'=>'star_rating_form')) }}
                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="5" name="star_rating[]" class="star_category">
                                {{ HTML::image('images/filter-rating-5.png', '', array('class' => 'imgpos1'))}}
                                5 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="4" name="star_rating[]" class="star_category">
                            <label>
                                {{ HTML::image('images/filter-rating-4.png', '', array('class' => 'imgpos1'))}}
                                4 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="3" name="star_rating[]" class="star_category">
                            <label>
                                {{ HTML::image('images/filter-rating-3.png', '', array('class' => 'imgpos1'))}}
                                3 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="2" name="star_rating[]" class="star_category">
                            <label>
                                {{ HTML::image('images/filter-rating-2.png', '', array('class' => 'imgpos1'))}}
                                2 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="1" name="star_rating[]" class="star_category">
                            <label>
                                {{ HTML::image('images/filter-rating-1.png', '', array('class' => 'imgpos1'))}}
                                1 Star
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Star ratings -->
                {{ Form::close() }}

                <div class="line2"></div>

                <!-- Price range -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
                    Price range <span class="collapsearrow"></span>
                </button>
                <div id="collapse2" class="collapse in">
                    <div class="padding20">
                        <div class="layout-slider wh100percent">
                            <span class="cstyle09">
                                <input id="Slider1" type="slider" name="price" value="200;700"/>
                            </span>
                        </div>

                        <!-- bin/jquery.slider.min.js -->
                        {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
                        {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
                        <!-- end -->

                        <script type="text/javascript">
                            jQuery("#Slider1").slider({
                                from: 10,
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

                <!-- Accommodation -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
                    Accommodation type <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/filter', 'method' => 'POST', 'id'=>'accommodation_form')) }}
                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <?php $x = 1; ?>
                        @foreach($hotel_type as $accommodation)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="accommodation" id="Acomodation{{ $x }}"
                                           value="{{ $accommodation->id }}" class="acc_select">
                                    {{ $accommodation->hotel_category }}
                                </label>
                            </div>
                            <?php $x++ ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Accommodations -->
                {{ Form::close() }}
                <div class="line2"></div>

                <!-- Hotel Preferences -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    Hotel Facilities <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/'.$city_or_acc, 'method' => 'POST', 'id'=>'facility_form')) }}
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        @foreach($hotel_facilities as $facility)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="{{ $facility->id }}" name="facility[]"
                                           class="hot_facility">
                                    {{ $facility->hotel_facility }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Hotel Preferences -->
                {{ Form::close() }}
                <div class="line2"></div>

                <!-- Cities -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse5">
                    Cities <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/filter', 'method' => 'POST', 'id'=>'city_form')) }}
                <div id="collapse5" class="collapse in">
                    <div class="hpadding20">
                        @foreach($hotel_cities as $city)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="city" id="City{{ $x }}"
                                           value="{{ $city->id }}" class="city_select">
                                    {{ $city->city }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Cities -->
                {{ Form::close() }}
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
                                <a class="listbtn {{ Session::get('hot_view') == 1 ? 'active' : '' }}"
                                   href="{{URL::to($list_url)}}"></a>
                                <a class="gridbtn {{ Session::get('hot_view') == 2 ? 'active' : '' }}"
                                   href="{{URL::to($grid_url)}}"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End of topfilters-->
                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">
                    @foreach($hotels as $hotel)
                        <div class="col-md-4">

                            <?php
                            $directory = 'images/hotel_images/';
                            $images = glob($directory . $hotel->id . "_" . "*.*");
                            $img_path = array_shift($images);

                            $city_id = $hotel->city_id;
                            $get_city = DB::table('cities')->where('id', $city_id)->first();
                            $city = $get_city->city;
                            ?>

                            <div class="listitem">

                                @if(count($img_path)>0)
                                    {{ HTML::image($img_path, '', array('class' => 'hotel_img_1'))}}
                                @else
                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'property_img_1')) }}
                                @endif

                                <div class="liover"></div>
                                <a class="fav-icon" href="#"></a>
                                <a class="book-icon" href="#"></a>

                            </div>

                            <div class="itemlabel2">
                                <h4>
                                    <a style="color: #006699"
                                       href="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}">
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ $hotel->name }}
                                    </a>
                                </h4>

                                <div class="labelright">
                                    <?php
                                    $stars = $hotel->star_category_id;
                                    $star = DB::table('star_categories')->where('id', $stars)->first();
                                    $hotel_star = $star->stars;
                                    ?>

                                    {{ Star::star_loop_blue($hotel_star)}}<br/><br/>

                                    {{ HTML::image('images/user-rating-5.png', '')}}<br/><br/>

                                    @if(!empty($hotel->hotelReview->count()))
                                        <span class="size11 grey">{{ $hotel->hotelReview->count(); }}
                                            Reviews </span><br/><br/>
                                    @else
                                        <span class="size11 grey">
                                                No Reviews </span><br/><br/>
                                    @endif

                                    <?php $low_hotel_rate = RoomRates::lowestHotelRate($hotel->id, $st_date, $ed_date); ?>

                                    @if(!empty($low_hotel_rate))
                                        <span class="green size18">
                                            <b>
                                                USD {{ $low_hotel_rate }}
                                            </b>
                                            </span>
                                        <br/>
                                        <span class="size11 grey">avg/night</span><br/><br/>
                                    @else
                                        <span class="green">
                                                No Rate <br/> Available
                                                <br/><br/>
                                            </span>
                                    @endif

                                    <a href="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}"
                                       class="bookbtn mt1">Book</a>
                                    <br/> <br/>
                                </div>
                                <div class="labelleft">
                                    <p class="grey">
                                        {{ Str::limit($hotel->overview, 150) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <div class="offset-2">
                        <hr class="featurette-divider3">
                    </div>

                </div>
                <!-- End of offset1-->

                <div class="hpadding20" align="right">
                    {{ $hotels->links() }}
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
        {{ HTML::script('assets/js/js-list3.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        {{--for the auto complete option--}}
        <script type="text/javascript">

            function lookup(inputString) {
                if (inputString.length == 0) {
                    $('#suggestions').fadeOut(); // Hide the suggestions box
                } else {
                    $.post("http://localhost/travel/public/auto-complete", {queryString: "" + inputString + ""}, function (data) { // Do an AJAX call
                        $('#suggestions').fadeIn(); // Show the suggestions box
                        $('#suggestions').html(data); // Fill the suggestions box

                        $('a').click(function () {
                            $value = $(this).attr('value');
                            $category = $(this).attr('category');
                            $('#inputString').val($value);
                            $('#inputString').attr('category', $category);
                            $('#suggestions').fadeOut();
                        });
                    });
                }
            }
        </script>

        <script type="text/javascript">
            $('.star_category').click(function () {
                var star = $('input[name=star_rating]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#star_rating_form').submit();
            });
        </script>

        <script type="text/javascript">
            $('.acc_select').click(function () {
                var accommodation = $('input[name=accommodation]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#accommodation_form').submit()
            });
        </script>

        <script type="text/javascript">
            $('.city_select').click(function () {
                var city = $('input[name=city]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#city_form').submit()
            });
        </script>

        <script type="text/javascript">
            $('.hot_facility').click(function () {
                var facilities = $('input[name=facility]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#facility_form').submit()
            });
        </script>

    @endsection

    </body>

@stop