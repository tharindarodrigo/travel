<?php

// Filtering - Hotel
$hotel_type = DB::table('hotel_categories')->get();
$hotel_cities = DB::table('cities')->get();
$hotel_facilities = DB::table('hotel_facilities')->get();

// Filtering - Transport
$vehicle = Vehicle::lists('vehicle_type', 'id');
//$city = City::lists('city', 'id');

?>

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
                    <span class="opensans size13"><b>Check in date</b></span>
                    <input type="text" name="check_in_date" class="form-control mySelectCalendar"
                           id="datepicker"
                           value="{{ Session::has('st_date') ? Session::get('st_date') : $st_date }}"/>
                </div>
            </div>

            <div class="w50percentlast">
                <div class="wh90percent textleft right">
                    <span class="opensans size13"><b>Check in date</b></span>
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

<script type="text/javascript">
    function lookup(inputString) {
        if (inputString.length == 0) {
            $('#suggestions').fadeOut(); // Hide the suggestions box
        } else {
            //$( "#suggestions" ).autocomplete({ delay: 0 });
            $.post("http://" + window.location.host + "/auto-complete", {queryString: "" + inputString + ""}, function (data) { // Do an AJAX call
                $('#suggestions').fadeIn(); // Show the suggestions box
                $('#suggestions').html(data); // Fill the suggestions box

                $('a').click(function () {
                    $value = $(this).attr('value');
                    $category = $(this).attr('category');
                    $('#inputString').val($value);
                    $('#inputString').attr('category', $category);
                    $('#suggestions').fadeOut();
                });
            });
        }
    }
</script>