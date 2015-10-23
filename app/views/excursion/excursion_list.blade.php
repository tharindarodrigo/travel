@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Tour List </title>

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

        .excursion_short p, li {
            color: #999;
        }

        .labelleft2 p:hover, li:hover {
            color: #000000;
        }

        .labelleft2 li {
            color: #333333 !important;
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
                    <li><a href="{{URL::to('excursion/sri-lanka/'.Request::segment(3) )}}"
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
                                    class="size30 bold"> {{ count($excursions);}} </b>
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

                <div class="line2"></div>

                <!-- Excursion -->
                <button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse3">
                    Excursion type <span class="collapsearrow"></span>
                </button>
                {{ Form::open(array('url' => '/sri-lanka/excursion/filter', 'method' => 'POST', 'id'=>'excursion_form')) }}
                <div id="collapse3" class="collapse in">
                    <div class="hpadding20">
                        <?php $x = 1; ?>
                        @foreach($filter_excursion as $excursion)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="excursion" id="Excursion{{ $x }}"
                                           value="{{ $excursion->id }}" class="excursion_select">
                                    {{ $excursion->excursion_type }}
                                </label>
                            </div>
                            <?php $x++ ?>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Accommodations -->
                {{ Form::close() }}
                <div class="line2"></div>

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
                <div class="line2"></div>
                <div class="clearfix"></div>
                <br/>
                <br/>
                <br/>

            </div>
            <!-- END OF FILTERS -->

            <!-- LIST CONTENT-->
            <div class="rightcontent col-md-9 offset-0">

                <div class="hpadding20">

                    <h1 style="color: #006699; font-family: 'Cinzel', serif; "> {{ str_replace('-', ' ', Request::segment(3)) }} </h1>

                    <div class="line4"></div>

                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">

                    @foreach($excursions as $excursion)

                        <?php
                        //echo public_path();
                        $directory = 'public/images/excursion_images/';
                        $images = glob($directory . $excursion->id . "*");
                        $img_path = array_shift($images);
                        $img_name = basename($img_path);
                        ?>

                        <div class="offset-2">
                            <div class="col-md-4 offset-0">
                                <div class="listitem2">

                                    <a href="<?php echo 'images/excursion_images/' . $img_name; ?>"
                                       data-title="{{ $excursion->excursion }}" data-gallery="multiimages"
                                       data-toggle="lightbox">

                                        @if(count($img_path)>0)
                                            {{ HTML::image('images/excursion_images/'.$img_name, '', array('class' => 'hotel_img_1')) }}
                                        @else
                                            {{ HTML::image('images/no-image.jpg', '', array('class' => 'hotel_img_1')) }}
                                        @endif
                                    </a>

                                    <div class="liover"></div>
                                    <a class="fav-icon" href="#"></a>

                                    <a class="book-icon"
                                       href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursion->ExcursionType->excursion_type).'/'.str_replace(' ', '-', $excursion->excursion))}}"></a>

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

                                        <a style="background: #006699; color: #FFFFFF" class="bookbtn mt1"
                                           href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursion->ExcursionType->excursion_type).'/'.str_replace(' ', '-', $excursion->excursion))}}">
                                            Book
                                        </a>

                                    </div>
                                    <div class="labelleft2">

                                        <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursion->ExcursionType->excursion_type).'/'.str_replace(' ', '-', $excursion->excursion))}}">
                                            <span class="size16">
                                                <h4 style="color: #006699; font-family: 'Play', sans-serif;">{{ $excursion->excursion }}</h4>
                                            </span>
                                        </a>

                                        <div class="line4"></div>

                                        <div class="excursion_short">
                                            {{ $excursion->short_description }}.
                                        </div>
                                        <br/>

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
                    {{ $excursions->links() }}
                </div>
                <br/>

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
