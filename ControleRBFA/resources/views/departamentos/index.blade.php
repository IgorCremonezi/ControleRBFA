@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Departamentos</h1>
        <a href="{{ route('departamentos.create') }}" class="btn btn-success mb-3">Adicionar Departamento</a>
        
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
                @foreach ($departamentos as $departamento)
                    <tr>
                        <td>{{ $departamento->nome }}</td>
                        <td>
                            <a href="{{ route('departamentos.show', $departamento) }}" class="btn btn-info btn-sm">Ver detalhes</a>
                            <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" style="display:inline;">
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