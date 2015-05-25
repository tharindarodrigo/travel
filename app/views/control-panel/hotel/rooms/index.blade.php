@extends('control-panel.hotel.rooms.rooms')

@section('room-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete</b>Meal Bases</h3>
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="rooms-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Room Type</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomtypes as $roomtype)
                        <tr>
                            <td>{{$roomtype->id}}</td>
                            <td>{{$roomtype->room_type}}</td>
                            <td>
                                <div class="">
                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.edit',$hotelid), 'method' =>'get' )) }}
                                    <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                class="glyphicon glyphicon-edit"></i></button>
                                    {{ Form::close() }}

                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.destroy',$hotelid), 'method' =>'delete')) }}
                                    <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                    {{ Form::close() }}

                                    @if($roomtype->val == 0)
                                        <div class="">
                                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.update',$hotelid), 'method' =>'patch')) }}
                                            <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                               type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                            <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                               type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                            {{ Form::close() }}
                                        </div>

                                    @else
                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.update',$hotelid), 'method' =>'patch')) }}
                                        <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                            type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                        <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                            type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                        {{ Form::close() }}

                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection