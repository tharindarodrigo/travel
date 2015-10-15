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
@endsection

@section('body-content')
    <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">


            <!-- CONTENT -->
            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="hpadding50c">
                    <p class="lato size30 slim">Profile</p>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                    <div class="col-md-12">
                        <div class="row">
                            {{Form::model($user,array('route'=>array('bookings.update',$user->id), 'method'=>'patch'))}}
                                <div class="col-md-6">

                                    <span class="size12">First Name *</span>
                                    {{Form::text('first_name',null,array('class'=> 'form-control'))}}
                                    {{$errors->first('first_name', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

                                    <br/>

                                    <span class="size12">Last Name *</span>
                                    {{Form::text('last_name',null,array('class'=> 'form-control'))}}
                                    {{$errors->first('first_name', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

                                    <br/>

                                    <span class="size12">Email *</span>
                                    {{Form::text('email',null,array('class'=> 'form-control'))}}
                                    {{$errors->first('email', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

                                    <br/>

                                    <br/>
                                </div>


                                <div class="col-md-6">
                                    <span class="size12">Company Name *</span>
                                    {{Form::text('company',null,array('class'=> 'form-control'))}}
                                    {{$errors->first('company', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

                                    <br/>

                                    <span class="size12">Address</span>
                                    {{Form::text('departure_date', null, array('class'=> 'form-control'))}}
                                    {{$errors->first('departure_date', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

                                    <br/>

                                    <span class="size12">Phone</span>
                                    {{Form::text('phone', null, array('class'=> 'form-control'))}}
                                    {{$errors->first('phone', '<span class="size12" style="color: red;">:message</span>') }}
                                    <div class="clearfix"></div>

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





