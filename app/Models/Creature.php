<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'color_image',
        'eye_image',
        'tail_image',
        'head_image',
        'wing_image',
        'element',
        'description',
        'max_health',
        'current_health',
        'max_stamina',
        'current_stamina',
        'hunger',
        'mojo',
        'magic',
        'strength',
        'defense',
        'level',
        'dev_stage', // 1 = egg, 2 = baby, 3 = adult
        'owner_id',
        'for_sale',
        'cost',
        'available'
    ];


    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id', 'id');
    }
}
