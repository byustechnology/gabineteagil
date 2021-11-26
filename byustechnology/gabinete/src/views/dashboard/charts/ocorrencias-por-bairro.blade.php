<div>
    <canvas id="charOcorrenciasPorBairro" width="200" height="250"></canvas>
</div>
<hr>

@php

$faker = Faker\Factory::create();

$ocorrencias = \ByusTechnology\Gabinete\Models\Ocorrencia::groupBy('bairro')
    ->select('bairro', app('db')->raw('count(*) as total'))
    ->get()
    ->each(function($item) use ($faker) {
        $item->cor = $faker->hexcolor();
    });

@endphp

@foreach($ocorrencias as $ocorrencia)
    <div class="d-flex align-items-center">
        <div style="width: 12px; height: 12px; margin-right: 20px; background-color: {{ $ocorrencia->cor }}; border-radius: 4px;"></div>
        <small>{{ $ocorrencia->bairro }}</small>
    </div>
@endforeach


<script>
var ctx = document.getElementById('charOcorrenciasPorBairro').getContext('2d');
var charOcorrenciasPorBairro = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode($ocorrencias->pluck('bairro')->toArray()); ?>,
        datasets: [{
            label: 'Ocorrências',
            data: <?php echo json_encode($ocorrencias->pluck('total')->toArray()); ?>,
            backgroundColor: <?php echo json_encode($ocorrencias->pluck('cor')->toArray()); ?>,
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