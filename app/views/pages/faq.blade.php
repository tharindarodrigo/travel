@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Srilankahotels.travel FAQ">
    <meta name="description" content="Srilankahotels.travel FAQ">
    <title> Sri Lanka Hotels - FAQ </title>

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
                    <li><a href="{{URL::to('/faq')}}"
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
                    <h1> FAQ </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">

                        <p><strong>Where is Sri Lanka located? </strong><br/> The tear-drop shaped island of Sri Lanka
                            is located in the Asian continent, in the Indian Ocean. It is just below the southern tip of
                            India, to the south west of the Bay of Bengal and to the south east of the Arabian Sea. It
                            is separated from India by the Palk Strait, a 50 kilometre stretch of ocean. Sri Lanka lies
                            880 kilometres north of the equator, between 5&deg;55' and 9&deg;55' north latitudes and
                            between 79&deg;42' and 81&deg;52' eastern longitudes. <br/> <br/> <strong><br/> What are Sri
                                Lankan (ETA) Tourist Visa Requirements? </strong><br/> As of the first day of 2012,
                            tourists will need an Electronic Travel Authority (ETA) for a stay of up to 30 days in the
                            country. It is issued online, and original passports or other documents are not required for
                            processing. More information can be found on
                            http://www.travisa.com/SriLanka/Srilanka-eta.htm<br/> <br/> <strong><br/> What are the
                                languages spoken in Sri Lanka?</strong><br/> Sinhalese and Tamil are the most commonly
                            spoken languages in Sri Lanka. In the main cities, English is widely spoken as well. As most
                            hotels aim at catering to foreign tourists, almost all hotel staff will be able to speak
                            English, and many hotels will also have staff members who are able to speak German, French,
                            Russian and other languages. <br/> <br/> <strong><br/> What is the currency used In Sri
                                Lanka?</strong><br/> The currency used in Sri Lanka is the Sri Lankan rupee, and a
                            decimal currency system is used. One Sri Lankan rupee consists of 100 Sri Lanka cents and
                            the currency notes comprise of Rs. 10/-, Rs. 20/-, Rs. 50/- Rs. 100/- , Rs. 500/-, Rs. 1000,
                            Rs. 2000/- and Rs. 5000/- notes. Commonly used coins are one rupee, two rupees, five rupees
                            and ten rupees.<br/> <br/> <strong><br/> What should I buy in Sri Lanka? </strong><br/> Due
                            to the conversion rate between the Sri Lankan rupee and most foreign currencies, tourists
                            are usually able to buy high quality items at a very low rate. Sri Lanka is also an
                            excellent shopping destination for tourists who wish to buy clothes, household items, tea
                            and spices. However, tourists should be aware that many clothes with fake designer labels
                            such as Armani, Gucci, and Tommy Hilfiger are sold on pavement stalls at prices which are a
                            fraction of the real price. It is best to avoid these low quality products that are not the
                            original product, but have been produced by unlicensed manufacturers. Tourists should also
                            take great care when purchasing gems and jewels and make sure that they are buying high
                            quality items.<br/> <br/> It is also worthwhile to purchase items unique to a specific area
                            when travelling out of Colombo. For example, Galle is famous for its traditional hand-made
                            lace, Veveldeniya is famous for its handwoven reed ware such as reed baskets and Ambalagoda
                            is famous for its traditional masks. Other goods that are worth buying are tea, spices,
                            hand-looms, carvings and gems such as moonstones. <br/> <br/> <strong><br/> What credit
                                cards are accepted?<br/> </strong>Reputed credit cards such as Visa and MasterCard are
                            accepted by most hotels and shops.<br/> <br/> <br/> <strong>Where can I purchase duty-free
                                products? </strong><br/> A wide array of handicrafts, jewellery, perfumes, electronic
                            items, and wines &amp; spirits are available at duty-free shops at the transit &amp;
                            departure lounge of the Bandaranaike International Airport. Local or national taxes are not
                            applied on the items sold at these shops. However, only those who possess an entry and
                            departure permit may purchase these goods. <br/> <strong><br/> <br/> What are the prohibited
                                export and import items?</strong><br/> Amongst the prohibited item are ivory, corals,
                            living plants, antiques, reptiles and live animals. A permit is required for precious
                            stones.<br/> <br/> <br/> <strong>What are the best seasons for beaches?</strong><br/>
                            November to April are the best months to visit the South West coast and since the monsoon
                            falls from May to October and December to March, it is best to visit the North West during
                            the months of May to October. There are also 2 inter monsoon periods in SL from March to Mid
                            may and from October to November. <br/> <br/> <br/> <strong>Do I need vaccinations before I
                                come to Sri Lanka?</strong><br/> Travellers are required to have the standard
                            vaccinations in place. Cholera immunization is also suggested. Antimalarial tablets, as
                            prescribed by your doctor, should be started about a week before your planned arrival in the
                            island and continued at least two weeks after your departure from the country. However,
                            malaria is prevalent only in some areas of the country, but precautionary measures are
                            always advised. Other mosquito-borne diseases such as dengue are very common in Sri Lanka so
                            mosquito repellents are always a handy item to have in your luggage. A quite effective
                            natural mosquito repellent, which is widely and easily available from local pharmacies and
                            supermarkets, is citronella oil.<br/> <strong><br/> <br/> What are the telephone/mobile
                                services offered to me in Sri Lanka? </strong><br/> Most major hotels are equipped with
                            telephones that allow direct international dialling facilities, though their rates for local
                            and international calls are relatively high. A cheaper alternative would be to seek the
                            services of a 'communication centre' which can be found almost anywhere in the island. They
                            also offer fax and photocopy services.</p>

                        <p><br/><strong>What transport facilities are available in SL?</strong><br/>There are many modes
                            of transport that tourists could use to get around the island.<br/><br/>Though tour packages
                            usually include transfers from the airport to the hotel, plenty of taxis are available for
                            independent travellers who seek transport to their hotel. Numerous metered taxi services
                            operate in Colombo and other major cities and can be booked by calling their telephone
                            numbers. They may operate cars, vans, or minivans which are generally more reliable and
                            comfortable than trishaws.<br/><br/>However trishaws, or 'tuk tuks' are probably the most
                            convenient way to make short journeys around the island, and can be found all over the
                            country. Tourists should be aware that some trishaw drivers try to trick foreigners with
                            regard to the fare, so it is best to bargain and to decide on the fare before the journey
                            starts. A rough estimate of the cost is around Rs. 50 for the first kilometre and around Rs.
                            30 for every additional kilometre. For tourists who do not like to bargain, several metered
                            taxis are available around the country. These trishaws are tourist friendly and metered to
                            ensure that travellers are aware of the price being paid. Contact details can be found on
                            the Useful Telephone Numbers page<br/><br/>Public buses are probably the cheapest way of
                            getting around the country, but tourists may find travelling by bus highly uncomfortable
                            since buses tend to get overcrowded and make frequent stops. Sri Lanka's railway system also
                            charges low fares, but the downside to train travel include overcrowded carriages, unless a
                            2nd class seat is booked prior to the journey.<br/><br/>However, the most comfortable way of
                            getting around Sri Lanka is probably by using a chauffeur- driven car.
                            <br/><br/><strong><br/>What are the business hours in Sri Lanka? </strong><br/>All
                            government offices and most private sector organisations operate five days of the week, from
                            Monday to Friday. The opening and closing hours differ, but are generally in the range of
                            8.30-9.30am to 4.30-5.30pm. Some private sector organisations work a half-day on Saturday.
                            Banks are open Monday to Friday from 9.00-9.30am to 5.00-5.30pm; some branches of some banks
                            may be open on Saturday too, if only till mid-afternoon. Major post offices are generally
                            open from Monday to Saturday and for longer hours (typically around 7.00am-8.00pm). Almost
                            all shops and banks close on public holidays. Most shops, especially in Colombo, are also
                            closed on Sunday. Major supermarkets in the city, such as Keells and Cargills, have branches
                            all over the country. They are kept open until about 8.00 pm or even later everyday. They
                            close only on certain public holidays. In smaller towns, the shopping hours depend on the
                            shopkeepers; shops may be open or closed depending on the whims and fancies of the owner.
                            <br/><br/><br/><strong>How does the postal service in Sri Lanka work? </strong><br/>Despite
                            being rather cheap, the postal service is not reliable and it is best to register urgent
                            post. When sending airmail letters with stamps, it is best to make sure that they are
                            franked in your presence. All overseas packages should be stamped with a green Customs label
                            stating the contents and their value. <br/><br/>Post offices in the country work from 7.00am
                            to 5.00/6.00pm on Monday-Friday and from 9.00am to 6.00pm on Saturday. Mail is delivered
                            around the country every day except on Sundays and public holidays. The simplest way to mail
                            anything is through your hotel, or you can do it yourself through a postal agency. There are
                            also many reliable domestic and international courier services, including the following:
                            <br/><br/>DHL <br/>130 Glennie Street, Colombo 2 / Tel.: 011 479 8600 <br/><br/>TNT <br/>315
                            Vauxhall Street, Colombo 2 / Tel.: 011 230 8444 <br/><br/>Fed Ex <br/>300 Galle Road,
                            Colombo 3 / Tel.: 011 452 2222 <br/><br/><br/><strong>What is the standard voltage used in
                                Sri Lanka?</strong><br/>Sri Lanka uses 230-240 volts, 50 cycles, alternating current. A
                            large part of the island's electricity is generated through hydro reservoirs so power cuts
                            are witnessed sometimes during long periods of drought although most hotels run on
                            generators at such times. Rural and remote areas may not have access to generators and may
                            therefore have to endure such power cuts. Most power sockets are three-pronged, but adaptors
                            are cheap and readily available from most hardware stores. If you have a laptop computer
                            with you, it is better to bring your own stabiliser as electricity fluctuations are rather
                            common even in the main cities. A laptop plug and adaptor are also additional equipment that
                            you may find handy. <br/><br/><strong><br/> Why is Sri Lanka so special?<br/> </strong>Sri
                            Lanka is a country with a rich and diverse history with over 2,500 years of continuous
                            written history, and with the pre-history of the country dating back to over 125,000 years.
                            Tourist attractions range from ancient Buddhist statues and monasteries, Hindu temples,
                            relics of ancient dynasties and civilizations, wildlife sanctuaries, underwater ecosystems
                            and botanical gardens and parks. With pristine sandy beaches, stunning waterfalls, endless
                            mountain ranges and temperate rainforests, Sri Lanka is truly one of the most beautiful
                            places in the world.</p>


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

