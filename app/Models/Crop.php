<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'crop_name',
        'crop_history',
        'crop_area',
        'crop_status',
        'crop_irrigation',
        'crop_recession',
        'crop_recession_reason',
        'crop_endDate',
    ];

    public function LandCrop()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
