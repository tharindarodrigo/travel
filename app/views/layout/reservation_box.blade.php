<?php

// Filtering - Hotel
$hotel_type = DB::table('hotel_categories')->get();
$hotel_cities = DB::table('cities')->get();
$hotel_facilities = DB::table('hotel_facilities')->get();

// Filtering - Transport
$vehicle = Vehicle::lists('vehicle_type', 'id');
//$city = City::lists('city', 'id');

?>


<div class="bs-example bs-example-tabs cstyle04">

    <ul class="nav nav-tabs" id="myTab">

        <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel"><span class="hotel"></span>Hotel</a>
        </li>
        <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#car"><span class="car"></span>Transport</a>
        </li>

    </ul>

    <div class="tab-content3" id="myTabContent">

        <!-- HOTEL TAB -->
        <div id="hotel" class="tab-pane fade active in">
            {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}
            <span class="opensans size18">Where do you want to go?</span>
            <input type="text" class="form-control" name="txt-search" id="inputString" category=""
                   onkeyup="lookup(this.value);" autocomplete="off"/>

            <div id="suggestions"></div>

            <br/>

            <div class="w50percent">
                <div class="wh90percent textleft">
                    <span class="opensans size13"><b>Check in date</b></span>
                    <input type="text" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13"><b>Check in date</b></span>
                    <input type="text" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
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
                            <span class="opensans size13"><b>Child</b></span>
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
