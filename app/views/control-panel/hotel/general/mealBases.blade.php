@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css')}}
    {{ HTML::script('//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js')}}
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
@section('active-meal-bases')
 {{ 'active' }}
@endsection


@section('content')

<section xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Meal Basis
                    </h3>
                </div>

                <form action="" role="form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="meal_basis">Meal Basis</label>
                            <input id="meal_basis" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="abbreviation">Abbreviation</label>
                            <input id="abbreviation" class="form-control" type="text"/>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control"> </textarea>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Create Meal Basis</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Update Meal Basis</button>
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
                                <th>Basis</th>
                                <th>Basis Name</th>
                                <th>Description</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($mealbases as $mealbasis)
                                <tr>
                                    <td>{{ $mealbasis->id }}</td>
                                    <td>{{ $mealbasis->meal_basis }}</td>
                                    <td>{{ $mealbasis->meal_basis_name }}</td>
                                    <td>{{ $mealbasis->description }}</td>
                                    <td>
                                        <button class="btn-xs btn-group btn-primary">Edit</button>
                                        <button class="btn-xs btn-group btn-danger">Edit</button>
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
            $("#meal-bases-table").dataTable();
        });
    </script>

@endsection