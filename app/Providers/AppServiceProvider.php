<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('arabica', DB::select('SELECT * FROM categories where status = 1 AND category = "arabica" ORDER BY id ASC'));
        View::share('robusta', DB::select('SELECT * FROM categories where status = 1 AND category = "robusta" ORDER BY id ASC'));
        View::share('other', DB::select('SELECT * FROM categories where status = 1 AND category = "other" ORDER BY id ASC'));
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
