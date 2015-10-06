@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Transport List </title>

@endsection

@section('custom_style')

    <!-- Updates -->
    {{ HTML::style('updates/update1/css/style01.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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

        h1 {
            color: #006699;
            font-family: 'Rokkitt', serif !important;
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

        <div class="container mt25 offset-0">

            <!-- LEFT CONTENT -->
            <div class="col-md-8 pagecontainer2 offset-0">

                <div style="padding-top: 0px !important;" class="padding30 grey">

                    <div class="hpadding50c">
                        <h1> Create My Trip </h1>

                        <p class="aboutarrow"></p>
                    </div>

                    <div class="line3"></div>

                    <br/>
                    <br/>

                    <span class="size16px bold dark left"> Transfer information </span>

                    <div class="roundstep right">1</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="col-md-6">

                        <div class="col-md-6">
                            <div class="margtop15"><span class="dark">Vehicle Type</span><span class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('vehicle', $vehicle, null, array('class' => 'form-control mySelectBoxClass transport_vehicle_select', 'id' => 'transport_vehicle')) }}
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                        <div class="col-md-6 ">
                            <div class="margtop15"><span class="dark">Origin</span><span class="red">*</span></div>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_origin_select', 'id' => 'transport_origin')) }}
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                        <div class="col-md-6 ">
                            <div class="margtop15"><span class="dark">Pickup Date:</span><span class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mySelectCalendar mt10" id="datepicker5"
                                   placeholder="mm/dd/yyyy"/>
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                        <div class="col-md-6 ">
                            <div class="margtop7"><span class="dark">Pickup Time</span><span class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="w50percent">
                                <div class="wh90percent ">
                                    <span class="opensans size13">Hour</span>
                                    <select class="form-control mySelectBoxClass">
                                        <option>00</option>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option selected="yes">12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w50percentlast">

                                <div class="wh90percent  right">
                                    <span class="opensans size13">Minutes</span>
                                    <select class="form-control mySelectBoxClass">
                                        <option selected="yes">00</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>40</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 ">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                    </div>

                    <div class="col-md-6">

                        <div class="col-md-6 ">

                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>
                        <br/>
                        <br/>

                        <div class="col-md-6 ">
                            <div class="margtop15"><span class="dark">Destination</span><span class="red">*</span></div>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_destinatin_select', 'id' => 'transport_destination')) }}
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>


                        <div class="col-md-6 ">
                            <div class="margtop15"><span class="dark">Drop-Off Date:</span><span class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mySelectCalendar mt10" id="datepicker5"
                                   placeholder="mm/dd/yyyy"/>
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                        <div class="col-md-6 ">
                            <div class="margtop7"><span class="dark">Drop-Off Time</span><span class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="w50percent">
                                <div class="wh90percent ">
                                    <span class="opensans size13">Hour</span>
                                    <select class="form-control mySelectBoxClass">
                                        <option>00</option>
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option selected="yes">12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w50percentlast">

                                <div class="wh90percent  right">
                                    <span class="opensans size13">Minutes</span>
                                    <select class="form-control mySelectBoxClass">
                                        <option selected="yes">00</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>40</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-6 ">
                        </div>
                        <div class="clearfix"></div>

                        <br/>

                    </div>

                    <div class="col-md-4 ">
                        <div class="margtop15"><span class="dark">Complete destination address</span><span
                                    class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        <textarea rows="3" class="form-control margtop10"></textarea>
                    </div>
                    <div class="col-md-6  margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>

                    <span class="size16px bold dark left">Customer </span>

                    <div class="roundstep right">2</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>
                    Please tell us who will be checking in. Must be 18 or older. <br/><br/>

                    <div class="col-md-4 ">
                        <div class="margtop15"><span class="dark">Contact Name:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-4">
                        <span class="size12">First and Last Name*</span>
                        <input type="text" class="form-control " placeholder="">
                    </div>
                    <div class="col-md-4  margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-4 ">
                        <div class="margtop7"><span class="dark">Phone Number:</span><span class="red">*</span></div>
                    </div>

                    <div class="col-md-4 ">
                        <span class="size12">Preferred Phone Number*</span>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8 ">
                        Special Requests (optional)
                        <!-- Collapse 3 -->
                        <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                data-target="#collapse3"></button>
                        <div id="collapse3" class="collapse">
                            <textarea rows="3" class="form-control margtop10"></textarea>
                        </div>
                        <!-- End of collapse 3 -->
                        <div class="clearfix"></div>


                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>
                    <span class="size16px bold dark left">How would you like to pay?</span>

                    <div class="roundstep right">3</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>


                    <br/>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        Enter a coupon code
                        <!-- Collapse 5 -->
                        <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                data-target="#collapse5"></button>
                        <div id="collapse5" class="collapse">
                            <input type="text" class="form-control margtop10" placeholder="">
                        </div>
                        <!-- End of collapse 5 -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 ">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <!-- Nav tabs -->
                    <ul class="nav navigation-tabs">
                        <li class="active"><a href="#card" data-toggle="tab">Credit/Debit card</a></li>
                        <li><a href="#paypal" data-toggle="tab">Paypal</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content4">

                        <!-- Tab 1 -->
                        <div class="tab-pane active" id="card">

                            <div class="col-md-4 ">
                                <div class="margtop15"><span class="dark">Debit/Credit Card Number:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4 ">
                            </div>
                            <div class="clearfix"></div>

                            <br/>

                            <div class="col-md-4 ">
                                <div class="margtop7"><span class="dark">Card Type:</span><span class="red">*</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control mySelectBoxClass">
                                    <option selected>xxx-xxx-xxx-772</option>
                                    <option>xxx-xxx-xxx-039</option>
                                </select>
                            </div>
                            <div class="col-md-4 ">
                            </div>
                            <div class="clearfix"></div>

                            <br/>

                            <div class="col-md-4 ">
                                <div class="margtop7"><span class="dark">Expiration Date:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">

                                <div class="w50percent">
                                    <div class="wh90percent">
                                        <select class="form-control mySelectBoxClass">
                                            <option selected>01 JAN</option>
                                            <option>02 FEB</option>
                                            <option>03 MAR</option>
                                            <option>04 APR</option>
                                            <option>05 MAY</option>
                                            <option>06 JUN</option>
                                            <option>07 JUL</option>
                                            <option>08 AUG</option>
                                            <option>09 SEP</option>
                                            <option>10 OCT</option>
                                            <option>11 NOV</option>
                                            <option>12 DEC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w50percentlast">
                                    <div class="wh90percent right">
                                        <select class="form-control mySelectBoxClass">
                                            <option selected>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 ">
                            </div>
                            <div class="clearfix"></div>


                            <br/>

                            <div class="col-md-4 ">
                                <div class="margtop15"><span class="dark">Card Identification Number:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4  margtop15">What's this?
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-4 ">
                                <div class="margtop15"><span class="dark">Billing ZIP Code:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4  margtop15">
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-4 ">
                                <div class="margtop15"><span class="dark"> Cardholder Name:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4  margtop15">(as it appears on the card)
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <!-- End of Tab 1 -->

                        <!-- Tab 2 -->
                        <div class="tab-pane" id="paypal">

                            <div class="alert alert-warning fade in">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>Important:</strong> You will be redirected to PayPal's website to securely
                                complete your payment.
                            </div>

                            <button type="submit" class="btn-search5">Proceed to paypal</button>

                        </div>
                        <!-- End of Tab 2 -->
                    </div>


                    <br/>
                    <br/>
                    <span class="size16px bold dark left">Where should we send your confirmation?</span>

                    <div class="roundstep right">4</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>
                    Please enter the email address where you would like to receive your confirmation.<br/>


                    <div class="col-md-4 ">
                        <div class="mt15"><span class="dark">Email Address:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control margtop10" placeholder="">
                    </div>
                    <div class="col-md-4 ">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>
                    <span class="size16px bold dark left">Review and book your trip</span>

                    <div class="roundstep right">5</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="alert alert-info">
                        Attention! Please read important transfer information! <br/>

                        <p class="size12">• Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempor
                            dolor quis sapien
                            rhoncus, a mollis felis hendrerit. Nam dapibus vitae justo in faucibus.</p>
                    </div>
                    By selecting to complete this booking I acknowledge that I have read and accept the <a href="#"
                                                                                                           class="clblue">rules
                        &
                        restrictions</a> <a href="#" class="clblue">terms & conditions</a> , and <a href="#"
                                                                                                    class="clblue">privacy
                        policy</a>. <br/>

                    <button type="submit" class="bluebtn margtop20">Complete booking</button>


                </div>

            </div>
            <!-- END OF LEFT CONTENT -->

            <!-- RIGHT CONTENT -->
            <div class="col-md-4">

                <div class="pagecontainer2 paymentbox grey">
                    <div class="padding20">
                        <span class="opensans size18 dark bold caps"><h3>Your Transfer</h3></span>
                    </div>
                    <div class="line3"></div>

                    <div class="hpadding30 margtop30">

                        <!-- GOING TO -->
                        <div>
                            <div class="col-md-8" style="width:293px; height: 400px;" id="dvMap"></div>

                        </div>
                        <!-- END OF GOING TO -->

                        <br/>

                        <img src="updates/update1/img/cars/car02.jpg" width="100" alt=""/><br/>

                        <span class="dark">Private Service</span>

                        <div class="fdash mt10"></div>
                        <br/>
                        Barcelona Airport (BCN) to Barcelona Hotels<br/>
                        <span class="grey2">On:</span> February 06 2014<br/>
                        <span class="grey2">Number of persons:</span> 2


                        <br/>
                        <br/>


                    </div>
                    <div class="line3"></div>
                    <div class="padding30">
                        <span class="left size14 dark">Trip Total:</span>
						<span class="right lred2 bold size18">
							$54.50<br/>
							<span class="grey normal size12 mt-10"><i>per way</i></span>
						</span>

                        <div class="clearfix"></div>
                    </div>


                </div>
                <br/>

                <div class="pagecontainer2 needassistancebox">
                    <div class="cpadding1">
                        <span class="icon-help"></span>

                        <h3 class="opensans">Need Assistance?</h3>

                        <p class="size14 grey">Our team is 24/7 at your service to help you with your booking issues or
                            answer any related questions</p>

                        <p class="opensans size30 lblue xslim">1-866-599-6674</p>
                    </div>
                </div>
                <br/>

                <div class="pagecontainer2 loginbox">
                    <div class="cpadding1">
                        <span class="icon-lockk"></span>

                        <h3 class="opensans">Log in</h3>
                        <input type="text" class="form-control logpadding" placeholder="Username">
                        <br/>
                        <input type="text" class="form-control logpadding" placeholder="Password">

                        <div class="margtop20">
                            <div class="left">
                                <div class="checkbox padding0">
                                    <label>
                                        <input type="checkbox">Remember
                                    </label>
                                </div>
                                <a href="#" class="greylink">Lost password?</a><br/>
                            </div>
                            <div class="right">
                                <button class="btn-search5" type="submit" onclick="errorMessage()">Login</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                    </div>
                </div>
                <br/>

            </div>
            <!-- END OF RIGHT CONTENT -->


        </div>


    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-payment.js') }}

        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}


        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                var markers = [{
                    "title": '1',
                    "lat": '6.9344',
                    "lng": '79.8428',
                    "description": '1'
                }, {
                    "title": '2',
                    "lat": '7.1500',
                    "lng": '80.1',
                    "description": '2'
                }, {
                    "title": '2',
                    "lat": '7.2964',
                    "lng": '80.6350',
                    "description": '2'
                }

                ];

                loadMap(markers);

                $('#from').change(function () {
                    var from = $(this).val();

                    var start = from.split(',');

                    markers[0] = {
                        "title": '1',
                        "lat": start[0],
                        "lng": start[1],
                        "description": '1'
                    };
                    //console.log(markers);
                    loadMap();
                });

                $('#to').change(function () {
                    var to = $(this).val();

                    var destination = to.split(',');
                    markers[1] = {
                        "title": '2',
                        "lat": destination[0],
                        "lng": destination[1],
                        "description": '2'
                    };
                    //markers.push(mark);
                    loadMap();
                });

                $('.destination').change(function () {
                    var destination_id = $(this).attr('id');
                    var destination = to.split(',');
                    markers[destination_id] = {
                        "title": '2',
                        "lat": destination[0],
                        "lng": destination[1],
                        "description": '2'
                    };
                    //markers.push(mark);
                    loadMap();
                });


            });

            function loadMap(markers) {

                var mapOptions = {
                    center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                    zoom: 5,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                var infoWindow = new google.maps.InfoWindow();
                var lat_lng = new Array();
                var latlngbounds = new google.maps.LatLngBounds();
                for (i = 0; i < markers.length; i++) {
                    var data = markers[i]
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    lat_lng.push(myLatlng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: data.title
                    });
                    latlngbounds.extend(marker.position);
                    (function (marker, data) {
                        google.maps.event.addListener(marker, "click", function (e) {
                            infoWindow.setContent(data.description);
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
                map.setCenter(latlngbounds.getCenter());
                map.fitBounds(latlngbounds);

                //***********ROUTING****************//

                //Intialize the Path Array
                var path = new google.maps.MVCArray();

                //Intialize the Direction Service
                var service = new google.maps.DirectionsService();

                //Set the Path Stroke Color
                var poly = new google.maps.Polyline({
                    map: map,
                    strokeColor: '#4986E7'
                });

                var allDis = 0;
                //Loop and Draw Path Route between the Points on MAP
                for (var i = 0; i < lat_lng.length; i++) {
                    if ((i + 1) < lat_lng.length) {
                        var src = lat_lng[i];
                        var des = lat_lng[i + 1];

//            alert('asdas');

                        // path.push(src);
                        poly.setPath(path);
                        service.route({
                            origin: src,
                            destination: des,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                        }, function (result, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                    path.push(result.routes[0].overview_path[i]);
                                }
                            }
                        });


                        //distance

                        (getDistance(src, des));


                    }

                }
//    alert(totalDistance);


            }

            function getDistance(src, des) {
                var distance = 0;

                var distanceService = new google.maps.DistanceMatrixService();

                distanceService.getDistanceMatrix({
                    origins: [src],
                    destinations: [des],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false
                }, function (response, status) {
                    if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                        console.log(response);


                        distance = response.rows[0].elements[0].distance.value;
                        //                                var duration = response.rows[0].elements[0].duration.text;
                        //                                var dvDistance = document.getElementById("dvDistance");
                        //totalDistance = totalDistance + distance;
//            alert(distance);


                    } else {

                        return false
                    }

                 //   alert(distance);

                });


            }

        </script>

    @endsection

    </body>
@stop
