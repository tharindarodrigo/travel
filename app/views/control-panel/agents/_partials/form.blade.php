    <div class="form-group">
        <label for="market_id">Market</label>
        {{Form::select('market_id',Market::lists('market','id'),null,array('class'=>'form-control'))}}
    </div>    <div class="form-group">
        <label for="company">Company</label>
        {{Form::text('company',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        {{Form::text('address',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        {{Form::text('email',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        {{Form::text('phone',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">
        <label for="tax">Tax</label>
        {{Form::text('tax',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">

        <label for="tax_type">Tax Type</label>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="radio">
                    {{Form::radio('tax_type', 1).'$'}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="radio">
                    {{Form::radio('tax_type', 0).'%'}}
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="handling_fee">Handling Fee</label>
        {{Form::text('handling_fee',null,array('class'=>'form-control'))}}
    </div>
    <div class="form-group">

        <label for="handling_fee_type">Handling Fee Type</label>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="radio">
                    {{Form::radio('handling_fee_type',1).'$'}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="radio">
                    {{Form::radio('handling_fee_type',0).'%'}}
                </div>
            </div>
        </div>
    </div>
