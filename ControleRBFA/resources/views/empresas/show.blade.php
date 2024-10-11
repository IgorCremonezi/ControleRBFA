@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Empresas</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $empresa->nome }}</p>
            </div>
        </div>

        <a href="{{ route('empresas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection