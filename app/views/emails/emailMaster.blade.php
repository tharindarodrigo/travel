<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<!-- Optional theme -->--}}
    {{--{{HTML::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css")}}--}}
    {{--{{HTML::style("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css")}}--}}

    <style type="text/css">
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">

        <div style="">
            <div style="width:200px; padding-left: 100px;" ></div>
            <div>
                <div>
                    <div style="float: left;">
                        {{HTML::image('images/site/ehilogo2.png',null,array('height'=>'100%'))}}
                    </div>
                    <div style="">
                        <h5 style="text-align: right"><strong>Date:</strong> {{date('Y-m-d')}}</h5>
                        <h5 style="text-align: right"><strong>Time:</strong> {{date('H:i')}}</h5>

                    </div>
                    <hr/>

                    @yield('email-content')


                </div>

                {{--Footer--}}
                <div style="text-align: center; background: #00415d; padding: 20px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;" >
                    <div style="text-align: center; color:#AAAAAA">
                      <a href="#">SriLankaHotels.travel</a>
                      <a href="#">Contact</a>
                      <a href="#">Link</a>
                    </div>
                    <p></p>

                    <p style="text-align: center"><strong>Email: info@srilankahotels.travel</strong></p>
                    <p style="text-align: center"><strong>Fax: 011 4 789 789 | Tel: 011 4 123 123</strong></p>
                </div>
            </div>
        </div>

    </div>
    </div>

{{--{{HTML::script("http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js")}}--}}
{{--<!-- Latest compiled and minified JavaScript -->--}}
{{--{{HTML::script("http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js")}}--}}
</body>
</html>