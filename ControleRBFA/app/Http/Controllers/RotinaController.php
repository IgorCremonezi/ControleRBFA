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
        ]);

        foreach ($request->empresas_id as $empresa_id) {
            ControleRotina::create([
                'rotina_id' => $rotina->id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
    
        foreach ($request->empresas_id as $empresa_id) {
            ControleObrigacao::create([
                'obrigacao_id' => $obrigacao->id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação criada com sucesso!');
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
