@extends('layouts.app')

@section('title', 'Cadastrar Obrigações')

@section('content')
    <h1 class="mb-4">Cadastrar Obrigação</h1>

    <form action="{{ route('obrigacoes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Obrigação: </label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="prazo" class="form-label">Prazo de entrega da Obrigação: </label>
            <input type="date" class="form-control" id="prazo" name="prazo" required>
        </div>

        <div class="mb-3">
            <label for="empresas_id" class="form-label">Selecione as Empresas: </label>
            <select class="form-control" id="empresas_id" name="empresas_id[]" required multiple>
                <option value="">Selecione...</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="departamento_id" class="form-label">Selecione o Departamento: </label>
            <select class="form-control" id="departamento_id" name="departamento_id" required>
                <option value="">Selecione...</option>
                @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('obrigacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection