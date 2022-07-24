<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'enterprise_type',
        'enterprise_number',
        'enterprise_name',
        'enterprise_owner_ID_number',
        'enterprise_owner_name',
    ];

    public function LnadEnterprise()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }

}
