@extends('layouts.app')

@section('title', 'Cadastrar Sub-rotina')

@section('content')
    <h1 class="mb-4">Cadastrar Sub-rotina</h1>

    <form action="{{ route('subrotinas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Sub-rotina: </label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="rotinas_id" class="form-label">Nome da Rotina Pai: </label>
            <select class="form-control" id="rotinas_id" name="rotinas_id" required multiple>
                <option value="">Selecione...</option>
                @foreach($rotinas as $rotina)
                    <option value="{{ $rotina->id }}">{{ $rotina->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('subrotinas.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection