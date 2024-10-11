@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Rotinas</h1>
        <a href="{{ route('rotinas.create') }}" class="btn btn-success mb-3">Adicionar Rotina</a>
        
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
                @foreach ($rotinas as $rotina)
                    <tr>
                        <td>{{ $rotina->nome }}</td>
                            <td>
                                <a href="{{ route('rotinas.show', $rotina) }}" class="btn btn-info btn-sm">Ver detalhes</a>
                                <a href="{{ route('rotinas.edit', $rotina) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('rotinas.destroy', $rotina) }}" method="POST" style="display:inline;">
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