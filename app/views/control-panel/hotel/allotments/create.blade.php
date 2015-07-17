@extends('control-panel.hotel.allotments.allotments')

@section('allotment-content')

    <div class="col-md-4">
        <div class="box box-primary">
            <!-- /.box-header -->

            <div class=" box-header">
                <h4>Allotments</h4>
            </div>
                @if(!Session::has('edit'))
                    {{ Form::open(array('route' => array('control-panel.hotel.hotels.allotments.store', $hotelid))) }}
                @else
                    {{ Form::open(array('route' => array('control-panel.hotel.hotels.allotments.update',$hotelid,$allotment->id), 'method' => 'put')) }}
                @endif
            <div class="box-body table-responsive">

                <div class="form-group">
                    {{Form::label('room_type','Room Type')}}
                    {{Form::select('room_type_id', array('0' => 'Select a Room Type')+RoomType::where('hotel_id', $hotelid)->lists('room_type','id'), 'Select Room', array('class' => 'form-control', 'id'=>'room_type_id'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>

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
                    {{Form::label('rooms','No. of Rooms')}}
                    {{Form::text('rooms', null, array('class'=>'form-control'))}}
                </div>
                <div class="form-group validation" style="color: #a04606"></div>
                <div class="form-group">
                    {{Form::submit('',array('class' => 'btn btn-primary'))}}
                </div>
                <input id="hotelid" value="{{$hotelid}}" type="hidden"/>
            </div>
           {{Form::close()}}
        </div>
    </div>



    <div class="col-md-8 ">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete</b> Markets</h3>
            </div>
            <div class="box-body">
            @if(Session::has('successful-action'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                {{ Session::get('successful-action') }}
            </div>
            @endif
            @if(Session::has('unsuccessful-action'))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                {{ Session::get('unsuccessful-action') }}
            </div>
            @endif


            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="hotel-categories-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th style="width:60px;">Status</th>
                        <th style="width:120px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($allotments as $allotment)
                        <tr>
                            <td>{{ $allotment->id }}</td>
                            <td>{{ $allotment->to }}</td>
                            <td>{{ $allotment->from }}</td>
                            <td>{{ $allotment->rooms}}</td>
                            <td style="text-align: center;">{{ $allotment->val == 0 ? 'Inactive' : 'Active' }}</td>
                            <td>
                                <div class="">
                                    {{ Form::open(array('route'=> array('control-panel.general.markets.edit',$allotment->id), 'method' =>'get' )) }}
                                    <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                                class="glyphicon glyphicon-edit"></i></button>
                                    {{ Form::close() }}

                                    {{ Form::open(array('route'=> array('control-panel.general.markets.destroy',$allotment->id), 'method' =>'delete')) }}
                                    <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                    {{ Form::close() }}

                                    @if($allotment->val == 0)
                                        <div class="">
                                            {{ Form::open(array('route'=> array('control-panel.general.markets.update',$allotment->id), 'method' =>'patch')) }}
                                            <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                               type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                            <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                               type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                            {{ Form::close() }}
                                        </div>

                                    @else
                                        {{ Form::open(array('route'=> array('control-panel.general.markets.update',$allotment->id), 'method' =>'patch')) }}
                                        <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                            type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                        <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                            type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                        {{ Form::close() }}

                                    @endif


                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div>

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
