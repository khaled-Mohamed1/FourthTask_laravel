<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'partner_idnumber',
        'partner_name',
        'partner_ratio',
        'partner_type',
    ];

    public function LandPartner()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }

}
