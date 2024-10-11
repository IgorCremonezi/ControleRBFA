@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Editar Departamento</h1>

        <form action="{{ route('departamentos.update', $departamento) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $departamento->nome }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection