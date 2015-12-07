@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

@section('hotel-nav-bar')
<li class="">{{link_to_route('control-panel.hotel.hotels.edit','Hotel Profile',array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.room-types.index' ,'Rooms', array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.rates.index','Rates' ,array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.supplement-rates.index','Supplement Rates' ,array($hotelid))}}</li>
<li class="active">{{link_to_route('control-panel.hotel.hotels.allotments.index','Allotments' ,array($hotelid))}}</li>
@endsection

{{--Title--}}
@section('control-title')
    {{'Hotel'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Allotments'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotel</li>
    <li class="active">Allotments</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-create-hotel')
    {{--{{ 'active' }}--}}
@endsection

@section('content')
<div class="col-md-12">
    <div class="row">
       <div class="col-md-4">
           <div class="box box-primary">
               <!-- /.box-header -->

               <div class=" box-header">
                   <h4>Allotments</h4>
               </div>
               @if(!Session::has('edit'))
                   {{ Form::open(array('route' => array('control-panel.hotel.hotels.allotments.store', $hotelid))) }}
               @else
               {{--{{dd('asdasd')}}--}}
                   {{ Form::open(array('route' => array('control-panel.hotel.hotels.allotments.update',$hotelid,$allotment->id), 'method' => 'put')) }}
               @endif
               <div class="box-body table-responsive">

                   <div class="form-group">
                       {{Form::label('room_type_id','Room Type')}}
                       @if(!Session::has('edit'))
                          {{Form::select('room_type_id', array('' => 'Select a Room Type')+RoomType::where('hotel_id', $hotelid)->lists('room_type','id'), 'Select Room', array('class' => 'form-control', 'id'=>'room_type_id'))}}
                       @else
                      {{--{{dd('asdasd')}}--}}
                          <p>{{$allotment->roomType->room_type}}</p>
                          <input name="room_type_id" value="{{$allotment->room_type_id}}" type="hidden"/>

                       @endif
                   </div>
                   {{ $errors->first('room_type_id', '<div class="form-group text-red">:message</div>') }}

                   <div class="form-group">
                       {{Form::label('from','From')}}
                       {{Form::text('from', Session::get('edit') == 'edit'? $allotment->from: '', array('class'=>'form-control', 'id'=>'from', 'autocomplete' => 'off'))}}
                   </div>
                   {{ $errors->first('from', '<div class="form-group text-red">:message</div>') }}

                   <div class="form-group">
                       {{Form::label('to','To')}}
                       {{Form::text('to', Session::get('edit') == 'edit'? $allotment->to: '', array('class'=>'form-control', 'id'=>'to', 'autocomplete' => 'off'))}}
                   </div>
                   {{ $errors->first('to', '<div class="form-group text-red">:message</div>') }}

                   <div class="form-group">
                       {{Form::label('rooms','No. of Rooms')}}
                       {{Form::text('rooms', Session::get('edit') == 'edit'? $allotment->rooms: '', array('class'=>'form-control'))}}
                   </div>
                   {{ $errors->first('rooms', '<div class="form-group text-red">:message</div>') }}

                   @if(!Session::has('edit'))
                       <div class="form-group">
                           {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                           {{ Form::submit('Create Allotment', array('class' => 'btn btn-primary')) }}
                       </div>
                   @else
                       <div class="form-group">
                           {{ Form::submit('Update Allotment', array('class' => 'btn btn-primary')) }}
                           <a href="{{ URL::route('control-panel.hotel.hotels.allotments.index', $hotelid) }}" class="btn btn-group btn-info">Cancel</a>
                       </div>
                   @endif

                   <input id="hotelid" value="{{$hotelid}}" type="hidden"/>
               </div>
              {{Form::close()}}
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
                           <th>From</th>
                           <th>To</th>
                           <th>Room Type</th>
                           <th>rooms</th>
                           <th style="width:60px;">Status</th>
                           <th style="width:120px;"></th>
                       </tr>
                       </thead>
                       <tbody>

                       @foreach($allotments as $allotment)
                           <tr>
                               <td>{{ $allotment->id }}</td>
                               <td>{{ $allotment->from }}</td>
                               <td>{{ $allotment->to }}</td>
                               <td>{{ $allotment->roomType->room_type}}</td>
                               <td>{{ $allotment->rooms}}</td>
                               <td style="text-align: center;">{{ $allotment->val == 0 ? 'Inactive' : 'Active' }}</td>
                               <td>
                                   <div class="">
                                       {{ Form::open(array('route'=> array('control-panel.hotel.hotels.allotments.edit',$hotelid,$allotment->id), 'method' =>'get' )) }}
                                       <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                   class="glyphicon glyphicon-edit"></i></button>
                                       {{ Form::close() }}

                                       {{ Form::open(array('route'=> array('control-panel.hotel.hotels.allotments.destroy',$hotelid,$allotment->id), 'method' =>'delete')) }}
                                       <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                       {{ Form::close() }}

                                       @if($allotment->val == 0)
                                           <div class="">
                                               {{ Form::open(array('route'=> array('control-panel.hotel.hotels.allotments.update',$hotelid,$allotment->id), 'method' =>'patch')) }}
                                               <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                                  type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                               <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                                  type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                               {{ Form::close() }}
                                           </div>

                                       @else
                                           {{ Form::open(array('route'=> array('control-panel.hotel.hotels.allotments.update',$hotelid,$allotment->id), 'method' =>'patch')) }}
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
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function(){

    $('#from').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#to').datepicker({
        format: 'yyyy-mm-dd'
    });

    confirmDeleteItem();


});
</script>


{{ HTML::script('control-panel-assets/plugins/datepicker/bootstrap-datepicker.js')}}
{{ HTML::script('control-panel-assets/ajax/maskedInput.js')}}

@stop