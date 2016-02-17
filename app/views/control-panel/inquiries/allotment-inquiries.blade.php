@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Inquiries'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Allotment Inquiries'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-reservations')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('allotment-Inquiries')
    {{ 'active' }}
@endsection

<style type="text/css">
    .table th{
        text-align: center !important;
    }
</style>

@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Allotment Inquiries
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Hotel</th>
                            <th>Room</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($allotmentinquiries as $allotmentinquiry)
                            <tr>
                                <td>{{$allotmentinquiry->id}}</td>
                                <td>{{$allotmentinquiry->from}}</td>
                                <td>{{$allotmentinquiry->to}}</td>
                                <td>{{$allotmentinquiry->hotel->name}}</td>
                                <td>{{$allotmentinquiry->roomtype->room_type}}</td>
                                <td>
                                    {{Form::open(array('route'=>array('control-panel.inquiries.allotment-inquiries.update',$allotmentinquiry->id), 'method'=>'Patch'))}}
                                    <button class="btn btn-success btn-block" type="submit" value="1" name="confirm">
                                        Confirm
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#cities-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection