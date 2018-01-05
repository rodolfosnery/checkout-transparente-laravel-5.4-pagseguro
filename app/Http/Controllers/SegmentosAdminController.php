<?php

namespace App\Http\Controllers;


use App\Segmento;
use Illuminate\Http\Request;

class SegmentosAdminController extends Controller
{
    public function index()
    {
        $segmentos = Segmento::paginate(50);
        return view('admin.segmentos.index', compact('segmentos'));
    }


    public function store(Request $request)
    {
        Segmento::create($request->all());
        return redirect()
            ->route('admin.segmentos.index')
            ->withSucess('Cadastro criado com sucesso!');
    }

    public function edit($id)
    {

        $segmento = Segmento::find($id);
        return view('admin.segmentos.edit', compact('segmento'));

    }

    public function update(Request $request, $id)
    {

        $segmento = Segmento::findOrFail($id);
        $segmento->update($request->all());

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.segmentos.index')
            ->withSuccess('segmento alterado com sucesso!');

    }


    public function destroy($id)
    {
        Segmento::find($id)->delete();
        return redirect()
            ->route('admin.segmentos.index')
            ->withSuccessdel('Segmento Excluido!');
    }
}
