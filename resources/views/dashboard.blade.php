<x-app-layout>
    <h1 class="text-3xl">Dashboard</h1>
    <div class="flex gap-10">
        <div class="chart-container" style="width:50%">
            <canvas id="chartIncomes"></canvas>
        </div>
        <div class="chart-container" style="width:50%">
            <canvas id="chartExpenses"></canvas>
        </div>
    </div>
    <div class="chart-container" style="width:100%">
        <canvas id="chartLine"></canvas>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        <script>
            const ctx = document.getElementById('chartIncomes');
            const ingresosObj = @json($ingresos);
            const egresosObj = @json($egresos);
            const labelIngresos = Object.keys(ingresosObj);
            const dataIngresos = Object.values(ingresosObj);


            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelIngresos,
                    datasets: [{
                        label: 'Ingresos por mes',
                        data: dataIngresos,
                        borderWidth: 1,
                        backgroundColor: '#65F39A	',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const chartExpenses = document.getElementById('chartExpenses');

            new Chart(chartExpenses, {
                type: 'bar',

                data: {
                    labels: Object.keys(egresosObj),
                    datasets: [{
                        label: 'Egresos por mes',
                        data: Object.values(egresosObj),
                        borderWidth: 1,
                        backgroundColor: '#F37865',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            const chartLine = document.getElementById('chartLine');

            new Chart(chartLine, {
                type: 'line',

                data: {
                    labels: Object.keys(egresosObj),
                    datasets: [{
                            label: 'Ingresos por mes',
                            data: Object.values(ingresosObj),
                            borderWidth: 1,
                            backgroundColor: '#65F39A',
                            borderColor: '#65F39A',
                        },
                        {
                            label: 'Egresos por mes',
                            data: Object.values(egresosObj),
                            borderWidth: 1,
                            backgroundColor: '#F37865',
                            borderColor: '#F37865',
                        }
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Ingresos e egresos por mes'
                        }
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>
