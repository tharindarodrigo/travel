@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us</title>

@endsection

@section('content')

    <body id="top" class="thebg">

    <!-- navbar -->
    <div class="navbar-wrapper2 navbar-fixed-top">

        @include('layout.navbar')

    </div>
    <!-- / navbar -->

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li>/</li>
                    <li><a href="{{URL::route('index')}}" class="active"> Home </a></li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <div class="container mt25 offset-0">

            <!-- CONTENT -->
            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="hpadding50c">
                    @if(Session::has('global'))
                        <h4>{{ Session::get('global') }} </h4>
                    @endif
                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <h2 style="font-size: 30px; color: #72bf66; text-align: center" ><i class="fa fa-fa fa-check"></i> successfully completed  </h2>

                </div>


                <div class="clearfix"></div>
                <br/><br/>
            </div>
            <!-- END CONTENT -->


        </div>


    </div>
    <!-- END OF CONTENT -->

@endsection


</body>

@stop