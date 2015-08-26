@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Excursion Details </title>

@endsection

@section('custom_style')

    <!-- Updates -->
    {{ HTML::style('updates/update1/css/style01.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- bin/jquery.slider.min.css -->
    {{ HTML::style('plugins/jslider/css/jslider.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('plugins/jslider/css/jslider.round-blue.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- bin/jquery.slider.min.js -->
    {{ HTML::script('plugins/jslider/js/jshashtable-2.1_src.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.numberformatter-1.2.3.js') }}
    {{ HTML::script('plugins/jslider/js/tmpl.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.dependClass-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/draggable-0.1.js') }}
    {{ HTML::script('plugins/jslider/js/jquery.slider.js') }}
    <!-- end -->

    <style type="text/css">
        .ex_details {
            height: 555px;
            width: 760px;
        }

        .price-head {
            border-radius: 20px 0px 20px 0px;
            -moz-border-radius: 20px 0px 20px 0px;
            -webkit-border-radius: 20px 0px 20px 0px;
        }

        .price-foot {
            border-radius: 0px 20px 0px 20px;
            -moz-border-radius: 0px 20px 0px 20px;
            -webkit-border-radius: 0px 20px 0px 20px;
        }

        .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
            border: none !important;
        }
    </style>

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
                    <li><a href="#">Activities</a></li>
                    <li>/</li>
                    <li><a href="#">U.A.E.</a></li>
                    <li>/</li>
                    <li><a href="#" class="active">Dubai</a></li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="container pagecontainer offset-0">

            <!-- SLIDER -->
            <div class="col-md-8" style="padding: 0 !important;">

                <?php
                $directory = 'images/excursion_images/excursion_types/';
                $images = glob($directory . $excursion_type_id . "*.*");
                $img_path = array_shift($images);
                ?>

                @if(count($img_path)>0)
                    {{ HTML::image($img_path, '', array('class' => 'ex_details'))}}
                @else
                    {{ HTML::image('images/no-image.jpg', '', array('class' => 'ex_details')) }}
                @endif

            </div>
            <!-- END OF SLIDER -->

            <!-- RIGHT INFO -->
            <div class="col-md-4 detailsright offset-0">
                <div class="padding20">
                    <h1 style="color:#006699;"> {{ $excursion->excursion }} </h1>

                    {{ HTML::image('images/smallrating-5.png') }}
                </div>

                <div class="line3"></div>

                <div class="hpadding20">
                    <h2 class="opensans slim green2"> Good Experience !</h2>
                </div>

                <div class="line3 margtop20"></div>

                <div class="col-md-6 bordertype1 padding20">
                    <span class="opensans size30 bold grey2">97%</span><br/>
                    of guests<br/>recommend
                </div>
                <div class="col-md-6 bordertype2 padding20">
                    <span class="opensans size30 bold grey2">4.5</span>/5<br/>
                    guest ratings
                </div>

                <div class="col-md-6 bordertype3">
                    <img src="images/user-rating-4.png" alt=""/><br/>
                    18 reviews
                </div>
                <div class="col-md-6 bordertype3">
                    <a href="#" class="grey">+Add review</a>
                </div>
                <div class="clearfix"></div>
                <br/>

                <div class="hpadding20">
                    <a href="#" class="booknow margtop20 btnmarg">Book now</a>
                </div>
            </div>
            <!-- END OF RIGHT INFO -->

        </div>
        <!-- END OF container-->

        <div class="container mt25 offset-0">

            <div class="col-md-8 pagecontainer2 offset-0">
                <div class="cstyle10"></div>

                <ul class="nav nav-tabs" id="myTab">
                    <li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#summary"><span
                                    class="summary"></span><span class="hidetext">Details</span>&nbsp;</a></li>
                    <li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#roomrates"><span
                                    class="rates"></span><span class="hidetext">Rates</span>&nbsp;</a></li>
                    <li onclick="loadScript()" class=""><a data-toggle="tab" href="#maps"><span
                                    class="maps"></span><span class="hidetext">Location</span>&nbsp;</a></li>

                </ul>
                <div class="tab-content4">

                    <!-- TAB 1 -->
                    <div id="summary" class="tab-pane fade">
                        <div class="hpadding20">
                            <p class="hpadding20">
                                {{ $excursion->description }}
                            </p>
                        </div>
                    </div>

                    <!-- TAB 2 -->
                    <div id="roomrates" class="tab-pane fade active in">
                        <div class="hpadding20">
                            <h3 class="dark bold"> Pricing and availability </h3>
                        </div>
                        <br/>

                        <div class="line2"></div>

                        <div class="padding20">

                            <div class="row">
                                <div class="col-md-3">
                                    <span class="green bold" style="text-align: right"> From </span>
                                </div>

                                <div class="col-md-3">
                                    <span class="green bold"> Type </span>
                                </div>

                                <div class="col-md-3">
                                    <span class="green bold"> Rate </span>
                                </div>

                                <div class="col-md-3">
                                    <span class="green bold"> Pax </span>
                                </div>
                            </div>
                            <div class="line2"></div>

                            {{ Form::hidden('ex_id', $excursion_id , array('id' => 'hidden_ex_id') ) }}

                            @foreach($excursion_rate as $excursion_rates)
                                @if($x != $excursion_rates->city_id)

                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php
                                            $x = $excursion_rates->city_id;
                                            $ex_city = City::where('id', '=', $excursion_rates->city_id)->select('city')->first();
                                            echo $ex_city->city;
                                            ?>

                                        </div>

                                        <div class="col-md-3 transport" value="122">

                                            {{--{{ Form::open(array('url' => 'sri-lanka/set_excursion_transport', 'files'=> true, 'id' => 'transport_select_form', 'method' => 'POST', )) }}--}}
                                            {{ Form::hidden('ex_city_id', $x , array('class' => 'hidden_ex_city_id') ) }}
                                            {{ Form::select('transport_type', $transport_type, null, array('class' => 'form-control mySelectBoxClass transport_select', 'id' => 'ex_transport_type_'.$x)) }}
                                            {{--{{ Form::close() }}--}}

                                        </div>

                                        <div class="col-md-3 ex_rate_show" id="city_{{ $x }}">
                                            <?php
                                            $ex_rate = ExcursionRate::where('excursion_id', '=', $excursion_id)
                                                    ->where('excursion_transport_type_id', ExcursionTransportType::where('transport_type', 'Individual')->first()->id)
                                                    ->where('city_id', '=', $x)
                                                    ->select('rate')
                                                    ->first();

                                            echo $ex_rate->rate;
                                            ?>
                                        </div>

                                        <div class="col-md-3">
                                            {{ Form::selectRange('number', 1, 10, null, ['class' => 'form-control mySelectBoxClass pax', 'city_id' => $x]) }}
                                        </div>

                                    </div>

                                    <div class="line2"></div>

                                @endif
                            @endforeach

                            <div class="clearfix"></div>

                        </div>

                        <div class="line2"></div>

                        <br/>
                        <br/>

                    </div>

                    <!-- TAB 4 -->
                    <div id="maps" class="tab-pane fade">
                        <div class="hpadding20">
                            <div id="map-canvas"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">

                <div class="price-box">
                    <div style="background-color: #0099cc !important; padding: 10px; text-align: center"
                         class="price-head">

                        <span style="color: #FFFFFF"
                              class="opensans size18 dark bold"> {{ $excursion->excursion }} </span>
                        <br/>
                        {{ HTML::image('images/smallrating-5.png') }}

                    </div>

                    <div class="line3"></div>

                    <div class="hpadding30 pagecontainer2" style="">
                        <br/>
                        <table class="table table-bordered margbottom20" style="border: none !important;">
                            <tbody>
                            <tr>
                                <td class="bold"> Form</td>
                                <td class="center green bold city" id="excursion_city"></td>
                            </tr>
                            <tr>
                                <td class="bold"> Transport Type</td>
                                <td class="center green bold" id="excursion_transport"></td>
                            </tr>
                            <tr>
                                <td class="bold"> Pax</td>
                                <td class="center green bold" id="excursion_pax"></td>
                            </tr>
                            <tr>
                                <td class="bold"> Rate</td>
                                <td class="center green bold" id="excursion_rate"></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="line3"></div>

                    <div style="background-color: #72bf66 !important; padding: 15px; text-align: right"
                         class="price-head">
                        <span style="color: #FFFFFF; text-align: right !important;" class="opensans size18 dark bold"> Excursion Total &nbsp;&nbsp;:&nbsp;&nbsp; </span>
                        <span class="lred2 bold size18">$ <span class="lred2 bold size18" id="excursion_total"></span> </span>

                        <div class="clearfix"></div>
                    </div>


                </div>

                <br/>

            </div>
        </div>

    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')

        <!-- Javascript -->
        {{ HTML::script('assets/js/js-details.js') }}

        <!-- Googlemap -->
        {{ HTML::script('assets/js/initialize-google-map.js') }}

        <!-- Counter -->
        {{ HTML::script('assets/js/counter.js') }}

        <!-- Carousel-->
        {{ HTML::script('assets/js/initialize-carousel-detailspage.js') }}


        <script type="text/javascript">
            $(function () {

                $('.price-box').hide();

                $('.transport_select').change(function () {
                    var transport_value = $(this).val();
                    var ex_id = $('#hidden_ex_id').val();
                    var hidden_ex_city_id = $(this).prev('input:hidden').val();

                    var formData = new FormData();

                    formData.append('transport_type', transport_value);
                    formData.append('ex_id', ex_id);
                    formData.append('hidden_ex_city_id', hidden_ex_city_id);

                    $.ajax({
                        url: 'http://localhost/travel/public/sri-lanka/set_excursion_transport',
                        method: 'post',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'json',
                        data: formData,
                        success: function (data) {
                            $('#city_' + hidden_ex_city_id).html(data);
                        },
                        error: function () {
                            // alert('error');
                        }
                    });

                });



                $('.pax').change(function () {

                    $('.price-box').show("blind", 500);

                    var price_box_city_id = $(this).attr('city_id');
                    var price_box_pax = $(this).val();
                    var price_box_ex_id = $('#hidden_ex_id').val();
                    var price_box_transport_id = $('#ex_transport_type_' + price_box_city_id).val();

                    var priceData = new FormData();

                    priceData.append('price_box_transport_id', price_box_transport_id);
                    priceData.append('price_box_ex_id', price_box_ex_id);
                    priceData.append('price_box_city_id', price_box_city_id);
                    priceData.append('price_box_pax', price_box_pax);

                    $.ajax({
                        url: 'http://localhost/travel/public/sri-lanka/get_excursion_total',
                        method: 'post',
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'json',
                        data: priceData,
                        success: function (data) {
                            $('#excursion_total').html(data.total_rate);
                            $('#excursion_city').html(data.city);
                            $('#excursion_transport').html(data.transport_type);
                            $('#excursion_pax').html(data.pax);
                            $('#excursion_rate').html(data.ex_rate);
                        },
                        error: function () {
                            // alert('error');
                        }
                    });


                });

            });
        </script>


    @endsection

    </body>
@stop
