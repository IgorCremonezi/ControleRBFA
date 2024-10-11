@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Empresas</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $empresa->nome }}</p>
            </div>
        </div>
    </div>
@endsection