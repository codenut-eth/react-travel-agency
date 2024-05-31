<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function index()
    {
        return Affiliate::all(); // Retorna diretamente a coleção
    }

    public function show(Affiliate $affiliate)
    {
        return $affiliate; // Usa route model binding para buscar o afiliado
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Traduzido e adicionado validações
            'comission' => 'required|numeric', // Traduzido e tipo numérico
            'document' => 'nullable|string|max:255',
            'bank_data' => 'nullable|string',
            'afiliated_observation' => 'nullable|string',
        ]);

        return Affiliate::create($validatedData); // Cria o afiliado e retorna
    }

    public function update(Request $request, Affiliate $affiliate)
    {
        $validatedData = $request->validate([ // Mesmas validações do store
            'name' => 'required|string|max:255',
            'comission' => 'required|numeric',
            'document' => 'nullable|string|max:255',
            'bank_data' => 'nullable|string',
            'afiliated_observation' => 'nullable|string',
        ]);

        $affiliate->update($validatedData);

        return $affiliate; // Retorna o afiliado atualizado
    }

    public function destroy(Affiliate $affiliate)
    {
        $affiliate->delete();

        return response()->noContent(); // Resposta padrão para exclusão
    }
}
