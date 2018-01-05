<?php

namespace App\Http\Controllers;

use App\Estampa;
use App\Modelo;
use App\Peca;
use App\Produto;
use App\ProdutoTamanho;
use App\Segmento;
use App\Tamanho;
use Illuminate\Http\Request;

class SegmentosController extends Controller
{
    public function segmento($slug){

        $estampas = Estampa::all();
        $tamanhos = Tamanho::all();
        $segmento = Segmento::where('slug', '=', $slug)->first();
        return view('produtos.segmentos', compact('segmento', 'estampas', 'tamanhos'));

    }


}
