@extends('layouts.app')

@section('title', 'Controle Contabilidade')

@section('content')
    <h1 class="mb-4">{{ $empresa->nome }}</h1>

    <a href="{{ route('telainicial') }}" class="btn btn-secondary mt-3">Voltar</a>

    <table class="table table-striped mt-5">
        <tbody>
            <tr>
                <th class="text-center">ROTINAS</th>
                <th class="text-center">SUB-ROTINAS</th>
            </tr>
                @foreach ($rotinas as $rotina)
                    <tr>
                        <td class="align-middle">{{ $rotina->nome }}</td>
                        <td>
                            @foreach ($subrotinas as $subrotina)
                                @if ($subrotina->rotina_id == $rotina->id)
                                    <div>{{ $subrotina->nome }}</div>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection
