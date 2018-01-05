<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoTamanho extends Model
{
    protected $fillable = [
        'produto_id',
        'peca_id',
        'tamanho_id',
        'quantidade'

    ];

    public function tamanho()
    {
        return $this->belongsTo('App\Tamanho');
    }

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

    public function peca()
    {
        return $this->belongsTo('App\Peca');
    }
}
