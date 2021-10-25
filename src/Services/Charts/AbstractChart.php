<?php


namespace FarshidRezaei\Chartio\Services\Charts;


use FarshidRezaei\Chartio\Services\ChartExporter;

abstract class AbstractChart
{

    protected bool $rtl = false;

    protected string $bladeTemplate;

    protected string $type = '';

    protected ?string $title = '';

    protected ?string $path = '';

    protected string $description = '';

    protected array $data = [];

    protected string $xAxisField = 'x';

    protected string $yAxisField = 'y';

    protected null|int|string $width=null;

    protected ?string $htmlPath = null;
    protected string $color = '#13b6b9';
    protected ?array $colorSet = [ "#009299", "#1AD7DB", "#589DFB", "#5EDFFF", "#B7E778" ];


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
     * @param  string  $width
     *
     * @return $this
     */
    public function width( null|int|string $width = null ): AbstractChart
    {
        $this->width = $width;
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


    /**
     * @param  bool  $rtl
     *
     * @return $this
     */
    public function rtl( bool $rtl = true ): AbstractChart
    {
        $this->rtl = $rtl;
        return $this;
    }


    /**
     * @param  string  $color
     *
     * @return $this
     */
    public function color( string $color ): AbstractChart
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param  array  $colorSet
     *
     * @return $this
     */
    public function colorSet( array $colorSet ): AbstractChart
    {
        $this->colorSet = $colorSet;
        return $this;
    }


}
