<?php


namespace LifeWeb\Chartio\Services\Charts;


use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;
use Storage;

/**
 * Class HistogramChart
 *
 * @package LifeWeb\Chartio\Services\Chart
 */
class HistogramChart extends AbstractChart
{

    protected string $type = 'histogram';


    #[Pure]
    public static function new(): self
    {
        return new self();
    }

    /**
     * @param  array  $option
     *
     * @return array
     */
    #[ArrayShape( [ 'imagePath' => "string", 'htmlPath' => "string" ] )]
    public function generate(
        array $option = []
    ): array {
        $xAxisData = array_column( $this->data, $this->xAxisField );
        $yAxisData = [ [ 'data' => array_column( $this->data, $this->yAxisField ) ] ];
        $chartTitle = $this->chartTitle;
        $template = trim(
            view(
                $this->templatePath,
                compact( 'chartTitle', 'xAxisData', 'yAxisData' )
            )->render()
        );

        $path = Storage::disk( 'wordBulletinCharts' )->path( "{$this->fileName}-{$this->platform}-wordCloud.html" );
        file_put_contents( $path, $template );

        $imagePath = Storage::disk( 'wordBulletinCharts' )
            ->path( "{$this->fileName}-{$this->platform}-wordCloud.png" );
        $googleCommand = config( 'bulletin.word.chart.google_command' );
        exec(
            "$googleCommand --no-sandbox --run-all-compositor-stages-before-draw --headless --disable-gpu --virtual-time-budget=1000000000 -window-size=1000,1000 --screenshot={$imagePath} {$path} && convert -trim {$imagePath} {$imagePath}"
        );

        return [
            'imagePath' => $imagePath,
            'htmlPath'  => $path,
        ];
    }

}
