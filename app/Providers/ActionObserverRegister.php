<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Action;
use App\Observers\ActionObserver;

class ActionObserverRegister extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Action::observe(ActionObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
