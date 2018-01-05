<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer(['template.template'], 'App\Http\ViewComposers\CarrinhoComposer');
        View::composer(['elements.menu'], 'App\Http\ViewComposers\MenuComposer');
        View::composer(['elements.destaques'], 'App\Http\ViewComposers\DestaqueComposer');

    }
    
    public function register()
    {
        //
    }
}
