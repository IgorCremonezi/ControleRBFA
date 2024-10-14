<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
