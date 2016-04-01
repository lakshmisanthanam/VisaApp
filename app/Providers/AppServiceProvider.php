<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Log;

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
        DB::listen(function($query) {
            // $query->sql
            // $query->bindings
            // $query->time
            Log::info($query->sql);
            Log::info($query->bindings);
        });
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
