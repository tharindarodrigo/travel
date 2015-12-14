@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel |Sri Lanka Hotels|Sri Lanka Holidays|Hotels in Sri Lanka|Travel & Tous Sri
        Lanka </title>

@endsection

@section('custom_style')

    <!-- Updates -->
    {{ HTML::style('updates/update1/css/style01.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}


    <style type="">
        .logo {
            width: 304px !important;
            height: 92px !important;
        }
    </style>

@endsection

@section('content')

    <body id="top">
    <!-- 100% Width & Height container  -->

    <div class="login-fullwidith">

        <!-- Login Wrap  -->
        <div class="login-wrap2">

            <div class="center">

                {{ HTML::image('images/site/mobile_logo.png', '',  array('class' => 'logo search-logo')) }}
                <br/><br/>

                <span class="opensans size18 caps bold blue">SriLankaHotels.Travel online reservations..</span><br/>
                <span class="opensans size18 grey xsmall"> Your message has been sent. We will contact you shortly! </span>
                <br/><br/>

                {{ HTML::image('updates/update1/img/loading.gif', '',  array('class' => '')) }}
                <br/><br/>

            </div>

        </div>
        <!-- End of Login Wrap  -->

    </div>
    <!-- End of Container  -->

    @endsection

    @section('script')

        <!-- Javascript  -->
        {{ HTML::script('updates/update1/js/initialize-wearesearching.js') }}

        <script>
            function errorMessage() {
                $('.login-wrap').animo({animation: 'tada'});
            }
        </script>

    @endsection

    </body>

@stop

