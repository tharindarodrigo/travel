@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Room Facilities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Room Facilities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-room-facilities')
 {{ 'active' }}
@endsection


@section('content')


<section>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Room Facility
                    </h3>
                </div>

                <form action="" role="form" id="meal_basis_form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="room_facility">Room Facility Name</label>
                            <input id="room_facility" class="form-control" type="text"/>
                        </div>

                        <div class="form-group customValidationAlert"></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn_create_room_facility">Create Room Facility</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-group btn-primary" id="btn_update_room_facility">Update Room Facility</button>
                            <button type="button" class="btn btn-group btn-info" id="btn_cancel_room_facility">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Room Facilities</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="room-facilities-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Room Facility</th>
                                <th style="width:110px;"></th>
                            </tr>
                        </thead>
                        <tbody id="table_room_facilities_body">
                            @foreach($roomfacilities as $roomfacility)
                                <tr id="">
                                    <td>{{ $roomfacility->id }}</td>
                                    <td>{{ $roomfacility->room_facility }}</td>
                                    <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-xs btn-flat btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="#" class="btn btn-xs btn-flat btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                         @if($roomfacility->val == 0)
                                            <button class="btn btn-xs btn-flat btn-success activate-item" type="button"><span class="glyphicon glyphicon-ok-circle"></span></button>
                                            <button class="btn btn-xs btn-flat btn-default disabled deactivate-item" type="button"><span class="glyphicon glyphicon-remove-circle"></span></button>
                                         @else
                                            <button class="btn btn-xs btn-flat btn-default disabled activate-item" type="button"><span class="glyphicon glyphicon-ok-circle"></span></button>
                                            <button class="btn btn-xs btn-flat btn-warning deactivate-item" type="button" ><span class="glyphicon glyphicon-remove-circle"></span></button>
                                         @endif
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>



@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#table_room_facilities").dataTable();
        });




    </script>

@endsection