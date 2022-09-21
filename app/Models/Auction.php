<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'buyer_id',
        'monster_id',
        'cost',
    ];
    
    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }

    public function monster()
    {
        return $this->hasOne('App\Monster', 'monster_id');
    }

    public function buyer()
    {
        return $this->hasOne('App\User', 'buyer_id');
    }
}
