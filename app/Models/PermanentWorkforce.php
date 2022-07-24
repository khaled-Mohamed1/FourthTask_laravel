<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermanentWorkforce extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'id_NO',
        'firstname',
        'secondname',
        'thirdname',
        'fourthname',
        'gender',
        'phone_NO',
        'address',
        'from_family',
    ];

    public function FarmerPermanentWorkforce()
    {
        return $this->belongsTo(City::class, 'farmer_id', 'id');
    }

}
