@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="About Sri Lanka">
    <meta name="description"
          content="The island of Ceylon, as it was known by its colonial rulers, has fascinated many generations of travellers, and has captured the imagination of explorers who have kept returning to its shores in awe of its natural beauty and curious inhabitants.">
    <title> About Sri Lanka - Sri Lanka Hotels </title>

    <style type="text/css">
        .tourism {
            width: 250px;;
        }

        strong {
            font-family: "Lato";
            font-style: italic;
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
                    <li><a href="{{URL::to('/about-sri-lanka')}}"
                           class="active"> About Sri Lanka </a></li>
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
                    <h1> About Sri Lanka </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="col-md-8 cpdd01 grey2">

                        <P>
                            The island of Ceylon, as it was known by its colonial rulers, has fascinated many
                            generations of travellers, and has captured the imagination of explorers who have kept
                            returning to its shores in awe of its natural beauty and curious inhabitants.
                        </p>

                        <p>
                            With its location at the centre of major sea routes, the island was a coveted treasure of
                            maritime traders. The island created a strategic link between South East Asia and West Asia
                            and was an equally important stop along the silk route. The island has strong roots vested
                            in the Buddhist religion and has remained so from the ancient days. The country was the
                            first location from where Buddhist teachings were documented, and is one of the few
                            countries where Buddhism finds its abode in South Asia.
                        </p>

                        <p>
                            But with that said, the country boasts of a rich diversity of cultures, religions and
                            languages. The Sinhalese community makes up the majority of the population while Sri Lankan
                            Tamils concentrated in the North and the East of the island form the largest ethnic minority
                            in the island. Other communities include Burghers, Moors, Kaffirs, and Malays.
                        </p>

                        <p>
                            The island lays claim to a colourful and long history which spans more than three thousand
                            years and also one of the longest histories to be documented in the world. The country is
                            also a founding member of the SAARC and is a member of the UN, Commonwealth, and the
                            Non-Aligned movement to name a few. The country's stock market was dubbed as the best
                            performing stock exchange from 2009-2010.

                        </P>
                        <br/><br/>

                    </div>
                    <!-- END OF LEFT IMG -->

                    <!-- IMG RIGHT TEXT -->
                    <div class="col-md-4 cpdd02">
                        <div class="opensans grey">
                            {{ HTML::image('images/tourism_in_srilanka.jpg', '', array('class' => 'tourism'))}}
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

