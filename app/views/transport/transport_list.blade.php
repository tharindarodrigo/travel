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

    {{--my styles--}}
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <style type="text/css">
        .collapsebtn {
            background: #3498db;
            color: #FFFFFF;
        }

        h1 {
            color: #3498db;
            font-family: 'Rokkitt', serif !important;
        }

        h4 {
            color: #3498db;
        }

        .transport_img {
            width: 207px;
            height: 156px;
        }

        .collapsebtn{
            height: 50px !important;
        }

        .filters label{
            font-size: 12px;
        }
    </style>
@endsection

@section('content')

    <body id="top" class="thebg">

    <!-- navbar -->
    @include('layout.navbar')
    <!-- / navbar -->

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li><a href="{{URL::route('index')}}" class="active">Home </a></li>
                    <li>/</li>
                    <li><a href="{{ URL::to('transport-list') }}"
                           class="active">{{ str_replace('-', ' ', Request::segment(1)) }} </a></li>
                    <li>/</li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
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
                            Package starting at
                        </p>

                        <p class="size30 bold">$<span class=""> {{ $min_trans_rate }} </span></p>

                        <p class="size13">In Transport Package </p>
                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <div class="bookfilters hpadding20">

                    <div class="w50percentlast">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios11" value="option4" checked>
                                <span class="car-ico"></span> Transport
                            </label>
                        </div>
                    </div>

                    <div class="w50percent">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios44" value="option1">
                                <span class="hotel-ico"></span> Hotels
                            </label>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <!-- TRANSPORT TAB -->
                    <div class="hotelstab2 none">
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
                                {{ Form::select('from', $city, null, array('class' => 'form-control mySelectBoxClass transport_destination_select_1', 'id' => 'transport_origin_1')) }}
                            </div>
                        </div>
                        <div class="clearfix pbottom15"></div>

                        <div class="">
                            <div class="wh90percent textleft">
                                <span class="opensans size13">To</span>
                                {{ Form::select('to', $city, null, array('class' => 'form-control mySelectBoxClass transport_destination_select_1', 'id' => 'transport_destination_1')) }}
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

                        {{Form::close()}}
                    </div>
                    <!-- END OF TRANSPORT TAB -->

                    <!-- HOTELS TAB -->
                    <div class="carstab2 none">
                        {{ Form::open(array('url' => 'sri-lanka/search', 'files'=> true, 'id' => 'hotel_search_form', 'method' => 'POST', )) }}

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

                </div>
                <!-- END OF BOOK FILTERS -->

                <!-- Price range -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
                    Price range <span class="collapsearrow"></span>
                </button>

                {{ Form::open(array('url' => '/transport-list', 'method' => 'POST', 'id'=>'price_range_form_transport')) }}

                <div id="collapse2" class="collapse in">
                    <div class="padding20">
                        <div class="layout-slider wh100percent">

                            <span class="cstyle09">
                                <input id="Slider1" class="price_range_select" type="slider"
                                       name="price_range_transport"
                                       value="{{ $min_trans_rate }}; {{ $max_trans_rate }} "/>
                            </span>
                            <br/><br/>
                            <button type="submit" class="btn-search4">Update</button>
                            <br/>
                        </div>

                        <!-- bin/jquery.slider.min.js -->
                        {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
                        {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
                        <!-- end -->

                        {{ Form::hidden('min_trans_rate', (Session::get('currency_rate') * $min_trans_rate), array('id' => 'min_trans_rate')) }}
                        {{ Form::hidden('max_trans_rate', (Session::get('currency_rate') * $max_trans_rate), array('id' => 'max_trans_rate')) }}

                        <script type="text/javascript">
                            var min = parseInt($('#min_trans_rate').val());
                            var max = parseInt($('#max_trans_rate').val());
                            jQuery("#Slider1").slider({
                                from: min,
                                to: max,
                                step: 5,
                                smooth: true,
                                round: 0,
                                dimension: "&nbsp;",
                                skin: "round"
                            });
                        </script>
                    </div>
                </div>

                <!-- End of Price range -->

                {{ Form::close() }}

                <!-- Transport Type -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
                    Transport <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/transport-list', 'method' => 'POST', 'id'=>'accommodation_form')) }}
                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <div class="radio">
                            <label>
                                <input type="radio" name="transport_type" id="predefine_transport"
                                       value="1"
                                       class="transport_type_select" {{ true ? 'checked':'' }}>
                                Predefined Packages
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="transport_type" id="create_my_trip"
                                       value="2"
                                       class="transport_type_select" {{ true ? '':'checked' }}>
                                Create My Trip
                            </label>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Transport Type -->
                {{ Form::close() }}

                <!-- Vehicles -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Vehicles <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/transport-list', 'method' => 'POST', 'id'=>'vehicle_select_form')) }}
                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <?php  $t = 0; ?>
                        @foreach($vehicles as $vehicle)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="{{ $vehicle->id }}" name="vehicle[]"
                                           class="vehicle_select">
                                    {{ $vehicle->vehicle_type }}
                                </label>
                            </div>
                            <?php  $t = $t + 1; ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Vehicles -->
                {{ Form::close() }}

                <div class="clearfix"></div>
                <br/>
                <br/>
                <br/>

            </div>
            <!-- END OF FILTERS -->

            <!-- LIST CONTENT-->
            <div class="rightcontent col-md-9 offset-0">

                <div class="hpadding50c">
                    <h1> Predefined Packages </h1>

                    <p class="aboutarrow"></p>
                </div>

                <div class="line3"></div>

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">


                    @foreach($transport_packages as $transport_package)

                        <script>
                            //Popover tooltips
                            $(function () {
                                $("#username<?php echo $transport_package->id ?>").popover({
                                    container: 'body',
                                    placement: 'top',
                                    trigger: 'hover',
                                    html: true,
                                    title: function () {
                                        return $('#popover_title_wrapper<?php echo $transport_package->id; ?>').html();
                                    },
                                    content: function () {
                                        return $('#popover_content_wrapper<?php echo $transport_package->id; ?>').html();
                                    }
                                });
                            });
                        </script>

                        <div class="col-md-4 border">
                            <!-- CONTAINER-->
                            <div class="carscontainer">
                                <div class="center">
                                    <a href="">
                                        <?php
                                        $directory = public_path().'/images/transport_images/vehicles/';
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
                                    <a href="#" class="glyphicon glyphicon-info-sign right lblue cpointer" rel="popover"
                                       id="username{{ $transport_package->id }}"
                                       data-content="" data-original-title="">
                                    </a>

                                    <div id="popover_title_wrapper{{ $transport_package->id }}" style="display: none">
                                        <h4> {{ $transport_package->Vehicle->vehicle_type }} </h4>
                                    </div>

                                    <div id="popover_content_wrapper{{ $transport_package->id }}" style="display: none">
                                        Additional Chargers Per KM
                                        <span class="green">{{ Session::get('currency') . '&nbsp;' . number_format((Vehicle::where('id', $transport_package->vehicle_id)->first()->additional_charge_per_km * Session::get('currency_rate')), 2, '.', ''); }}</span>
                                        <br/>
                                        Additional Chargers Per Day
                                        <span class="green">{{ Session::get('currency') . '&nbsp;' . number_format((Vehicle::where('id', $transport_package->vehicle_id)->first()->additional_charge_per_day * Session::get('currency_rate')), 2, '.', ''); }}</span>
                                    </div>

                                    <h4> {{ $transport_package->Vehicle->vehicle_type }}</h4>

                                    <div class="size13 grey">

                                        <table>
                                            <tr>
                                                <td class="dark bold" valign="top">From</td>
                                                <td class="predefine_origin">
                                                    : {{ City::where('id', $transport_package->origin)->first()->city }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="dark bold" valign="top"> To</td>
                                                <td class="predefine_destination">
                                                    : {{ City::where('id', $transport_package->destination)->first()->city }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="dark bold" valign="top">Days</td>
                                                <td>: {{ $transport_package->days }}</td>
                                            </tr>
                                            <tr>
                                                <td class="dark bold" valign="top"> Maximum KM</td>
                                                <td>: {{ $transport_package->millage }} KM</td>
                                            </tr>
                                        </table>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{ $transport_package->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel"> Select Your
                                                            Date </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="w50percent">
                                                            <div class="wh90percent textleft">
                                                                <span class="opensans size13"><b>Check in</b></span>
                                                                <input type="text" name="check_in_date"
                                                                       style="z-index: 1151 !important;"
                                                                       class="form-control mySelectCalendar date_pick chk_in"
                                                                       id=""
                                                                       value="{{ Session::has('st_date') ? Session::get('st_date') : '' }}"/>
                                                            </div>
                                                        </div>

                                                        <br/>
                                                    </div>
                                                    <br/>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button predefine_id="{{ $transport_package->id }}"
                                                                id="predefine_packages_book" type="button"
                                                                class="predefined_book btn btn-primary">Add To Cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="purchasecontainer">
                                    <span class="predefine_rate size18 bold green mt5">
                                        {{ Session::get('currency') . '&nbsp;' . number_format(($transport_package->rate * Session::get('currency_rate')), 2, '.', ''); }}
                                    </span>

                                    <button data-toggle="modal" data-target="#myModal{{ $transport_package->id }}"
                                            style="background: #3498db; color: #ffffff;"
                                            class="bookbtn right">Add To Cart
                                    </button>

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
                    <br/>
                    <br/>
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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

        {{ HTML::script('js/toastr.js') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}

        <script type="text/javascript">
            $(function () {

                toastr.options.positionClass = 'toast-top-right';

                $('.date_pick').datepicker({
                    dateFormat: 'yy/mm/dd'
                });

                $('.predefined_book').click(function () {

                    var predefine_id = $(this).attr('predefine_id');
                    var check_in = $('.chk_in').datepicker({dateFormat: 'yy/mm/dd'}).val();

                    var url = 'http://' + window.location.host + '/sri-lanka/predefined_transport_add_to_cart';

                    var formData = new FormData();

                    formData.append('predefine_id', predefine_id);
                    formData.append('check_in', check_in);

                    $.ajax({
                        url: url,
                        method: 'post',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'json',
                        data: formData,
                        success: function (data) {

                            $.each(data, function (index, item) {
                                $('#myModal' + item.predefine_id).modal('hide');
                                toastr.success('Successfully Added To The Cart...!!');
                            });

                        },

                        error: function () {
                            //alert('There was an error signing In');
                        }
                    });

                });
            });
        </script>

        <script type="text/javascript">

            $('.mySelectCalendar').datepicker({

                dateFormat: 'yy/mm/dd', minDate: new Date,
                beforeShow: function (input) {
                    $(input).css({
                        "position": "relative",
                        "z-index": 999999
                    });
                }

            });
            $(function () {
                $("#datepicker").datepicker({dateFormat: "yy/mm/dd"});
                $("#datepicker2").datepicker({dateFormat: "yy/mm/dd"});
            });

        </script>

    @endsection

    </body>
@stop
