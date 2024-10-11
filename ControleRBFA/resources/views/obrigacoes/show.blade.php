@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Obrigações</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $obrigacao->nome }}</p>
                <p><strong>Prazo:</strong> {{ $obrigacao->prazo }}</p>
                <p><strong>Departamento:</strong> {{ $obrigacao->controleObrigacoes->first()->departamento->nome }}</p>
                <p><strong>Empresas:</strong></p>
                    @foreach ($obrigacao->controleObrigacoes as $controle)
                        <p>{{ $controle->empresa->nome }}</p>
                    @endforeach
            </div>
        </div>

        <a href="{{ route('obrigacoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection