<?php


namespace LifeWeb\Chartio\Services\Charts;


use LifeWeb\Chartio\Services\ChartExporter;

abstract class AbstractChart
{

    protected string $bladeTemplate;

    protected string $type = '';

    protected ?string $title = '';

    protected ?string $path = '';

    protected string $description = '';

    protected array $data = [];

    protected string $xAxisField = 'x';

    protected string $yAxisField = 'y';

    protected ?string $htmlPath = null;


    abstract public static function new(): AbstractChart;


    /**
     * @param  array  $data
     *
     * @return AbstractChart
     */
    public function data( array $data ): AbstractChart
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param  string  $title
     *
     * @return AbstractChart
     */
    public function title( string $title = '' ): AbstractChart
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param  string  $description
     *
     * @return $this
     */
    public function description( string $description = '' ): AbstractChart
    {
        $this->description = $description;
        return $this;
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    abstract public function generate(): ChartExporter;


    /**
     * @param  string  $xAxisField
     *
     * @return AbstractChart
     */
    public function xAxisField( string $xAxisField = 'x' ): AbstractChart
    {
        $this->xAxisField = $xAxisField;
        return $this;
    }

    /**
     * @param  string  $yAxisField
     *
     * @return AbstractChart
     */
    public function yAxisField( string $yAxisField = 'y' ): AbstractChart
    {
        $this->yAxisField = $yAxisField;
        return $this;
    }
}
