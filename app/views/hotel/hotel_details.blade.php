@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ Hotel::where('id', $hotel_id)->first()->search_keywords }}">
    <meta name="description" content="{{ Hotel::where('id', $hotel_id)->first()->search_description }}">
    <title> {{ Hotel::where('id', $hotel_id)->first()->name . '-' . Request::segment(2) . '-Sri Lanka'; }} </title>

    <style type="text/css">
        @media only screen and (min-width: 767px) and (max-width: 1366px) {
            #ui-datepicker-div {
                top: 810px !important;
            }
        }

        @media only screen and (min-width: 480px) and (max-width: 767px) {
            #ui-datepicker-div {
                top: 810px !important;
            }
        }

        @media only screen and (min-width: 0px) and (max-width: 479px) {
            #ui-datepicker-div {
                top: 1450px !important;
            }
        }

    </style>

@endsection

@section('custom_style')

    <!-- bin/jquery.slider.min.css -->
    {{ HTML::style('plugins/jslider/css/jslider.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('plugins/jslider/css/jslider.round-blue.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- jQuery -->
    {{--{{ HTML::style('assets/js/jquery.v2.0.3.js') }}--}}
    {{ HTML::style('assets/js/jquery-ui.js') }}

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
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Javascript -->
    {{ HTML::script('assets/js/js-details.js') }}
    {{ HTML::script('assets/js/jquery.v2.0.3.js') }}

    <style type="text/css">
        .hotel_room_img {
            width: 245px;
            height: 159px;
        }

        .smile_img {
            width: 35px;
            height: 35px;
        }

        h4 {
            color: #0099cc !important;
            font-family: "Lato";
            font-size: 13px;
        }

        .hotel_img_rate_box {
            width: 71px;
            height: 71px;
        }

        #preferences p, li {
            color: #999 !important;
        }

        .hot_facilities_icon {
            display: inline;
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
            display: inline;
            opacity: 1;
            color: #000000 !important;
        }

        .model_room {
            width: 240px;
            height: 180px;
        }

        .modal-dialog {
            width: 800px !important;
        }

        .modal {
            /*margin-left: -50px;*/
            height: 800px;
        }

        @media (max-width: 767px) {
            .modal {
                width: auto;
                margin-left: auto;
            }
        }

        .modal-body {
            overflow: hidden;
        }

        .room_right_model {
            width: 35%;
            float: left;
            height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .room_left_model {
            float: left;
            width: 60%;
        }

        .room_right_model h5 {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            color: #000000;
        }

        .room_right_model p {
            font-size: 12px;
        }

    </style>

    <script type="text/javascript">
        $(function () {
            $.extend($.datepicker, {
                _checkOffset: function (inst, offset, isFixed) {
                    return offset
                }
            });

            $("#datepicker").datepicker({

                onClose: function (selectedDate) {
                    $("#datepicker2").datepicker("option", "minDate", selectedDate);
                    $("#datepicker2").datepicker("show");
                }
            });
            $("#datepicker2").datepicker({

                onClose: function (selectedDate) {
                    $("#datepicker").datepicker("option", "maxDate", selectedDate + 1);
                }
            });
        });

    </script>

    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker({
                onClose: function () {
                    var minValue = $(this).val();
                    minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
                    minValue.setDate(minValue.getDate() + 1);

                    $("#datepicker2").datepicker("option", "minDate", minValue);
                    return $("#datepicker2").datepicker("show");
                }
            });
        });
    </script>

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
                    <li><a href="{{URL::to('sri-lanka/'.Request::segment(2).'/'.Request::segment(3) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(3)) }} </a></li>
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

            <!-- SLIDER -->
            <div class="col-md-8 details-slider">
                @foreach($hotel as $details)
                    <div id="c-carousel">
                        <div id="wrapper">
                            <div id="inner">
                                <div id="caroufredsel_wrapper2">
                                    <div id="carousel">
                                        @foreach ($path as $img_path)
                                            <?php $img_name = basename($img_path); ?>
                                            {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'slider_img_1')) }}
                                        @endforeach
                                    </div>
                                </div>
                                <div id="pager-wrapper">
                                    <div id="pager">
                                        @foreach ($path as $img_path)
                                            <?php $img_name = basename($img_path); ?>
                                            {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'slider_img_1')) }}
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <button id="prev_btn2" class="prev2">
                                {{ HTML::image('images/spacer.png', '', array('class' => 'slider_img_2')) }}
                            </button>
                            <button id="next_btn2" class="next2">
                                {{ HTML::image('images/spacer.png', '', array('class' => 'slider_img_2')) }}
                            </button>

                        </div>
                    </div>
                    <!-- /carousel -->
                @endforeach
            </div>
            <!-- END OF SLIDER -->

            <!-- RIGHT INFO -->
            <div class="col-md-4 detailsright offset-0">
                <div class="padding20">

                    <h2 class="" style="color: #3498db">{{ $details->name }}</h2>
                    <span class="size14 grey"> {{ $details->address }} </span>
                    <br/>
                    <?php
                    $stars = $details->star_category_id;
                    $star = DB::table('star_categories')->where('id', $stars)->first();
                    $hotel_star = $star->stars;
                    ?>

                    {{ Star::star_loop_yellow($hotel_star)}}

                </div>

                <div class="line3"></div>

                <div class="hpadding20">
                    <h2 class="opensans slim green2">wonderful...!!</h2>
                </div>

                @foreach($details->hotelReview as $review)
                    <div class="hpadding20">
                        {{--<h2 class="opensans slim green2">{{ $review->review.' !'; }}</h2>--}}
                    </div>
                @endforeach

                <div class="line3 margtop20"></div>

                <div class="col-md-6 bordertype1 padding20">
                    <span class="opensans size30 bold grey2">97%</span><br/>
                    of guests<br/>recommend
                </div>
                <div class="col-md-6 bordertype2 padding20">
                    <span class="opensans size30 bold grey2">4.5</span>/5<br/>
                    guest ratings
                </div>
                <?php
                $get_reviews_count = DB::table('hotel_reviews')->where('hotel_id', $hotel_id)->count();
                ?>
                {{ Form::hidden('rate_hotel_id2', $hotel_id , array('class' => 'hidden_hotel_id2') ) }}
                <div class="col-md-6 bordertype3">
                    {{ HTML::image('images/site/smile.png', '', array('class'=>'smile_img')) }}<br/>
                    {{ $get_reviews_count }} reviews
                </div>
                <div class="col-md-6 bordertype3">
                    <a href="#" class="grey">+Add review</a>
                </div>
                <div class="clearfix"></div>
                <br/>

                <div class="hpadding20">
                    <a href="#" class="add2fav margtop5">Add to favourite</a>
                    <a href="#" class="booknow margtop20 btnmarg">Book now</a>
                </div>
                <br/>
            </div>
            <!-- END OF RIGHT INFO -->

        </div>
        <!-- END OF container-->

        <div class="container mt25 offset-0">

            <div class="col-md-8 pagecontainer2 offset-0">
                <div class="cstyle10"></div>

                <ul class="nav nav-tabs" id="myTab">
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span
                                    class="summary"></span><span class="hidetext">Summary</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span
                                    class="rates"></span><span class="hidetext">Room rates</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#preferences"><span
                                    class="preferences"></span><span class="hidetext">Facilities</span>&nbsp;</a>
                    </li>
                    <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps" id=""><span
                                    class="maps"></span><span
                                    class="hidetext">Maps</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate(); trigerJslider(); trigerJslider2(); trigerJslider3(); trigerJslider4(); trigerJslider5(); trigerJslider6();"
                        class=""><a data-toggle="tab" href="#reviews"><span class="reviews"></span><span
                                    class="hidetext">Reviews</span>&nbsp;
                        </a></li>

                </ul>

                <div class="tab-content4">
                    <!-- TAB 1 -->

                    <div id="summary" class="tab-pane fade ">
                        <div class="container">
                            <p class="hpadding20">
                                {{ Hotel::where('id', $hotel_id)->first()->overview }}
                            </p>
                        </div>
                        <div class="line4"></div>

                        <!-- Collapse 3 -->
                        <button type="button" class="collapsebtn2 collapsed" data-toggle="collapse"
                                data-target="#collapse3">
                            Hotel Facilities <span class="collapsearrow"></span>
                        </button>

                        <div id="collapse3" class="collapse in">
                            <div class="hpadding20">
                                @foreach($details->HotelFacility as $facilities)
                                    <div class="col-md-4">
                                        <ul class="checklist">
                                            <li> {{ $facilities->hotel_facility }} </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 3 -->
                    </div>

                    <!-- TAB 2 -->
                    <div id="roomrates" class="tab-pane fade active in">
                        <div class="hpadding20">
                            <p class="dark">Your travel rates</p>
                            <?php  $city = Request::segment(2); ?>
                            {{ Form::open(array('url' => '/sri-lanka/'.$city.'/'.str_replace(' ', '-', $details->name), 'method' => 'POST', 'id'=>'details_form')) }}

                            <div id="select_your_date" class="col-md-4 offset-0">
                                <div class="w50percent">
                                    <div class="wh90percent textleft">
                                        <span class="opensans size13"><b>Check in</b></span>
                                        <input type="text" name="check_in_date"
                                               class="form-control mySelectCalendar chk_in"
                                               id="datepicker"
                                               value="{{ Session::has('st_date') ? Session::get('st_date') : '' }}"/>
                                    </div>
                                </div>

                                <div class="w50percentlast">
                                    <div class="wh90percent textleft right">
                                        <span class="opensans size13"><b>Check out</b></span>
                                        <input type="text" name="check_out_date"
                                               class="form-control mySelectCalendar chk_out"
                                               id="datepicker2"
                                               value="{{ Session::has('ed_date') ? Session::get('ed_date') : '' }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 offset-0">
                                <div class="col-md-8 ">

                                    <div class="room1">

                                        <div class="w50percentlast">
                                            <div class="wh90percent textleft right ohidden">
                                                <div class="w50percent">
                                                    <div class="wh90percent textleft left">
                                                        <span class="opensans size13"><b>Adult</b></span>
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
                                                        <span class="opensans size13"><b>Child</b></span>
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
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4 center offset-0 left">
                                    <input type="submit" value="Update" class="updatebtn caps center margtop20"/>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            {{ Form::close() }}

                        </div>
                        <br/>

                        <p class="hpadding20 dark">Room Types</p>

                        <div class="line2"></div>
                        <?php $x = 0; $i = 0; $n = 0; $adult_arr = array(); $child_arr = array(); ?>
                        @foreach($rooms as $hot_room)
                            <?php
                            $n = $n + 1;
                            $room_id = $hot_room->id;
                            $from_date = date('Y-m-d', strtotime(str_replace('-', '/', $st_date)));
                            $to_date = date('Y-m-d', strtotime(str_replace('-', '/', $ed_date)));

                            if (Session::get('adult') == 1) {
                                $adult_arr = array(
                                        '0' => 1
                                );
                            } elseif (Session::get('adult') == 2) {
                                $adult_arr = array(
                                        '0' => 1,
                                        '1' => 2
                                );
                            } elseif (Session::get('adult') == 3) {
                                $adult_arr = array(
                                        '0' => 1,
                                        '1' => 2,
                                        '2' => 3
                                );
                            } elseif (Session::get('adult') == 4) {
                                $adult_arr = array(
                                        '0' => 1,
                                        '1' => 2,
                                        '2' => 3,
                                        '3' => 4
                                );
                            } elseif (Session::get('adult') == 5) {
                                $adult_arr = array(
                                        '0' => 1,
                                        '1' => 2,
                                        '2' => 3,
                                        '3' => 4,
                                        '4' => 5
                                );
                            }

                            if (Session::get('child') == 0) {
                                $child_arr = array(
                                        '0' => 0
                                );
                            } elseif (Session::get('child') == 1) {
                                $child_arr = array(
                                        '0' => 0,
                                        '1' => 1
                                );
                            } elseif (Session::get('child') == 2) {
                                $child_arr = array(
                                        '0' => 0,
                                        '1' => 1,
                                        '2' => 2,
                                );
                            } elseif (Session::get('child') == 3) {
                                $child_arr = array(
                                        '0' => 0,
                                        '1' => 1,
                                        '2' => 2,
                                        '3' => 3
                                );
                            }


                            if (Session::has('st_date')) {
                                $room_types = Rate::whereHas('RoomSpecification', function ($a) use ($adult_arr, $child_arr) {
                                    $a->WhereIn('adults', $adult_arr);
                                    $a->WhereIn('children', $child_arr);
                                })
                                        ->where('room_type_id', $room_id)
                                        ->where('market_id', $market)
                                        ->where('from', '<=', $from_date)
                                        ->where('to', '>=', $from_date)
                                        ->get();
                            } else {
                                $room_types = Rate::whereHas('RoomSpecification', function ($a) use ($adult_arr, $child_arr) {
                                    $a->Where('adults', Session::get('adult'));
                                    $a->Where('children', Session::get('child'));
                                })
                                        ->where('room_type_id', '=', $room_id)
                                        ->where('from', '<=', $from_date)
                                        ->where('to', '>=', $from_date)
                                        ->get();
                            }

                            $directory = public_path() . '/images/room_images/';
                            $images = glob($directory . $room_id . ".*");
                            $img_path = array_shift($images);
                            $img_name = basename($img_path);
                            ?>

                            @if(count($room_types) > 0)

                                @foreach($room_types as $room)

                                    <div id="room_id" room_id="{{ $room_id }}" class="padding20 get_room_id"
                                         style="padding-bottom: 10px !important;">

                                        {{ Form::hidden('rate_hotel_id', $room->hotel_id , array('class' => 'hidden_hotel_id') ) }}
                                        <div class="col-md-4 offset-0">
                                            <a href="#">
                                                @if(count($img_path)>0)
                                                    {{ HTML::image('images/room_images/'.$img_name, '', array('class' => 'hotel_room_img'))}}
                                                @else
                                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'fwimg')) }}
                                                @endif
                                            </a>

                                            <div style="padding-top: 8px; padding-left: 20%">
                                                <a data-toggle="modal" data-target="#myModal{{ $room_id }}"
                                                   class="lred bold" href="">Check Room Details</a>
                                            </div>
                                        </div>

                                        <div class="col-md-8 offset-0">
                                            <div class="col-md-8 mediafix1">

                                                <h4 style="font-weight: 900; text-decoration: none !important; display: inline; !important;"
                                                    class="opensans dark bold margtop1 lh1">
                                                    {{ $room->RoomType->room_type }}
                                                </h4> -
                                                <h5 style="font-weight: 900; color: #0099cc !important; display: inline; !important;"> {{ $room->RoomSpecification->room_specification }}
                                                    Room
                                                </h5>

                                                <h5>{{ $room->MealBasis->meal_basis_name }}</h5>
                                                <?php $t = 0;?>
                                                @foreach($hot_room->RoomFacility as $facilities)
                                                    <?php
                                                    //echo public_path();
                                                    $directory1 = public_path() . '/images/room_facilities/';
                                                    $images1 = glob($directory1 . $facilities->id . "*");
                                                    $img_path1 = array_shift($images1);
                                                    $img_name1 = basename($img_path1);
                                                    $cancellation_policy = CancellationPolicy::where('hotel_id', $hotel_id)->first();
                                                    ?>

                                                    @if($t<11)
                                                        {{ HTML::image('images/room_facilities/'.$img_name1, '', array('class' => 'hot_facilities_icon'))}}
                                                    @endif

                                                    <?php $t = $t + 1; ?>
                                                @endforeach

                                                @if(!empty($cancellation_policy))

                                                    <script>
                                                        //Popover tooltips
                                                        $(function () {
                                                            $("#username<?php echo $x; ?>").popover({
                                                                container: 'body',
                                                                placement: 'top',
                                                                trigger: 'hover',
                                                                html: true,
                                                                title: function () {
                                                                    return $('#popover_title_wrapper<?php echo $x; ?>').html();
                                                                },
                                                                content: function () {
                                                                    return $('#popover_content_wrapper<?php echo $x; ?>').html();
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                    <div id="popover_title_wrapper{{ $x }}" style="display: none">
                                                        <h4 style="color: #3498db"> Cancellation Policy </h4>
                                                    </div>

                                                    <div id="popover_content_wrapper{{ $x }}" style="display: none">
                                                        <div>

                                                            <p>
                                                                <strong style="color:#AF0B63;">You are in
                                                                    the cancellation
                                                                    period. Please refer the cancellation
                                                                    policy</strong>.<br><br>

                                                                Before {{ (CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 100)->first()->to) - (CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 100)->first()->from) }}
                                                                days no cancellation.<br><br>
                                                                Between {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 50)->first()->from; }}
                                                                - {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 50)->first()->to; }}
                                                                days 50% cancellation of the total invoice value.
                                                                <br/><br>
                                                                Between {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 25)->first()->from; }}
                                                                - {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 25)->first()->to; }}
                                                                days 25% cancellation of the total invoice
                                                                value.<br><br>
                                                                Less
                                                                than {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 0)->first()->from; }}
                                                                days 100 % cancellation of the total invoice
                                                                value.<br><br>
                                                                No shows &amp; early departures 100% cancellation of the
                                                                total invoice value.

                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="clearfix"></div>
                                                <ul class="checklist2 margtop10">
                                                    @if(!empty($cancellation_policy))
                                                        <li>FREE Cancellation
                                                            <a href="#"
                                                               class="popover1 glyphicon glyphicon-info-sign lblue cpointer"
                                                               rel="popover" id="username{{ $x }}"
                                                               data-content="" data-title="">
                                                            </a>
                                                        </li>
                                                    @endif

                                                    <li>
                                                        @if($room->MealBasis->id == 1)
                                                            Room Only
                                                        @elseif($room->MealBasis->id == 2)
                                                            Bed & Breakfast
                                                        @elseif($room->MealBasis->id == 3)
                                                            Breakfast & Dinner
                                                        @elseif($room->MealBasis->id == 4)
                                                            Breakfast , Lunch & Dinner
                                                        @else
                                                            <h5> Breakfast , Lunch , Dinner & Liquor </h5>
                                                        @endif
                                                    </li>
                                                </ul>
                                                <br/><br/>

                                                @if($market == 1)
                                                    <span class="green size12">All Tax 16.7% and 10% service charge Not included</span>
                                                @endif
                                            </div>

                                            @if(Session::has('st_date'))
                                                <?php $low_room_rate = RoomRates::lowestRoomRateWithTax($hotel_id, $room_id, $room->room_specification_id, $room->meal_basis_id, $st_date, $ed_date); ?>
                                                <div class="col-md-4 center bordertype4">
                                                    @if($low_room_rate > 0 )
                                                        <span class="opensans green size24">  {{ Session::get('currency') . '&nbsp;' . number_format(($low_room_rate * Session::get('currency_rate')), 2, '.', '') }}</span>
                                                        <br/>
                                                        {{ Form::selectRange('number', 1, 10, null, ['class' => 'form-control mySelectBoxClass room_count', 'id' => $room_id.$room->meal_basis_id.$room->room_specification_id]) }}
                                                        <br/>
                                                        <?php
                                                        $allotments = Allotments::allotmentsCount($room_id, Session::get('st_date'), Session::get('ed_date'));
                                                        ?>
                                                        @if(!empty($allotments) && ($allotments > 3))
                                                            <span class="green size12 bold">{{ $allotments }} Rooms Available</span>
                                                            <br/>
                                                        @elseif(!empty($allotments) && ($allotments > 1))
                                                            <br/>
                                                            <span class="lred size12 bold"> Last {{ $allotments }}
                                                                Rooms</span>
                                                            <br/>
                                                        @elseif(!empty($allotments) && ($allotments > 0))
                                                            <br/>
                                                            <span class="red size12 bold"> Only One Left</span>
                                                            <br/>
                                                        @else
                                                            <br/>
                                                            <span class="red size12 bold">No Rooms Available</span>
                                                            <br/>
                                                        @endif
                                                        <br/>
                                                        {{ Room::roomTypeImage($room->RoomSpecification->adults, $room->RoomSpecification->children) }}
                                                        <br/><br/>
                                                        @if(!empty($allotments) && ($allotments > 0))
                                                            {{ Form::hidden('room_meal_id', $room->meal_basis_id , array('class' => 'hidden_room_meal_id') ) }}
                                                            <button id="room_book{{ $x }}"
                                                                    class="room_book_summery bookbtn mt1"
                                                                    room_refer="{{ $room_id.$room->meal_basis_id.$room->room_specification_id }}">
                                                                Book
                                                            </button>
                                                            {{ Form::hidden('room_specification_id', $room->room_specification_id , array('class' => 'hidden_room_specification_id') ) }}
                                                        @else
                                                            <a class="bookbtn mt1" href="{{URL::to('/contact')}}">
                                                                Send Inquiry
                                                            </a>
                                                        @endif
                                                    @else
                                                        <div class="padding20">
                                                            {{ HTML::image('images/site/rates are not available.jpg', '', array('class' => 'no_rate_img')) }}
                                                        </div>
                                                    @endif

                                                </div>
                                            @else
                                                <div class="col-md-4 center bordertype4">
                                                    <button id="date_select_button" class="bookbtn mt1">Select Date
                                                    </button>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{ $room_id }}" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        <h4 style="font-weight: 900; display: inline"
                                                            class="modal-title"
                                                            id="myModalLabel">
                                                            {{ Hotel::where('id', $hotel_id)->first()->name }}
                                                        </h4>
                                                        -
                                                        <h5 style="font-weight: 900; display: inline">
                                                            {{ $room->RoomType->room_type }}
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="room_left_model col-md-5">
                                                                <div style="padding: 10px">
                                                                    @if(count($img_path)>0)
                                                                        {{ HTML::image('images/room_images/'.$img_name, '', array('class' => 'model_room'))}}
                                                                    @else
                                                                        {{ HTML::image('images/no-image.jpg', '', array('class' => 'model_room')) }}
                                                                    @endif
                                                                </div>
                                                                <div style="padding: 10px; text-align: center">
                                                                    {{ Room::roomTypeImage(Session::get('adult'), Session::get('child')) }}
                                                                </div>
                                                                @if(Session::has('st_date'))
                                                                    <div class="green"
                                                                         style="font-size: 20px; padding: 10px; text-align: center">
                                                                        {{ Session::get('currency') . '&nbsp;' . number_format(($low_room_rate * Session::get('currency_rate')), 2, '.', '') }}
                                                                    </div>
                                                                @else
                                                                    <div class="green"
                                                                         style="font-size: 20px; padding: 10px; text-align: center">
                                                                        Please Select Date
                                                                    </div>
                                                                @endif
                                                            </div>

                                                            <div class="room_right_model col-md-7">

                                                                <div>
                                                                    <h5>Description</h5>

                                                                    <p>
                                                                        {{ strip_tags($room->RoomType->description) }}
                                                                    </p>
                                                                </div>

                                                                <div class="offset-2">
                                                                    <hr class="featurette-divider3">
                                                                </div>

                                                                <div>
                                                                    <h5>Child Policy</h5>

                                                                    <p>
                                                                        Children below 0 years are charged 0% of
                                                                        the
                                                                        adult rate
                                                                        Children between 0 and 0 years are
                                                                        charged
                                                                        0% of the adult rate
                                                                        Age above 0 years are considered as
                                                                        Adults
                                                                    </p>
                                                                </div>

                                                                <div class="offset-2">
                                                                    <hr class="featurette-divider3">
                                                                </div>
                                                                @if(!empty($cancellation_policy))
                                                                    <div>
                                                                        <h5>Cancellation Policy </h5>

                                                                        <p>
                                                                            <strong style="color:#AF0B63;">You are
                                                                                in
                                                                                the cancellation
                                                                                period. Please refer the
                                                                                cancellation
                                                                                policy</strong>.<br><br>

                                                                            Before {{ (CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 100)->first()->to) - (CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 100)->first()->from) }}
                                                                            days no cancellation.<br>
                                                                            Between {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 50)->first()->from; }}
                                                                            - {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 50)->first()->to; }}
                                                                            days 50% cancellation of the
                                                                            <br/>
                                                                            Between {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 25)->first()->from; }}
                                                                            - {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 25)->first()->to; }}
                                                                            days 25% cancellation of the
                                                                            total invoice value.<br>
                                                                            Less
                                                                            than {{ CancellationPolicy::where('hotel_id', $hotel_id)->where('percentage_charged', 0)->first()->from; }}
                                                                            days 100 % cancellation of the
                                                                            total invoice value.<br>
                                                                            No shows &amp; early departures 100%
                                                                            cancellation of the total invoice value.

                                                                        </p>
                                                                    </div>
                                                                @endif
                                                                <div class="offset-2">
                                                                    <hr class="featurette-divider3">
                                                                </div>

                                                                <div>
                                                                    <h5>Facilities</h5>

                                                                    @foreach($hot_room->RoomFacility as $facilities)
                                                                        <div class="col-md-6">
                                                                            <ul class="checklist">
                                                                                <li style="font-size: 12px"> {{ $facilities->room_facility }} </li>
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach

                                                                </div>

                                                                <div class="offset-2">
                                                                    <hr class="featurette-divider3">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="line2"></div>

                                    <?php $x = $x + 1; ?>

                                @endforeach

                            @else
                                <?php $i = $i + 1; ?>
                            @endif

                        @endforeach

                        @if($n == $i)
                            {{ HTML::image('images/site/rates are not available.jpg', '', array('class' => 'no_rate_img')) }}
                        @endif

                    </div>

                    <!-- TAB 3 -->
                    <div id="preferences" class="tab-pane fade">

                        <!-- Collapse 3 -->
                        <button type="button" class="collapsebtn2 collapsed" data-toggle="collapse"
                                data-target="#collapse3">
                            Hotel Facilities <span class="collapsearrow"></span>
                        </button>

                        <div id="collapse3" class="collapse in">
                            <div class="hpadding20">
                                @foreach($details->HotelFacility as $facilities)
                                    <div class="col-md-4">
                                        <ul class="checklist">
                                            <li> {{ $facilities->hotel_facility }} </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 3 -->

                        <div class="line4"></div>

                        <!-- Collapse 6 -->
                        <button type="button" class="collapsebtn2" data-toggle="collapse"
                                data-target="#collapse6">
                            Room Facility <span class="collapsearrow"></span>
                        </button>

                        <div id="collapse6" class="collapse in">
                            <div class="hpadding20">
                                @foreach($rooms as $room)
                                    @foreach($room->RoomFacility as $facilities)
                                        <div class="col-md-4">
                                            <ul class="checklist">
                                                <li> {{ $facilities->room_facility }} </li>
                                            </ul>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- End of collapse 6 -->

                        <div class="line4"></div>

                    </div>

                    <!-- TAB 4 -->
                    <div id="maps" class="tab-pane fade">
                        <div class="hpadding20">
                            <div id="map-canvas"></div>
                        </div>
                        <input type="hidden" id="get_map" value="{{ $hotel_id }}">
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

                        <div class="line4"></div>

                        <div class="hpadding20">
                            <div class="col-md-4 offset-0">
                                <div class="scircle left">4.4</div>
                                <div class="sctext left margtop15">Cleanliness</div>
                                <div class="clearfix"></div>
                                <div class="scircle left">4.0</div>
                                <div class="sctext left margtop15">Service & staff</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 offset-0">
                                <div class="scircle left">3.8</div>
                                <div class="sctext left margtop15">Room comfort</div>
                                <div class="clearfix"></div>
                                <div class="scircle left">4.4</div>
                                <div class="sctext left margtop15">Sleep Quality</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 offset-0">
                                <div class="scircle left">4.2</div>
                                <div class="sctext left margtop15">Location</div>
                                <div class="clearfix"></div>
                                <div class="scircle left">4.4</div>
                                <div class="sctext left margtop15">Value for Price</div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>

                            <br/>
                            <span class="opensans dark size16 bold">Reviews</span>
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

                                    <p>The view from our balcony in room # 409, was terrific. It was centrally
                                        located
                                        to
                                        everything on and around the port area. Wonderful service and everything was
                                        very
                                        clean. The breakfast was below average, although not bad. If back in Zante
                                        Town
                                        we
                                        would stay there again.</p>
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
                                        ready
                                        even though the temperature was quiet high already.</p>
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
                            <ul class="jslidetext">
                                <li>Cleanliness</li>
                                <li>Room comfort</li>
                                <li>Location</li>
                                <li>Service & staff</li>
                                <li>Sleep quality</li>
                                <li>Value for Price</li>
                            </ul>

                            <ul class="jslidetext2">
                                <li>Username</li>
                                <li>Evaluation</li>
                                <li>Title</li>
                                <li>Comment</li>
                            </ul>
                        </div>

                        <!-- bin/jquery.slider.min.js -->
                        {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
                        {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
                        <!-- end -->

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
                                <div class="layout-slider wh100percent">
       <span class="cstyle01"><input id="Slider1" type="slider" name="price"
                                     value="0;4.2"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider() {
                                        jQuery("#Slider1").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                        testTriger();
                                    }
                                </script>


                                <div class="layout-slider margtop10 wh100percent">
       <span class="cstyle01"><input id="Slider2" type="slider" name="price"
                                     value="0;5.0"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider2() {
                                        jQuery("#Slider2").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                    }
                                </script>

                                <div class="layout-slider margtop10 wh100percent">
       <span class="cstyle01"><input id="Slider3" type="slider" name="price"
                                     value="0;2.5"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider3() {
                                        jQuery("#Slider3").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                    }
                                </script>

                                <div class="layout-slider margtop10 wh100percent">
       <span class="cstyle01"><input id="Slider4" type="slider" name="price"
                                     value="0;3.8"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider4() {
                                        jQuery("#Slider4").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                    }
                                </script>

                                <div class="layout-slider margtop10 wh100percent">
       <span class="cstyle01"><input id="Slider5" type="slider" name="price"
                                     value="0;4.4"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider5() {
                                        jQuery("#Slider5").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                    }
                                </script>

                                <div class="layout-slider margtop10 wh100percent">
       <span class="cstyle01"><input id="Slider6" type="slider" name="price"
                                     value="0;4.0"/></span>
                                </div>
                                <script type="text/javascript">
                                    function trigerJslider6() {
                                        jQuery("#Slider6").slider({
                                            from: 0,
                                            to: 5,
                                            step: 0.1,
                                            smooth: true,
                                            round: 1,
                                            dimension: "",
                                            skin: "round"
                                        });
                                    }
                                </script>

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

            <input type="hidden" id="currency_session"
                   value="{{ Session::has('currency') ? Session::get('currency') : 'USD' }}"/>
            <input type="hidden" id="currency_rate_session"
                   value="{{ Session::has('currency_rate') ? Session::get('currency_rate') : 1 }}"/>

            <div id="room_rate_tag" class="col-md-4">
                <div class="pagecontainer2 paymentbox grey">
                    <div class="padding30">
                        <?php
                        //echo public_path();
                        $directory = public_path() . '/images/hotel_images/';
                        $images = glob($directory . $hotel_id . "_*");
                        $img_path = array_shift($images);
                        $img_name = basename($img_path);
                        ?>

                        @if(count($img_path)>0)
                            {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'hotel_img_rate_box left margright20'))}}
                        @else
                            {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_img_rate_box left margright20')) }}
                        @endif

                        <h4 style="display:inline; color: #000000 !important; font-style: normal !important;"
                            class="opensans size18 dark bold">{{ Hotel::where('id', $hotel_id)->first()->name; }}</h4>
                        <h5 style="display:inline;"
                            class="opensans size13 grey">{{ Hotel::where('id', $hotel_id)->first()->address; }}</h5>
                        <br>

                        {{ Star::star_loop_blue($hotel_star)}}

                    </div>
                    <div class="line3"></div>

                    <div class="hpadding30 margtop30">
                        <table class="table table-bordered margbottom20">
                            <tbody>
                            <tr>
                                <td>Guests recommendations</td>
                                <td class="center green bold">97%</td>
                            </tr>
                            <tr>
                                <td>Guest ratings</td>
                                <td class="center green bold">4.5</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered margbottom20">
                            <tbody id="rate_box_table">

                            </tbody>
                        </table>

                    </div>
                    <div class="line3"></div>

                    <div class="padding30">
                        <span class="left size14 dark">Total Cost :  </span>

                        {{--<span class="green bold size18"> USD </span>    --}}
                        <span id="room_total_cost" class="right green bold size18"> </span>

                        <div class="clearfix"></div>
                    </div>

                    <div class="line3"></div>
                    <br/>

                    &nbsp;&nbsp;&nbsp;
                    <a style="cursor: pointer" id="add_to_cart" name="add_to_cart" class="bluebtn margtop20">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        Add To Cart
                    </a>

                    &nbsp;&nbsp;
                    <a style="cursor: pointer" href="{{URL::to('/bookings/create')}}" class="bluebtn margtop20">
                        <span class="glyphicon glyphicon-play"></span>
                        Checkout
                    </a>

                    <div class="clearfix"></div>
                    <br/>

                </div>
            </div>

        </div>

    </div>

    <!-- END OF CONTENT -->

    @endsection

    @section('script')
        {{--{{ HTML::script('assets/js/js-details.js') }}--}}

        <!-- Google map -->
        {{ HTML::script('assets/js/initialize-google-map.js') }}

        <!-- Carousel-->
        {{ HTML::script('assets/js/initialize-carousel-detailspage.js') }}

        <!-- my script-->
        {{ HTML::script('js/booking_cart.js') }}

        {{ HTML::script('js/toastr.js') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}

        <script type="text/javascript">
            $(document).ready(function () {
                var hotel_id = $('.hidden_hotel_id2').val();

                var formData = new FormData();
                formData.append('hotel_id', hotel_id);

                var url = 'http://' + window.location.host + '/sri-lanka/get_room_rate_box';
                sendBookingData(url, formData);
            });
        </script>

        <script type="text/javascript">
            $(function () {

                $('.room_book_summery').click(function () {

                    $('#room_rate_tag').show("blind", 500);

                    var hotel_id = $('.hidden_hotel_id').val();
                    var room_id = $(this).closest('.get_room_id').attr('room_id');
                    var room_count_id = $(this).attr('room_refer');
                    var room_count = $('#' + room_count_id).val();
                    var meal_basis_id = $(this).prev('input:hidden').val();
                    var room_specification_id = $(this).next('input:hidden').val();
                    var check_in = $('.chk_in').datepicker({dateFormat: 'dd-mm-yy'}).val();
                    var check_in_key = $('.chk_in').datepicker({dateFormat: 'yy-mm-dd'}).val();
                    var x = check_in_key.replace(/\//g, '-');
                    var check_out = $('.chk_out').datepicker({dateFormat: 'dd-mm-yy'}).val();
                    var check_out_key = $('.chk_out').datepicker({dateFormat: 'yy-mm-dd'}).val();
                    var y = check_out_key.replace(/\//g, '-');
                    var check_room = x + '_' + y + '_' + hotel_id + '_' + room_id + '_' + room_specification_id + '_' + meal_basis_id;

                    var url = 'http://' + window.location.host + '/sri-lanka/get_room_rate_box';

                    var formData = new FormData();

                    formData.append('hotel_id', hotel_id);
                    formData.append('room_id', room_id);
                    formData.append('room_count', room_count);
                    formData.append('meal_basis_id', meal_basis_id);
                    formData.append('room_specification_id', room_specification_id);
                    formData.append('room_count', room_count);
                    formData.append('check_room', check_room);
                    formData.append('check_in', check_in);
                    formData.append('check_out', check_out);

                    sendBookingData(url, formData);

                });
            });
        </script>

        <script type="text/javascript">
            $('#add_to_cart').click(function () {

                var hotel_id = $('.hidden_hotel_id').val();
                var url = 'http://' + window.location.host + '/add-to-cart/' + hotel_id;

                $.ajax({
                    url: url,
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#room_rate_tag').hide();
                        toastr.success('Successfully Added To The Cart...!!');
                    },

                    error: function () {
                        //alert('There was an error signing In');
                    }
                });
            });
        </script>

    @endsection

    </body>

@stop