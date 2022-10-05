<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'flavor',
        'name',
        'image',
        'type', // potion or food
        'description',
        'mainStat', // hunger, magic, stamina, strength, defense, health, mojo
        'bonusStat', // hunger, magic, stamina, strength, defense, health, mojo
        'effectAmount', // amount effected by
        'bonusEffectAmount', // amount effected by
        'cost',
    ];
}
