<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'sources_type',
        'well_number',
        'well_depth',
        'well_impetus',
        'well_electro',
        'tank_storage_capacity',
        'tank_Height',
        'groundWater_depth',
        'groundWater_storage_capacity',
        'groundWater_pond_type',
    ];

    public function LandWaterSource()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
