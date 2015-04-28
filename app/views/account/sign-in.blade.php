<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sign-in Form </title>

    <!-- CSS -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('login/bootstrap/css/bootstrap.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('login/font-awesome/css/font-awesome.min.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('login/css/form-elements.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}
    {{ HTML::style('login/css/style.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}

    <style type="text/css">
        .login_logo {
            width: 205px !important;
        }

        #error {
            font-weight: bold;
            color: #555;
            border-radius: 10px;
            font-family: Tahoma, Geneva, Arial, sans-serif;
            font-size: 11px;
            padding: 10px 36px;
            margin-top: 20px;
            background: #ffecec url('../images/warning.png') no-repeat;
            background-size: 30px 30px;
            border: 1px solid #f5aca6;
        }

    </style>
    <![endif]-->
</head>

<body>

<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                {{ HTML::image('images/site/logo.png', '',  array('class' => 'login_logo')) }}
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1> Sign In Form </h1>

                    <div class="description">
                        <p>
                            This is the place you can register into our site.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 book">
                    {{ HTML::image('login/img/ebook.png', '',  array('class' => 'logo')) }}
                </div>
                <div class="col-sm-5 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3> Sign In </h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-pencil"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="{{ URL::route('account-sign-in-post') }}" method="post"
                              class="">
                            <div class="form-group">
                                <label class="sr-only" for="form-email">Email</label>
                                <input type="text" placeholder="Email..."
                                       class="form-email form-control" id="form-email"
                                       name="log_email"{{ (Input::old('log_email')) ? ' value="' . e(Input::old('log_email'))  . '"' : ''  }}>
                            </div>
                            <div>
                                @if($errors->has('log_email'))
                                    {{ $errors->First('log_email', '<small id=error>:message</small>') }}
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="form-password"> Password </label>
                                <input type="text" placeholder="Password..."
                                       class="form-password form-control" id="form-password"
                                       name="log_password"{{ (Input::old('log_password')) ? ' value="' . e(Input::old('log_password'))  . '"' : ''  }}>
                            </div>
                            <div>
                                @if($errors->has('log_password'))
                                    {{ $errors->First('log_password', '<small id=error>:message</small>') }}
                                @endif
                            </div>

                            <button type="submit" class="btn"> Sign In</button>
                            {{ Form::token() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
{{ HTML::script('login/js/jquery-1.11.1.min.js') }}
{{ HTML::script('login/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('login/js/jquery.backstretch.min.js') }}
{{ HTML::script('login/js/retina-1.1.0.min.js') }}
{{ HTML::script('login/js/scripts.js') }}

<!--[if lt IE 10]>
{{ HTML::script('login/js/placeholder.js') }}
<![endif]-->

</body>

</html>