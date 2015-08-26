@extends('control-panel.hotel.hotels.hotels')

@section('content')

<section>
<div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete</b> Hotel List</h3>
                {{link_to_route('control-panel.hotel.hotels.create', 'Create New Hotel', null, array('class' =>'btn btn-primary pull-right'))}}
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                @if(Session::has('error-msg'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> Alert!</h5>
                        {{Session::pull('error-msg')}}
                     </div>
                @endif
                <table id="hotel-list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hotel Name</th>
                        <th>Star Category</th>
                        <th>Hotel Category</th>
                        <th>City</th>
                        <th>Created By</th>
                        <th style="width:60px;">Status</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->starCategory->stars }}</td>

                    <td>
                    @foreach($hotel->HotelCategory as $cat)
                        {{ $cat->hotel_category.' | ' }}
                    @endforeach
                    </td>

                    <td>
                        {{ $hotel->city->city }}
                    </td>
                    <td>
                        {{--{{ $hotel->users->first_name.' '.$hotel->users->last_name }}--}}
                    </td>
                    <td>{{ $hotel->val== 0 ? 'Inactive' : 'Active' }}</td>

                        <td style="width: 170px">

                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.edit', $hotel->id), 'method' =>'get' )) }}
                            <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i class="glyphicon glyphicon-edit"></i></button>
                            {{ Form::close() }}

                            {{ Form::open(array('route'=> array('control-panel.hotel.hotels.destroy', $hotel->id), 'method' =>'delete' )) }}
                            <button type="button" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></button>
                            {{ Form::close() }}

                            @if($hotel->val == 0)
                                <div class="">
                                    {{ Form::open(array('route'=> array('control-panel.hotel.hotels.update', $hotel->id), 'method' =>'patch')) }}
                                    <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                       type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                    <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                       type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                    {{ Form::close() }}
                                </div>
                            @else
                                {{ Form::open(array('route'=> array('control-panel.hotel.hotels.update', $hotel->id), 'method' =>'patch')) }}
                                     <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                    type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                    <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                    type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                {{ Form::close() }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                {{--{{ dd(DB::getQueryLog()) }}--}}
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
</section>
@endsection

@section('script')
<script type="text/javascript">
$(function(){

//    alert()


    $("#hotel-list").dataTable({
    function: confirmDelete()
    });
});

</script>
@endsection