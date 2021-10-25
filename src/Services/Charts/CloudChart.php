<?php


namespace FarshidRezaei\Chartio\Services\Charts;


use JetBrains\PhpStorm\Pure;
use FarshidRezaei\Chartio\Services\ChartExporter;
use Spatie\Browsershot\Browsershot;


class CloudChart extends AbstractChart
{

    protected string $type = 'cloud';

    protected string $bladeTemplate = 'chartio::charts.cloud';

    #[Pure]
    public static function new(): self
    {
        return new self();
    }


    /**
     *
     * @return ChartExporter
     */
    public function generate(): ChartExporter
    {
        $template = trim(
            view( $this->bladeTemplate )
                ->with(
                    [
                        'rtl' => $this->rtl,
                        'colorSet' => $this->colorSet,
                        'color' => $this->color,
                        'xAxis'       => $this->xAxisField,
                        'yAxis'       => $this->yAxisField,
                        'title'       => $this->title,
                        'description' => $this->description,
                        'data'        => $this->data,
                    ]
                )
                ->render()
        );
        $tempDir = sys_get_temp_dir();
        $tempName = time().'_'.\Str::random( 6 ).'.html';
        $this->htmlPath = "$tempDir/$tempName";

        file_put_contents( $this->htmlPath, $template );
        return new ChartExporter($this->htmlPath,$this->width);
    }




}
