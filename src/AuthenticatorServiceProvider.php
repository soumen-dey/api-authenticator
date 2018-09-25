<?php

namespace Soumen\Authenticator;

use Illuminate\Support\ServiceProvider;

class AuthenticatorServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/authenticator.php', 'authenticator');

        // Register the service the package provides.
        $this->app->singleton('authenticator', function ($app) {
            return new Authenticator;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['authenticator'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        // $this->publishes([
        //     __DIR__.'/../config/authenticator.php' => config_path('authenticator.php'),
        // ], 'authenticator.config');
    }
}
