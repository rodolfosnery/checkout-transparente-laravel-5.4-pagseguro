<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestPeca extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'produto_id' => 'required',
            'modelo_id' => 'required',
            'titulo' => 'required',
            'preco' => 'required',
            'descricao' => 'required'

        ];
    }

    public function produtoFillData()
    {

        return [
            'produto_id' => $this->produto_id,
            'modelo_id' => $this->modelo_id,
            'status' => $this->status,
            'outlet' => $this->outlet,
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'depor' => $this->depor,
        ];
    }
}
