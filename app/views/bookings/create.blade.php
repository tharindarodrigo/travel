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
            <div class="col-md-12 pagecontainer2 offset-0">
                <div class="hpadding50c">
                    <p class="lato size30 slim">Meet the team</p>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                <div class="col-md-6">

                    {{Form::open()}}

                    <div class="form-group">
                        {{Form::label('arrival_date', 'Arrival Date')}}
                        {{Form::text('arrival_date',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('departure_date', 'Departure Date')}}
                        {{Form::text('departure_date',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name',null,array('class'=> 'form-control'))}}
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                {{Form::label('adults', 'Adults')}}
                                {{Form::text('adults',null,array('class'=> 'form-control'))}}
                            </div>
                            <div class="col-xs-6">
                                {{Form::label('children', 'Children')}}
                                {{Form::text('children',null,array('class'=> 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::label('remarks', 'Remarks')}}
                        {{Form::textarea('remarks',null, array('class'=> 'form-control', 'rows' => '3'))}}
                    </div>


                    {{Form::close()}}


                    <div class="line3"></div>
                    <br/>

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





