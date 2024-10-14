<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subrotina;
use App\Models\Rotina;

class SubrotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subrotinas = Subrotina::with('rotina')->get();
        return view('subrotinas.index', compact('subrotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rotinas = Rotina::all();

        return view('subrotinas.create', compact('rotinas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'rotina_id' => 'required',
        ]);

        Subrotina::create($request->all());
        return redirect()->route('subrotinas.index')->with('success', 'Subrotina criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subrotina $subrotina)
    {
        $rotinas = Rotina::all();

        return view('subrotinas.show', compact('subrotina', 'rotinas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subrotina $subrotina)
    {
        $rotinas = Rotina::all();

        $rotinaSelecionada = $subrotina->rotina_id;

        return view('subrotinas.edit', compact('subrotina', 'rotinas', 'rotinaSelecionada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subrotina $subrotina)
    {
        $request->validate([
            'nome' => 'required',
            'rotina_id' => 'required',
        ]);

        $subrotina->update($request->all());
        return redirect()->route('subrotinas.index')->with('success', 'Subrotina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subrotina $subrotina)
    {
        $subrotina->delete();
        return redirect()->route('subrotinas.index')->with('success', 'Subrotina deletada com sucesso!');
    }
}
