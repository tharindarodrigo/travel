{{Form::model($hotelprofile ,array('route'=>'control-panel.hotel.hotel-profile.store',$hotelprofile->id))}}
<h4>Child Policy</h4>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Max. Age</th>
            <th>% Charged</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Infant</th>
            <td>{{Form::text('infant_age',null, array('class'=>'form-control'))}}</td>
            <td>{{Form::text('infant_charge',null, array('class'=>'form-control'))}}</td>
        </tr>
        <tr>
            <th>Child</th>
            <td>{{Form::text('child_age',null, array('class'=>'form-control'))}}</td>
            <td>{{Form::text('child_charge',null, array('class'=>'form-control'))}}</td>
        </tr>

    </tbody>
</table>

<div class="col-md-12"><h4>Cancelation Policy</h4></div>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>% Charged</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input class="form-control" type="text"/></td>
            <td><input class="form-control" type="text"/></td>
            <td><input class="form-control" type="text"/></td>
            <td>
                <button type="button" class="btn btn-group btn-xs btn-primary add_cancellation_policy">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <button type="button" class="btn btn-group btn-xs btn-danger remove_cancellation_policy">
                    <span class="glyphicon glyphicon-minus"></span>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Terms & Conditions</button>
    </div>
{{Form::close()}}