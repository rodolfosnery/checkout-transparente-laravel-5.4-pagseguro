<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestCart extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tamanho' => 'required',
        ];
    }

}
