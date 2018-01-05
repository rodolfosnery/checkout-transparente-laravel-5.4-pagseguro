<?php

namespace App\Http\Controllers;

use App\Tamanho;
use Illuminate\Http\Request;

class TamanhosAdminController extends Controller
{
    public function index()
    {
        $tamanhos = Tamanho::paginate(50);
        return view('admin.tamanhos.index', compact('tamanhos'));
    }


    public function store(Request $request)
    {
        Tamanho::create($request->all());
        return redirect()
            ->route('admin.tamanhos.index')
            ->withSucess('Cadastro criado com sucesso!');
    }

    public function edit($id)
    {

        $tamanho = Tamanho::find($id);
        return view('admin.tamanhos.edit', compact('tamanho'));

    }

    public function update(Request $request, $id)
    {

        $tamanho = Tamanho::findOrFail($id);
        $tamanho->update($request->all());

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.tamanhos.index')
            ->withSuccess('tamanho alterado com sucesso!');

    }


    public function destroy($id)
    {
        Tamanho::find($id)->delete();
        return redirect()
            ->route('admin.tamanhos.index')
            ->withSuccessdel('Tamanho Excluido!');
    }
}
