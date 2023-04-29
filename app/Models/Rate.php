<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'adults',
        'children',
        'basis',
        'from',
        'to',
        'price',
        'room_id',
        'hotel_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
