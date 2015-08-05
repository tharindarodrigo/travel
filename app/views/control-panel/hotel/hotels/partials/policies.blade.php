<section>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Cities
                    </h3>
                </div>

                <form action="" role="form" id="cities_form">

                    <div class="box-body">


                        <div class="form-group">
                            <label for="from">From</label>
                            <input name="from" id="from" class="form-control" type="text"/>
                        </div>
                        <div class="form-group customValidationAlert text-red"></div>

                        <div class="form-group">
                            <label for="from">To</label>
                            <input name="to" id="to" class="form-control" type="text"/>
                        </div>
                        <div class="form-group customValidationAlert text-red"></div>

                        <div class="form-group">
                            <label for="percentage">Percentage</label>
                            <input name="percentage" id="percentage" class="form-control" type="text"/>
                        </div>
                        <div class="form-group customValidationAlert text-red"></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary submit_btn">Add Cancellation Policy</button>
                        </div>

                        <div class="form-group">
                            <button type="button" id="btn_update_cancellataion_policy" class="btn btn-primary btn_update_item">Update Policy</button>
                            <button type="button" id="btn_cancel_cancellataion_policy" class="btn btn-group btn-info btn_cancel_update_item">Cancel</button>
                        </div>
                        <input value="" id="temp_id" hidden="">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Cancellation Policies</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>


<div class="col-md-12">
<hr/>
</div>
<div class="col-md-12">


{{ Form::model($hotelprofile,array('route' => array('control-panel.hotel.hotel-profile.update', $hotelprofile->id), 'method'=> 'put')) }}
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
            <td>
                {{Form::text('infant_age',null, array('class'=>'form-control'))}}

            </td>
            <td>{{Form::text('infant_charge',null, array('class'=>'form-control'))}}</td>
        </tr>
        <tr>
            <th>Child</th>
            <td>{{Form::text('child_age',null, array('class'=>'form-control'))}}</td>
            <td>{{Form::text('child_charge',null, array('class'=>'form-control'))}}</td>
        </tr>
    </tbody>
</table>
    <div class="form-group">
        {{Form::submit('Update Child Policy', array('class'=>'btn btn-primary', 'name'=>'update_policies'))}}
    </div>
{{Form::close()}}

</div>
</div>

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#hotel-policies-table").dataTable();

            confirmDeleteItem();
        });

    </script>

@section('scripts')

     <script type="text/javascript">

             $('document').ready(function(){

                 var update_city = $('#btn_update_city');
                 var cancel_city = $('#btn_cancel_city');

                 update_city.hide();
                 cancel_city.hide();
                 $('.customValidationAlert').hide();

                 var table_id = 'table_cities';
                 var url = 'cities/list';
                 var array = {
                     pages : { refresh : 'cities'},
                     edit_url: 'cities/edit/',
                     delete_url : 'cities/delete/',
                     activate_url: 'cities/activate/',
                     deactivate_url: 'cities/deactivate/',
                     dataFields : ['city_name'],
                     form_bindings : {form_fields : ['#city'], db_fields : ['city_name']}
                 };

                 getTable(url, table_id, array);

                 var formId = '#cities_form';


                 /*-----append FormData-----*/

                 $(formId).submit(function(e){


                    e.preventDefault();
                    var formData = new FormData();
                    formData.append('city', $('#city').val());

                    postForm('cities', formData, 'insert');
                    $.post('cities', {ajax: 'data'}, function(e) {
                        getTable(url, table_id , array);
                    });
                 });

//                 updateForm()

                 $('.btn_update_item').click(function(){
                    //alert($('#city').val());
                    var formData = new FormData();
                    formData.append('city', $('#city').val());

                    var update_id = $('#temp_id').val();

                    postForm('cities/update/'+update_id, formData, 'update');
                    $.post('cities', {ajax: 'data'}, function(e) {
                        getTable(url, table_id , array);
                    });
                    $('.btn_update_item, .btn_cancel_update_item').hide(300);
                    $('.submit_btn').removeAttr("disabled");
                    $('.submit_btn').fadeIn(300);
                    $('.customValidationAlert').hide();

                 });

             });

         </script>

@endsection