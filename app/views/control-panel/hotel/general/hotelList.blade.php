@extends('control-panel.layout.main')


@section('control-title')
    {{'Hotels'}}
@endsection


@section('control-sub-title')
    {{'Hotel List'}}
@endsection


{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">My Hotels</li>
    <li class="active">Hotel List</li>
@endsection

@section('active-hotels')
 {{ 'active' }}
@endsection


@section('active-hotel-list')
 {{ 'active' }}
@endsection

@section('content')
<section>

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete </b>Hotel List</h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="qweasd" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hotel Name</th>
                            <th>Star Category</th>
                            <th>Hotel Category</th>
                            <th>City</th>
                            <th style="width:60px;">Status</th>
                            <th>Manage</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->name }}</td>
                        <td>{{ $hotel->stars }}</td>
                        <td>
                        @foreach($hotel->category as $cat)
                            {{ $cat->hotel_category.',' }}
                        @endforeach
                        </td>
                        <td>
                            {{ $hotel->city->city  }}
                        </td>
                        <td>{{ $hotel->val== 0 ? 'Inactive' : 'Active' }}</td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-edit edit-item"></span></button>
                                <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash delete-item"></span></button>
                                @if($hotel->val == 0)
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

                    {{ dd(DB::getQueryLog()) }}

                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
</section>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#qweasd").dataTable();
        });
    </script>

@endsection