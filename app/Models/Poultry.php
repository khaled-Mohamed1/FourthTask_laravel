<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poultry extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'poultry_type',
        'poultry_number',
        'poultry_ageD',
        'poultry_ageM',
        'poultry_notes',
    ];

    public function LandPoultry()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
