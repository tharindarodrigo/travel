
<div class="table-responsive">
<table class="table table-responsive table-bordered" id="agent-bookings">
<thead>
    <tr>
        <th style="text-align:center;">Id</th>
        <th style="text-align:center;">Hotel</th>
        <th style="text-align:center;">Check In</th>
        <th style="text-align:center;">Check Out</th>
        <th style="text-align:center;">Room</th>
        <th style="text-align:center;">Basis</th>
        <th style="text-align:center;">Spec</th>
        <th style="text-align:center;">Amount</th>
        <th style="text-align:center;">Controls</th>
    </tr>
</thead>
<tbody>
<style type="text/css">
td {
vertical-align: middle;
}
</style>
@foreach($booking->voucher as $voucher)
<tr>
    <td>{{$voucher->id}}</td>
    <td>{{$voucher->hotel->name}}</td>
    <td>{{$voucher->check_in}}</td>
    <td>{{$voucher->check_out}}</td>
    <td>
        @foreach($voucher->roomBooking as $roomBooking)
            <div style="text-align: center;">{{$roomBooking->roomType->room_type}}</div>
        @endforeach
    </td>

    <td>
    @foreach($voucher->roomBooking as $roomBooking)
            <div style="text-align: center;">{{$roomBooking->mealBasis->meal_basis}}</div>
    @endforeach
    </td>
    <td>
        @foreach($voucher->roomBooking as $roomBooking)
                    <div style="text-align: center;">{{$roomBooking->roomSpecification->room_specification}}</div>
        @endforeach
    </td>
    <td align="right">{{number_format(Voucher::getVoucherAmount($voucher),2)}}</td>

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

                    <div class="col-xs-3 bold">Meal Basis</div><div class="col-xs-7">: {{ ' ' }}</div>

                    <div class="col-xs-3 bold">Amount</div><div class="col-xs-7">: USD {{' '}}</div>
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

</tbody>
</table>


</div>


<input data-toggle="modal" data-target="#new_voucher" class="btn bluebtn pull-right" type="button" id value="Add New Voucher">
<div class="modal " id="new_voucher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-aqua">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Voucher</h4>
      </div>

      <div class="modal-body">
        <h4>Note :</h4>
        <p>You will be redirected to the Home Page. You can search for hotels as you normally do and make bookings</p>
        <div class="check-box">
            {{Form::checkbox("dont_show")}}
            I don't want to see this again
        </div>
      </div>
      <div class="modal-footer">

        {{link_to_route('bookings.vouchers.create','Proceed',array($booking->id),array('class'=>'btn btn-primary'))}}
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
      </div>

    </div>
  </div>
</div>

