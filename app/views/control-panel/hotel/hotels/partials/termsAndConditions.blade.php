
    <div class="col-md-6">
        <div class="form-group bootstrap-timepicker">
            <label for="check_in_time ">Check In Time</label>
            {{ Form::text('check_in_time',null, array('class'=>'form-control', 'id' =>'check_in_time') ) }}
        </div>

        <div class="form-group bootstrap-timepicker">
            <label for="check_in_time">Check Out Time</label>
            {{ Form::text('check_out_time',null, array('class'=>'form-control', 'id' =>'check_out_time') ) }}

        </div>
        <div class="form-group">
            <label for="terms_and_conditions">Terms & Condtions</label>
            {{Form::textarea('terms_and_conditions',null,array('class'=>'form-control', 'rows'=>'3'))}}
        </div>
    </div>
