@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Sub-rotinas</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $subrotina->nome }}</p>
                <p><strong>Nome Rotina Pai:</strong> {{ $subrotina->rotina->nome }}</p>
            </div>
        </div>

        <a href="{{ route('subrotinas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection