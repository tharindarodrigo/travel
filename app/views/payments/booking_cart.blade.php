@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Booking Cart </title>

@endsection

@section('custom_style')

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
        #booking_cart_single_item_delete {
            display: inline;
        }

        .hotel_img_booking {
            width: 72px;
            height: 72px;
        }

        th h4 {
            color: #FFFFFF !important;
            font-family: "Lato";
            font-style: italic;
            font-size: 18px;
        }

        .table-hover > tbody > tr:hover > td, .table-hover > tbody > tr:hover > th {
            background: #EEF4F8 !important;
        }

        .bk_room_name {
            font-family: 'Bree Serif', serif;
            color: #000000;
            font-weight: 700;
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

    <div class="container pagecontainer offset-0">

        <div class="hpadding20">

            <h1 style="color: #006699; font-family: 'Cinzel', serif; "> Booking Cart </h1>
            @if(Session::has('add_new_voucher'))

            {{Form::open(array('route'=> array('bookings.vouchers.store',Session::get('add_new_voucher'))))}}
                {{Form::submit('Add Vouchers', array('class'=>'btn btn-danger', 'id'=>'add_voucher'))}}
                {{link_to_route('bookings.create','Continue to New Booking', null, array('class'=>'btn btn-warning', 'id'=>'checkout'))}}
                <a href="{{URL::to('bookings/cancel-booking')}}" class="btn btn-default" >Cancel All</a>

            {{Form::close()}}
            @else
                {{link_to_route('bookings.create','Checkout', null, array('class'=>'btn btn-danger', 'id'=>'checkout'))}}
            @endif
            <div class="line4"></div>

        </div>

        @if(Session::has('rate_box_details'))
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <span class="opensans size18 dark bold caps"> Hotel Summery </span>
                        <br/><br/>
                        <table class="table table-responsive table-hover">
                            <thead>
                            <tr style="background: #006699">
                                <th><h4> Hotel </h4></th>
                                <th><h4> Rooms </h4></th>
                                <th><h4> Cost </h4></th>
                                <th><h4></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotel_bookings as $hotel_booking)
                                <tr>
                                    <td class="col-sm-8 col-md-5">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#">
                                                <?php
                                                $total_cost = 0;
                                                $directory = 'public/images/hotel_images/';
                                                $img_hotel_id = explode('_', $hotel_booking['room_identity']);
                                                $images = glob($directory . $img_hotel_id[0] . "_*");
                                                $img_path = array_shift($images);
                                                $img_name = basename($img_path);
                                                ?>

                                                @if(count($img_path)>0)
                                                    {{ HTML::image('images/hotel_images/'.$img_name, '', array('class' => 'hotel_img_booking'))}}
                                                @else
                                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_img_booking')) }}
                                                @endif

                                            </a>

                                            <div class="media-body">
                                                <h4 class="media-heading"><a
                                                            href="#">{{ $hotel_booking['hotel_name'] }}</a></h4>
                                                {{--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>--}}
                                                <span class="text-success"><strong style="font-size: 12px">
                                                        {{ str_replace(',', '<br />', $hotel_booking['hotel_address']) }}
                                                    </strong></span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="col-sm-2 col-md-4">

                                        @for($c=0 ; $c < count($hotel_booking)-3; $c++)
                                            <div style="display: inline-block">
                                                <button style="background: transparent" type="button"
                                                        class="btn collapsed mt-5"
                                                        data-toggle="collapse"
                                                        data-target="#collapse{{ $hotel_booking[$c]['room_identity'] }}">
                                                         <span class="dark"><h5 style="display: inline;"
                                                                                class="bk_room_name">
                                                                 Room {{ $c+1 }} </h5>
                                                             {{--Nights - {{ $hotel_booking[$c]['nights'] }}--}}
                                                </span>&nbsp;&nbsp;&nbsp;
                                                    <span class="glyphicon glyphicon-circle-arrow-down"></span>
                                                </button>

                                                &nbsp;&nbsp;&nbsp;&nbsp;

                                                {{ Form::open(array('url' => '/get_cart_single_item/delete', 'method' => 'POST', 'id'=>'booking_cart_single_item_delete')) }}
                                                <span><button name="delete_single_item"
                                                              class="right btn delete_room btn-xs btn-danger"
                                                              value="{{ $hotel_booking[$c]['room_identity'] }}"> X
                                                    </button></span>
                                                <br/>
                                                {{ Form::close() }}

                                                <!-- Collapse 1 -->

                                                <div id="collapse{{ $hotel_booking[$c]['room_identity'] }}"
                                                     class="collapse">

                                                    <div class="left size12 lblue ">
                                                        <span style="color: #000000"> Check In : </span>
                                                        {{ $hotel_booking[$c]['check_in'] }}
                                                    </div>
                                                    <br/>

                                                    <div class="left size12 lblue ">
                                                        <span style="color: #000000"> Check Out : </span>
                                                        {{ $hotel_booking[$c]['check_out'] }}
                                                    </div>
                                                    <br/>

                                                    <div class="left size12 lblue ">
                                                        Adult - {{ $hotel_booking[$c]['adult'] }} <br/>
                                                        Child - {{ $hotel_booking[$c]['child'] }}
                                                    </div>

                                                    <div class="right size12 lblue ">
                                                        {{ $hotel_booking[$c]['room_count'] }} {{ $hotel_booking[$c]['room_specification'] }}
                                                        Rooms <br/>
                                                        {{ $hotel_booking[$c]['meal_basis'] }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <!-- End of collapse 1 -->
                                                <div class="clearfix"></div>

                                                <h5 style="display: inline" class="bk_room_name">Room Total
                                                    : </h5><span
                                                        class="green"> USD {{ number_format($hotel_booking[$c]['room_cost'], 2, '.', '') }}</span>
                                            </div>
                                            <br/>
                                            <div class="line3"></div>
                                            <br/>
                                            <?php $total_cost = $total_cost + $hotel_booking[$c]['room_cost']?>
                                        @endfor
                                    </td>

                                    <td class="col-sm-1 col-md-2">
                                        <span class="green bold size18"> USD </span>
                                        <span class="green bold size18">{{ number_format($total_cost, 2, '.', '') }}</span>
                                    </td>

                                    {{ Form::open(array('url' => '/get_cart_item/delete', 'method' => 'POST', 'id'=>'booking_cart_item_delete')) }}
                                    <td class="col-sm-1 col-md-1">
                                        <button id="delete_cart_item" type="submit" class="btn btn-danger"
                                                name="delete_item"
                                                value="{{ $hotel_booking['room_identity'] }}">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button>
                                    </td>
                                    {{ Form::close() }}

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <br/><br/><br/>

        @if(Session::has('transport_cart_box'))

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <span class="opensans size18 dark bold caps"> Transport Summery </span>
                        <br/><br/>
                        <table class="table table-responsive table-hover">
                            <thead>
                            <tr style="background: #006699">
                                <th><h4> Vehicle </h4></th>
                                <th><h4> From </h4></th>
                                <th><h4> To </h4></th>
                                <th><h4> Pick Up </h4></th>
                                <th><h4> Drop Off </h4></th>
                                <th><h4> Cost </h4></th>
                                <th><h4></h4></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transport_bookings as $transport_booking)
                                <tr>
                                    <td class="col-sm-3 col-md-3">
                                        <div class="media">
                                            <a class="thumbnail pull-left" href="#">
                                                <?php
                                                $total_cost = 0;
                                                $directory = 'public/images/transport_images/vehicles';
                                                $img_vehicle_id = Vehicle::where('vehicle_type', $transport_booking['vehicle_type'])->first()->id;
                                                $images = glob($directory . $img_vehicle_id . "_*");
                                                $img_path = array_shift($images);
                                                $img_name = basename($img_path);
                                                ?>

                                                @if(count($img_path)>0)
                                                    {{ HTML::image('images/transport_images/vehicles/'.$img_name, '', array('class' => 'hotel_img_booking'))}}
                                                @else
                                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_img_booking')) }}
                                                @endif

                                            </a>

                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">{{ $transport_booking['vehicle_type'] }}</a>
                                                </h4>


                                            </div>
                                        </div>
                                    </td>

                                    <td class="col-sm-2 col-md-1.5">
                                        <h5 style="display: inline"
                                            class="bk_room_name"> {{ $transport_booking['origin'] }} </h5>
                                    </td>

                                    <td class="col-sm-2 col-md-1.5">
                                        <h5 style="display: inline"
                                            class="bk_room_name"> {{ $transport_booking['destination_1'] }} </h5>
                                    </td>

                                    <td class="col-sm-1 col-md-2 dark">
                                        <h5 style="font-weight: 700 !important;">{{ $transport_booking['pick_up_date']  }}</h5>
                                        <h5 style="font-weight: 700 !important;">{{ $transport_booking['pick_up_time_hour'] . ':' .  $transport_booking['pick_up_time_minutes'] }}</h5>
                                    </td>

                                    <td class="col-sm-1 col-md-2">
                                        <h5 style="font-weight: 700 !important;">{{ $transport_booking['drop_off_date']  }}</h5>
                                        <h5 style="font-weight: 700 !important;">{{ $transport_booking['drop_off_time_hour'] . ':' .  $transport_booking['drop_off_time_minutes'] }}</h5>
                                    </td>

                                    <td class="col-sm-1 col-md-1">
                                        <span class="green bold size18"> USD </span>
                                        <span class="green bold size18">{{ number_format($total_cost, 2, '.', '') }}</span>
                                    </td>

                                    {{ Form::open(array('url' => '/sri-lanka/transport_cart_rate_box/delete', 'method' => 'POST', 'id'=>'booking_cart_item_delete')) }}
                                    <td class="col-sm-1 col-md-1">
                                        <button id="delete_transport_cart_item" type="submit" class="btn btn-danger"
                                                name="delete_transport_item"
                                                value="{{ $transport_booking['transport_cart_key'] }}">
                                            <span class="glyphicon glyphicon-remove"></span> Remove
                                        </button>
                                    </td>
                                    {{ Form::close() }}

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @endsection

    @section('script')

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-list3.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}
        {{ HTML::script('js/booking_cart.js') }}

        <script type="text/javascript">
            $(document).ready(function(){
                $('#clear_button').click()
            })
        </script>


    @endsection

    </body>

@stop