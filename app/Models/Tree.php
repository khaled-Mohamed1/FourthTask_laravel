<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $fillable = [
        'land_id',
        'tree_name',
        'tree_history',
        'tree_area',
        'tree_number',
        'tree_protection',
        'tree_irrigation',
        'tree_recession',
        'tree_recession_reason',
        'tree_endDate',
    ];

    public function LandTree()
    {
        return $this->belongsTo(Land::class, 'land_id', 'id');
    }
}
