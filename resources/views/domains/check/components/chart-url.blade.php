<script>
var charts = charts || new Array();

charts.push({
    id: 'line-chart-{{ $id }}',
    config: {
        type: 'line',
        elements: {
            line: {
                tension: 1
            }
        },
        data: {
            labels: @json($x),
            datasets: [
                {
                    yAxisID: 'y-axis-left',
                    backgroundColor: 'rgba(55, 48, 163)',
                    borderColor: 'rgba(55, 48, 163)',
                    steppedLine: false,
                    fill: false,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    borderWidth: 1.5,
                    data: @json($y)
                }
            ]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                r: {
                    ticks: {
                        backdropPadding: {
                            x: 10,
                            y: 4
                        }
                    }
                },
                xAxes: [
                    {
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777',
                            autoSkip: true,
                            maxRotation: 90,
                            minRotation: 90,
                        },
                        gridLines: {
                            display: false
                        },
                    },
                ],
                yAxes: [
                    {
                        id: 'y-axis-left',
                        ticks: {
                            fontSize: '12',
                            fontColor: '#777777',
                            min: {{ $yMin }},
                            max: {{ $yMax }},
                            callback: function(value) {
                                return value.toLocaleString('es-ES', { minimumFractionDigits: 2 });
                            }
                        },
                        gridLines: {
                            color: '#D8D8D8',
                            zeroLineColor: '#D8D8D8',
                            borderDash: [2, 2],
                            zeroLineBorderDash: [2, 2],
                            drawBorder: false
                        },
                    }
                ]
            }
        }
    }
});
</script>

<canvas id="line-chart-{{ $id }}" height="120"></canvas>
