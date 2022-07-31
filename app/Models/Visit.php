<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'farmer_cardid',
        'visit_date',
        'visit_status',
        'visit_description',
        'guidance_description',
        'note',
    ];

    public function TourVisit()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }

    public function FarmerVisit()
    {
        return $this->belongsTo(Farmer::class, 'farmer_cardid', 'card_id');
    }


    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }

    public function pests()
    {
        return $this->hasMany(Pest::class);
    }
}
