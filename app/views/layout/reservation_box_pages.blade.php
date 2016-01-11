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
$vehicle = array('0' => 'Select') + Vehicle::lists('vehicle_type', 'id');
$package = TransportCategory::lists('transport_category', 'id');
$city1 = City::lists('city', 'id');

?>

<script type="text/javascript">
    $(function () {

        $("#datepicker").datepicker({

            onClose: function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy/mm/dd", minValue);
                minValue.setDate(minValue.getDate() + 1);

                $("#datepicker2").datepicker("option", "minDate", minValue);
                return $("#datepicker2").datepicker("show");
            }

        });

    });
</script>

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
    <div class="hotelstab2 none">
        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'searchform', 'method' => 'POST', )) }}
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

        {{Form::close()}}
    </div>
    <!-- END OF HOTELS TAB -->

    <!-- TRANSPORT TAB -->
    <div class="carstab2 none">
        {{ Form::open(array('url' => 'sri-lanka/transport-search', 'files'=> true, 'id' => 'transport_search_form', 'method' => 'POST', )) }}

        <div class="">
            <div class="wh90percent textleft">
                <span class="opensans size13">Package</span>
                {{ Form::select('package', $package, null, array('class' => 'form-control mySelectBoxClass transport_package_select', 'id' => 'transport_package')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="">
            <div class="wh90percent textleft">
                <span class="opensans size13">Vehicle Type</span>
                {{ Form::select('vehicle', $vehicle, null, array('class' => 'form-control mySelectBoxClass transport_vehicle_select', 'id' => 'transport_vehicle')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="vehicle_type_show">
            <div class="wh90percent textleft">
                <span class="opensans size13"> Vehicle </span>
                <select class="form-control mySelectBoxClass" id="vehicle_select" data-shadow="true"
                        name="vehicle_type" data-mini="true">
                </select>
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="predefined_method_show">
            <div class="wh90percent textleft">
                <span class="opensans size13"> Cities/Days </span>
                {{ Form::select('number', ['Select','City', 'Days'], null, array('class' => 'form-control mySelectBoxClass predefined_method_select', 'id' => 'predefined_method')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="transport_origin_show">
            <div class="wh90percent textleft">
                <span class="opensans size13">From</span>
                {{ Form::select('from', $city1, null, array('class' => 'form-control mySelectBoxClass transport_origin_select', 'id' => 'transport_origin')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="transport_destination_show">
            <div class="wh90percent textleft">
                <span class="opensans size13">To</span>
                {{ Form::select('to', $city1, null, array('class' => 'form-control mySelectBoxClass transport_destination_select', 'id' => 'transport_destination')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="transport_hours_show">
            <div class="wh90percent textleft">
                <span class="opensans size13"> Hours </span>
                {{ Form::select('hours', [4, 8], null, array('class' => 'form-control mySelectBoxClass transport_hours_select', 'id' => 'transport_hours')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <div class="transport_days_show">
            <div class="wh90percent textleft">
                <span class="opensans size13"> Days </span>
                {{ Form::select('days', [1, 2, 3], null, array('class' => 'form-control mySelectBoxClass transport_days_select', 'id' => 'transport_days')) }}
            </div>
            <div class="clearfix pbottom15"></div>
        </div>

        <button type="submit" class="btn-search3">Search</button>

        {{Form::close()}}
    </div>
    <!-- END OF TRANSPORT TAB -->

</div>
