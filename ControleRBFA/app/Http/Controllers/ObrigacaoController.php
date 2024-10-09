<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obrigacao;

class ObrigacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obrigacoes = Obrigacao::all();
        return view('obrigacoes.index', compact('obrigacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obrigacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'prazo' => 'required|date',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
        ]);

        Obrigacao::create($request->all());
        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obrigacao $obrigacao)
    {
        return view('obrigacoes.show', compact('obrigacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obrigacao $obrigacao)
    {
        return view('obrigacoes.edit', compact('obrigacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obrigacao $obrigacao)
    {
        $request->validate([
            'nome' => 'required',
            'prazo' => 'required|date',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
        ]);

        $obrigacao->update($request->all());
        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obrigacao $obrigacao)
    {
        $obrigacao->delete();
        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação deletada com sucesso!');
    }
}
