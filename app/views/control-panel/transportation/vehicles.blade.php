@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

{{--Title--}}
@section('control-title')
    {{'Transportation'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Vehicles'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Transportation</li>
    <li class="active">Vehicles</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-transportation')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-transportation-vehicles')
 {{ 'active' }}
@endsection


@section('content')

    <section>
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Create Vehicle
                    </h3>
                </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.transportation.vehicles.store'))) }}
                @else
                    {{ Form::model($vehicle,array('route' => array('control-panel.transportation.vehicles.update',$vehicle->id), 'method' => 'patch')) }}
                @endif

                <div class="box-body">

                        <div class="form-group">
                            <label for="vehicle_type">Vehicle Type</label>
                            {{Form::text('vehicle_type', null, array('class'=>'form-control'))}}
                        </div>
                        {{ $errors->first('vehicle_type', '<div class="form-group text-red">:message</div>') }}

                        <div class="form-group">
                            <label for="nights">Passengers</label>
                            {{Form::text('passengers', null, array('class'=>'form-control'))}}
                        </div>
                        {{ $errors->first('passengers', '<div class="form-group text-red">:message</div>') }}

                        <div class="form-group">
                            <label for="rate">Rate</label>
                            {{Form::text('rate', null, array('class'=>'form-control'))}}
                        </div>
                        {{ $errors->first('rate', '<div class="form-group text-red">:message</div>') }}

                        <div class="form-group">
                        @if(!Session::has('edit'))
                            {{Form::submit('Add Package',array('class' => 'btn btn-primary btn-block', 'align'=>'center'))}}
                        @else
                            {{Form::submit('Update Package',array('class' => 'btn btn-primary', 'align'=>'center'))}}
                            {{link_to_route('control-panel.transportation.packages.index', 'Cancel', null, array('class'=>'btn btn-dropbox'))}}
                        @endif
                        </div>
                </div>

                {{ Form::close() }}


            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Vehicles</h3>
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
                    <table id="vehicles-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Millage</th>
                            <th>Passengers</th>
                            <th>Rate</th>

                            <th style="width:120px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->vehicle_type }}</td>
                                <td align="right">{{ $vehicle->passengers }}</td>
                                <td>{{ $vehicle->rate }}</td>
                                <td>
                                    <div class="">

                                        {{ Form::open(array('route'=> array('control-panel.transportation.vehicles.destroy',$vehicle->id), 'method' =>'delete')) }}
                                        {{link_to_route('control-panel.transportation.vehicles.edit','',[$vehicle->id], ['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit'])}}
                                        <button type="button" class="btn btn-sm btn-danger delete-button"><i class="glyphicon glyphicon-trash"></i></button>
                                        {{ Form::close() }}

                                        {{--@if($market->val == 0)--}}
                                            {{--<div class="">--}}
                                                {{--{{ Form::open(array('route'=> array('control-panel.transportation.packages.update',$vehicle->id), 'method' =>'patch')) }}--}}
                                                {{--<button class="btn btn-xs btn-flat btn-success activate-item col-md-3"--}}
                                                   {{--type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>--}}
                                                {{--<button class="btn btn-xs btn-flat btn-default disabled deactivate-item"--}}
                                                   {{--type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>--}}
                                                {{--{{ Form::close() }}--}}
                                            {{--</div>--}}

                                        {{--@else--}}
                                            {{--{{ Form::open(array('route'=> array('control-panel.transportation.packages',$vehicle->id), 'method' =>'patch')) }}--}}
                                            {{--<button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"--}}
                                                {{--type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>--}}
                                            {{--<button class="btn btn-xs btn-flat btn-warning deactivate-item"--}}
                                                {{--type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>--}}
                                            {{--{{ Form::close() }}--}}

                                        {{--@endif--}}


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
{{ HTML::script('control-panel-assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{ HTML::script("control-panel-assets/ajax/js/commonFunctions.js" )}}

    <script type="text/javascript">
        $(function () {
            confirmDeleteItem();
            $("#vehicles-table").dataTable(function(){
                confirmDeleteItem();
            });

        });
    </script>

@endsection