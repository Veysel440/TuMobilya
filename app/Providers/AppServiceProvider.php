<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
    public function boot()
    {
        // Tüm blade şablonlarına $menus değişkenini paylaş
        view()->composer('*', function ($view) {
            $menus = Menu::all();
            $view->with('menus', $menus);
        });

        View::share('settings', Settings::first());


    }
}
