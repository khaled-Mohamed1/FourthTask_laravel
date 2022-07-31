<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'employee_name',
    ];

    public function TourVEmployee()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
