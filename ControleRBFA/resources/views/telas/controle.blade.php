@extends('layouts.app')

@section('title', 'Tela de Controle')

@section('content')
    <h1 class="mb-4">Selecione qual controle deseja acessar</h1>

    <table class="table table-striped mt-5">
        <tbody>
            <tr>
            <div class="list-group">
                <td><a href="{{ route('telainicial') }}" class="list-group-item list-group-item-action">Contabilidade</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="" class="list-group-item list-group-item-action">Escrita Fiscal</a></td>
            </div>
            </tr>
            <tr>
            <div class="list-group">
                <td><a href="" class="list-group-item list-group-item-action">Departamento Pessoal</a></td>
            </div>
            </tr>
        </tbody>
    </table>
@endsection