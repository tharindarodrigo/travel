@extends('layout.master')

@section('title')

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> srilankahotel.travel - Hotel Details </title>

@endsection

@section('custom_style')

    <!-- Animo css-->
    {{ HTML::style('plugins/animo/animate+animo.css' , array('rel' => 'stylesheet' , 'media' => 'screen')) }}

@endsection

@section('content')

    <body id="top" class="thebg">

    <div class="navbar-wrapper2 navbar-fixed-top">
        @include('layout.navbar')
    </div>

    <div class="container breadcrub">
        <div>
            <a class="homebtn left" href="#"></a>

            <div class="left">
                <ul class="bcrumbs">
                    <li>/</li>
                    <li><a href="#">Hotels</a></li>
                    <li>/</li>
                    <li><a href="#">U.S.A.</a></li>
                    <li>/</li>
                    <li><a href="#" class="active">New York</a></li>
                </ul>
            </div>
            <a class="backbtn right" href="#"></a>
        </div>
        <div class="clearfix"></div>
        <div class="brlines"></div>
    </div>

    <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">


            <!-- LEFT CONTENT -->
            <div class="col-md-8 pagecontainer2 offset-0">

                <div class="padding30 grey">
                    <span class="size16px bold dark left">Who's traveling? </span>

                    <div class="roundstep active right">1</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>
                    Please tell us who will be checking in. Must be 18 or older. <br/><br/>

                    <div class="col-md-4 textright">
                        <div class="margtop15"><span class="dark">Contact Name:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-4">
                        <span class="size12">First and Last Name*</span>
                        <input type="text" class="form-control " placeholder="">
                    </div>
                    <div class="col-md-4 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-4 textright">
                        <div class="margtop7"><span class="dark">Phone Number:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-4">
                        <span class="size12">Country code*</span>
                        <select class="form-control mySelectBoxClass">
                            <option selected>xxx-xxx-xxx-772</option>
                            <option>xxx-xxx-xxx-039</option>
                        </select>
                    </div>
                    <div class="col-md-4 textleft">
                        <span class="size12">Preferred Phone Number*</span>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8 textleft">
                        Bedding / Smoking Request (optional)
                        <!-- Collapse 3 -->
                        <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                data-target="#collapse3"></button>
                        <div id="collapse3" class="collapse">
                            <textarea rows="3" class="form-control margtop10"></textarea>
                        </div>
                        <!-- End of collapse 3 -->
                        <div class="clearfix"></div>

                        Special Requests (optional)
                        <!-- Collapse 4 -->
                        <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                data-target="#collapse4"></button>
                        <div id="collapse4" class="collapse">
                            <textarea rows="3" class="form-control margtop10"></textarea>
                        </div>
                        <!-- End of collapse 4 -->
                        <div class="clearfix"></div>

                    </div>
                    <div class="clearfix"></div>


                    <br/>
                    <br/>
                    <span class="size16px bold dark left">How would you like to pay?</span>

                    <div class="roundstep right">2</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>


                    <br/>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        Enter a coupon code
                        <!-- Collapse 5 -->
                        <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                data-target="#collapse5"></button>
                        <div id="collapse5" class="collapse">
                            <input type="text" class="form-control margtop10" placeholder="">
                        </div>
                        <!-- End of collapse 5 -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4 textleft">
                    </div>
                    <div class="clearfix"></div>


                    <br/>
                    <!-- Nav tabs -->
                    <ul class="nav navigation-tabs">
                        <li class="active"><a href="#card" data-toggle="tab">Credit/Debit card</a></li>
                        <li><a href="#paypal" data-toggle="tab">Paypal</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content4">

                        <!-- Tab 1 -->
                        <div class="tab-pane active" id="card">

                            <div class="col-md-4 textright">
                                <div class="margtop15"><span class="dark">Debit/Credit Card Number:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4 textleft">
                            </div>
                            <div class="clearfix"></div>

                            <br/>

                            <div class="col-md-4 textright">
                                <div class="margtop7"><span class="dark">Card Type:</span><span class="red">*</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control mySelectBoxClass">
                                    <option selected>xxx-xxx-xxx-772</option>
                                    <option>xxx-xxx-xxx-039</option>
                                </select>
                            </div>
                            <div class="col-md-4 textleft">
                            </div>
                            <div class="clearfix"></div>

                            <br/>

                            <div class="col-md-4 textright">
                                <div class="margtop7"><span class="dark">Expiration Date:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">

                                <div class="w50percent">
                                    <div class="wh90percent">
                                        <select class="form-control mySelectBoxClass">
                                            <option selected>01 JAN</option>
                                            <option>02 FEB</option>
                                            <option>03 MAR</option>
                                            <option>04 APR</option>
                                            <option>05 MAY</option>
                                            <option>06 JUN</option>
                                            <option>07 JUL</option>
                                            <option>08 AUG</option>
                                            <option>09 SEP</option>
                                            <option>10 OCT</option>
                                            <option>11 NOV</option>
                                            <option>12 DEC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w50percentlast">
                                    <div class="wh90percent right">
                                        <select class="form-control mySelectBoxClass">
                                            <option selected>14</option>
                                            <option>15</option>
                                            <option>16</option>
                                            <option>17</option>
                                            <option>18</option>
                                            <option>19</option>
                                            <option>20</option>
                                            <option>21</option>
                                            <option>22</option>
                                            <option>23</option>
                                            <option>24</option>
                                            <option>25</option>
                                            <option>26</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 textleft">
                            </div>
                            <div class="clearfix"></div>


                            <br/>

                            <div class="col-md-4 textright">
                                <div class="margtop15"><span class="dark">Card Identification Number:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4 textleft margtop15">What's this?
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-4 textright">
                                <div class="margtop15"><span class="dark">Billing ZIP Code:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4 textleft margtop15">
                            </div>
                            <div class="clearfix"></div>


                            <div class="col-md-4 textright">
                                <div class="margtop15"><span class="dark"> Cardholder Name:</span><span
                                            class="red">*</span></div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control margtop10" placeholder="">
                            </div>
                            <div class="col-md-4 textleft margtop15">(as it appears on the card)
                            </div>
                            <div class="clearfix"></div>

                        </div>
                        <!-- End of Tab 1 -->

                        <!-- Tab 2 -->
                        <div class="tab-pane" id="paypal">

                            <div class="alert alert-warning fade in">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <strong>Important:</strong> You will be redirected to PayPal's website to securely
                                complete your payment.
                            </div>

                            <button type="submit" class="btn-search5">Proceed to paypal</button>

                        </div>
                        <!-- End of Tab 2 -->
                    </div>


                    <br/>
                    <br/>
                    <span class="size16px bold dark left">Where should we send your confirmation?</span>

                    <div class="roundstep right">3</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>
                    Please enter the email address where you would like to receive your confirmation.<br/>


                    <div class="col-md-4 textright">
                        <div class="mt15"><span class="dark">Email Address:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control margtop10" placeholder="">
                    </div>
                    <div class="col-md-4 textleft">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>
                    <span class="size16px bold dark left">Review and book your trip</span>

                    <div class="roundstep right">4</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="alert alert-info">
                        Important information about your booking:<br/>

                        <p class="size12">• This reservation is non-refundable and cannot be changed or canceled.</p>
                    </div>
                    By selecting to complete this booking I acknowledge that I have read and accept the <a href="#"
                                                                                                           class="clblue">rules
                        &
                        restrictions</a> <a href="#" class="clblue">terms & conditions</a> , and <a href="#"
                                                                                                    class="clblue">privacy
                        policy</a>. <br/>

                    <button type="submit" class="bluebtn margtop20">Complete booking</button>


                </div>

            </div>
            <!-- END OF LEFT CONTENT -->

            <!-- RIGHT CONTENT -->
            <div class="col-md-4">

                <div class="pagecontainer2 paymentbox grey">
                    <div class="padding30">
                        <img src="images/thumb.png" class="left margright20" alt=""/>
                        <span class="opensans size18 dark bold">Mabely Grand Hotel</span>
                        <span class="opensans size13 grey">Zakynthos, Greece</span><br/>
                        <img src="images/bigrating-5.png" alt=""/>
                    </div>
                    <div class="line3"></div>

                    <div class="hpadding30 margtop30">
                        <table class="table table-bordered margbottom20">
                            <tr>
                                <td>Guests recommendations</td>
                                <td class="center green bold">97%</td>
                            </tr>
                            <tr>
                                <td>Guest ratings</td>
                                <td class="center green bold">4.5</td>
                            </tr>
                            <tr>
                                <td colspan=2><span class="dark">Room 1</span>: Standard Double Room</td>
                            </tr>
                            <tr>
                                <td colspan=2><span class="dark">5 Nights</span>: Sep/10/2013 - Sep/14/2013</td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="dark">Room 1</span>: 2 Adults<br/>
                                    5 Nights
                                    <!-- Collapse 1 -->
                                    <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                            data-target="#collapse1"></button>
                                    <div id="collapse1" class="collapse">
                                        <div class="left size12 lblue">
                                            Thu Nov 14<br/>
                                            Fri Nov 15
                                        </div>
                                        <div class="right size12 lblue">
                                            $15.92<br/>
                                            $20.00
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- End of collapse 1 -->
                                    <div class="clearfix"></div>


                                    Taxes & Fees per night

                                    <!-- Collapse 1 -->
                                    <button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse"
                                            data-target="#collapse2"></button>
                                    <div id="collapse2" class="collapse">
                                        <div class="left size12 lred">
                                            Thu Nov 14<br/>
                                            Fri Nov 15
                                        </div>
                                        <div class="right size12 lred">
                                            $1.51<br/>
                                            $1.00
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- End of collapse 1 -->
                                    <div class="clearfix"></div>

                                </td>
                                <td class="center">
                                    avg./night<br/>
                                    $35.92<br/>
                                    $2.51<br/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="line3"></div>
                    <div class="padding30">
                        <span class="left size14 dark">Trip Total:</span>
                        <span class="right lred2 bold size18">$192.15</span>

                        <div class="clearfix"></div>
                    </div>


                </div>
                <br/>

                <div class="pagecontainer2 needassistancebox">
                    <div class="cpadding1">
                        <span class="icon-help"></span>

                        <h3 class="opensans">Need Assistance?</h3>

                        <p class="size14 grey">Our team is 24/7 at your service to help you with your booking issues or
                            answer any related questions</p>

                        <p class="opensans size30 lblue xslim">1-866-599-6674</p>
                    </div>
                </div>
                <br/>

                <div class="pagecontainer2 loginbox">
                    <div class="cpadding1">
                        <span class="icon-lockk"></span>

                        <h3 class="opensans">Log in</h3>
                        <input type="text" class="form-control logpadding" placeholder="Username">
                        <br/>
                        <input type="text" class="form-control logpadding" placeholder="Password">

                        <div class="margtop20">
                            <div class="left">
                                <div class="checkbox padding0">
                                    <label>
                                        <input type="checkbox">Remember
                                    </label>
                                </div>
                                <a href="#" class="greylink">Lost password?</a><br/>
                            </div>
                            <div class="right">
                                <button class="btn-search5" type="submit" onclick="errorMessage()">Login</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                    </div>
                </div>
                <br/>

            </div>
            <!-- END OF RIGHT CONTENT -->


        </div>


    </div>
    <!-- END OF CONTENT -->

    @endsection

    @section('script')


        <!-- Javascript  -->
        {{ HTML::script('assets/js/js-payment.js') }}


        <!-- Load Animo -->
        {{ HTML::script('plugins/animo/animo.js') }}

    @endsection

    </body>

@stop