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

        // Routes
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }

        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flare');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flare'),
        ]);

        $this->registerBladeOperators();
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->registerServiceProviders();
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
