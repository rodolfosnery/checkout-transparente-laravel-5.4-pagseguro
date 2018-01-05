<?php

namespace App\Http\Controllers;

use App\Cart;

use App\Http\Requests\RequestCart;
use App\PagSeguro\PagSeguro;
use App\Peca;
use App\PecaImage;
use App\Produto;
use App\ProdutoImage;
use App\ProdutoTamanho;
use App\Tamanho;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    private $cart;

    public function __construct(Cart $cart)
    {
       $this->cart = $cart;
    }

    public function index(Request $request, $tipo_do_frete = 41106, $cep_origem = 74850470, $peso = 1, $altura = 5, $largura = 31, $comprimento = 28)
    {

        $cart = $this->getCart();

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&nCdServico=".$tipo_do_frete;
        $url .= "&sCepOrigem=".$cep_origem;
        $url .= "&sCepDestino=".$request->input('cep_destino');
        $url .= "&nVlPeso=".$peso;
        $url .= "&nVlAltura=".$altura;
        $url .= "&nVlLargura=".$largura;
        $url .= "&nVlComprimento=".$comprimento;
        $url .= "&nCdFormato=1";
        $url .= "&sCdMaoPropria=s";
        $url .= "&sCdAvisoRecebimento=n";
        $url .= "&nVlDiametro=0";
        $url .= "&StrRetorno=xml";

        $xml = simplexml_load_file($url);

        return view('cart.index', compact('cart', 'xml'));

    }

    public function add(RequestCart $request, $id)
    {

        $cart = $this->getCart();

        $peca = Peca::find($id);
        $pecaimage = PecaImage::where('peca_id', '=', $id)->first();

        $slug = $peca->produto;

        $tamanho = Tamanho::where('id', '=', $request->input('tamanho'))->first();
        $tamanhoid = $tamanho->id;

        if($tamanho->tamanho != $cart->tamanho()){

            $cart->remove($id);
            $cart->add($id, $peca->titulo, $peca->codigo, $peca->preco, $slug->slug, $pecaimage->file_name, $tamanho->tamanho, $tamanhoid);

        }else{
            $cart->add($id, $peca->titulo, $peca->codigo, $peca->preco, $slug->slug, $pecaimage->file_name, $tamanho->tamanho, $tamanhoid);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart');

    }

    public function addPro(RequestCart $request, $id)
    {

        $cart = $this->getCart();

        $produto = Produto::find($id);
        $produtoimage = ProdutoImage::where('produto_id', '=', $id)->first();

        $tamanho = Tamanho::where('id', '=', $request->input('tamanho'))->first();
        $tamanhoid = $tamanho->id;

        if($tamanho->tamanho != $cart->tamanho()){

            $cart->remove($id);
            $cart->addPro($id, $produto->titulo, $produto->codigo, $request->input('preco'), $produto->slug, $produtoimage->file_name, $tamanho->tamanho, $tamanhoid, $request->input('cartpro'));

        }else{
            $cart->addPro($id, $produto->titulo, $produto->codigo, $request->input('preco'), $produto->slug, $produtoimage->file_name, $tamanho->tamanho, $tamanhoid, $request->input('cartpro'));
        }

        Session::put('cart', $cart);

        return redirect()->route('cart');

    }


    public function destroy($id)
    {

        $cart = $this->getCart();

        $cart->remove($id);

        Session::put('cart', $cart);

        return redirect()->route('cart');

    }



    /**
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            return $cart;
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }

}