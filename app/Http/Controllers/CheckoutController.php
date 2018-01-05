<?php

namespace App\Http\Controllers;

use App\Cart;
//use App\Events\CheckoutEvent;
use App\Order;
use App\OrderItem;

use App\Http\Requests;
use App\Peca;
use App\Produto;
use App\ProdutoTamanho;
use App\Tamanho;
use Illuminate\Http\Request;
use App\PagSeguro\PagSeguro;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{

    private $cart;

    public function __construct(Cart $cart)
    {

        $this->cart = $cart;

    }

    public function resumo($tipo_do_frete = 41106, $cep_origem = 74850470, $peso = 1, $altura = 5, $largura = 31, $comprimento = 28)
    {

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
        $url .= "nCdEmpresa=";
        $url .= "&sDsSenha=";
        $url .= "&nCdServico=".$tipo_do_frete;
        $url .= "&sCepOrigem=".$cep_origem;
        $url .= "&sCepDestino=".Auth::user()->cep;
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

        $valorfrete_amount = str_replace(",",".",$xml->cServico->Valor);

        $cart = $this->getCart();
        $data = [];
        $data['email'] = 'loja@brasil70bikini.com.br';
        $data['token'] = '2F23B692DDBA444FB3D0943A61101BCC';

        $reference = substr(md5(uniqid(rand(),true)),0,6);
        $response = (new PagSeguro)->request(PagSeguro::SESSION_SANDBOX, $data);

        $session = new \SimpleXMLElement($response->getContents());
        $session = $session->id;

        $amount = number_format($cart->getTotal()+$valorfrete_amount, 2, '.', '');

        return view('cart.resumo', compact('cart', 'session', 'amount', 'reference', 'xml'));

    }

    public function checkout()
    {

        $data = request()->all();
        unset($data['_token']);
        $data['email'] = 'loja@brasil70bikini.com.br';
        $data['token'] = '2F23B692DDBA444FB3D0943A61101BCC';
        $data['paymentMode'] = 'default';
        $data['paymentMethod'] = 'creditCard';
        $data['recceiverEmail'] = 'loja@brasil70bikini.com.br';
        $data['currency'] = 'BRL';

        // Info usuarios
        $data['senderName'] = Auth::user()->name.' '.Auth::user()->sobrenome;
        $cpf = str_replace("-", "", Auth::user()->cpf);
        $data['senderCPF'] = str_replace(".", "", $cpf);
        $data['senderEmail'] = Auth::user()->email;
        $data['senderPhone'] = str_replace("-", "", substr(Auth::user()->telefone, 5, 9));
        $data['senderAreaCode'] = substr(Auth::user()->telefone, 1, 2);

        $data['creditCardHolderAreaCode'] = substr(Auth::user()->telefone, 1, 2);
        $data['creditCardHolderPhone'] = str_replace("-", "", substr(Auth::user()->telefone, 5, 9));

        $data['shippingAddressCountry'] = 'BR';
        $data['billingAddressCountry'] = 'BR';

        // lista de produtos
        $cart = $this->getCart();
        $key = 1;
        foreach($cart->all() as $k => $item){
            $data['itemId'.$key] = $item['codigo'];
            $data['itemDescription'.$key] = $item['titulo'].' / Tamanho '.$item['tamanho'];
            $data['itemAmount'.$key] = number_format($item['preco'], 2, '.', '');
            $data['itemQuantity'.$key] = $item['qtd'];
            $key ++;
        }

        // Info entrega
        $data['shippingAddressPostalCode'] = str_replace("-", "", Auth::user()->cep);
        $data['shippingAddressStreet'] = Auth::user()->rua;
        $data['shippingAddressNumber'] = Auth::user()->numero;
        $data['shippingAddressComplement'] = Auth::user()->complemento;
        $data['shippingAddressDistrict'] = Auth::user()->bairro;
        $data['shippingAddressCity'] = Auth::user()->cidade;
        $data['shippingAddressState'] = Auth::user()->uf;

        $data['creditCardHolderName'] = Auth::user()->name.' '.Auth::user()->sobrenome;
        $data['creditCardHolderCPF'] = str_replace(".", "", $cpf);
        $data['creditCardHolderPhone'] = str_replace("-", "", substr(Auth::user()->telefone, 5, 9));

        $data['billingAddressPostalCode'] = str_replace("-", "", Auth::user()->cep);
        $data['billingAddressStreet'] = Auth::user()->bairro;
        $data['billingAddressNumber'] = Auth::user()->numero;
        $data['billingAddressComplement'] = Auth::user()->complemento;
        $data['billingAddressDistrict'] = Auth::user()->bairro;
        $data['billingAddressCity'] = Auth::user()->cidade;
        $data['billingAddressState'] = Auth::user()->uf;

        $data['installmentValue'] = number_format($data['installmentValue'], 2, '.', '');

        try {
            $response = (new PagSeguro)->request(PagSeguro::CHECKOUT_SANDBOX, $data);

        } catch (\Exception $e) {
            $e->getCode();
            $e->getMessage();
        }

    }

    public function obrigado(Order $orderModel, $valorfrete, $reference)
    {

        if(!Session::has('cart')){
            return false;
        }

        $cart = Session::get('cart');
        if ($cart->getTotal() > 0)
        {

            $order = $orderModel->create(['user_id' => Auth::user()->id, 'codigo' => $reference, 'total' => $cart->getTotal(), 'frete' => $valorfrete]);

            foreach($cart->all() as $k => $item)
            {
                if(empty($item['cartpro'])){
                    $order->items()->create(['peca_id' => $k, 'preco' => $item['preco'], 'qtd' => $item['qtd']]);
                    $estoque = ProdutoTamanho::where('peca_id', '=', $k)->where('tamanho_id', '=', $item['tamanhoid'])->first();
                    $estoque_final = $estoque->quantidade - $item['qtd'];
                    $estoque->update(['quantidade' => $estoque_final]);

                }
                elseif(!empty($item['cartpro'])){

                    $order->items()->create(['produto_id' => $item['cartpro'], 'preco' => $item['preco'], 'qtd' => $item['qtd']]);
                    $produto = Produto::where('id', '=', $item['cartpro'])->first();
                    foreach($produto->pecas as $peca){
                        $estoque = ProdutoTamanho::where('peca_id', '=', $peca->id)->where('tamanho_id', '=', $item['tamanhoid'])->first();
                        $estoque_final = $estoque->quantidade - $item['qtd'];
                        $estoque->update(['quantidade' => $estoque_final]);
                    }
                }
            }

            $cart->clear();

        }

        return view('cart.obrigado', compact('order', 'cart'));

    }


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



