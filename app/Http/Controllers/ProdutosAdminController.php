<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Http\Requests\RequestProduto;
use App\Jobs\ProdutoFormFields;
use App\Modelo;
use App\Peca;
use App\ProdutoTamanho;
use App\Tamanho;
use Intervention\Image\Facades\Image;
use App\Produto;
use App\ProdutoImage;
use App\Segmento;
use Illuminate\Http\Request;

class ProdutosAdminController extends Controller
{
    public function index()
    {

        $produtos = Produto::orderBy('id', 'desc');

        $produtos = $produtos->paginate(500);

        return view('admin.produtos.index', compact('produtos'));

    }

    public function destaque()
    {
        $produtos = Produto::where('destaque', '=', 1)->get();
        return view('admin.produtos.destaques', compact('produtos'));
    }

    public function sale()
    {
        $produtos = Produto::where('depor', '!=', '')->get();
        return view('admin.produtos.sale', compact('produtos'));
    }

    public function excluidos()
    {
        $produtos = Produto::onlyTrashed()->paginate(3500);
        return view('admin.produtos.excluidos', compact('produtos'));
    }

    public function ativar($id)
    {
        Produto::withTrashed()->where('id', $id)->restore();
        return redirect()
            ->route('admin.produtos.index')
            ->withSuccess('Produto ativado');
    }

    public function deletar($id)
    {
        Produto::withTrashed()->where('id', $id)->forceDelete();
        return redirect()
            ->route('admin.produtos.excluidos')
            ->withSuccess('Produto Excluido');
    }

    public function create()
    {

        $segmentos = Segmento::pluck('titulo', 'id');
        $modelos = Modelo::pluck('titulo', 'id');
        $collections = Collection::pluck('titulo', 'id');
        $data = $this->dispatch(new ProdutoFormFields());
        return view('admin.produtos.create', $data, compact('segmentos', 'modelos', 'collections'));

    }

//    public function getModelos(Request $request, $id){
//        if($request->ajax()){
//            $modelos = Modelo::modelos($id);
//            return response()->json($modelos);
//        }
//    }


    public function store(RequestProduto $request)
    {

        $produto = Produto::create($request->all());

        $produto->syncEstampas($request->get('estampas', []));

        return redirect()
            ->route('admin.produtos.index')
            ->withSuccess('Cadastro criado com sucesso!');
    }

    public function edit($id)
    {

        $segmentos = Segmento::pluck('titulo', 'id');
        $collections = Collection::pluck('titulo', 'id');
        $produto = Produto::find($id);

        $tamanhos = ProdutoTamanho::where('produto_id', '=', $id)->get();

        $data = $this->dispatch(new ProdutoFormFields($id));

        return view('admin.produtos.edit', $data, compact('produto', 'segmentos', 'collections', 'tamanhos'));


    }

    public function update(RequestProduto $request, $id)
    {

        $produto = Produto::findOrFail($id);

        $produto->fill($request->produtoFillData());

        $produto->save();

        $produto->syncEstampas($request->get('estampas', []));


        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.produtos.index')
            ->withSuccess('Alterado com sucesso!');
    }


    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()
            ->route('admin.produtos.index');
    }

    //  TAMANHOS

    public function tamanhos($id)
    {

        $produto = Produto::findOrFail($id);
        $tamanhos = Tamanho::pluck('tamanho', 'id');
        $produto_tamanhos = ProdutoTamanho::where('produto_id', '=', $produto->id)->get();

        return view('admin.produtos.tamanhos', compact('produto', 'tamanhos', 'produto_tamanhos'));

    }

    public function storeTamanho(Request $request)
    {


        ProdutoTamanho::create($request->all());

        return redirect()
            ->back()
            ->withSuccess('Tamanho criado com sucesso!');

    }

    public function editTamanho($id)
    {

        $tamanho = ProdutoTamanho::findOrFail($id);
        $tamanhos = Tamanho::pluck('tamanho', 'id');

        return view('admin.produtos.edit-tamanhos', compact('tamanho', 'tamanhos'));

    }

    public function updateTamanho(Request $request, $id)
    {

        $tamanho = ProdutoTamanho::findOrFail($id);
        $tamanho->update($request->all());


        return redirect()
            ->back()
            ->withSuccess('Quantidade alterada com sucesso!');

    }

    public function destroyTamanho($id)
    {
        $tamanho = ProdutoTamanho::find($id);
        $tamanho->delete();

        return redirect()
            ->back()
            ->withSuccess('Tamanho excluido com sucesso!');
    }




    //  IMAGENS
    public function images($id)
    {
        $produto = Produto::findOrFail($id);
        return view('admin.produtos.images', compact('produto'));

    }
    public function storeImage(Request $request, ProdutoImage $ProdutoImage, $id)
    {

        $file = $request->file('file');
        $file_name = uniqid().$file->getClientOriginalName();
        $file_size = $file->getClientSize();
        $dir = 'img/produtos/'.$file_name;

        $file->move('img/produtos/', $file_name);

        $img = Image::make('img/produtos/'.$file_name)->resize(300, null, function($constraint){
            $constraint->aspectRatio();
        });

        $img->crop(300, 450)->save('img/produtos/thumb/'.$file_name, 100);

        $image = $ProdutoImage::create([
            'produto_id'=>$id,
            'file_name'=>$file_name,
            'file_size'=>$file_size,
            'dir'=>$dir

        ]);

        return $image;
    }

    public function destroyImage(ProdutoImage $ProdutoImage, $id)
    {
        $image = $ProdutoImage->find($id);

        unlink(public_path($image->dir));
        unlink(public_path('img/produtos/thumb/'.$image->file_name));


        $image->delete();

        return redirect()
            ->back()
            ->withSuccess('Foto excluido com sucesso!');
    }
}
