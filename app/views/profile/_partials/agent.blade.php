<div class="container">
    <div class="container mt25 offset-0">

        <div class="col-md-12 pagecontainer2 offset-0">
            <div class="row">
                <div class="padding30 grey">
                    <span class="size16px bold dark left">Company Information </span>

                    <div class="clearfix"></div>
                    <div class="line4"></div>

                    <div class="col-md-6">

                        @if($agent=User::userHasAgent())

                            {{Form::model($agent)}}
                            <div class="form-group">
                                <label for="">Company</label>
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
                                {{Form::submit('update',array('class'=> 'btn btn-primary'))}}

                            </div>
                            {{Form::close()}}
                        @else
                            {{Form::open()}}
                            <div class="form-group">
                                <label for="">Company</label>
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
                                {{Form::submit('Create Company',array('class'=> 'btn btn-primary'))}}

                            </div>
                            {{Form::close()}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

