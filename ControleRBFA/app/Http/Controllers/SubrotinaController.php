<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subrotina;
use App\Models\Rotina;
use App\Models\ControleSubRotina;
use App\Models\Empresa;
use App\Models\Departamento;

class SubrotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subrotinas = Subrotina::with(['controleSubRotinas', 'controleSubRotinas.empresa', 'controleSubRotinas.departamento'])->get();
        return view('subrotinas.index', compact('subrotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rotinas = Rotina::all();
        $empresas = Empresa::all();
        $departamentos = Departamento::all();
    
        return view('subrotinas.create', compact('rotinas', 'empresas', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'rotina_id' => 'required',
            'empresas_id' => 'required|array',
            'departamento_id' => 'required',
        ]);

        $subrotina = Subrotina::create([
            'nome' => $request->nome,
            'rotina_id' => $request->rotina_id,
            'departamento_id' => $request->departamento_id,
        ]);

        foreach ($request->empresas_id as $empresa_id) {
            ControleSubRotina::create([
                'subrotina_id' => $subrotina->id,
                'rotina_id' => $subrotina->rotina_id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }

        return redirect()->route('subrotinas.index')->with('success', 'Sub-rotina criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subrotina $subrotina)
    {
        $rotinas = Rotina::all();
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        return view('subrotinas.show', compact('subrotina', 'rotinas', 'empresas', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subrotina $subrotina)
    {
        $rotinas = Rotina::all();
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        $empresasSelecionadas = $subrotina->controleSubRotinas->pluck('empresa_id')->toArray();
        $controleSubRotina = $subrotina->controleSubRotinas->first();
        $departamentoSelecionado = $controleSubRotina->departamento_id;
        $rotinaSelecionada = $subrotina->rotina_id;

        return view('subrotinas.edit', compact('subrotina', 'rotinas', 'empresas', 'departamentos', 'empresasSelecionadas', 'departamentoSelecionado', 'rotinaSelecionada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subrotina $subrotina)
    {
        $request->validate([
            'nome' => 'required',
            'rotina_id' => 'required',
            'empresas_id' => 'required',
            'departamento_id' => 'required',
        ]);

        $subrotina->update([
            'nome' => $request->nome,
            'rotina_id' => $request->rotina_id,
            'departamento_id' => $request->departamento_id,
        ]);

        $subrotina->controleSubRotinas()->delete();
    
        foreach ($request->empresas_id as $empresa_id) {
            ControleSubRotina::create([
                'subrotina_id' => $subrotina->id,
                'rotina_id' => $subrotina->rotina_id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
    
        return redirect()->route('subrotinas.index')->with('success', 'Sub-rotina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subrotina $subrotina)
    {
        $subrotina->controleSubRotinas()->delete();
        $subrotina->delete();

        return redirect()->route('subrotinas.index')->with('success', 'Subrotina deletada com sucesso!');
    }
}
