<?php

namespace App\Http\Livewire\Selects;

use App\Models\Rate;
use App\Models\Room;
use App\Models\Hotel;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HotelIdRoomIdDependentSelect extends Component
{
    use AuthorizesRequests;

    public $allHotels;
    public $allRooms;

    public $selectedHotelId;
    public $selectedRoomId;

    protected $rules = [
        'selectedHotelId' => ['required', 'exists:hotels,id'],
        'selectedRoomId' => ['required', 'exists:rooms,id'],
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

        $this->fillAllRooms();
        $this->selectedRoomId = $rate->room_id;
    }

    public function updatedSelectedHotelId(): void
    {
        $this->selectedRoomId = null;
        $this->fillAllRooms();
    }

    public function fillAllHotels(): void
    {
        $this->allHotels = Hotel::all()->pluck('name', 'id');
    }

    public function fillAllRooms(): void
    {
        if (!$this->selectedHotelId) {
            return;
        }

        $this->allRooms = Room::where('hotel_id', $this->selectedHotelId)
            ->get()
            ->pluck('name', 'id');
    }

    public function clearData(): void
    {
        $this->allHotels = null;
        $this->allRooms = null;

        $this->selectedHotelId = null;
        $this->selectedRoomId = null;
    }

    public function render(): View
    {
        return view('livewire.selects.hotel-id-room-id-dependent-select');
    }
}
