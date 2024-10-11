@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Sub-rotinas</h1>
        <a href="{{ route('subrotinas.create') }}" class="btn btn-success mb-3">Adicionar Sub-rotina</a>
        
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rotina</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subrotinas as $subrotina)
                    <tr>
                        <td>{{ $subrotina->nome }}</td>
                        <td>{{ $subrotina->rotina->nome }}</td>
                        <td>
                            <a href="{{ route('subrotinas.show', $subrotina) }}" class="btn btn-info btn-sm">Ver detalhes</a>
                            <a href="{{ route('subrotinas.edit', $subrotina) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('subrotinas.destroy', $subrotina) }}" method="POST" style="display:inline;">
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