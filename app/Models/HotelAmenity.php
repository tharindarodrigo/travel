<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelAmenity extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'active'];

    protected $searchableFields = ['*'];

    protected $table = 'hotel_amenities';

    protected $casts = [
        'active' => 'boolean',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
