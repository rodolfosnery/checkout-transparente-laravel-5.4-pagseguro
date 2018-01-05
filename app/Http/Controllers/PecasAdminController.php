<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPeca;
use App\Jobs\PecaFormFields;
use App\Modelo;
use App\Tamanho;
use Intervention\Image\Facades\Image;
use App\Peca;
use App\PecaImage;
use App\Produto;
use App\ProdutoTamanho;
use Illuminate\Http\Request;

class PecasAdminController extends Controller
{
    public function index()
    {

        $pecas = Peca::orderBy('id', 'desc');

        $pecas = $pecas->paginate(500);

        return view('admin.pecas.index', compact('pecas'));

    }

    public function sale()
    {
        $pecas = Peca::where('depor', '!=', '')->get();
        return view('admin.pecas.sale', compact('pecas'));
    }

    public function excluidos()
    {
        $pecas = Peca::onlyTrashed()->paginate(3500);
        return view('admin.pecas.excluidos', compact('pecas'));
    }

    public function ativar($id)
    {
        Peca::withTrashed()->where('id', $id)->restore();
        return redirect()
            ->route('admin.pecas.index')
            ->withSuccess('Peca ativado');
    }

    public function deletar($id)
    {
        Peca::withTrashed()->where('id', $id)->forceDelete();
        return redirect()
            ->route('admin.pecas.excluidos')
            ->withSuccess('Peca Excluido');
    }

    public function create()
    {

        $produtos = Produto::pluck('titulo', 'id');
        $modelos = Modelo::pluck('titulo', 'id');
        $data = $this->dispatch(new PecaFormFields());
        return view('admin.pecas.create', $data, compact('produtos', 'modelos'));

    }

    public function createProduto($id)
    {

        $produto = Produto::findOrFail($id);
        $produtos = Produto::pluck('titulo', 'id');
        $modelos = Modelo::pluck('titulo', 'id');
        $data = $this->dispatch(new PecaFormFields());
        return view('admin.pecas.createproduto', $data, compact('produto', 'produtos', 'modelos'));

    }

//    public function getModelos(Request $request, $id){
//        if($request->ajax()){
//            $modelos = Modelo::modelos($id);
//            return response()->json($modelos);
//        }
//    }


    public function store(RequestPeca $request)
    {

        $peca = Peca::create($request->all());

        $peca->syncEstampas($request->get('estampas', []));

        return redirect()
            ->route('admin.pecas.index')
            ->withSuccess('Cadastro criado com sucesso!');
    }

    public function edit($id)
    {

        $produtos = Produto::pluck('titulo', 'id');

        $peca = Peca::findOrFail($id);

        $modelos = Modelo::pluck('titulo', 'id');

        $tamanhos = ProdutoTamanho::where('peca_id', '=', $id)->get();

        $data = $this->dispatch(new PecaFormFields($id));

        return view('admin.pecas.edit', $data, compact('peca', 'produtos', 'tamanhos', 'modelos'));


    }

    public function update(RequestPeca $request, $id)
    {

        $peca = Peca::findOrFail($id);

        $peca->fill($request->produtoFillData());

        $peca->save();

        $peca->syncEstampas($request->get('estampas', []));


        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.pecas.index')
            ->withSuccess('Alterado com sucesso!');
    }


    public function destroy($id)
    {
        $peca = Peca::find($id);
        $peca->delete();

        return redirect()
            ->route('admin.pecas.index');
    }

    //  TAMANHOS

    public function tamanhos($id)
    {

        $peca = Peca::findOrFail($id);
        $tamanhos = Tamanho::pluck('tamanho', 'id');
        $peca_tamanhos = ProdutoTamanho::where('peca_id', '=', $peca->id)->get();

        return view('admin.pecas.tamanhos', compact('peca', 'tamanhos', 'peca_tamanhos'));

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

        return view('admin.pecas.edit-tamanhos', compact('tamanho', 'tamanhos'));

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
        $peca = Peca::findOrFail($id);
        return view('admin.pecas.images', compact('peca'));

    }
    public function storeImage(Request $request, PecaImage $PecaImage, $id)
    {

        $file = $request->file('file');
        $file_name = uniqid().$file->getClientOriginalName();
        $file_size = $file->getClientSize();
        $dir = 'img/pecas/'.$file_name;

        $file->move('img/pecas/', $file_name);

        $img = Image::make('img/pecas/'.$file_name)->resize(300, null, function($constraint){
            $constraint->aspectRatio();
        });

        $img->crop(300, 225)->save('img/pecas/thumb/'.$file_name, 100);

        $image = $PecaImage::create([
            'peca_id'=>$id,
            'file_name'=>$file_name,
            'file_size'=>$file_size,
            'dir'=>$dir

        ]);

        return $image;
    }

    public function destroyImage(PecaImage $PecaImage, $id)
    {
        $image = $PecaImage->find($id);

        unlink(public_path($image->dir));
        unlink(public_path('img/pecas/thumb/'.$image->file_name));

        $image->delete();

        return redirect()
            ->back()
            ->withSuccess('Foto excluido com sucesso!');
    }
}
