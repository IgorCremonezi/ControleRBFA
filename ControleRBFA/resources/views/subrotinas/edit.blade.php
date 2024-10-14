@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h1>Editar Sub-rotina</h1>

        <form action="{{ route('subrotinas.update', $subrotina) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome: </label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $subrotina->nome }}" required>
            </div>

            <div class="mb-3">
                <label for="rotina_id" class="form-label">Nome da Rotina Pai: </label>
                <select class="form-control" id="rotina_id" name="rotina_id" required>
                    @foreach($rotinas as $rotina)
                        <option value="{{ $rotina->id }}" 
                            @if($rotina->id == $rotinaSelecionada) selected @endif>
                            {{ $rotina->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('subrotinas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
@endsection