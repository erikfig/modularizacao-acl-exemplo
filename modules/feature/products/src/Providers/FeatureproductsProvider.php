<?php

namespace ErikFig\Feature\products\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FeatureproductsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->webRoutes();
    }

    protected function webRoutes()
    {
        if (!$this->app->routesAreCached()) {
            Route::namespace('\ErikFig\Feature\products\Http\Controllers')
                ->middleware(['web'])
                ->group(__DIR__ . '/../../routes/web.php');
        }
    }
}
