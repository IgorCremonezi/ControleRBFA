@extends('layouts.app')

@section('title', 'Cadastrar Empresa')

@section('content')
    <h1 class="mb-4">Cadastrar Empresa</h1>

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Empresa: </label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection