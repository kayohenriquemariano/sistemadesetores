<?php

namespace App\Http\Controllers;

use App\Models\Setores;
use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;

class SetoresController extends Controller
{
    public function index()
    {
        return Setores::all();
    }

    public function store(StoreSetorRequest $request)
    {
        $setor = Setores::create($request->validated());

        return response()->json($setor, 201);
    }

    public function update(UpdateSetorRequest $request, $id)
    {
        $setor = Setores::findOrFail($id);
        $setor->update($request->validated());

        return response()->json($setor);
    }

    public function destroy($id)
    {
        $setor = Setores::findOrFail($id);
        $setor->delete();

        return response()->json([
            'message' => 'Setor excluído com sucesso'
        ]);
    }
}
