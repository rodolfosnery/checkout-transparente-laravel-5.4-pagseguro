<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;

class CollectionsAdminController extends Controller
{
    public function index()
    {
        $collections = Collection::paginate(50);
        return view('admin.collections.index', compact('collections'));
    }


    public function store(Request $request)
    {
        Collection::create($request->all());
        return redirect()
            ->route('admin.collections.index')
            ->withSucess('Coleção criado com sucesso!');
    }

    public function edit($id)
    {

        $collection = Collection::find($id);
        return view('admin.collections.edit', compact('collection'));

    }

    public function update(Request $request, $id)
    {

        $collection = Collection::findOrFail($id);
        $collection->update($request->all());

        if ($request->action === 'continue') {
            return redirect()
                ->back()
                ->withSuccess('Alterado');
        }

        return redirect()
            ->route('admin.collections.index')
            ->withSuccess('collection alterado com sucesso!');

    }


    public function destroy($id)
    {
        Collection::find($id)->delete();
        return redirect()
            ->route('admin.collections.index')
            ->withSuccessdel('Collection Excluido!');
    }
}
