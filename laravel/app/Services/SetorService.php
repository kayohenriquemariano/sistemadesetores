<?php

namespace App\Services;

use App\Models\Setores;
use App\Interfaces\SetorServiceInterface;

class SetorService implements SetorServiceInterface
{
    private $setor;


    public function __construct(Setores $setor)
    {
        $this->setor = $setor;
    }


    public function listar()
    {
        return $this->setor->orderBy('id','desc')->get();
    }


    public function store(array $dados)
    {
        return $this->setor->create($dados);
    }


    public function update(array $dados, $id)
    {
        $setor = $this->setor->findOrFail($id);
        $setor->update($dados);

        return $setor;
    }


    public function destroy($id)
    {
        $setor = $this->setor->findOrFail($id);
        $setor->delete();

        return true;
    }
}
