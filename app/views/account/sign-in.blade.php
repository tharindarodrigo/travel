@extends('layout.master')

@section('content')
    <div class="navbar-wrapper2 navbar-fixed-top">

        @include('layout.navbar')

    </div>
    <div class="login-fullwidith">

        <!-- Login Wrap  -->
        <div class="login-wrap">
            {{Form::open(array('url'=>array('account/sign-in')))}}
            <div class="login-c1">
                <div class="cpadding50">
                    {{Form::text('email', null, array('class'=> 'form-control logpadding', 'placeholder'=>'email'))}}
                    {{$errors->first('email', '<span class="size12" style="color: red;">:message</span>') }}
                    <br/>
                    {{Form::password('password', array('class'=> 'form-control logpadding', 'placeholder'=>'password'))}}
                    {{$errors->first('password', '<span class="size12" style="color: red;">:message</span>') }}


                    <span class="size12" style="color: red;">{{ Session::get('global') }}</span>

                </div>
            </div>
            <div class="login-c2">
                <div class="logmargfix">
                    <div class="chpadding50">
                        <div class="alignbottom">
                            <button type="submit" class="btn-search4">Sign In</button>
                        </div>
                        <div class="alignbottom2">
                            <div class="checkbox">
                                <label>
                                    {{Form::checkbox('remember')}} Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-c3">
                <div class="left"><a href="{{URL::to('/')}}" class="whitelink"><span></span>Website</a></div>
                <div class="right"><a class="whitelink" href="{{URL::to('account/forgot-password')}}">
                        Forgot Password ?
                    </a></div>
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection

@section('script')
    {{HTML::script("assets/js/initialize-loginpage.js")}}
    {{HTML::script("assets/js/jquery.easing.js")}}
    <script type="text/javascript">
        function errorMessage() {
            $('.login-wrap').animo({
                animateRotate: 'tada'
            });
        }
    </script>

@endsection
