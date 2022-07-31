<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDisease extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_disease_name',
        'animal_id',
    ];

    public function DiseaseAnimalDisease()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'id');
    }

}
