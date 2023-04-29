@php $editing = isset($rate) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.text
            name="adults"
            label="Adults"
            :value="old('adults', ($editing ? $rate->adults : '1'))"
            maxlength="255"
            placeholder="Adults"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.text
            name="children"
            label="Children"
            :value="old('children', ($editing ? $rate->children : '0'))"
            maxlength="255"
            placeholder="Children"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.select name="basis" label="Basis">
            @php $selected = old('basis', ($editing ? $rate->basis : '')) @endphp
            <option value="RO" {{ $selected == 'RO' ? 'selected' : '' }} >RO</option>
            <option value="BB" {{ $selected == 'BB' ? 'selected' : '' }} >BB</option>
            <option value="HB" {{ $selected == 'HB' ? 'selected' : '' }} >HB</option>
            <option value="FB" {{ $selected == 'FB' ? 'selected' : '' }} >FB</option>
            <option value="Ai" {{ $selected == 'Ai' ? 'selected' : '' }} >AI</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.date
            name="from"
            label="From"
            value="{{ old('from', ($editing ? optional($rate->from)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.date
            name="to"
            label="To"
            value="{{ old('to', ($editing ? optional($rate->to)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="price"
            label="Price"
            :value="old('price', ($editing ? $rate->price : ''))"
            max="255"
            step="0.01"
            placeholder="Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    @livewire('selects.hotel-id-hotel-id-dependent-select', ['rate' => $editing
    ? $rate->id : null])
</div>
