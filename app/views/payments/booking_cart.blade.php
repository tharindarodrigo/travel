@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel Grid </title>

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

            <div class="line4"></div>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th> Hotel</th>
                            <th> Rooms</th>
                            <th class="text-center"> Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::has('booking_cart'))
                            @foreach($hotel_bookings as $hotel_booking)

                                @for($c=0 ; $c < count($hotel_booking)-1; $c++)

                                    <?php
                                    $one_hotel_id = $hotel_booking[$c]['hotel_id'];
                                    ?>

                                    @if (!Session::has('aaa'))
                                        <?php
                                        $data = [];
                                        $data[] = $one_hotel_id;
                                        Session::put('aaaa', $data);
                                        ?>

                                        <tr>

                                            <td class="col-sm-8 col-md-2">
                                                <div class="media">
                                                    <a class="thumbnail pull-left" href="#">
                                                        <img class="media-object"
                                                             src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png"
                                                             style="width: 72px; height: 72px;">
                                                    </a>

                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a
                                                                    href="#">{{ $hotel_booking['hotel_name'] }}</a></h4>
                                                        {{--<h5 class="media-heading"> by <a href="#">Brand name</a></h5>--}}
                                                        <span class="text-success"><strong style="font-size: 12px">
                                                                {{ str_replace(',', '<br />', $hotel_booking[$c]['hotel_address'])  }}
                                                            </strong></span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="col-sm-1 col-md-2" style="text-align: center">
                                                <span class="dark">Room {{ $c+1 }}</span><br/>
                                                Adult {{ (Session::has('adult')) ? Session::get('adult'):'' }} /
                                                Child {{ (Session::has('child')) ? Session::get('child') : '' }} /
                                                Nights {{ (Session::has('date_gap')) ? Session::get('date_gap') : '' }}

                                                <!-- Collapse 1 -->
                                                <button type="button" class="collapsebtn3 collapsed mt-5"
                                                        data-toggle="collapse" data-target="#collapse1"></button>
                                                <div id="collapse1" class="collapse">
                                                    <div class="left size12 lblue container">
                                                        {{ $hotel_booking[$c]['room_count'] }} {{ $hotel_booking[$c]['room_specification'] }}
                                                        Rooms <br/>
                                                        {{ $hotel_booking[$c]['meal_basis'] }}
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <!-- End of collapse 1 -->
                                                <div class="clearfix"></div>

                                                Room Total : <span
                                                        class="green">{{ $hotel_booking[$c]['room_cost'] }}</span>
                                            </td>

                                            <td class="col-sm-1 col-md-1"></td>

                                            {{ Form::open(array('url' => '/get_cart_item/delete', 'method' => 'POST', 'id'=>'booking_cart_item_delete')) }}
                                            <td class="col-sm-1 col-md-1">
                                                <button id="delete_cart_item" type="submit" class="btn btn-danger"
                                                        name="delete_item"
                                                        value="{{ $hotel_booking[$c]['room_identity'] }}">
                                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                                </button>
                                            </td>
                                            {{ Form::close() }}

                                        </tr>

                                    @endif


                                @endfor

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

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

        {{--<script type="text/javascript">--}}
        {{--$(function () {--}}
        {{--$('#delete_cart_item').click(function () {--}}

        {{--var cartData = new FormData();--}}
        {{--var delete_cart_item = $(this).val();--}}

        {{--var url = 'http://' + window.location.host + '/get_cart_item/delete';--}}

        {{--cartData.append('delete_cart_item', delete_cart_item);--}}

        {{--sendBookingCartData(url, cartData);--}}

        {{--});--}}
        {{--});--}}
        {{--</script>--}}

    @endsection

    </body>

@stop