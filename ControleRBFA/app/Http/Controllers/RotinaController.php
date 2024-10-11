<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rotina;
use App\Models\ControleRotina;
use App\Models\Empresa;
use App\Models\Departamento;

class RotinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rotinas = Rotina::with(['controleRotinas', 'controleRotinas.empresa', 'controleRotinas.departamento'])->get();
        return view('rotinas.index', compact('rotinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();
    
        return view('rotinas.create', compact('empresas', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'empresas_id' => 'required|array',
            'departamento_id' => 'required',
        ]);

        $rotina = Rotina::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'departamento_id' => $request->departamento_id,
        ]);

        foreach ($request->empresas_id as $empresa_id) {
            ControleRotina::create([
                'rotina_id' => $rotina->id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('rotinas.index')->with('success', 'Rotina criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rotina $rotina)
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        return view('rotinas.show', compact('rotina', 'empresas', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rotina $rotina)
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        $empresasSelecionadas = $rotina->controleRotinas->pluck('empresa_id')->toArray();
        $controleRotina = $rotina->controleRotinas->first();
        $departamentoSelecionado = $controleRotina->departamento_id;

        return view('rotinas.edit', compact('rotina', 'empresas', 'departamentos', 'empresasSelecionadas', 'departamentoSelecionado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rotina $rotina)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'empresas_id' => 'required',
            'departamento_id' => 'required',
        ]);

        $rotina->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'departamento_id' => $request->departamento_id,
        ]);

        $rotina->controleRotinas()->delete();
    
        foreach ($request->empresas_id as $empresa_id) {
            ControleRotina::create([
                'rotina_id' => $rotina->id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
    
        return redirect()->route('rotinas.index')->with('success', 'Rotina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rotina $rotina)
    {
        $rotina->controleRotinas()->delete();
        $rotina->delete();
        
        return redirect()->route('rotinas.index')->with('success', 'Rotina deletada com sucesso!');
    }
}
