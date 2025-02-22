<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // You can register custom services if needed.
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Custom route model binding
        Route::bind('slug', function ($value) {
            return \App\Models\Article::where('slug', $value)->firstOrFail();
        });

        // Custom route pattern
        Route::pattern('id', '[0-9]+');  // Restrict 'id' parameter to only numeric values

        // Map web routes
        $this->mapWebRoutes();
        // Map API routes
        $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
             ->namespace($this->namespace)  // This can be set to a namespace if needed.
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)  // You can set a separate namespace for API routes.
             ->group(base_path('routes/api.php'));
    }
}
