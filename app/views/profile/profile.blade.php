@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us</title>

@endsection

@section('custom_style')
    {{--    {{HTML::style('https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css')}}--}}
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
    <div class="container">
        <div class="container mt25 offset-0">

            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="padding30 grey">
                    <span class="size16px bold dark left">My Details </span>

                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="row">
                        <div class="col-md-6">


                            {{Form::model(Auth::user())}}
                            <div class="form-group">
                                <label for="">Email</label>
                                {{Form::text('email',null,array('class'=>'form-control'))}}
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                {{Form::text('first_name',null,array('class'=>'form-control'))}}
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                {{Form::text('last_name',null,array('class'=>'form-control'))}}
                            </div>
                            <hr>
                            <h4>Change Password</h4>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                {{Form::password('new_password',array('class'=>'form-control'))}}
                            </div>

                            <div class="form-group">
                                <label for="password_again">Password Again</label>
                                {{Form::password('password_again',array('class'=>'form-control'))}}
                            </div>
                            <div class="form-group">

                                {{Form::submit('Update', array('class'=>'btn btn-primary'))}}
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    @if(Entrust::hasRole('Agent'))
    @include('profile._partials.agent')
    @endif


    {{ HTML::script('assets/js/js-about.js') }}

            <!-- Easy Pie Chart  -->
    {{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}
    {{ HTML::script('js/functions/add_clients.js') }}
    </body>

@endsection

@section('script')

@stop