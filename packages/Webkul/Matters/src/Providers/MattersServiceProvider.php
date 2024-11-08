<?php

namespace Webkul\Matters\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class MattersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'matters');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('matters/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'matters');

        Event::listen('admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('matters::layouts.style');
        }); 
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/acl.php', 'acl'
        );
    }
}