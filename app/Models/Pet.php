<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
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
        'health',
        'stamina',
        'mojo',
        'magic',
        'strength',
        'defense',
        'level',
        'dev_stage',
        'owner_id',
    ];


    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id', 'id');
    }
}
