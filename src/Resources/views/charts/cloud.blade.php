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
                        colors: colorSet,
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