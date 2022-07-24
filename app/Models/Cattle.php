<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cattle extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'cattle_type',
        'cattle_gender',
        'cattle_number',
        'cattle_age',
        'cattle_healthCondition',
        'cattle_notes',
    ];

    public function LandCattle()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }

}
