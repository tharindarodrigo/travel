@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Stars'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Star Categories'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Stars</li>
    <li class="active">Categories</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-stars')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-star-categories')
    {{ 'active' }}
@endsection

@section('content')

    <section>
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Create Star Category
                    </h3>
                </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.hotel.star-categories.store'))) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.hotel.star-categories.update',$Starcategory->id), 'method' => 'put')) }}
                @endif

                <div class="box-body">

                    <div class="form-group">
                        <label for="star-category">Stars</label>
                        {{ Form::text('stars', Session::get('edit')=='edit' ? $Starcategory->stars : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('stars', '<div class="form-group text-red">:message</div>') }}

                    <div class="form-group">
                        <label for="star_category">Star Category Name</label>
                        {{ Form::text('star_name', Session::get('edit')=='edit' ? $Starcategory->star_name : '', array('class' => 'form-control')) }}
                    </div>
                    {{ $errors->first('star_name', '<div class="form-group text-red">:message</div>') }}

                    @if(!Session::has('edit'))
                        <div class="form-group">
                            {{ Form::submit('Create Star Category', array('class' => 'btn btn-primary')) }}
                        </div>
                    @else
                        <div class="form-group">
                            {{ Form::submit('Update Star Category', array('class' => 'btn btn-primary')) }}
                            <a href="{{ URL::route('control-panel.hotel.star-categories.index') }}" class="btn btn-group btn-info">Cancel</a>
                        </div>
                    @endif
                </div>

                {{ Form::close() }}


            </div>
        </div>

        <div class="col-md-8 ">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Star Categories</h3>
                </div>
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

                
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="star-categories-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>stars</th>
                            <th>name</th>
                            <th style="width:60px;">Status</th>
                            <th style="width:120px;"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($starcategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->stars}}</td>
                                <td>{{ $category->star_name}}</td>
                                <td style="text-align: center;">{{ $category->val == 0 ? 'Inactive' : 'Active' }}</td>
                                <td>
                                    <div class="">
                                        {{ Form::open(array('route'=> array('control-panel.hotel.star-categories.edit',$category->id), 'method' =>'get' )) }}
                                        <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                    class="glyphicon glyphicon-edit"></i></button>
                                        {{ Form::close() }}

                                        {{ Form::open(array('route'=> array('control-panel.hotel.star-categories.destroy',$category->id), 'method' =>'delete')) }}
                                        <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                        {{ Form::close() }}

                                        @if($category->val == 0)
                                            <div class="">
                                                {{ Form::open(array('route'=> array('control-panel.hotel.star-categories.update',$category->id), 'method' =>'patch')) }}
                                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                   type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                                <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                   type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                                {{ Form::close() }}
                                            </div>

                                        @else
                                            {{ Form::open(array('route'=> array('control-panel.hotel.star-categories.update',$category->id), 'method' =>'patch')) }}
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
            $("#star-categories-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection