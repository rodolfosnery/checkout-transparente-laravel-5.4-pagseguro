<?php namespace App\Http\ViewComposers;


use App\Category;
use App\Collection;
use App\Segmento;
use Illuminate\Contracts\View\View;

class MenuComposer {

    public function compose(View $view)
    {

        $segmentos = Segmento::orderBy('id', 'asc')->get();
        $view->with(compact('segmentos'));

    }

}
