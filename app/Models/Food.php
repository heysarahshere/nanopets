<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'type',
        'description',
        'mainStat', // main stat effected by the food
        'hunger', // bar that must stay full stamina & health won't recharge
        'magic', // magical damage
        'stamina', // energy used to cast or attack
        'strength', // physical damage
        'defense', // damage resistance
        'health', // life points
        'mojo', // breeding success chance
        'breedableStat', // STRING: stat this food will effect when breeding
        'breedableStatChance', // INT: % chance of the breedableStat being closer to the higher parent's stat
        'cost',
        'owner_id',
    ];
}
