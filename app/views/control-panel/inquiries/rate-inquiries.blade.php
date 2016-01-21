@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'General'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Cities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-general')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-general-cities')
    {{ 'active' }}
@endsection


@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Rate Inquiries
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
                            <th>Room Spec</th>
                            <th>Meal</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($rateinquiries as $rateinquiry)
                            <tr>
                                <td>{{$rateinquiry->id}}</td>
                                <td>{{$rateinquiry->from}}</td>
                                <td>{{$rateinquiry->to}}</td>
                                <td>{{$rateinquiry->hotel->name}}</td>
                                <td>{{$rateinquiry->roomtype->room_type}}</td>
                                <td>{{$rateinquiry->roomSpecification->room_specification}}</td>
                                <td>{{$rateinquiry->mealBasis->meal_basis}}</td>
                                <td>
                                    {{Form::open(array('route'=>array('control-panel.inquiries.rate-inquiries.update',$rateinquiry->id), 'method'=>'Patch'))}}
                                        <button class="btn btn-success btn-block" type="submit" value="1" name="status">Confirm</button>
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