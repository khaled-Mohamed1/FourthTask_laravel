<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'piece_number',
        'coupon_number',
        'area_number_for_tenure_purposes',
        'area_number_for_non_acquisition_purposes',
        'permanent_fallow_area_number',
        'temporary_fallow_area_number',
        'cultivated_land_area_number',
        'forest_trees_area_number',
        'total_land_area_number',
        'far_from_armistice_line_number',
        'contract_type',
        'holding_type',
        'owner_type',
        'city',
        'region',
        'nearest_place',
        'notes',
        'latitude',
        'longitude',
    ];

    public function FarmerLand()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id', 'id');
    }

    public function individuals()
    {
        return $this->hasMany(Individual::class);
    }

    public function enterprises()
    {
        return $this->hasMany(Enterprise::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function waterSources()
    {
        return $this->hasMany(WaterSource::class);
    }

    public function crops()
    {
        return $this->hasMany(Crop::class);
    }


    public function vegetables()
    {
        return $this->hasMany(Vegetable::class);
    }

    public function trees()
    {
        return $this->hasMany(Tree::class);
    }

    public function cattles()
    {
        return $this->hasMany(Cattle::class);
    }

    public function poultries()
    {
        return $this->hasMany(Poultry::class);
    }
}
