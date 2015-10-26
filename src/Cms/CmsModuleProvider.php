<?php

namespace LaravelFlare\Cms;

use Illuminate\Support\ServiceProvider;

class CmsModuleProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
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
