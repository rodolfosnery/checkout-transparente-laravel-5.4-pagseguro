<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoEstampa extends Model
{
    protected $fillable = [
        'produto_id',
        'peca_id',
        'estampa_id'

    ];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}
