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

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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
                    <li><a href="{{URL::route('index')}}" class="active">Home </a></li>
                    <li>/</li>
                    <li><a href="{{ URL::to('create-my-trip') }}"
                           class="active"> Create My Trip </a></li>
                    <li>/</li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="container mt25 offset-0">

            <!-- LEFT CONTENT -->
            <div class="col-md-8 pagecontainer2 offset-0">

                <div style="padding-top: 0px !important;" class="padding30 grey">

                    <div style="padding-left: 0px !important;" class="hpadding50c">
                        <h1>Create My Trip </h1>

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
                        <div class="col-md-6 vehicle">
                            {{ Form::select('vehicle', $vehicle, null, array('class' => 'form-control mySelectBoxClass transport_vehicle_select', 'id' => 'transport_vehicle')) }}
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
                            <input type="text" class="form-control mySelectCalendar mt10 pick_up" id="datepicker5"
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
                                    <select class="form-control mySelectBoxClass pick_up_hour">
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

                                <div class="wh90percent right">
                                    <span class="opensans size13">Minutes</span>
                                    <select class="form-control mySelectBoxClass pick_up_minutes">
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

                        <div class="col-md-6 ">
                            <div class="margtop15"><span class="dark">Origin</span><span class="red">*</span></div>
                        </div>
                        <div class="col-md-6">
                            {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_origin_select', 'id' => 'transport_origin')) }}
                        </div>
                        <div class="col-md-6  margtop15" id="ssaa">
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
                            <div class="margtop15"><span class="dark">Drop-Off Date:</span><span
                                        class="red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control mySelectCalendar mt10 drop_off" id="datepicker6"
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
                                    <select class="form-control mySelectBoxClass drop_off_hour">
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
                                    <select class="form-control mySelectBoxClass drop_off_minutes">
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

                        <div class="room1">
                            <div class="col-md-6">
                                <div class="wh90percent textleft">
                                    <div class="margtop7"><span class="dark">Destination</span><span
                                                class="red">*</span></div>

                                    <div class="addroom1 block"><a onclick="addroom2()" class="grey cpointer">+
                                            Add Destination</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="wh90percent textleft right ohidden">
                                    {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_destination_select_1', 'id' => 'transport_destination_1')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <div class="room2 none">
                            <div class="clearfix"></div>
                            <div class="line1"></div>
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>Destination 2</b></span><br/>

                                    <div class="addroom2 block grey"><a onclick="addroom3()" class="grey cpointer">+
                                            Add Destination</a> | <a onclick="removeroom2()"
                                                                     class="orange cpointer"><img
                                                    src="images/delete.png" alt="delete"/></a>
                                    </div>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <div class="">
                                        <div class="wh90percent textleft left">
                                            {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_destination_select_2', 'id' => 'transport_destination_2')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>

                        <div class="room3 none">
                            <div class="clearfix"></div>
                            <div class="line1"></div>
                            <div class="w50percent">
                                <div class="wh90percent textleft">
                                    <span class="opensans size13"><b>Destination 3</b></span><br/>

                                    <div class="addroom3 block grey"><a onclick="addroom3()" class="grey cpointer">+
                                            Add Destination</a> | <a onclick="removeroom3()"
                                                                     class="orange cpointer"><img
                                                    src="images/delete.png" alt="delete"/></a></div>
                                </div>
                            </div>

                            <div class="w50percentlast">
                                <div class="wh90percent textleft right">
                                    <div class="">
                                        <div class="wh90percent textleft left">
                                            {{ Form::select('city', $city, null, array('class' => 'form-control mySelectBoxClass transport_destination_select_3', 'id' => 'transport_destination_3')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  margtop15">
                        </div>
                        <div class="clearfix"></div>
                        <br/>

                    </div>

                    <div align="right">
                        <button id="transport_cart_box" style="text-align: right" type="submit"
                                class="bluebtn margtop20 transport_get_cart_box">Complete booking
                        </button>
                    </div>

                </div>

            </div>
            <!-- END OF LEFT CONTENT -->

            <!-- RIGHT CONTENT -->
            <div class="col-md-4" id="transport_rate_box">

                <div class="pagecontainer2 paymentbox grey">
                    <div class="padding20">
                        <span class="opensans size18 dark bold caps"> Transport Summery </span>
                    </div>
                    <div class="line3"></div>

                    <div class="hpadding30 margtop30">

                        <img src="updates/update1/img/cars/car02.jpg" width="100" alt=""/><br/>

                        <table class="table table-bordered margbottom20">
                            <tbody id="transport_cart_box_table">

                            </tbody>
                        </table>
                        <br/>
                    </div>

                    <div class="line3"></div>
                    <div class="padding30">
                            <span class="left size14 dark"> <h3 style="font-size: 18px; display: inline"> Total Cost
                                    : </h3></span>
                        <span id="trip_total_cost" class="right green bold size18"> </span>

                        <div class="clearfix"></div>
                    </div>

                    <div class="line3"></div>
                    <br/>
                    &nbsp;&nbsp;&nbsp;
                    <a id="add_to_cart" name="aa" href="{{URL::to('/booking-cart')}}" class="bluebtn margtop20">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                        Add To Cart
                    </a>

                    &nbsp;&nbsp;
                    <a href="" class="bluebtn margtop20">
                        <span class="glyphicon glyphicon-play"></span>
                        Checkout
                    </a>

                    <div class="clearfix"></div>
                    <br/>
                </div>
            </div>
            <!-- END OF RIGHT CONTENT -->
{{--<div id="ttt"></div>--}}
            <input id="hidden_total_distance" type="hidden" name="hidden_total_distance">

        </div>
        <br/>

        <div class="container mt25 offset-0" id="show_map_create_my_trip">
            <div class="col-md-8 pagecontainer2 offset-0">
                <!-- GOING TO -->
                <div class="col-md-8" style="width:100%; height: 400px;" id="dvMap"></div>
                <!-- END OF GOING TO -->
            </div>
        </div>

    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        {{--        {{ HTML::script('assets/js/js-details.js') }}--}}

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-payment.js') }}

        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

        {{ HTML::script('js/transport_cart.js') }}


        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#show_map_create_my_trip').hide("blind", 500);
                var url = 'http://' + window.location.host + '/sri-lanka/get_transport_box';
                sendTransportData(url);
            });
        </script>

        <script type="text/javascript">
            $(function () {

                $('.transport_get_cart_box').click(function () {

                    var vehicle_type = $('.vehicle :selected').text();
                    var origin = $('.transport_origin_select :selected').text();
                    var destination_1 = $('.transport_destination_select_1 :selected').text();
                    var destination_2 = $('.transport_destination_select_2 :selected').text();
                    var destination_3 = $('.transport_destination_select_3 :selected').text();
                    var pick_up_date = $('.pick_up').datepicker({dateFormat: 'yyyy-mm-dd'}).val();
                    var pick_up_time_hour = $('.pick_up_hour :selected').text();
                    var pick_up_time_minutes = $('.pick_up_minutes :selected').text();
                    var drop_off_date = $('.drop_off').datepicker({dateFormat: 'yyyy-mm-dd'}).val();
                    var drop_off_time_hour = $('.drop_off_hour :selected').text();
                    var drop_off_time_minutes = $('.drop_off_minutes :selected').text();
                    var totalDistance = $('#hidden_total_distance').val();


                    if ((pick_up_date != '') && (drop_off_date != '')) {

                        $('#transport_rate_box').show("blind", 500);

                        var url = 'http://' + window.location.host + '/sri-lanka/get_transport_box';

                        var formData = new FormData();

                        formData.append('vehicle_type', vehicle_type);
                        formData.append('origin', origin);
                        formData.append('destination_1', destination_1);
                        formData.append('destination_2', destination_2);
                        formData.append('destination_3', destination_3);
                        formData.append('pick_up_date', pick_up_date);
                        formData.append('pick_up_time_hour', pick_up_time_hour);
                        formData.append('pick_up_time_minutes', pick_up_time_minutes);
                        formData.append('drop_off_date', drop_off_date);
                        formData.append('drop_off_time_hour', drop_off_time_hour);
                        formData.append('drop_off_time_minutes', drop_off_time_minutes);
                        formData.append('totalDistance', totalDistance);

                        sendTransportData(url, formData);

                    } else {
                        alert('please select dates');
                    }

                });
            });
        </script>

        <script type="text/javascript">
            $(function () {
                $('#transport_origin').change(function () {

                    var origin = $('.transport_origin_select :selected').val();

                    var url = 'http://' + window.location.host + '/sri-lanka/create_transport_map';

                    var formData = new FormData();

                    formData.append('origin', origin);

                    sendMapData(url, formData);
                });

                $('#transport_destination_1').change(function () {

                    $('#show_map_create_my_trip').show("blind", 500);

                    var origin = $('.transport_origin_select :selected').val();
                    var destination_1 = $('.transport_destination_select_1 :selected').val();

                    var url = 'http://' + window.location.host + '/sri-lanka/create_transport_map';

                    var formData = new FormData();

                    formData.append('origin', origin);
                    formData.append('destination_1', destination_1);

                    sendMapData(url, formData);

                });

                $('#transport_destination_2').change(function () {

                    var origin = $('.transport_origin_select :selected').val();
                    var destination_1 = $('.transport_destination_select_1 :selected').val();
                    var destination_2 = $('.transport_destination_select_2 :selected').val();

                    var url = 'http://' + window.location.host + '/sri-lanka/create_transport_map';

                    var formData = new FormData();

                    formData.append('origin', origin);
                    formData.append('destination_1', destination_1);
                    formData.append('destination_2', destination_2);

                    sendMapData(url, formData);

                });

                $('#transport_destination_3').change(function () {

                    var origin = $('.transport_origin_select :selected').val();
                    var destination_1 = $('.transport_destination_select_1 :selected').val();
                    var destination_2 = $('.transport_destination_select_2 :selected').val();
                    var destination_3 = $('.transport_destination_select_3 :selected').val();

                    var url = 'http://' + window.location.host + '/sri-lanka/create_transport_map';

                    var formData = new FormData();

                    formData.append('origin', origin);
                    formData.append('destination_1', destination_1);
                    formData.append('destination_2', destination_2);
                    formData.append('destination_3', destination_3);

                    sendMapData(url, formData);

                });
            });
        </script>

    @endsection

    </body>
@stop
