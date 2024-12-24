<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer("*", function($view) {
            $setting = Setting::all()->first();
            $view->with("nama_kelas", $setting->nama_kelas);
            $view->with("logo", $setting->logo);
        });
    }
}
