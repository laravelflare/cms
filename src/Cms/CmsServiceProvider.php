<?php

namespace LaravelFlare\Cms;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(Router $router)
    {
        $router->middleware('checkslugexists', 'LaravelFlare\Cms\Http\Middleware\CheckSlugExists');

        $this->publishes([
            __DIR__.'/Database/Migrations' => base_path('database/migrations'),
        ]);

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flare');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flare'),
        ]);
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        // Routes
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }
    }

    /**
     * Register Service Providers.
     */
    protected function registerServiceProviders()
    {
    }

    /**
     * Register Blade Operators.
     */
    protected function registerBladeOperators()
    {
    }
}
