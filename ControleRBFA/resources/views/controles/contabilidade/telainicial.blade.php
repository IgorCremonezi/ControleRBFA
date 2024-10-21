@extends('layouts.app')

@section('title', 'Controle Contabilidade')

@section('content')
    <h1 class="mb-4">Selecione a empresa</h1>

    <table class="table table-striped mt-5">
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td><a href="{{ route('mostrar', $empresa->id) }}" class="list-group-item list-group-item-action">{{ $empresa->nome }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('controle') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection