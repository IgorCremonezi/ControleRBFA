@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Dados das Sub-rotinas</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $subrotina->nome }}</p>
                <p><strong>Nome Rotina Pai:</strong> {{ $subrotina->rotina->nome }}</p>
                <p><strong>Departamento:</strong> {{ $subrotina->controleSubRotinas->first()->departamento->nome }}</p>
                <p><strong>Empresas:</strong></p>
                    @foreach ($subrotina->controleSubRotinas as $controle)
                        <p>{{ $controle->empresa->nome }}</p>
                    @endforeach
            </div>
        </div>

        <a href="{{ route('subrotinas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection