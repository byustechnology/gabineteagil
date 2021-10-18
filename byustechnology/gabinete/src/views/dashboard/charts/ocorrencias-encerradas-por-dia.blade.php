<canvas id="chartOcorrenciasEncerradasPorDia" width="200" height="200"></canvas>
<script>
var ctx = document.getElementById('chartOcorrenciasEncerradasPorDia').getContext('2d');
var chartOcorrenciasEncerradasPorDia = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            '{{ today()->subDays(6)->format('d/m/Y') }}',
            '{{ today()->subDays(5)->format('d/m/Y') }}',
            '{{ today()->subDays(4)->format('d/m/Y') }}',
            '{{ today()->subDays(3)->format('d/m/Y') }}',
            '{{ today()->subDays(2)->format('d/m/Y') }}',
            '{{ today()->subDays(1)->format('d/m/Y') }}'],
        datasets: [{
            label: 'Ocorrências',
            data: [{{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}, {{ mt_rand(1, 20) }}],
            backgroundColor: [
                'rgba(255, 193, 7, 1)',
                'rgba(255, 193, 7, 1)',
                'rgba(255, 193, 7, 1)',
                'rgba(255, 193, 7, 1)',
                'rgba(255, 193, 7, 1)',
                'rgba(255, 193, 7, 1)',
            ],
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