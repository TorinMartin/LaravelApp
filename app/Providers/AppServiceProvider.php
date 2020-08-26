<?php

namespace YourSPACE\Providers;

use Illuminate\Support\ServiceProvider;
use YourSPACE\Theme;
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

    	Schema::defaultStringLength(191); //Solved by increasing StringLength

        view()->composer('layouts.app', function($view){
            $view->with('deftheme', Theme::where('is_default', '=', 1)->first());
        });

        view()->composer('layouts.app', function($view){
            $view->with('themes', \YourSPACE\Theme::themes());
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
