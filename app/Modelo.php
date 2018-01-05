<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'segmento_id',
        'titulo',
        'slug'
    ];

    public function pecas()
    {
        return $this->hasMany('App\Peca')->where('status', '!=', 2)->where('depor', '=', null);
    }

    public function segmento()
    {
        return $this->belongsTo('App\Segmento');
    }


}
