<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleObrigacao;

class ControleObrigacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $controles_obrigacoes = ControleObrigacao::all();
        return view('controle_obrigacoes.index', compact('controles_obrigacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('controle_obrigacoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'obrigacao_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
        ]);

        ControleObrigacao::create($request->all());
        return redirect()->route('controle_obrigacoes.index')->with('success', 'Controle de obrigação criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ControleObrigacao $controleObrigacao)
    {
        return view('controle_obrigacoes.show', compact('controleObrigacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControleObrigacao $controleObrigacao)
    {
        return view('controle_obrigacoes.edit', compact('controleObrigacao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControleObrigacao $controleObrigacao)
    {
        $request->validate([
            'obrigacao_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
        ]);

        $controleObrigacao->update($request->all());
        return redirect()->route('controle_obrigacoes.index')->with('success', 'Controle de obrigação atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControleObrigacao $controleObrigacao)
    {
        $controleObrigacao->delete();
        return redirect()->route('controle_obrigacoes.index')->with('success', 'Controle de obrigação deletado com sucesso!');
    }
}
