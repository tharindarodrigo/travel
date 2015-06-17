@extends('control-panel.hotel.rates.rates')

@section('rate-content')
    {{Form::open()}}
    <div class="col-md-4">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class=" box-header">
                <h4>Rates</h4>
            </div>

            <div class="box-body table-responsive">
                <div class="form-group">
                    {{Form::label('room_type','Room Type')}}
                    {{Form::select('room_type_id',RoomType::where('hotel_id', $hotelid)->lists('room_type','id'), null, array('class' => 'form-control', 'id'=>'room_type_id'))}}
                </div>
                <div class="form-group">
                    {{Form::label('from','From')}}
                    {{Form::text('from', null, array('class'=>'form-control', 'id'=>'from'))}}
                </div>
                <div class="form-group">
                    {{Form::label('to','To')}}
                    {{Form::text('to', null, array('class'=>'form-control', 'id'=>'to'))}}
                </div>
                <div class="form-group">
                    {{Form::label('allotment','Allotment')}}
                    {{Form::text('allotment', null, array('class'=>'form-control'))}}
                </div>
                <input id="hotelid" value="{{$hotelid}}" type="hidden"/>
                <div class="form-group">
                    <button class="btn btn-primary">Change Room Type</button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class="box-body table-responsive">
                <h4>Rate Grid</h4>

                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 200px;">&nbsp;</th>
                        <th style="text-align: center">RO</th>
                        <th style="text-align: center">BB</th>
                        <th style="text-align: center">HB</th>
                        <th style="text-align: center">FB</th>
                        <th style="text-align: center">AI</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}

@endsection

@section('rate-scripts')
<script type="text/javascript">
    $(function(){

        $('#from').datepicker({
            format: 'dd-mm-yy'
        });
        $('#to').datepicker({
            format: 'dd-mm-yy'
        });

        $('#room_type_id').change(function(){
            var url = 'http://'+window.location.host+'/control-panel/hotel/hotels/rates/get-rates';
            //alert(url);
            var formData = new FormData();
            formData.append('room_type_id', $(this).val());
            //alert(formData);
            $.ajax({
                url: url,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,
                success: function(data){

                    alert(data.hotel_id);
                },

                error: function(){
                    alert('Error');
                }
            });
        });

    });

</script>

@stop
