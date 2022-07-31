<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agricultural extends Model
{
    use HasFactory;

    protected $fillable = [
        'agricultural_name',
    ];

    public function agriculturalpests()
    {
        return $this->hasMany(AgriculturalPest::class);
    }

}
