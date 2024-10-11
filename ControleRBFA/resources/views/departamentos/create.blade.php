@extends('layouts.app')

@section('title', 'Cadastrar Departamento')

@section('content')
    <h1 class="mb-4">Cadastrar Departamento</h1>

    <form action="{{ route('departamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Departamento: </label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection