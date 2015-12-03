@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Tour List </title>

@endsection

@section('custom_style')

    <style type="text/css">
        .collapsebtn {
            background: #3498db;
            color: #FFFFFF;
        }

        h4 {
            color: #3498db;
        }

        .labelleft2 p {
            color: #999;
        }

        .labelleft2 p:hover {
            color: #333333;
        }

        .labelleft2 li {
            color: #333333 !important;
        }

        #commentbox {
            background-image: url(../../images/site/ratings.png);
            background-repeat: no-repeat;
            z-index: 90;
            height: 92px;
            width: 88px;
            position: absolute;
            top: 150px;
            right: 90px;
            text-align: center;
        }

        #commentrating {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-weight: bold;
            color: #999;
            padding-top: 28px;
        }

        #commentnums {
            color: #999;
            font-family: Georgia, "Times New Roman", Times, serif;
            font-size: 14px;
            font-weight: bolder;
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
                    <li><a href="{{URL::route('index')}}" class="active">Home </a></li>
                    <li>/</li>
                    <li><a href="{{URL::to('tour/sri-lanka/'.Request::segment(3) )}}"
                           class="active">{{ str_replace('-', ' ', Request::segment(3)) }} </a></li>
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

                <div class="hpadding20">

                    <h1 style="color: #3498db; font-family: 'Cinzel', serif; "> {{ str_replace('-', ' ', Request::segment(3)) }} </h1>

                    <div class="line4"></div>

                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">

                    @foreach($tours as $types)

                        <?php
                        //echo public_path();
                        $directory = public_path().'/images/tour_images/';
                        $images = glob($directory . $types->id . "*");
                        $img_path = array_shift($images);
                        $img_name = basename($img_path);
                        ?>

                        <div class="offset-2">
                            <div class="col-md-4 offset-0">
                                <div class="listitem2">

                                    <a href="<?php echo 'images/tour_images/' . $img_name; ?>"
                                       data-title="{{ $types->tour_type_title }}" data-gallery="multiimages"
                                       data-toggle="lightbox">

                                        @if(count($img_path)>0)
                                            {{ HTML::image('images/tour_images/'.$img_name, '', array('class' => 'hotel_img_1'))}}
                                        @else
                                            {{ HTML::image('images/no-image.jpg', '', array('class' => 'property_img_1')) }}
                                        @endif

                                    </a>

                                    <div class="liover"></div>
                                    <a class="fav-icon" href="#"></a>

                                    <a class="book-icon"
                                       href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->Tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}">
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-8 offset-0">
                                <div class="itemlabel4">
                                    <div class="labelright">

                                        {{--@if(!empty($types->rate))--}}
                                        {{--<br/><span class="green size18"><b>{{ $types->rate }}</b></span><br/>--}}
                                        {{--<span class="size11 grey">/person</span><br/><br/><br/>--}}
                                        {{--@else--}}
                                        {{--<span class="green size18"><b> No Rate Available </b></span><br/>--}}
                                        {{--@endif--}}

                                        {{--<span class="size11 grey"></span><br/><br/><br/>--}}

                                        <a style="background: #3498db; color: #FFFFFF" class="bookbtn mt1"
                                           target="_blank"
                                           href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->Tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}">
                                            Book
                                        </a>
                                    </div>
                                    <div class="labelleft2">

                                        <a target="_blank" href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-', $types->tour->tour_title).'/'.str_replace(' ', '-', $types->tour_type_title))}}">
                                            <span class="size16">
                                                <h4 style="color: #3498db; font-family: 'Play', sans-serif;">{{ $types->tour_type_title }}</h4>
                                            </span>
                                        </a>

                                        <div class="line4"></div>

                                        <div>
                                            <div class="left">
                                                <p class="grey size14 lh6">
                                                    {{ $types->short_description }}
                                                </p>
                                                <br/>
                                            </div>

                                            <div class="right hidden-xs hidden-md">
                                                <div id="commentbox">
                                                    <div id="commentrating">Rating</div>
                                                    <div id="commentnums">
                                                        5/7
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="offset-2">
                            <hr class="featurette-divider3">
                        </div>
                    @endforeach

                </div>
                <!-- End of offset1-->

                <div class="hpadding20" align="right">
                    {{ $tours->links() }}
                </div>
                <br/><br/>
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

        <!-- Custom js -->
        {{ HTML::script('js/my_script.js') }}

    @endsection

    </body>
@stop
