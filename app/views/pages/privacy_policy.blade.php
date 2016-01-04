@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="Privacy And Policy srilankahotels.travel,srilankahotels.travel Feedback,srilankahotels.travel Governing Law,srilankahotels.travel The Principles of Data Protection,srilankahotels.travel Information on data protection,srilankahotels.travel Cookies">
    <meta name="description"
          content="Exotic Holidays International (Pvt) Limited is using a secured Web Site for transaction of personal data communicated. We do not capture personal information without your knowledge or your permission. You will only be asked to provide personal information when you are taking advantage of this site's interactive products and services. Your credit card information is only acquired by the secure encrypted Internet payment gateway page of the bank our booking system is linked with. Exotic Holidays does not acquire or store your credit card information.">
    <title> Sri Lanka Hotels - Privacy And Policy </title>

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
                    <li><a href="{{URL::to('/privacy-and-policy')}}"
                           class="active"> Privacy And Policy </a></li>
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
                    <h1> Privacy And Policy </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">

                        <p style="margin-bottom: 0in">Exotic Holidays International (Pvt) Limited is using a secured Web
                            Site for transaction of personal data communicated. We do not capture personal information
                            without your knowledge or your permission. You will only be asked to provide personal
                            information when you are taking advantage of this site's interactive products and services.
                            Your credit card information is only acquired by the secure encrypted Internet payment
                            gateway page of the bank our booking system is linked with. Exotic Holidays does not acquire
                            or store your credit card information.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>Feedback</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">Exotic Holidays is free to use, reproduce, disclose and or
                            distribute the information, ideas, and know-how in your feedback to others without
                            limitation and for any purpose whatsoever.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>Other Terms</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">This Agreement constitutes the entire terms governing your access
                            to dealings with and use of this Web Site. Separate arrangements may attach to products or
                            services you obtain, purchase or use from the site. You can find details of these terms
                            under those particular products or services, or from the service providers.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>Governing Law</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">The laws of the Democratic Socialist Republic of Sri Lanka govern
                            the use of this Web Site and you irrevocably submit to the non-exclusive jurisdiction of the
                            courts of Sri Lanka. In addition, in the event of a violation committed by you, Exotic
                            Holidays reserves the right to bring proceedings against you in the country of your
                            residence.</p>

                        <p style="margin-bottom: 0in"><strong>&nbsp;</strong></p>

                        <p style="margin-bottom: 0in"><strong><br/></strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>The Principles of Data Protection</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">Exotic Holidays takes the protection of your privacy and your
                            personal data very seriously. We would therefore like to explain what data we collect, what
                            we use it for and how we protect your data. These data protection principles do not apply to
                            Web Sites that may be accessed by clicking on hyperlinks on main web pages.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>&nbsp;</strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>General information on data protection and the purpose of
                                data storage:</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>What data do we collect?</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><span
                                    style="text-decoration: underline;">Bookings /Purchases</span></p>

                        <p style="margin-bottom: 0in">&nbsp;Whenever you make a booking or purchase using the Exotic
                            Holidays Web Site, we collect the data that we require to make the booking or sale,
                            particularly your name, telephone number and e-mail address, your residential address
                            ("contact details"), as well as your arrival and departure dates, booking details, etc.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><span style="text-decoration: underline;">Contact</span></p>

                        <p style="margin-bottom: 0in">General questions may be addressed to us using the Contact Us
                            page. In order to be able to process your inquiries, we collect your contact details. This
                            data is not disclosed to third parties or used for purposes other than handling your
                            inquiry.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>Who gets my data?</strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">Whenever you make a booking using Exotic Holidays Web Site, your
                            booking details are passed onto the booking staff to enable the booking to be made. The
                            technical staff members and subcontractors who handle the website may monitor data generated
                            from the website for the sole purpose of ensuring error-free operations. All such staff and
                            subcontractors are bound by a strict confidentiality agreement. Apart from this, your data
                            is not passed on to any third parties. Under no circumstances will the Exotic Holidays Web
                            Site sell or lend out your contact details. In exceptional circumstances, legal regulations,
                            judicial or official orders may require us to hand data over to the relevant authority or
                            court. However, this is only undertaken within the framework of our legal obligations.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>Information on data protection</strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>&nbsp;</strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>How safe is it to transfer data to Exotic Holidays Web
                                Site?</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">All credit card data you provide to Exotic Holidays Web Site is
                            encoded and transmitted using the SSL (Secure Sockets Layer) protocol. This is a
                            tried-and-tested system used by browsers the world over to encrypt data automatically before
                            transmitting it to the intended recipient.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>How secure is my data on the Exotic Holidays Web Site
                                database?</strong></p>

                        <p style="margin-bottom: 0in">We apply Exotic Holidays Web Site's strict safety standards for
                            our database and Internet server in order to provide effective protection against loss,
                            misuse, unauthorised divulgence, alteration and deletion of and unauthorized access to your
                            data.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>Cookies</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>What are cookies?</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">Cookies are small pieces of information that your browser stores
                            on your computer's hard disk. They simplify bookings by automatically calling up frequently
                            used data on sites you have already visited. You can set your computer to not store any
                            cookies on your computer. However, this may prevent you using some of the functions we
                            offer. The basic "search-and-reserve" functions can also be used without cookies.</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in"><strong>&nbsp;</strong></p>

                        <p><strong> </strong></p>

                        <p style="margin-bottom: 0in"><strong>Questions</strong></p>

                        <p style="margin-bottom: 0in">&nbsp;</p>

                        <p style="margin-bottom: 0in">You may ask to see your stored personal data at any time. You also
                            have the right to correct, delete or (in the case of incorrect data) bar such data. Contact
                            details should be amended in the Exotic Holidays Web Site. However, contractual and/or legal
                            regulations, particularly those relating to accounting and payment, may prevent certain data
                            from being deleted.</p>

                        <p>&nbsp;</p>


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

