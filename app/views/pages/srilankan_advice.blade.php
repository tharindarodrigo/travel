@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
          content="Sri Lankan Advice,Sri lanka Climate,Sri lanka Customs,Sri lanka Festivals,Sri Lanka Clothing,Sri Lanka Photography,Sri Lanka SportsF">
    <meta name="description"
          content="Visitors to Sri Lanka will be completely fascinated by the unusual climate of the country. It is possible to come across hot and humid tropical weather, cool and misty conditions and dry, parched areas all within the same day.">
    <title> Sri Lankan Advice - Sri Lanka Hotels </title>

    <style type="text/css">
        .tourism {
            width: 250px;;
        }

        h3 {
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
                    <li><a href="{{URL::to('/sri-lanka-advice')}}"
                           class="active"> Sri Lanka Advice </a></li>
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
                    <h1> Sri Lankan Advice </h1>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <!-- LEFT IMG -->
                    <div class="cpdd01 grey2">


                        <h3> Climate </h3>

                        <P>
                            Visitors to Sri Lanka will be completely fascinated by the unusual climate of the country.
                            It is possible to come across hot and humid tropical weather, cool and misty conditions and
                            dry, parched areas all within the same day.

                            Seasonal changes are based solely on the monsoons- the South West Monsoon and the North East
                            Monsoon. The former blows in from the Indian Ocean, bringing with it heavy periods of rain
                            which may last from May to September. This season usually starts with a month of heavy rain
                            followed by periods of shorter showers. At this time of the year the seas are rough and the
                            coastal tides are rather dangerous; swimming in the sea should be strictly avoided during
                            this time. The North East Monsoon blows in from the Bay of Bengal, but does not bring much
                            rain and that too is generally to the north-eastern parts of the island.

                            Thunderstorms are witnessed throughout the country during October and November when the
                            inter-monsoon period is in effect. These short bursts of heavy rain generally take place
                            late in the evenings after rather sunny, warm and humid days and may bring with them a
                            degree of freshness and coolness. The small lakes which have been filled to their brims with
                            this water and the sweet fragrance of damp soil and the myriad flowers littering the roads
                            and valleys are a welcome sight after these thunderstorms. An umbrella is a must for locals
                            or foreigners alike; this can protect you from the lashing rain as well as the scorching sun
                            and searing heat.

                            The warmest temperatures are normally witnessed in the low-lying southern and western
                            coastal regions- with Colombo averaging 27 degrees Celsius (81 degrees Fahrenheit). The sea
                            is a warm and inviting 27 degrees Celsius throughout the year. The temperatures drop
                            noticeably as you move up into the central highlands, and it could get quite chilly towards
                            the night. Kandy, located 305 metres above sea level, records an average temperature of 20
                            degrees Celsius while Nuwara Eliya, at an altitude of 1,890 metres, can reach 16 degrees
                            Celsius.
                        </p>

                        <h3> Customs </h3>

                        <p>
                            As in many parts of the world, a vertical nod of the head means 'yes' (positive) and a
                            horizontal nod means 'no' (negative). However, the famous 'waggle' of the head (a cross
                            between a nod and a shake with the chin pointed outwards) seems to be a feature common to
                            the Indian subcontinent. It can be baffling to foreigners but it usually means a simple
                            'yes' or 'okay'.

                            Never shake hands with a Buddhist monk or Hindu priest. The traditional and courteous way of
                            greeting them is to join your hands as if in prayer and raising them to your forehead. When
                            offering something to a monk, an elderly or other exalted person, offer it with both hands
                            to show that you honour and respect that person. Gifts of money to religious persons should
                            be placed directly in the temple box/till provided for that reason. When seated in the
                            company of a Buddhist monk, try to sit at a lower level than him and never point your toes
                            in his direction which is considered as a mark of disrespect.

                            Most Sri Lankans do not use cutlery unless they are attending a special function at a hotel
                            like venue. They eat directly with their fingers but food is always handled with the right
                            hand. The same theory applies when handing things over to another person; either the right
                            hand or both hands are used.
                        </p>

                        <h3> Festivals </h3>

                        <p>
                            Festivals and the rituals associated with culture play a major role in the lives of Sri
                            Lankans. They are generally colourful gatherings of family and friends and sometimes whole
                            villages gather for events like peraheras (processions), devil-dancing ceremonies and
                            various events held at temples and kovils. Some of these events are even decided on by
                            astrologers based on horoscopes and the movement of heavenly objects. The rich, vibrant and
                            colourful dance heritage of the country is an integral part of the culture.
                        </p>

                        <h3> Clothing </h3>

                        <p>
                            Cottons and light natural fabrics such as linens are ideal for the heat of the lowland
                            areas. Skimpy skirts and brief shorts should not be worn outside tourist areas as these are
                            not considered as respectable. Clad in such garments, you may find yourself attracting
                            unnecessary stares, and women may even find themselves being harassed. While visiting
                            temples, the ideal mode of dress is loose and long cotton skirts or trousers with loose,
                            long-sleeved blouses or long frocks for women, and trousers or traditional sarongs with
                            modest shirts or t-shirts for men. A sun-hat, a good pair of sunglasses, and sandals,
                            slippers or open shoes which are easy to slip on and off are also items that you should have
                            with you.
                        </p>

                        <h3> Safety </h3>

                        <p>
                            Now that the war has ended, Sri Lanka is a safe destination for tourists. Petty crimes are
                            not that frequent and violent crimes against tourists rarely take place. However, it is
                            always wise to practise caution. Always use your common sense when getting around the
                            country. Some points to keep in mind: Never accept lifts from strangers; keep away from dark
                            and deserted places such as beaches at night; never flash valuables or leave them lying
                            around.

                            The security situation in Sri Lanka may have improved but if you plan to travel to the north
                            or the east of the country, always check with the relevant authorities and seek necessary
                            permission; avoid these areas as much as possible. The traffic situation poses one of the
                            most serious safety hazards in the island. Be at a high level of alert when you are on the
                            road, whether in a vehicle or on foot. You have to be extra careful of the buses on the
                            road. Be extremely cautious around bus stops as bus drivers would suddenly cut in front of
                            you without any prior indication if they see passengers ready to board the bus at the stop.
                            Passengers would also run across the road with no regard for traffic on the road when they
                            see their bus arriving. Take extra caution if you are cycling on the road.

                            Take care when swimming in places which are not designated sites for swimming. Many locals
                            as well as the occasional tourist have drowned every year by swimming in dangerous spots in
                            the island. Never swim in places where warnings have been fixed about the dangers of
                            swimming. If swimming off an unfrequented beach or isolated lake, always check with the
                            locals about the possibility of swimming there and make sure someone knows exactly you are.
                            Never swim under the influence of alcohol.
                        </p>

                        <h3> Beggars </h3>

                        <p>
                            A few beggars can be seen on the streets of Colombo. They usually loiter around shopping
                            malls, train stations, temples and at other public venues. Some of these are genuine beggars
                            but a hefty number of them operate as part of a larger begging racket. Such rackets operate
                            mainly in Colombo and even children are involved. Genuine beggars love to receive food of
                            any sort as they can eat it on the spot. If you do not welcome the idea of giving money to
                            beggars, it is better to carry some food such as fruit to be given to them.
                        </p>

                        <h3> Touts and Con Artists </h3>

                        <p>
                            Touts are quite common in most major towns and all tourist sites. You will find that most of
                            the time they are trying to get you to ride in their trishaw, book you into a guest house of
                            their choice or take you to a shop or eatery where they will get a commission for bringing a
                            guest. They can generally be gotten ride of with a firm, but polite refusal. One other thing
                            to keep in mind, sometimes touts may try to discourage you from visiting a certain place or
                            staying at a certain hotel etc. by claiming that it is closed for renovations or not of good
                            quality or standard. They may have an ulterior motive of doing this in order to promote a
                            competitor from whom they get a commission. In such instances it is better to check out the
                            place yourself rather than taking their word for it.

                            Worse than these are the con artists who are found hanging around places such as the Fort
                            area in Colombo and Galle, Galle face Green and Kandy Lake. They will try every trick in the
                            book to make you part with your money. Soliciting donations for charities that do not exist,
                            taking you for a trishaw ride or to visit some 'festival' or the other and charging an
                            absurdly high price, various scams involving free or cheap tea or gems, taking you for a
                            drink and landing you with a massively inflated bill (in connivance with the barman, with
                            whom they will share the 'profit'), requests for you to buy expensive tins of milk powder
                            for their starving or ailing family members or heart-rendering stories connected to the
                            civil war or tsunami catastrophe are some of these common schemes nowadays.
                        </p>

                        <h3> Tipping </h3>

                        <p>
                            A ten percent service charge is generally automatically added to the bill by hotels and
                            restaurants, but since this goes to the establishment, you might add an extra ten percent
                            tip to the bill for the person who serves you. A daily tip is also expected by chauffeurs
                            and guides but there is no fixed amount here. This can range between five and ten dollars
                            per day depending on their skills and helpfulness. Those showing you around sacred places
                            such as temples will expect a small tip in the region of Rs. 50-100. One thing you should
                            keep in mind is never to hand over money to monks, which is considered inappropriate. Place
                            the money in the donation box found at most temple premises. Tipping for other services is
                            not generally expected, unless someone has really gone out of his or her way to help you and
                            you feel that a tip is the least you can do.
                        </p>

                        <h3> Photography </h3>

                        <p>
                            Colour print film is widely available, although checking the sell-by date is always a wise
                            gesture. Also, avoid buying film which may have been sitting in bright sunlight,
                            over-exposure to sunlight may have damaged the film. Only specialist photographic shops and
                            vendors stock slide film and black and white film. It may be difficult to locate these
                            outside Colombo so it is better to carry your own. There are quite a few specialist camera
                            shops in Colombo in case you want to get a camera repaired. Many places in Colombo and the
                            main cities offer one-hour or overnight photo printing services – some of the best places
                            are the photo labs at Cargills at Fort or in the basement of Majestic City, Colombo 4. The
                            heat and humidity can damage the delicate mechanisms of camera and video equipment so keep
                            them in their cases along with the moisture-absorbent silica jell crystals when they are not
                            in use.
                        </p>

                        <h3> Sports </h3>

                        <p>
                            Sri Lankans are generally sports-loving people and they are passionate about some sports
                            such as cricket and rugby. Foreign visitors can also get a taste of this passion as most
                            sports clubs and associations in the country accept foreigners as temporary members. Most
                            major hotels in the country also have swimming pools and tennis courts where visitors can
                            indulge in sporting activities.
                        </P>
                        <br/><br/>

                    </div>
                    <!-- END OF LEFT IMG -->


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

