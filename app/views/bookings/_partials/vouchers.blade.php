<div class="col-md-12">
<div class="row">
<div class="table-responsive">
<table class="table table-responsive table-bordered">
<thead>
    <tr>
        <th>Id</th>
        <th>Hotel</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Room</th>
        <th>Meal Basis</th>
        <th>Amount</th>
        <th>Controls</th>
    </tr>
</thead>
<tbody>

@foreach($booking->voucher as $voucher)
<tr>
    <td>{{$voucher->id}}</td>
    <td>{{$voucher->hotel->name}}</td>
    <td>{{$voucher->check_in}}</td>
    <td>{{$voucher->check_out}}</td>
    <td>{{$voucher->roomType->room_type}}</td>
    <td>{{$voucher->mealBasis->meal_basis}}</td>
    <td>{{$voucher->amount}}</td>
    <td>
    {{Form::open(array('route'=>array('bookings.flightDetails.destroy',$booking->id,$voucher->id), 'method'=>'delete'))}}
    @if($voucher->val == 1)
        <button type="button" class="btn btn-danger btn-sm delete-button" value="{{$voucher->id.'_flight'}}"><span class="glyphicon glyphicon-trash"></span></button>
        <button type="button" class="btn btn-warning btn-sm" value="{{$voucher->id.'_flight'}}"><span class="glyphicon glyphicon-trash"></span></button>
    @else

    @endif
        <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></button>

        <button class="btn btn-sm" data-toggle="modal" data-target="#voucherModal_{{$voucher->id}}" ><span class="glyphicon glyphicon-eye-open"></span></button>
    {{Form::close()}}
        <div class="modal fade" id="voucherModal_{{$voucher->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Booking - Clients</h4>
              </div>

              <div class="modal-body">

                <div class="row">
                    <div class="col-xs-3 bold">Hotel</div><div class="col-xs-7">: {{$voucher->hotel->name}}</div>

                    <div class="col-xs-3 bold">Checkin</div><div class="col-xs-7">: {{$voucher->check_in}}</div>

                    <div class="col-xs-3 bold">Checkout</div><div class="col-xs-7">: {{$voucher->check_out}}</div>

                    <div class="col-xs-3 bold">Meal Basis</div><div class="col-xs-7">: {{$voucher->mealBasis->meal_basis}}</div>

                    <div class="col-xs-3 bold">Amount</div><div class="col-xs-7">: USD {{number_format($voucher->amount,2)}}</div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
    </td>
</tr>
@endforeach

{{--<tr class="warning">--}}
        {{--{{Form::open(array('route'=>array('bookings.flightDetails.store',$booking->id)))}}--}}
        {{--<td>&nbsp;</td>--}}
        {{--<td>--}}
            {{--{{Form::text('date',null, array('class'=>'form-control date-control', 'placeholder'=> 'Date'))}}--}}
            {{--{{$errors->first('date', '<span class="size12" style="color: red;">:message</span>') }}--}}
        {{--</td>--}}
        {{--<td>--}}
            {{--{{Form::text('time',null, array('class'=>'form-control time-control', 'placeholder'=> 'Time'))}}--}}
            {{--{{$errors->first('time', '<span class="size12" style="color: red;">:message</span>') }}--}}
        {{--</td>--}}
        {{--<td>--}}
            {{--{{Form::text('flight',null,array('class'=>'form-control', 'placeholder'=> 'Flight'))}}--}}
            {{--{{$errors->first('flight', '<span class="size12" style="color: red;">:message</span>') }}--}}
        {{--</td>--}}
        {{--<td>--}}
            {{--{{Form::select('flight_type',array(''=>'Flight Type', 1=>'arrival',0=>'departure'),null,array('class'=>'form-control'))}}--}}
            {{--{{$errors->first('flight_type', '<span class="size12" style="color: red;">:message</span>') }}--}}
        {{--</td>--}}
        {{--<td>{{Form::submit('Add Flight', array('class'=>'btn btn-primary'))}}</td>--}}
        {{--{{Form::close()}}--}}
    {{--</tr>--}}

</tbody>
</table>



</div>
</div>
</div>