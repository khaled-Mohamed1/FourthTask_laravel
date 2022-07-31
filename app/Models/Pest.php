<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'agricultural_class',
        'pest_name',
        'pest_image',
        'pest_image_description',
    ];

    public function VisitPest()
    {
        return $this->belongsTo(Visit::class, 'visit_id', 'id');
    }

}
