@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Srilankahotels.travel About us">
    <meta name="description"
          content="We at Exotic Holidays International pride ourselves on our reputation and rely on it for our business. Our dedicated & knowledgeable Travel Professionals who truly care about our clients take pride in their careers and personal achievements">
    <title> Srilankahotels.travel - Pay Online </title>

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

        .visa_cards {
            /*padding-right: 150px;*/
            height: 60px;
        }

        .hotel_img_booking {
            display: inline !important;
            width: 72px;
            height: 72px;
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
                    {{--<li><a href="{{URL::to('/about')}}"--}}
                    {{--class="active"> faq </a></li>--}}
                    {{--<li>/</li>--}}
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
                    <h1> Online Payments </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">

                        <div class="container">

                            <div class="container mt25 offset-0">

                                <!-- CONTENT -->
                                <div class="col-md-12 offset-0">
                                    <div class="grey">

                                        {{ Form::open(array('url' => '/pay-online', 'files'=> true, 'id' => 'pay_online_form', 'method' => 'POST', )) }}

                                        <div>

                                            <div class="col-md-3 textright">
                                                <div class="margtop15"><span class="dark"> First Name : </span><span
                                                            class="red">*</span></div>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="size12">First and Last Name*</span>
                                                {{Form::text('name', null, array('class'=> 'form-control'))}}
                                                {{$errors->first('name', '<span class="size12" style="color: red;">:message</span>') }}
                                            </div>
                                        </div>

                                        <div>
                                            <div class="col-md-3 textleft margtop15">
                                            </div>
                                            <div class="clearfix"></div>
                                            <br/>

                                            <div class="col-md-3 textright">
                                                <div class="margtop15"><span class="dark"> Email : </span><span
                                                            class="red">*</span></div>
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::text('email', null, array('class'=> 'form-control'))}}
                                                {{$errors->first('email', '<span class="size12" style="color: red;">:message</span>') }}
                                            </div>
                                        </div>

                                        <div>
                                            <div class="col-md-3 textleft margtop15">
                                            </div>
                                            <div class="clearfix"></div>
                                            <br/>

                                            <div class="col-md-3 textright">
                                                <div class="margtop15"><span class="dark"> Phone : </span><span
                                                            class="red">*</span></div>
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::text('phone', null, array('class'=> 'form-control'))}}
                                                {{$errors->first('phone', '<span class="size12" style="color: red;">:message</span>') }}
                                            </div>
                                        </div>

                                        <div>
                                            <div class="col-md-3 textleft margtop15">
                                            </div>
                                            <div class="clearfix"></div>
                                            <br/>

                                            <div class="col-md-3 textright">
                                                <div class="margtop15"><span class="dark"> Amount : </span><span
                                                            class="red">*</span></div>
                                            </div>
                                            <div class="col-md-6">
                                                {{Form::text('amount', null, array('class'=> 'form-control'))}}
                                                {{$errors->first('amount', '<span class="size12" style="color: red;">:message</span>') }}
                                            </div>
                                        </div>

                                        <div class="col-md-3 textleft margtop15">
                                        </div>
                                        <div class="clearfix"></div>
                                        <br/> <br/>

                                        <div class="col-md-3 textright">
                                            <div class="margtop15"></div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="right">
                                                <button type="submit" class="bluebtn"
                                                   id="pat_online"> Send Payment
                                                </button>
                                            </div>
                                        </div>
                                        <br/><br/>
                                        <!-- END OF LEFT IMG -->

                                        <div class="clearfix"></div>
                                        <br/><br/>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                                <!-- END OF LIST CONTENT-->

                            </div>
                            <!-- END CONTENT -->


                            <div class="col-md-6">
                                {{ HTML::image('images/site/verified.jpg', '', array('class' => '')) }}
                            </div>

                            <div class="col-md-6">
                                {{ HTML::image('images/site/CreditCardLogos-2.jpg', '', array('class' => 'visa_cards')) }}
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

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

