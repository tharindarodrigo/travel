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

        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Hotel Facility
                    </h3>
                </div>

                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.hotel.hotel-facilities.store'), 'files' => true)) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.hotel.hotel-facilities.update',$Hotelfacility->id), 'files' => true, 'method' => 'put')) }}
                @endif


                    <div class="box-body">

                        <div class="form-group">
                            <label for="hotel_facility">Hotel Facility Name</label>
                            {{ Form::text('hotel_facility',Session::get('edit')=='edit' ? $Hotelfacility->hotel_facility : '', array('class' => 'form-control')) }}
                        </div>
                        {{ $errors->first('hotel_facility', '<div class="form-group text-red">:message</div>') }}
                        <div class="form-group">
                            <label for="hotel_facility">Facility Icon</label>
                            {{ Form::file('icon')}}
                        </div>
                        {{ $errors->first('icon', '<div class="form-group text-red">:message</div>') }}

                        @if(!Session::has('edit'))
                            <div class="form-group">
                                {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                                {{ Form::submit('Create Hotel Facility', array('class' => 'btn btn-primary')) }}
                            </div>
                        @else
                            <div class="form-group">
                                {{ Form::submit('Update Hotel Facility', array('class' => 'btn btn-primary')) }}
                                <a href="{{ URL::route('control-panel.hotel.hotel-facilities.index') }}" class="btn btn-group btn-info">Cancel</a>
                            </div>
                        @endif
                    </div>
                {{ Form::close() }}
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Hotel Facilities</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if(Session::has('successful-action'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                        {{ Session::get('successful-action') }}
                    </div>
                    @endif
                    @if(Session::has('unsuccessful-action'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>	<i class="icon fa fa-check"></i> Alert!</h4>
                        {{ Session::get('unsuccessful-action') }}
                    </div>
                    @endif
                <div class="box-body table-responsive">
                    <table id="hotel-facilities-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hotel Facility</th>
                                <th style="width:20px;">Icon</th>
                                <th style="width:60px;">Status</th>
                                <th style="width:120px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotelfacilities as $hotelfacility)
                                <tr id="">
                                    <td>{{ $hotelfacility->id }}</td>
                                    <td>{{ $hotelfacility->hotel_facility }}</td>
                                    <td style="text-align: center">{{ HTML::image('control-panel-assets/images/hotel-facilities/'.$hotelfacility->id.'.png','icon') }}</td>
                                    <td style="text-align: center;">{{ $hotelfacility->val == 0 ? 'Inactive' : 'Active' }}</td>

                                    <td>
                                    <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotel-facilities.edit',$hotelfacility->id), 'method' =>'get' )) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotel-facilities.destroy',$hotelfacility->id), 'method' =>'delete')) }}
                                        <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                        {{ Form::close() }}

                                        @if($hotelfacility->val == 0)
                                            <div class="">
                                                {{ Form::open(array('route'=> array('control-panel.hotel.hotel-facilities.update',$hotelfacility->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.hotel.hotel-facilities.update',$hotelfacility->id), 'method' =>'patch')) }}
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
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
</section>



@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#hotel-facilities-table").dataTable();

            confirmDeleteItem();
        });




    </script>

@endsection