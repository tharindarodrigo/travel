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
            background: #006699;
            color: #FFFFFF;
        }

        h4 {
            color: #006699;
        }

        .no_result{
            width: 650px;
            height: 400px;
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
                        <p class="size13"><b>9</b> Activities found</p>

                        <p class="size30 bold"><span class="size13 normal darkblue">from</span> $<span
                                    class="countprice"></span>.78 <span class="size13 normal darkblue">/adult</span></p>

                    </div>
                    <div class="tip-arrow"></div>
                </div>

                <div class="padding20title"><h3 class="opensans dark">Tours</h3></div>

                <!-- Reservation Box -->
                @include('layout.reservation_box_pages')
                <!-- End Of Reservation Box -->
                <div class="line2"></div>

                <div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>

                <div class="line2"></div>

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

                <div class="line2"></div>

                {{ Form::open(array('url' => 'sri-lanka/tour/filter', 'method' => 'POST', 'id'=>'city_form')) }}
                <!-- Activities type -->
                <button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
                    City <span class="collapsearrow"></span>
                </button>
                <div id="collapse4" class="collapse in">
                    <div class="hpadding20">
                        @foreach($filter_cities as $city)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="city" id="City{{ $x }}"
                                           value="{{ $city->id }}" class="city_select">
                                    {{ $city->city }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End of Activities type  -->

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

                </div>
                <!-- End of padding -->

                <br/><br/>

                <div class="clearfix"></div>

                <div class="itemscontainer offset-1">
                    <br/><br/>

                    <div style="padding: 10%" class="container offset-2" >
                        {{ HTML::image('images/no-result.png', '', array('class' => 'no_result'))}}
                    </div>
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

        <script type="text/javascript">
            $('.tour_select').click(function () {
                var tour_type = $('input[name=tour]:checked').map(function () {
                    return $(this).val();
                }).get();
                $('#tour_form').submit()
            });
        </script>

    @endsection

    </body>
@stop
