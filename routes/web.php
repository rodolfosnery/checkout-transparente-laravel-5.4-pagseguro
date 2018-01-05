<?php

use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('paginas/home');
});

Route::get('/detalhes', function () {
    return view('produtos/detalhes');
});

Route::get('/cadastro', function () {
    return view('auth/register-direct');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/produto/{slug}', ['as' => 'produtos.detalhes', 'uses' => 'ProdutosController@detalhes']);
Route::get('/solo/{file_name}', ['as' => 'solo', 'uses' => 'ProdutosController@solo']);
Route::get('/solo_pecas/{file_name}', ['as' => 'solo_pecas', 'uses' => 'ProdutosController@solo_pecas']);

Route::get('segmento/{slug}', ['as' => 'segmentos', 'uses' => 'SegmentosController@segmento']);
Route::get('estampa/{slug}', ['as' => 'estampas', 'uses' => 'EstampasController@estampa']);
Route::get('modelo/{slug}', ['as' => 'modelo', 'uses' => 'ModelosController@modelo']);

//Registro Cliente
Route::get('/cadastro/cliente', ['as' => 'cadastro.cliente', 'uses' => 'Auth\RegisterController@totalregister']);

//Carrinho
Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::post('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::post('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::post('cart/addPro/{id}', ['as' => 'cart.addPro', 'uses' => 'CartController@addPro']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);


//Atenticar cliente comprar
Route::group(['middleware'=>'auth'], function(){

//checkout
    Route::get('resumo', ['as' => 'resumo', 'uses' => 'CheckoutController@resumo']);
//pagamento final
    Route::post('checkout', ['as' => 'checkout', 'uses' => 'CheckoutController@checkout']);

//FINALIZADO
    Route::get('obrigado/{valorfrete}/{reference}', ['as' => 'obrigado', 'uses' => 'CheckoutController@obrigado']);

//Accoung
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

//Accoung edit
    Route::get('account/edit/{id}', ['as' => 'account.edit', 'uses' => 'AccountController@edit']);

//Accoung edit
    Route::put('account/update/{id}', ['as' => 'account.update', 'uses' => 'AccountController@update']);


});

Route::group(['prefix'=>'admin'], function(){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route:: group(['prefix'=>'collections'], function(){

        Route::get ('/', ['as' => 'admin.collections.index', 'uses' => 'CollectionsAdminController@index']);
        Route::get ('create', ['as' => 'admin.collections.create', 'uses' => 'CollectionsAdminController@create']);
        Route::post ('store', ['as' => 'admin.collections.store', 'uses' => 'CollectionsAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.collections.edit', 'uses' => 'CollectionsAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.collections.update', 'uses' => 'CollectionsAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.collections.destroy', 'uses' => 'CollectionsAdminController@destroy']);

    });


    Route:: group(['prefix'=>'segmentos'], function(){

        Route::get ('/', ['as' => 'admin.segmentos.index', 'uses' => 'SegmentosAdminController@index']);
        Route::post ('store', ['as' => 'admin.segmentos.store', 'uses' => 'SegmentosAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.segmentos.edit', 'uses' => 'SegmentosAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.segmentos.update', 'uses' => 'SegmentosAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.segmentos.destroy', 'uses' => 'SegmentosAdminController@destroy']);

    });

    Route:: group(['prefix'=>'modelos'], function(){

        Route::get ('/', ['as' => 'admin.modelos.index', 'uses' => 'ModelosAdminController@index']);
        Route::get ('create', ['as' => 'admin.modelos.create', 'uses' => 'ModelosAdminController@create']);
        Route::post ('store', ['as' => 'admin.modelos.store', 'uses' => 'ModelosAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.modelos.edit', 'uses' => 'ModelosAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.modelos.update', 'uses' => 'ModelosAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.modelos.destroy', 'uses' => 'ModelosAdminController@destroy']);


    });

    Route:: group(['prefix'=>'tamanhos'], function(){

        Route::get ('/', ['as' => 'admin.tamanhos.index', 'uses' => 'TamanhosAdminController@index']);
        Route::post ('store', ['as' => 'admin.tamanhos.store', 'uses' => 'TamanhosAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.tamanhos.edit', 'uses' => 'TamanhosAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.tamanhos.update', 'uses' => 'TamanhosAdminController@update']);
        Route::get ('{id}/destroy', ['as' => 'admin.tamanhos.destroy', 'uses' => 'TamanhosAdminController@destroy']);

    });

    Route:: group(['prefix'=>'estampas'], function(){

        Route::get ('/', ['as' => 'admin.estampas.index', 'uses' => 'EstampasAdminController@index']);
        Route::post ('store', ['as' => 'admin.estampas.store', 'uses' => 'EstampasAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.estampas.edit', 'uses' => 'EstampasAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.estampas.update', 'uses' => 'EstampasAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.estampas.destroy', 'uses' => 'EstampasAdminController@destroy']);

        //IMAGENS

        Route::get ('{id}/images', ['as' => 'admin.estampas.images', 'uses' => 'EstampasAdminController@images']);
        Route::post ('store/{id}/images', ['as' => 'admin.imagesestampas.store', 'uses' => 'EstampasAdminController@storeImage']);
        Route::get ('destroy/{id}/images', ['as' => 'admin.imagesestampas.destroy', 'uses' => 'EstampasAdminController@destroyImage']);

    });

    Route:: group(['prefix'=>'produtos'], function(){

        Route::get ('/', ['as' => 'admin.produtos.index', 'uses' => 'ProdutosAdminController@index']);
        Route::get ('create', ['as' => 'admin.produtos.create', 'uses' => 'ProdutosAdminController@create']);
        Route::post ('store', ['as' => 'admin.produtos.store', 'uses' => 'ProdutosAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.produtos.edit', 'uses' => 'ProdutosAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.produtos.update', 'uses' => 'ProdutosAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.produtos.destroy', 'uses' => 'ProdutosAdminController@destroy']);
        Route::get('modelos/{id}','ProdutosAdminController@getModelos');

        Route::get ('ativar/{id}', ['as' => 'admin.produtos.ativar', 'uses' => 'ProdutosAdminController@ativar']);
        Route::get ('deletar/{id}', ['as' => 'admin.produtos.deletar', 'uses' => 'ProdutosAdminController@deletar']);
        Route::get ('destaque', ['as' => 'admin.produtos.destaque', 'uses' => 'ProdutosAdminController@destaque']);
        Route::get ('sale', ['as' => 'admin.produtos.sale', 'uses' => 'ProdutosAdminController@sale']);
        Route::get ('excluidos', ['as' => 'admin.produtos.excluidos', 'uses' => 'ProdutosAdminController@excluidos']);

        //TAMANHOS

        Route::get ('{id}/tamanhos', ['as' => 'admin.produtos.tamanhos', 'uses' => 'ProdutosAdminController@tamanhos']);
        Route::post ('store/tamanhos', ['as' => 'admin.tamanhosprodutos.store', 'uses' => 'ProdutosAdminController@storeTamanho']);
        Route::get ('edit/{id}/tamanhos', ['as' => 'admin.tamanhosprodutos.edit', 'uses' => 'ProdutosAdminController@editTamanho']);
        Route::put ('update/{id}/tamanhos', ['as' => 'admin.tamanhosprodutos.update', 'uses' => 'ProdutosAdminController@updateTamanho']);
        Route::get ('destroy/{id}/tamanhos', ['as' => 'admin.tamanhosprodutos.destroy', 'uses' => 'ProdutosAdminController@destroyTamanho']);

        //IMAGENS

        Route::get ('{id}/images', ['as' => 'admin.produtos.images', 'uses' => 'ProdutosAdminController@images']);
        Route::post ('store/{id}/images', ['as' => 'admin.imagesprodutos.store', 'uses' => 'ProdutosAdminController@storeImage']);
        Route::get ('destroy/{id}/images', ['as' => 'admin.imagesprodutos.destroy', 'uses' => 'ProdutosAdminController@destroyImage']);

    });

    Route:: group(['prefix'=>'pecas'], function(){

        Route::get ('/', ['as' => 'admin.pecas.index', 'uses' => 'PecasAdminController@index']);
        Route::get ('create', ['as' => 'admin.pecas.create', 'uses' => 'PecasAdminController@create']);
        Route::get ('{id}/createproduto', ['as' => 'admin.pecas.createproduto', 'uses' => 'PecasAdminController@createProduto']);
        Route::post ('store', ['as' => 'admin.pecas.store', 'uses' => 'PecasAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.pecas.edit', 'uses' => 'PecasAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.pecas.update', 'uses' => 'PecasAdminController@update']);
        Route::delete ('{id}/destroy', ['as' => 'admin.pecas.destroy', 'uses' => 'PecasAdminController@destroy']);

        Route::get ('ativar/{id}', ['as' => 'admin.pecas.ativar', 'uses' => 'PecasAdminController@ativar']);
        Route::get ('deletar/{id}', ['as' => 'admin.pecas.deletar', 'uses' => 'PecasAdminController@deletar']);
        Route::get ('sale', ['as' => 'admin.pecas.sale', 'uses' => 'PecasAdminController@sale']);
        Route::get ('excluidos', ['as' => 'admin.pecas.excluidos', 'uses' => 'PecasAdminController@excluidos']);

        //TAMANHOS

        Route::get ('{id}/tamanhos', ['as' => 'admin.pecas.tamanhos', 'uses' => 'PecasAdminController@tamanhos']);
        Route::post ('store/tamanhos', ['as' => 'admin.tamanhospecas.store', 'uses' => 'PecasAdminController@storeTamanho']);
        Route::get ('edit/{id}/tamanhos', ['as' => 'admin.tamanhospecas.edit', 'uses' => 'PecasAdminController@editTamanho']);
        Route::put ('update/{id}/tamanhos', ['as' => 'admin.tamanhospecas.update', 'uses' => 'PecasAdminController@updateTamanho']);
        Route::get ('destroy/{id}/tamanhos', ['as' => 'admin.tamanhospecas.destroy', 'uses' => 'PecasAdminController@destroyTamanho']);

        //IMAGENS

        Route::get ('{id}/images', ['as' => 'admin.pecas.images', 'uses' => 'PecasAdminController@images']);
        Route::post ('store/{id}/images', ['as' => 'admin.imagespecas.store', 'uses' => 'PecasAdminController@storeImage']);
        Route::get ('destroy/{id}/images', ['as' => 'admin.imagespecas.destroy', 'uses' => 'PecasAdminController@destroyImage']);

    });

    Route:: group(['prefix'=>'orders'], function(){

        Route::get ('/', ['as' => 'admin.orders.index', 'uses' => 'OrdersAdminController@index']);
        Route::post ('store', ['as' => 'admin.orders.store', 'uses' => 'OrdersAdminController@store']);
        Route::get ('{id}/edit', ['as' => 'admin.orders.edit', 'uses' => 'OrdersAdminController@edit']);
        Route::put ('{id}/update', ['as' => 'admin.orders.update', 'uses' => 'OrdersAdminController@update']);

    });

});

