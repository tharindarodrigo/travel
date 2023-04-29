@php $editing = isset($room) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="hotel_id" label="Hotel" required>
            @php $selected = old('hotel_id', ($editing ? $room->hotel_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Hotel</option>
            @foreach($hotels as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $room->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.number
            name="count"
            label="Count"
            :value="old('count', ($editing ? $room->count : ''))"
            max="255"
            placeholder="Count"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.checkbox
            name="is_active"
            label="Is Active"
            :checked="old('is_active', ($editing ? $room->is_active : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            required
            >{{ old('description', ($editing ? $room->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>
