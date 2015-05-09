@extends('control-panel.layout.main')

@section('head-scripts')

@endsection

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Meal Bases'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Meal Bases</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-meal-bases')
 {{ 'active' }}
@endsection


@section('content')
<section>
    <div class="col-md-4">
        <div class="box box-primary ">
            <div class="box-header">
                <h3 class="box-title">
                     Create Room Facility
                </h3>
            </div>

            @if(!Session::has('edit'))
                {{ Form::open(array('route' => array('control-panel.hotel.meal-bases.store'))) }}
            @else
                {{ Form::open(array('route' => array('control-panel.hotel.meal-bases.update',$Mealbasis->id), 'method' => 'put')) }}
            @endif

                <div class="box-body">

                    <div class="form-group">
                        <label for="meal_basis">Meal Basis</label>
                        {{ Form::text('meal_basis',Session::get('edit')=='edit' ? $Mealbasis->meal_basis : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('meal_basis', '<div class="form-group text-red">:message</div>') }}

                    <div class="form-group">
                        <label for="meal_basis_name">Meal Basis Name</label>
                        {{ Form::text('meal_basis_name',Session::get('edit')=='edit' ? $Mealbasis->meal_basis_name : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('meal_basis_name', '<div class="form-group text-red">:message</div>') }}

                    <div class="form-group">
                        <label for="description">Description</label>
                        {{ Form::textarea('description',Session::get('edit')=='edit' ? $Mealbasis->description : '', array('class' => 'form-control', 'rows' => 3)) }}
                    </div>
                    {{ $errors->first('description', '<div class="form-group text-red">:message</div>') }}


                    @if(!Session::has('edit'))
                        <div class="form-group">
                            {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                            {{ Form::submit('Create Room Facility', array('class' => 'btn btn-primary')) }}
                        </div>
                    @else
                        <div class="form-group">
                            {{ Form::submit('Update Room Facility', array('class' => 'btn btn-primary')) }}
                            <a href="{{ URL::route('control-panel.hotel.meal-bases.index') }}" class="btn btn-group btn-info">Cancel</a>
                        </div>
                    @endif
                </div>
            {{ Form::close() }}
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
                            <th>Basis</th>
                            <th>Basis Name</th>
                            <th>Description</th>
                            <th style="width:70px;">Status</th>
                            <th style="width:120px;"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($mealbases as $mealbasis)
                            <tr>
                                <td>{{ $mealbasis->id }}</td>
                                <td>{{ $mealbasis->meal_basis }}</td>
                                <td>{{ $mealbasis->meal_basis_name }}</td>
                                <td>{{ $mealbasis->description }}</td>
                                <td>{{ $mealbasis->val == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>
                                <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.hotel.meal-bases.edit',$mealbasis->id), 'method' =>'get' )) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.hotel.meal-bases.destroy',$mealbasis->id), 'method' =>'delete')) }}
                                        <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                        {{ Form::close() }}

                                        @if($mealbasis->val == 0)
                                            <div class="">
                                                {{ Form::open(array('route'=> array('control-panel.hotel.meal-bases.update',$mealbasis->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.hotel.meal-bases.update',$mealbasis->id), 'method' =>'patch')) }}
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
            $("#meal-bases-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection