@extends('control-panel.hotel.rates.rates')

@section('rate-content')
    {{Form::open()}}
    <div class="col-md-4">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class=" box-header">
                <h4>Rates</h4>
            </div>

            {{--{{dd(RoomType::where('hotel_id', $hotelid)->lists('room_type','id'))}}--}}

            <div class="box-body table-responsive">
                <div class="form-group">
                    {{Form::label('room_type','Room Type')}}
                    {{Form::select('room_type_id', array('0' => 'Select a Room Type')+RoomType::where('hotel_id', $hotelid)->lists('room_type','id'), 'Select Room', array('class' => 'form-control', 'id'=>'room_type_id'))}}
                </div>

                <div class="form-group">
                    <button type="button" id="change_room" class="btn btn-primary">Change Room Type</button>
                </div>
                <div class="form-group">
                    {{Form::label('from','From')}}
                    {{Form::text('from', null, array('class'=>'form-control', 'id'=>'from'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>

                <div class="form-group">
                    {{Form::label('to','To')}}
                    {{Form::text('to', null, array('class'=>'form-control', 'id'=>'to'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>

                <div class="form-group">
                    {{ Form::label('market', 'Markets')}}
                    @foreach(Market::where('val',1)->get() as $market)
                        <p>
                        <label for="">
                            {{Form::checkbox('markets[]', $market->id, null ,array('class' => 'form-group'))}}
                            {{ $market->market }}
                        </label>
                        </p>
                    @endforeach
                </div>
                <input id="hotelid" value="{{$hotelid}}" type="hidden"/>


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
                    <button id="submit" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}

@endsection

@section('rate-scripts')
<script type="text/javascript">
    $(function(){
        //hidden elements

        hideItems();

        $('#from').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#to').datepicker({
            format: 'yyyy-mm-dd'
        });

        var hotel_id;

        $('#room_type_id').change(function(){

            hideItems();

            $("#change_room").slideDown(200);
            var url = 'http://'+window.location.host+'/control-panel/hotel/hotels/rates/get-rates';
            var formData = new FormData();
            formData.append('room_type_id', $(this).val());
            $.ajax({
                url: url,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,
                success: function(data){
                    var x = (data[0].room_specification);

                    var tablebody ='';
                    hotel_id = data[0].hotel_id;

                    $.each(x,function(i,item){
                    var row = '<tr>';
                        row +='<th>'+x[i]["room_specification"]+'</th>';
                        for(var j=0; j<data[1].length; j++){
                            row+='<td><input name="rates[]" id="'+data[1][j].id+'-'+x[i].id+'" type="text" class="form-control mask"></td>';
                        }
                        row += '</tr>';
                        tablebody +=row;
                    });

                    $('#change_room').click(function(){
                        $('#room_type_id').removeAttr('disabled');
                    });

                    $('tbody').html(tablebody);

                    $('.mask').mask("?9999");

                    $('#room_type_id').attr('disabled', true);
                    $('tbody').slideDown(200);
                    $('#submit').slideDown(200);

                },

                error: function(){
                    alert('Error');
                }
            });

        });

        $('#submit').click(function(){

            $('.validation').slideUp(200);

            var values = $('input[name="rates[]"]').map(function(){
                    return ($(this).val());
                }).get();

            var ids = $('input[name="rates[]"]').map(function(){
                    return ($(this).attr('id'));
                }).get();

            var markets = $('input[name="markets[]"]:checked').map(function(){
                    return ($(this).val());
                }).get();

            var rates = [];
            var keys = [];

            $.each(values, function(i,value){
                if(value.trim() != ''){
                    rates.push(value.trim());
                    keys.push(ids[i]);

                }
            });

            formObj = new FormData();
            formObj.append('from',$('#from').val());
            formObj.append('to',$('#to').val());
            formObj.append('allotment',$('#allotment').val());
            formObj.append('room_type_id',$('#room_type_id').val());
            formObj.append('rates', rates);
            formObj.append('keys', keys);
            formObj.append('market_id', markets);

            var url1 = 'http://'+window.location.host+'/control-panel/hotel/hotels/'+hotel_id+'/rates';
            $.ajax({
                url: url1,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formObj,
                success: function(data){
                    if(data.errors){
                        $.each(data.errors,function(j, error){
                            $("#"+j).closest('div').next('.validation').html(error).slideDown(200);
                        });
                    }

                    else {
//                        alert("successfully added");
                        $("input[type=text]").val("");
                        $('input:checkbox').removeAttr('checked');
                        $('#change_room').hide();
                        $('#room_type_id').removeAttr("disabled");
                        $('#room_type_id').val(0);

                    }

                    if(data.error) {
                        alert(data.error);
                    }
                },

                error: function(){
                    alert('Error');
                }

            });

        });

        function hideItems(){
            $('#submit').hide();
            $('tbody').hide();
            $('#change_room').hide();
            $('.validation').hide();
        }
    });

</script>

@stop
