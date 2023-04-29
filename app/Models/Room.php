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
}
