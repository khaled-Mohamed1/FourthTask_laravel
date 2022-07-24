<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'machine_type',
        'property_type',
        'quantity',
        'notes',
    ];

    public function FarmerEquipment()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id', 'id');
    }
}
