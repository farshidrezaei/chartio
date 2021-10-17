<?php


namespace FarshidRezaei\Chartio\Services;


use FarshidRezaei\Chartio\Services\Charts\AbstractChart;
use FarshidRezaei\Chartio\Services\Charts\CloudChart;
use FarshidRezaei\Chartio\Services\Charts\ColumnChart;
use FarshidRezaei\Chartio\Services\Charts\CustomChart;
use FarshidRezaei\Chartio\Services\Charts\DonutChart;
use FarshidRezaei\Chartio\Services\Charts\LineChart;
use FarshidRezaei\Chartio\Services\Charts\BarChart;
use FarshidRezaei\Chartio\Services\Charts\PieChart;
use Intervention\Image\Exception\NotFoundException;

class Chartio
{


    /**
     * @var array|string[][][]
     */
    public const CHARTS
        = [
            'cloud' => CloudChart::class,
            'line'  => LineChart::class,
            'column'   =>ColumnChart::class,
            'bar'   =>BarChart::class,
            'donut'   =>DonutChart::class,
            'pie'   =>PieChart::class,
            'abstract'   =>CustomChart::class,
        ];


    /**
     * Return specified chart class.
     *
     * @param  string  $chart
     *
     * @return AbstractChart
     */
    public static function make( string $chart ): AbstractChart
    {
        if( ! array_key_exists( $chart, self::CHARTS ) ) {
            throw new NotFoundException( "$chart does not exists.", 404 );
        }
        return app( self::CHARTS[ $chart ] );
    }
}
