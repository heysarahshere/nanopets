<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tier',
        'species',
        'element',
        'gender',
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
        'dev_stage', // egg, hatchling, baby, or adult
        'owner_id',
        'seller_id',
        'primary',
        'partner_id',
        'for_sale',
        'cost',
        'available',
        'potential'
    ];


    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id', 'id');
    }

    public function seller()
    {
        return $this->belongsTo('App\Models\User', 'seller_id', 'id');
    }

    public function partner()
    {
        return $this->hasOne('App\Models\Creature', 'partner_id', 'id');
    }


    public function compatible($creature)
    {
        if ($this->dev_stage === 'adult' && $this->id != $creature->id && $this->gender != $creature->gender && $this->available == 1) {
            return true;
        } else {
            return false;
        }
    }
}
