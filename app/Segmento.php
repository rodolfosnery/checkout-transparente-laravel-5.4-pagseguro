<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    protected $fillable = [
        'id',
        'titulo',
        'slug'
    ];

    public function produtos()
    {
        return $this->hasMany('App\Produto')->where('status', '!=', 2)->where('depor', '=', null);
    }

    public function modelos()
    {
        return $this->hasMany('App\Modelo');
    }
}
