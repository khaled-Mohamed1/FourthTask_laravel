<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name',
        'city_id',
    ];

    public function CityRegion()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
