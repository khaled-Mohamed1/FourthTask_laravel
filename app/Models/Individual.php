<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'owner_ID_number',
        'owner_firstname',
        'owner_secondname',
        'owner_thirdname',
        'owner_fourthname',
    ];

    public function LnadIndividual()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
