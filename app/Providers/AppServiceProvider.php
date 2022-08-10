<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\View\Composers\CategoryComposer;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(['posts', 'post', 'register/create'], CategoryComposer::class);

        // // Using closure based composers...
        // View::composer('dashboard', function ($view) {
        //     //
        // });
    }
}
