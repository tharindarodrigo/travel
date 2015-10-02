@extends('emails.emailMaster')

@section('email-content')
<h3>Reference No. : 123456789</h3>

<div>

<h4>Client Details</h4>
<table>
<thead>
<tr>
    <th>Name</th>
    <th>Passport</th>
    <th>DoB</th>
    <th>Gender</th>

</tr>
</thead>
<tbody>

{{--@foreach($booking['client'] as $client)--}}

    {{--<tr>--}}
        {{--<td>{{$client['name']}}</td>--}}
        {{--<td>{{$client['passport_number']}}</td>--}}
        {{--<td>{{$client['dob']}}</td>--}}
        {{--<td>{{$client['gender'] == 1 ? 'Male':'Female'}}</td>--}}
    {{--</tr>--}}
{{--@endforeach--}}

</tbody>
</table>

</div>

<div>
<h4>Flight Details</h4>
<table>
<thead>
<tr>
    <th>Date</th>
    <th>Time</th>
    <th>Flight</th>
    <th>Flight Type</th>

</tr>
</thead>
<tbody>

    {{--@foreach($booking['flight_detail'] as $flight)--}}
        {{--<tr>--}}
            {{--<td>{{$flight['date']}}</td>--}}
            {{--<td>{{$flight['time']}}</td>--}}
            {{--<td>{{$flight['flight']}}</td>--}}
            {{--<td>{{$flight['flight_type'] == 1 ? 'Arrival' : 'Departure' }}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}

</tbody>
</table>
</div>

@endsection