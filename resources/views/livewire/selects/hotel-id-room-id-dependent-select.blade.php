<div class="w-full">
    <x-inputs.group class="w-full">
        <x-inputs.select
            name="hotel_id"
            label="Hotel"
            wire:model="selectedHotelId"
        >
            <option selected>Please select the Hotel</option>
            @foreach($allHotels as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @if(!empty($selectedHotelId))
    <x-inputs.group class="w-full">
        <x-inputs.select
            name="room_id"
            label="Room"
            wire:model="selectedRoomId"
        >
            <option selected>Please select the Room</option>
            @foreach($allRooms as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select> </x-inputs.group
    >@endif
</div>
