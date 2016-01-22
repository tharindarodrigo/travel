@extends('control-panel.hotel-bookings.hotel-bookings')

@section('active-all-payments')
    {{'active'}}
@endsection
@section('hotel-bookings-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete </b>Payments</h3>
            </div>
            <div class="box-body">

                    <table class="table table-bordered table-striped" id="agent-bookings">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ref. No</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>Booking Name</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Status</th>
                            <th width="160px">Controls</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->id}}</td>
                                <td style="text-align: center">{{$booking->reference_number}}</td>
                                <td style="text-align: center">{{$booking->arrival_date}}</td>
                                <td style="text-align: center">{{date('Y-m-d', strtotime($booking->departure_date))}}</td>
                                <td style="text-align: right">{{$booking->booking_name}}</td>
                                <td style="text-align: right">{{$booking->adults}}</td>
                                <td style="text-align: right">{{$booking->children}}</td>
                                <td>{{$booking->val ==0 ? 'Pending': 'active' }}</td>
                                <td>
                                    <div class="">
                                        {{--{{ Form::open(array('route'=> array('bookings.show',$booking->id), 'method' =>'get')) }}--}}
                                        {{--<button type="submit"--}}
                                                {{--class="btn btn-xs btn-flat btn-primary col-md-2"--}}
                                                {{--style="float: left"><i--}}
                                                    {{--class="glyphicon glyphicon-edit"></i></button>--}}
                                        {{--{{ Form::close() }}--}}

                                        {{ Form::open(array('route'=> array('bookings.destroy',$booking->id), 'method' =>'delete', 'style'=>'float-left')) }}
                                        <button type="button"
                                                class="btn btn-xs btn-flat btn-danger delete-button col-md-2"
                                                style="float: left"><i
                                                    class="glyphicon glyphicon-trash"></i>
                                        </button>
                                        {{ Form::close() }}

                                        {{--{{ Form::open(array('route'=> array('bookings.show',$booking->id), 'method' =>'get')) }}--}}
                                        {{--<button type="submit" class="btn btn-xs btn-flat  col-md-2"--}}
                                        {{--style="float: left;"><i--}}
                                        {{--class="glyphicon glyphicon-inverse glyphicon-eye-open"></i>--}}
                                        {{--</button>--}}
                                        {{--{{ Form::close() }}--}}
                                        @if($booking->val == 0)

                                            {{--{{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}--}}
                                            {{--<button class="btn btn-xs btn-flat btn-success activate-item col-md-2"--}}
                                                    {{--type="submit" name="val" value="1"><i--}}
                                                        {{--class="glyphicon glyphicon-ok-circle"></i></button>--}}
                                            {{--<button style="float: left"--}}
                                                    {{--class="btn btn-xs btn-flat btn-default float-left disabled deactivate-item col-md-2"--}}
                                                    {{--type="button"><i--}}
                                                        {{--class="glyphicon glyphicon-remove-circle"></i>--}}
                                            {{--</button>--}}
                                            {{--{{ Form::close() }}--}}


                                        @else
                                            {{--{{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}--}}
                                            {{--<button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-2"--}}
                                                    {{--type="button"><i--}}
                                                        {{--class="glyphicon glyphicon-ok-circle"></i>--}}
                                            {{--</button>--}}
                                            {{--<button style="float: left"--}}
                                                    {{--class="btn btn-xs btn-flat btn-warning deactivate-item col-md-2"--}}
                                                    {{--type="submit" name="val" value="0"><i--}}
                                                        {{--class="glyphicon glyphicon-remove-circle"></i>--}}
                                            {{--</button>--}}
                                            {{--{{ Form::close() }}--}}

                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="line3"></div>
                    <br/>

                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#payments_table').dataTable(
                    confirmDeleteItem()
            );
        });
    </script>
@endsection