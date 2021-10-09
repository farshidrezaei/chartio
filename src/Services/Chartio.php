<?php


namespace FarshidRezaei\Chartio\Services;


use Intervention\Image\Exception\NotFoundException;
use FarshidRezaei\Chartio\Services\Charts\AbstractChart;
use FarshidRezaei\Chartio\Services\Charts\CloudChart;
use FarshidRezaei\Chartio\Services\Charts\HistogramChart;

class Chartio
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