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

        .no_result {
            width: 650px;
            height: 400px;
        }

        .offer_img {
            width: 250px;
            height: 250px;
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

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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

                <div class="hpadding50c">
                    <h1 style="color: #3498db"> Special Offers </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>
                <!-- End of padding -->

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">
                    <br/><br/>

                    <?php
                    $directory = public_path() . '/images/special_offers/deals/';
                    $images = glob($directory . "*");

                    $img_path = array_shift($images);
                    $img_name = basename($img_path);
                    ?>

                    @foreach($images as $image)
                        <?php
                        $get_hotel_name = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', glob($directory . "*"));
                        $hotel_name = strtok(substr(implode(" ", $get_hotel_name), 45), '.');

                        $hotel_city_id = Hotel::where('name', $hotel_name)->first()->city_id;
                        $hotel_city = City::where('id', $hotel_city_id)->first()->city;
                        ?>
                        <div class="col-md-4">
                            @if(count($images)>0)
                                <a target="_blank" href="{{URL::to('sri-lanka/'.$hotel_city.'/'.str_replace(' ', '-', $hotel_name))}}">
                                    {{ HTML::image('images/special_offers/deals/'.basename($image), '', array('class' => 'offer_img'))}}
                                </a>
                            @endif
                        </div>
                    @endforeach

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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

        <script type="text/javascript">

            $(document).ready(function () {
                $('#facility_full').hide();
                $('#city_full').hide();
            });

            $('#facility_readmore').click(function () {
                $('#facility_half').hide();
                $('#facility_full').show();
            });

            $('#facility_readless').click(function () {
                $('#facility_half').show();
                $('#facility_full').hide();
            });

            $('#city_readmore').click(function () {
                $('#city_half').hide();
                $('#city_full').show();
            });

            $('#city_readless').click(function () {
                $('#city_half').show();
                $('#city_full').hide();
            });

        </script>

    @endsection

    </body>
@stop
