<div>
    <canvas id="charOcorrenciasPorBairro" width="200" height="250"></canvas>
</div>
<hr>

@php

$chartOcorenciasPorBairroValues = [
    '#5594C8' => 'Cidade Nova',
    '#21252F' => 'Centro',
    '#DDDDDD' => 'Jardim do bosque',
    '#FFC107' => 'São Bento',
    '#54C78B' => 'Jardins',
    '#FF083D' => 'Hortências',
]

@endphp

@foreach($chartOcorenciasPorBairroValues as $cor => $valor)
    <div class="d-flex align-items-center">
        <div style="width: 12px; height: 12px; margin-right: 20px; background-color: {{ $cor }}; border-radius: 4px;"></div>
        <small>{{ $valor }}</small>
    </div>
@endforeach


<script>
var ctx = document.getElementById('charOcorrenciasPorBairro').getContext('2d');
var charOcorrenciasPorBairro = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [
            'Cidade Nova',
            'Centro',
            'Jardim dos bosques',
            'São bento',
            'Jardins',
            'Hortências'
        ],
        datasets: [{
            label: 'Ocorrências',
            data: [{{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}],
            backgroundColor: [
                '#5594C8',
                '#21252F',
                '#DDDDDD',
                '#FFC107',
                '#54C78B',
                '#FF083D',
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false
        },
        plugins: {
            legend: {
                display: false
            }
        },
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>