@extends('layouts.app')

@section('title', 'Controle Contabilidade')

@section('content')
    <h1 class="mb-4">{{ $empresa->nome }}</h1>

    <table class="table table-striped mt-5">
        <tbody>
            <tr>
                <th class="text-center">ROTINAS</th>
                <th class="text-center">SUB-ROTINAS</th>
                <th class="text-center">COMPETÊNCIA</th>
            </tr>
                @foreach ($rotinas as $rotina)
                    <tr>
                        <td class="align-middle">{{ $rotina->nome }}</td>

                        <td>
                            @foreach ($subrotinas as $subrotina)
                                @if ($subrotina->rotina_id == $rotina->id)
                                    <div class="border-bottom pb-2 pt-2 border-2 style="width: 100%;">{{ $subrotina->nome }}</div>
                                @endif
                            @endforeach
                        </td>

                        <td>
                            @foreach ($subrotinas as $subrotina)
                                @if ($subrotina->rotina_id == $rotina->id)
                                    @foreach ($subrotina->controleSubRotinas as $controle)
                                        <div>{{ $controle->mes_referencia }}</div>
                                    @endforeach
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>

    <a href="{{ route('telainicial') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
