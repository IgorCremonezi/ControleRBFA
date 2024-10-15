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

            <div class="mb-3">
                <label for="empresas_id" class="form-label">Empresas: </label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="select-all" onclick="toggleSelectAll(this)">
                    <label class="form-check-label" for="select-all">Selecionar Todas</label>
                </div>
                <select class="form-control" id="empresas_id" name="empresas_id[]" required multiple>
                    @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}" 
                            @if(in_array($empresa->id, $empresasSelecionadas)) selected @endif>
                            {{ $empresa->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento: </label>
                <select class="form-control" id="departamento_id" name="departamento_id" required>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" 
                            @if($departamento->id == $departamentoSelecionado) selected @endif>
                            {{ $departamento->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Atualizar</button>
            <a href="{{ route('subrotinas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>

    <script src="{{ asset('js/selectAll.js') }}"></script>
@endsection