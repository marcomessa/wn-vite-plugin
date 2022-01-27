<?php namespace Marcomessa\Vite\Providers;

use Winter\Storm\Support\ServiceProvider;
use Marcomessa\Vite\Classes\ViteService;

class ViteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('vite', function () {
            return new ViteService;
        });
    }
}
