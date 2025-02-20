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
        Highcharts.setOptions({
            chart: {
                backgroundColor: '#1e1e2f',
                style: {
                    fontFamily: '\'Unica One\', sans-serif'
                },
                plotBorderColor: '#606063'
            },
            title: {
                style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase',
                    fontSize: '20px'
                }
            },
            xAxis: {
                gridLineColor: '#707073',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: '#505053',
                tickColor: '#707073',
                title: {
                    style: {
                        color: '#A0A0A3'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#707073',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: '#505053',
                tickColor: '#707073',
                tickWidth: 1,
                title: {
                    style: {
                        color: '#A0A0A3'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.85)',
                style: {
                    color: '#F0F0F0'
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        color: '#B0B0B3'
                    },
                    marker: {
                        lineColor: '#333'
                    }
                },
                column: {
                    dataLabels: {
                        enabled: true,
                        style: {
                            color: '#B0B0B3'
                        }
                    }
                }
            },
            legend: {
                itemStyle: {
                    color: '#E0E0E3'
                },
                itemHoverStyle: {
                    color: '#FFF'
                },
                itemHiddenStyle: {
                    color: '#606063'
                }
            },
            credits: {
                enabled: false
            },
        });

        Highcharts.chart('container', {
            chart: {
                type: 'column',
                backgroundColor: '#1e1e2f'
            },
            title: {
                text: 'Sample Data',
                style: {
                    color: '#E0E0E3'
                }
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                title: {
                    text: null
                },
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                gridLineColor: '#707073'
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Revenue (R$)',
                    align: 'high',
                    style: {
                        color: '#A0A0A3'
                    }
                },
                labels: {
                    overflow: 'justify',
                    style: {
                        color: '#E0E0E3'
                    }
                },
                gridLineColor: '#707073'
            },
            tooltip: {
                valueSuffix: ' R$',
                backgroundColor: 'rgba(0, 0, 0, 0.85)',
                style: {
                    color: '#F0F0F0'
                }
            },
            series: [{
                name: 'Revenue',
                data: [500, 700, 800, 900, 1200],
                color: '#F00'
            }]
        });
    </script>

</x-app-layout>
