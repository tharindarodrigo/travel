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

    {{--my styles--}}
    {{ HTML::style('css/my_style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

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

        .smile_img {
            width: 35px;
            height: 35px;
        }

        .book_img_excursin {
            width: 70px;
            height: 70px;
            display: inline;
        }

        .book_img_rate {
            display: inline;
        }

        .ex_summary p, li {
            color: #999 !important;
        }
    </style>

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
                    <li><a href="{{URL::to('excursion/sri-lanka/'.Request::segment(3).'/'.Request::segment(4) )}}"
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

            <!-- SLIDER -->

            <div class="col-md-8 details-slider">

                <div id="c-carousel">
                    <div id="wrapper">
                        <div id="inner">
                            <div id="caroufredsel_wrapper2">
                                <div id="carousel">
                                    @foreach ($path as $img_path)
                                        <?php $img_name = basename($img_path); ?>
                                        {{ HTML::image('images/excursion_images/excursion_types/'.$img_name, '', array('class' => 'slider_img_1')) }}
                                    @endforeach
                                </div>
                            </div>
                            <div id="pager-wrapper">
                                <div id="pager">
                                    @foreach ($path as $img_path)
                                        <?php $img_name = basename($img_path); ?>
                                        {{ HTML::image('images/excursion_images/excursion_types/'.$img_name, '', array('class' => 'slider_img_1')) }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button id="prev_btn2" class="prev2">
                            {{ HTML::image('images/spacer.png', '', array('class' => 'slider_img_2')) }}
                        </button>
                        <button id="next_btn2" class="next2">
                            {{ HTML::image('images/spacer.png', '', array('class' => 'slider_img_2')) }}
                        </button>

                    </div>
                </div>
                <!-- /carousel -->

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
                    {{ HTML::image('images/site/smile.png', '', array('class'=>'smile_img')) }}
                    18 reviews
                </div>
                <div class="col-md-6 bordertype3">
                    <a href="#" class="grey">+Add review</a>
                </div>
                <div class="clearfix"></div>
                <br/>

                <div class="hpadding20">
                    <a href="#" class="booknow margtop20 btnmarg">Book now</a>
                    <br/>
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
                    <div id="summary" class="ex_summary tab-pane fade">
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
                                            {{ Form::select('transport_type', $transport_type, null, array('class' => 'form-control transport_select', 'id' => 'ex_transport_type_'.$x)) }}
                                            {{--{{ Form::close() }}--}}

                                        </div>

                                        <div class="col-md-3 ex_rate_show" id="city_{{ $x }}">
                                            <?php
                                            $ex_rate = ExcursionRate::where('excursion_id', '=', $excursion_id)
                                                    ->where('excursion_transport_type_id', ExcursionTransportType::where('transport_type', 'Individual')->first()->id)
                                                    ->where('city_id', '=', $x)
                                                    ->select('rate')
                                                    ->first();

                                            echo ($ex_rate->rate * Session::get('currency_rate'));
                                            ?>
                                        </div>

                                        <div class="col-md-3">
                                            {{ Form::selectRange('number', 0, 10, null, ['class' => 'form-control pax', 'city_id' => $x]) }}
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

                <div class="pagecontainer2 paymentbox grey price-box">
                    <div class="padding30">
                        <?php
                        $directory = 'public/images/excursion_images/excursion_types/';
                        $images = glob($directory . $excursion->id . "_*");
                        $img_path = array_shift($images);
                        $img_name = basename($img_path);
                        ?>
                        <span>
                        {{ HTML::image('images/excursion_images/excursion_types/'.$img_name, '', array('class' => 'book_img_excursin')) }}
                            <h4 style="display: inline"
                                class="opensans size18 dark bold">{{ $excursion->excursion }}
                            </h4>
                            {{ HTML::image('images/smallrating-5.png', '', array('class' => 'book_img_rate'))  }}
                        </span>
                    </div>
                    <div class="line3"></div>

                    <div class="hpadding30 margtop30">
                        <table class="table table-bordered margbottom20">
                            <tbody>
                            <tr>
                                <td class=""> Form</td>
                                <td class="center green bold city" id="excursion_city"></td>
                            </tr>
                            <tr>
                                <td class=""> Transport Type</td>
                                <td class="center green bold" id="excursion_transport"></td>
                            </tr>
                            <tr>
                                <td class=""> Pax</td>
                                <td class="center green bold" id="excursion_pax"></td>
                            </tr>
                            <tr>
                                <td class=""> Rate</td>
                                <td class="center green bold" id="excursion_rate"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="container">
                        <div class="size18">
                            <span class="opensans">Please Select Date</span>

                            <input type="text" name="ex_check_out_date"
                                   class="form-control mySelectCalendar chk_out"
                                   id="datepicker"
                                   value=""/>
                        </div>
                    </div>

                    <br/>

                    <div class="">
                        <span class="left size18 green"
                              style="padding-left: 20px;">Excursion Total &nbsp;&nbsp;&nbsp; :</span>
                        <span style="margin-right: 50px;" id="excursion_rate_total"
                              class="right green bold size18"></span>

                        <br/>

                        <button type="button" id="excursion_add_to_cart"
                                class="excursion_add_car_btn bluebtn margtop20 right"
                                style="margin-right: 20px;">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            Add To Cart
                        </button>

                        <div class="clearfix"></div>
                        <br/>
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

        <!-- Custom js -->
        {{ HTML::script('js/toastr.js') }}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}

        <script type="text/javascript">
            $(function () {
                toastr.options.positionClass = 'toast-bottom-right';

                $('.price-box').hide();

                $('.transport_select').change(function () {
                    $('.price-box').hide();
                    $('.pax').val(0);
                    var transport_value = $(this).val();
                    var ex_id = $('#hidden_ex_id').val();
                    var hidden_ex_city_id = $(this).prev('input:hidden').val();

                    var formData = new FormData();

                    formData.append('transport_type', transport_value);
                    formData.append('ex_id', ex_id);
                    formData.append('hidden_ex_city_id', hidden_ex_city_id);

                    $.ajax({
                        url: 'http://' + window.location.host + '/sri-lanka/set_excursion_transport',
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
                        url: 'http://' + window.location.host + '/sri-lanka/get_excursion_total',
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
                            $('#excursion_rate_total').html(data.total_rate);

                            $('.excursion_add_car_btn').click(function () {

                                var excursion = $('#hidden_ex_id').val();
                                var excursion_city = data.city;
                                var excursion_transport = data.transport_type;
                                var excursion_pax = data.pax;
                                var excursion_rate = data.ex_rate;
                                var excursion_total = data.total_rate;
                                var excursion_date = $('#datepicker').datepicker({dateFormat: 'dd-mm-yy'}).val();

                                if (excursion_date != '') {

                                    var ex_url = 'http://' + window.location.host + '/sri-lanka/excursion_add_to_cart';

                                    var ex_formData = new FormData();

                                    ex_formData.append('excursion_city', excursion_city);
                                    ex_formData.append('excursion_transport', excursion_transport);
                                    ex_formData.append('excursion_pax', excursion_pax);
                                    ex_formData.append('excursion_rate', excursion_rate);
                                    ex_formData.append('excursion_total', excursion_total);
                                    ex_formData.append('excursion', excursion);
                                    ex_formData.append('excursion_date', excursion_date);
                                    ex_formData.append('excursion_transport_type', price_box_transport_id);

                                    $.ajax({
                                        url: ex_url,
                                        method: 'post',
                                        processData: false,
                                        contentType: false,
                                        cache: false,
                                        dataType: 'json',
                                        data: ex_formData,
                                        success: function (data) {
                                            $('.price-box').hide();

                                            toastr.success('Successfully Added To The Cart...!!');

                                            $('.pax').val(0);
                                            $('.transport_select').val(1);
                                        },

                                        error: function () {
                                            //alert('There was an error signing In');
                                        }
                                    });

                                } else {
                                    toastr.warning('Please Select a Data...!!');
                                }

                            });

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
