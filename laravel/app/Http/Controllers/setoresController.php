<?php

namespace App\Http\Controllers;

use App\Models\setores;
use Illuminate\Http\Request;

class setoresController extends Controller
{

    public function index()
    {
        return setores::all();
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',

        ]);

        $setores = setores::create($validated);

        return response()->json($setores, 201);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',

        ]);


        $setores = setores::findOrFail($id);
        $setores->update($validated);

        return response()->json($setores);
    }


    public function destroy($id)
    {
        $setores = setores::findOrFail($id);
        $setores->delete();

        return response()->json(['message' => 'Setor excluído com sucesso']);
    }
}
