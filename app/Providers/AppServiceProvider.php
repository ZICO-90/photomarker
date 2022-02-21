<?php

namespace App\Providers;

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
        // regex:/^http:\/\/\w+(\.\w+)*(:[0-9]+)?\/?$
        view()->composer('users.includes.navbar', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

        
        view()->composer('admin.site-settings.create', function ($view) {
          
            $view->with('social_media', config('app.social_media'));
        });        

    }
}
