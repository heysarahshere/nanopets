<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'element',
        'description',
        'potential',
        'health',
        'stamina',
        'mojo',
        'magic',
        'strength',
        'defense',
        'hatchSpeed',
        'cost',
        'owner_id',
    ];
}
