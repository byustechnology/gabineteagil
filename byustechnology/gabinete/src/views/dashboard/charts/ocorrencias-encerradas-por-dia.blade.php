@php

$faker = Faker\Factory::create();

$ocorrencias = \ByusTechnology\Gabinete\Models\Ocorrencia::groupBy('dias')
    ->select(app('db')->raw('DATE(concluida_em) AS dias'), app('db')->raw('count(*) as total'))
    ->concluidas()
    ->limit(15)
    ->get()
    ->each(function($item) {
        $item->dias = date('d/m/Y', strtotime($item->dias));
        $item->cor = 'rgba(255, 193, 7, 1)';
    });
@endphp

@if ($ocorrencias->count())
<canvas id="chartOcorrenciasEncerradasPorDia" width="200" height="200"></canvas>
<script>
var ctx = document.getElementById('chartOcorrenciasEncerradasPorDia').getContext('2d');
var chartOcorrenciasEncerradasPorDia = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($ocorrencias->pluck('dias')->toArray()); ?>,
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
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@else
    <div class="d-flex align-items-center justify-content-center text-center" style="height: 200px;">
        <small class="text-muted"><i class="fas fa-exclamation-triangle fa-fw mr-1"></i> Não há dados para exibir. Conclua uma ocorrência para exibir o gráfico.</small>
    </div>
@endif