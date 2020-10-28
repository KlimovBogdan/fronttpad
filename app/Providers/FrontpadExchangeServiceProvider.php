<?php

namespace App\Providers;

use App\Api\Frontpad\Connection;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FrontpadExchangeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function($app) {
            return new Connection(config('frontpad'));
        });
        $this->app->bind('api.frontpad', Connection::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Connection::class,
            'api.frontpad',
        ];
    }
}
