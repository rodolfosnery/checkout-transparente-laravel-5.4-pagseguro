<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamanho extends Model
{
    protected $fillable = [
        'tamanho',
        'slug'
    ];

    public function produtos()
    {
        return $this->belongsToMany('App\Produto', 'produto_tamanhos')->where('status', '!=', 2)->where('depor', '=', null);
    }

    public function pecas()
    {
        return $this->belongsToMany('App\Peca', 'produto_tamanhos')->where('status', '!=', 2)->where('depor', '=', null);
    }

}
