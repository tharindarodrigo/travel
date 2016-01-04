@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Srilankahotels.travel,Srilankahotels.travel Contact Us,Sri lanka Hotels,Sri lanka Tours,Sri lanka Excursions">
    <meta name="description" content="Srilankahotels.travel,Srilankahotels.travel Contact Us,Sri lanka Hotels,Sri lanka Tours,Sri lanka Excursions,Online Hotel Bookings,Online Transportation Bookings,Online Excursion Bookings">
    <title> Srilankahotels.travel - Contact Us </title>

    <style type="text/css">

    </style>

@endsection

@section('content')

    <body id="top" class="thebg">

    <!-- navbar -->
    @include('layout.navbar')
    <!-- / navbar -->


    <div id="dajy" class="mtslide sliderbg fixed cstyle11">
        <div id="map-canvas2"></div>
    </div>

    <!-- WRAP -->
    <div class="wrap cstyle03">

        <div class="container mt-200 z-index100">
            <div class="row">
                <div class="col-md-12">
                    <div class="bs-example bs-example-tabs cstyle04">

                        <div class="tab-content">


                            <form method="POST" action="{{ URL::route('post-contact') }}">
                                <div class="col-md-4">
                                    <span class="opensans size24 slim">Contact</span>

                                    <input type="text" placeholder="Name" class="form-control logpadding margtop10"
                                           name="name"{{ (Input::old('name')) ? ' value="' . e(Input::old('name'))  . '"' : ''  }}>
                                    @if($errors->has('name'))
                                        {{ '<br>'.$errors->First('name', '<small class=error>:message</small>') }}
                                    @endif

                                    <input type="text" placeholder="E-mail" class="form-control logpadding margtop20"
                                           name="email"{{ (Input::old('email')) ? ' value="' . e(Input::old('email'))  . '"' : ''  }}>
                                    @if($errors->has('email'))
                                        {{ '<br>'.$errors->First('email', '<small class=error>:message</small>') }}
                                    @endif

                                    <input type="text" placeholder="Phone" class="form-control logpadding margtop20"
                                           name="phone"{{ (Input::old('phone')) ? ' value="' . e(Input::old('phone'))  . '"' : ''  }}>
                                    @if($errors->has('phone'))
                                        {{ '<br>'.$errors->First('phone', '<small class=error>:message</small>') }}
                                    @endif

                                </div>

                                <div class="col-md-4">
                                <textarea rows="9" class="form-control margtop10"
                                          name="comments"{{ (Input::old('comments')) ? ' value="' . e(Input::old('comments'))  . '"' : ''  }}>
                                </textarea>
                                    @if($errors->has('comments'))
                                        {{ '<br>'.$errors->First('comments', '<small class=error>:message</small>') }}
                                    @endif
                                </div>

                                <div class="col-md-4 opensans grey">

                                    {{--<div class="g-recaptcha" data-sitekey=""></div>--}}
                                    <?php
                                    require_once(public_path().'/recaptcha/recaptchalib.php');
                                    $public_key = "6LeqigQTAAAAAGmq8B4dmzg8G4bHhYNrIU32H9yU"; // you got this from the signup page
                                    echo recaptcha_get_html($public_key);
                                    ?>

                                    @if((Session::get('global')))
                                        <p class="error">{{ Session::get('global') }}</p>
                                    @endif

                                    <button type="submit" class="btn-search mr20">Send Email</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="lastminutecontact lcfix">
        <div class="container lmc">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-6">

                            <h3 style="color: #0099cc">Address: </h3>
                                            <span class="dark" style="font-size: 16px; height: auto; text-align: left">
                                                Exotic Holidays International (Pvt ) Limited <br/>
                                                No 07,<br/>
                                                Barnes Avenue,<br/>
                                                Mount Lavinia,<br/>
                                                Sri Lanka.
                                            </span>
                        </div>

                        <div class="col-md-6" style="font-size: 10px;">
                            <h3 style="color: #0099cc">Contact</h3>

                            <p class="opensans size30 lblue xslim" style="color: #000000;">
                                + 94 (0) 11 5235872<br>
                                + 94 (0) 11 4324221
                            </p>

                            <h3 style="color: #0099cc">Fax</h3>

                            <p class="opensans size30 lblue xslim" style="color: #000000;">+  94 (0) 11 2719047</p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4" style="text-align: left; font-size: 18px;">
                    <h2 style="color: #0099cc">Email</h2>
                    <a href="mailto:office@company.com" class="green2"
                       style="color: #000000;">accounts@srilankahotels.travel</a><br/>
                    <a href="mailto:office@company.com" class="green2"
                       style="color: #000000;">marketing@srilankahotels.travel</a><br/>
                    <a href="mailto:office@company.com" class="green2" style="color: #000000;">sales@srilankahotels
                        .travel</a><br/>
                    <a href="mailto:office@company.com" class="green2"
                       style="color: #000000;">support@srilankahotels.travel</a><br/>
                </div>

            </div>
        </div>
    </div>

    <hr/>

    <div class="container lmc">
        <div class="row">
            <div class="col-md-4">
                <h4 style="color: #0099cc">CIS Market</h4>

                <p>Regarding your booking, conditions and all booking maters contact our Team</p>

                <p>
                <h5 style="color: #72bf66">Ella Melnikova </h5>
                ICQ : 456270794 <br/>
                Mobile : +9477 1051114 <br/>
                Email: ella@exotic-intl.com <br/>
                Skype: ella-melnikova <br/>

                <h5 style="color: #72bf66"> Elona </h5>
                ICQ : 456270794 <br/>
                Mobile : +9477 5547327 <br/>
                Email: elena@exotic-intl.com <br/>
                Skype: alenaSTRij <br/>
                </p>
            </div>
            <div class="col-md-4">
                <h4 style="color: #0099cc">Chinese Market</h4>

                <p>Regarding your booking, conditions and all booking maters contact our Team</p>

                <p>
                <h5 style="color: #72bf66">Rizwan Mannan </h5>
                QQ : 2940942582 <br/>
                Mobile : +9477 1051114 <br/>
                Email: mannan@exotic-intl.com <br/>
                Skype: riyyan2 <br/>

                <h5 style="color: #72bf66"> Michelle Lowe </h5>
                QQ : 456270794 <br/>
                Mobile : +9477 8972756 <br/>
                Email: michelle@exotic-intl.com <br/>
                Skype: exotic.china2 <br/>
                </p>
            </div>
            <div class="col-md-4">
                <h4 style="color: #0099cc">Indian and Middle Eastern Market</h4>

                <p>Regarding your booking, conditions and all booking maters contact our Team</p>

                <p>
                <h5 style="color: #72bf66"> Godfrey Royen </h5>
                Mobile : +9477 2542625 <br/>
                Email: godfrey@exotic-intl.com <br/>
                Skype: detrovsgodfrey <br/>

                <h5 style="color: #72bf66"> Morris De Silva </h5>
                Mobile : +9477 1051114 <br/>
                Email: morris@exotic-intl.com <br/>
                Skype: exotic.holidays <br/>
                </p>
            </div>
        </div>

    </div>
    <!-- END OF WRAP -->

    @endsection

    @section('script')
        <!-- Googlemap -->
        {{ HTML::script('assets/js/initialize-google-map-contact.js') }}
    @endsection

    </body>

@stop