<style type="text/css">
    .footerbgblack hr {
        margin: 0px;
    }

    .footerbgblack li {
        line-height: 10px !important;
    }

    .footerbgblack {
        font-size: 11px;
    }

    .ftitleblack {
        font-size: 14px;
    }

    .footerbgblack .grey:hover {
        color: #0099cc;
    }

    .footerbgblack h5 {
        color: #999;
        line-height: 3px;
    }

    .ebroucher {
        width: 160px;
    }
</style>


<div class="footerbgblack" style="padding-bottom: 20px;">
    <div class="container">

        <div class="row">

            <div class="col-md-2">
                <?php
                $hotel_type = DB::table('hotel_categories')
                        ->get();
                ?>

                <span class="ftitleblack"> Hotel Accommodations </span>
                <br/><br/>
                <ul class="footerlistblack">
                    @foreach($hotel_type as $hotel_categories)
                        <li>
                            <a href="{{URL::to('/sri-lanka/'.str_replace(' ', '-',$hotel_categories->hotel_category)) }}">{{ $hotel_categories->hotel_category }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End of column 1-->

            <div class="col-md-2">
                <span class="ftitleblack"> Sri Lanka Tours </span>
                <br/><br/>
                <ul class="footerlistblack">
                    <?php
                    $tour_type = DB::table('tours')
                            ->where('val', 1)
                            ->get();
                    ?>
                    @foreach($tour_type as $tours)
                        <li>
                            <a href="{{URL::to('tour/sri-lanka/'.str_replace(' ', '-',$tours->tour_title)) }}">{{ $tours->tour_title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End of column 2-->

            <div class="col-md-2">
                <span class="ftitleblack"> Sri Lanka Excursion </span>
                <br/><br/>
                <ul class="footerlistblack">
                    <?php
                    $excursion_type = DB::table('excursions')
                            ->where('val', 1)
                            ->take(8)
                            ->get();
                    ?>
                    @foreach($excursion_type as $excursion_types)
                        <li>
                            <a href="{{URL::to('excursion/sri-lanka/'.'Day-Excursion/'.str_replace(' ', '-', $excursion_types->excursion))}}">
                                {{ $excursion_types->excursion }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- End of column 3-->

            <div class="col-md-2">
                <span class="ftitleblack"> Information </span>
                <br/><br/>
                <ul class="footerlistblack">
                    <li><a href="{{URL::to('/tourism-in-sri-lanka') }}">Tourism in Sri Lanka</a></li>
                    <li><a href="{{URL::to('/sri-lanka-advice') }}">Sri Lankan Advice</a></li>
                    <li><a href="{{URL::to('/about-sri-lanka') }}">About Sri lanka</a></li>
                    <li><a href="{{URL::to('/faq    ') }}">FAQ</a></li>
                    <li><a href="{{URL::to('/terms-and-conditions   ') }}">Terms & Conditions</a></li>
                    <li><a href="{{URL::to('/privacy-and-policy') }}">Privacy And Policy</a></li>
                    <li><a href="{{URL::to('') }}">Sri Lankan Map</a></li>
                </ul>
            </div>
            <!-- End of column 4-->

            <div class="col-md-2">
                <span class="ftitleblack"> Transport Packages </span>
                <br/><br/>
                <ul class="footerlistblack">
                    <li><a href="{{ URL::to('create-my-trip') }}"> Make My Trip </a></li>
                    <li><a href="{{ URL::to('transport-list') }}"> Predefined Packages </a></li>
                </ul>

                <br/>
                <h5>Contact Us </h5>
                <h5> +94 11 5231246 </h5>
                <h5> info@srilankahotels.travel</h5>
            </div>
            <!-- End of column 5-->

            <div class="col-md-2 grey">
                <span class="ftitleblack">Newsletter</span>
                <br/><br/>

                <div class="relative">
                    <input type="email" class="form-control fccustom2black" id="exampleInputEmail1"
                           placeholder="Enter email">
                    <button type="submit" class="btn btn-default btncustom">Submit<img src="images/arrow.png" alt=""/>
                    </button>
                </div>
                <br/><br/>
                <span class="ftitleblack">Customer support</span><br/>
                <span style="font-size: 20px" class="pnr"> +94 11 5231246</span><br/>
                <span class="grey"> info@srilankahotels.travel </span>

                <br/><br/>
                <a href="{{URL::to('/ebrocher-download') }}">
                    {{ HTML::image('images/ebroucher.jpg', '', array('class' => 'ebroucher')) }}
                </a>
            </div>
            <!-- End of column 6-->

        </div>
    </div>
</div>

<div class="footerbg3black" style="padding-top: 0px">

    <div class="container">
        <br/>

        <div class="col-md-4">

            <a href="{{URL::to('/tdl-download') }}">
                <div class="col-md-4">
                    {{ HTML::image('images/Tourism.jpg', '', array('class' => '')) }}
                </div>

                <div class="col-md-8">
                    <h4 class="grey" style="font-family: '"> Tourist Board registration No : TS/TA/1164 </h4>
                </div>
            </a>

        </div>

        <div class="col-md-5" style="padding-top: 20px">
            <div class="container center grey">
                <a href="{{URL::to('/')}}">Home</a> |
                <a href="{{URL::to('/about')}}">About Us</a> |
                <a href="contact.php"> Hot Deals </a> |
                <a href="{{URL::to('/contact')}}">Contact Us</a>
                <a href="#top" class="gotop scroll">{{ HTML::image('images/spacer.png', '', array('class' => '')) }}</a>
            </div>
        </div>

        <div class="col-md-3">
            <span>
                {{ HTML::image('images/cards1.jpg', '', array('class' => '')) }}
            </span>

            <span>
                {{ HTML::image('images/cards2.jpg', '', array('class' => '')) }}
            </span>

        </div>

    </div>

</div>
