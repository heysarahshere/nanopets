<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncubationChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'creature_id',
        'is_incubating',
        'temperature',
        'progress',
        'out_of_incubator_since',
    ];

    public function egg() {
        return $this->belongsTo('App\Models\Creature', 'creature_id', 'id');
    }

}
