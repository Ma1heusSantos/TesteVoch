<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="container" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            axios.get('/unit/collaboratorForUnit')
                .then(function(response) {
                    console.log(response.data)
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Número de Colaboradores por Unidade'
                        },
                        xAxis: {
                            type: 'category',
                            title: {
                                text: 'Unidades'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Número de Colaboradores'
                            }
                        },
                        series: [{
                            name: 'Colaboradores',
                            data: response.data
                        }]
                    });
                })
                .catch(function(error) {
                    console.error('Erro ao carregar os dados:', error);
                });
        });
    </script>

</x-app-layout>
