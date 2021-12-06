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
    public function save( string $path,$width=null ): string
    {
        $shot=Browsershot::url(
            "file://".$this->htmlPath
        )
            ->noSandbox()
            ->setChromePath( config( 'chartio.chromePath' ))
            ->setNodeBinary( config( 'chartio.nodePath' ) )
            ->setNpmBinary( config( 'chartio.npmPath' ) )
            ->showBackground()
            ->setDelay( 2500 )
            ->select( '#chart-wrapper' );
            if ($width) {
               $shot=$shot->width($width);
            }
            $shot->save( $path );
        unlink( $this->htmlPath );
        return $path;
    }
}
