@extends('layouts.app')

@section('title', 'Cadastrar Rotinas')

@section('content')
    <h1 class="mb-4">Cadastrar Rotina</h1>

    <form action="{{ route('rotinas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Rotina: </label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição da Obrigação: </label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>

        <div class="mb-3">
            <label for="empresas_id" class="form-label">Selecione as Empresas: </label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="select-all" onclick="toggleSelectAll(this)">
                <label class="form-check-label" for="select-all">Selecionar Todas</label>
            </div>
            <select class="form-control" id="empresas_id" name="empresas_id[]" required multiple>
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
        <a href="{{ route('rotinas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>

    <script src="{{ asset('js/selectAll.js') }}"></script>
@endsection