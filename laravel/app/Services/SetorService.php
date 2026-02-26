<?php

namespace App\Services;

use App\Models\Setores;

class SetorService
{
    public function list()
    {
        return Setores::all();
    }

    public function store(array $given)
    {
            
        if (Setores::where('nome', $given['nome'])->exists()) {
            throw new \Exception('Setor já existe');
        }

        return Setores::create($given);
    }

    public function update(array $given, $id)
    {
        $setor = Setores::findOrFail($id);
        $setor->update($given);

        return $setor;
    }

    public function destroy($id)
    {
        $setor = Setores::findOrFail($id);
        $setor->delete();
    }
}
