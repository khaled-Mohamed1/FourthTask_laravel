<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryWorkforce extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'males_number',
        'males_number_family',
        'females_number',
        'females_number_family',
    ];

    public function FarmerTemporaryWorkforce()
    {
        return $this->belongsTo(City::class, 'farmer_id', 'id');
    }
}
