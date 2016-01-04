@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="srilankahotels.travel Terms And Conditions">
    <meta name="description"
          content="These terms and conditions, as may be amended from time to time, apply to all our services directly or indirectly (through distributors) made available online, through any mobile device, by email or by telephone. By accessing, browsing and using our website or any of our applications through whatever platform">
    <title> srilankahotels.travel - Terms And Conditions </title>

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
                    <li><a href="{{URL::to('/terms-and-conditions')}}"
                           class="active"> Terms And Conditions </a></li>
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
                    <h1> Terms & Conditions </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">

                        <p>These terms and conditions, as may be amended from time to time, apply to all our services
                            directly or indirectly (through distributors) made available online, through any mobile
                            device, by email or by telephone. By accessing, browsing and using our website or any of our
                            applications through whatever platform (hereafter collectively referred to as the "website")
                            and/or by completing a reservation, you acknowledge and agree to have read, understood and
                            agreed to the terms and conditions set out below (including the privacy statement).</p>

                        <p>These pages, the content and infrastructure of these pages, and the online hotel reservation
                            service provided on these pages and through the website (the "service") are owned, operated
                            and provided by Exotic Holidays International (PVT) Ltd. ("srilankahotels.travel", "us",
                            "we" or "our") and are provided for your personal, non-commercial use only, subject to the
                            terms and conditions set out below.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>1. Scope of our Service</strong></span></p>


                        <p>Through the website we (Srilankahotels.travel and its affiliate (distribution) partners)
                            provide an online platform through which hotels (including all types of temporary
                            accommodation) can advertise their rooms for reservation, and through which visitors to the
                            website can make such reservations. By making a reservation through Srilankahotels.travel,
                            you enter into a direct (legally binding) contractual relationship with the hotel at which
                            you book. From the point at which you make your reservation, we act solely as an
                            intermediary between you and the hotel, transmitting the details of your reservation to the
                            relevant hotel and sending you a confirmation email for and on behalf of the hotel.</p>

                        <p>When rendering our services, the information that we disclose is based on the information
                            provided to us by the hotels. As such, the hotels are given access to an extranet through
                            which they are fully responsible for updating all rates, availability and other information
                            which is displayed on our website. Although we will use reasonable skill and care in
                            performing our services we will not verify if, and cannot guarantee that, all information is
                            accurate, complete or correct, nor can we be held responsible for any errors (including
                            manifest and typographical errors), any interruptions (whether due to any (temporary and/or
                            partial) breakdown, repair, upgrade or maintenance of our website or otherwise), inaccurate,
                            misleading or untrue information or non-delivery of information. Each hotel remains
                            responsible at all times for the accuracy, completeness and correctness of the (descriptive)
                            information (including the rates and availability) displayed on our website. Our website
                            does not constitute and should not be regarded as a recommendation or endorsement of the
                            quality, service level or rating of any hotel made available.</p>

                        <p>Our services are made available for personal and non-commercial use only. Therefore, you are
                            not allowed to re-sell, deep-link, use, copy, monitor (e.g. spider, scrape), display,
                            download or reproduce any content or information, software, products or services available
                            on our website for any commercial or competitive activity or purpose.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: large;"><strong><span
                                            style="font-size: x-large;">2. Best Price</span></strong></span></p>


                        <p>The prices on our site are highly competitive. All prices on the Srilankahotels.travel
                            website are per room for your entire stay and are displayed excluding VAT and all other
                            taxes (subject to change of such taxes),will display separately at the end of the booking
                            confirmation.</p>

                        <p>Sometimes cheaper rates are available at our website for a specific stay at a hotel, however,
                            these rates made by hotels may carry special restrictions and conditions, for example in
                            respect to cancellation and refund. Please check the room and rate details thoroughly for
                            any such conditions prior to making your reservation.</p>

                        <p>In the event of a cross out rate, we look at current prices (to be) charged by the hotel in
                            the 30 day window around your requested check in date - of all the prices within the window
                            we take the third highest price offered. To make a fair comparison, we always use the same
                            booking conditions (meal plan, cancellation policy and room type). This means that you get
                            the same room for a lower price compared to other check in dates at the same time of
                            year.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>3. Privacy</strong></span></p>


                        <p>Srilankahotels.travel uses high ethical standards and respects your privacy. Save for
                            disclosures required by law in any relevant jurisdiction and the disclosure of your name,
                            email address and your credit card details for completing your booking with the relevant
                            hotel of your choice, we will not disclose your personal information to third parties
                            without your consent. However, we reserve the right to disclose your personal information to
                            our affiliated (group) companies (in and outside the European Union), including our and our
                            affiliated (group) companies' employees and our trusted agents and representatives who have
                            access to this information with our permission and who need to know or have access to this
                            information to perform our service (including customer services and internal
                            (audit/compliance) investigation) to and for the benefit of you. Please have a look at our
                            <span style="text-decoration: underline;">privacy policy</span> for further information.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>4. Credit card</strong></span></p>


                        <p>Hotels require credit card details in order to guarantee your reservation. As such, we will
                            send your credit card information directly to the bank &amp; you will be charged the total
                            amount your booking is made and we may verify (i.e. pre-authorise) your credit card as well.
                            In order to safeguard and encrypt your credit card information when in transit to us, we use
                            the "Secure Socket Layer (SSL)" technology for our services.</p>

                        <p>For certain rates or special offers, please note that your credit card may be pre-authorised
                            or charged (sometimes without any option for refund) upon reservation and confirmation of
                            the booking. Please check the room details thoroughly for any such conditions prior to
                            making your reservation.</p>

                        <p>In the event of credit card fraud or unauthorized use of your credit card by third parties,
                            you should contact your bank or card issuer immediately upon becoming aware of such
                            unauthorized use. If you suspect an unauthorized or fraudulent booking was made via Agoda,
                            please contact our Customer Service team immediately.</p>

                        <p>In order to make a booking you must be over 18 years old (or the age of majority in those
                            countries and territories where it is higher than 18) and have the full legal capacity to
                            make the transaction (or have the authorization from your legal guardian). You undertake
                            that the credit or debit card you are using is your own and that there are sufficient funds
                            to cover the cost of the transaction. You accept financial responsibility for all
                            transactions made under your name or account.</p>

                        <p>You undertake that the details you provide us with in making a booking are fully correct.
                            Agoda reserves the right not to accept certain credit cards. Agoda may add or remove other
                            payment methods at its discretion.</p>

                        <p>We have stringent fraud detection and prevention mechanisms in place. In certain cases, we
                            may require additional information or verifications to validate and confirm the booking, as
                            explained in more detail on the Site. Reservations are not confirmed until you have received
                            a confirmation mail with a voucher and it is possible that a Hotel could become fully booked
                            during the fraud check, in which case the reservation will no longer be available. Agoda can
                            never be held liable in such cases. Additional information submitted will be treated in line
                            with strict industry standards to protect privacy, using encryption for transmission and
                            specialized agents for verification. If you choose not to submit the additional information,
                            the booking will not be completed and fully cancelled.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>5. Cancellation</strong></span></p>


                        <p>By making a reservation with a hotel, you accept and agree to the relevant cancellation and
                            no-show policy of that hotel, and to any additional (delivery) terms and conditions of the
                            hotel that may apply to your reservation or during your stay, including for services
                            rendered and/or products offered by the hotel (the delivery terms and conditions of a hotel
                            can be obtained with the relevant hotel). The general cancellation and no-show policy of
                            each hotel is made available on our website at the hotel information pages, during the
                            reservation procedure and in the confirmation email. Please note that certain rates or
                            special offers are not eligible for cancellation or change. Please check the room details
                            thoroughly for any such conditions prior to making your reservation.</p>

                        <p>If you wish to review, adjust or cancel your reservation, please revert to the confirmation
                            email and follow the instructions therein. Please note that you may be charged for your
                            cancellation in accordance with the hotel&rsquo;s cancellation and no-show policy. We
                            recommend that you read the cancellation and no-show policy of the hotel carefully prior to
                            making your reservation.</p>

                        <p>&nbsp;</p>

                        <p><strong><span style="text-decoration: underline;">Default Cancellation Policy</span><span
                                        style="text-decoration: underline;">&nbsp;(Hotel / Tour Package / Transportation)</span></strong>
                        </p>
                        <ul>
                            <li>Before 14 days no cancellation.</li>
                            <li>Between 7 - 14 days 50% cancellation of the total invoice value.</li>
                            <li>Less than 7 days&nbsp;100 % cancellation of the total invoice value.</li>
                            <li>No shows &amp; early departures 100% cancellation of the total invoice value.</li>
                        </ul>
                        <p>&nbsp;</p>

                        <p><strong><span style="text-decoration: underline;">Refund</span></strong></p>

                        <p>If the client wants to cancel the booking before falling in to the cancelation&nbsp;period
                            &nbsp;&nbsp;he / she will be charged 4% of the total booking as a bank &amp; document
                            charges</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>6. Further correspondence</strong></span></p>


                        <p>By completing a booking, you agree to receive (i) an email which we may send you shortly
                            prior to your arrival date, giving you information on your destination and providing you
                            with certain information and offers (including third party offers to the extent that you
                            have actively opted in for this information) relevant to your booking and destination, and
                            (ii) an email which we may send to you promptly after your stay at the hotel inviting you to
                            complete our guest review form. Other than the email correspondence confirming your booking,
                            relevant booking modifications or cancellation emails, including reminder emails in
                            instances where you have not finalised a booking, communications initiated from us or the
                            hotel regarding your booking, guest review invitations, and the emails for which you may
                            have actively opted in, we shall not send you any further (solicited or unsolicited)
                            notices, emails or correspondence, unless you specifically agree otherwise.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>7.&nbsp;Ranking and Guest reviews</strong></span>
                        </p>


                        <p>The default setting of the ranking of hotels on our website is 'Recommended' (or any similar
                            wording) (the "Default Ranking"). For your convenience we also offer other ways to rank the
                            hotel. Please note that the Default Ranking is created through a fully automatic ranking
                            system (algorithm) and based on multiple criteria.</p>

                        <p>The completed guest review may be (a) uploaded onto the relevant hotel&rsquo;s information
                            page on our website for the sole purpose of informing (future) customers of your opinion of
                            the service (level) and quality of the hotel, and (b) (wholly or partly) used and placed by
                            Srilankahotels.travel at its sole discretion (e.g. for marketing, promotion or improvement
                            of our service) on our website or such social media platforms, newsletters, special
                            promotions, apps or other channels owned, hosted, used or controlled by
                            Srilankahotels.travel. We reserve the right to adjust, refuse or remove reviews at our sole
                            discretion. The guest review form should be regarded as a survey and does not include any
                            (further commercial) offers, invitations or incentives whatsoever.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>8. Disclaimer</strong></span></p>


                        <p>Subject to the limitations set out in these terms and conditions and to the extent permitted
                            by law, we shall only be liable for direct damages actually suffered, paid or incurred by
                            you due to an attributable shortcoming of our obligations in respect to our services, up to
                            an aggregate amount of the aggregate cost of your reservation as set out in the confirmation
                            email (whether for one event or series of connected events).</p>

                        <p>However and to the extent permitted by law, neither we nor any of our officers, directors,
                            employees, representatives, subsidiaries, affiliated companies, distributors, affiliate
                            (distribution) partners, licensees, agents or others involved in creating, sponsoring,
                            promoting, or otherwise making available the site and its contents shall be liable for (i)
                            any punitive, special, indirect or consequential loss or damages, any loss of production,
                            loss of profit, loss of revenue, loss of contract, loss of or damage to goodwill or
                            reputation, loss of claim, (ii) any inaccuracy relating to the (descriptive) information
                            (including rates, availability and ratings) of the hotel as made available on our website,
                            (iii) the services rendered or the products offered by the hotel, (iv) any (direct,
                            indirect, consequential or punitive) damages, losses or costs suffered, incurred or paid by
                            you, pursuant to, arising out of or in connection with the use, inability to use or delay of
                            our website, or (v) for any (personal) injury, death, property damage, or other (direct,
                            indirect, special, consequential or punitive) damages, losses or costs suffered, incurred or
                            paid by you, whether due to (legal) acts, errors, breaches, (gross) negligence, willful
                            misconduct, omissions, non-performance, misrepresentations, tort or strict liability by or
                            (wholly or partly) attributable to the hotel (its employees, directors, officers, agents,
                            representatives or affiliated companies), including any (partial) cancellation, overbooking,
                            strike, force majeure or any other event beyond our control.</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p><span style="font-size: x-large;"><strong>9. About Srilankahotels.travel</strong></span></p>


                        <p>All of our services are rendered by Srilankahotels.travel, which is subsidy of Exotic
                            Holidays International private limited liability company, incorporated under the laws of the
                            Sri Lankans and having its offices at No 10 Initiume Road,Dehiwala,Colombo,Sri Lanka and
                            registered with the trade register of the Chamber of Commerce in Srilanka Tourist Board
                            &nbsp;under registration number<strong> </strong><strong>&nbsp;TS/TA/1164</strong>. Our VAT
                            registration number is <strong>1146350657000</strong></p>

                        <p>&nbsp;nbsp;</p>


                        <br/><br/>

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

