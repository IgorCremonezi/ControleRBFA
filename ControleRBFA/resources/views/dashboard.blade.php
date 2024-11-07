@extends('layouts.app')

@section('title', 'Tela de Gráficos')

@section('content')

    <h5 class="mt-3">Bem vindo ao sistema de Controle de Obrigações e Rotinas do Escritório!</h5>

    <form id="chartOptionsForm">
        <div class="mb-3">
            <label for="chartType" class="form-label">Tipo de Gráfico</label>
            <select id="chartType" class="form-control">
                <option value="PieChart">Pizza</option>
                <option value="ColumnChart">Colunas</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="is3D" class="form-label">Gráfico 3D</label>
            <input type="checkbox" id="is3D" class="form-check-input">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Gráfico</button>
    </form>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var chartType = document.getElementById('chartType').value;
        var is3D = document.getElementById('is3D').checked;

        var data = google.visualization.arrayToDataTable([
            ['Rotinas', 'Quantidade de Sub-Rotinas'],
            @foreach($dadosSubrotinasPorRotina as $dado)
                ["{{$dado['rotina']}}", {{$dado['quantidade_subrotinas']}}],
            @endforeach
        ]);

        var options = {
            title: 'Análise de Sub-Rotinas por Rotina',
            hAxis: {title: 'Rotinas'},
            vAxis: {title: 'Quantidade de Sub-Rotinas'},
            legend: { position: 'none' },
            backgroundColor: 'transparent',
            is3D: is3D
        };

        var chart;
        if (chartType === 'PieChart') {
            chart = new google.visualization.PieChart(document.getElementById('piechart'));
        } else if (chartType === 'ColumnChart') {
            chart = new google.visualization.ColumnChart(document.getElementById('piechart'));
        }

        chart.draw(data, options);
      }
      
      document.getElementById('chartOptionsForm').addEventListener('submit', function(event) {
          event.preventDefault();
          drawChart();
      });
      
    </script>

    <div class="d-flex justify-content-center">
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
@endsection