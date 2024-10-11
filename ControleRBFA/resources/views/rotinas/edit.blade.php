@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Editar Rotina</h1>

        <form action="{{ route('rotinas.update', $rotina) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $rotina->nome }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição: </label>
                <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $rotina->descricao }}" required>
            </div>

            <div class="mb-3">
                <label for="empresas_id" class="form-label">Empresas: </label>
                <select class="form-control" id="empresas_id" name="empresas_id[]" required multiple>
                    @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}" 
                            @if(in_array($empresa->id, $empresasSelecionadas)) selected @endif>
                            {{ $empresa->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento: </label>
                <select class="form-control" id="departamento_id" name="departamento_id" required>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" 
                            @if($departamento->id == $departamentoSelecionado) selected @endif>
                            {{ $departamento->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('rotinas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection