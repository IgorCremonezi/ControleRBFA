<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ObrigacaoController;
use App\Http\Controllers\RotinaController;
use App\Http\Controllers\SubrotinaController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ControleObrigacaoController;
use App\Http\Controllers\ControleTarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('departamentos', DepartamentoController::class);
    Route::resource('funcionarios', FuncionarioController::class);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('obrigacoes', ObrigacaoController::class);
    Route::resource('rotinas', RotinaController::class);
    Route::resource('subrotinas', SubrotinaController::class);
    Route::resource('tarefas', TarefaController::class);
    Route::resource('controles_obrigacoes', ControleObrigacaoController::class);
    Route::resource('controles_tarefas', ControleTarefaController::class);
});

require __DIR__.'/auth.php';
