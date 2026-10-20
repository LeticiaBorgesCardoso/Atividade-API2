<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTarefaRequest;
use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        return TarefaResource::collection(Tarefa::latest()->paginate(10));
    }

    public function store(StoreTarefaRequest $request)
    {
        $tarefa = Tarefa::create($request->validated());
        return new TarefaResource($tarefa); // retorna 201 automaticamente
    }

    public function show(Tarefa $tarefa)
    {
        return new TarefaResource($tarefa);
    }

    public function update(StoreTarefaRequest $request, Tarefa $tarefa)
    {
        $tarefa->update($request->validated());
        return new TarefaResource($tarefa);
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->noContent(); // 204
    }
}