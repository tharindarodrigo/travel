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

        .collapsebtn {
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }

        .no_result{
            width: auto;
            height: auto;
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
        {{--<div class="brlines"></div>--}}
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

                <!-- Star ratings -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Star rating <span class="collapsearrow"></span>
                </button>

                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">
                                {{ HTML::image('images/filter-rating-5.png', '', array('class' => 'imgpos1'))}}
                                5 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox">
                            <label>
                                {{ HTML::image('images/filter-rating-4.png', '', array('class' => 'imgpos1'))}}
                                4 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox">
                            <label>
                                {{ HTML::image('images/filter-rating-3.png', '', array('class' => 'imgpos1'))}}
                                3 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox">
                            <label>
                                {{ HTML::image('images/filter-rating-2.png', '', array('class' => 'imgpos1'))}}
                                2 Stars
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox">
                            <label>
                                {{ HTML::image('images/filter-rating-1.png', '', array('class' => 'imgpos1'))}}
                                1 Star
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

                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <?php $x = 1; ?>
                        @foreach($hotel_type as $accommodation)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios2" id="Acomodation{{ $x }}"
                                           value="option{{ $x }}">
                                    {{ $accommodation->hotel_category }}
                                </label>
                            </div>
                            <?php $x++ ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Acomodations -->

                <div class="line2"></div>

                <!-- Hotel Preferences -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    Hotel Facilities <span class="collapsearrow"></span>
                </button>
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        @foreach($hotel_facilities as $facility)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    {{ $facility->hotel_facility }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Hotel Preferences -->
                <div class="line2"></div>

                <!-- Cities -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse5">
                    Hotel Preferences <span class="collapsearrow"></span>
                </button>
                <div id="collapse5" class="collapse in">
                    <div class="hpadding20">
                        @foreach($hotel_cities as $city)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    {{ $city->city }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Cities -->

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

                <div class="itemscontainer offset-1">
                    <br/><br/>

                    <div style="padding: 10%" class="container offset-2" >
                        {{ HTML::image('images/no-result-found.jpg', '', array('class' => 'no_result'))}}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of offset1-->


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
