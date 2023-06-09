@extends('control-panel.hotel.supplement-rates.supplement-rates')

@section('rate-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-header">
                <div class="pull-right">
                    {{link_to_route('control-panel.hotel.hotels.supplement-rates.create', 'Add Rates',array($hotelid), array('class' => 'btn btn-primary'))}}
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="rooms-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room Type</th>
                        <th>Supplement</th>
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
                    <tr>

                        <td>{{$rate->id}}</td>
                        <td>{{$rate->roomType->room_type}}</td>
                        <td style="vertical-align: middle;">{{$rate->supplement_name}}</td>
                        <td>{{$rate->from}}</td>
                        <td>{{$rate->to}}</td>
                        <td>{{$rate->roomSpecification->room_specification}}</td>
                        <td>{{$rate->mealBasis->meal_basis}}</td>
                        <td>{{$rate->market->market}}</td>
                        <td>{{$rate->rate}}</td>
                        <td>

                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.supplement-rates.edit', $hotelid, $rate->id), 'method' =>'get' )) }}
                            <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i class="glyphicon glyphicon-edit"></i></button>
                            {{ Form::close() }}

                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.supplement-rates.destroy', $hotelid, $rate->id), 'method' =>'delete' )) }}

                            <button type="submit" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></button>
                            {{ Form::close() }}

                            @if($rate->val == 0)
                                <div class="">
                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.supplement-rates.update', $hotelid, $rate->id), 'method' =>'patch')) }}
                                    <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                       type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                    <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                       type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    {{ Form::close() }}
                                </div>
                            @else
                                {{ Form::open(array('route'=> array('control-panel.hotel.hotels.supplement-rates.update', $hotelid, $rate->id), 'method' =>'patch')) }}
                                <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                    type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                    type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                {{ Form::close() }}
                            @endif                        
                            

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@stop