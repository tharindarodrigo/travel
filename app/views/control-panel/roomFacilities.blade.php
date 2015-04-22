@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Room Facilities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Room Facilities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-room-facilities')
 {{ 'active' }}
@endsection


@section('content')


<section>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Room Facility
                    </h3>
                </div>

                <form action="" role="form" id="meal_basis_form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="room_facility_name">Room Facility Name</label>
                            <input id="room_facility_name" class="form-control" type="text"/>
                        </div>

                        <div class="form-group customValidationAlert">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="btn_create_room_facility">Create Room Facility</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-group btn-primary" id="btn_update_room_facility">Update Room Facility</button>
                            <button type="button" class="btn btn-group btn-info" id="btn_cancel_room_facility">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Room Facilities</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                <!-- room facilities table -->
                    <table id="table_room_facilities" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Facility</th>
                                <th style="width: 100px;"></th>

                            </tr>
                        </thead>
                        <tbody id="table_room_facilities_body">
                            <tr id="1">
                                <td>1</td>
                                <td>Hot Water</td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                        <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-edit edit-item"></span></button>
                                        <button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-trash delete-item"></span></button>
                                        <button class="btn btn-success" type="button"><span class="glyphicon glyphicon-ok activate-item"></span></button>
                                        <button class="btn bg-yellow" type="button"><span class="glyphicon glyphicon-remove-circle deactivate-item"></span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Facility</th>
                                <th></th>

                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#table_room_facilities").dataTable();
        });

        $('document').ready(function(){
            var update_room_facility = $('#btn_update_room_facility');
            var cancel_room_facility = $('#btn_cancel_room_facility');

            update_room_facility.hide();
            cancel_room_facility.hide();
            $('.customAlert').hide();

            var edit_item = '.edit-item';
            var delete_item = '.delete-item';
            var activate_item = '.activate-item';
            var deactivate_item = '.deactivate-item';

            var formId = '#meal_basis_form';

            $(formId).submit(function(e){

            e.preventDefault();

            var formData = new FormData();
            formData.append('room_facility_name', $('#room_facility_name').val());

                $.ajax({
                    url: 'room-facilities',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    data: formData,
                    success: function(data){
                        if(!data.success){
                            $.each(data.errors, function(index, error){
                                //alert(error);
                                //$('input').find('#room_facility');

                                var id = '#'+index;
                                var div = $(id).closest('div').next('.customValidationAlert');
                                div.html(error);
                                if(!div.is){
                                    div.hide(300);
                                }
                                div.slideDown(1000);
                            });

                        } else {
                            $('.customValidationAlert').html('');
                            $('form').find('input[type=text], textarea').val('');
                            alert('success!');
                        }
                    },
                    error: function(){

                    }
                })
            });



            $(edit_item).click(function(){
                alert('edit_item');
            });
            $(delete_item).click(function(){
                alert('delete_item');
            });
            $(activate_item).click(function(){
                alert('activate_item');
            });
            $(deactivate_item).click(function(){
                alert('deactivate_item');
            });

        });




    </script>

@endsection