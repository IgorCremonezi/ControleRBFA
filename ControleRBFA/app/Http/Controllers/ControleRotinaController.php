<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleRotina;

class ControleRotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $controles_rotinas = ControleRotina::all();
        return view('controle_rotinas.index', compact('controles_rotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('controle_rotinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rotina_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
            'semana' => 'nullable|integer',
            'status' => 'required',
            'mes_fechado' => 'required|boolean',
        ]);

        ControleRotina::create($request->all());
        return redirect()->route('controle_rotinas.index')->with('success', 'Controle de rotina criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ControleRotina $controleRotina)
    {
        return view('controle_rotinas.show', compact('controleRotina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControleRotina $controleRotina)
    {
        return view('controle_rotinas.edit', compact('controleRotina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControleRotina $controleRotina)
    {
        $request->validate([
            'rotina_id' => 'required',
            'funcionario_id' => 'required',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
            'mes_referencia' => 'required|date',
            'semana' => 'nullable|integer',
            'status' => 'required',
            'mes_fechado' => 'required|boolean',
        ]);

        $controleRotina->update($request->all());
        return redirect()->route('controle_rotinas.index')->with('success', 'Controle de rotina atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControleRotina $controleRotina)
    {
        $controleRotina->delete();
        return redirect()->route('controle_rotinas.index')->with('success', 'Controle de rotina deletado com sucesso!');
    }
}
