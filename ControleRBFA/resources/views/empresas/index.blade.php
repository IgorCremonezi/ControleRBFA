@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="btn btn-success mb-3">Adicionar Empresa</a>
        
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->nome }}</td>
                        <td>
                            <a href="{{ route('empresas.show', $empresa) }}" class="btn btn-info btn-sm">Ver detalhes</a>
                            <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa) }}" method="POST" style="display:inline;">
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