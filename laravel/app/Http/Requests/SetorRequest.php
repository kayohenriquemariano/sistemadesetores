<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetorRequest extends FormRequest
{
    public function autorizar(): bool
    {
        return true;
    }

    public function regras(): array
    {
        $id = $this->route('setor');

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                Rule::unique('setores','nome')->ignore($id)
            ],
        ];
    }

    public function mensagens(): array
    {
        return [
            'nome.required' => 'O nome do setor é obrigatório.',
            'nome.unique' => 'Esse setor já está cadastrado.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.'
        ];
    }
}
