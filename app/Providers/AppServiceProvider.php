<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\varias\setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
      /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        Blade::component('shared._card', 'card');
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
