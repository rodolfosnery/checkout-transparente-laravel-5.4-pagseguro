<?php

namespace App\Http\Controllers;

use App\Estampa;
use App\Modelo;
use App\Produto;
use App\Tamanho;
use Illuminate\Http\Request;

class EstampasController extends Controller
{
    public function estampa($slug){


        $modelos = Modelo::all();
        $tamanhos = Tamanho::all();
        $estampas = Estampa::all();
        $estampa = Estampa::where('slug', '=', $slug)->first();

        return view('produtos.estampas', compact('estampa', 'estampas', 'modelos', 'tamanhos'));

    }
}
