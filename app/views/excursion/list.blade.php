@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Excursion list </title>

@endsection

@section('custom_style')

    <style type="text/css">
        a {
            text-decoration: none !important;
        }
    </style>

    <!-- PIECHART -->
    {{ HTML::style('assets/css/jquery.easy-pie-chart.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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
                    <li><a href="#" class="active">About us</a></li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="container mt25 pagecontainer2 offset-0">

            <!-- CONTENT -->
            <div class="col-md-8 offset-0">

                <div class="hpadding50c">

                    @foreach($excursion_types as $excursion)

                        <!-- LEFT IMG -->
                        <div class="cpdd01 grey2">

                            <a href="{{URL::to('excursion/sri-lanka/'.str_replace(' ', '-', $excursion->ExcursionType->excursion_type).'/'.str_replace(' ', '-', $excursion->excursion))}}">
                                <h1 style="color:#006699;">{{ $excursion->excursion }}</h1>
                            </a>

                            <div class="line4"></div>

                            <?php
                            $directory = 'images/excursion_images/';
                            $images = glob($directory . $excursion->id . "_" . "*.*");
                            $img_path = array_shift($images);
                            ?>

                            <div class="abover">
                                <div class="abbg">
                                    <a href="<?php echo 'http://localhost/travel/public/' . $img_path; ?>"
                                       class="blogpost-hover"
                                       data-title="{{ $excursion->excursion }}"
                                       data-gallery="multiimages" data-toggle="lightbox">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                </div>

                                @if(count($img_path)>0)
                                    {{ HTML::image($img_path, '', array('class' => 'hotel_img_1'))}}
                                @else
                                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'property_img_1')) }}
                                @endif

                            </div>

                            <div class="line4"></div>
                            <p>
                                {{ $excursion->short_description }}
                            </p>
                            <br/><br/>
                            <a href="" class="btn-search5"> Read more <span
                                        class="glyphicon glyphicon-arrow-right"></span> </a>

                            <br/><br/>

                            <br/>

                        </div>
                        <!-- END OF LEFT IMG -->

                    @endforeach

                </div>

                <div class="clearfix"></div>
                <br/>

                <div class="hpadding20" align="center">
                    {{ $excursion_types->links() }}
                </div>

                <br/><br/>
            </div>
            <!-- END CONTENT -->

            <div class="col-md-4 cpdd02">
                <div class="opensans grey">
                    <br/><br/><br/><br/><br/>
                    <ul class="blogcat">
                        <li><a href="#">Vacations</a> <span class="badge indent0">4</span></li>
                        <li><a href="#">Hotels</a> <span class="badge indent0">8</span></li>
                        <li><a href="#">Flights</a> <span class="badge indent0">15</span></li>
                        <li><a href="#">Early booking</a> <span class="badge indent0">16</span></li>
                        <li><a href="#">Last minute</a> <span class="badge indent0">23</span></li>
                        <li><a href="#">Cruises</a> <span class="badge indent0">42</span></li>
                    </ul>
                    <br/>

                    <!-- Nav tabs -->
                    <ul class="nav navigation-tabs3">
                        <li class="active"><a href="#tab-newtopic" data-toggle="tab"><span
                                        class="glyphicon glyphicon-star"></span> Featured</a></li>
                        <li><a href="#tab-comments" data-toggle="tab"><span
                                        class="glyphicon glyphicon-stats"></span> Popular</a></li>

                    </ul>

                    <div class="tab-content4">
                        <!-- Tab 1 -->
                        <div class="tab-pane active" id="tab-newtopic">
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-1.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Dany</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">

                            <div class="line4"></div>
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-2.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Amaragua</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">

                            <div class="line4"></div>
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-3.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Lotus</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">
                        </div>
                        <!-- End of Tab 1 -->

                        <!-- Tab 2 -->
                        <div class="tab-pane" id="tab-comments">
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-2.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Lotus</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">

                            <div class="line4"></div>
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-3.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Dany</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">

                            <div class="line4"></div>
                            <a href="#"><img alt="" class="left mr20" src="images/smallthumb-1.jpg"></a>
                            <a class="dark" href="#"><b>Hotel Amaragua</b></a><br>
                            <span class="opensans green bold size14">$36-$160</span> <span class="grey">avg/night</span><br>
                            <img alt="" src="images/filter-rating-5.png">
                        </div>
                        <!-- End of Tab 2 -->

                        <!-- Tab 3 -->
                        <div class="tab-pane" id="tab-blogcomments">

                        </div>
                        <!-- End of Tab 3 -->
                    </div>

                </div>
            </div>
            <!-- END OF IMG RIGHT TEXT -->

            <div class="clearfix"></div>
            <br/><br/>
            <!-- IMG RIGHT TEXT -->

        </div>


    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript  -->
        {{ HTML::script('assets/js/js-blog.js') }}

        <!-- Easy Pie Chart  -->
        {{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}

        <!-- Custom Select -->
        {{ HTML::script('js/lightbox.js') }}

        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

    @endsection

    </body>
@stop
