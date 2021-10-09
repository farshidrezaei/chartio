<?php

namespace FarshidRezaei\Chartio\Providers;

use Illuminate\Support\ServiceProvider;

class ChartioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands( [] );

        foreach( glob( __DIR__.'/../Helpers'.'/*.php' ) as $file ) {
            require_once $file;
        }

        $this->mergeConfigFrom( __DIR__.'/../Configs/config.php', 'chartio' );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom( __DIR__.'/../Resources/views', 'chartio' );

        if( $this->app->runningInConsole() ) {
            $this->publishes(
                [
                    __DIR__.'/../Configs/config.php' => config_path( 'chartio.php' ),
                ],
                'config'
            );
            $this->publishes(
                [
                    __DIR__.'/../Resources/views' => resource_path( 'views/vendor/chartio' ),
                ],
                'views'
            );
        }
    }
}
