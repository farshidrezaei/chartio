<?php


namespace LifeWeb\Chartio\Services;


use Intervention\Image\Exception\NotFoundException;
use LifeWeb\Chartio\Services\Charts\AbstractChart;
use LifeWeb\Chartio\Services\Charts\CloudChart;
use LifeWeb\Chartio\Services\Charts\HistogramChart;

class ChartFactory
{


    /**
     * @var array|string[][][]
     */
    public const CHARTS
        = [
            'cloud'     => CloudChart::class,
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
