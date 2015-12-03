@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel Details </title>

@endsection

@section('custom_style')

    <!-- PIECHART -->
    {{ HTML::style('assets/css/jquery.easy-pie-chart.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <style type="text/css">
        .collapsebtn {
            background: #3498db;
            color: #FFFFFF;
        }

        h1 {
            color: #3498db;
            font-family: 'Rokkitt', serif !important;
        }

        h2 {
            font-family: 'Arvo', serif;
        }
    </style>

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
                    <li><a href="{{URL::route('index')}}" class="active">Home </a></li>
                    <li>/</li>
                    <li><a href="{{URL::to('tour/sri-lanka/'.Request::segment(3) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(3)) }} </a></li>
                    <li>/</li>
                    <li><a href="{{URL::to('tour/sri-lanka/'.Request::segment(3).'/'.Request::segment(4) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(4)) }} </a></li>
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
                        <p class="size13"><b
                                    class="size30 bold"> {{ TourType::where('tour_id', '=', $tour_id)->count();}} </b>
                            Results Found

                        <p class="size30 bold"><span class="size13 normal darkblue">In</span>
                            {{ str_replace('-', ' ', Request::segment(3)) }}
                        </p>

                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->

                {{ Form::open(array('url' => 'sri-lanka/tour/filter', 'method' => 'POST', 'id'=>'tour_form')) }}

                <!-- Star ratings -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse1">
                    Tour Packages <span class="collapsearrow"></span>
                </button>

                <div id="collapse1" class="collapse in">
                    <div class="hpadding20">
                        <?php $x = 1; ?>
                        @foreach($filter_tours as $tour)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="tour" id="tour{{ $x }}"
                                           value="{{ $tour->id }}" class="tour_select">
                                    {{ $tour->tour_title }}
                                </label>
                            </div>
                            <?php $x++ ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Star ratings -->
                {{ Form::close() }}


                <!-- Cities -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse5">
                    Cities <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/filter', 'method' => 'POST', 'id'=>'city_form')) }}

                <div id="collapse5" class="collapse in">
                    <div class="hpadding20">

                        <div id="city_half">
                            <?php  $z = 0; ?>
                            @foreach($filter_cities as $city)
                                @if($z < 5)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="city" id="City{{ $x }}"
                                                   value="{{ $city->id }}"
                                                   class="city_select" {{ $city->id == Session::get('city') ? 'checked':'' }}>
                                            {{ $city->city }}
                                        </label>
                                    </div>
                                    <?php  $z = $z + 1; ?>
                                @endif
                            @endforeach

                            <a id="city_readmore" style="text-align: right" class="last"
                               data-toggle="collapse"
                               data-target="#collapse7">
                                <h6>More</h6>
                            </a>

                        </div>

                        <div id="city_full">
                            <div id="collapse7" class="collapse">
                                @foreach($filter_cities as $city)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="city" id="City{{ $x }}"
                                                   value="{{ $city->id }}"
                                                   class="city_select" {{ $city->id == Session::get('city') ? 'checked':'' }}>
                                            {{ $city->city }}
                                        </label>
                                    </div>
                                @endforeach

                                <a href="#city_full" id="city_readless" style="text-align: right" class="last"
                                   data-toggle="collapse"
                                   data-target="#collapse7">
                                    <h6>Less</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Cities -->
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
                    <h1> {{ $tour_type->tour_type_title }} </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="col-md-8 cpdd01 grey2">

                        <P>{{ $tour_type->description }}</P>
                        <br/><br/>

                    </div>
                    <!-- END OF LEFT IMG -->

                    <!-- IMG RIGHT TEXT -->
                    <div class="col-md-4 cpdd02">
                        <div class="opensans grey">
                            <?php
                            $directory = public_path().'/images/tour_images/tour_types/';
                            $images = glob($directory . $tour_type->id . "*");
                            $img_path = array_shift($images);
                            $img_name = basename($img_path);
                            ?>

                            @if(count($img_path)>0)
                                {{ HTML::image('images/tour_images/tour_types/' . $img_name, '', array('class' => 'hotel_img_1'))}}
                            @else
                                {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_img_1')) }}
                            @endif
                        </div>
                    </div>
                    <!-- END OF IMG RIGHT TEXT -->
                    <div class="clearfix"></div>
                    <br/><br/>

                </div>
            </div>
            <!-- END OF LIST CONTENT-->

        </div>
        <!-- END CONTENT -->

    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript  -->
        {{ HTML::script('assets/js/js-blog.js') }}

        <!-- Easy Pie Chart  -->
        {{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}

        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

        <!-- Custom Select -->
        {{ HTML::script('js/lightbox.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-list4.js') }}

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}


    @endsection

    </body>

@stop

