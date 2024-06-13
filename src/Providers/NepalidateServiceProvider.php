<?php

namespace Pratiksh\Nepalidate\Providers;

use Illuminate\Support\ServiceProvider;
use Pratiksh\Nepalidate\Services\NepaliDate;

class NepalidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Resources.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/nepalidate.php' => config_path('nepalidate.php'),
            ], 'nepalidate-config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('nepalidate', function () {
            return new NepaliDate;
        });
    }
}
