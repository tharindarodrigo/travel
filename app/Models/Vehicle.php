<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'type',
        'max_occupancy',
        'baggages',
        'price_per_km',
        'first_km',
    ];

    protected $searchableFields = ['*'];
}
