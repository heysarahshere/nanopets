<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'male_id',
        'female_id',
        
    ];

    public function male()
    {
        return $this->hasOne('App\Models\Creature', 'male_id', 'id');
    }

    public function female()
    {
        return $this->hasOne('App\Models\Creature', 'female_id', 'id');
    }
}
