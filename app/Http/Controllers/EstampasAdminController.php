<?php

namespace App\Http\Controllers;

use App\Estampa;
use App\EstampaImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EstampasAdminController extends Controller
{
    public function index()
    {
        $estampas = Estampa::all();
        return view('admin.estampas.index', compact('estampas'));
    }


    public function store(Request $request)
    {

        Estampa::create($request->all());

        return redirect()
            ->route('admin.estampas.index')
            ->withSuccess('Estampa criado com sucesso!');

    }

    public function edit($id)
    {

        $estampa = Estampa::find($id);
        return view('admin.estampas.edit', compact('estampa'));
    }

    public function update(Request $request, $id)
    {

        $estampa = Estampa::findOrFail($id);
        $estampa->update($request->all());

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.estampas.index')
            ->withSuccess('Estampa alterado com sucesso!');
    }


    public function destroy($id)
    {

        $estampa = Estampa::findOrFail($id);

        $estampa->delete();

        return redirect()
            ->route('admin.estampas.index')
            ->withSuccessdel('Estampa movido para Lexiera!');
    }

//        IMAGENS
    public function images($id)
    {
        $estampa = Estampa::findOrFail($id);
        return view('admin.estampas.images', compact('estampa'));
    }
    public function storeImage(Request $request, EstampaImage $EstampaImage, $id)
    {

        $file = $request->file('file');
        $file_name = uniqid().$file->getClientOriginalName();
        $file_size = $file->getClientSize();
        $dir = 'img/estampas/'.$file_name;

        $file->move('img/estampas/', $file_name);

        $img = Image::make('img/estampas/'.$file_name)->resize(50, null, function($constraint){
            $constraint->aspectRatio();
        });

        $img->save('img/estampas/thumb/'.$file_name, 86);

        $image = $EstampaImage::create([
            'estampa_id'=>$id,
            'file_name'=>$file_name,
            'file_size'=>$file_size,
            'dir'=>$dir

        ]);

        return $image;
    }

    public function destroyImage(EstampaImage $EstampaImage, $id)
    {
        $image = $EstampaImage->find($id);

        unlink(public_path($image->dir));
        unlink(public_path('img/estampas/thumb/'.$image->file_name));

        $estampa = $image->estampa;
        $image->delete();

        return redirect()->route('admin.estampas.images', ['id' => $estampa->id]);
    }


}
