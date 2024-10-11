<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obrigacao;
use App\Models\ControleObrigacao;
use App\Models\Empresa;
use App\Models\Departamento;

class ObrigacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obrigacoes = Obrigacao::with(['controleObrigacoes', 'controleObrigacoes.empresa', 'controleObrigacoes.departamento'])->get();
        return view('obrigacoes.index', compact('obrigacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();
    
        return view('obrigacoes.create', compact('empresas', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'prazo' => 'required|date',
            'empresas_id' => 'required|array',
            'departamento_id' => 'required',
        ]);

        $obrigacao = Obrigacao::create([
            'nome' => $request->nome,
            'prazo' => $request->prazo,
        ]);
    
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
    public function show(Obrigacao $obrigacao)
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        return view('obrigacoes.show', compact('obrigacao', 'empresas', 'departamentos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obrigacao $obrigacao)
    {
        $empresas = Empresa::all();
        $departamentos = Departamento::all();

        $empresasSelecionadas = $obrigacao->controleObrigacoes->pluck('empresa_id')->toArray();
        $controleObrigacao = $obrigacao->controleObrigacoes->first();
        $departamentoSelecionado = $controleObrigacao->departamento_id;

        return view('obrigacoes.edit', compact('obrigacao', 'empresas', 'departamentos', 'empresasSelecionadas', 'departamentoSelecionado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obrigacao $obrigacao)
    {
        $request->validate([
            'nome' => 'required',
            'prazo' => 'required|date',
            'empresas_id' => 'required|array',
            'departamento_id' => 'required',
        ]);

        $obrigacao->update([
            'nome' => $request->nome,
            'prazo' => $request->prazo,
        ]);

        $obrigacao->controleObrigacoes()->delete();
    
        foreach ($request->empresas_id as $empresa_id) {
            ControleObrigacao::create([
                'obrigacao_id' => $obrigacao->id,
                'empresa_id' => $empresa_id,
                'departamento_id' => $request->departamento_id,
                'funcionario_id' => auth()->user()->id,
            ]);
        }
    
        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obrigacao $obrigacao)
    {
        $obrigacao->controleObrigacoes()->delete();
        $obrigacao->delete();

        return redirect()->route('obrigacoes.index')->with('success', 'Obrigação deletada com sucesso.');
    }
}
