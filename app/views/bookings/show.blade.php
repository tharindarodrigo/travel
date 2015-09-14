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
    <li><a href="#" class="active">Bookings</a></li>
    <li>/</li>
    <li><a href="#">View</a>
@endsection

@section('body-content')
    <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">


            <!-- CONTENT -->
            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="hpadding50c">
                    <div class="lato size30 slim"><h4 class="heading">Booking</h4></div><div class="pull-right">Reference No. {{$booking->reference_number}}</div></p>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">


                    <div class="col-md-12">
                    <div class="row">
                    {{Form::model($booking,array('route'=>array('bookings.update',$booking->id), 'method'=>'patch'))}}
                        <div class="col-md-6">
                            <span class="size12">Booking Name *</span>
                            {{Form::text('name',null,array('class'=> 'form-control'))}}
                            {{$errors->first('name', '<span class="size12" style="color: red;">:message</span>') }}
                            <div class="clearfix"></div>

                            <br/>
                            {{----------------------------------------------------------------------------------------------------------------------------------}}




                            <span class="size12">Tour *</span>
                            {{Form::text('tour',null,array('class'=> 'form-control'))}}
                            {{$errors->first('tour', '<span class="size12" style="color: red;">:message</span>') }}
                            <br/>

                            <span class="size12">Remark *</span>
                            {{Form::textarea('remarks', null, array('class'=> 'form-control', 'rows'=>3))}}
                            {{$errors->first('remarks', '<span class="size12" style="color: red;">:message</span>') }}
                            <div class="clearfix"></div>

                            <br/>
                        </div>



                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-4">
                            <span class="size12">Arrival Date *</span>
                            {{Form::text('arrival_date',null,array('class'=> 'form-control', 'id'=>'date1'))}}
                            {{$errors->first('arrival_date', '<span class="size12" style="color: red;">:message</span>') }}
                            <div class="clearfix"></div>

                            <br/>

                            <span class="size12">Departure Date *</span>
                            {{Form::text('departure_date', null, array('class'=> 'form-control', 'id'=>'date2'))}}
                            {{$errors->first('departure_date', '<span class="size12" style="color: red;">:message</span>') }}
                            <div class="clearfix"></div>

                            <br/>
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
                            <br/>



                            <div class="clearfix"></div>
                            <br/>
                        </div>

                        <div class="col-md-12">
                            {{Form::submit('update Booking Info',array('class'=>'btn bluebtn pull-right'))}}
                        </div>


                        {{----------------------------------------------------------------------------------------------------------------------------------}}


                        <div class="clearfix"></div>
                        <br/>


                    {{Form::close()}}

                    </div>
                    </div>
                    <div class="col-md-12">

                    <br/><br/>


                        <div>

                          <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li role="presentation" class="active"><a href="#booking_details" aria-controls="customer_details" role="tab" data-toggle="tab">Customer Details</a></li>
                                <li role="presentation"><a href="#clients" aria-controls="clients" role="tab" data-toggle="tab">Clients</a></li>
                                <li role="presentation"><a href="#flightDetails" aria-controls="flightDetails" role="tab" data-toggle="tab">Flight Details</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="booking_details">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Passoport No.</th>
                                            <th>DoB</th>
                                            <th>Gender</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->passport_number}}</td>
                                        <td>{{$client->dob}}</td>
                                        <td>{{$client->gender==1 ? 'Male' : 'Female'}}</td>
                                        <td>


                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="clients">

                            </div>
                            <div role="tabpanel" class="tab-pane" id="flightDetails">

                            </div>

                            </div>

                        </div>
                        <!-- IMG RIGHT TEXT -->

                        <!-- END OF IMG RIGHT TEXT -->

                    </div>
                </div>


                <div class="clearfix"></div>
                <br/><br/>
            </div>
            <!-- END CONTENT -->


        </div>


    </div>
    <!-- END OF CONTENT -->

@endsection
        <!-- Javascript  -->





