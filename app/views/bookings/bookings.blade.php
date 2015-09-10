@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us</title>

@endsection

@section('custom_style')
    @yield('styles')
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
                    @yield('bread-crumbs')
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>
    @yield('body-content')

    {{ HTML::script('assets/js/js-about.js') }}

        <!-- Easy Pie Chart  -->
    {{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}
    {{ HTML::script('js/functions/add_clients.js') }}
</body>
<script type="text/javascript">

    $(document).ready(function(){
        var url = 'http://'+window.location.host+'/bookings/get-clients';
        //alert(url);
        sendData(url, null);


    });

    $('#add_client_btn').click(function(){
        var name = $('#name').val();
        var passport_number = $('#passport_number').val();
        var dob = $('#dob').val();
        var gender = $('#gender').val();

        var formData = new FormData();

        formData.append('name', name);
        formData.append('gender', gender);
        formData.append('dob', dob);
        formData.append('passport_number', passport_number);

//        alert(name+' '+passport_number+' '+dob+' '+gender);
        var url = 'http://'+window.location.host+'/bookings/create-client';

        sendData(url,formData);


    });
</script>

@stop