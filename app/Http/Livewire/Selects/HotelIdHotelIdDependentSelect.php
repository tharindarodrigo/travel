<?php

namespace App\Http\Livewire\Selects;

use App\Models\Rate;
use App\Models\Hotel;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HotelIdHotelIdDependentSelect extends Component
{
    use AuthorizesRequests;

    public $allHotels;
    public $allHotels;

    public $selectedHotelId;
    public $selectedHotelId;

    protected $rules = [
        'selectedHotelId' => ['required', 'exists:hotels,id'],
        'selectedHotelId' => ['required', 'exists:hotels,id'],
    ];

    public function mount($rate): void
    {
        $this->clearData();
        $this->fillAllHotels();

        if (is_null($rate)) {
            return;
        }

        $rate = Rate::findOrFail($rate);

        $this->selectedHotelId = $rate->hotel_id;

        $this->fillAllHotels();
        $this->selectedHotelId = $rate->hotel_id;
    }

    public function updatedSelectedHotelId(): void
    {
        $this->selectedHotelId = null;
        $this->fillAllHotels();
    }

    public function fillAllHotels(): void
    {
        $this->allHotels = Hotel::all()->pluck('name', 'id');
    }

    public function fillAllHotels(): void
    {
        if (!$this->selectedHotelId) {
            return;
        }

        $this->allHotels = Hotel::where('hotel_id', $this->selectedHotelId)
            ->get()
            ->pluck('name', 'id');
    }

    public function clearData(): void
    {
        $this->allHotels = null;
        $this->allHotels = null;

        $this->selectedHotelId = null;
        $this->selectedHotelId = null;
    }

    public function render(): View
    {
        return view('livewire.selects.hotel-id-hotel-id-dependent-select');
    }
}
