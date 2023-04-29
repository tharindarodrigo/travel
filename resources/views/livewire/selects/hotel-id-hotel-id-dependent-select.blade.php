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
            name="hotel_id"
            label="Hotel"
            wire:model="selectedHotelId"
        >
            <option selected>Please select the Hotel</option>
            @foreach($allHotels as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select> </x-inputs.group
    >@endif
</div>
