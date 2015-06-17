@extends('control-panel.hotel.rates.rates')

@section('rate-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="rooms-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Room Spec</th>
                        <th>Meal</th>
                        <th>Market</th>
                        <th>Rate</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rates as $rate)

                        <td>{{$rate->id}}</td>
                        <td>{{$rate->roomType->room_type}}</td>
                        <td>{{$rate->from}}</td>
                        <td>{{$rate->to}}</td>
                        <td>{{$rate->roomSpecification->room_specification}}</td>
                        <td>{{$rate->mealBasis->meal_basis}}</td>
                        <td>{{$rate->market->market}}</td>
                        <td>{{$rate->rate}}</td>
                        <td>

                        </td>

                    @endforeach

                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop