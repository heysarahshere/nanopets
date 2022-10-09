<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'breed_start_time', // set at creation of ticket
        'breed_end_time', // nullable
        'owner_id',
        'male_id',
        'female_id',
        'baby_id', // nullable as no baby at first
        'open' // true by default, ticket closes after breeding complete
    ];

    public function female()
    {
        return $this->hasOne('App\Models\Creature', 'female_id', 'id');
    }

    public function male()
    {
        return $this->hasOne('App\Models\Creature', 'male_id', 'id');
    }

    public function baby()
    {
        return $this->hasOne('App\Models\Creature', 'baby_id', 'id');
    }
}
