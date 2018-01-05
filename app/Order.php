<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'codigo',
        'frete',
        'total',
        'rastreamento'
    ];


    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
