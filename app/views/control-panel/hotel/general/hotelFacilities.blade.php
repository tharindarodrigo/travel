@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Facilities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Hotel Facilities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-hotel-facilities')
 {{ 'active' }}
@endsection


@section('content')

<section>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Hotel Facility
                    </h3>
                </div>

                <form action="{{ Url::route('control-panel.hotel.room-facilities.store') }}" role="form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="facilities">Facility</label>
                            <input id="facilities" class="form-control" type="text"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create Hotel Facility</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-group btn-primary">Update Hotel Facility</button>
                            <button type="button" class="btn btn-group btn-info">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Meal Bases</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="meal-bases-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Facility</th>
                                <th style="width:110px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($hotelfacilities as $facility)
                                <tr>
                                    <td>{{ $facility->id }}</td>
                                    <td>{{ $facility->hotel_facility}}</td>
                                    <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-xs btn-flat btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="#" class="btn btn-xs btn-flat btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                         {{--@if($mealbasis->val == 0)--}}
                                            {{--<button class="btn btn-xs btn-flat btn-success activate-item" type="button"><span class="glyphicon glyphicon-ok-circle"></span></button>--}}
                                            {{--<button class="btn btn-xs btn-flat btn-default disabled deactivate-item" type="button"><span class="glyphicon glyphicon-remove-circle"></span></button>--}}
                                        {{--@else--}}
                                            {{--<button class="btn btn-xs btn-flat btn-default disabled activate-item" type="button"><span class="glyphicon glyphicon-ok-circle"></span></button>--}}
                                            {{--<button class="btn btn-xs btn-flat btn-warning deactivate-item" type="button" ><span class="glyphicon glyphicon-remove-circle"></span></button>--}}
                                        {{--@endif--}}
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
                        $("#hotel-facility-table").dataTable();

                    });
                </script>

@endsection