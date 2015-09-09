@extends('bookings.bookings')

@section('styles')
<style type="text/css">
    th {
        text-align: center;
    }
</style>
@endsection

@section('bread-crumbs')
    <li>/</li>
    <li>{{link_to_route('bookings.create', 'create')}}</li>
@endsection

@section('body-content')
    <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">


            <!-- CONTENT -->
            <div class="col-md-8 pagecontainer2 offset-0">
                <div class="padding30 grey">
                <span class="size16px bold dark left">Client Details </span>

                    <div class="roundstep active right">1</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    {{Form::open()}}

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Contact Name:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        <span class="size12">First and Last Name*</span>
                        {{Form::text('name',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Arrival Date:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('arrival_date',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Departure Date:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('departure_date',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Pax:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="size12">adults</span>
                                {{Form::text('adults',null,array('class'=> 'form-control'))}}
                            </div>
                            <div class="col-xs-6">
                                <span class="size12">children</span>
                                {{Form::text('children',null,array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 textleft margtop15">

                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>









                    {{--<div class="form-group">--}}
                        {{--{{Form::label('arrival_date', 'Arrival Date')}}--}}
                        {{--{{Form::text('arrival_date',null,array('class'=> 'form-control'))}}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('departure_date', 'Departure Date')}}--}}
                        {{--{{Form::text('departure_date',null,array('class'=> 'form-control'))}}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('name', 'Name')}}--}}
                        {{--{{Form::text('name',null,array('class'=> 'form-control'))}}--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-6">--}}
                                {{--{{Form::label('adults', 'Adults')}}--}}
                                {{--{{Form::text('adults',null,array('class'=> 'form-control'))}}--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-6">--}}
                                {{--{{Form::label('children', 'Children')}}--}}
                                {{--{{Form::text('children',null,array('class'=> 'form-control'))}}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                        {{--{{Form::label('remarks', 'Remarks')}}--}}
                        {{--{{Form::textarea('remarks',null, array('class'=> 'form-control', 'rows' => '3'))}}--}}
                    {{--</div>--}}


                    {{Form::close()}}


                    <br/>

                    {{--Client Information--}}
                    <span class="size16px bold dark left">Client Information </span>
                    <div class="roundstep active right">2</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>DoB</th>
                            <th>Passport No</th>
                            <th>Gender</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <br/><br/>

                    <div>
                        <div class="col-md-3">
                            <span class="size12" style="text-align: center">Name</span>
                            {{Form::text('name',null,array('class'=> 'form-control', 'id'=>'name'))}}
                        </div>
                        <div class="col-md-3">
                            <span class="size12">Date of Birth</span>
                            {{Form::text('dob',null,array('class'=> 'form-control', 'id'=> 'dob'))}}
                        </div>
                        <div class="col-md-3">
                            <span class="size12">Passport No.</span>
                            {{Form::text('passport_number',null,array('class'=> 'form-control', 'id'=>'passport_number'))}}
                        </div>
                        <div class="col-md-3">
                            <span class="size12">Gender</span>
                            {{Form::select('gender',array('male' => 'Male', 'female'=>'Female'),null,array('class'=> 'form-control', 'id'=>'gender'))}}
                        </div>
                    </div>
                    <div class="pull-right">
                        <button class="bluebtn margtop20" id="add_client_btn">Add Client</button>
                    </div>


                    <!-- IMG RIGHT TEXT -->

                    <!-- END OF IMG RIGHT TEXT -->

                </div>


                <div class="clearfix"></div>
                <br/><br/>
            </div>
            <!-- END CONTENT -->

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
        </div>


    </div>
    <!-- END OF CONTENT -->

@endsection
        <!-- Javascript  -->





