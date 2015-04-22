@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - About Us</title>

@endsection

@section('content')

    <body>

    <!-- 100% Width & Height container  -->
    <div class="login-fullwidith">

        <!-- Login Wrap  -->
        <div class="login-wrap">
            {{ HTML::image('images/site/logo.png', '',  array('class' => 'login-img')) }} <br/>

            <div class="login-c1">
                <div class="cpadding50">
                    <input type="text" class="form-control logpadding" placeholder="Username">
                    <br/>
                    <input type="text" class="form-control logpadding" placeholder="Password">
                </div>
            </div>
            <div class="login-c2">
                <div class="logmargfix">
                    <div class="chpadding50">
                        <div class="alignbottom">
                            <button class="btn-search4" type="submit" onclick="errorMessage()">Submit</button>
                        </div>
                        <div class="alignbottom2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">Remember
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-c3">
                <div class="left"><a href="#" class="whitelink"><span></span>Website</a></div>
                <div class="right"><a href="#" class="whitelink">Lost password?</a></div>
            </div>
        </div>
        <!-- End of Login Wrap  -->

    </div>
    <!-- End of Container  -->


    @section('script')
        <!-- Javascript  -->
        {{ HTML::script('assets/js/initialize-loginpage.js') }}
        {{ HTML::script('assets/js/jquery.easing.js') }}
        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

        <script>
            function errorMessage() {
                $('.login-wrap').animo({animation: 'tada'});
            }
        </script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {{ HTML::script('dist/js/bootstrap.min.js') }}
    @endsection
    </body>
    