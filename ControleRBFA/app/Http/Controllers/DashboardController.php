<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rotina;
use App\Models\Subrotina;

class DashboardController extends Controller
{
    public function gerarGrafico(){
            $rotinas = Rotina::with(['subrotinas'])->get();
    
            $dadosSubrotinasPorRotina = [];
    
            foreach ($rotinas as $rotina) {
                $dadosSubrotinasPorRotina[] = [
                    'rotina' => $rotina->nome,
                    'quantidade_subrotinas' => $rotina->subrotinas->count(),
                ];
            }
    
            return view('dashboard', compact('dadosSubrotinasPorRotina'));
        }
}