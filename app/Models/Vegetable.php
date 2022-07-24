<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'vegetable_name',
        'vegetable_history',
        'vegetable_area',
        'vegetable_status',
        'vegetable_protection',
        'vegetable_protectionType',
        'vegetable_irrigation',
        'vegetable_recession',
        'vegetable_recession_reason',
        'vegetable_endDate',
    ];

    public function LandVegetable()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
