<div class="col-md-12">
<div class="table-responsive">
<table class="table table-responsive table-bordered">
<thead>
    <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Ref. No</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Manage</th>
    </tr>
</thead>
<tbody>

<tr>
    @if($booking->invoice)
    <td>{{$booking->invoice->id}}</td>
    <td>{{$booking->arrival_date}}</td>
    <td>{{$booking->reference_number}}</td>
    <td >{{$booking->invoice->updated_at}}</td>
    <td align="right">USD. {{number_format($booking->invoice->amount,2)}}</td>

    <td></td>

    @endif
</tr>

</tbody>
</table>

</div>
</div>