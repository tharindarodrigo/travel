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
    <li>{{link_to_route('bookings.index', 'Bookings')}}</li>
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

                    {{Form::open(array('route' => array('bookings.store')))}}

                    <div class="col-md-3 textright">
                        <span class="size12">&nbsp;</span>
                        <div class="margtop15"><span class="dark">Booking Name:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        <span class="size12">First and Last Name*</span>
                        {{Form::text('booking_name',null,array('class'=> 'form-control'))}}
                        {{$errors->first('booking_name', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Arrival Date:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('arrival_date',null,array('class'=> 'form-control', 'id'=>'date1'))}}
                        {{$errors->first('arrival_date', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Departure Date:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('departure_date', null, array('class'=> 'form-control', 'id'=>'date2'))}}
                        {{$errors->first('departure_date', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>
                    <br/>

                    {{----------------------------------------------------------------------------------------------------------------------------------}}

                    @if(!Auth::check())
                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Email:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('email', null, array('class'=> 'form-control'))}}
                        {{$errors->first('email', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>
                    <br/>

                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Phone:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('phone', null, array('class'=> 'form-control'))}}
                        {{$errors->first('phone', '<span class="size12" style="color: red;">:message</span>') }}
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>
                    <br/>

                    {{----------------------------------------------------------------------------------------------------------------------------------}}

                    @endif


                    <div class="col-md-3 textright">
                    <span class="size12">&nbsp;</span>
                        <div class="margtop15"><span class="dark">Pax:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="size12">adults</span>
                                {{Form::text('adults',null,array('class'=> 'form-control'))}}
                                {{$errors->first('adults', '<span class="size12" style="color: red;">:message</span>') }}

                            </div>

                            <div class="col-xs-6">
                                <span class="size12">children</span>
                                {{Form::text('children',null,array('class'=> 'form-control'))}}
                                {{$errors->first('children', '<span class="size12" style="color: red;">:message</span>') }}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 textleft margtop15">

                    </div>
                    <div class="clearfix"></div>
                    <br/>

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Tour:</span><span class="red">*</span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::text('tour',null,array('class'=> 'form-control'))}}
                        {{$errors->first('tour', '<span class="size12" style="color: red;">:message</span>') }}

                    </div>


                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>

                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    @if(Entrust::hasRole('Agent'))
                    {{--Client Information--}}
                    <span class="size16px bold dark left">Client Information </span>
                    <div class="roundstep active right">2</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>DoB</th>
                            <th>Passport No</th>
                            <th>Gender</th>
                            <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="clients_table">

                        </tbody>
                    </table>
                    </div>
                    <br/><br/>

                    <div>
                        <div class="col-md-3">
                            <span class="size12" style="text-align: center">Name</span>
                            {{Form::text('client_name',null,array('class'=> 'form-control', 'id'=>'name'))}}
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
                        <button class="bluebtn margtop20" type="button" id="add_client_btn">Add Client</button>
                    </div>
                    <div class="clearfix"></div>
                    <br/><br/>

                    {{----------------------------------------------------------------------------------------------------------------------------------}}

                    <span class="size16px bold dark left">Flight Details </span>
                    <div class="roundstep active right">3</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="col-md-3 textright">
                        <span>&nbsp;</span>
                        <div class="margtop15"><span class="dark">Flight:</span><span class="red"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <span>Arrival</span>
                                {{Form::text('arrival_flight',null,array('class'=> 'form-control'))}}
                                {{$errors->first('arrival_flight', '<span class="size12" style="color: red;">:message</span>') }}
                            </div>

                            <div class="col-xs-6">
                                <span>Departure</span>
                                {{Form::text('departure_flight',null,array('class'=> 'form-control'))}}
                                {{$errors->first('departure_flight', '<span class="size12" style="color: red;">:message</span>') }}

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 textleft margtop15">

                    </div>

                    <div class="clearfix"></div>
                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Date:</span><span class="red"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                {{Form::text('date_arrival',null,array('class'=> 'form-control date-control'))}}
                                {{$errors->first('date_arrival', '<span class="size12" style="color: red;">:message</span>') }}
                            </div>
                            <div class="col-xs-6">
                                {{Form::text('date_departure',null,array('class'=> 'form-control date-control'))}}
                                {{$errors->first('date_departure', '<span class="size12" style="color: red;">:message</span>') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 textleft margtop15">
                    </div>

                    <div class="clearfix"></div>
                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}


                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Time:</span><span class="red"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                        <div class="col-xs-6">
                            {{Form::text('arrival_time',null,array('class'=> 'form-control time-control'))}}
                            {{$errors->first('arrival_time', '<span class="size12" style="color: red;">:message</span>') }}

                        </div>
                        <div class="col-xs-6">
                            {{Form::text('departure_time',null,array('class'=> 'form-control time-control'))}}
                            {{$errors->first('arrival_time', '<span class="size12" style="color: red;">:message</span>') }}

                        </div>

                        </div>
                    </div>

                    <div class="col-md-3 textleft margtop15">

                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    <br/>
                    {{----------------------------------------------------------------------------------------------------------------------------------}}

                    <span class="size16px bold dark left">Remarks</span>

                    <div class="roundstep active right">4</div>
                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="col-md-3 textright">
                        <div class="margtop15"><span class="dark">Remarks:</span><span class="red"></span></div>
                    </div>
                    <div class="col-md-6">
                        {{Form::textarea('remarks',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="col-md-3 textleft margtop15">
                    </div>
                    <div class="clearfix"></div>

                    <br/>
                    @endif

                    <div class="col-md-12 ">
                        <div class="pull-right">
                            <button class="bluebtn" type="submit">Add Booking</button>
                        </div>
                    </div>


                        <!-- IMG RIGHT TEXT -->

                    <!-- END OF IMG RIGHT TEXT -->
                    {{Form::close()}}

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





