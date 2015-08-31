@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Tour List </title>

@endsection

@section('custom_style')

    <style type="text/css">
        .grey:hover {
            color: #000000;
        }

        .collapsebtn {
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }

    </style>

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

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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

            <!-- FILTERS -->
            <div class="col-md-3 filters offset-0">

                <!-- TOP TIP -->
                <div class="filtertip">
                    <div class="padding20">
                        <p class="size13"><b
                                    class="size30 bold"> {{ TourType::where('tour_id', '=', $tour_id)->count();}} </b>
                            Results Found

                        <p class="size30 bold"><span class="size13 normal darkblue">In</span>
                            {{ str_replace('-', ' ', Request::segment(3)) }}
                        </p>

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

                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>

                <div class="line2"></div>

                {{ Form::open(array('url' => 'sri-lanka/tour/filter', 'method' => 'POST', 'id'=>'tour_form')) }}

                <!-- Star ratings -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Tour Packages <span class="collapsearrow"></span>
                </button>

                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <?php $x = 1; ?>
                        @foreach($filter_tours as $tour)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tour" id="tour{{ $x }}"
                                           value="{{ $tour->id }}" class="tour_select">
                                    {{ $tour->tour_title }}
                                </label>
                            </div>
                            <?php $x++ ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Star ratings -->
                {{ Form::close() }}

                <div class="line2"></div>

                {{ Form::open(array('url' => 'sri-lanka/tour/filter', 'method' => 'POST', 'id'=>'tour_city_form')) }}
                <!-- Activities type -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    City <span class="collapsearrow"></span>
                </button>
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        @foreach($filter_cities as $city)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tour_city" id="tour_city{{ $x }}"
                                           value="{{ $city->id }}" class="tour_city_select">
                                    {{ $city->city }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Activities type  -->

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

                    <h1 style="color: #006699; font-family: 'Cinzel', serif; "> {{ str_replace('-', ' ', Request::segment(3)) }} </h1>

                    <div class="line4"></div>

                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">

                    @foreach($tours as $types)

                        <?php
                        $directory = 'images/tour_images/';
                        $images = glob($directory . $types->id . "*.*");
                        $img_path = array_shift($images);
                        ?>

                        <div class="offset-2">
                            <div class="col-md-4 offset-0">
                                <div class="listitem2">

                                    <a href="<?php echo 'http://localhost/travel/public/' . $img_path; ?>"
                                       data-title="{{ $types->tour_type_title }}" data-gallery="multiimages"
                                       data-toggle="lightbox">

                                        @if(count($img_path)>0)
                                            {{ HTML::image($img_path, '', array('class' => 'hotel_img_1'))}}
                                        @else
                                            {{ HTML::image('images/no-image.jpg', '', array('class' => 'property_img_1')) }}
                                        @endif

                                    </a>

                                    <div class="liover"></div>
                                    <a class="fav-icon" href="#"></a>

                                    <a class="book-icon"
                                       href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->Tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}"></a>

                                </div>
                            </div>

                            <div class="col-md-8 offset-0">
                                <div class="itemlabel4">
                                    <div class="labelright">

                                        {{--@if(!empty($types->rate))--}}
                                        {{--<br/><span class="green size18"><b>{{ $types->rate }}</b></span><br/>--}}
                                        {{--<span class="size11 grey">/person</span><br/><br/><br/>--}}
                                        {{--@else--}}
                                        {{--<span class="green size18"><b> No Rate Available </b></span><br/>--}}
                                        {{--@endif--}}

                                        {{--<span class="size11 grey"></span><br/><br/><br/>--}}

                                        <a class="bookbtn mt1"
                                           href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->Tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}">
                                            Book
                                        </a>

                                    </div>
                                    <div class="labelleft2">

                                        <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}">
                                            <span class="size16">
                                                <h4 style="color: #006699; font-family: 'Play', sans-serif;">{{ $types->tour_type_title }}</h4>
                                            </span>
                                        </a>

                                        <div class="line4"></div>

                                        <p class="grey size14 lh6">
                                            {{ $types->short_description }}.
                                        </p><br/>

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
                    {{ $tours->links() }}
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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

    @endsection

    </body>
@stop
