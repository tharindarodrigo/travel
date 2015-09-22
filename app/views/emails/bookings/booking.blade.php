<h3>Reference No. : {{$data['reference_number']}}</h3>

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
@foreach($clients as $client)

    <tr>
        <td>{{$client['name']}}</td>
        <td>{{$client['passport_number']}}</td>
        <td>{{$client['dob']}}</td>
        <td>{{$client['gender'] == 1 ? 'male':'female'}}</td>
    </tr>

@endforeach
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

    <tr>
        <td>{{$data['date_arrival']}}</td>
        <td>{{$data['arrival_time']}}</td>
        <td>{{$data['arrival_flight']}}</td>
        <td>{{'Arrival'}}</td>
    </tr>
    <tr>
        <td>{{$data['date_departure']}}</td>
        <td>{{$data['departure_time']}}</td>
        <td>{{$data['departure_flight']}}</td>
        <td>{{'Departure'}}</td>
    </tr>

</tbody>
</table>
</div>