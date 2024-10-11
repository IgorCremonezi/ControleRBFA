@extends('layouts.app')

@section('title', 'Tela de Cadastros')

@section('content')
    <h1 class="mb-4">Selecione o que deseja cadastrar</h1>

    <table class="table table-striped mt-5">
        <tbody>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('departamentos.index') }}" class="list-group-item list-group-item-action">Departamento</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('empresas.index') }}" class="list-group-item list-group-item-action">Empresa</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('obrigacoes.index') }}" class="list-group-item list-group-item-action">Obrigações</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('rotinas.index') }}" class="list-group-item list-group-item-action">Rotinas</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('subrotinas.index') }}" class="list-group-item list-group-item-action">Subrotinas</a></td>
            </div>
            </tr>
        </tbody>
    </table>
@endsection