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
                                <td>{{$payment->refenrece_number}}</td>
                                <td>{{$payment->agent->company}}</td>
                                <td>{{$payment->payment_date_time}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>

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
            $('#payments_table').dataTable();
        });
    </script>
@endsection