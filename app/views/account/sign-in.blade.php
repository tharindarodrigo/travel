@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Sign In</title>

@endsection

@section('custom_style')

    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

@endsection

<body>

@section('content')
    <!-- 100% Width & Height container  -->
    <div class="login-fullwidith">

        <!-- Login Wrap  -->
        <div class="login-wrap">
            {{ HTML::image('images/site/logo.png', '',  array('class' => 'login-img')) }}

            <form action="{{ URL::route('account-sign-in-post') }}" method="POST">

                <div class="login-c1">
                    <div class="cpadding50">
                        <input type="email" class="form-control logpadding" placeholder="Email"
                               name="log_email"{{ (Input::old('log_email')) ? ' value="' . e(Input::old('log_email'))  . '"' : ''  }}>
                        @if($errors->has('log_email'))
                            {{ '<br>'.$errors->First('log_email', '<small class=error>:message</small>') }}
                        @endif
                        <br/>
                        <input type="password" class="form-control logpadding" placeholder="Password"
                               name="log_password"{{ (Input::old('log_password')) ? ' value="' . e(Input::old('log_password'))  . '"' : ''  }}>
                        @if($errors->has('log_password'))
                            {{ '<br>'.$errors->First('log_password', '<small class=error>:message</small>') }}
                        @endif
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
                {{ Form::token() }}
            </form>

        </div>
        <!-- End of Login Wrap  -->

    </div>
    <!-- End of Container  -->

@endsection

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

@endsection

</body>

@stop