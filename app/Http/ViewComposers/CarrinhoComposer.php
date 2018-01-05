<?php namespace App\Http\ViewComposers;


use App\Cart;
use App\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class CarrinhoComposer {


    private $cart;

    public function __construct(Cart $cart)
    {

        $this->cart = $cart;

    }

    public function compose(View $view)
    {

        $cart = $this->getCart();
        $view->with(compact('cart'));

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
