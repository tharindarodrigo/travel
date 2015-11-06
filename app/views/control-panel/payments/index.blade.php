@extends('control-panel.payments.payments')

@section('payment-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete </b>Payments Types</h3>
            </div>
            <div class="box-body">
                <table class="table" id="payments_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ref. No.</th>
                        <th>Agent</th>
                        <th>Date Time</th>
                        <th>Amount</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    @if(!empty($payments))
                        <tbody>
                        <tr>
                            @foreach($payments as $payment)
                                <td>{{$payment->id}}</td>
                                <td>{{$payment->reference_number}}</td>
                                <td>{{$payment->agent->company}}</td>
                                <td align="center">{{$payment->payment_date_time}}</td>
                                <td align="right">{{number_format($payment->amount,2)}}</td>
                                <td>
                                    {{Form::open(array('route' => array('control-panel.payments.destroy', $payment->id), 'method'=>'delete'))}}
                                    {{link_to_route('control-panel.payments.edit','', [$payment->id], ['class' => 'btn btn-sm btn-primary glyphicon glyphicon-edit '])}}
                                    <button type="button" class="btn btn-sm btn-danger delete-button"><span
                                                class="glyphicon glyphicon-trash "></span></button>
                                    {{Form::close()}}

                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#payments_table').dataTable(
                    confirmDeleteItem()
            );
        });
    </script>
@endsection