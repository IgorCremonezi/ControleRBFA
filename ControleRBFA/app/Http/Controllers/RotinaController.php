<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rotina;

class RotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rotinas = Rotina::all();
        return view('rotinas.index', compact('rotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rotinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
        ]);

        Rotina::create($request->all());
        return redirect()->route('rotinas.index')->with('success', 'Rotina criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rotina $rotina)
    {
        return view('rotinas.show', compact('rotina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rotina $rotina)
    {
        return view('rotinas.edit', compact('rotina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rotina $rotina)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'empresa_id' => 'required',
            'departamento_id' => 'required',
        ]);

        $rotina->update($request->all());
        return redirect()->route('rotinas.index')->with('success', 'Rotina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotina $rotina)
    {
        $rotina->delete();
        return redirect()->route('rotinas.index')->with('success', 'Rotina deletada com sucesso!');
    }
}
