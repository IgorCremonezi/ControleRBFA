@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Editar Empresa</h1>

        <form action="{{ route('empresas.update', $empresa) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $empresa->nome }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection