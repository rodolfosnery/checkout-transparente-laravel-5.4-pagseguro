<?php

namespace App\Http\Controllers;

use App\PecaImage;
use App\Produto;
use App\ProdutoImage;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function detalhes($slug){

        $produto = Produto::where('slug', '=', $slug)->first();

        $total = 0;
        foreach($produto->pecas as $peca){

            $total += $peca->preco;
        }

        return view('produtos.detalhes', compact('produto', 'total'));

    }

    public function solo($file_name){

        $image = ProdutoImage::where('file_name', '=', $file_name)->first();
        return view('produtos.solo', compact('image'));

    }

    public function solo_pecas($file_name){

        $image = PecaImage::where('file_name', '=', $file_name)->first();
        return view('produtos.solo_pecas', compact('image'));

    }
}
