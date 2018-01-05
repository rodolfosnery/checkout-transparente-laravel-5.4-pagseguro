<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Segmento;
use Illuminate\Http\Request;

class ModelosAdminController extends Controller
{
    public function index()
    {
        $modelos = Modelo::all();
        return view('admin.modelos.index', compact('modelos'));
    }

    public function create()
    {

        $segmentos = Segmento::pluck('titulo', 'id');
        return view('admin.modelos.create', compact('segmentos'));

    }

    public function store(Request $request)
    {

        Modelo::create($request->all());

        return redirect()
            ->route('admin.modelos.index')
            ->withSuccess('Modelo criado com sucesso!');

    }

    public function edit($id)
    {

        $modelo = Modelo::find($id);
        return view('admin.modelos.edit', compact('modelo'));
    }

    public function update(Request $request, $id)
    {

        $modelo = Modelo::findOrFail($id);
        $modelo->update($request->all());

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.modelos.index')
            ->withSuccess('Modelo alterado com sucesso!');
    }


    public function destroy($id)
    {

        $modelo = Modelo::findOrFail($id);

        $modelo->delete();

        return redirect()
            ->route('admin.modelos.index')
            ->withSuccessdel('Modelo movido para Lexiera!');
    }

}
