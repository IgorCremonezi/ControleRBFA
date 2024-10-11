@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Obrigações</h1>
        <a href="{{ route('obrigacoes.create') }}" class="btn btn-success mb-3">Adicionar Obrigação</a>
        
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Prazo</th>
                    <th>Competência</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obrigacoes as $obrigacao)
                    <tr>
                        <td>{{ $obrigacao->nome }}</td>
                        <td>{{ $obrigacao->prazo}}</td>
                        <td>{{ $obrigacao->controleObrigacoes->first()->mes_referencia }}</td>
                        <td>
                            <a href="{{ route('obrigacoes.show', $obrigacao) }}" class="btn btn-info btn-sm">Ver detalhes</a>
                            <a href="{{ route('obrigacoes.edit', $obrigacao) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('obrigacoes.destroy', $obrigacao) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection