<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'region',
        'required_date',
        'note',
        'visit_type',
    ];


    public function vEmployees()
    {
        return $this->hasMany(VEmployee::class);
    }

    public function vFarmers()
    {
        return $this->hasMany(VFarmer::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
