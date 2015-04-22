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
        <div class="login-wrap">logpadding
            {{ HTML::image('images/site/logo.png', '',  array('class' => 'login-img')) }} <br/>

            <div class="login-c1">
                <div class="cpadding50">

                    <form action="{{ URL::route('account-create-post') }}" method="POST">

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="First Name"
                                   name="first_name"{{ (Input::old('first_name')) ? ' value="' . e(Input::old('first_name'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if ($errors->has('first_name'))
                                {{ '<br>'.$errors->First('first_name', '<small class=error>:message</small>') }}
                            @endif

                        </div>
                        <br/>

                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Last Name"
                                   name="last_name"{{ (Input::old('last_name')) ? ' value="' . e(Input::old('last_name'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if($errors->has('last_name'))
                                {{ '<br>'.$errors->First('last_name', '<small class=error>:message</small>') }}
                            @endif
                        </div>
                        <br/>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email"
                                   name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if($errors->has('email'))
                                {{ '<br>'.$errors->First('email', '<small class=error>:message</small>') }}
                            @endif
                        </div>

                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                            <input type="text" class="form-control" placeholder="Phone Number"
                                   name="phone"{{ (Input::old('phone')) ? ' value="' . e(Input::old('phone'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if($errors->has('phone'))
                                {{ '<br>'.$errors->First('phone', '<small class=error>:message</small>') }}
                            @endif
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control" placeholder="Address"
                                   name="address"{{ (Input::old('address')) ? ' value="' . e(Input::old('address'))  . '"' : ''  }}>
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password"
                                   name="password"{{ (Input::old('password')) ? ' value="' . e(Input::old('password'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if($errors->has('password'))
                                {{ '<br>'.$errors->First('password', '<small class=error>:message</small>') }}
                            @endif
                        </div>
                        <br>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                            <input type="password" class="form-control" placeholder="Repeat Password"
                                   name="password_conf"{{ (Input::old('password_conf')) ? ' value="' . e(Input::old('password_conf'))  . '"' : ''  }}>
                        </div>
                        <div>
                            @if($errors->has('password_again'))
                                {{ '<br>'.$errors->First('password_again', '<small class=error>:message</small>') }}
                            @endif
                        </div>
                        <br>

                        {{--<div class="g-recaptcha" data-sitekey=""></div>--}}
                        {{----}}
                        {{--<?php--}}
                        {{--require_once('../public/recaptcha/recaptchalib.php');--}}
                        {{--$public_key = "6LeVCwQTAAAAANjhK2U0LgGbAhJHLV6nZ7oOPTuM"; // you got this from the signup page--}}
                        {{--echo recaptcha_get_html($public_key);--}}
                        {{--?>--}}

                        @if((Session::get('global')))
                            <p class="error">{{ Session::get('global') }}</p>
                        @endif
                        <br/>

                        <button type="submit" class="btn btn-primary">Register Now</button>

                        {{ Form::token() }}

                    </form>

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
