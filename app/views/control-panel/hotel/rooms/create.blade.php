@extends('control-panel.hotel.rooms.rooms')

@section('room-content')
<div class="row">
    <div class="col-md-12">
    {{Form::open(array('route'=>array('control-panel.hotel.hotels.room-types.store',$hotelid), 'id'=>'form','method'=> 'post', 'files'=>true))}}
        <div class="col-md-6">

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

                    @foreach($roomfacilities as $roomfacility)
                    <div class="col-md-6">
                        <label for="">
                            {{ Form::checkbox('room_facility_id[]', $roomfacility->id) }}
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
                        <h3 class="box-title">Room Specification</h3>
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
                            @foreach($roomspecifications as $roomspecification)
                                <tr>
                                    <td>{{Form::checkbox('room_specification[]',$roomspecification->id)}}</td>
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
                        <div id="images-to-upload" class="row">

                        </div>
                        <div class="form-group">
                            {{ Form::file('images[]', array('multiple'=>true, 'id'=>'images')) }}
                            {{--<input type="file" name="images[]" multiple/>--}}

                        </div>

                    </div><!-- /.box-body -->
                    <div style="display: block;" class="box-footer">
                        <button class="btn btn-primary" type="submit" id="room_type_submit">Add Room Type</button>
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
