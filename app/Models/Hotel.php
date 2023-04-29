<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'address_line_1',
        'address_line_2',
        'city',
        'country',
        'longitude',
        'latitude',
        'description',
        'long_description',
        'active',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function hotelServices()
    {
        return $this->hasMany(HotelService::class);
    }

    public function hotelCategories()
    {
        return $this->belongsToMany(HotelCategory::class);
    }

    public function hotelAmenities()
    {
        return $this->belongsToMany(HotelAmenity::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
