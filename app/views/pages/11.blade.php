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
            width: 650px;
            height: 400px;
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

    {{Session::get('rate_box_details')}}

    <div class="navbar-wrapper2 navbar-fixed-top">
        @include('layout.navbar')
    </div>

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li><a href="http://localhost:8888" class="active">Home </a></li>
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

                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->
                <div class="line2"></div>

                <div class="line2"></div>
                <div class="clearfix"></div>
                <br/>
                <br/>
                <br/>

            </div>
            <!-- END OF FILTERS -->

            <!-- LIST CONTENT-->
            <div class="rightcontent col-md-9 offset-0">

                <div class="itemscontainer offset-1">
                    <br/><br/>

                    <div style="padding: 10%" class="container offset-2" >
                        <?php

                        if (Session::has('st_date')) {
                            $st_date = Session::get('st_date');
                        } else {
                            $st_date = date("Y/m/d");
                        }

                        // Session::flush();

                        if (Session::has('ed_date')) {
                            $ed_date = Session::get('ed_date');
                        } else {
                            $ed_date = date("Y/m/d", strtotime($st_date . ' + 2 days'));
                        }

                        // Filtering - Hotel
                        $hotel_type = DB::table('hotel_categories')->get();
                        $hotel_cities = DB::table('cities')->get();
                        $hotel_facilities = DB::table('hotel_facilities')->get();

                        // Filtering - Transport
                        $vehicle = Vehicle::lists('vehicle_type', 'id');
                        //$city = City::lists('city', 'id');

                        ?>
                        <script type="text/javascript">
                            $(function () {

                                $("#datepicker").datepicker({

                                    onClose: function() {
                                        var minValue = $(this).val();
                                        minValue = $.datepicker.parseDate("dd/mm/yy", minValue);
                                        minValue.setDate(minValue.getDate() + 1);

                                        $("#datepicker2").datepicker("option", "minDate", minValue);
                                        return $("#datepicker2").datepicker("show");
                                    }

                                });

                            });
                        </script>

                        <style type="text/css">
                            .ac_loading {
                                background: white url('images/site/indicator.gif') right center no-repeat;
                            }

                            #suggestions {
                                width: 90%;
                                height: 200px;
                                position: absolute;
                                top: 140px;
                                left: 20px;
                            }

                            #suggestions {
                                height: 200px;
                                z-index: 102;
                            }
                        </style>


                        <script type="text/javascript">
                            $(document).ready(function () {
                                document.getElementById("hotel").style.overflow = "visible";
//        document.getElementById("suggestions").style.zIndex = 2500;
                            });
                        </script>

                        <div class="bs-example bs-example-tabs cstyle04">

                            <ul class="nav nav-tabs" id="myTab">

                                <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Hotel</a>
                                </li>
                                <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#car"><span class="car"></span>Transport</a>
                                </li>

                            </ul>

                            <div class="tab-content3" id="myTabContent">

                                <!-- HOTEL TAB -->
                                <div id="hotel" class="tab-pane fade active in" style="overflow-y: visible !important;">
                                    {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}
                                    <span class="opensans size18">Where do you want to go?</span>

                                    <input type="text" class="form-control" name="txt-search" id="inputString" category=""
                                           onkeyup="lookup(this.value);" autocomplete="off"/>

                                    <div id="suggestions"></div>

                                    <br/>


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


                                    <div class="clearfix"></div>

                                    <div class="room1 margtop15">
                                        <div class="w50percent">
                                            <div class="wh90percent textleft">
                                                <span class="opensans size13"><b>ROOM 1</b></span><br/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w50percentlast">
                                        <div class="wh90percent textleft right ohidden">
                                            <div class="w50percent">
                                                <div class="wh90percent textleft left">
                                                    <span class="opensans size13"><b>Adult</b></span>
                                                    <select class="form-control mySelectBoxClass">
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
                                                    <select class="form-control mySelectBoxClass">
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
                                    <input type="hidden" name="city_or_acc_hidden" value="Beach-Hotels"/>

                                    <div class="searchbg">
                                        <button type="submit" class="btn-search">Search</button>
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                <!-- END OF HOTEL TAB -->

                                <!-- TRANSPORT TAB -->
                                <div id="car" class="tab-pane fade">
                                    {{ Form::open(array('url' => 'transport-list', 'files'=> true, 'id' => 'transport_search_form', 'method' => 'POST', )) }}

                                    <div class="">
                                        <div class="wh90percent textleft">
                                            <span class="opensans size13">Vehicle Type</span>
                                            {{ Form::select('vehicle', $vehicle, null, array('class' => 'form-control mySelectBoxClass transport_vehicle_select', 'id' => 'transport_vehicle')) }}
                                        </div>
                                    </div>
                                    <div class="clearfix pbottom15"></div>

                                    <div class="">
                                        <div class="wh90percent textleft">
                                            <span class="opensans size13">From</span>
                                            {{ Form::select('from', City::lists('city', 'id'), null, array('class' => 'form-control mySelectBoxClass transport_origin_select_1', 'id' => 'transport_origin_2')) }}
                                        </div>
                                    </div>
                                    <div class="clearfix pbottom15"></div>

                                    <div class="">
                                        <div class="wh90percent textleft">
                                            <span class="opensans size13">To</span>
                                            {{ Form::select('to', City::lists('city', 'id'), null, array('class' => 'form-control mySelectBoxClass transport_destination_select_1', 'id' => 'transport_destination_2')) }}
                                        </div>
                                    </div>
                                    <div class="clearfix pbottom15"></div>

                                    <div class="">
                                        <div class="wh90percent textleft">
                                            <span class="opensans size13">Days</span>
                                            {{ Form::selectRange('transport_days', 1, 10, null, ['class' => 'form-control mySelectBoxClass day_count', 'id' => 'transport_days']) }}
                                        </div>
                                    </div>
                                    <div class="clearfix pbottom15"></div>

                                    <button type="submit" class="btn-search3">Search</button>

                                    {{ Form::close() }}
                                </div>
                                <!-- END OF TRANSPORT TAB -->

                            </div>

                        </div>


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


        <script type="text/javascript">
            $('.star_category').click(function () {
                var star = $('input[name=star_rating]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#star_rating_form').submit()
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
