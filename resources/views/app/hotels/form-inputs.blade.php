@php $editing = isset($hotel) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $hotel->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="address_line_1"
            label="Address Line 1"
            :value="old('address_line_1', ($editing ? $hotel->address_line_1 : ''))"
            maxlength="255"
            placeholder="Address Line 1"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="address_line_2"
            label="Address Line 2"
            :value="old('address_line_2', ($editing ? $hotel->address_line_2 : ''))"
            maxlength="255"
            placeholder="Address Line 2"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="city"
            label="City"
            :value="old('city', ($editing ? $hotel->city : ''))"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="country"
            label="Country"
            :value="old('country', ($editing ? $hotel->country : ''))"
            maxlength="255"
            placeholder="Country"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="longitude"
            label="Longitude"
            :value="old('longitude', ($editing ? $hotel->longitude : ''))"
            max="255"
            step="0.01"
            placeholder="Longitude"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="latitude"
            label="Latitude"
            :value="old('latitude', ($editing ? $hotel->latitude : ''))"
            max="255"
            step="0.01"
            placeholder="Latitude"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="description"
            label="Description"
            maxlength="255"
            >{{ old('description', ($editing ? $hotel->description : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="long_description"
            label="Long Description"
            maxlength="255"
            >{{ old('long_description', ($editing ? $hotel->long_description :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.checkbox
            name="active"
            label="Active"
            :checked="old('active', ($editing ? $hotel->active : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
