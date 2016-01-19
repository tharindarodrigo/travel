@extends('control-panel.hotel.rooms.rooms')

@section('bread-crumbs')
    <li class="active">My Hotels</li>
    <li class="active">{{Hotel::find($hotelid)->name}}</li>
    <li class="active">Rooms</li>
@endsection

@section('room-content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Update / Delete </b>Room Types</h3>
            </div><!-- /.box-header -->

            <div class="box-body table-responsive">

                    @if(Session::has('error-msg'))
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fa fa-warning"></i> Alert!</h5>
                            {{Session::pull('error-msg')}}
                         </div>
                    @endif

                <table class="table table-bordered table-striped" id="rooms-table">
                <thead>
                    <tr>2
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
                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.edit',$hotelid,$roomtype->id), 'method' =>'get' )) }}
                                    <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i class="glyphicon glyphicon-edit"></i></button>
                                    {{ Form::close() }}

                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.destroy',$hotelid, $roomtype->id), 'method' =>'delete')) }}
                                    <button type="button" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></button>
                                    {{ Form::close() }}

                                    @if($roomtype->val == 0)
                                        <div class="">
                                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.update',$hotelid,$roomtype->id), 'method' =>'patch')) }}
                                            <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                               type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                            <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                               type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                            {{ Form::close() }}
                                        </div>

                                    @else
                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotels.room-types.update',$hotelid, $roomtype->id), 'method' =>'patch')) }}
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
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Create Room Type</b></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                {{link_to_route('control-panel.hotel.hotels.room-types.create','Create Room Type',array($hotelid),array('class'=>'btn btn-lg btn-primary'))}}
            </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            confirmDeleteItem();
        });
    </script>
@endsection