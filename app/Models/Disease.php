<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;


    protected $fillable = [
        'visit_id',
        'animal_class',
        'disease_name',
        'disease_image',
        'disease_image_description',
    ];

    public function VisitDisease()
    {
        return $this->belongsTo(Visit::class, 'visit_id', 'id');
    }

}
