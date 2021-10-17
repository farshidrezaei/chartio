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

            const data = @json($data);

            const colorSet = @json($colorSet);

            Highcharts.setOptions({
                locale: getPersianLocal()
            });
            Highcharts.chart('chart', {
                colors: colorSet,
                chart: {
                    type: 'bar',
                    height: "250",
                    backgroundColor: 'transparent',
                    zoomType: 'x',
                    style: {
                        fontFamily: 'BNazanin'
                    }
                },

                credits: {
                    enabled: false
                },

                exporting: {
                    enabled: false,
                },
                title: {
                    style: {
                        display: 'none'
                    }
                },

                tooltip: {
                    formatter: function () {
                        return '<span style="font-size: 10px">' + Highcharts.localizationNumber(this.key) + '</span><br/>'
                            + '<span style="color:{point.color}">\u25CF</span> ' + this.series.name + ': <b>'
                            + Highcharts.localizationNumber(this.y) + '</b><br/>';
                    },
                },
                // subtitle: {
                // 	text: 'Source: thesolarfoundation.com'
                // },

                yAxis: {
                    title: {
                        text: 'مقدار'
                    },
                    labels: {
                        formatter: function () {
                            return Highcharts.localizationNumber(this.value);
                        }
                    }
                },

                xAxis: {
                    categories: data.labels,
                    labels: {
                        formatter: function () {
                            // Example of replacing a normal number with persian number
                            return Highcharts.localizationNumber(this.value).substr(0, 10);
                        }
                    }
                },
                series: Object.values(data.series).map(item => {
                    return {data: item.data, name: item.title}
                })
            });
        </script>
    @endpush
@stop