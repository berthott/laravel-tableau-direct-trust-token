<?php

namespace berthott\Tableau;

use berthott\Tableau\Http\Controllers\TableauDirectTrustController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * Register the libraries features with the laravel application.
 */
class TableauDirectTrustTokenProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // add config
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'tableau-direct-trust');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('tableau-direct-trust.php'),
        ], 'config');

        // add routes
        Route::group($this->routeConfiguration(), function () {
            Route::post('tableau/token', [TableauDirectTrustController::class, 'token'])->name('tableau-direct-trust.token');
        });

        // Disable Data Wrapping on resources
        JsonResource::withoutWrapping();
    }

    protected function routeConfiguration(): array
    {
        return [
            'middleware' => config('tableau-direct-trust.middleware'),
            'prefix' => config('tableau-direct-trust.prefix'),
        ];
    }
}
