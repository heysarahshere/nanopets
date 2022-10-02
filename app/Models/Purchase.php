<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'item_id',
        'qty',
        'item_type',
    ];

//    public function item()
//    {
//        return $this->belongsTo('App\User', 'owner_id', 'id');
//    }

    public function item()
    {
        return $this->belongsTo('App\Models\Food', 'item_id', 'id');
    }

}
