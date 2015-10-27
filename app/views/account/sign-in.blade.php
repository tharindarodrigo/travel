@extends('account.account')

@section('styles')
    <style type="text/css">
        .form-control {
            border-left: none;
            background: none;
        }
    </style>
@endsection

@section('bread-crumbs')
    <li>/</li>
    <li><a href="#" class="active">Sign Up</a></li>
    @endsection

    @section('body-content')
            <!-- CONTENT -->
    <div class="container">


        <!-- CONTENT -->

        <div class="line3"></div>

        <div class="row">
            <br>
            <br>

            {{Form::open(array('url'=>array('account/sign-in')))}}
            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <label for="last_name">Email</label>

                    <div class="form-group">
                        {{Form::text('email', null, array('class'=> 'form-control', 'style: border:none;'))}}
                        {{$errors->first('email', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <label for="last_name">Password</label>

                    <div class="form-group">
                        {{Form::password('password', array('class'=> 'form-control'))}}
                        {{$errors->first('password', '<span class="size12" style="color: red;">:message</span>') }}

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <div class="check-box">
                        <label for="remember">
                            {{Form::checkbox('remember')}} Remember Me
                        </label>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <a href="{{URL::to('account/forgot-password')}}">
                        Forgot Password ?
                    </a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <div class="red">
                        <p><b><em>{{ Session::get('global') }} </em></b></p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-offset-4 col-md-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block ">Sign In</button>
                    </div>
                </div>
            </div>

            {{Form::close()}}

        </div>
    </div>

    <div class="clearfix"></div>
    <br/><br/>
    <!-- END CONTENT -->

@endsection

@section('script')
    <script type="text/javascript">

    </script>
@stop

