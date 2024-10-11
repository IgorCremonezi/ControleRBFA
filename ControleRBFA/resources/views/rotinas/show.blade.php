@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Rotinas</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $rotina->nome }}</p>
                <p><strong>Descrição:</strong> {{ $rotina->descricao }}</p>
                <p><strong>Departamento:</strong> {{ $rotina->controleRotinas->first()->departamento->nome }}</p>
                <p><strong>Empresas:</strong></p>
                    @foreach ($rotina->controleRotinas as $controle)
                        <p>{{ $controle->empresa->nome }}</p>
                    @endforeach
            </div>
        </div>

        <a href="{{ route('rotinas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection