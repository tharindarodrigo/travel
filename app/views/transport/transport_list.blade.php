@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Transport List </title>

@endsection

@section('custom_style')

    <!-- Updates -->
    {{ HTML::style('updates/update1/css/style01.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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

    <style type="text/css">
        .collapsebtn {
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }

        .transport_img {
            width: 207px;
            height: 156px;
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

                        <p class="size13"><span class="size18 bold ">{{ $transport_packages->getTotal(); }}</span>
                            Package starting
                            at
                        </p>

                        <p class="size30 bold">$<span class=""> {{ $min_trans_rate }} </span></p>

                        <p class="size13">In Transport Package </p>
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

                    <!-- HOTELS TAB -->
                    {{ Form::open(array('url' => 'sri-lanka/hotel-search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}

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

                    {{Form::close()}}
                    <!-- END OF HOTELS TAB -->

                    <!-- TRANSPORT TAB -->

                    {{ Form::open(array('url' => 'sri-lanka/transport-search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}

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

                    {{Form::close()}}
                    <!-- END OF TRANSPORT TAB -->

                </div>
                <!-- END OF BOOK FILTERS -->
                <div class="line2"></div>

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

                <div class="hpadding20">
                    <!-- Top filters -->
                    <div class="topsortby">
                        <div class="col-md-4 offset-0">

                            <div class="left mt7"><b>Sort by:</b></div>

                            <div class="right wh70percent">
                                <select class="form-control mySelectBoxClass ">
                                    <option selected>Manufacturer</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Mazda</option>
                                    <option>Lamborghini</option>
                                    <option>Porsche</option>
                                    <option>Volkswagen</option>
                                    <option>...</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="w50percent">
                                <div class="wh90percent">
                                    <select class="form-control mySelectBoxClass ">
                                        <option selected>Automatic</option>
                                        <option>Manual</option>
                                        <option>CVT (Continuous variable transmission)</option>
                                        <option>Semi automatic</option>
                                        <option>TipTronic® gearbox</option>
                                        <option>DSG (Direct shift gearbox)</option>
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
                            <div class="wh50percent left">
                                <select class="form-control mySelectBoxClass ">
                                    <option selected>Fuel type</option>
                                    <option>Diesel</option>
                                    <option>Petrol</option>
                                    <option>Hibrid</option>
                                    <option>Electric</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- End of topfilters-->
                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">

                    <script>
                        //Popover tooltips
                        $(function () {
                            $("#username").popover({placement: 'top', trigger: 'hover'});
                        });
                    </script>

                    @foreach($transport_packages as $transport_package)

                        <div class="col-md-4 border">
                            <!-- CONTAINER-->
                            <div class="carscontainer">
                                <div class="center">
                                    <a href="">
                                        <?php
                                        $directory = 'public/images/transport_images/vehicles/';
                                        $images = glob($directory . $transport_package->Vehicle->id . "*");
                                        $img_path = array_shift($images);
                                        $img_name = basename($img_path);
                                        //dd($directory);
                                        ?>

                                        @if(count($img_path)>0)
                                            {{ HTML::image('images/transport_images/vehicles/'.$img_name, '', array('class' => 'transport_img'))}}
                                        @else
                                            {{ HTML::image('images/no-image.jpg', '', array('class' => 'transport_img')) }}
                                        @endif
                                    </a>
                                </div>
                                <div class="hpadding20">
                                    <span class="glyphicon glyphicon-info-sign right lblue cpointer" rel="popover"
                                          id="username" data-content="This field is mandatory"
                                          data-original-title="Here you can add additional information about the car"></span>

                                    <span class="size14 bold dark">{{ $transport_package->Vehicle->vehicle_type }}</span><br/>
								<span class="size13 grey">

									<table>
                                        <tr>
                                            <td class="dark bold" valign="top">From:&nbsp;&nbsp;&nbsp;</td>
                                            <td>
                                                {{ City::where('id', $transport_package->origin)->first()->city }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="dark bold" valign="top">To:</td>
                                            <td>
                                                {{ City::where('id', $transport_package->destination)->first()->city }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="dark bold" valign="top">On:</td>
                                            <td>Feb 6, 2014 at 06:12 for 2 person(s)</td>
                                        </tr>
                                    </table>

								</span>
                                </div>
                                <div class="purchasecontainer">
                                    <span class="size18 bold green mt5"> USD {{ $transport_package->rate }}</span><br/>
                                    <span class="size12 mt-3 grey"><i>per way</i></span>
                                    <button class="bookbtn right margtop-20">Book</button>
                                </div>
                            </div>
                            <!-- END OF CONTAINER-->
                        </div>

                    @endforeach

                    <div class="clearfix"></div>
                    <div class="offset-2">
                        <hr class="featurette-divider3">
                    </div>

                </div>
                <!-- End of offset1-->

                <div class="hpadding20 right">
                    {{ $transport_packages->links() }}
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
        {{ HTML::script('assets/js/js-list.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

    @endsection

    </body>
@stop
