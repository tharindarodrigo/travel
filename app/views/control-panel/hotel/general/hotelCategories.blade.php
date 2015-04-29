@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Hotel Categories'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Categories</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-hotel-categories')
 {{ 'active' }}
@endsection

@section('content')

<section>
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Hotel Category
                    </h3>
                </div>

                <form action="" role="form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="hotel_category">Category</label>
                            <input id="hotel_category" class="form-control" type="text"/>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Create Hotel Category</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Update Hotel Category</button>
                            <button type="button" class="btn btn-group btn-info">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Hotel Categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="hotel-categories-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th style="width:120px;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($hotelcategories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->hotel_category }}</td>
                                    <td>{{ $category->val == 0 ? 'Inactive' : 'Active' }}</td>
                                    <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-xs btn-flat btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="#" class="btn btn-xs btn-flat btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                         @if($category->val == 0)
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
</section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#hotel-categories-table").dataTable();
        });
    </script>

@endsection