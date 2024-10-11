@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados dos Departamentos</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $departamento->nome }}</p>
            </div>
        </div>

        <a href="{{ route('departamentos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection