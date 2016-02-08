<?php

namespace Stevebauman\Active;

use Illuminate\Support\ServiceProvider;

class ActiveServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider dependencies.
     */
    public function register()
    {
        $auth = __DIR__.'/Config/config.php';

        // Add publishable configuration.
        $this->publishes([
            $auth => config_path('active.php'),
        ], 'active');

        $this->mergeConfigFrom($auth, 'active');
    }
}
