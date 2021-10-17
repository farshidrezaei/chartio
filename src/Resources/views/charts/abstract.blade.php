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

            const chartOptions = @json($chartOptions);


            Highcharts.setOptions({
                locale: getPersianLocal()
            });
            Highcharts.chart('chart', chartOptions);
        </script>
    @endpush
@stop