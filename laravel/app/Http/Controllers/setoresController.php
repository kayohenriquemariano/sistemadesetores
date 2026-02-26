<?php

namespace App\Http\Controllers;

use App\Services\SetorService;
use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;

class SetoresController extends Controller
{
    private $setorService;

    public function __construct(SetorService $setorService)
    {
        $this->setorService = $setorService;
    }

    public function index()
    {
        return response()->json($this->setorService->list());
    }

    public function store(StoreSetorRequest $request)
{
    try {
        $setor = $this->setorService->store($request->validated());

        return response()->json($setor, 201);
        //$e captura a exceção lançada pelo serviço e retorna uma resposta JSON com a mensagem de erro e o status HTTP 422 (Unprocessable Entity).
    } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 422);
    }
}

    public function update(UpdateSetorRequest $request, $id)
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
