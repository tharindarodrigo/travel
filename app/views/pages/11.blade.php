


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


            <!-- LIST CONTENT-->
            <div class="rightcontent col-md-9 offset-0">


                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->F


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
