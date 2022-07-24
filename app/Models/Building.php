<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'building_type',
        'building_area',
        'building_ownership',
        'building_notes',
        'building_farm_type',
        'building_farm_roof_type',
    ];

    public function LandBuilding()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
