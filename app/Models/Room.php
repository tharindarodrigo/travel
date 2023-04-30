<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'hotel_id',
        'name',
        'count',
        'is_active',
        'description',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reserve($from, $to, $adults, $children)
    {
        Reservation::create([
            'from' => $from,
            'to' => $to,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->id,
            'adults' => $adults,
            'children' => $children,
            'price' => $this->calculatePrice($from, $to)
        ]);
    }

    public function calculatePrice($from, $to, $quantity = 1): float
    {
        //Check if there are multiple rates for the room in the given period
        $rates = $this->rates()->where('room_id', $this->id)
            ->where('from', '<=', $from)
            ->orWhere('to', '>=', $to)
            ->get();

        //If there are multiple rates, calculate the price for each date and add them together
        if ($rates->count() > 1) {
            $price = 0;
            $days = $from->diffInDays($to);
            for ($i = 0; $i < $days; $i++) {
                $date = $from->addDays($i);
                $rate = $rates
                    ->where('from', '<=', $date)
                    ->where('to', '>=', $date)->first();
                $price += $rate->price;
            }
            return $price * $quantity;
        }

        //If there is only one rate, calculate the price for the given period
        $days = $from->diffInDays($to);
        return $this->price * $days * $quantity;
    }
}
