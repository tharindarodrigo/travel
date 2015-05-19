@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'General'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Cities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-general')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-general-cities')
 {{ 'active' }}
@endsection



@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Create City
                    </h3>
                </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.general.cities.store'))) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.general.cities.update',$City->id), 'method' => 'put')) }}
                @endif

                <div class="box-body">

                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::select('country_id',Country::lists('country','id'), null, array('class' => 'form-control'))}}
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::text('city', Session::get('edit')=='edit' ? $City->city : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('city', '<div class="form-group text-red">:message</div>') }}
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::text('longitude', Session::get('edit')=='edit' ? $City->longitude : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('longitude', '<div class="form-group text-red">:message</div>') }}
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::text('latitude', Session::get('edit')=='edit' ? $City->latitude : '', array('class' => 'form-control')) }}
                    </div>
                    </div>
                    {{ $errors->first('latitude', '<div class="form-group text-red">:message</div>') }}
                    <div class="row">
                    <div class="col-md-12">
                    @if(!Session::has('edit'))
                        <div class="form-group">
                            {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                            {{ Form::submit('Create City', array('class' => 'btn btn-primary')) }}
                        </div>
                    @else
                        <div class="form-group">
                            {{ Form::submit('Update City', array('class' => 'btn btn-primary')) }}
                            <a href="{{ URL::route('control-panel.general.cities.index') }}" class="btn btn-group btn-info">Cancel</a>
                        </div>
                    @endif
                    </div>
                    </div>
                </div>

                {{ Form::close() }}


            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Cities</h3>
                </div>
                <div class="box-body">
                @if(Session::has('successful-action'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    {{ Session::get('successful-action') }}
                </div>
                @endif
                @if(Session::has('unsuccessful-action'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    {{ Session::get('unsuccessful-action') }}
                </div>
                @endif


                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="cities-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th style="width:60px;">Status</th>
                            <th style="width:120px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->city }}</td>
                                <td>{{ $city->country->country }}</td>
                                <td>{{ $city->longitude }}</td>
                                <td>{{ $city->latitude }}</td>
                                <td style="text-align: center;">{{ $city->val == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.general.cities.edit',$city->id), 'method' =>'get')) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3" style="float: left"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.general.cities.destroy',$city->id), 'method' =>'delete', 'style'=>'float-left')) }}
                                        <button class="btn btn-xs btn-flat btn-danger delete-button col-md-3" stlye="float: left"><i class="glyphicon glyphicon-trash"></i></button>
                                        {{ Form::close() }}

                                        @if($city->val == 0)
                                            <div class="">
                                                {{ Form::open(array('route'=> array('control-panel.general.cities.update',$city->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button class="btn btn-xs btn-flat btn-default float-left disabled deactivate-item col-md-3"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.general.cities.update',$city->id), 'method' =>'patch')) }}
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>
    </section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#cities-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection