@extends('control-panel.hotel.rates.rates')


@section('rate-content')

    <div class="col-md-12">
        <div class="box box-primary">

            <!-- /.box-header -->
            <div class="box-header">
                <div class="pull-right">
                    {{link_to_route('control-panel.hotel.hotels.rates.create', 'Add Rates',array($hotelid), array('class' => 'btn btn-primary'))}}
                </div>
            </div>


            <div class="box-body table-responsive">

                <table class="table table-bordered table-striped" id="rates-table">
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
                        <tr>
                            <td style="vertical-align: middle; text-align: right;"><strong>{{$rate->id}}</strong></td>
                            <td style="vertical-align: middle;">{{$rate->roomType->room_type}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{$rate->from}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{$rate->to}}</td>
                            <td style="vertical-align: middle;">{{$rate->roomSpecification->room_specification}}</td>
                            <td style="vertical-align: middle; text-align: center;">{{$rate->mealBasis->meal_basis}}</td>
                            <td style="vertical-align: middle;">{{$rate->market->market}}</td>
                            <td style="vertical-align: middle; text-align: right;">{{number_format($rate->rate,2)}}</td>
                            <td style="width: 170px;">

                                {{ Form::open(array('route'=> array('control-panel.hotel.hotels.rates.edit', $hotelid, $rate->id), 'method' =>'get' )) }}
                                <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                            class="glyphicon glyphicon-edit"></i></button>
                                {{ Form::close() }}

                                {{ Form::open(array('route'=> array('control-panel.hotel.hotels.rates.destroy', $hotelid, $rate->id), 'method' =>'delete' )) }}

                                <button type="button" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i
                                            class="glyphicon glyphicon-trash"></i></button>
                                {{ Form::close() }}

                                @if($rate->val == 0)
                                    <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotels.rates.update', $hotelid, $rate->id), 'method' =>'patch')) }}
                                        <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                type="submit" name="val" value="1"><i
                                                    class="glyphicon glyphicon-ok-circle"></i></button>
                                        <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                        {{ Form::close() }}
                                    </div>
                                @else
                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.rates.update', $hotelid, $rate->id), 'method' =>'patch')) }}
                                    <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                            type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                    <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                            type="submit" name="val" value="0"><i
                                                class="glyphicon glyphicon-remove-circle"></i></button>
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
@endsection

@section('rate-scripts')
    <script type="text/javascript">

        $('#rates-table').dataTable({
                    paging: false,
                },
                confirmDeleteItem()
        );


    </script>
@stop