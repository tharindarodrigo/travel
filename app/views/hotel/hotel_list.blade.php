@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel list </title>

@endsection

@section('custom_style')

    <style type="text/css">
        .featurette-divider30{
            border-top: solid 1px #006699 !important;
        }

        .hotel_img_1 {
            width: 325px;
            height: 250px;
        }

        .city_img_1 {
            width: 400px;
            height: 250px;
        }

        .collapsebtn {
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }

        /*GROW*/
        .hot_facilities_icon {
            opacity: 0.8;
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

        .ui-front {
            z-index: 10000 !important;
        }

        .ui-widget-header {
            background: #006699 !important;
        }

        .ui-dialog .ui-dialog-titlebar-close span {
            margin: 0 !important;
        }

        .ui-button-icon-only .ui-icon {
            margin-left: 8px !important;
        }

        .single_hotel_map {
            display: inline;
            width: 20px;
            height: 20px;
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

    <!-- google map -->
    {{ HTML::script('http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript') }}

    {{ HTML::script('text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript') }}
    {{ HTML::script('text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript') }}
    {{ HTML::script('http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript" type="text/javascript') }}
    {{ HTML::style('http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}


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
                    <li><a href="{{URL::to('sri-lanka/'.Request::segment(2) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(2)) }} </a></li>
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

                        <p class="size30 bold">{{ Session::get('currency') }}
                            <span class=""> {{ number_format(($min_hot_rate * Session::get('currency_rate')), 2, '.', '') }}
                            </span>
                        </p>

                        <p class="size13">In {{ str_replace('-', ' ', Request::segment(2)); }} </p>
                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->

                <?php $city_or_acc = Request::segment(2); ?>

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
                                       value="{{ $min_hot_rate }}; {{ $max_hot_rate }} "/>
                            </span>
                            <br/><br/>
                            <button type="submit" class="btn-search4">Update</button>
                            <br/>
                        </div>

                        <!-- bin/jquery.slider.min.js -->
                        {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
                        {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
                        <!-- end -->

                        {{ Form::hidden('min_hot_rate', ($min_hot_rate * Session::get('currency_rate'))  , array('id' => 'min_rate_slider')) }}
                        {{ Form::hidden('max_hot_rate', ($max_hot_rate * Session::get('currency_rate')), array('id' => 'max_rate_slider')) }}

                        <script type="text/javascript">
                            var min = parseInt($('#min_rate_slider').val());
                            var max = parseInt($('#max_rate_slider').val());
                            jQuery("#Slider1").slider({
                                from: min,
                                to: max,
                                step: 5,
                                smooth: true,
                                round: 0,
                                dimension: "&nbsp;",
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
                                <input type="checkbox" value="5" name="star_rating[]"
                                       class="star_category" @if(Session::has('star')){{ array_key_exists(7, Session::get('star')) ? 'checked':'' }}@endif >
                                {{ HTML::image('images/filter-rating-5.png', '', array('class' => 'imgpos1'))}}
                                5 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="4" name="star_rating[]"
                                   class="star_category" @if(Session::has('star')){{ array_key_exists(5, Session::get('star')) ? 'checked':'' }}@endif >
                            <label>
                                {{ HTML::image('images/filter-rating-4.png', '', array('class' => 'imgpos1'))}}
                                4 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="3" name="star_rating[]"
                                   class="star_category" @if(Session::has('star')){{ array_key_exists(3, Session::get('star')) ? 'checked':'' }}@endif >
                            <label>
                                {{ HTML::image('images/filter-rating-3.png', '', array('class' => 'imgpos1'))}}
                                3 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="2" name="star_rating[]"
                                   class="star_category" @if(Session::has('star')){{ array_key_exists(2, Session::get('star')) ? 'checked':'' }}@endif >
                            <label>
                                {{ HTML::image('images/filter-rating-2.png', '', array('class' => 'imgpos1'))}}
                                2 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="1" name="star_rating[]"
                                   class="star_category" @if(Session::has('star')){{ array_key_exists(1, Session::get('star')) ? 'checked':'' }}@endif >
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
                                           value="{{ $accommodation->id }}"
                                           class="acc_select" {{ $accommodation->id == Session::get('accommodation') ? 'checked':'' }}>
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
                                                   class="hot_facility" {{ 'as' }}>
                                            {{ $facility->hotel_facility }}
                                        </label>
                                    </div>
                                @endif
                                <?php  $y = $y + 1; ?>
                            @endforeach

                            <a id="facility_readmore" style="text-align: right" class="last"
                               data-toggle="collapse"
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
                            <a href="#facility_half" id="facility_readless" style="text-align: right"
                               class="last"
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
                                                   value="{{ $city->id }}"
                                                   class="city_select" {{ $city->id == Session::get('city') ? 'checked':'' }}>
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
                                                   value="{{ $city->id }}"
                                                   class="city_select" {{ $city->id == Session::get('city') ? 'checked':'' }}>
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
                <?php  $city_or_acc = HotelCategory::where('hotel_category', str_replace('-', ' ', Request::segment(2)))->first();?>

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

                <div class="itemscontainer offset-1">

                    @if(!empty($city_or_acc))

                        <div class="hidden-xs hidden-md container">
                            <button id="hotel_list_map" style="text-align: right" type="submit"
                                    class="bluebtn margtop20 right hotel_list_map_view">View Map
                            </button>

                            <div id="dialog" style="display: none;">
                                <div id="dvMap" style="height: 380px; width: 580px;">
                                </div>
                            </div>
                        </div>

                    @else

                        <div class="hidden-xs hidden-md offset-2">
                            <div class="">
                                <div class="col-md-6" style="padding: 0 !important;">
                                    {{ HTML::image('images/city_images/'.City::where('city', str_replace('-', ' ', Request::segment(2)))->select('id')->first()->id.'.jpg', '', array('class' => 'city_img_1'))}}

                                    <div class="city_blacklabel">
                                        <h4 style="color: #FFFFFF">{{ str_replace('-', ' ', Request::segment(2)) }}
                                            City</h4>

                                        {{ $hotels->getTotal(); }} Hotel
                                    </div>
                                </div>

                                <div class="col-md-6" style="padding: 0 !important;">
                                    <div id="dvMap" style="height: 250px; width: 400px;"></div>
                                </div>
                            </div>
                        </div>

                    @endif

                    <div class="clearfix"></div>
                    <br/><br/>

                    <div class="itemscontainer offset-1">

                        @foreach($hotels as $hotel)

                            <div class="offset-2">
                                <div class="col-md-4 offset-0">
                                    <div class="listitem2">

                                        <?php
                                        //echo public_path();
                                        $directory = 'public/images/hotel_images/';
                                        $images = glob($directory . $hotel->id . "_*");
                                        $img_path = array_shift($images);
                                        $img_name = basename($img_path);
                                        ?>

                                        <a href="<?php echo 'images/hotel_images/' . $img_name; ?>"
                                           data-title="{{ $hotel->name }}" data-gallery="multiimages"
                                           data-toggle="lightbox">


                                            @if(count($img_path)>0)
                                                {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'hotel_img_1'))}}
                                            @else
                                                {{ HTML::image('images/no-image.jpg', '', array('class' => 'property_img_1')) }}
                                            @endif

                                            <div class="liover"></div>
                                            <a class="fav-icon" href="#"></a>
                                            <?php
                                            $city_id = $hotel->city_id;
                                            $get_city = DB::table('cities')->where('id', $city_id)->first();
                                            $city = $get_city->city;
                                            ?>
                                            <a class="book-icon"
                                               href="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}"></a>
                                        </a>
                                    </div>
                                </div>

                                <div  class="col-md-8 offset-0">
                                    <div style="background-color: #f9f9f9" class="itemlabel3">

                                        <div style="text-align: center" class="labelright">
                                            <?php
                                            $stars = $hotel->star_category_id;
                                            $star = DB::table('star_categories')->where('id', $stars)->first();
                                            $hotel_star = $star->stars;
                                            ?>

                                            {{ Star::star_loop_blue($hotel_star)}}<br/><br/>

                                            {{ HTML::image('images/user-rating-5.png', '')}}<br/><br/>

                                            @if(!empty($hotel->hotelReview->count()))
                                                <span class="size11 grey"> {{ $hotel->hotelReview->count(); }}
                                                    Reviews </span><br/><br/>
                                            @else
                                                <span class="size11 grey">
                                                No Reviews </span><br/><br/>
                                            @endif

                                            <?php $low_hotel_rate = RoomRates::lowestHotelRate($hotel->id, $st_date, $ed_date); ?>

                                            @if(!empty($low_hotel_rate))
                                                <span class="green size18">
                                            <b>
                                                 {{ Session::get('currency') . '<br/>' . number_format(($low_hotel_rate * Session::get('currency_rate')), 2, '.', '') }}
                                            </b>
                                            </span>
                                                <br/>
                                                <span class="size11 grey">avg/night</span><br/><br/>
                                            @else
                                                <span class="green">
                                                 Rate Not <br/> Available
                                                <br/><br/>
                                            </span>
                                            @endif

                                            <form method="POST" target="_blank"
                                                  action="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}">
                                                <button style="background: #006699; color: #ffffff"
                                                        class="bookbtn mt1"
                                                        type="submit">Book
                                                </button>
                                            </form>
                                        </div>

                                        <div class="labelleft2 get_hotel_id" hotel_id="{{ $hotel->id }}">

                                            <a href="{{URL::to('sri-lanka/'.$city.'/'.str_replace(' ', '-', $hotel->name))}}"
                                               style="text-decoration: none" target="_blank">
                                                <h4 style="display: inline;"> {{ $hotel->name }} </h4>
                                            </a>
                                            <br/>

                                            <h6 style="display: inline"
                                                class=""> {{ $hotel->address }} </h6>
                                            {{ HTML::image('images/google-map-marker.png', '', array('class' => 'single_hotel_map'))}}
                                            <br/>

                                            <div id="dialog{{ $hotel->id }}" style="display: none;">
                                                <div id="dvMap{{ $hotel->id }}"
                                                     style="height: 380px; width: 580px;">
                                                </div>
                                            </div>

                                            <br/>

                                            <p class="grey">
                                                {{ strip_tags(Str::limit($hotel->overview, 150)) }}
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
                            </div>

                            <div class="clearfix"></div>

                            <div class="offset-2">
                                <hr class="featurette-divider3">
                            </div>

                        @endforeach

                    </div>
                    <!-- End of offset1-->

                    <div class="hpadding20" align="right">
                        {{ $hotels->links() }}
                    </div>
                        <br/><br/>
                </div>

                <div class="clearfix"></div>

                <!-- END OF LIST CONTENT-->

            </div>
            <!-- END OF container-->

        </div>
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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

        <!-- for full map -->
        <script type="text/javascript">

            $(document).ready(function () {

                var get_full_url = window.location.pathname.split('/');
                var hotel_list = get_full_url[2];

                var url = 'http://' + window.location.host + '/get_hotel_list_full_map';

                var formData = new FormData();

                formData.append('hotel_list', hotel_list);

                sendHotelListFullMapData(url, formData);

            });

        </script>

        <script type="text/javascript">

            $("#hotel_list_map").click(function () {

                var get_full_url = window.location.pathname.split('/');
                var hotel_list = get_full_url[2];

                var url = 'http://' + window.location.host + '/get_hotel_list_full_map';

                var formData = new FormData();

                formData.append('hotel_list', hotel_list);

                sendHotelListFullMapData(url, formData);

            });

        </script>

        <script type="text/javascript">
            $(function () {
                $("#hotel_list_map").click(function () {

                    $('html, body').css({
                        'overflow': 'hidden',
                        'height': '100%'
                    });

                    $("#dialog").dialog({
                        closeOnEscape: false,
                        open: function (event, ui) {
                            $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
                        },
                        modal: true,
                        title: "Google Map",
                        width: 650,
                        height: 550,
                        buttons: {
                            Close: function () {
                                $(this).dialog('close');
                                $('html, body').css({
                                    'overflow': 'auto',
                                    'height': 'auto'
                                });
                            }

                        }
                    });
                });
                $(".ui-dialog-titlebar-close").click(function () {
                    $('html, body').css({
                        'overflow': 'auto',
                        'height': 'auto'
                    });
                });
            });
        </script>

        <!-- for single map -->

        <script type="text/javascript">
            $('.single_hotel_map').click(function () {

                var hotel_id = $(this).closest('.get_hotel_id').attr('hotel_id');

                var url = 'http://' + window.location.host + '/get_single_hotel_map';

                var formData = new FormData();

                formData.append('hotel_id', hotel_id);

                sendHotelListSingleMapData(url, formData);

            });

        </script>

        <script type="text/javascript">
            $(function () {
                $(".single_hotel_map").click(function () {

                    var hotel_id = $(this).closest('.get_hotel_id').attr('hotel_id');

                    $('html, body').css({
                        'overflow': 'hidden',
                        'height': '100%'
                    });

                    $("#dialog" + hotel_id).dialog({
                        closeOnEscape: false,
                        open: function (event, ui) {
                            $(".ui-dialog-titlebar-close", ui.dialog | ui).hide();
                        },
                        modal: true,
                        title: "Google Map",
                        width: 650,
                        height: 550,
                        buttons: {
                            Close: function () {
                                $(this).dialog('close');
                                $('html, body').css({
                                    'overflow': 'auto',
                                    'height': 'auto'
                                });
                            }

                        }
                    });
                });
                $(".ui-dialog-titlebar-close").click(function () {
                    $('html, body').css({
                        'overflow': 'auto',
                        'height': 'auto'
                    });
                });
            });
        </script>

    @endsection

    </body>
@stop
