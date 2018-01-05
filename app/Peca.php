<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peca extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'produto_id',
        'modelo_id',
        'status',
        'outlet',
        'titulo',
        'slug',
        'descricao',
        'codigo',
        'preco',
        'depor'

    ];

    protected $dates = ['deleted_at'];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }

    public function images()
    {
        return $this->hasMany('App\PecaImage');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Modelo');
    }

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

}
