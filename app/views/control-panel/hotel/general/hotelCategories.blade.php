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
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.hotel.hotel_categories.store'))) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.hotel.hotel_categories.update'))) }}
                @endif

                <div class="box-body">

                    <div class="form-group">
                        <label for="hotel_category">Category</label>
                        {{--<input id="hotel_category" name="hotel_category" class="form-control" type="text"/>--}}
                        {{ Form::text('hotel_category', null, array('class' => 'form-control')) }}
                        {{ $errors->first('title', '<p style="color=#900000">:message</p>') }}
                    </div>
                    @if(!Session::has('edit'))
                        <div class="form-group">
                            {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                            {{ Form::submit('Create Hotel Category', array('class' => 'btn btn-primary')) }}
                        </div>
                    @else
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Update Hotel Category</button>
                            <button type="button" class="btn btn-group btn-info">Cancel</button>
                        </div>
                    @endif
                </div>

                {{ Form::close() }}


            </div>
        </div>

        <div class="col-md-8 ">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Hotel Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="hotel-categories-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th style="width:80px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($hotelcategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->hotel_category }}</td>
                                <td>{{ $category->val == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    <div class="" style="display: inline;">

                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotel_categories.edit',$category->id), 'method' =>'put' )) }}
                                        <a type="submit" class="btn btn-xs btn-flat btn-primary"><i
                                                    class="glyphicon glyphicon-edit"></i></a>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.hotel.hotel_categories.destroy',$category->id), 'method' =>'delete')) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-danger "><i
                                                    class="glyphicon glyphicon-trash"></i></button>
                                        {{ Form::close() }}

                                        @if($category->val == 0)
                                            <div class="hidden-md hidden-sm hidden-xs">
                                                {{ Form::open(array('route'=> array('control-panel.hotel.hotel_categories.destroy',$category->id), 'method' =>'delete')) }}
                                                <a class="btn btn-xs btn-flat btn-success activate-item"
                                                   type="button"><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <a class="btn btn-xs btn-flat btn-default disabled deactivate-item"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                                {{ Form::close() }}
                                            </div>
                                            <div class="hidden-lg">
                                                {{ Form::open(array('route'=> array('control-panel.hotel.hotel_categories.destroy',$category->id), 'method' =>'delete')) }}
                                                <a class="btn btn-xs btn-flat btn-success activate-item"
                                                   type="button"><i class="glyphicon glyphicon-ok-circle"></i></a>
                                                <br/>
                                                <a class="btn btn-xs btn-flat btn-default disabled deactivate-item"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></a>
                                                {{ Form::close() }}
                                            </div>
                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.hotel.hotel_categories.destroy',$category->id), 'method' =>'delete')) }}
                                            <a class="btn btn-xs btn-flat btn-default disabled activate-item "
                                               type="button"><i class="glyphicon glyphicon-ok-circle"></i></a>
                                            <a class="btn btn-xs btn-flat btn-warning deactivate-item " type="button"><i
                                                        class="glyphicon glyphicon-remove-circle"></i></a>
                                            {{ Form::close() }}

                                        @endif

                                        {{--<a type="submit" class="btn btn-xs btn-flat btn-primary  "><i class="glyphicon glyphicon-edit"></i></a>--}}
                                        {{--<a type="submit" class="btn btn-xs btn-flat btn-danger  "><i class="glyphicon glyphicon-edit"></i></a>--}}
                                        {{--<a type="submit" class="btn btn-xs btn-flat btn-success  "><i class="glyphicon glyphicon-edit"></i></a>--}}
                                        {{--<a type="submit" class="btn btn-xs btn-flat btn-warning  "><i class="glyphicon glyphicon-edit"></i></a>--}}

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
    </section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#hotel-categories-table").dataTable();

            var url = 'control-panel/hotel/hotel_categories/destroy/';

            $.ajax({
                url: url,
                method: 'delete',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,
                success: function (data) {

                },
                error: function () {

                }

            });


        });
    </script>

@endsection