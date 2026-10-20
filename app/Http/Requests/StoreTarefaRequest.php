<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTarefaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'titulo'    => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'concluida' => 'boolean',
    ];
}
}
