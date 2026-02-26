<?php

namespace App\Http\Controllers;

use App\Services\SetorService;
use App\Http\Requests\SetorRequest;

class SetoresController extends Controller
{
    private $setorService;

    public function __construct(SetorService $setorService)
    {
        $this->setorService = $setorService;
    }

    public function index()
    {
        return response()->json($this->setorService->listar());
    }

    public function store(SetorRequest $request)
    {
        $setor = $this->setorService->store($request->validated());
        return response()->json($setor, 201);
    }

    public function update(SetorRequest $request, $id)
    {
        $setor = $this->setorService->update($request->validated(), $id);
        return response()->json($setor);
    }

    public function destroy($id)
    {
        $this->setorService->destroy($id);

        return response()->json([
            'message' => 'Setor excluído com sucesso'
        ]);
    }
}
