<?php

namespace LaravelFlare\Cms;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class CmsModuleProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(Router $router)
    {
        $router->middleware('checkslugexists', 'LaravelFlare\Cms\Http\Middleware\CheckModelExists');

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
