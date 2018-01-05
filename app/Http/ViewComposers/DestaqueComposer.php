<?php namespace App\Http\ViewComposers;

use App\Produto;
use Illuminate\Contracts\View\View;

class DestaqueComposer {

    public function compose(View $view)
    {

        $produtos = Produto::orderByRaw("RAND()")->where('status', '!=', 2)->limit(4)->get();
        $view->with(compact('produtos'));

    }

}

