<?php


namespace FarshidRezaei\Chartio\Services;


use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class ChartExporter
{
    private string $htmlPath;

    public function __construct( $htmlPath )
    {
        $this->htmlPath = $htmlPath;
    }

    /**
     * @throws CouldNotTakeBrowsershot
     */
    public function save( string $path ): string
    {
        Browsershot::url(
            "file://".$this->htmlPath
        )
            ->setNodeBinary( config( 'chartio.nodePath' ) )
            ->setNpmBinary( config( 'chartio.npmPath' ) )
            ->showBackground()
            ->setDelay( 2500 )
            ->select( '#chart-wrapper' )
            ->save( $path );
        unlink( $this->htmlPath );
        return $path;
    }
}
