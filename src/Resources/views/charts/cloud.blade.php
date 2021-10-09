@extends('chartio::layout')

@section('chart')
    <figure id="chart-wrapper" class="highcharts-figure management-chart-item-box">
        <div class="chart-item-title">
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
            jsonData = jsonData.map(item => {
                return {name: item['{{$xAxis}}'], weight: item['{{$yAxis}}']}
            });
            Highcharts.chart('chart', {
                chart: {
                    height: "250",
                    backgroundColor: 'transparent',
                    style: {
                        fontFamily: 'BNazanin'
                    }
                },
                series: [
                    {
                        type: 'wordcloud',
                        colors: ["#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778"],
                        data: jsonData,
                        name: '',
                        style: {
                            fontFamily: "BNazanin",
                        },
                        rotation: {
                            from: 0,
                            to: 0,
                        },
                        minFontSize: 7,
                    }
                ],
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
                }
            });
        </script>
    @endpush
@stop