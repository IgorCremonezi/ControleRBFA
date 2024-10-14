<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleSubRotina;

class ControleSubRotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $controles_subrotinas = ControleSubRotina::all();
        return view('controle_subrotinas.index', compact('controles_subrotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('controle_subrotinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subrotina_id' => 'required',
            'rotina_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
            'semana' => 'nullable|integer',
            'status' => 'required',
            'mes_fechado' => 'required|boolean',
        ]);

        ControleSubRotina::create($request->all());
        return redirect()->route('controle_subrotinas.index')->with('success', 'Controle de Sub-rotina criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ControleSubRotina $controleSubRotina)
    {
        return view('controle_subrotinas.show', compact('controleSubRotina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControleSubRotina $controleSubRotina)
    {
        return view('controle_subrotinas.edit', compact('controleSubRotina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControleSubRotina $controleSubRotina)
    {
        $request->validate([
            'subrotina_id' => 'required',
            'rotina_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
            'semana' => 'nullable|integer',
            'status' => 'required',
            'mes_fechado' => 'required|boolean',
        ]);

        $controleSubRotina->update($request->all());
        return redirect()->route('controle_subrotinas.index')->with('success', 'Controle de Sub-rotina atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControleSubRotina $controleSubRotina)
    {
        $controleSubRotina->delete();
        return redirect()->route('controle_subrotinas.index')->with('success', 'Controle de Sub-rotina deletado com sucesso!');
    }
}
