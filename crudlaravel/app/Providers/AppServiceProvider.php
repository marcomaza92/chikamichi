<?php

namespace LoginWithCRUD\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // Be aware that VARCHAR may have 1, 2 or 4 bytes for each length unit. Example: utf8_mb4 (4 bytes) -> 767 / 4 = 191.

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
