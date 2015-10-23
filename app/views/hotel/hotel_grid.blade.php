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

        /*GROW*/
        .hot_facilities_icon {
            opacity: 0.5;
            width: 20px;
            height: 20px;
            border: #999 double 1px !important;
            border-radius: 3px;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;
        }

        .hot_facilities_icon:hover {
            opacity: 1;
            color: #000000 !important;
        }

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

    </style>

@endsection

@section('content')

    <body id="top" class="thebg">

    <!-- navbar -->
    @include('layout.navbar')
    <!-- / navbar -->

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li><a href="{{URL::route('index')}}" class="active">Home </a></li>
                    <li>/</li>
                    <li><a href="{{URL::to('/grid/view/sri-lanka/'.Request::segment(4) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(4)) }} </a></li>
                    <li>/</li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="container pagecontainer offset-0">

            <!-- FILTERS -->
            <div class="col-md-3 filters offset-0">

                <!-- TOP TIP -->
                <div class="filtertip">
                    <div class="padding20">

                        <p class="size13"><span class="size18 bold ">{{ $hotels->getTotal(); }}</span> Hotels starting
                            at
                        </p>

                        <p class="size30 bold">$<span class=""> {{ $min_hot_rate }} </span></p>

                        <p class="size13">In {{ str_replace('-', ' ', Request::segment(4)); }} </p>
                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->

                <div class="line2"></div>

                <?php $city_or_acc = Request::segment(4); ?>

                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
                <div class="line2"></div>

                <!-- Price range -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
                    Price range <span class="collapsearrow"></span>
                </button>

                {{ Form::open(array('url' => '/sri-lanka/'.$city_or_acc, 'method' => 'POST', 'id'=>'price_range_form')) }}
                <div id="collapse2" class="collapse in">
                    <div class="padding20">
                        <div class="layout-slider wh100percent">

                            <span class="cstyle09">
                                <input id="Slider1" class="price_range_select" type="slider" name="price_range"
                                       value="{{ $min_hot_rate}}; {{ $max_hot_rate }} "/>
                            </span>
                            <br/><br/>
                            <button type="submit" class="btn-search4">Update</button>
                            <br/>
                        </div>

                        <!-- bin/jquery.slider.min.js -->
                        {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
                        {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
                        <!-- end -->

                        {{ Form::hidden('min_hot_rate', $min_hot_rate, array('id' => 'min_rate_slider')) }}
                        {{ Form::hidden('max_hot_rate', $max_hot_rate, array('id' => 'max_rate_slider')) }}

                        <script type="text/javascript">
                            var min = parseInt($('#min_rate_slider').val());
                            var max = parseInt($('#max_rate_slider').val());
                            jQuery("#Slider1").slider({
                                from: min,
                                to: max,
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
                {{ Form::close() }}

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

                        <div id="facility_half">
                            <?php  $y = 0; ?>
                            @foreach($hotel_facilities as $facility)
                                @if($y < 5)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="{{ $facility->id }}" name="facility[]"
                                                   class="hot_facility">
                                            {{ $facility->hotel_facility }}
                                        </label>
                                    </div>
                                @endif
                                <?php  $y = $y + 1; ?>
                            @endforeach

                            <a id="facility_readmore" style="text-align: right" class="last" data-toggle="collapse"
                               data-target="#collapse6">
                                <h6>More</h6>
                            </a>
                        </div>

                        <div id="facility_full">
                            <div id="collapse6" class="collapse">
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
                            <a href="#facility_half" id="facility_readless" style="text-align: right" class="last"
                               data-toggle="collapse"
                               data-target="#collapse6">
                                <h6>Less</h6>
                            </a>
                        </div>

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

                        <div id="city_half">
                            <?php  $z = 0; ?>
                            @foreach($hotel_cities as $city)
                                @if($z < 5)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="city" id="City{{ $x }}"
                                                   value="{{ $city->id }}" class="city_select">
                                            {{ $city->city }}
                                        </label>
                                    </div>
                                    <?php  $z = $z + 1; ?>
                                @endif
                            @endforeach

                            <a id="city_readmore" style="text-align: right" class="last"
                               data-toggle="collapse"
                               data-target="#collapse7">
                                <h6>More</h6>
                            </a>

                        </div>

                        <div id="city_full">
                            <div id="collapse7" class="collapse">
                                @foreach($hotel_cities as $city)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="city" id="City{{ $x }}"
                                                   value="{{ $city->id }}" class="city_select">
                                            {{ $city->city }}
                                        </label>
                                    </div>
                                @endforeach

                                <a href="#city_full" id="city_readless" style="text-align: right" class="last"
                                   data-toggle="collapse"
                                   data-target="#collapse7">
                                    <h6>Less</h6>
                                </a>
                            </div>
                        </div>

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
                            $directory = 'public/images/hotel_images/';
                            $images = glob($directory . $hotel->id . "_*");
                            $img_path = array_shift($images);
                            $img_name = basename($img_path);

                            $city_id = $hotel->city_id;
                            $get_city = DB::table('cities')->where('id', $city_id)->first();
                            $city = $get_city->city;
                            ?>

                            <div class="listitem">

                                @if(count($img_path)>0)
                                    {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'hotel_img_1'))}}
                                @else
                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_grid_img')) }}
                                @endif

                                <div class="liover"></div>
                                <a class="fav-icon" href="#"></a>
                                <a class="book-icon" href="#"></a>

                            </div>

                            <div class="itemlabel2">
                                <h4>
                                    <a style="color: #006699"
                                       href="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}">
                                        &nbsp;&nbsp;&nbsp;&nbsp; {{ Str::limit($hotel->name, 20) }}
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
                                        {{ Str::limit($hotel->overview, 50) }}
                                    </p>

                                    @if(Input::has('facility') || Input::has('price_range'))
                                        <ul class="hotelpreferences">
                                            <?php
                                            $hotel_facilities = Hotel::with('hotelFacility')->find($hotel->id);
                                            ?>
                                            @foreach($hotel_facilities->hotelFacility as $hotel_facility)
                                                <?php
                                                //echo public_path();
                                                $directory = 'public/images/hotel_facilities/';
                                                $images = glob($directory . $hotel_facility->id . "*");
                                                $img_path = array_shift($images);
                                                $img_name = basename($img_path);
                                                ?>

                                                {{ HTML::image('images/hotel_facilities/'.$img_name, '', array('class' => 'hot_facilities_icon'))}}

                                            @endforeach
                                        </ul>
                                    @else
                                        <ul class="hotelpreferences">
                                            <?php
                                            $hotel_facilities = Hotel::with('hotelFacility')->find($hotel->id);
                                            ?>
                                            @foreach($hotel_facilities->hotelFacility as $hotel_facility)
                                                <?php
                                                //echo public_path();
                                                $directory = 'public/images/hotel_facilities/';
                                                $images = glob($directory . $hotel_facility->id . "*");
                                                $img_path = array_shift($images);
                                                $img_name = basename($img_path);
                                                ?>

                                                {{ HTML::image('images/hotel_facilities/'.$img_name, '', array('class' => 'hot_facilities_icon'))}}
                                            @endforeach
                                        </ul>
                                    @endif
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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

        <script type="text/javascript">

            $(document).ready(function () {
                $('#facility_full').hide();
                $('#city_full').hide();
            });

            $('#facility_readmore').click(function () {
                $('#facility_half').hide();
                $('#facility_full').show();
            });

            $('#facility_readless').click(function () {
                $('#facility_half').show();
                $('#facility_full').hide();
            });

            $('#city_readmore').click(function () {
                $('#city_half').hide();
                $('#city_full').show();
            });

            $('#city_readless').click(function () {
                $('#city_half').show();
                $('#city_full').hide();
            });

        </script>

    @endsection

    </body>

@stop