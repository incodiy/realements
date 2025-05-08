<?php

namespace Incodiy\Realements;

use Illuminate\Support\ServiceProvider;

class RealementsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/realements.php' => config_path('realements.php'),
        ], 'config');
        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/realements'),
        ], 'views');
        
        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js/vendor/realements'),
        ], 'react-components');
        
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'realements');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/realements.php', 'realements'
        );
        
        $this->app->singleton('realements', function ($app) {
            return new FormBuilder();
        });
    }
}