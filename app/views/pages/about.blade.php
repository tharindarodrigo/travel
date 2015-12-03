@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us </title>

    <style type="text/css">
        .tourism {
            width: 250px;;
        }

        strong {
            font-family: "Lato";
            font-style: italic;
            /*display: block;*/
        }

    </style>

@endsection

@section('custom_style')

    <!-- PIECHART -->
    {{ HTML::style('assets/css/jquery.easy-pie-chart.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <style type="text/css">
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
                    <li><a href="{{URL::to('/about')}}"
                           class="active"> faq </a></li>
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
                                    class="size30 bold"> </b>
                            Results Found

                        <p class="size30 bold"><span class="size13 normal darkblue">In</span>

                        </p>

                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->
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
                    <h1> About Us </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">

                        <div style="padding-left: 10px;  height:auto;text-align: justify; ">


                            <p>&nbsp;</p>

                            <p><img src="images/exotic_logo.jpg" alt=""></p>

                            <p>&nbsp;</p>

                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><span style="font-size: large;">W</span></strong>e
                                at Exotic Holidays International pride ourselves on our reputation and rely on it for
                                our business. Our dedicated &amp; knowledgeable Travel Professionals who truly care
                                about our clients take pride in their careers and personal achievements</p>

                            <p>Exotic Holidays International is a private entity with a wealth of experience in
                                providing quality service in the in-bound travel business.<br><br>&nbsp;We are always
                                open to forming strategic Alliances with reputed Travel partners in major cities around
                                the world to facilitate our customer’s and corporate customer requirements.<br><br>We
                                are a highly motivated and dedicated team of professionals whose prime objective is to
                                offer an impeccable level of service to all our discerning clients, in keeping with our
                                Company policy, to go the extra mile in building personal relationships.<br><br>The
                                Management maintains a hands-on operation in all aspects of the day-to-day operation of
                                the Company. <br>Exotic Holidays International has positioned itself to serving the
                                Western, Eastern and Arabian clientele. It is geared to accommodate the prospective and
                                lucrative premium leisure markets and is ambitious to be a leader in the industry today
                                and in the future. Therefore, we are constantly looking to new marketing, operational
                                techniques and new products, with the aim of always being a step ahead of our
                                competitors at any given time. Our target is also to gain a major premium customer share
                                in the travel and leisure markets through innovative quality products and services. Our
                                operations today center on providing value added services to our clients. In this
                                context, we emphasize on proper planning and implementing strategies now, with a long
                                term view in this fast changing industry.<br><br>We are willing to work out different
                                strategies to find the correct combination, to the customers’ requirements, which will
                                take us to our objective in the shortest possible way, and time. The prime objective of
                                the management is to continuously improve staff training, skills, automation, product
                                knowledge, extensive advertising, marketing campaigns and guarantee a personal interface
                                service with all its customers that will lead Exotic Holidays International to greater
                                heights in the coming year.<br><br>One of Exotic Holidays International business concept
                                is to make your concerns our concerns and let our valued customers enjoy their holiday.
                                We provide 24-hour service and guide our customers through any difficulty they come
                                across.</p>

                            <p>&nbsp;</p>

                            <p><span style="text-decoration: underline;"><span style="font-size: medium;"><strong>Tourist
                                            Board registration</strong></span></span></p>

                            <p>&nbsp;</p>

                            <p><a href="images/Tourism.jpg"><img src="images/Tourism.jpg" alt=""></a></p>

                            <p><span style="font-size: small;"><strong>Tourist Board registration No :
                                        TS/TA/1164</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em><span
                                                style="text-decoration: underline;">Click hear to view </span></em></span><em><span
                                            style="text-decoration: underline;"><span
                                                style="font-size: small;">license</span></span></em></p>

                            <p>&nbsp;</p>

                            <p>Ø</p>

                        </div>
                    </div>
                    <!-- END OF LEFT IMG -->

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

