@extends('chartio::layout')

@section('chart')
    <figure id="chart-wrapper" class="highcharts-figure management-chart-item-box">
        <div class="chart-item-title" style="background-color: {{$color??'#13b6b9'}}">
            <h2>{{$title}}</h2>
        </div>
        <div id="chart"></div>

        <p class="description">
            * {{$description}}
        </p>
    </figure>
    @push('scripts')
        <script>

            let jsonData = @json($data);

            const colorSet = @json($colorSet);

            jsonData = jsonData.map(item => {
                return {name: item['{{$xAxis}}'], y: item['{{$yAxis}}']}
            });

            Highcharts.chart('chart', {
                backgroundColor: 'transparent',
                colors: colorSet,
                credits: {
                    enabled: false
                },

                exporting: {
                    enabled: false,
                },
                chart: {
                    height: "250",
                    backgroundColor: 'transparent',
                    plotBackgroundColor: 'transparent',
                    plotBorderWidth: 0,
                    plotShadow: false,
                    type: 'pie',
                    style: {
                        fontFamily: 'BNazanin'
                    }
                },
                title: {
                    style: {
                        display: 'none'
                    },
                },
                tooltip: {
                    formatter: function () {
                        return '<span style="font-size: 10px;text-align: left">' + Highcharts.localizationNumber(this.key) + ' - %' + Highcharts.localizationNumber(this.y) + '</span>';
                    },
                    // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        // allowPointSelect: true,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true,
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: jsonData
                }]
            });

        </script>
    @endpush
@stop