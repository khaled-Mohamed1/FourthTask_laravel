<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_name',
    ];

    public function animaldiseases()
    {
        return $this->hasMany(AnimalDisease::class);
    }

}
