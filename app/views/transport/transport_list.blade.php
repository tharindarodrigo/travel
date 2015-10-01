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
                        <p class="size13"><b>20</b> vehicles found</p>

                        <p class="size30 bold"><span class="size13 normal darkblue">Starting</span> $<span
                                    class="countprice"></span>.78 <span class="size13 normal darkblue">/day</span></p>

                    </div>
                    <div class="tip-arrow"></div>
                </div>


                <div class="bookfilters hpadding20">


                    <div class="size30 dark">Rent a car</div>
                    <!-- CARS TAB -->
                    <div class="">

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
                        <br/>
                        <button type="submit" class="btn-search3">Search</button>
                    </div>
                    <!-- END OF CARS TAB -->


                </div>
                <!-- END OF BOOK FILTERS -->

                <div class="line2"></div>

                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
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

                <!-- Car type -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse3">
                    Car type <span class="collapsearrow"></span>
                </button>
                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Economy
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Compact
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Midsize
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Standard
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Fullsize
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Premium
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Luxury
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Convertible
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Minivan
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Sport Utility Vehicles
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Sport cars
                            </label>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Car type -->

                <div class="line2"></div>

                <!-- Special equipment -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    Special Equipment <span class="collapsearrow"></span>
                </button>
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Infant seat
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Toddler seat
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Navigation system
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Ski rack
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Snow chains
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Left hand control
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Right hand control
                            </label>
                        </div>


                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of special equipment -->

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
                            <div class="right">
                                <button class="gridbtn active">&nbsp;</button>
                                <button class="listbtn active">&nbsp;</button>
                                <button class="grid2btn active">&nbsp;</button>
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
                    <div class="col-md-4 border">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car01.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="glyphicon glyphicon-info-sign right lblue cpointer" rel="popover"
                                      id="username" data-content="This field is mandatory"
                                      data-original-title="Here you can add additional information about the car"></span>

                                <span class="size14 bold dark">VW Mini Buss</span><br/>
                                <span class="size13 bold grey mt-5">Economy</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Manual<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$54.74</span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car02.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">VW Passat cc</span><br/>
                                <span class="size13 bold grey mt-5">Premium</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$75.00</span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car03.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">BMW M7</span><br/>
                                <span class="size13 bold grey mt-5">Luxury</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$95.74</span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>

                    <div class="clearfix"></div>
                    <br/>

                    <div class="col-md-4 border">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car04.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">Mazda 3</span><br/>
                                <span class="size13 bold grey mt-5">Economy</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Manual<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$80.00</span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car05.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">Mercedes C220</span><br/>
                                <span class="size13 bold grey mt-5">Luxury</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$100.00</span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car06.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">BMW X5</span><br/>
                                <span class="size13 bold grey mt-5">Premium SUV</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Tiptronic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$120.00 </span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>

                    <div class="clearfix"></div>
                    <br/>

                    <div class="col-md-4 border">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car07.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">Lamborgini LP700 Aventador</span><br/>
                                <span class="size13 bold grey mt-5">Sport car</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$2500.00 </span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car08.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">Porsche 911</span><br/>
                                <span class="size13 bold grey mt-5">Sport car convertible</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$500.00 </span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>
                    <div class="col-md-4">
                        <!-- CONTAINER-->
                        <div class="carscontainer">
                            <div class="center">
                                <a href=""><img src="updates/update1/img/cars/car09.jpg" alt=""/></a>
                            </div>
                            <div class="hpadding20">
                                <span class="size14 bold dark">Ferrari</span><br/>
                                <span class="size13 bold grey mt-5">Sport car</span><br/>
								<span class="size13 grey">
									<span class="icn-air"></span>On airport<br/>
									<span class="icn-gas"></span>Full to full<br/>
									<span class="icn-gear"></span>Automatic<br/>
								</span>
                            </div>
                            <div class="purchasecontainer">
                                <span class="size18 bold green mt5">$1500.00 </span><br/>
                                <span class="size12 mt-3 grey"><i>per day</i></span>
                                <button class="bookbtn right margtop-20">Book</button>
                            </div>
                        </div>
                        <!-- END OF CONTAINER-->
                    </div>


                    <div class="clearfix"></div>
                    <div class="offset-2">
                        <hr class="featurette-divider3">
                    </div>


                </div>
                <!-- End of offset1-->

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
        {{ HTML::script('assets/js/js-list.js') }}
        
        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

    @endsection

    </body>
@stop
