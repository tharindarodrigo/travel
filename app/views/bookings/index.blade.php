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
                    <p class="lato size30 slim">Bookings</p>

                    <p class="aboutarrow"></p>
                </div>
                <div class="line3"></div>

                <div class="hpadding50c">

                <div class="col-md-12">


                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Ref. No</th>
                                <th>Arrival</th>
                                <th>Departure</th>
                                <th>Name</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Status</th>
                                <th>Control Systems</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td style="text-align: center">{{$booking->reference_number}}</td>
                                <td style="text-align: center">{{$booking->arrival_date}}</td>
                                <td style="text-align: center">{{$booking->departure_date}}</td>
                                <td style="text-align: right">{{$booking->name}}</td>
                                <td style="text-align: right">{{$booking->adults}}</td>
                                <td style="text-align: right">{{$booking->children}}</td>
                                <td>{{$booking->val ==0 ? 'Inactive': 'active' }}</td>
                                <td>
                                <div class="">
                                        {{ Form::open(array('route'=> array('bookings.edit',$booking->id), 'method' =>'get')) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-2" style="float: left"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}


                                        {{ Form::open(array('route'=> array('bookings.destroy',$booking->id), 'method' =>'delete', 'style'=>'float-left')) }}
                                        <button class="btn btn-xs btn-flat btn-danger delete-button col-md-2" style="float: left"><i class="glyphicon glyphicon-trash"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('bookings.show',$booking->id), 'method' =>'get')) }}
                                        <button type="submit" class="btn btn-xs btn-flat  col-md-2" style="float: left;"><i
                                                    class="glyphicon glyphicon-inverse glyphicon-eye-open"></i></button>
                                        {{ Form::close() }}
                                        @if($booking->val == 0)
                                            <div class="">

                                                {{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-2"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button style="float: left" class="btn btn-xs btn-flat btn-default float-left disabled deactivate-item col-md-2"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle" ></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}
                                            <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-2"
                                                type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                            <button style="float: left" class="btn btn-xs btn-flat btn-warning deactivate-item col-md-2"
                                                type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                            {{ Form::close() }}

                                        @endif
                                    </div>
                                </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>

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





