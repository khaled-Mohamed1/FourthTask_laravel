<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VFarmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'farmer_name',
        'farmer_cardId',
    ];

    public function TourVFarmer()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
