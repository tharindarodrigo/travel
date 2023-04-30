<?php

namespace App\Rules;

use App\Models\Rate;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Translation\PotentiallyTranslatedString;
use JetBrains\PhpStorm\NoReturn;

class RateRule implements DataAwareRule, ValidationRule
{
    protected array $data;

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    #[NoReturn]
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //hotel_id, room_id, adults, children should be combined unique and from and to should not overlap
        $hotelId = $this->data['hotel_id'];
        $roomId = $this->data['room_id'];
        $from = $this->data['from'];
        $to = $this->data['to'];
        $basis = $this->data['basis'];
        $adults = $this->data['adults'];
        $children = $this->data['children'];

        $rate = Rate::query()
            ->where('hotel_id', $hotelId)
            ->where('room_id', $roomId)
            ->where('basis', $basis)
            ->where('from', '<=', $to)
            ->where('to', '>=', $from)
            ->where('adults', $adults)
            ->where('children', $children);

        if ($id = $this->data['id']) {
            $rate = $rate->where('id', '!=', $id);
        }

        $rate = $rate->first();

        if ($rate) {
            $from = $rate->from->format('Y-m-d');
            $to = $rate->to->format('Y-m-d');

            $fail("Rate already exists for this hotel, room, adults, children and overlapping the dates {$from} and {$to}");
        }
    }

    public function setData(array $data): static
    {
        $this->data = $data['data'];
        return $this;
    }

}
