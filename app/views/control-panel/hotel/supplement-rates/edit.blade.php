@extends('control-panel.hotel.rates.rates')

@section('rate-content')
    {{Form::open()}}
    <div class="col-md-4">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class=" box-header">
                <h4>Supplement Rates</h4>
            </div>

            {{--{{dd($rate->market)}}--}}

            <div class="box-body table-responsive">
                <div class="form-group">
                    {{Form::label('room_type','Room Type')}}
                    <p>{{$rate->roomType->room_type}}</p>
                </div>

                <div class="form-group">
                    {{Form::label('supplement_name','Supplement Name')}}
                    {{Form::text('supplement_name', $rate->supplement_name, array('class'=>'form-control', 'id'=>'supplement_name'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>

                <div class="form-group">
                    {{Form::label('from','From')}}
                    {{Form::text('from', $rate->from, array('class'=>'form-control', 'id'=>'from'))}}
                </div>

                <div class="form-group validation" style="color: #a04606"></div>

                <div class="form-group">
                    {{Form::label('to','To')}}
                    {{Form::text('to', $rate->to, array('class'=>'form-control', 'id'=>'to'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>

                <div class="form-group">
                    {{ Form::label('market', 'Markets')}}
                    <p>{{ $rate->market->market }}</p>

                </div>
                <div class="form-group validation" style="color: #a04606"></div>
                <input id="hotelid" value="{{$hotelid}}" type="hidden"/>
                <input id="room_type_id" value="{{$rate->room_type_id}}" type="hidden"/>
                <input id="rateid" value="{{$rate->id}}" type="hidden"/>
                <input id="market_id" value="{{$rate->market_id}}" type="hidden"/>
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
                        <th style="width: 150px;">&nbsp;</th>
                        <th style="text-align: center">RO</th>
                        <th style="text-align: center">BB</th>
                        <th style="text-align: center">HB</th>
                        <th style="text-align: center">FB</th>
                        <th style="text-align: center">AI</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($roomtype->roomspecification as $roomspec)
                    <tr>

                        <th style="text-align: left;">{{ $roomspec->room_specification }}</th>

                        @foreach($mealbases as $mealbase)
                            <td>
                                <input name="rates[]" type="text" class="form-control mask" id="{{$mealbase->id.'-'.$roomspec->id}}"

                                @foreach($rates as $result)
                                    @if($result->meal_basis_id == $mealbase->id && $result->room_specification_id == $roomspec->id)
                                       value="{{ trim($result->rate) }}"
                                    @endif
                                @endforeach

                               />
                            </td>
                        @endforeach

                    </tr>
                    @endforeach

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

    $('.mask').mask("?9999");

    $('#from').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#to').datepicker({
        format: 'yyyy-mm-dd'
    });

    var hotelid = $('#hotelid').val();
    var roomtypeid = $('#roomtypeid').val();

    $('#submit').click(function(){
        var values = $('input[name="rates[]"]').map(function(){
                return ($(this).val());
            }).get();

        var ids = $('input[name="rates[]"]').map(function(){
                return ($(this).attr('id'));
            }).get();


        var rates = [];
        var keys = [];

        $.each(values, function(i,value){
            if(value.trim() != ''){
                rates.push(value.trim());
                keys.push(ids[i]);

            }
        });

//        alert('asdasd');

        formObj = new FormData();
        formObj.append('from',$('#from').val());
        formObj.append('to',$('#to').val());
        formObj.append('supplement_name',$('#supplement_name').val());
        formObj.append('allotment',$('#allotment').val());
        formObj.append('room_type_id',$('#room_type_id').val());
        formObj.append('rates', rates);
        formObj.append('keys', keys);
        formObj.append('market_id', $('#market_id').val());

        var url = 'http://'+window.location.host+'/control-panel/hotel/hotels/'+hotelid+'/supplement-rates/update-rates';
        $.ajax({
            url: url,
            method: 'post',
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            data: formObj,
            success: function(data){
                if(data.errors){
                    $.each(data.errors,function(j, error){
                        $('#'+j).css('backgound-color', 'red');
                        $("#"+j).closest('div').next('.validation').html(error).slideDown(200);
                    });
                }

                else {

                window.location = "http://"+window.location.host+data;

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
});

</script>

@endsection