<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestProduto extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'segmento_id' => 'required',
            'collection_id' => 'required',
            'titulo' => 'required',
        ];
    }

    public function produtoFillData()
    {

        return [
            'segmento_id' => $this->segmento_id,
            'collection_id' => $this->collection_id,
            'status' => $this->status,
            'outlet' => $this->outlet,
            'destaque' => $this->destaque,
            'titulo' => $this->titulo,
            'codigo' => $this->codigo,
            'slug' => $this->slug,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'depor' => $this->depor,
        ];
    }
}
