<?php

namespace Pratiksh\Nepalidate\Providers;

use Illuminate\Support\ServiceProvider;

class NepalidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Resources.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelpers();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/../Helpers/helpers.php') as $filename) {
            require_once $filename;
        }
    }
}
