@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'General'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Markets'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Markets</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-general')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-general-markets')
 {{ 'active' }}
@endsection


@section('content')

    <section>
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Create Market
                    </h3>
                </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.general.markets.store'))) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.general.markets.update',$Market->id), 'method' => 'put')) }}
                @endif

                <div class="box-body">

                    <div class="form-group">
                        <label for="market">Market</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::text('market', Session::get('edit')=='edit' ? $Market->market : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('market', '<div class="form-group text-red">:message</div>') }}
                    @if(!Session::has('edit'))
                        <div class="form-group">
                            {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                            {{ Form::submit('Create Hotel Category', array('class' => 'btn btn-primary')) }}
                        </div>
                    @else
                        <div class="form-group">
                            {{ Form::submit('Update Hotel Category', array('class' => 'btn btn-primary')) }}
                            <a href="{{ URL::route('control-panel.general.markets.index') }}" class="btn btn-group btn-info">Cancel</a>
                        </div>
                    @endif
                </div>

                {{ Form::close() }}


            </div>
        </div>

        <div class="col-md-8 ">
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
                    <table id="hotel-categories-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th style="width:60px;">Status</th>
                            <th style="width:120px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($markets as $market)
                            <tr>
                                <td>{{ $market->id }}</td>
                                <td>{{ $market->market }}</td>
                                <td style="text-align: center;">{{ $market->val == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.general.markets.edit',$market->id), 'method' =>'get' )) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.general.markets.destroy',$market->id), 'method' =>'delete')) }}
                                        <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                        {{ Form::close() }}

                                        @if($market->val == 0)
                                            <div class="">
                                                {{ Form::open(array('route'=> array('control-panel.general.markets.update',$market->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.general.markets.update',$market->id), 'method' =>'patch')) }}
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
            $("#hotel-categories-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection