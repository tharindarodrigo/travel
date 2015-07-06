<?php
$hotels = Hotel::all();
?>


@foreach($hotels as $hotel)

    @foreach($hotel->HotelCategory as $cat)
        {{ $cat->hotel_category.' | ' }}
    @endforeach

    @foreach($hotel->users as $cat)
        {{ $cat->first_name.' | ' }}
    @endforeach

@endforeach