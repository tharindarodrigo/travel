@extends('control-panel.hotel.rooms.rooms')
@section('bread-crumbs')
    <li class="active">My Hotels</li>
    <li class="active">{{Hotel::find($hotelid)->name}}</li>
    <li class="active">Rooms</li>
@endsection

@section('room-content')
<div class="row">
    <div class="col-md-12">

    {{Form::model($roomtype, array('route'=>array('control-panel.hotel.hotels.room-types.update',$hotelid, $roomtype->id), 'id'=>'form','method'=>'patch', 'files'=>true))}}
        <div class="col-md-6">

            @if(Session::has('successmessage'))
            <div id="callout" class="callout callout-success">
                <p>{{Session::pull('successmessage')}}</p>
            </div>
            @endif

            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Room Specification</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="form-group">

                            {{Form::label('room_type','Room Type')}}
                            {{Form::text('room_type',null, array('class'=>'form-control'))}}
                            {{ $errors->first('room_type', '<div class="form-group text-red">:message</div>') }}


                        </div><!-- /.box-body -->
                        <div class="form-group">

                            {{Form::label('description','Description')}}
                            {{Form::textarea('description',null, array('class'=>'form-control', 'rows'=>'3'))}}

                        </div><!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Room Facilities</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                    <div class="row">

                    @foreach($roomfacilitieslist as $roomfacility)
                    <div class="col-md-4">
                        <label for="">
                            {{ Form::checkbox('room_facility_id[]', $roomfacility->id, in_array($roomfacility->id, $checkedroomfacilities)) }}
                            {{ $roomfacility->room_facility }}
                        </label>
                    </div>
                    @endforeach

                    </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Room Details</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <table class="table table-mailbox">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Room Type</th>
                                    <th>Adults</th>
                                    <th>Child</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                            Room Specifications table
                            @foreach($roomspecificationlist as $roomspecification)
                                <tr>
                                    <td>{{Form::checkbox('room_specification_id[]',$roomspecification->id,in_array($roomspecification->id,$checkedroomspecifications))}}</td>
                                    <td>{{$roomspecification->id}}</td>
                                    <td>{{$roomspecification->room_specification}}</td>
                                    <td>{{$roomspecification->adults}}</td>
                                    <td>{{$roomspecification->children}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Upload Images</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">

                        <div class="form-group">
                            {{ Form::file('images[]', array('multiple'=>true, 'id'=>'images')) }}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" id="room_type_submit" value="">Update Room Type</button>
                        </div>
                    </div>
            </div>
        </div>

        </div>
        {{Form::close()}}

        {{Form::open(array('route' => array('control-panel.hotel.hotels.room-types.update',$hotelid, $roomtype->id), 'method'=>'patch'))}}

        <div class="col-md-6">
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Images</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">

                        <div class="form-group">
                                @if(!empty($roomImages))
                                    @foreach($roomImages as $image)

                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                {{ Form::checkbox('files_to_delete[]', $image) }}
                                                {{ HTML::image('control-panel-assets/images/room-images/'.$image, 'a picture', array('class' => 'thumb', 'width'=>100, 'height'=>75)) }}
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                        </div>


                    </div><!-- /.box-body -->
                    <div style="display: block;" class="box-footer">
                        <div class="form-group">
                            {{Form::submit('Delete Selected Images',array('class'=>'btn btn-danger col-md-offset-4', 'name'=>'delete_images'))}}

                        </div>

                    </div><!-- /.box-footer-->

                </div>
            </div>
        </div>

        {{Form::close()}}

    </div>
</div>



@endsection

@section('scriptXX')
{{--<script src="http://malsup.github.com/jquery.form.js"></script>--}}

{{--<script>--}}
    {{--// wait for the DOM to be loaded--}}
    {{--$(document).ready(function() {--}}
        {{--// bind 'myForm' and provide a simple callback function--}}
        {{--$('#form').ajaxForm(function() {--}}
            {{--alert("Thank you for your comment!");--}}
        {{--});--}}

        {{--$("#images").change(function(){--}}
            {{--$('#form').submit();--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

    <script TYPE="text/javascript">
//        $(function(){
//
//        var fileCollection = new Array();
//
//        $('#images').on('change',function(e){
//
//            var files = e.target.files;
//
//            $.each(files,function(i,file){
//                fileCollection.push(file);
//                var reader = new FileReader();
//                reader.readAsDataURL(file);
//
//                reader.onload = function(e){
//                    var template = '<div class="col-xs-12 col-md-3">' +
//                        '<a href="#" class="thumbnail">' +
//                        '<img style="" src="'+ e.target.result+'"/>' +
//                        '</a>' +
//                        '</div>';
//                    //alert(template);
//                    $('#images-to-upload').append(template);
//
//                }
//            });
//
//        });


//        $('#form').submit(function(e){
//
//            e.preventDefault();
//
//            formData = new FormData;
//
//            formData.append('room_type', $('input[name=room_type]').val());
//            formData.append('description', $('[name=description]').val());
//            formData.append('room_facility_id', $('[name="room_facility_id[]"]').val());
//            formData.append('room_specification', $('[name="room_specification[]"]').val());
//            formData.append('images', $('[name="images[]"]').val());
//
//
//            $.ajax({
//                url: $('#form').attr('action'),
//                method: 'post',
//                processData: false,
//                contentType: false,
//                cache: false,
//                        dataType: 'json',
//                data: formData,
//                success: function(data){
//                    alert('asda');
//                }
//            });
//
//        });
//   });
</script>
@endsection
