<?php

namespace Pratiksh\Nepalidate\Providers;

use Illuminate\Support\ServiceProvider;
use Pratiksh\Nepalidate\Services\NepaliDate;

class NepalidateServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        // Register the main class to use with the facade
        $this->app->singleton('nepali_date', function () {
            return new NepaliDate;
        });
    }
}
