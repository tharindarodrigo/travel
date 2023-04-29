<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['image', 'imageable_id', 'imageable_type'];

    protected $searchableFields = ['*'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
