<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgriculturalPest extends Model
{
    use HasFactory;

    protected $fillable = [
        'agricultural_pest_name',
        'agricultural_id',
    ];

    public function PestAgriculturalPest()
    {
        return $this->belongsTo(Agricultural::class, 'Agricultural_id', 'id');
    }

}
