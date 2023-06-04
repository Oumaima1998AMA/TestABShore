<?php

namespace App\Modules\Dashboard\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
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


        /**
         * View Loader
         */

        View::addNamespace('Dashboard', __DIR__ . '/../Views');

    }
}
