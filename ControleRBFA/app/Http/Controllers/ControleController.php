<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Rotina;
use App\Models\Subrotina;

class ControleController extends Controller
{
    public function cadastrar()
    {
        return view('telas.cadastros');
    }

    public function controlar()
    {
        return view('telas.controle');
    }

    public function contabilidade()
    {
        $empresas = Empresa::all();

        return view('controles.contabilidade.telainicial', compact('empresas'));
    }

    public function mostrarEmpresa(Empresa $empresa)
    {
        $rotinas = $empresa->rotinas;
        $subrotinas = $empresa->subrotinas;

        return view('controles.contabilidade.mostrar', compact('empresa', 'rotinas', 'subrotinas'));
    }
}
