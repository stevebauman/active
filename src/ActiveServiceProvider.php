<?php

namespace Stevebauman\Active;

use Illuminate\Support\ServiceProvider;

class ActiveServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $config = __DIR__.'/../config/config.php';

       if ($this->app->runningInConsole()) {
           $this->publishes([
               $config => config_path('active.php'),
           ], 'active');
       }

        $this->mergeConfigFrom($config, 'active');
    }
}
