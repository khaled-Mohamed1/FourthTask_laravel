<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;


    protected $fillable = [
        'card_id',
        'entry_date',
        'id_NO',
        'date_of_birth',
        'firstname',
        'secondname',
        'thirdname',
        'fourthname',
        'phone_NO',
        'email',
        'city',
        'region',
        'nearest_place',
        'status',
        'gender',
        'qualification',
    ];


    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }

    public function lands()
    {
        return $this->hasMany(Land::class);
    }

    public function temporaryWorkforces()
    {
        return $this->hasMany(TemporaryWorkforce::class);
    }

    public function permanentWorkforces()
    {
        return $this->hasMany(PermanentWorkforce::class);
    }

    public function apps()
    {
        return $this->hasMany(App::class);
    }
}
