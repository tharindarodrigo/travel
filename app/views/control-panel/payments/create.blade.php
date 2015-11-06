@extends('control-panel.payments.payments')

@section('payment-content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"> Create Payments</h3>
            </div>
            <div class="box-body">
                {{Form::open(array('route'=>array('control-panel.payments.store')))}}
                <div class="form-group">
                    <label for="amount">Agent</label>
                    {{Form::select('agent_id', Agent::orderBy('company')->lists('company','id'), null, array('class'=> 'form-control'))}}
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    {{Form::text('amount', null, array('class'=> 'form-control'))}}
                </div>
                <div class="form-group">
                    <label for="payment_date_time">Date Time</label>
                    {{Form::text('payment_date_time', null, array('class'=> 'form-control', 'id'=>'date', 'autocomplete' => 'off'))}}
                </div>
                <div class="form-group">
                    <label for="">Details</label>
                    {{Form::textarea('payment_date_time', null, array('class'=> 'form-control', 'rows'=>'3'))}}
                </div>
                <div class="form-group">
                    {{Form::submit('Add Payment', array('class'=>'btn btn-primary'))}}
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#payments_table').dataTable();

            $('#date').datepicker();
        });
    </script>
@endsection