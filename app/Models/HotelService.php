<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'price', 'hotel_id'];

    protected $searchableFields = ['*'];

    protected $table = 'hotel_services';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
