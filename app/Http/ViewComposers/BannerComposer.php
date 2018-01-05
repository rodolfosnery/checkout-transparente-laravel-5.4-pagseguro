<?php namespace App\Http\ViewComposers;

use App\Banner;
use Illuminate\Contracts\View\View;

class BannerComposer {

    public function compose(View $view)
    {
        $banners = Banner::all();
        $view->with(compact('banners'));
    }

}

