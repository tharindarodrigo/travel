@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

{{--Title--}}
@section('control-title')
    {{'Tranportation'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Packages'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Transportation</li>
    <li class="active">Packages</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-transportation')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-transportation-packages')
    {{ 'active' }}
@endsection


@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Create Market
                    </h3>
                </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.transportation.packages.store'))) }}
                @else
                    {{ Form::model($transportpackage,array('route' => array('control-panel.transportation.packages.update',$transportpackage->id), 'method' => 'patch')) }}
                @endif

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="vehicle_id">Vehicle</label>
                                {{Form::select('vehicle_id', Vehicle::lists('vehicle_type','id'),null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('vehicle_id', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="days">Days</label>
                                {{Form::text('days', null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('days', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="nights">Nights</label>
                                {{Form::text('nights', null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('nights', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="millage">Millage</label>
                                {{Form::text('millage', null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('millage', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="rate">Rate</label>
                                {{Form::text('rate', null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('rate', '<div class="form-group text-red">:message</div>') }}

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origin">Origin</label>
                                {{Form::select('origin', City::lists('city','id'),null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('origin', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="destination">Destination</label>
                                {{Form::select('destination', City::lists('city','id'),null, array('class'=>'form-control'))}}
                            </div>
                            {{ $errors->first('destination', '<div class="form-group text-red">:message</div>') }}

                            <div cla ss="form-group">
                                <label for="start_date">Start Date</label>
                                {{Form::text('start_date', null, array('class'=>'form-control date-control'))}}
                            </div>
                            {{ $errors->first('start_date', '<div class="form-group text-red">:message</div>') }}

                            <div class="form-group">
                                <label for="end_date">Ending Date</label>
                                {{Form::text('end_date', null, array('class'=>'form-control date-control'))}}
                            </div>
                            {{ $errors->first('end_date', '<div class="form-group text-red">:message</div>') }}

                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            @if(!Session::has('edit'))
                                {{Form::submit('Add Package',array('class' => 'btn btn-primary btn-block', 'align'=>'center'))}}
                            @else
                                {{Form::submit('Update Package',array('class' => 'btn btn-primary', 'align'=>'center'))}}
                                {{link_to_route('control-panel.transportation.packages.index', 'Cancel', null, array('class'=>'btn btn-dropbox'))}}
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
                    <h3 class="box-title"><b>Search / Update / Delete</b> Markets</h3>
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
                            <table id="transport-packages" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Millage</th>
                                    <th style="width:60px;">days</th>
                                    <th style="width:60px;">nights</th>
                                    <th>Origin</th>
                                    <th>Destination</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th style="width:120px;"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $package->id }}</td>
                                        <td>{{ $package->millage }}</td>
                                        <td>{{ $package->days }}</td>
                                        <td>{{ $package->nights }}</td>
                                        <td>{{ $package->origin}}</td>
                                        <td>{{ $package->destination}}</td>
                                        <td>{{ $package->start_date }}</td>
                                        <td>{{ $package->end_date }}</td>
                                        <td>
                                            <div class="">

                                                {{ Form::open(array('route'=> array('control-panel.transportation.packages.destroy',$package->id), 'method' =>'delete')) }}
                                                {{link_to_route('control-panel.transportation.packages.edit','',[$package->id], ['class'=>'btn btn-primary btn-sm glyphicon glyphicon-edit'])}}
                                                <button type="button" class="btn btn-sm btn-danger delete-button"><i
                                                            class="glyphicon glyphicon-trash"></i></button>
                                                {{ Form::close() }}

                                                {{--@if($market->val == 0)--}}
                                                {{--<div class="">--}}
                                                {{--{{ Form::open(array('route'=> array('control-panel.transportation.packages.update',$package->id), 'method' =>'patch')) }}--}}
                                                {{--<button class="btn btn-xs btn-flat btn-success activate-item col-md-3"--}}
                                                {{--type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>--}}
                                                {{--<button class="btn btn-xs btn-flat btn-default disabled deactivate-item"--}}
                                                {{--type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>--}}
                                                {{--{{ Form::close() }}--}}
                                                {{--</div>--}}

                                                {{--@else--}}
                                                {{--{{ Form::open(array('route'=> array('control-panel.transportation.packages',$package->id), 'method' =>'patch')) }}--}}
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
            $("#transport-packages").dataTable(function () {
                confirmDeleteItem();
            });

            $('.date-control').datepicker({
                format: 'yyyy-mm-dd'
            });

        });
    </script>

@endsection