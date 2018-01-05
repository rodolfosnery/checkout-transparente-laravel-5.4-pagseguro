<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'segmento_id',
        'collection_id',
        'status',
        'outlet',
        'destaque',
        'titulo',
        'slug',
        'descricao',
        'codigo',
        'preco',
        'depor'

    ];

    protected $dates = ['deleted_at'];

    public function segmento()
    {
        return $this->belongsTo('App\Segmento');
    }

    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }

    public function pecas()
    {
        return $this->hasMany('App\Peca');
    }

//    muitos a muitos

    public function tamanhos()
    {
        return $this->belongsToMany('App\Tamanho', 'produto_tamanhos');
    }

    public function estampas()
    {
        return $this->belongsToMany('App\Estampa', 'produto_estampas');
    }

    public function syncEstampas(array $estampas)
    {
        Estampa::addNeededEstampas($estampas);

        if (count($estampas)) {
            $this->estampas()->sync(
                Estampa::whereIn('estampa', $estampas)->pluck('id')->all()
            );
            return;
        }

        $this->estampas()->detach();
    }



    //    images

    public function images()
    {
        return $this->hasMany('App\ProdutoImage');
    }

}
