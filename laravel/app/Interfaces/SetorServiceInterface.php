<?php

namespace App\Interfaces;

interface SetorServiceInterface
{
    public function listar();
    public function store(array $dados);
    public function update(array $dados, $id);
    public function destroy($id);
}
